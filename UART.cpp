#include "UART.h"
#include "Json.h"
#include <QFile>

UART::UART(QObject *parent) : QObject(parent),uart(this),socket(this)
{
    rmtPort=0;
}

void UART::init()
{
    QFile file("/link/config/uart.json");
    file.open(QFile::ReadOnly);
    QString json=file.readAll();
    file.close();
    update(json);

    connect(&uart,SIGNAL(readyRead()),this,SLOT(onReadUart()));
    connect(&socket,SIGNAL(readyRead()),this,SLOT(onReadUDP()));
}

bool UART::update(QString json)
{
    QVariantMap cfg=Json::decode(json).toMap();

    if(cfg["device"].toString()!=uart.portName() || cfg["baudRate"].toInt()!=uart.baudRate())
    {
        uart.setPortName(cfg["device"].toString());
        if(uart.open(QIODevice::ReadWrite))
        {
            uart.setBaudRate(cfg["baudRate"].toInt());
            uart.setDataBits(QSerialPort::Data8);
            uart.setParity(QSerialPort::NoParity);
            uart.setFlowControl(QSerialPort::NoFlowControl);
            uart.setStopBits(QSerialPort::OneStop);

        }
        else
        {
            qDebug()<<"can not open uart "<<uart.portName();
        }
    }

    if(cfg["port"].toInt()!=socket.localPort())
    {
        socket.close();
        socket.bind(cfg["port"].toInt());
    }

    if(cfg.contains("ip"))
    {
        rmtIp.setAddress(cfg["ip"].toString());
        rmtPort=cfg["port"].toInt();
    }


    Json::saveFile(cfg,"/link/config/uart.json");

    return true;
}

void UART::onReadUart()
{
    while(uart.bytesAvailable()>0)
    {
        QByteArray ba=uart.readAll();
        if(rmtPort!=0)
            socket.writeDatagram(ba,rmtIp,rmtPort);
    }
}

void UART::onReadUDP()
{
    while(socket.hasPendingDatagrams())
    {
        QByteArray ba;
        ba.resize(socket.pendingDatagramSize());

        socket.readDatagram(ba.data(),ba.size(),&rmtIp,&rmtPort);

        qDebug()<<ba;
        if(uart.isOpen())
            uart.write(ba);
    }
}

