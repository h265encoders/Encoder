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
        audio->linkA(ea);
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
        decA->start();
        if(encV==net)
        {
            ev->invoke("reset");
            encV2->invoke("reset");
            snap->invoke("reset");
        }
        encV=ev;
        encA=ea;
        if(cfg["enca"].toMap()["codec"].toString()!="close")
            encA->start(cfg["enca"].toMap());
        else
            encA->stop();
        foreach(QString key,muxMap.keys())
        {
            net->unLinkV(muxMap[key]);
            net->unLinkA(muxMap[key]);
            net->unLinkV(muxMap_sub[key]);
            net->unLinkA(muxMap_sub[key]);
            muxMap[key]->stop();
            muxMap_sub[key]->stop();

            ev->linkV(muxMap[key]);
            ea->linkA(muxMap[key]);
            encV2->linkV(muxMap_sub[key]);
            ea->linkA(muxMap_sub[key]);

        }
    }
    else
    {
        decA->stop();
        video->stop();
        encV=net;
        encA=net;

        foreach(QString key,muxMap.keys())
        {
            ev->unLinkV(muxMap[key]);
            ea->unLinkA(muxMap[key]);
            encV2->unLinkV(muxMap_sub[key]);
            ea->unLinkA(muxMap_sub[key]);
            muxMap[key]->stop();
            muxMap_sub[key]->stop();

            net->linkV(muxMap[key]);
            net->linkA(muxMap[key]);
            net->linkV(muxMap_sub[key]);
            net->linkA(muxMap_sub[key]);

        }
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
        else if(bm==1)
        {
            nd["buffer"]=false;
            nd["sync"]=false;
        }
        else if(bm==2)
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

            QVariantMap frm;
            frm["srcFramerate"]=cfg["net"].toMap()["framerate"].toInt();
            encV->setData(frm);
            encV2->setData(frm);

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
