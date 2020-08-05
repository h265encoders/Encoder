/****************************************************************************
** Meta object code from reading C++ file 'json_rpc_endpoint.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.5.1)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include "../../jcon/json_rpc_endpoint.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'json_rpc_endpoint.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.5.1. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
struct qt_meta_stringdata_jcon__JsonRpcEndpoint_t {
    QByteArrayData data[13];
    char stringdata0[158];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_jcon__JsonRpcEndpoint_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_jcon__JsonRpcEndpoint_t qt_meta_stringdata_jcon__JsonRpcEndpoint = {
    {
QT_MOC_LITERAL(0, 0, 21), // "jcon::JsonRpcEndpoint"
QT_MOC_LITERAL(1, 22, 18), // "jsonObjectReceived"
QT_MOC_LITERAL(2, 41, 0), // ""
QT_MOC_LITERAL(3, 42, 3), // "obj"
QT_MOC_LITERAL(4, 46, 6), // "sender"
QT_MOC_LITERAL(5, 53, 15), // "socketConnected"
QT_MOC_LITERAL(6, 69, 6), // "socket"
QT_MOC_LITERAL(7, 76, 18), // "socketDisconnected"
QT_MOC_LITERAL(8, 95, 11), // "socketError"
QT_MOC_LITERAL(9, 107, 28), // "QAbstractSocket::SocketError"
QT_MOC_LITERAL(10, 136, 5), // "error"
QT_MOC_LITERAL(11, 142, 9), // "dataReady"
QT_MOC_LITERAL(12, 152, 5) // "bytes"

    },
    "jcon::JsonRpcEndpoint\0jsonObjectReceived\0"
    "\0obj\0sender\0socketConnected\0socket\0"
    "socketDisconnected\0socketError\0"
    "QAbstractSocket::SocketError\0error\0"
    "dataReady\0bytes"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_jcon__JsonRpcEndpoint[] = {

 // content:
       7,       // revision
       0,       // classname
       0,    0, // classinfo
       5,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       4,       // signalCount

 // signals: name, argc, parameters, tag, flags
       1,    2,   39,    2, 0x06 /* Public */,
       5,    1,   44,    2, 0x06 /* Public */,
       7,    1,   47,    2, 0x06 /* Public */,
       8,    2,   50,    2, 0x06 /* Public */,

 // slots: name, argc, parameters, tag, flags
      11,    2,   55,    2, 0x08 /* Private */,

 // signals: parameters
    QMetaType::Void, QMetaType::QJsonObject, QMetaType::QObjectStar,    3,    4,
    QMetaType::Void, QMetaType::QObjectStar,    6,
    QMetaType::Void, QMetaType::QObjectStar,    6,
    QMetaType::Void, QMetaType::QObjectStar, 0x80000000 | 9,    6,   10,

 // slots: parameters
    QMetaType::Void, QMetaType::QByteArray, QMetaType::QObjectStar,   12,    6,

       0        // eod
};

void jcon::JsonRpcEndpoint::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        JsonRpcEndpoint *_t = static_cast<JsonRpcEndpoint *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->jsonObjectReceived((*reinterpret_cast< const QJsonObject(*)>(_a[1])),(*reinterpret_cast< QObject*(*)>(_a[2]))); break;
        case 1: _t->socketConnected((*reinterpret_cast< QObject*(*)>(_a[1]))); break;
        case 2: _t->socketDisconnected((*reinterpret_cast< QObject*(*)>(_a[1]))); break;
        case 3: _t->socketError((*reinterpret_cast< QObject*(*)>(_a[1])),(*reinterpret_cast< QAbstractSocket::SocketError(*)>(_a[2]))); break;
        case 4: _t->dataReady((*reinterpret_cast< const QByteArray(*)>(_a[1])),(*reinterpret_cast< QObject*(*)>(_a[2]))); break;
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
            typedef void (JsonRpcEndpoint::*_t)(const QJsonObject & , QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcEndpoint::jsonObjectReceived)) {
                *result = 0;
            }
        }
        {
            typedef void (JsonRpcEndpoint::*_t)(QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcEndpoint::socketConnected)) {
                *result = 1;
            }
        }
        {
            typedef void (JsonRpcEndpoint::*_t)(QObject * );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcEndpoint::socketDisconnected)) {
                *result = 2;
            }
        }
        {
            typedef void (JsonRpcEndpoint::*_t)(QObject * , QAbstractSocket::SocketError );
            if (*reinterpret_cast<_t *>(func) == static_cast<_t>(&JsonRpcEndpoint::socketError)) {
                *result = 3;
            }
        }
    }
}

const QMetaObject jcon::JsonRpcEndpoint::staticMetaObject = {
    { &QObject::staticMetaObject, qt_meta_stringdata_jcon__JsonRpcEndpoint.data,
      qt_meta_data_jcon__JsonRpcEndpoint,  qt_static_metacall, Q_NULLPTR, Q_NULLPTR}
};


const QMetaObject *jcon::JsonRpcEndpoint::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *jcon::JsonRpcEndpoint::qt_metacast(const char *_clname)
{
    if (!_clname) return Q_NULLPTR;
    if (!strcmp(_clname, qt_meta_stringdata_jcon__JsonRpcEndpoint.stringdata0))
        return static_cast<void*>(const_cast< JsonRpcEndpoint*>(this));
    return QObject::qt_metacast(_clname);
}

int jcon::JsonRpcEndpoint::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QObject::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 5)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 5;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 5)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 5;
    }
    return _id;
}

// SIGNAL 0
void jcon::JsonRpcEndpoint::jsonObjectReceived(const QJsonObject & _t1, QObject * _t2)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)), const_cast<void*>(reinterpret_cast<const void*>(&_t2)) };
    QMetaObject::activate(this, &staticMetaObject, 0, _a);
}

// SIGNAL 1
void jcon::JsonRpcEndpoint::socketConnected(QObject * _t1)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)) };
    QMetaObject::activate(this, &staticMetaObject, 1, _a);
}

// SIGNAL 2
void jcon::JsonRpcEndpoint::socketDisconnected(QObject * _t1)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)) };
    QMetaObject::activate(this, &staticMetaObject, 2, _a);
}

// SIGNAL 3
void jcon::JsonRpcEndpoint::socketError(QObject * _t1, QAbstractSocket::SocketError _t2)
{
    void *_a[] = { Q_NULLPTR, const_cast<void*>(reinterpret_cast<const void*>(&_t1)), const_cast<void*>(reinterpret_cast<const void*>(&_t2)) };
    QMetaObject::activate(this, &staticMetaObject, 3, _a);
}
QT_END_MOC_NAMESPACE
