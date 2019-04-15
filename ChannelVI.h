#ifndef CHANNELVI_H
#define CHANNELVI_H

#include "Channel.h"
#include <QVariantMap>

class ChannelVI : public Channel
{
    Q_OBJECT
public:
    explicit ChannelVI(QObject *parent = 0);
    virtual void init();
    virtual void updateConfig(QVariantMap cfg);
    static LinkObject *audioMini;
    LinkObject *vi;
    LinkObject *dei;
    LinkObject *gain;
    bool isSrcLine;
signals:

public slots:
};

#endif // CHANNELVI_H
