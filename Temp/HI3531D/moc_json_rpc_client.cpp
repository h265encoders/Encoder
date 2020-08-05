/****************************************************************************
** Meta object code from reading C++ file 'json_rpc_client.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.5.1)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include "../../jcon/json_rpc_client.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'json_rpc_client.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.5.1. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
struct qt_meta_stringdata_jcon__JsonRpcClient_t {
    QByteArrayData data[10];
    char stringdata0[135];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_jcon__JsonRpcClient_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_jcon__JsonRpcClient_t qt_meta_stringdata_jcon__JsonRpcClient = {
    {
QT_MOC_LITERAL(0, 0, 19), // "jcon::JsonRpcClient"
QT_MOC_LITERAL(1, 20, 15), // "socketConnected"
QT_MOC_LITERAL(2, 36, 0), // ""
QT_MOC_LITERAL(3, 37, 6), // "socket"
QT_MOC_LITERAL(4, 44, 18), // "socketDisconnected"
QT_MOC_LITERAL(5, 63, 11), // "socketError"
QT_MOC_LITERAL(6, 75, 28), // "QAbstractSocket::SocketError"
QT_MOC_LITERAL(7, 104, 5), // "error"
QT_MOC_LITERAL(8, 110, 20), // "jsonResponseReceived"
QT_MOC_LITERAL(9, 131, 3) // "obj"

    },
    "jcon::JsonRpcClient\0socketConnected\0"
    "\0socket\0socketDisconnected\0socketError\0"
    "QAbstractSocket::SocketError\0error\0"
    "jsonResponseReceived\0obj"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_jcon__JsonRpcClient[] = {

 // content:
       7,       // revision
       0,       // classname
       0,    0, // classinfo
       4,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       3,       // signalCount

 // signals: name, argc, parameters, tag, flags
       1,    1,   34,    2, 0x06 /* Public */,
       4,    1,   37,    2, 0x06 /* Public */,
       5,    2,   40,    2, 0x06 /* Public */,

 // slots: name, argc, parameters, tag, flags
       8,    1,   45,    2, 0x08 /* Private */,

 // signals: parameters
    QMetaType::Void, QMetaType::QObjectStar,    3,
    QMetaType::Void, QMetaType::QObjectStar,    3,
    QMetaType::Void, QMetaType::QObjectStar, 0x80000000 | 6,    3,    7,

 // slots: parameters
    QMetaType::Void, QMetaType::QJsonObject,    9,

       0        // eod
};

void jcon::JsonRpcClient::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        JsonRpcClient *_t = static_cast<JsonRpcClient *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->socketConnected((*reinterpret_cast< QObject*(*)>(_a[1]))); break;
        case 1: _t->socketDisconnected((*reinterpret_cast< QObject*(*)>(_a[1]))); break;
        case 2: _t->socketError((*reinterpret_cast< QObject*(*)>(_a[1])),(*reinterpret_cast< QAbstractSocket::SocketError(*)>(_a[2]))); break;
        case 3: _t->jsonResponseReceived((*reinterpret_cast< const QJsonObject(*)>(_a[1]))); break;
        default: ;
        }
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        switch (_id) {
        default: *reinterpret_cast<int*>(_a[0]) = -1; break;
        case 2:
            switch (*reinterpret_cast<int*>(_a[1])) {
            default: *reinterpret_cast<int*>(_a[0]) = -1; break;
            case 1:
                *reinterpret_cast<int*>(_a[0]) = qRegisterMetaType< QAbstractSocket::SocketError >(); break;
            }
            break;
        }
    } else if (_c == QMetaObject::IndexOfMethod) {
        int *result = reinterpret_cast<int *>(_a[0]);
        void **func = reinterpret_cast<void **>(_a[1]);
        {
            typedef void (JsonRpcClient::*_t)(QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcClient::socketConnected)) {
                *result = 0;
            }
        }
        {
            typedef void (JsonRpcClient::*_t)(QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcClient::socketDisconnected)) {
                *result = 1;
            }
        }
        {
            typedef void (JsonRpcClient::*_t)(QObject * , QAbstractSocket::SocketError );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcClient::socketError)) {
                *result = 2;
            }
        }
    }
}

const QMetaObject jcon::JsonRpcClient::staticMetaObject = {
    { &QObject::staticMetaObject, qt_meta_stringdata_jcon__JsonRpcClient.data,
      qt_meta_data_jcon__JsonRpcClient,  qt_static_metacall, Q_NULLPTR, Q_NULLPTR}
};


const QMetaObject *jcon::JsonRpcClient::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *jcon::JsonRpcClient::qt_metacast(const char *_clname)
{
    if (!_clname) return Q_NULLPTR;
    if (!strcmp(_clname, qt_meta_stringdata_jcon__JsonRpcClient.stringdata0))
        return static_cast<void*>(const_cast< JsonRpcClient*>(this));
    return QObject::qt_metacast(_clname);
}

int jcon::JsonRpcClient::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QObject::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 4)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 4;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 4)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 4;
    }
    return _id;
}

// SIGNAL 0
void jcon::JsonRpcClient::socketConnected(QObject * _t1)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)) };
    QMetaObject::activate(this, &staticMetaObject, 0, _a);
}

// SIGNAL 1
void jcon::JsonRpcClient::socketDisconnected(QObject * _t1)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)) };
    QMetaObject::activate(this, &staticMetaObject, 1, _a);
}

// SIGNAL 2
void jcon::JsonRpcClient::socketError(QObject * _t1, QAbstractSocket::SocketError _t2)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)), const_cast<void*>(reinterpret_cast<const void*>(&_t2)) };
    QMetaObject::activate(this, &staticMetaObject, 2, _a);
}
QT_END_MOC_NAMESPACE
