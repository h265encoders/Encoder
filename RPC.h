#ifndef RPC_H
#define RPC_H

#include <QObject>
#include <jcon/json_rpc_tcp_server.h>
#include "Link.h"
#include "Group.h"
#include <QProcess>

class RPC : public QObject
{
    Q_OBJECT
public:
    explicit RPC(QObject *parent = 0);
    void init();
    QString writeCom(const QString &com);
private:
    Group *group;
    jcon::JsonRpcTcpServer *rpcServer;
    LinkObject *device;
    QProcess procTrans;

    void startTrans();
signals:

public slots:
    bool update(QString json);
    bool snap();
    QVariantMap getSysState();
    QVariantList getInputState();
    QVariantMap getNetState();
    QVariantList getEPG();
    QVariantList getPlayList();
    QVariantList getVolume();
    QVariantMap getPlayPosition();
    bool play(int index,int time);
    QVariantList getPushSpeed();
    QString getSN();
    QVariantList getNDIList();
    bool setNetDhcp(const bool &dhcp = true);
    bool setTrans(QString json);
};
extern RPC *GRPC;
#endif // RPC_H
