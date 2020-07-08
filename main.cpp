#include <QCoreApplication>
#include <QTextCodec>
#include <QFile>
#include "Link.h"
#include "Config.h"
#include "RPC.h"
#include "Json.h"
#include "Version.h"
#include "Record.h"
#include "Push.h"
#include "UART.h"

RPC *GRPC;
Record *GRecord;
Push *GPush;
UART *GUart;

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);
    QTextCodec *codec = QTextCodec::codecForName("UTF-8");
    QTextCodec::setCodecForLocale(codec);

    if(!Link::init())
        return 0;

    QString ver;
    ver=ver.sprintf("%s build %s_%d",VERSION_VER,VERSION_DATE,VERSION_BUILD);

    QVariantMap version=Json::loadFile("/link/config/version.json").toMap();
        version["app"]=ver;
        version["sdk"]=Link::getVersion()["version"].toString()
                +" build "+Link::getVersion()["date"].toString()
                +"_"+Link::getVersion()["build"].toString();
    Json::saveFile(version,"/link/config/version.json");


    Config::loadConfig(CFGPATH);

    GRecord=new Record();
    GRecord->init();

    GPush=new Push();
    GPush->init();

    GRPC=new RPC();
    GRPC->init();

    GUart=new UART();
    GUart->init();


    return a.exec();
}

