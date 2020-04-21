#include "ChannelUSB.h"
#include <QDateTime>
#include <QDir>
#include <QFileInfo>

ChannelUSB::ChannelUSB(QObject *parent) : Channel(parent)
{
    alsa=Link::create("InputAlsa");
    audio=Link::create("Resample");
    video=Link::create("DecodeV");
    encA=Link::create("EncodeA");
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    usb=Link::create("InputV4l2");
}

void ChannelUSB::init(QVariantMap)
{
    video->start();
    usb->linkV(video);
    overlay->linkV(encV);


    audio->start();
    alsa->linkA(audio)->linkA(encA);


    Channel::init();
}

void ChannelUSB::updateConfig(QVariantMap cfg)
{

    if(cfg["enable"].toBool())
    {
        if(cfg.contains("alsa"))
        {
            QVariantMap data;
            data["path"]=cfg["alsa"].toString();
            alsa->start(data);
        }
        else
            alsa->start();
        usb->start();
        if(cfg["encv"].toMap()["codec"].toString()!="close")
            encV->start(cfg["encv"].toMap());
        else
            encV->stop();

        if(cfg["encv2"].toMap()["codec"].toString()!="close")
            encV2->start(cfg["encv2"].toMap());
        else
            encV2->stop();

        if(cfg["enca"].toMap()["codec"].toString()!="close")
            encA->start(cfg["enca"].toMap());
        else
            encA->stop();
    }
    else
    {
        alsa->stop();
        usb->stop();
        encV->stop();
        encV2->stop();
    }

    Channel::updateConfig(cfg);
}
