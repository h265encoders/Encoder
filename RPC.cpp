#include "RPC.h"
#include "Config.h"
#include "Json.h"
#include "ChannelFile.h"
#include <QFile>
#include <QDateTime>
#include <ChannelVI.h>
#include "Record.h"

RPC::RPC(QObject *parent) :
    QObject(parent)
{
}

void RPC::init()
{
    group=new Group(this);
    group->init();
    rpcServer=new jcon::JsonRpcWebSocketServer();
    jcon::JsonRpcServer::ServiceMap map;
    map[this]="enc";
    map[group]="group";
    map[GRecord]="rec";
    rpcServer->registerServices(map, ".");
    rpcServer->listen(6001);


    device=Link::create("Device");
    device->start();
}


bool RPC::update(QString json)
{
    QFile file(CFGPATH);
    if(!file.open(QFile::ReadWrite))
        return false;
    file.resize(0);
    file.write(json.toUtf8());
    file.close();
    Config::loadConfig(CFGPATH);
    return true;
}


bool RPC::snap()
{
    static qint64 lastPts=0;
    qint64 now=QDateTime::currentDateTime().toMSecsSinceEpoch();
    if(now-lastPts<400)
        return false;

    for(int i=0;i<Config::chns.count();i++)
    {
        if(!Config::chns[i]->enable)
            continue;
        Config::chns[i]->doSnap();
    }
    return true;
}

QVariantMap RPC::getSysState()
{
    static qlonglong last_total=0;
    static qlonglong last_idel=0;


    qlonglong total=0,idel=0;
    QFile file("/proc/stat");
    file.open(QFile::ReadOnly);
    QString str=file.readLine();
    str=str.mid(5);
    file.close();
    QStringList lst=str.split(" ",QString::SkipEmptyParts);
    lst.setSharable(false);

    for(int i=0;i<lst.count();i++)
    {
        total+=lst.at(i).toLongLong();
        if(i==3)
            idel=lst.at(i).toLongLong();
    }
    int cpu=0;
    if(total-last_total!=0 && last_total!=0)
        cpu=100-(idel-last_idel)*100/(total-last_total);

    last_total=total;
    last_idel=idel;

    QFile file2("/proc/meminfo");
    file2.open(QFile::ReadOnly);
    QString str1=file2.readLine();
    QString str2=file2.readLine();
//    QString str3=file2.readLine();
    file2.close();

    QRegExp rx("(\\d+)");
    rx.indexIn(str1);
    long mem1=rx.cap(1).toLong();
    rx.indexIn(str2);
    long mem2=rx.cap(1).toLong();
//    rx.indexIn(str3);
//    long mem3=rx.cap(1).toLong();

    int mem=100-(mem2)*100/mem1;


    QVariantMap rt;
    rt["cpu"]=cpu;
    rt["mem"]=mem;
    rt["temperature"]=device->invoke("getTemperature").toInt();
    return rt;
}

QVariantList RPC::getInputState()
{
    QVariantList list;
    for(int i=0;i<Config::chns.count();i++)
    {
        if(Config::chns[i]->data["type"].toString()=="vi")
        {
            ChannelVI *vi=(ChannelVI*)Config::chns[i];
            list.append(vi->vi->invoke("getReport").toMap());
        }
    }
    return list;
}

QVariantMap RPC::getNetState()
{
    static qlonglong lastRx=0;
    static qlonglong lastTx=0;
    static qint64 lastPTS=0;

    qint64 now=QDateTime::currentDateTime().toMSecsSinceEpoch();
    qint64 span=now-lastPTS;
    lastPTS=now;
    QFile file("/proc/net/dev");
    file.open(QFile::ReadOnly);
    QString line;
    for(int i=0;i<3;i++)
        line=file.readLine();

    line=file.readLine();
    qlonglong rx=line.split(' ',QString::SkipEmptyParts).at(1).toLongLong()*8;
    qlonglong tx=line.split(' ',QString::SkipEmptyParts).at(9).toLongLong()*8;
    file.close();

    int speedrx=(rx-lastRx)*1000/span/1024;
    int speedtx=(tx-lastTx)*1000/span/1024;
    lastRx=rx;
    lastTx=tx;

    QVariantMap rt;
    rt["rx"]=speedrx;
    rt["tx"]=speedtx;
    return rt;
}

