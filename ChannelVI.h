#ifndef CHANNELVI_H
#define CHANNELVI_H

#include "Channel.h"
#include <QVariantMap>

class ChannelVI : public Channel
{
    Q_OBJECT
public:
    explicit ChannelVI(QObject *parent = 0);
    virtual void init(QVariantMap cfg);
    virtual void updateConfig(QVariantMap cfg);
    static LinkObject *audioMini;
    LinkObject *vi;
    LinkObject *dei;
    LinkObject *gain;
    bool isSrcLine;
    LinkObject *viR;
    LinkObject *AVS;

signals:

public slots:
};

#endif // CHANNELVI_H
