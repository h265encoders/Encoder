#include "ChannelUSB.h"
#include <QDateTime>
#include <QDir>
#include <QFileInfo>

ChannelUSB::ChannelUSB(QObject *parent) : Channel(parent)
{
    audio=NULL;
    video=Link::create("DecodeV");
    encA=NULL;
    encV=Link::create("EncodeV");
    encV2=Link::create("EncodeV");
    usb=Link::create("InputV4l2");
    MD=Link::create("MotionDetect");
    lastAlarm=0;
    cache=20;
}

void ChannelUSB::init()
{
    video->start();
    usb->linkV(video);
    overlay->linkV(encV);


    video->linkV(MD);
    QObject::connect(MD,SIGNAL(newEvent(QString,QVariant)),this,SLOT(motion(QString,QVariant)));
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
        usb->start();
        encV->start(cfg["encv"].toMap());
        encV2->start(cfg["encv2"].toMap());
    }
    else
    {
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