QVariantList RPC::getEPG()
{
    QVariantList chnList=Json::loadFile(CFGPATH).toList();
    QVariantList ret;
    QVariantMap map;
    QString ip=Json::loadFile("/link/config/net.json").toMap()["ip"].toString();
    for(int i=0;i<chnList.count();i++)
    {
        if(!chnList[i].toMap()["enable"].toBool())
            continue;

        map["name"]=chnList[i].toMap()["name"];
        QVariantMap stream=chnList[i].toMap()["stream"].toMap();
        QVariantMap stream2=chnList[i].toMap()["stream2"].toMap();
        QStringList urls;
        urls.clear();
        QString id=QString::number(chnList[i].toMap()["id"].toInt());
        if(stream["http"].toBool())
            urls<<"http://"+ip+"/live/stream"+id;
        if(stream["hls"].toBool())
            urls<<"http://"+ip+"/hls/stream"+id+".m3u8";
        if(stream["rtmp"].toBool())
            urls<<"rtmp://"+ip+"/live/stream"+id;
        if(stream["rtsp"].toBool())
            urls<<"rtsp://"+ip+"/stream"+id;
        if(stream["udp"].toMap()["enable"].toBool())
            urls<<"udp://@"+stream["udp"].toMap()["ip"].toString()+":"+QString::number(stream["udp"].toMap()["port"].toInt());
        if(stream["push"].toMap()["enable"].toBool())
            urls<<stream["push"].toMap()["path"].toString();
        map["url"]=urls.join("|");


        QStringList urls2;
        urls2.clear();
        if(stream2["http"].toBool())
            urls2<<"http://"+ip+"/live/sub"+id;
        if(stream2["hls"].toBool())
            urls2<<"http://"+ip+"/hls/sub"+id+".m3u8";
        if(stream2["rtmp"].toBool())
            urls2<<"rtmp://"+ip+"/live/sub"+id;
        if(stream2["rtsp"].toBool())
            urls2<<"rtsp://"+ip+"/sub"+id;
        if(stream2["udp"].toMap()["enable"].toBool())
            urls2<<"udp://@"+stream2["udp"].toMap()["ip"].toString()+":"+QString::number(stream2["udp"].toMap()["port"].toInt());
        if(stream2["push"].toMap()["enable"].toBool())
            urls2<<stream2["push"].toMap()["path"].toString();
        map["url2"]=urls2.join("|");
        ret<<map;
    }

    return ret;
}

QVariantList RPC::getPlayList()
{
    for(int i=0;i<Config::chns.count();i++)
    {
        if(Config::chns[i]->type=="file")
        {
            ChannelFile *chn=(ChannelFile *)Config::chns[i];
            return chn->getPlayList();
        }
    }
    return QVariantList();
}

QVariantList RPC::getVolume()
{
    QVariantList ret;
    for(int i=0;i<Config::chns.count();i++)
    {
        QVariantMap map;
        if(Config::chns[i]->audio!=NULL)
        {
            QVariantMap data=Config::chns[i]->volume->invoke("getVolume").toMap();
            map["L"]=data["max"].toInt();
            if(data["avg"].toInt()<15)
                map["L"]=0;
            map["R"]=data["max2"].toInt();
            if(data["avg2"].toInt()<15)
                map["R"]=0;
            ret<<map;
        }
        else
        {
            map["L"]=0;
            map["R"]=0;
            ret<<map;
        }
    }
    return ret;
}

QVariantMap RPC::getPlayPosition()
{
    QVariantMap ret;
    for(int i=0;i<Config::chns.count();i++)
    {
        if(Config::chns[i]->type=="file")
        {
            ChannelFile *chn=(ChannelFile *)Config::chns[i];
            ret=chn->getPosition();
            break;
        }
    }
    return ret;
}

bool RPC::play(int index, int time)
{
    for(int i=0;i<Config::chns.count();i++)
    {
        if(Config::chns[i]->type=="file")
        {
            ChannelFile *chn=(ChannelFile *)Config::chns[i];
            return chn->play(index,time);
        }
    }
    return false;
}

QVariantList RPC::getPushSpeed()
{
    QVariantList ret;
    for(int i=0;i<Config::chns.count();i++)
    {
        if(!Config::chns[i]->enable)
            continue;
        ret<<Config::chns[i]->muxMap["push"]->invoke("getSpeed").toMap()["speed"].toInt()*8/1024;
        ret<<Config::chns[i]->muxMap_sub["push"]->invoke("getSpeed").toMap()["speed"].toInt()*8/1024;
    }

    return ret;
}
