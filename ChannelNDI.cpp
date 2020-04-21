#include "ChannelNDI.h"

ChannelNDI::ChannelNDI(QObject *parent) : Channel(parent)
{
    video=Link::create("DecodeV");
    ndi=Link::create("NDIRecv");
    audio=Link::create("Resample");
    decA=Link::create("DecodeA");
    encV=ndi;
    encA=ndi;
    encV2=NULL;
}

void ChannelNDI::init(QVariantMap)
{
    decA->start();
    audio->start();
    video->start();
    ndi->start();

    ndi->linkV(video);
    ndi->linkA(decA)->linkA(audio);
    Channel::init();
}

void ChannelNDI::updateConfig(QVariantMap cfg)
{
    if(cfg["enable"].toBool())
    {
        video->start();
        if(curName!=cfg["ndirecv"].toMap()["name"].toString())
        {
            snap->invoke("reset");
            curName=cfg["ndirecv"].toMap()["name"].toString();
        }
        ndi->setData(cfg["ndirecv"].toMap());
    }
    else
    {
        QVariantMap data;
        data["name"]="";
        curName="";
        ndi->setData(data);
        video->stop();
    }
    Channel::updateConfig(cfg);
}

