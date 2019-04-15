#include "ChannelMix.h"
#include "Config.h"

ChannelMix::ChannelMix(QObject *parent) : Channel(parent)
{
    audio=Link::create("MixA");
    video=Link::create("MixV");
    encA=Link::create("EncodeA");
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
}

void ChannelMix::init()
{
    audio->linkA(encA);
    overlay->linkV(encV);
    overlay->linkV(encV2);
    output=Link::create("OutputVo");
    outputA=Link::create("OutputAo");
    video->linkV(output);
    QVariantMap aoData;
    aoData["interface"]="HDMI-OUT";
    outputA->start(aoData);
    audio->linkA(outputA);

    audioMiniOut=Link::create("OutputAo");
    aoData["interface"]="Mini-Out";
    audioMiniOut->start(aoData);
    audio->linkA(audioMiniOut);
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
        output->start(cfg["output"].toMap());
    }
    else
    {
        audio->stop();
        encA->stop();
        encV->stop();
    }



    Channel::updateConfig(cfg);
}

