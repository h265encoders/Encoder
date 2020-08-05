<?php
include( "head.php" );
?>
    <div id="alert"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <cn>录制参数</cn>
                        <en>Record config</en>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-sm-2 text-center" style="margin-top: 30px;margin-left: 10px">
                        <strong><cn>通道选择</cn>
                            <en>Channel select</en></strong>
                    </div>
                    <div class="col-sm-9 " style="margin-top: 20px">
                        <div class= row" id="channels"></div>
                    </div>
                </div>
                <div style="margin-top:5px; margin-bottom: 10px;color: red;width: 100%;height: 1px;background: #cccccc"></div>
                <div class="panel-body">
                    <div class="row text-center">
                        <div class="col-md-2 col-xs-4"></div>
                        <div class="col-md-9 col-xs-8">
                            <div class="row">
                                <div class="col-md-2 col-xs-2">MP4</div>
                                <div class="col-md-2 col-xs-2">TS</div>
                                <div class="col-md-2 col-xs-2">FLV</div>
                                <div class="col-md-2 col-xs-2">MKV</div>
                                <div class="col-md-2 col-xs-4">MOV</div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top:5px; margin-bottom: 10px;"/>
                    <div class="row" id="all">
                        <div class="col-md-2 col-xs-4 text-center">
                            <cn>全局控制</cn>
                            <en>Overall config</en>
                        </div>
                        <div class="col-md-9 col-xs-8 text-center">
                            <div class="row">
                                <div class="col-md-2 col-xs-2">
                                    <input type="checkbox" zcfg="mp4" class="switch form-control" id="test">
                                </div>
                                <div class="col-md-2 col-xs-2">
                                    <input type="checkbox" zcfg="ts" class="switch form-control">
                                </div>
                                <div class="col-md-2 col-xs-2">
                                    <input type="checkbox" zcfg="flv" class="switch form-control">
                                </div>
                                <div class="col-md-2 col-xs-2">
                                    <input type="checkbox" zcfg="mkv" class="switch form-control">
                                </div>
                                <div class="col-md-2 col-xs-2">
                                    <input type="checkbox" zcfg="mov" class="switch form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <button type="button" id="save" class="btn btn-warning">
                                <cn>保存参数</cn>
                                <en>Save config</en>
                            </button>
                        </div>
                    </div>
                    <hr style="margin-top:5px; margin-bottom: 10px;"/>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3" id="recBar">
                            <div class="row">
                                <div class="col-sm-2 text-right" style="line-height: 34px;">
                                    <span id="fileName"></span>
