#ifndef UART_H
#define UART_H

#include <QObject>
#include <QUdpSocket>
#include <QSerialPort>
#include <QHostAddress>

class UART : public QObject
{
    Q_OBJECT
public:
    explicit UART(QObject *parent = 0);
    void init();
private:
    QSerialPort uart;
    QUdpSocket socket;
    quint16 rmtPort;
    QHostAddress rmtIp;
signals:

public slots:
    bool update(QString json);
    void onReadUart();
    void onReadUDP();
};
extern UART *GUart;
#endif // UART_H
