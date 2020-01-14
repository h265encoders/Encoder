#include "ChannelMix.h"
#include "Config.h"
#include "ChannelVI.h"
#include <QFile>
#include "Json.h"

ChannelMix::ChannelMix(QObject *parent) : Channel(parent)
{
    audio=Link::create("MixA");
    video=Link::create("MixV");
    encA=Link::create("EncodeA");
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    lastSrc=NULL;
    lastSrc2=NULL;
    lastSrcA=NULL;
}

void ChannelMix::init(QVariantMap)
{
    audio->linkA(encA);
    overlay->linkV(encV);
    overlay->linkV(encV2);



    outputV=Link::create("OutputVo");
    outputV2=Link::create("OutputVo");
    outputA=Link::create("OutputAo");
    QVariantMap aoData;
    aoData["interface"]="HDMI-OUT";
    outputA->start(aoData);
    audio->linkA(outputA);

    if(QFile::exists("/dev/tlv320aic31"))
    {
        lineOut=Link::create("OutputAo");
        aoData["interface"]="Mini-Out";
        lineOut->start(aoData);
        audio->linkA(lineOut);
    }
    else
    {
        QVariantMap ifaceA=Json::loadFile("/link/config/board.json").toMap()["interfaceA"].toMap();
        if(ifaceA.keys().contains("Line-Out"))
        {
            lineOut=Link::create("OutputAo");
            aoData["interface"]="Line-Out";
            lineOut->start(aoData);
            audio->linkA(lineOut);
        }
    }

    lastSrcA=audio;

    Channel::init();
}

void ChannelMix::updateConfig(QVariantMap cfg)
{
    if(cfg["enable"].toBool())
    {
        QVariantMap dataMixV;
        if(cfg["encv"].toMap()["width"].toInt()!=-1)
        {
            dataMixV["width"]=cfg["encv"].toMap()["width"].toInt();
            dataMixV["height"]=cfg["encv"].toMap()["height"].toInt();
        }

        video->start(dataMixV);
        audio->start();

        QVariantList srcV=cfg["srcV"].toList();
        QVariantList srcA=cfg["srcA"].toList();
        QVariantList videoList;
        for(int i=0;i<srcV.count();i++)
        {

            if(srcV[i].toInt()!=-1)
            {
                LinkObject *v=Config::findChannelById(srcV[i].toInt())->video;

                videoList.append(v->name());
                v->linkV(video);
            }
            else
            {
                videoList.append("unknow");
            }
        }


        dataMixV["src"]=videoList;
        dataMixV["layout"]=cfg["layout"].toList();

        foreach(int id,curAList)
        {
            if(!srcA.contains(id))
            {
                LinkObject *a=Config::findChannelById(id)->audio;
                a->unLinkA(audio);
                curAList.removeAll(id);
            }
        }

        QVariantMap dataMixA;
        dataMixA["bufLen"]=20;
        for(int i=0;i<srcA.count();i++)
        {
            if(srcA[i]==-1)
                continue;
            Channel *chn=Config::findChannelById(srcA[i].toInt());
            if(chn->audio==NULL )
                continue;
            LinkObject *a=chn->audio;
            if(!dataMixA.contains("main"))
                dataMixA["main"]=a->name();
            a->linkA(audio);
            curAList.append(srcA[i].toInt());
        }

        if(ChannelVI::audioMini!=NULL)
        {
            ChannelVI::audioMini->linkA(audio);
            dataMixA["main"]=ChannelVI::audioMini->name();
        }

        audio->setData(dataMixA);
        video->setData(dataMixV);

        if(cfg["enca"].toMap()["codec"].toString()!="close")
            encA->start(cfg["enca"].toMap());
        else
            encA->stop();

        encV->start(cfg["encv"].toMap());
        encV2->start(cfg["encv2"].toMap());

    }
    else
    {
        audio->stop();
        video->stop();
        encA->stop();
        encV->stop();
        encV2->stop();
    }

    QVariantMap outCfg=cfg["output"].toMap();
    if(outCfg["enable"].toBool())
    {
        Channel *chn=Config::findChannelById(outCfg["src"].toInt());
        LinkObject *v=chn->video;
        LinkObject *a=chn->audio;
        if(v!=NULL)
        {
            if(v!=lastSrc && lastSrc!=NULL)
                lastSrc->unLinkV(outputV);
            lastSrc=v;
            v->linkV(outputV);
        }

        if(a!=NULL)
        {
            if(a!=lastSrcA && lastSrcA!=NULL)
            {
                lastSrcA->unLinkA(outputA);
                a->linkA(outputA);
                if(lineOut!=NULL)
                {
                    lastSrcA->unLinkA(lineOut);
                    a->linkA(lineOut);
                }
            }
            lastSrcA=a;

        }
        outputV->start(outCfg);
    }
    else
        outputV->stop();


    QVariantMap outCfg2=cfg["output2"].toMap();
    if(outCfg2["enable"].toBool())
    {
        LinkObject *v=Config::findChannelById(outCfg2["src"].toInt())->video;
        if(v!=NULL)
        {
            if(v!=lastSrc2 && lastSrc2!=NULL)
                lastSrc2->unLinkV(outputV2);
            lastSrc2=v;
            v->linkV(outputV2);
        }
        outputV2->start(outCfg2);
    }
    else
        outputV2->stop();

    Channel::updateConfig(cfg);
}