<!--                                    <strong id="time">[--:--]</strong>-->
                                </div>
                                <div class="col-sm-6 text-center">
                                    <button type="button" id="startRecord" class="btn btn-warning">
                                        <i class="fa fa-video-camera"></i>
                                        <cn>录制</cn>
                                        <en>Record</en>
                                    </button>
                                    <button type="button" id="stopRecord" class="btn btn-default">
                                        <i class="fa fa-stop"></i>
                                        <cn>全部停止</cn>
                                        <en>Stop All</en>
                                    </button>
                                </div>
                                <div class="col-sm-4 text-left" style="line-height: 34px;">
                                    <cn>已用空间</cn>
                                    <en>Used Space</en>:
                                    <span id="space">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab0" aria-controls="tab0" role="tab" data-toggle="tab"><i class="fa fa-sign-in"></i> <cn>频道信息</cn><en>Channels</en></a></li>
                <li role="presentation" onclick="initList()"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><i class="fa fa-download"></i> <cn>文件下载</cn><en>Download</en></a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab0">
                    <div class="row text-center" style="margin-top: 5px;">
                        <div class="col-md-2 col-xs-2">
                            <cn>频道名称</cn>
                            <en>Video</en>
                        </div>
                        <div class="col-md-8 col-xs-8">
                            <div class="row">
                                <div class="col-md-2 col-xs-2">MP4</div>
                                <div class="col-md-2 col-xs-2">TS</div>
                                <div class="col-md-2 col-xs-2">FLV</div>
                                <div class="col-md-2 col-xs-2">MKV</div>
                                <div class="col-md-2 col-xs-2">MOV</div>
                                <div class="col-md-2 col-xs-2">
                                    <cn>暂停</cn>
                                    <en>pause</en>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2">
                            <cn>录制时间</cn>
                            <en>recordTime</en>
                        </div>
                    </div>
                    <hr style="margin-top:5px; margin-bottom: 10px;"/>
                    <div id="templet">
                        <div class="row text-center">
                            <div class="col-md-2 col-xs-2">
                                <input zcfg="[#].chnName" type="text" class="form-control" disabled="disabled">
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <div class="row text-center">
                                    <div class="col-md-2 col-xs-2">
                                        <input type="checkbox" zcfg="[#].mp4" format="mp4" class="switch form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <input type="checkbox" zcfg="[#].ts" format="ts" class="switch form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <input type="checkbox" zcfg="[#].flv" format="flv" class="switch form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <input type="checkbox" zcfg="[#].mkv" format="mkv" class="switch form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <input type="checkbox" zcfg="[#].mov" format="mov" class="switch form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                        <input type="checkbox" zcfg="[#].isPause" format="isPause" class="switch form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-2">
                                <input zcfg="[#].durTime" type="text" class="form-control" disabled="disabled" style="color: #399bff;border: none;background: none;width: 100%;outline: none;text-align:center" >
                            </div>
                        </div>
                        <hr style="margin-top:10px; margin-bottom: 10px;"/>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="tab1">
                    <div class="row text-center" style="margin-top: 5px;">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row" style="margin-bottom: 20px;margin-left: 200px">
                                        <div class="col-md-10">
                                            <div class="col-md-4 col-md-offset-8">
                                                <input type="text" class="form-control" id="searchVal">
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <button id="search" type="button" class="btn btn-warning">
                                                <cn>搜索</cn>
                                                <en>Search</en>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row" id="fileList"></div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <nav aria-label="...">
                                                <ul class="pagination" id="pagenav">
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="playerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <cn>视频播放</cn>
                        <en>Video player</en>
                    </h4>
                </div>
                <div class="modal-body">
                    <video id="player" controls style="width:100%;height:100%;object-fit: fill"></video>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/switch/bootstrap-switch.js"></script>
    <script src="js/zcfg.js"></script>
    <script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
    <script src="vendor/jwplayer/jwplayer.js"></script>
    <script>

        $( '#playerModal' ).on( 'hidden.bs.modal', function ( e ) {
            $('#player').trigger('pause');
        } )
        function play( url ) {
            $( '#playerModal' ).modal( 'show' )
            var host = window.location.host;
            var path = "http://" + host + url;
            $("#player").attr("src",path);
            $('#player').trigger('play');
        }


        function delFile( name ) {
            $.confirm( {
                title: '<cn>删除文件</cn><en>Delete</en>',
                content: '<cn>是否删除该文件？</cn><en>Confirm to delete this file?</en>',
                buttons: {
                    ok: {
                        text: "<cn>确认</cn><en>Confirm</en>",
                        btnClass: 'btn-warning',
                        keys: [ 'enter' ],
                        action: function () {
                            func( "delFile", {
                                "name": name
                            }, function ( data ) {
                                console.log(data);
                                initList();
                            } );
                        }
                    },
                    cancel: {
                        text: "<cn>取消</cn><en>Cancel</en>",
                        action: function () {}
                    }

                }
            } );

        }

        var fileList = [];
        var totalPage = 0;
        var curPage = 0;
        var eachPage = 20;
        var search = "";
        var config,ini;
        var intervalId = -1;

        function gotoPage( num ) {
            curPage = num;
            $( "#fileList" ).html( "" );
            var html = "";
            $( "#pagenav li" ).each( function ( i, o ) {
                if ( i == num )
                    $( o ).addClass( "active" );
                else
                    $( o ).removeClass( "active" );
            } );
            $.ajaxSettings.async = false;
            for ( var i = num * eachPage; i < fileList.length && i < num * eachPage + eachPage; i++ ) {
                if ( fileList[ i ].type != "directory" )
                    continue;
                var name = fileList[ i ].name;
                var path = '/files/' + name + '/';
                var tmp = "";
                $.getJSON( path, function ( list1 ) {

                    var dirMark = false;
                    for(var i=0;i<list1.length;i++)
                    {
                        for(var j=0;j<ini.length;j++)
                        {
                            if(list1[i].name == ini[j].id+"" && list1[ i ].type == "directory")
                                dirMark = true;
                        }
                    }
                    if(!dirMark)
                        return;
                    tmp = '<div class="col-md-12"><div class="panel panel-default"><div class="panel-heading text-center">'
                        +'<span>'+name+'</span>'
                        +'<button onClick="delFile(\'' + name + '\');" type="button" class="btn btn-sm btn-warning pull-right">'
                        +'<i class="fa fa-trash-o"></i> <cn>删除</cn><en>Delete</en></button></div><div class="panel-body"><div class="row">';
                    for(var i=0;i<list1.length;i++){
                        if ( list1[ i ].type != "directory" )
                            continue;
                        var chnId=parseInt(list1[ i ].name);
                        tmp+='<div class="col-sm-6 col-md-3"><ul class="list-group"><li class="list-group-item text-center">'
                            +'<strong>'+ini[chnId].name+'</strong></li>';
                        var path2 = path +list1[ i ].name+'/';
                        $.getJSON( path2, function ( list2 ) {
                            var tmp2="";
                            var jpg="";
                            var mp4="";
                            for(var i=0;i<list2.length;i++){
                                var name2=list2[i].name;

                                if(name2.indexOf(".jpg")>0)
                                    jpg='<li class="list-group-item img"><img src="'+path2+name2+'" alt="..."></li>';
                                else{
                                    if(name2.indexOf(".mp4")>0)
                                        mp4+='<li class="list-group-item"><a href="'+path2+name2+'" download="' + name2 + '"><i class="fa fa-download"></i>'+name2+'</a><button type="button" class="btn btn-default btn-xs pull-right" onClick="play(\''+path2+name2+'\');"><i class="fa fa-play"></i></button></li>';
                                    else
                                        tmp2+='<li class="list-group-item"><a href="'+path2+name2+'" download="' + name2 + '"><i class="fa fa-download"></i>'+name2+'</a></li>';
                                }
                            }
                            tmp+=jpg+mp4+tmp2+'</ul></div>';
                        });
                    }
                });

                tmp+='</div></div></div></div>';
                html += tmp;
            }
            $.ajaxSettings.async = true;
            $( "#fileList" ).html( html );
        }


        function initList()
        {
            $.getJSON( "files/", function ( list ) {
                fileList=[];
                for(var i=list.length-1;i>=0;i--)
                {
                    if(search != "")
                    {
                        var dirName = list[i].name;
                        if(dirName.indexOf(search) != -1)
                            fileList.push(list[i]);
                    }
                    else
                        fileList.push(list[i]);
                }
                totalPage = Math.ceil( fileList.length / eachPage );

                var nav = "";
                for ( var i = 0; i < totalPage; i++ ) {
                    nav += '<li class="active"><a href="#" onClick="gotoPage('+i+')">'+(i+1)+'</a></li>';
                }
                $( "#pagenav" ).html( nav );
                gotoPage(curPage);
            });
        }

        function formatControl(event,val){
            setTimeout(()=>{
                rpc("rec.execute", [JSON.stringify(config, null, 2)], function (data) {
                    if(!data){
                        htmlAlert("#alert", "danger", "<cn>没有找到外部存储设备！</cn><en>No external storage device was found!</en>", "", 3000);
                        initView();
                        return;
                    }
                    if(intervalId < 0)
                        intervalId = setInterval( onTimer, 1000 );
                });
            },500);
        }

        function onTimer() {
            var channels = config["channels"];
            rpc( "rec.getDurTime", [], function ( data ) {
                var obj = $.parseJSON( data );
                for (var i=0;i<channels.length;i++)
                {
                    var chn = channels[i];
                    var id = chn["id"];
                    id = parseInt(id);
                    if(obj.hasOwnProperty("chn"+id))
                        chn["durTime"] = obj["chn"+id];
                    else
                        chn["durTime"] = "--:--:--";
                }

                var enabledChn = new Array();
                for (var i = 0; i < ini.length; i++) {
                    var id = ini[i].id;
                    for(var j = 0; j< channels.length; j++)
                    {
                        if (id === channels[j].id) {
                            channels[j].chnName = ini[i].name;
                            channels[j].enable = ini[i].enable;
                            if(ini[i].enable)
                                enabledChn.push(channels[j]);
                        }
                    }
                }
                zctemplet("#templet", enabledChn);
                $("#templet .switch").on("switchChange.bootstrapSwitch",function ( event ,data ) {
                    formatControl(event,data);
                });
            });
        }

        function getState() {
            rpc( "rec.getState", null, function ( data ) {
                if($.isEmptyObject(data))
                    $('#space').text("--/--");
                else
                    $('#space').text(data.used + " / " + data.total);
            } );
        }

        function initView() {
            $.getJSON("config/config.json", function (result) {
                ini = result;
                $.getJSON("config/record.json", function (cfg) {
                    config = cfg;
                    var chns = cfg["channels"];
                    var enabledChn = new Array();
                    var html = "";
                    for (var i = 0; i < result.length; i++) {
                        var id = result[i].id;
                        for(var j = 0; j< chns.length; j++)
                        {
                            if (id === chns[j].id) {
                                chns[j].chnName = result[i].name;
                                chns[j].enable = result[i].enable;
                                chns[j].durTime = "--:--:--";
                                if(result[i].enable)
                                {
                                    enabledChn.push(chns[j]);
                                    html += '<div class="col-sm-3"><div class="checkbox"><label><input type="checkbox" name="' + i + '" value="'+result[i].id+'">' + result[ i ].name + '</label></div></div>';
                                }
                            }
                        }
                    }
                    zctemplet("#templet", enabledChn);
                    $("#templet .switch").on("switchChange.bootstrapSwitch",function ( event ,data ) {
                        formatControl(event,data);
                    });
                    zcfg("#all", cfg["any"]);
                    $( "#channels" ).html( html );
                    var channels = cfg.any.chns;
                    for ( var i = 0; i < channels.length; i++ ) {
                        var cid = channels[ i ];
                        $( "#channels input[name='"+cid+"']" ).attr( "checked", true );
                    }
                    initList();
                    getState();
                    intervalId = setInterval( onTimer, 1000 )
                });
            });
        }
        $( function () {
            $.fn.bootstrapSwitch.defaults.size = 'small';
            $.fn.bootstrapSwitch.defaults.onColor = 'warning';
            navIndex( 4 );
            initView();
            });

            $(" #startRecord" ).click(function (e) {
                var checkChns = new Array();
                $("#channels :checked").each(function (i, o) {
                    var val = $(o).attr("value");
                    checkChns.push(val);
                    var channels = config.channels;
                    var any = config.any;
                    for (var i = 0; i < channels.length; i++) {
                        var chn = channels[i];
                        if (val == chn.id) {
                            for (var key in chn) {
                                if (any.hasOwnProperty(key))
                                    chn[key] = any[key];

                            }
                        }
                        channels[i] = chn;
                    }
                    config.channels = channels;
                });
                config["any"].chns = checkChns;
                rpc("rec.execute", [JSON.stringify(config, null, 2)], function (data) {
                    if (typeof (data.error) != "undefined") {
                        htmlAlert("#alert", "danger", "<cn>启动录制失败！</cn><en>Start record failed!</en>", "", 3000);
                    } else {
                        if(!data){
                            htmlAlert("#alert", "danger", "<cn>没有找到外部存储设备！</cn><en>No external storage device was found!</en>", "", 3000);
                            return;
                        }
                        if(intervalId < 0)
                            intervalId = setInterval( onTimer, 1000 );
                        htmlAlert("#alert", "success", "<cn>启动录制成功！</cn><en>Start record success!</en>", "", 3000);
                        $.getJSON("config/record.json", function (cfg) {
                            var chns = cfg["channels"];
                            var enabledChn = new Array();
                            for (var i = 0; i < ini.length; i++) {
                                var id = ini[i].id;
                                for (var j = 0; j < chns.length; j++) {
                                    if (id === chns[j].id) {
                                        chns[j].chnName = ini[i].name;
                                        chns[j].enable = ini[i].enable;
                                        if (ini[i].enable)
                                            enabledChn.push(chns[j]);
                                    }
                                }
                            }
                            zctemplet("#templet", enabledChn);
                            $("#templet .switch").on("switchChange.bootstrapSwitch",function ( event ,data ) {
                                formatControl(event,data);
                            });
                        });
                    }
                })
            });

            $("#stopRecord").click(function (e) {
                rpc( "rec.stop", [], function ( data ) {
                    $.getJSON("config/record.json", function (cfg) {
                        var chns = cfg["channels"];
                        var enabledChn = new Array();
                        for (var i = 0; i < ini.length; i++) {
                            var id = ini[i].id;
                            for(var j = 0; j< chns.length; j++)
                            {
                                if (id === chns[j].id) {
                                    chns[j].chnName = ini[i].name;
                                    chns[j].enable = ini[i].enable;
                                    if(ini[i].enable)
                                        enabledChn.push(chns[j]);
                                }
                            }
                        }
                        zctemplet("#templet", enabledChn);
                        zcfg("#all", cfg["any"]);
                        $("#templet .switch").on("switchChange.bootstrapSwitch",function ( event ,data ) {
                            formatControl(event,data);
                        });
                        clearInterval(intervalId);
                    });
                } );
            });

            $("#save").click(function () {
                var checkChns = new Array();
                $("#channels :checked").each(function (i, o) {
                    var val = $(o).attr("value");
                    checkChns.push(val);
                });
                config["any"].chns = checkChns;
                rpc("rec.update", [JSON.stringify(config, null, 2)], function (data) {
                    htmlAlert("#alert", "success", "<cn>保存成功！</cn><en>Save config success!</en>", "", 3000);
                })
            });

            $("#setAllName").blur(function () {
                $("#setAllName").css("border","solid 1px black")
            });

            $( "#search" ).click( function ( e ) {
                search = $( "#searchVal" ).val();
                initList();
            } );
    </script>
<?php
include( "foot.php" );
?>
