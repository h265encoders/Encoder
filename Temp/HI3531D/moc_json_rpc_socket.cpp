/****************************************************************************
** Meta object code from reading C++ file 'json_rpc_socket.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.5.1)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include "../../jcon/json_rpc_socket.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'json_rpc_socket.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.5.1. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
struct qt_meta_stringdata_jcon__JsonRpcSocket_t {
    QByteArrayData data[10];
    char stringdata0[129];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_jcon__JsonRpcSocket_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_jcon__JsonRpcSocket_t qt_meta_stringdata_jcon__JsonRpcSocket = {
    {
QT_MOC_LITERAL(0, 0, 19), // "jcon::JsonRpcSocket"
QT_MOC_LITERAL(1, 20, 12), // "dataReceived"
QT_MOC_LITERAL(2, 33, 0), // ""
QT_MOC_LITERAL(3, 34, 5), // "bytes"
QT_MOC_LITERAL(4, 40, 6), // "socket"
QT_MOC_LITERAL(5, 47, 15), // "socketConnected"
QT_MOC_LITERAL(6, 63, 18), // "socketDisconnected"
QT_MOC_LITERAL(7, 82, 11), // "socketError"
QT_MOC_LITERAL(8, 94, 28), // "QAbstractSocket::SocketError"
QT_MOC_LITERAL(9, 123, 5) // "error"

    },
    "jcon::JsonRpcSocket\0dataReceived\0\0"
    "bytes\0socket\0socketConnected\0"
    "socketDisconnected\0socketError\0"
    "QAbstractSocket::SocketError\0error"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_jcon__JsonRpcSocket[] = {

 // content:
       7,       // revision
       0,       // classname
       0,    0, // classinfo
       4,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       4,       // signalCount

 // signals: name, argc, parameters, tag, flags
       1,    2,   34,    2, 0x06 /* Public */,
       5,    1,   39,    2, 0x06 /* Public */,
       6,    1,   42,    2, 0x06 /* Public */,
       7,    2,   45,    2, 0x06 /* Public */,

 // signals: parameters
    QMetaType::Void, QMetaType::QByteArray, QMetaType::QObjectStar,    3,    4,
    QMetaType::Void, QMetaType::QObjectStar,    4,
    QMetaType::Void, QMetaType::QObjectStar,    4,
    QMetaType::Void, QMetaType::QObjectStar, 0x80000000 | 8,    4,    9,

       0        // eod
};

void jcon::JsonRpcSocket::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        JsonRpcSocket *_t = static_cast<JsonRpcSocket *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->dataReceived((*reinterpret_cast< const QByteArray(*)>(_a[1])),(*reinterpret_cast< QObject*(*)>(_a[2]))); break;
        case 1: _t->socketConnected((*reinterpret_cast< QObject*(*)>(_a[1]))); break;
        case 2: _t->socketDisconnected((*reinterpret_cast< QObject*(*)>(_a[1]))); break;
        case 3: _t->socketError((*reinterpret_cast< QObject*(*)>(_a[1])),(*reinterpret_cast< QAbstractSocket::SocketError(*)>(_a[2]))); break;
        default: ;
        }
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        switch (_id) {
        default: *reinterpret_cast<int*>(_a[0]) = -1; break;
        case 3:
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
            typedef void (JsonRpcSocket::*_t)(const QByteArray & , QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcSocket::dataReceived)) {
                *result = 0;
            }
        }
        {
            typedef void (JsonRpcSocket::*_t)(QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcSocket::socketConnected)) {
                *result = 1;
            }
        }
        {
            typedef void (JsonRpcSocket::*_t)(QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcSocket::socketDisconnected)) {
                *result = 2;
            }
        }
        {
            typedef void (JsonRpcSocket::*_t)(QObject * , QAbstractSocket::SocketError );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcSocket::socketError)) {
                *result = 3;
            }
        }
    }
}

const QMetaObject jcon::JsonRpcSocket::staticMetaObject = {
    { &QObject::staticMetaObject, qt_meta_stringdata_jcon__JsonRpcSocket.data,
      qt_meta_data_jcon__JsonRpcSocket,  qt_static_metacall, Q_NULLPTR, Q_NULLPTR}
};


const QMetaObject *jcon::JsonRpcSocket::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *jcon::JsonRpcSocket::qt_metacast(const char *_clname)
{
    if (!_clname) return Q_NULLPTR;
    if (!strcmp(_clname, qt_meta_stringdata_jcon__JsonRpcSocket.stringdata0))
        return static_cast<void*>(const_cast< JsonRpcSocket*>(this));
    return QObject::qt_metacast(_clname);
}

int jcon::JsonRpcSocket::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
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
void jcon::JsonRpcSocket::dataReceived(const QByteArray & _t1, QObject * _t2)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)), const_cast<void*>(reinterpret_cast<const void*>(&_t2)) };
    QMetaObject::activate(this, &staticMetaObject, 0, _a);
}

// SIGNAL 1
void jcon::JsonRpcSocket::socketConnected(QObject * _t1)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)) };
    QMetaObject::activate(this, &staticMetaObject, 1, _a);
}

// SIGNAL 2
void jcon::JsonRpcSocket::socketDisconnected(QObject * _t1)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)) };
    QMetaObject::activate(this, &staticMetaObject, 2, _a);
}

// SIGNAL 3
void jcon::JsonRpcSocket::socketError(QObject * _t1, QAbstractSocket::SocketError _t2)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)), const_cast<void*>(reinterpret_cast<const void*>(&_t2)) };
    QMetaObject::activate(this, &staticMetaObject, 3, _a);
}
QT_END_MOC_NAMESPACE
