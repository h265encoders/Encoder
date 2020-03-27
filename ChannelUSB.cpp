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
    MD=Link::create("MotionDetect");
    lastAlarm=0;
    cache=20;
}

void ChannelUSB::init(QVariantMap)
{
    video->start();
    usb->linkV(video);
    overlay->linkV(encV);

    video->linkV(MD);
    QObject::connect(MD,SIGNAL(newEvent(QString,QVariant)),this,SLOT(motion(QString,QVariant)));


    audio->start();
    alsa->linkA(audio)->linkA(encA);


    Channel::init();
}

void ChannelUSB::updateConfig(QVariantMap cfg)
{
    if(cfg["alarm"].toMap()["enable"].toBool())
    {
        cache=cfg["alarm"].toMap()["cache"].toInt();
        QVariantMap mdData;
        mdData["framerate"]=4;
        mdData["thresh"]=40;//像素亮度差，低于该值不触发
        mdData["area"]=cfg["alarm"].toMap()["thresh"].toInt();//连通域包含最小像素数，低于该值不触发
        MD->start(mdData);
    }
    else
        MD->stop();

    if(cfg["enable"].toBool())
    {
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

bool ChannelUSB::motion(QString type, QVariant data)
{
    QVariantList list=data.toList();
    qDebug()<<type<<list.count();
    qint64 now=QDateTime::currentDateTime().toMSecsSinceEpoch();
    if(now-lastAlarm<400)
        return false;
    lastAlarm=now;
    QString time=QDateTime::currentDateTime().toString("yyyyMMdd_hh:mm:ss");
    snap->invoke("snapSync","/link/web/alarm/"+time+".jpg");

    QDir dir("/link/web/alarm");
    QFileInfoList fileList=dir.entryInfoList();
    int rmCnt=fileList.count()-2-cache;
    for(int i=0;i<rmCnt;i++)
    {
        QFile::remove(fileList[i+2].filePath());
    }


//        for(int i=0;i<list.count();i++)
//        {
//            qDebug()<<list[i].toMap()["area"].toInt()<<list[i].toMap()["rect"].toRectF();
//        }
        return true;
}
