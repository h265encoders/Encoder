#ifndef CHANNEL_H
#define CHANNEL_H

#include <QObject>
#include "Link.h"
#include <QMap>

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

    static LinkObject *audioMini;
    QVariantMap data;
    LinkObject *audio;
    LinkObject *video;
    LinkObject *volume;
    LinkObject *encA;
    LinkObject *encV;

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
signals:

public slots:

};

#endif // CHANNEL_H
