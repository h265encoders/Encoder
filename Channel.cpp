#include "Channel.h"
#include "unistd.h"
#include <QFile>
#include <QDir>
#include <QDateTime>
#include "Json.h"

LinkObject* Channel::httpServer=NULL;
LinkObject* Channel::rtspServer=NULL;
LinkObject *Channel::lineIn=NULL;
LinkObject *Channel::alsa=NULL;
Channel::Channel(QObject *parent) :
    QObject(parent)
{
    overlay=Link::create("Overlay");
    volume=Link::create("Volume");
    snap=Link::create("EncodeV");
    gain=Link::create("Gain");

    enable=false;
    enableAVS=false;
    isSrcLine=false;
    audio=NULL;
    video=NULL;
    encA=NULL;
    encV=NULL;
    encV2=NULL;
    udp_sub=NULL;
    id=-1;
    chnName="";
    if(httpServer==NULL)
    {
        httpServer=Link::create("TSHttp");
        QVariantMap httpData;
        httpData["TSBuffer"]=0;
        httpServer->start(httpData);
    }
    if(rtspServer==NULL)
    {
        rtspServer=Link::create("Rtsp");
        rtspServer->start();
    }

    cd_timer = new QTimer;
    connect(cd_timer,SIGNAL(timeout()),SLOT(cdTimeout()));
    cd_pauseTimer = new QTimer;
    connect(cd_pauseTimer,SIGNAL(timeout()),SLOT(cdPauseTimeout()));
}

void Channel::init(QVariantMap)
{
    QVariantMap sd;
    sd["width"]=640;
    sd["height"]=360;
    sd["codec"]="jpeg";
    if(type=="vi" || type=="mix")
        sd["share"]=0;
    snap->start(sd);

    if(lineIn==NULL)
    {
        QString name="Line-In";
        if(QFile::exists("/dev/tlv320aic31"))
            name="Mini-In";
        QVariantMap ifaceA=Json::loadFile("/link/config/board.json").toMap()["interfaceA"].toMap();
        if(ifaceA.keys().contains(name))
        {
            if(ifaceA[name].toMap().contains("alsa"))
            {
                alsa=Link::create("InputAlsa");
                QVariantMap alsaData=ifaceA[name].toMap();
                alsaData["path"]=alsaData["alsa"].toString();
                alsa->start(alsaData);
                lineIn=Link::create("Resample");
                lineIn->start();
                alsa->linkA(lineIn);
            }
            else
            {
                lineIn=Link::create("InputAi");
                QVariantMap data;
                data["interface"]=name;
                lineIn->start(data);
            }
        }
    }

    if(video!=NULL)
    {
        video->linkV(overlay)->linkV(snap);
    }

    if(audio!=NULL)
    {
        volume->start();
        audio->linkA(gain)->linkA(volume);
    }

    QVariantMap path;
    if(encA==NULL)
        path["mute"]=true;

    muxMap["rtmp"]=Link::create("Mux");
    path["path"]="rtmp://127.0.0.1/live/stream" + QString::number(id);
    muxMap["rtmp"]->setData(path);

    muxMap["push"]=Link::create("Mux");
    if(encA==NULL)
    {
        path["path"]="rtmp://127.0.0.1/live/test" + QString::number(id);
        muxMap["push"]->setData(path);
    }


    muxMap["hls"]=Link::create("Mux");
    path["path"]="/tmp/hls/stream" + QString::number(id)+".m3u8";
    muxMap["hls"]->setData(path);

    muxMap["srt"]=Link::create("Mux");
    path["path"]="srt://:" + QString::number(9000+id)+"?mode=listener&latency=50";
    muxMap["srt"]->setData(path);


    muxMap["ts"]=Link::create("Mux");
    path["format"]="mpegts";
    path["path"]="mem://stream" + QString::number(id);
    muxMap["ts"]->setData(path);

    muxMap["rtsp"]=Link::create("Mux");
    path["format"]="rtsp";
    path["path"]="mem://stream" + QString::number(id);
    muxMap["rtsp"]->setData(path);

    udp=Link::create("TSUdp");
    muxMap["ts"]->linkV(udp);
#ifndef  HI3516E
    muxMap["ndi"]=Link::create("NDISend");
#endif

    {
        path.remove("format");
        muxMap_sub["rtmp"]=Link::create("Mux");
        path["path"]="rtmp://127.0.0.1/live/sub" + QString::number(id);
        muxMap_sub["rtmp"]->setData(path);

        muxMap_sub["push"]=Link::create("Mux");
        if(encA==NULL)
        {
            path["path"]="rtmp://127.0.0.1/live/test" + QString::number(id);
            muxMap_sub["push"]->setData(path);
        }


        muxMap_sub["hls"]=Link::create("Mux");
        path["path"]="/tmp/hls/sub" + QString::number(id)+".m3u8";
        muxMap_sub["hls"]->setData(path);

        muxMap_sub["srt"]=Link::create("Mux");
        path["path"]="srt://:" + QString::number(9100+id)+"?mode=listener&latency=50";
        muxMap_sub["srt"]->setData(path);

        muxMap_sub["ts"]=Link::create("Mux");
        path["format"]="mpegts";
        path["path"]="mem://sub" + QString::number(id);
        muxMap_sub["ts"]->setData(path);

        muxMap_sub["rtsp"]=Link::create("Mux");
        path["format"]="rtsp";
        path["path"]="mem://sub" + QString::number(id);
        muxMap_sub["rtsp"]->setData(path);

        udp_sub=Link::create("TSUdp");
        muxMap_sub["ts"]->linkV(udp_sub);
    }


    foreach(QString key,muxMap.keys())
    {

        if(encA!=NULL)
        {
            encA->linkA(muxMap[key]);
            if(muxMap_sub.contains(key))
                encA->linkA(muxMap_sub[key]);
        }
        encV->linkV(muxMap[key]);
        if(encV2!=NULL && muxMap_sub.contains(key))
            encV2->linkV(muxMap_sub[key]);
    }
}

