QT += core network testlib  websockets xml
QT -= gui

TARGET = Encoder
CONFIG += console  c++14
CONFIG -= app_bundle
chip = HI3521D
#chip=HI3559A
#SDKVER=V2.0.3.0
include(../../LinkLib/Link.pri)
include(../../LinkLib/LinkNDI.pri)
TEMPLATE = app

SOURCES += main.cpp \
    RPC.cpp \
    Group.cpp \
    Channel.cpp \
    ChannelNet.cpp \
    ChannelVI.cpp \
    Config.cpp \
    GroupRPC.cpp \
    ChannelMix.cpp \
    ChannelUSB.cpp \
    ChannelFile.cpp \
    jcon/json_rpc_websocket_server.cpp \
    jcon/json_rpc_websocket.cpp \
    jcon/string_util.cpp \
    jcon/json_rpc_debug_logger.cpp \
    jcon/json_rpc_endpoint.cpp \
    jcon/json_rpc_error.cpp \
    jcon/json_rpc_file_logger.cpp \
    jcon/json_rpc_logger.cpp \
    jcon/json_rpc_request.cpp \
    jcon/json_rpc_server.cpp \
    jcon/json_rpc_success.cpp \
    jcon/json_rpc_client.cpp \
    jcon/json_rpc_tcp_client.cpp \
    jcon/json_rpc_tcp_server.cpp \
    jcon/json_rpc_tcp_socket.cpp \
    jcon/json_rpc_websocket_client.cpp \
    Record.cpp \
    Push.cpp \
    UART.cpp

HEADERS += \
    RPC.h \
    Group.h \
    Channel.h \
    ChannelNet.h \
    ChannelVI.h \
    Config.h \
    GroupRPC.h \
    ChannelMix.h \
    ChannelUSB.h \
    ChannelFile.h \
    jcon/json_rpc_websocket_server.h \
    jcon/json_rpc_websocket.h \
    jcon/string_util.h \
    jcon/json_rpc_debug_logger.h \
    jcon/json_rpc_endpoint.h \
    jcon/json_rpc_error.h \
    jcon/json_rpc_file_logger.h \
    jcon/json_rpc_logger.h \
    jcon/json_rpc_request.h \
    jcon/json_rpc_result.h \
    jcon/json_rpc_server.h \
    jcon/json_rpc_socket.h \
    jcon/json_rpc_success.h \
    jcon/jcon_assert.h \
    jcon/jcon.h \
    jcon/json_rpc_client.h \
    jcon/json_rpc_tcp_client.h \
    jcon/json_rpc_tcp_server.h \
    jcon/json_rpc_tcp_socket.h \
    jcon/json_rpc_websocket_client.h \
    Version.h \
    Record.h \
    Push.h \
    UART.h
