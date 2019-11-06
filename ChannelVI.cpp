#include "ChannelVI.h"
#include <math.h>
#include <QFile>
#include "Config.h"




ChannelVI::ChannelVI(QObject *parent) :
    Channel(parent)
{

    vi=Link::create("InputVi");
    encA=Link::create("EncodeA");
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    gain=Link::create("Gain");

#ifdef HI3559A
    viR=Link::create("InputVi");
    AVS=Link::create("SAVS");
    video=AVS;
#else
    video=vi;
    dei=Link::create("Deinterlace");

#endif

}

void ChannelVI::init(QVariantMap cfg)
{
    if(cfg.contains("alsa"))
        audio=Link::create("InputAlsa");
    else
        audio=Link::create("InputAi");

    audio->linkA(gain)->linkA(encA);
    overlay->linkV(encV);
    overlay->linkV(encV2);

#ifdef HI3559A
    if(enableAVS)
    {
        vi->linkV(AVS);
        viR->linkV(AVS);
        AVS->start();
    }
    else
    {
        video=vi;
    }
#else
    vi->linkV(dei);
#endif


    Channel::init();
}

void ChannelVI::updateConfig(QVariantMap cfg)
{
    if(cfg["enable"].toBool())
    {
        QVariantMap ad;
        if(cfg.contains("alsa"))
        {
            ad["path"]=cfg["alsa"].toString();
            ad["channels"]=2;
        }
        else
            ad["interface"]=cfg["interface"].toString();

#ifndef HI3521D
        ad["resamplerate"]=cfg["enca"].toMap()["samplerate"].toInt();
#endif
        audio->start(ad);



        QVariantMap gd;
        gd["gain"]=cfg["enca"].toMap()["gain"];
        gain->start(gd);


#ifdef HI3559A
        if(enableAVS)
        {
            QVariantMap vd;
            vd["interface"]=cfg["interface"].toString()+"-L";
            vi->start(vd);

            vd["interface"]=cfg["interface"].toString()+"-R";
            viR->start(vd);
        }
        else
        {
            QVariantMap vd;
            vd["interface"]=cfg["interface"].toString();
            vi->start(vd);
        }
#else
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

        QVariantMap vd;
        vd["interface"]=cfg["interface"].toString();
        vd["crop"]=cfg["cap"].toMap()["crop"].toMap();
        if(cfg["cap"].toMap().contains("rotate"))
            vd["rotate"]=cfg["cap"].toMap()["rotate"].toInt();
        vi->start(vd);
#endif

        if(cfg["enca"].toMap()["codec"].toString()!="close")
            encA->start(cfg["enca"].toMap());
        else
            encA->stop();
        encV->start(cfg["encv"].toMap());
        if(data["enable2"].toBool())
            encV2->start(cfg["encv2"].toMap());


        if(audioMini!=NULL)
        {
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
    }
    else
    {
        encA->stop();
        encV->stop();
    }

    Channel::updateConfig(cfg);
}