void Channel::updateConfig(QVariantMap cfg)
{
    data=cfg;
    enable=data["enable"].toBool();
    bool enable2=data["enable2"].toBool();

    if(enable || enable2)
    {
        QVariantMap lays;
        lays["lays"]=cfg["overlay"].toList();
        overlay->start(lays);

        if(cfg.contains("enca"))
        {
            QVariantMap gd;
            gd["gain"]=cfg["enca"].toMap()["gain"];
            gain->start(gd);
        }

        if(lineIn!=NULL && cfg.contains("enca"))
        {
            QVariantMap cfga=cfg["enca"].toMap();
            if(cfga.contains("audioSrc") && cfga["audioSrc"].toString()=="line" && !isSrcLine)
            {
                audio->unLinkA(gain);
                lineIn->linkA(gain);
                isSrcLine=true;
            }
            else if(cfga.contains("audioSrc") && cfga["audioSrc"].toString()!="line" && isSrcLine)
            {
                isSrcLine=false;
                lineIn->unLinkA(gain);
                audio->linkA(gain);
            }
        }
    }

    if(encV2!=NULL)
    {
        if(enable2)
            encV2->start(cfg["encv2"].toMap());
        else
            encV2->stop();
    }

    {
        QVariantMap muxDataMain;
        QVariantMap muxDataSub;
        muxDataMain["mute"]=(cfg["enca"].toMap()["codec"].toString()=="close");
        muxDataSub["mute"]=(cfg["enca"].toMap()["codec"].toString()=="close");

        muxDataMain["noVideo"]=(cfg["encv"].toMap()["codec"].toString()=="close");
        muxDataSub["noVideo"]=(cfg["encv2"].toMap()["codec"].toString()=="close");

        foreach(QString key,muxMap.keys())
        {
            if(key=="ndi")
                continue;
            muxMap[key]->setData(muxDataMain);
            muxMap_sub[key]->setData(muxDataSub);
        }
    }

    QVariantMap stream;
    stream=cfg["stream"].toMap();
    QVariantMap stream2;
    stream2=cfg["stream2"].toMap();



    if(enable && stream["rtmp"].toBool())
        muxMap["rtmp"]->start();
    else
        muxMap["rtmp"]->stop();

    if(enable && stream["hls"].toBool())
        muxMap["hls"]->start(cfg["hls"].toMap());
    else
        muxMap["hls"]->stop();


    if(enable && stream["srt"].toMap()["enable"].toBool())
    {
        QVariantMap cfg=stream["srt"].toMap();
        QVariantMap data;
        QString ip=cfg["ip"].toString();
        QString mode=cfg["mode"].toString();
        if(mode=="listener")
            ip="0.0.0.0";
        data["path"]="srt://"+ip+":" + QString::number(cfg["port"].toInt())+"?mode="+mode+"&latency="+ QString::number(cfg["latency"].toInt());
        muxMap["srt"]->start(data);
    }
    else
        muxMap["srt"]->stop();



    if(enable &&  (stream["http"].toBool()  || stream["udp"].toMap()["enable"].toBool()))
    {
        if(cfg.contains("ts"))
        {
            QVariantMap tscfg=cfg["ts"].toMap();
            tscfg["service_name"]=cfg["name"].toString();
            muxMap["ts"]->start(tscfg);
        }
        else
            muxMap["ts"]->start();
    }
    else
        muxMap["ts"]->stop();

    if(enable && stream["rtsp"].toBool() )
        muxMap["rtsp"]->start();
    else
        muxMap["rtsp"]->stop();


    if(enable && stream["http"].toBool())
        muxMap["ts"]->linkV(httpServer);
    else
        muxMap["ts"]->unLinkV(httpServer);

    if(enable && stream["rtsp"].toBool())
    {
        muxMap["rtsp"]->linkV(rtspServer);
        muxMap["rtsp"]->linkA(rtspServer);
    }
    else
    {
        muxMap["rtsp"]->unLinkV(rtspServer);
        muxMap["rtsp"]->unLinkA(rtspServer);
    }


    if(enable && stream["udp"].toMap()["enable"].toBool())
        udp->start(stream["udp"].toMap());
    else
        udp->stop();

    if(enable && stream["push"].toMap()["enable"].toBool())
        muxMap["push"]->start(stream["push"].toMap());
    else
        muxMap["push"]->stop();


    if(encV2!=NULL)
    {
        if(enable2 && stream2["rtmp"].toBool())
            muxMap_sub["rtmp"]->start();
        else
            muxMap_sub["rtmp"]->stop();

        if(enable2 &&stream2["hls"].toBool())
            muxMap_sub["hls"]->start(cfg["hls"].toMap());
        else
            muxMap_sub["hls"]->stop();


        if(enable2 && stream2["srt"].toMap()["enable"].toBool())
        {
            QVariantMap cfg=stream2["srt"].toMap();
            QVariantMap data;
            QString ip=cfg["ip"].toString();
            QString mode=cfg["mode"].toString();
            if(mode=="listener")
                ip="0.0.0.0";
            data["path"]="srt://"+ip+":" + QString::number(cfg["port"].toInt())+"?mode="+mode+"&latency="+ QString::number(cfg["latency"].toInt());
            muxMap_sub["srt"]->start(data);
        }
        else
            muxMap_sub["srt"]->stop();


        if(enable2 && (stream2["http"].toBool()  || stream2["udp"].toMap()["enable"].toBool()))
        {
            if(cfg.contains("ts"))
            {
                QVariantMap tscfg=cfg["ts"].toMap();
                tscfg["service_name"]=cfg["name"].toString();
                muxMap_sub["ts"]->start(tscfg);
            }
            else
                muxMap_sub["ts"]->start();
        }
        else
            muxMap_sub["ts"]->stop();

        if(enable2 && stream2["rtsp"].toBool() )
            muxMap_sub["rtsp"]->start();
        else
            muxMap_sub["rtsp"]->stop();


        if(enable2 && stream2["http"].toBool())
            muxMap_sub["ts"]->linkV(httpServer);
        else
            muxMap_sub["ts"]->unLinkV(httpServer);

        if(enable2 && stream2["rtsp"].toBool())
        {
            muxMap_sub["rtsp"]->linkV(rtspServer);
            muxMap_sub["rtsp"]->linkA(rtspServer);
        }
        else
        {
            muxMap_sub["rtsp"]->unLinkV(rtspServer);
            muxMap_sub["rtsp"]->unLinkA(rtspServer);
        }



        if(enable2 && stream2["udp"].toMap()["enable"].toBool())
            udp_sub->start(stream2["udp"].toMap());
        else
            udp_sub->stop();

        if(enable2 && stream2["push"].toMap()["enable"].toBool())
            muxMap_sub["push"]->start(stream2["push"].toMap());
        else
            muxMap_sub["push"]->stop();
    }
#ifndef  HI3516E
    QVariantMap ndiCfg;
    ndiCfg=cfg["ndi"].toMap();
    if(enable && ndiCfg["enable"].toBool())
        muxMap["ndi"]->start(ndiCfg);
    else
        muxMap["ndi"]->stop();
#endif
}

