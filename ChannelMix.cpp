#include "ChannelMix.h"
#include "Config.h"
#include <QFile>

ChannelMix::ChannelMix(QObject *parent) : Channel(parent)
{
    audio=Link::create("MixA");
    video=Link::create("MixV");
    encA=Link::create("EncodeA");
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    vgasrc=-1;
}

void ChannelMix::init()
{
    audio->linkA(encA);
    overlay->linkV(encV);
    overlay->linkV(encV2);



#ifdef HI3559A
    outputV=video;
#else
    outputV2=Link::create("OutputVo");
    outputV=Link::create("OutputVo");
    video->linkV(outputV);
    outputA=Link::create("OutputAo");
    QVariantMap aoData;
    aoData["interface"]="HDMI-OUT";
    outputA->start(aoData);
    audio->linkA(outputA);
#endif


    if(QFile::exists("/dev/tlv320aic31"))
    {
        audioMiniOut=Link::create("OutputAo");
        aoData["interface"]="Mini-Out";
        audioMiniOut->start(aoData);
        audio->linkA(audioMiniOut);
    }

    Channel::init();
}

void ChannelMix::updateConfig(QVariantMap cfg)
{
    if(cfg["enable"].toBool())
    {
        video->start();
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

        QVariantMap dataMixV;
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

        audio->setData(dataMixA);
        video->setData(dataMixV);

        if(cfg["enca"].toMap()["codec"].toString()!="close")
            encA->start(cfg["enca"].toMap());
        else
            encA->stop();

        encV->start(cfg["encv"].toMap());
        encV2->start(cfg["encv2"].toMap());
#ifndef HI3559A
        outputV->start(cfg["output"].toMap());

        {
            QVariantMap out2=cfg["output2"].toMap();
            if(out2["enable"].toBool())
            {


                if(vgasrc!=-1)
                {
                    LinkObject *v=Config::findChannelById(vgasrc)->overlay;
                    if(v!=NULL)
                        v->unLinkV(outputV2);
                }
                LinkObject *v=Config::findChannelById(out2["src"].toInt())->overlay;
                if(v!=NULL)
                    v->linkV(outputV2);
                vgasrc=out2["src"].toInt();
                outputV2->start(cfg["output2"].toMap());
            }
            else
                outputV2->stop();
        }
#endif
    }
    else
    {
        audio->stop();
        encA->stop();
        encV->stop();
        outputV->stop();
        outputV2->stop();
    }

    Channel::updateConfig(cfg);
}

