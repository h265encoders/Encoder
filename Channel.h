#ifndef CHANNEL_H
#define CHANNEL_H

#include <QObject>
#include "Link.h"
#include <QMap>
#include <QTimer>

struct CdType
{
    QString type = "";
    int layListIndex = -1;
    int startTime = -1;
    int durTime = -1;

    QString toString()
    {
        return "type:"+type+","
                +",layListIndex:"+QString::number(layListIndex)
                +",startTime:"+QString::number(startTime)
                +",durTime:"+QString::number(durTime);
    }
};

class Channel : public QObject
{
    Q_OBJECT
public:
    explicit Channel(QObject *parent = 0);
    virtual void init(QVariantMap cfg=QVariantMap());
    virtual void updateConfig(QVariantMap cfg);
    void doSnap();
    QString type;
    bool enableAVS;    
    bool isSrcLine;
    int id;

    static LinkObject *lineIn;
    static LinkObject *alsa;
    QVariantMap data;
    LinkObject *audio;
    LinkObject *video;
    LinkObject *volume;
    LinkObject *encA;
    LinkObject *encV;
    LinkObject *gain;

    LinkObject *overlay;
    LinkObject *snap;
    bool enable;
    static LinkObject *httpServer;
    static LinkObject *rtspServer;
    LinkObject *udp;    
    LinkObject *udp_sub;
    LinkObject *encV2;

    QMap<QString,LinkObject*> muxMap;
    QMap<QString,LinkObject*> muxMap_sub;


    QString chnName;
    QTimer *cd_timer = nullptr,*cd_pauseTimer = nullptr;
    int cd_time = 0;
    QString cd_ctx = "hh:mm:ss";
    QVariantList layList;
    QList<CdType> modList;
    QMap<QString,LinkObject*> formatMap;
    bool isRecord = false;
    QString startRecordTime = nullptr;
    int pauseTime = 0;

    int timerStrToInt(QString time);
    void startRecord(const QString &fileName,const QString &format = "mp4");
    void stopRecord(const QString &format = "mp4");
    void recordPuase(const bool &pause = false);
signals:

public slots:
    void cdTimeout();
    void cdPauseTimeout();

};

#endif // CHANNEL_H
