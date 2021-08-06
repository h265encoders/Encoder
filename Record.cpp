#include "Record.h"
#include "Json.h"
#include <QFile>
#include <QDir>
#include <QDateTime>
#include <QProcess>
#include <QJsonArray>
#include <QJsonObject>
#include "Config.h"

Record::Record(QObject *parent) : QObject(parent)
{
    formats << "mp4" << "ts" << "flv" << "mkv" << "mov";
}

void Record::init()
{
    bool hasRecord = false;
    QFile file(RECPATH);
    if(file.exists())
    {
        file.open(QFile::ReadOnly);
        QString json=file.readAll();
        file.close();
        config = Json::decode(json).toMap();
        if(!config.isEmpty() && config.contains("any"))
        {
            hasRecord = true;
            QVariantList channels = config["channels"].toList();
            for(int i=0;i<channels.count();i++)
            {
                QVariantMap chnMap = channels[i].toMap();
                for(QString format : formats)
                    chnMap[format] = false;
                chnMap["isPause"] = false;
                chnMap["startTime"] = "--:--:--";
                channels[i] = chnMap;
            }
            config["channels"] = channels;

            QVariantMap anyMap = config["any"].toMap();
            rootPath = anyMap["path"].toString();

            if(rootPath[rootPath.length()-1] != '/')
                rootPath += "/";
        }
    }

    if(!hasRecord)
    {
        rootPath += "/root/usb/";
        QJsonObject rootObj;

        QJsonObject anyObj;
        anyObj["chns"] = QJsonArray();
        anyObj["mp4"] = false;
        anyObj["flv"] = false;
        anyObj["mkv"] = false;
        anyObj["mov"] = false;
        anyObj["ts"] = false;
        anyObj["fileName"]="";
        anyObj["path"] = rootPath;
        rootObj["any"] = anyObj;

        QJsonArray array;
        QList<Channel*> channels = Config::chns;
        for(Channel *chn : channels)
        {
            QJsonObject obj;
            obj["chnName"] = chn->chnName;
            obj["durTime"] = "--:--:--";
            obj["enable"] = chn->enable;
            obj["fileName"]="";
            obj["flv"] = false;
            obj["id"] = chn->id;
            obj["isPause"] = false;
            obj["mkv"] = false;
            obj["mov"] = false;
            obj["mp4"] = false;
            obj["startTime"] = "--:--:--";
            obj["ts"] = false;
            array << obj;
        }
        rootObj["channels"] = array;
        config = rootObj.toVariantMap();
    }

    Json::saveFile(config,RECPATH);
}


bool Record::update(QString json)
{
    QVariantMap jsonMap = Json::decode(json).toMap();
    config["any"] = jsonMap["any"].toMap();

    QVariantMap anyMap = config["any"].toMap();
    rootPath = anyMap["path"].toString();

    if(rootPath[rootPath.length()-1] != '/')
        rootPath += "/";

    Json::saveFile(config,RECPATH);
    return true;
}

bool Record::execute(const QString &json)
{
    if(!isMountDisk())
        return false;

    QVariantMap anyMap = config["any"].toMap();
    QString fname = anyMap["fileName"].toString();
    if(fname.isEmpty())
        fname = QDateTime::currentDateTime().toString("yyyy-MM-dd_hhmmss");
    config=Json::decode(json).toMap();
    rootPath = anyMap["path"].toString();
    if(rootPath[rootPath.length()-1] != '/')
        rootPath += "/";

    QVariantMap any = config["any"].toMap();
    any["fileName"] = fname;
    QVariantList channels = config["channels"].toList();
    QVariantMap fragment;
    if(any.contains("fragment"))
        fragment = any["fragment"].toMap();
    hasRec = false;

    for(int i=0;i<channels.count();i++)
    {
        QVariantMap chnMap = channels[i].toMap();
        if(!chnMap["enable"].toBool())
            continue;

        int chnId = chnMap["id"].toInt();
        Channel *chn=Config::findChannelById(chnId);
        QString fileName = fname;
        QStringList strs = fileName.split("_");
        fileName = rootPath+fileName+"/"+QString::number(chnId)+"/"+strs[1];
        for(QString format : formats)
        {
            bool recordMark = chnMap[format].toBool();
            if(recordMark)
            {
                hasRec = true;
                QString com = "ls "+fileName+"*."+format + " | wc -l";
                QString result = writeCom(com);
                QString name = fileName+QString::number(result.toInt());

                chn->startRecord(name,format,fragment);
            }
            else
                chn->stopRecord(format);
        }

        bool isPause = chnMap["isPause"].toBool();
        if(isPause)
            chn->recordPuase(true);
        else
            chn->recordPuase(false);

        QString startTime = chn->startRecordTime;
        if(startTime.isEmpty())
            startTime = "--:--:--";
        chnMap["startTime"] = startTime;
        channels[i] = chnMap;
    }
    if(!hasRec)
        any["fileName"] = "";
    config["any"] = any;
    config["channels"] = channels;
    Json::saveFile(config,RECPATH);
    return true;
}



