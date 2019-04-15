#include "ChannelVI.h"
#include <math.h>
#include <QFile>
LinkObject *ChannelVI::audioMini=NULL;

ChannelVI::ChannelVI(QObject *parent) :
    Channel(parent)
{
    audio=Link::create("InputAi");
    vi=Link::create("InputVi");
    video=vi;
    dei=Link::create("Deinterlace");;
    encA=Link::create("EncodeA");
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    gain=Link::create("Gain");
    isSrcLine=false;
    if(audioMini==NULL)
    {
        audioMini=Link::create("InputAi");
        QVariantMap data;
        data["interface"]="Mini-In";
        audioMini->start(data);
    }
}

void ChannelVI::init()
{
    audio->linkA(gain)->linkA(encA);
    overlay->linkV(encV);
    overlay->linkV(encV2);
    vi->linkV(dei);

    Channel::init();
}

void ChannelVI::updateConfig(QVariantMap cfg)
{
    if(cfg["enable"].toBool())
    {
        QVariantMap ad;
        ad["resamplerate"]=cfg["enca"].toMap()["samplerate"].toInt();
//        ad["num"]=ad["resamplerate"].toInt()/50;
        ad["interface"]=cfg["interface"].toString();
        audio->start(ad);

        if(cfg["cap"].toMap()["deinterlace"].toBool())
        {
            video=dei;
            dei->start();
            vi->unLinkV(overlay);
            dei->linkV(overlay);
        }
        else
        {
            video=vi;
            dei->stop();
            dei->unLinkV(overlay);
            vi->linkV(overlay);
        }

        QVariantMap gd;
        gd["gain"]=cfg["enca"].toMap()["gain"];
        gain->start(gd);

        QVariantMap vd;
        vd["interface"]=cfg["interface"].toString();
        vd["crop"]=cfg["cap"].toMap()["crop"].toMap();
        vi->start(vd);

        encA->start(cfg["enca"].toMap());
        encV->start(cfg["encv"].toMap());
        encV2->start(cfg["encv2"].toMap());


        QVariantMap cfga=cfg["enca"].toMap();
        if(cfga.contains("audioSrc") && cfga["audioSrc"].toString()=="line" && !isSrcLine)
        {
            audio->unLinkA(gain);
            audioMini->linkA(gain);
            isSrcLine=true;
        }
        else if(cfga.contains("audioSrc") && cfga["audioSrc"].toString()!="line" && isSrcLine)
        {
            isSrcLine=false;
            audioMini->unLinkA(gain);
            audio->linkA(gain);
        }
    }
    else
    {
        encA->stop();
        encV->stop();
    }

    Channel::updateConfig(cfg);
}
