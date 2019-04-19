#ifndef RECORD_H
#define RECORD_H

#include <QObject>
#include "Link.h"
#include <QDateTime>

class Record : public QObject
{
    Q_OBJECT
public:
    explicit Record(QObject *parent = 0);
    void init();
private:
    QMap<int,QList<LinkObject*>> muxMap;
    bool isRecording;
    QDateTime startTime;
    QString fileName;
    QString rootPath;
    QVariantMap config;
signals:

public slots:
    bool start();
    bool stop();
    QVariantMap getState();
    bool update(QString json);
};
extern Record *GRecord;
#endif // RECORD_H
