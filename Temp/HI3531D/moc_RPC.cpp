/****************************************************************************
** Meta object code from reading C++ file 'RPC.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.5.1)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include "../../RPC.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'RPC.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.5.1. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
struct qt_meta_stringdata_RPC_t {
    QByteArrayData data[20];
    char stringdata0[167];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_RPC_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_RPC_t qt_meta_stringdata_RPC = {
    {
QT_MOC_LITERAL(0, 0, 3), // "RPC"
QT_MOC_LITERAL(1, 4, 6), // "update"
QT_MOC_LITERAL(2, 11, 0), // ""
QT_MOC_LITERAL(3, 12, 4), // "json"
QT_MOC_LITERAL(4, 17, 4), // "snap"
QT_MOC_LITERAL(5, 22, 11), // "getSysState"
QT_MOC_LITERAL(6, 34, 13), // "getInputState"
QT_MOC_LITERAL(7, 48, 11), // "getNetState"
QT_MOC_LITERAL(8, 60, 6), // "getEPG"
QT_MOC_LITERAL(9, 67, 11), // "getPlayList"
QT_MOC_LITERAL(10, 79, 9), // "getVolume"
QT_MOC_LITERAL(11, 89, 15), // "getPlayPosition"
QT_MOC_LITERAL(12, 105, 4), // "play"
QT_MOC_LITERAL(13, 110, 5), // "index"
QT_MOC_LITERAL(14, 116, 4), // "time"
QT_MOC_LITERAL(15, 121, 12), // "getPushSpeed"
QT_MOC_LITERAL(16, 134, 5), // "getSN"
QT_MOC_LITERAL(17, 140, 10), // "getNDIList"
QT_MOC_LITERAL(18, 151, 10), // "setNetDhcp"
QT_MOC_LITERAL(19, 162, 4) // "dhcp"

    },
    "RPC\0update\0\0json\0snap\0getSysState\0"
    "getInputState\0getNetState\0getEPG\0"
    "getPlayList\0getVolume\0getPlayPosition\0"
    "play\0index\0time\0getPushSpeed\0getSN\0"
    "getNDIList\0setNetDhcp\0dhcp"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_RPC[] = {

 // content:
       7,       // revision
       0,       // classname
       0,    0, // classinfo
      15,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       0,       // signalCount

 // slots: name, argc, parameters, tag, flags
       1,    1,   89,    2, 0x0a /* Public */,
       4,    0,   92,    2, 0x0a /* Public */,
       5,    0,   93,    2, 0x0a /* Public */,
       6,    0,   94,    2, 0x0a /* Public */,
       7,    0,   95,    2, 0x0a /* Public */,
       8,    0,   96,    2, 0x0a /* Public */,
       9,    0,   97,    2, 0x0a /* Public */,
      10,    0,   98,    2, 0x0a /* Public */,
      11,    0,   99,    2, 0x0a /* Public */,
      12,    2,  100,    2, 0x0a /* Public */,
      15,    0,  105,    2, 0x0a /* Public */,
      16,    0,  106,    2, 0x0a /* Public */,
      17,    0,  107,    2, 0x0a /* Public */,
      18,    1,  108,    2, 0x0a /* Public */,
      18,    0,  111,    2, 0x2a /* Public | MethodCloned */,

 // slots: parameters
    QMetaType::Bool, QMetaType::QString,    3,
    QMetaType::Bool,
    QMetaType::QVariantMap,
    QMetaType::QVariantList,
    QMetaType::QVariantMap,
    QMetaType::QVariantList,
    QMetaType::QVariantList,
    QMetaType::QVariantList,
    QMetaType::QVariantMap,
    QMetaType::Bool, QMetaType::Int, QMetaType::Int,   13,   14,
    QMetaType::QVariantList,
    QMetaType::QString,
    QMetaType::QVariantList,
    QMetaType::Bool, QMetaType::Bool,   19,
    QMetaType::Bool,

       0        // eod
};

void RPC::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        RPC *_t = static_cast<RPC *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: { bool _r = _t->update((*reinterpret_cast< QString(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 1: { bool _r = _t->snap();
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 2: { QVariantMap _r = _t->getSysState();
            if (_a[0]) *reinterpret_cast< QVariantMap*>(_a[0]) = _r; }  break;
        case 3: { QVariantList _r = _t->getInputState();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 4: { QVariantMap _r = _t->getNetState();
            if (_a[0]) *reinterpret_cast< QVariantMap*>(_a[0]) = _r; }  break;
        case 5: { QVariantList _r = _t->getEPG();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 6: { QVariantList _r = _t->getPlayList();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 7: { QVariantList _r = _t->getVolume();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 8: { QVariantMap _r = _t->getPlayPosition();
            if (_a[0]) *reinterpret_cast< QVariantMap*>(_a[0]) = _r; }  break;
        case 9: { bool _r = _t->play((*reinterpret_cast< int(*)>(_a[1])),(*reinterpret_cast< int(*)>(_a[2])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 10: { QVariantList _r = _t->getPushSpeed();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 11: { QString _r = _t->getSN();
            if (_a[0]) *reinterpret_cast< QString*>(_a[0]) = _r; }  break;
        case 12: { QVariantList _r = _t->getNDIList();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 13: { bool _r = _t->setNetDhcp((*reinterpret_cast< const bool(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 14: { bool _r = _t->setNetDhcp();
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        default: ;
        }
    }
}

const QMetaObject RPC::staticMetaObject = {
    { &QObject::staticMetaObject, qt_meta_stringdata_RPC.data,
      qt_meta_data_RPC,  qt_static_metacall, Q_NULLPTR, Q_NULLPTR}
};


const QMetaObject *RPC::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *RPC::qt_metacast(const char *_clname)
{
    if (!_clname) return Q_NULLPTR;
    if (!strcmp(_clname, qt_meta_stringdata_RPC.stringdata0))
        return static_cast<void*>(const_cast< RPC*>(this));
    return QObject::qt_metacast(_clname);
}

int RPC::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QObject::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 15)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 15;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 15)
            *reinterpret_cast<int*>(_a[0]) = -1;
        _id -= 15;
    }
    return _id;
}
QT_END_MOC_NAMESPACE
