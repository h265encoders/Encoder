#include "ChannelMix.h"
#include "Config.h"

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

    outputV2=Link::create("OutputVo");
    outputA=Link::create("OutputAo");
#ifdef HI3559A
    outputV=video;
#else
    outputV=Link::create("OutputVo");
    video->linkV(outputV);
#endif
    QVariantMap aoData;
    aoData["interface"]="HDMI-OUT";
    outputA->start(aoData);
    audio->linkA(outputA);

#ifndef HI3559A
    audioMiniOut=Link::create("OutputAo");
    aoData["interface"]="Mini-Out";
    audioMiniOut->start(aoData);
    audio->linkA(audioMiniOut);
#endif
    Channel::init();
}

void ChannelMix::updateConfig(QVariantMap cfg)
{
//    qDebug()<<cfg;



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
    //        if(chn->type!="vi" )
    //            continue;
            LinkObject *a=chn->audio;
            if(!dataMixA.contains("main"))
                dataMixA["main"]=a->name();
            a->linkA(audio);
            curAList.append(srcA[i].toInt());
        }

        audio->setData(dataMixA);
        video->setData(dataMixV);
        encA->start(cfg["enca"].toMap());
        encV->start(cfg["encv"].toMap());
        encV2->start(cfg["encv2"].toMap());
#ifndef HI3559A
        outputV->start(cfg["output"].toMap());
#endif
        {
            QVariantMap out2=cfg["output2"].toMap();
            if(out2["enable"].toBool())
            {

                outputV2->start(cfg["output2"].toMap());
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

            }
            else
                outputV2->stop();
        }
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

