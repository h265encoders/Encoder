#ifndef RPC_H
#define RPC_H

#include <QObject>
//#include "maiaXmlRpcServer.h"
#include <jcon/json_rpc_websocket_server.h>
#include "Link.h"
#include "Group.h"

class RPC : public QObject
{
    Q_OBJECT
public:
    explicit RPC(QObject *parent = 0);
    void init();
private:
    Group *group;
//    MaiaXmlRpcServer *rpcServer;
    jcon::JsonRpcWebSocketServer *rpcServer;
    LinkObject *device;

//    QThread thread;
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
};
extern RPC *GRPC;
#endif // RPC_H
