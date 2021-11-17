#include "Intercom.h"
#include <QFile>
#include "Json.h"

Intercom::Intercom(QObject *parent) : QObject(parent)
{

}

void Intercom::init()
{
    QVariantMap data;
    ai=Link::create("InputAlsa");
    data["bus"]="0d8c:0014";
    ai->start(data);
    ao=Link::create("OutputAlsa");
    ao->start(data);

    res1=Link::create("Resample");
    data.clear();
    data["num"]=400;
    data["channels"]=1;
    data["samplerate"]=16000;
    res1->start(data);
    res2=Link::create("Resample");
    res2->start();
    intercom=Link::create("Intercom");

    ai->linkA(res1)->linkA(intercom)->linkA(res2)->linkA(ao);

    update(Json::loadFile("/link/config/intercom.json").toMap());
}

bool Intercom::update(QVariantMap cfg)
{
    if(cfg["enable"].toBool())
        intercom->start(cfg);
    else
        intercom->stop();

    Json::saveFile(cfg,"/link/config/intercom.json");
    return true;
}

QVariantList Intercom::getState()
{
    return intercom->invoke("getState").toList();
}

