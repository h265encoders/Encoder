#include "ChannelNet.h"
#include <QFile>
#include <unistd.h>

ChannelNet::ChannelNet(QObject *parent) :
    Channel(parent)
{
    video=Link::create("DecodeV");
    net=Link::create("InputNet");
    audio=Link::create("Resample");
    decA=Link::create("DecodeA");
    ev=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    ea=Link::create("EncodeA");
    encV=net;
    encA=net;
}

void ChannelNet::init()
{

        video->linkV(ev);
        video->linkV(encV2);
        audio->linkV(ea);
        decA->start();
        audio->start();

    net->linkV(video);
    net->linkA(decA)->linkA(audio);
    Channel::init();
}

void ChannelNet::updateConfig(QVariantMap cfg)
{
    if(cfg["net"].toMap()["decode"].toBool())
    {
        video->start();
        encV=ev;
        encA=ea;
    }
    else
    {
        video->stop();
        encV=net;
        encA=net;
    }

    if(cfg["enable"].toBool() || cfg["enable2"].toBool())
    {
        QVariantMap nd;
        nd["path"]=cfg["net"].toMap()["path"].toString();
        nd["protocol"]="tcp";
        nd["timeout"]=20;

        int bm=cfg["net"].toMap()["bufferMode"].toInt();

        if(bm==0)
        {
            nd["buffer"]=true;
            nd["sync"]=false;
        }
        else if(bm==0)
        {
            nd["buffer"]=false;
            nd["sync"]=false;
        }
        else if(bm==0)
        {
            nd["buffer"]=true;
            nd["sync"]=true;
        }

        if(encV!=net)
        {
            if(nd["path"].toString()!=url)
            {
                encV->stop();
                net->stop();
                video->stop();
            }
            url=nd["path"].toString();

            if(cfg["enable"].toBool())
                encV->start(cfg["encv"].toMap());
            else
                encV->stop();
            if(cfg["enable2"].toBool())
                encV2->start(cfg["encv2"].toMap());
            else
                encV2->stop();
            video->start();
        }
        net->start(nd);
    }
    else
    {
        if(encV!=net)
            encV->stop();
        net->stop();
    }
    Channel::updateConfig(cfg);
}
