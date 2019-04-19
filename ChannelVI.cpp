#include "ChannelVI.h"
#include <math.h>
#include <QFile>
LinkObject *ChannelVI::audioMini=NULL;

ChannelVI::ChannelVI(QObject *parent) :
    Channel(parent)
{

    vi=Link::create("InputVi");
#ifdef HI3559A
    audio=Link::create("InputAlsa");
    viR=Link::create("InputVi");
    AVS=Link::create("SAVS");
    video=AVS;
#else
    audio=Link::create("InputAi");
    video=vi;
    dei=Link::create("Deinterlace");
#endif



    encA=Link::create("EncodeA");
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    gain=Link::create("Gain");
    isSrcLine=false;

#ifndef HI3559A
    if(audioMini==NULL)
    {
        audioMini=Link::create("InputAi");
        QVariantMap data;
        data["interface"]="Mini-In";
        audioMini->start(data);
    }
#endif
}

void ChannelVI::init()
{
    audio->linkA(gain)->linkA(encA);
    overlay->linkV(encV);
    overlay->linkV(encV2);

#ifdef HI3559A

    vi->linkV(AVS);
    viR->linkV(AVS);
    AVS->start();
#else
    vi->linkV(dei);
#endif


    Channel::init();
}

void ChannelVI::updateConfig(QVariantMap cfg)
{
    if(cfg["enable"].toBool())
    {
#ifdef HI3559A
        QVariantMap ad;
        ad["path"]=cfg["alsa"].toString();
        audio->start(ad);
#else

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
#endif


        QVariantMap gd;
        gd["gain"]=cfg["enca"].toMap()["gain"];
        gain->start(gd);


#ifdef HI3559A
        QVariantMap vd;
        vd["interface"]=cfg["interface"].toString()+"-L";
        vi->start(vd);

        vd["interface"]=cfg["interface"].toString()+"-R";
        viR->start(vd);
#else
        QVariantMap vd;
        vd["interface"]=cfg["interface"].toString();
        vd["crop"]=cfg["cap"].toMap()["crop"].toMap();
        vi->start(vd);
#endif

        encA->start(cfg["enca"].toMap());
        encV->start(cfg["encv"].toMap());
        encV2->start(cfg["encv2"].toMap());


#ifndef HI3559A
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
#endif
    }
    else
    {
        encA->stop();
        encV->stop();
    }

    Channel::updateConfig(cfg);
}
