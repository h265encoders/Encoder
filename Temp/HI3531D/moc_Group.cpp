/****************************************************************************
** Meta object code from reading C++ file 'Group.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.5.1)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include "../../Group.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'Group.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.5.1. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
struct qt_meta_stringdata_Group_t {
    QByteArrayData data[32];
    char stringdata0[283];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_Group_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_Group_t qt_meta_stringdata_Group = {
    {
QT_MOC_LITERAL(0, 0, 5), // "Group"
QT_MOC_LITERAL(1, 6, 7), // "onTimer"
QT_MOC_LITERAL(2, 14, 0), // ""
QT_MOC_LITERAL(3, 15, 5), // "hello"
QT_MOC_LITERAL(4, 21, 4), // "data"
QT_MOC_LITERAL(5, 26, 11), // "clearMember"
QT_MOC_LITERAL(6, 38, 6), // "update"
QT_MOC_LITERAL(7, 45, 4), // "json"
QT_MOC_LITERAL(8, 50, 10), // "setNetwork"
QT_MOC_LITERAL(9, 61, 3), // "cfg"
QT_MOC_LITERAL(10, 65, 9), // "setEncode"
QT_MOC_LITERAL(11, 75, 9), // "setStream"
QT_MOC_LITERAL(12, 85, 10), // "setStream2"
QT_MOC_LITERAL(13, 96, 10), // "getNetwork"
QT_MOC_LITERAL(14, 107, 7), // "getList"
QT_MOC_LITERAL(15, 115, 10), // "callGetEPG"
QT_MOC_LITERAL(16, 126, 8), // "orderEPG"
QT_MOC_LITERAL(17, 135, 5), // "order"
QT_MOC_LITERAL(18, 141, 6), // "getEPG"
QT_MOC_LITERAL(19, 148, 7), // "syncEPG"
QT_MOC_LITERAL(20, 156, 3), // "epg"
QT_MOC_LITERAL(21, 160, 9), // "createEPG"
QT_MOC_LITERAL(22, 170, 12), // "createEPGXML"
QT_MOC_LITERAL(23, 183, 7), // "epgList"
QT_MOC_LITERAL(24, 191, 6), // "reboot"
QT_MOC_LITERAL(25, 198, 14), // "callSetNetwork"
QT_MOC_LITERAL(26, 213, 3), // "mac"
QT_MOC_LITERAL(27, 217, 14), // "callGetNetwork"
QT_MOC_LITERAL(28, 232, 13), // "callSetEncode"
QT_MOC_LITERAL(29, 246, 13), // "callSetStream"
QT_MOC_LITERAL(30, 260, 10), // "callReboot"
QT_MOC_LITERAL(31, 271, 11) // "callSyncEPG"

    },
    "Group\0onTimer\0\0hello\0data\0clearMember\0"
    "update\0json\0setNetwork\0cfg\0setEncode\0"
    "setStream\0setStream2\0getNetwork\0getList\0"
    "callGetEPG\0orderEPG\0order\0getEPG\0"
    "syncEPG\0epg\0createEPG\0createEPGXML\0"
    "epgList\0reboot\0callSetNetwork\0mac\0"
    "callGetNetwork\0callSetEncode\0callSetStream\0"
    "callReboot\0callSyncEPG"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_Group[] = {

 // content:
       7,       // revision
       0,       // classname
       0,    0, // classinfo
      23,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       0,       // signalCount

 // slots: name, argc, parameters, tag, flags
       1,    0,  129,    2, 0x0a /* Public */,
       3,    1,  130,    2, 0x0a /* Public */,
       5,    0,  133,    2, 0x0a /* Public */,
       6,    1,  134,    2, 0x0a /* Public */,
       8,    1,  137,    2, 0x0a /* Public */,
      10,    1,  140,    2, 0x0a /* Public */,
      11,    1,  143,    2, 0x0a /* Public */,
      12,    1,  146,    2, 0x0a /* Public */,
      13,    0,  149,    2, 0x0a /* Public */,
      14,    0,  150,    2, 0x0a /* Public */,
      15,    0,  151,    2, 0x0a /* Public */,
      16,    1,  152,    2, 0x0a /* Public */,
      18,    0,  155,    2, 0x0a /* Public */,
      19,    1,  156,    2, 0x0a /* Public */,
      21,    0,  159,    2, 0x0a /* Public */,
      22,    1,  160,    2, 0x0a /* Public */,
      24,    0,  163,    2, 0x0a /* Public */,
      25,    2,  164,    2, 0x0a /* Public */,
      27,    1,  169,    2, 0x0a /* Public */,
      28,    2,  172,    2, 0x0a /* Public */,
      29,    2,  177,    2, 0x0a /* Public */,
      30,    1,  182,    2, 0x0a /* Public */,
      31,    1,  185,    2, 0x0a /* Public */,

 // slots: parameters
    QMetaType::Void,
    QMetaType::Void, QMetaType::QVariant,    4,
    QMetaType::Bool,
    QMetaType::Bool, QMetaType::QVariantMap,    7,
    QMetaType::QVariant, QMetaType::QVariant,    9,
    QMetaType::QVariant, QMetaType::QVariant,    9,
    QMetaType::QVariant, QMetaType::QVariant,    9,
    QMetaType::QVariant, QMetaType::QVariant,    9,
    QMetaType::QVariant,
    QMetaType::QVariantList,
    QMetaType::QVariantList,
    QMetaType::QVariantList, QMetaType::QVariantList,   17,
    QMetaType::QVariant,
    QMetaType::QVariant, QMetaType::QVariant,   20,
    QMetaType::Bool,
    QMetaType::Bool, QMetaType::QVariantList,   23,
    QMetaType::Void,
    QMetaType::Bool, QMetaType::QString, QMetaType::QVariantMap,   26,    7,
    QMetaType::QVariantMap, QMetaType::QString,   26,
    QMetaType::Bool, QMetaType::QString, QMetaType::QVariantMap,   26,    7,
    QMetaType::Bool, QMetaType::QString, QMetaType::QVariantMap,   26,    7,
    QMetaType::Bool, QMetaType::QString,   26,
    QMetaType::Bool, QMetaType::QString,   26,

       0        // eod
};