void Channel::doSnap()
{
    QString path="/tmp/snap/snap"+QString::number(id)+".jpg";
    snap->invoke("snap",path);
}

int Channel::timerStrToInt(QString time)
{
    int count_time = 0;
    if(!time.isEmpty())
    {
        time = time.replace("：",":");
        QStringList timeList = time.split(":");
        for(int j=0;j<timeList.count();j++)
        {
            QString str = timeList[j];
            if(j == 0)
                count_time += str.toInt()*3600;
            if(j == 1)
                count_time += str.toInt()*60;
            if(j == 2)
                count_time += str.toInt();
        }
    }
    else
        count_time = 99999999;
    return count_time;
}

void Channel::startRecord(const QString &fileName, const QString &format)
{
    if(formatMap.contains(format))
    {
        QString mark = formatMap[format]->property("record").toString();
        if(mark == "on")
            return;
    }
    QStringList infoList = fileName.split("/");
    QString filePath;
    for(int i=0;i<infoList.count();i++)
    {
        if(i == infoList.count() - 1)
            continue;
        filePath = filePath+infoList[i]+"/";
    }

    QDir pathDir(filePath);
    if(!pathDir.exists())
        pathDir.mkpath(filePath);

    QString jpg=fileName+".jpg";;
    snap->invoke("snapSync",jpg);
    if(!formatMap.contains(format))
        formatMap[format] = Link::create("Mux");

    LinkObject *mux = formatMap[format];
    QVariantMap data;
    data["path"] = fileName+"."+format;
    if(encA==NULL || encA->getState()!="started")
        data["mute"]=true;
    else
        encA->linkA(mux);

    encV->linkV(mux);

    mux->start(data);
    mux->setProperty("record","on");

    if(startRecordTime.isEmpty())
    {
        QDateTime curTime = QDateTime::currentDateTime();
        startRecordTime = QString::number(curTime.toTime_t());
    }
}

