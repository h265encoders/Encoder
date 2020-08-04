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
    LinkObject *vi;
    LinkObject *dei;
    LinkObject *viR;
    LinkObject *AVS;
    LinkObject *alsa;

signals:

public slots:
};

#endif // CHANNELVI_H
