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
    LinkObject *MD;
    qint64 lastAlarm;
    int cache;
signals:

public slots:
    bool motion(QString type, QVariant data);
};

#endif // CHANNELUSB_H
