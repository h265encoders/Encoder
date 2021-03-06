#include "Config.h"
#include "Json.h"
#include <QVariantList>
#include <QVariantMap>
#include "ChannelVI.h"
#include "ChannelNet.h"
#include "ChannelMix.h"
#include "ChannelUSB.h"
#include "ChannelFile.h"
#include "ChannelNDI.h"

QList<Channel*> Config::chns;
Config::Config(QObject *parent) :
    QObject(parent)
{
}

void Config::loadConfig(QString path)
{
    QVariantList list=Json::loadFile(path).toList();
    if(list.count()==0)
    {
        QString cmd;
        cmd="cp "+path+".bak "+path;
        system(cmd.toLatin1().data());
        list=Json::loadFile(path).toList();
    }

    for(int i=0;i<list.count();i++)
    {
        QVariantMap cfg=list[i].toMap();
        int id=cfg["id"].toInt();
        QString chnName = cfg["name"].toString();
        QString type=cfg["type"].toString();
        Channel *chn=findChannelById(id);
        if(chn==NULL)
        {
            if(type=="vi")
            {
                chn=new ChannelVI();
                if(cfg.contains("avs"))
                {
                    chn->enableAVS=cfg["avs"].toBool();
                }
            }
            else if(type=="net")
                chn=new ChannelNet();
            else if(type=="mix")
                chn=new ChannelMix();
            else if(type=="usb")
                chn=new ChannelUSB();
            else if(type=="file")
                chn=new ChannelFile();
            else if(type=="ndi")
                chn=new ChannelNDI();
            chn->type=type;
            chn->id=id;
            chn->chnName = chnName;
            chn->init(cfg);
            chns.append(chn);
        }
        chn->updateConfig(cfg);
    }

    QString cmd;
    cmd="cp "+path+" "+path+".bak";
    system(cmd.toLatin1().data());
}

Channel *Config::findChannelById(int id)
{
    for(int i=0;i<chns.count();i++)
    {
        if(chns[i]->id==id)
            return chns[i];
    }
    return NULL;
}

