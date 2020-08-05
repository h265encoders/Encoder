#ifndef RECORD_H
#define RECORD_H

#include <QObject>
#include <QVariantMap>
#include <QDebug>

class Record : public QObject
{
    Q_OBJECT
public:
    explicit Record(QObject *parent = 0);
    void init();
private:
    QVariantMap config;
    QString rootPath;
    QStringList formats;
    bool hasRec = false;

    QString writeCom(const QString &com);
public slots:
    bool update(QString json);
    bool execute(const QString &json);
    QString getDurTime();
    QVariantMap getState();
    bool start();
    bool stop();
    bool isRecordState();
};
extern Record *GRecord;
#endif // RECORD_H
