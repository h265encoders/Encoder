#ifndef INTERCOM_H
#define INTERCOM_H

#include <QObject>
#include "Link.h"

class Intercom : public QObject
{
    Q_OBJECT
public:
    explicit Intercom(QObject *parent = 0);
    void init();
    LinkObject *ai;
    LinkObject *ao;
    LinkObject *res1;
    LinkObject *res2;
    LinkObject *intercom;
signals:

public slots:
    bool update(QVariantMap cfg);
    QVariantList getState();
};

extern Intercom *GIntercom;
#endif // INTERCOM_H
