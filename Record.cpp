#include "Record.h"
#include "Config.h"
#include "Json.h"
#include <QProcess>
#include <QFile>

Record::Record(QObject *parent) : QObject(parent)
{
    isRecording=false;
}

void Record::init()
{
    QFile file("/link/config/record.json");
    file.open(QFile::ReadOnly);
    QString json=file.readAll();
    file.close();
    update(json);
}

bool Record::start()
{
    if(isRecording)
        return false;
    QProcess pro;
    QString df="df "+rootPath;
    pro.start(df.toLatin1().data());
    pro.waitForFinished(3000);
    QString str=pro.readAll();
    if(!str.contains(rootPath))
        return false;

    isRecording=true;

    startTime=QDateTime::currentDateTime();

    fileName=startTime.toString("yyyyMMdd_hhmmss");
    QVariantList channels=config["channel"].toList();
    QVariantList formats=config["format"].toList();
    QString path=rootPath+"/"+fileName;
    QString mkdir="mkdir "+path;
    system(mkdir.toLatin1().data());
    foreach(QVariant val,channels)
    {
        int chnId=val.toInt();
        QString chnPath=path+"/"+QString::number(chnId);
        mkdir="mkdir "+chnPath;
        system(mkdir.toLatin1().data());

        QString fullName=chnPath+"/"+fileName+"-"+QString::number(chnId);

        Channel *chn=Config::findChannelById(chnId);
        QString jpg=fullName+".jpg";;
        chn->snap->invoke("snapSync",jpg);

        for(int i=0;i<formats.count();i++)
        {
            QString fmt=formats[i].toString();
            QVariantMap data;
            data["path"]=fullName+"."+fmt;
            if(chn->encA==NULL || chn->encA->getState()!="started")
            {
                data["mute"]=true;
            }
            else
                chn->encA->linkA(muxMap[chnId][i]);

            chn->encV->linkV(muxMap[chnId][i]);
            muxMap[chnId][i]->start(data);
        }
    }

    return true;
}

bool Record::stop()
{
    foreach(int chnId,muxMap.keys())
    {
        foreach(LinkObject* mux,muxMap[chnId])
        {
            mux->stop();
        }
    }
    isRecording=false;

    return true;
}

QVariantMap Record::getState()
{
    QString space="";
    QProcess pro;
    QString df="df -h "+rootPath;
    pro.start(df.toLatin1().data());
    pro.waitForFinished(3000);
    QString str=pro.readAll();
    if(str.contains(rootPath))
    {
        QStringList list=str.split(" ",QString::SkipEmptyParts);
        space=list[list.count()-3];
    }

    QVariantMap ret;
    ret["isRecording"]=isRecording;
    ret["duration"]=QDateTime::currentMSecsSinceEpoch()-startTime.toMSecsSinceEpoch();
    ret["fileName"]=fileName;
    ret["space"]=space;
    return ret;
}

bool Record::update(QString json)
{
    config=Json::decode(json).toMap();

    rootPath=config["path"].toString();

    QVariantList channels=config["channel"].toList();
    foreach(QVariant val,channels)
    {
        int chnId=val.toInt();
        if(!muxMap.contains(chnId))
        {
            muxMap[chnId]=QList<LinkObject*>();
            for(int i=0;i<6;i++)
            {
                muxMap[chnId].append(Link::create("Mux"));
            }
        }
    }


    Json::saveFile(config,"/link/config/record.json");


    return true;
}

