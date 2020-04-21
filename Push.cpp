#include "Push.h"
#include "Config.h"
#include <QFile>
#include "Json.h"

Push::Push(QObject *parent) : QObject(parent)
{
    srcA=NULL;
    srcV=NULL;
    lastSrcA=NULL;
    lastSrcV=NULL;
    bPushing=false;
    preview=Link::create("Mux");
    QVariantMap data;
    data["path"]="rtmp://127.0.0.1/live/preview";
    preview->setData(data);
}

void Push::init()
{
    QFile file("/link/config/push.json");
    file.open(QFile::ReadOnly);
    QString json=file.readAll();
    file.close();
    update(json);
    if(config["autorun"].toBool())
        start();

}

bool Push::start()
{
    foreach(PushUrl *url,urlList)
    {
        if(url->enable)
            url->mux->start();
    }
    startTime=QDateTime::currentDateTime();
    preview->start();
    bPushing=true;
    return true;
}

bool Push::stop()
{
    foreach(PushUrl *url,urlList)
    {
        url->mux->stop();
    }
    preview->stop();
    bPushing=false;
    return true;
}

QVariantMap Push::getState()
{
    QVariantMap ret;

    ret["duration"]=QDateTime::currentMSecsSinceEpoch()-startTime.toMSecsSinceEpoch();
    ret["pushing"]=bPushing;
    QVariantList speedList;
    foreach(PushUrl *url,urlList)
    {
        if(bPushing && url->enable)
            speedList<<(url->mux->invoke("getSpeed").toMap()["speed"].toInt()*8/1024);
        else
            speedList<<0;
    }
    ret["speed"]=speedList;
    return ret;
}

bool Push::update(QString json)
{
    config=Json::decode(json).toMap();

    Channel *chn=Config::findChannelById(config["srcA"].toInt());
    if(chn!=NULL)
        srcA=chn->encA;
    chn=Config::findChannelById(config["srcV"].toInt());
    if(chn!=NULL)
        srcV=chn->encV;

    if(srcV==NULL)
        return false;

    QVariantList list=config["url"].toList();

    for(int i=0;i<list.count() || i<urlList.count();i++)
    {
        PushUrl *tmp;
        if(i>=urlList.count())
        {
            tmp=new PushUrl();
            tmp->mux=Link::create("Mux");
            urlList.append(tmp);
        }

        if(i>=list.count())
        {
            urlList.last()->mux->stop(true);
            delete urlList.last()->mux;
            urlList.removeLast();
            continue;
        }

        tmp=urlList[i];

        tmp->enable=list[i].toMap()["enable"].toBool();
        tmp->path=list[i].toMap()["path"].toString();
        QVariantMap data;

        data["path"]=tmp->path;
        if(srcA==NULL)
            data["mute"]=true;
        else
        {
            if(lastSrcA!=NULL && lastSrcA!=srcA)
            {
                lastSrcA->unLinkA(tmp->mux);
                lastSrcA->unLinkA(preview);
            }
            srcA->linkA(tmp->mux);
            srcA->linkA(preview);
        }

        if(lastSrcV!=NULL && lastSrcV!=srcV)
        {
            lastSrcV->unLinkV(tmp->mux);
            lastSrcV->unLinkV(preview);
        }
        srcV->linkV(tmp->mux);
        srcV->linkV(preview);

        tmp->mux->setData(data);

        if(bPushing)
        {
            if(tmp->enable)
                tmp->mux->start();
            else
                tmp->mux->stop();
        }
    }

    lastSrcA=srcA;
    lastSrcV=srcV;

    Json::saveFile(config,"/link/config/push.json");

    return true;
}