void Channel::stopRecord(const QString &format)
{
    if(!formatMap.contains(format))
        return;

    int offCount = 0;
    QMap<QString,LinkObject*>::Iterator it;
    for(it = formatMap.begin();it != formatMap.end();++it)
    {
        LinkObject *mux = it.value();
        QString mark = formatMap[it.key()]->property("record").toString();
        if(format == it.key())
        {
            if(mark == "off")
                return;
            mux->stop();
            formatMap[format]->setProperty("record","off");
            mark = "off";
        }
        if(mark == "off")
            offCount++;
    }
    if(formatMap.count() == offCount)
    {
        startRecordTime = "";
        pauseTime = 0;
    }
}

void Channel::recordPuase(const bool &pause)
{
    QMap<QString,LinkObject*>::Iterator it;
    for(it = formatMap.begin();it != formatMap.end();++it)
    {
        LinkObject *mux = it.value();
        if(pause)
        {
            mux->invoke("pause");
            cd_pauseTimer->start(1000);
        }
        else
        {
            mux->invoke("resume");
            cd_pauseTimer->stop();
        }
    }
}


void Channel::cdTimeout()
{
    int h = cd_time/3600;
    int m = (cd_time%3600)/60;
    int s = (cd_time%3600)%60;

    QString hh = QString::number(h);
    QString mm = QString::number(m);
    QString ss = QString::number(s);

    if(hh.length() < 2)
        hh = "0"+hh;
    if(mm.length() < 2)
        mm = "0"+mm;
    if(ss.length() < 2)
        ss = "0"+ss;

    QString content = cd_ctx;
    content = content.replace("hh",hh);
    content = content.replace("mm",mm);
    content = content.replace("ss",ss);

    for(int i=0;i<modList.count();i++)
    {
         CdType mod = modList[i];
         QVariantMap layObj = layList[mod.layListIndex].toMap();
        if(mod.type == "countdown")
        {
            layObj["content"] = content;
            if(cd_time >= 0)
                layObj["enable"]=true;
            else
                layObj["enable"]=false;
            layList[mod.layListIndex] = layObj;
        }
        if(mod.type == "subtitle")
        {
            if(mod.startTime == cd_time)
            {
                layObj["enable"] = true;
                layList[mod.layListIndex] = layObj;
            }
        }
    }

    QVariantMap lays;
    lays["lays"] = layList;
    overlay->setData(lays);

    if(cd_time >= 0)
        cd_time--;

    bool mark = false;
    for(int i=0;i<modList.count();i++)
    {
        CdType mod = modList[i];
        if(mod.type == "subtitle")
        {
            if(mod.durTime < 1)
            {
                QVariantMap layObj = layList[mod.layListIndex].toMap();
                layObj["enable"] = false;
                layList[mod.layListIndex] = layObj;
            }
            else
            {
                mark = true;
                if(cd_time <= mod.startTime)
                {
                    mod.durTime = mod.durTime-1;
                    modList[i] = mod;
                }
            }
        }
    }

    if(!mark && cd_time < 0)
    {
        cd_timer->stop();
        for(int i=0;i<modList.count();i++)
        {
             CdType mod = modList[i];
             QVariantMap layObj = layList[mod.layListIndex].toMap();
            if(mod.type == "countdown")
            {
                layObj["content"] = "00:00:00";
                layObj["enable"]=false;
                layList[mod.layListIndex] = layObj;
            }
            if(mod.type == "subtitle")
            {
                layObj["enable"] = false;
                layList[mod.layListIndex] = layObj;
            }
        }
        QVariantMap lays;
        lays["lays"] = layList;
        overlay->setData(lays);
    }
}

void Channel::cdPauseTimeout()
{
    pauseTime++;
}