void Group::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        Group *_t = static_cast<Group *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->onTimer(); break;
        case 1: _t->hello((*reinterpret_cast< QVariant(*)>(_a[1]))); break;
        case 2: { bool _r = _t->clearMember();
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 3: { bool _r = _t->update((*reinterpret_cast< QVariantMap(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 4: { QVariant _r = _t->setNetwork((*reinterpret_cast< QVariant(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QVariant*>(_a[0]) = _r; }  break;
        case 5: { QVariant _r = _t->setEncode((*reinterpret_cast< QVariant(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QVariant*>(_a[0]) = _r; }  break;
        case 6: { QVariant _r = _t->setStream((*reinterpret_cast< QVariant(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QVariant*>(_a[0]) = _r; }  break;
        case 7: { QVariant _r = _t->setStream2((*reinterpret_cast< QVariant(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QVariant*>(_a[0]) = _r; }  break;
        case 8: { QVariant _r = _t->getNetwork();
            if (_a[0]) *reinterpret_cast< QVariant*>(_a[0]) = _r; }  break;
        case 9: { QVariantList _r = _t->getList();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 10: { QVariantList _r = _t->callGetEPG();
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 11: { QVariantList _r = _t->orderEPG((*reinterpret_cast< QVariantList(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QVariantList*>(_a[0]) = _r; }  break;
        case 12: { QVariant _r = _t->getEPG();
            if (_a[0]) *reinterpret_cast< QVariant*>(_a[0]) = _r; }  break;
        case 13: { QVariant _r = _t->syncEPG((*reinterpret_cast< QVariant(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QVariant*>(_a[0]) = _r; }  break;
        case 14: { bool _r = _t->createEPG();
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 15: { bool _r = _t->createEPGXML((*reinterpret_cast< QVariantList(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 16: _t->reboot(); break;
        case 17: { bool _r = _t->callSetNetwork((*reinterpret_cast< QString(*)>(_a[1])),(*reinterpret_cast< QVariantMap(*)>(_a[2])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 18: { QVariantMap _r = _t->callGetNetwork((*reinterpret_cast< QString(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QVariantMap*>(_a[0]) = _r; }  break;
        case 19: { bool _r = _t->callSetEncode((*reinterpret_cast< QString(*)>(_a[1])),(*reinterpret_cast< QVariantMap(*)>(_a[2])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 20: { bool _r = _t->callSetStream((*reinterpret_cast< QString(*)>(_a[1])),(*reinterpret_cast< QVariantMap(*)>(_a[2])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 21: { bool _r = _t->callReboot((*reinterpret_cast< QString(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        case 22: { bool _r = _t->callSyncEPG((*reinterpret_cast< QString(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< bool*>(_a[0]) = _r; }  break;
        default: ;
        }
    }
}

const QMetaObject Group::staticMetaObject = {
    { &QObject::staticMetaObject, qt_meta_stringdata_Group.data,
      qt_meta_data_Group,  qt_static_metacall, Q_NULLPTR, Q_NULLPTR}
};


const QMetaObject *Group::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *Group::qt_metacast(const char *_clname)
{
    if (!_clname) return Q_NULLPTR;
    if (!strcmp(_clname, qt_meta_stringdata_Group.stringdata0))
        return static_cast<void*>(const_cast< Group*>(this));
    return QObject::qt_metacast(_clname);
}

int Group::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QObject::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 23)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 23;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 23)
            *reinterpret_cast<int*>(_a[0]) = -1;
        _id -= 23;
    }
    return _id;
}
QT_END_MOC_NAMESPACE
