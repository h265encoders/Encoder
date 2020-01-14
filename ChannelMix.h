#ifndef CHANNELMIX_H
#define CHANNELMIX_H

#include "Channel.h"

class ChannelMix : public Channel
{
    Q_OBJECT
public:
    explicit ChannelMix(QObject *parent = 0);
    virtual void init(QVariantMap);
    virtual void updateConfig(QVariantMap cfg);
private:
    QList<int> curAList;
    LinkObject *outputV;
    LinkObject *outputV2;
    LinkObject *outputA;
    LinkObject *lineOut;

    LinkObject *lastSrc;
    LinkObject *lastSrcA;
    LinkObject *lastSrc2;
    int vgasrc;
signals:

public slots:
};

#endif // CHANNELMIX_H
