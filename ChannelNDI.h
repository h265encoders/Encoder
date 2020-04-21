#ifndef CHANNELNDI_H
#define CHANNELNDI_H

#include "Channel.h"

class ChannelNDI : public Channel
{
    Q_OBJECT
public:
    explicit ChannelNDI(QObject *parent = 0);
    virtual void init(QVariantMap);
    virtual void updateConfig(QVariantMap cfg);

private:
    LinkObject *ndi;
    LinkObject *decA;
    QString curName;
signals:

public slots:
};

#endif // CHANNELNDI_H