QString Record::getDurTime()
{
    QVariantList channels = config["channels"].toList();
    QVariantMap retMap;
    for(int i=0;i<channels.count();i++)
    {
        QVariantMap chnMap = channels[i].toMap();
        QString id = chnMap["id"].toString();
        QString startTime = chnMap["startTime"].toString();

        Channel *chn=Config::findChannelById(id.toInt());

        if(!startTime.contains("--"))
        {
            QDateTime curTime = QDateTime::currentDateTime();
            int pauseTime = chn->pauseTime;
            int time_t = curTime.toTime_t();
            int diff = time_t - startTime.toInt() - pauseTime;

            int h = diff/3600;
            int m = (diff%3600)/60;
            int s = (diff%3600)%60;

            QString hh = QString::number(h);
            QString mm = QString::number(m);
            QString ss = QString::number(s);

            if(hh.length() < 2)
                hh = "0"+hh;
            if(mm.length() < 2)
                mm = "0"+mm;
            if(ss.length() < 2)
                ss = "0"+ss;

            QString durTime = "hh:mm:ss";
            durTime = durTime.replace("hh",hh);
            durTime = durTime.replace("mm",mm);
            durTime = durTime.replace("ss",ss);
            retMap.insert("chn"+id,durTime);
        }
        else
        {
            retMap.insert("chn"+id,"--:--:--");
        }

    }
    return Json::encode(retMap);
}

QVariantMap Record::getState()
{
    if(!isMountDisk())
        return QVariantMap();
    QProcess process;
    process.start("df -h | grep "+rootPath);
    process.waitForFinished();
    process.readLine();
    QString str = process.readLine();

    str.replace("\n","");
    str.replace(QRegExp("( ){1,}")," ");
    auto lst = str.split(" ");
    QVariantMap obj;
    if(lst.size() >= 6)
    {
        obj["total"] = lst[1];
        obj["used"] = lst[2];
        obj["free"] = lst[3];
        obj["percent"] = lst[4];
    }
    return obj;
}

bool Record::start()
{
    if(!isMountDisk() || hasRec)
        return false;

    QVariantMap anyObj = config["any"].toMap();
    QVariantList chns = anyObj["chns"].toList();

    anyObj["fileName"] = "";
    config["any"] = anyObj;

    QVariantList channels = config["channels"].toList();
    QVariantList list;
    for(int i=0;i<channels.count();i++)
    {
        QVariantMap chnMap = channels[i].toMap();
        if(chns.contains(chnMap["id"]))
        {
            for(QString format:formats)
            {
                chnMap[format] = anyObj[format];
            }
        }
        else
        {
            for(QString format:formats)
            {
                chnMap[format] = false;
            }
        }

        chnMap["duration"] = "--:--:--";
        list << chnMap;
    }
    config["channels"] = list;
    execute(Json::encode(config));
    return true;
}



bool Record::stop()
{
    QVariantMap anyObj = config["any"].toMap();
    anyObj["fileName"] = "";
    config["any"] = anyObj;
    QVariantList channels = config["channels"].toList();
    QVariantList list;
    for(int i=0;i<channels.count();i++)
    {
        QVariantMap chnMap = channels[i].toMap();
        for(QString format:formats)
        {
            chnMap[format] = false;
        }
        chnMap["isPause"] = false;
        chnMap["duration"] = "--:--:--";
        list << chnMap;
    }
    config["channels"] = list;
    execute(Json::encode(config));
    return true;
}

bool Record::isRecordState()
{
    bool isRecord = false;
    QVariantList channels = config["channels"].toList();
    for(int i=0;i<channels.count();i++)
    {
        QVariantMap chnMap = channels[i].toMap();
        for(QString format:formats)
        {
            if(chnMap[format].toBool())
                isRecord = true;
        }
    }

    return isRecord;
}

bool Record::isMountDisk()
{
    QVariantMap anyObj = config["any"].toMap();
    QString path = anyObj["path"].toString();

    if(path.right(1) == "/")
        path = path.left(path.count() -1);

    QString mount = writeCom("df "+path);
    if(!mount.contains(path))
        return false;

    return true;
}


QString Record::writeCom(const QString &com)
{
    QProcess proc;
    QStringList argList;
    argList << "-c" << com;
    proc.start("/bin/sh",argList);
    // 等待进程启动
    proc.waitForFinished();
    proc.waitForReadyRead();
    // 读取进程输出到控制台的数据
    QByteArray procOutput = proc.readAll();
    proc.close();
    return QString(procOutput);
}

