#ifndef CHANNELUSB_H
#define CHANNELUSB_H

#include "Channel.h"

class ChannelUSB : public Channel
{
    Q_OBJECT
public:
    explicit ChannelUSB(QObject *parent = 0);
    virtual void init(QVariantMap);
    virtual void updateConfig(QVariantMap cfg);
private:
    LinkObject *usb;
    LinkObject *alsa;
signals:

public slots:
};

#endif // CHANNELUSB_H
