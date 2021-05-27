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
                    <!--<div style="position: absolute;right: 35px;top: 6px;font-size: 20px;cursor:pointer;">
                        <i class="fa fa-cog" aria-hidden="true" onclick="onSetting()"></i>
                    </div>-->
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
                        <cn id="playTitleCn">视频播放</cn>
                        <en id="playTitleEn">Video player</en>
                    </h4>
                </div>
                <div class="modal-body">
                    <video id="player" controls style="width:100%;height:100%;object-fit: fill"></video>
                </div>
                <div class="modal-footer" id="btnBox">
                    <button type="button" class="btn btn-warning" onclick="onPlayFragment('previous')">
                        <cn>上个分段</cn>
                        <en>Previous Fragment</en>
                    </button>
                    <button type="button" class="btn btn-warning" onclick="onPlayFragment('next')">
                        <cn>下个分段</cn>
                        <en>Next Fragment</en>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="setModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content text-dark" style="border: none">
                <div class="panel panel-default">
                    <div class="title">
                        <div class="row">
                            <div class="col-md-10 col-sm-10">
                                <h3 class="panel-title">
                                    <cn>MP4分段设置</cn>
                                    <en>MP4 Fragment Setting</en>
                                </h3>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <form class="form-horizontal text-center" role="form" id="segment">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">
                                        <div class="row">
                                            <div class="col-sm-4 col-sm-offset-4" style="padding: 0">
                                                <cn>时长分段</cn>
                                                <en>Time</en>
                                            </div>
                                            <div class="col-sm-3" style="font-size: 12px;color: #aaaaaa;padding: 0">
                                                <cn>[单位秒]</cn>
                                                <en>[unit s]</en>
                                            </div>
                                        </div>
                                    </label>
                                    <div class="col-sm-4">
                                        <input zcfg="segmentDura" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="segmentDuraEnable" zcfg="segmentDuraEnable" type="checkbox" class="switch form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">
                                        <div class="row">
                                            <div class="col-sm-4 col-sm-offset-4" style="padding: 0">
                                                <cn>大小分段</cn>
                                                <en>Size</en>
                                            </div>
                                            <div class="col-sm-3" style="font-size: 12px;color: #aaaaaa;padding: 0">
                                                <cn>[单位M]</cn>
                                                <en>[unit M]</en>
                                            </div>
                                        </div>
                                    </label>
                                    <div class="col-sm-4">
                                        <input zcfg="segmentSize" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="segmentSizeEnable" zcfg="segmentSizeEnable" type="checkbox" class="switch form-control">
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 20px">
                                    <div id="info" class="col-sm-10 col-sm-offset-1" style="color: red;display: none")>
                                        <cn>*检查到当前正在录制,请全部停止后在继续</cn>
                                        <en>*Check that recording is under way, please stop all and continue</en>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 20px">
                                    <div class="col-sm-6 col-sm-offset-6">
                                        <div class="row">
                                            <div class="col-sm-3 col-sm-offset-3">
                                                <button type="button" class=" save btn btn-warning" data-dismiss="modal">
                                                    <cn>取消</cn>
                                                    <en>Cancel</en>
                                                </button>
                                            </div>
                                            <div class="col-sm-2 col-sm-offset-1">
                                                <button type="button" class=" save btn btn-warning" onclick="setMp4Segment()">
                                                    <cn>设定</cn>
                                                    <en>Save</en>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/switch/bootstrap-switch.js"></script>
    <script src="js/zcfg.js"></script>
    <script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
    <script src="vendor/jwplayer/jwplayer.js"></script>
    <script>

        var fileList = [];
        var totalPage = 0;
        var curPage = 0;
        var eachPage = 20;
        var search = "";
        var config,ini;
        var intervalId = -1;
        var playPath,playName;
        var playStart,playCount;
        var fragmentData;

        $("#playerModal,#setModal").on('show.bs.modal', function(){
            var $this = $(this);
            var $modal_dialog = $this.find('.modal-dialog');
            // 关键代码，如没将modal设置为 block，则$modala_dialog.height() 为零
            $this.css('display', 'block');
            $modal_dialog.css({'margin-top': Math.max(0, ($(window).height() - $modal_dialog.height()) / 2) });
        });
        $("#setModal").on('hide.bs.modal', function(){
            $("#info").hide();
        });

        $( '#playerModal' ).on( 'hidden.bs.modal', function ( e ) {
            $('#player').trigger('pause');
        } )
        function play( path,name,start,count) {
            $( '#playerModal' ).modal( 'show' );
            playPath = path;
            playName = name;
            playStart = parseInt(start);
            playCount = parseInt(count);
            var host = window.location.host;
            var path = "http://" + host + path + name +"_"+start+".mp4";
            $("#player").attr("src",path);
            $('#player').trigger('play');
            if(count > 1){
                $("#playTitleCn").html("视频播放(　分段1　)");
                $("#playTitleEn").html("Video player(　Fragment 1　)");
                $("#btnBox").show();
            } else {
                $("#playTitleCn").html("视频播放");
                $("#playTitleEn").html("Video player");
                $("#btnBox").hide();
            }

        }

        function onPlayFragment(type){
            var curUrl = $("#player").attr("src");
            var list = curUrl.split("_");
            var curNum = list[2].substring(0,1);
            if(type == "next") {
                var nextNum = parseInt(curNum)+1;
                if(nextNum < playStart+playCount){
                    var url = "http://"+location.hostname+playPath+playName+"_"+nextNum+".mp4";
                    $("#playTitleCn").html("视频播放(　分段"+(nextNum-playStart+1)+"　)");
                    $("#playTitleEn").html("Video player(　Fragment "+(nextNum-playStart+1)+"　)");
                    $("#player").attr("src",url);
                    $('#player').trigger('play');
                }
            } else {
                var preNum = parseInt(curNum)-1;
                if(preNum >= playStart){
                    var url = "http://"+location.hostname+playPath+playName+"_"+preNum+".mp4";
                    $("#playTitleCn").html("视频播放(　分段"+(preNum-playStart+1)+"　)");
                    $("#playTitleEn").html("Video player(　Fragment "+(preNum-playStart+1)+"　)");
                    $("#player").attr("src",url);
                    $('#player').trigger('play');
                }
            }

        }

        $("#player")[0].addEventListener('ended', function(e) {
            var curUrl = $("#player").attr("src");
            var list = curUrl.split("_");
            var curNum = list[2].substring(0,1);
            var nextNum = parseInt(curNum)+1;
            if(nextNum < playStart+playCount){
                var url = "http://"+location.hostname+playPath+playName+"_"+nextNum+".mp4";
                $("#playTitleCn").html("视频播放(　分段"+(nextNum-playStart+1)+"　)");
                $("#playTitleEn").html("Video player(　Fragment "+(nextNum-playStart+1)+"　)");
                $("#player").attr("src",url);
                $('#player').trigger('play');
            }
        })

        function onSetting() {
            $( '#setModal' ).modal( 'show' );
            var segmentDura=0,segmentSize=0;
            var segmentDuraEnable = false,segmentSizeEnable=false;
            var fragment = config["any"]["fragment"];
            if(config["any"].hasOwnProperty("fragment")){
                if(fragment.hasOwnProperty("segmentDura"))
                    segmentDura = fragment["segmentDura"];
                if(fragment.hasOwnProperty("segmentSize"))
                    segmentSize = fragment["segmentSize"];
                if(fragment.hasOwnProperty("segmentDuraEnable"))
                    segmentDuraEnable = fragment["segmentDuraEnable"];
                if(fragment.hasOwnProperty("segmentSizeEnable"))
                    segmentSizeEnable = fragment["segmentSizeEnable"];
            }
            fragmentData = {
                segmentDura: segmentDura,
                segmentSize: segmentSize,
                segmentDuraEnable: segmentDuraEnable,
                segmentSizeEnable: segmentSizeEnable
            }
            zcfg( "#segment", fragmentData );
        }
        
        function setMp4Segment() {
            rpc("rec.isRecordState", [], function (data) {
                if(data) {
                    $("#info").show();
                    return;
                }
                config["any"].fragment = fragmentData;
                rpc("rec.update", [JSON.stringify(config, null, 2)], function (data) {
                    $( '#setModal' ).modal( 'hide' );
                    htmlAlert("#alert", "success", "<cn>保存成功！</cn><en>Save config success!</en>", "", 3000);
                })
            })


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
                            var start = 0;
                            var count = 0;
                            var mark = "";

                            for(var i=0;i<list2.length;i++){
                                var name2=list2[i].name;

                                if(name2.indexOf(".jpg")>0)
                                    jpg='<li class="list-group-item img"><img src="'+path2+name2+'" alt="..."></li>';
                                else{
                                    if(name2.indexOf(".mp4")>0) {
                                        var nList = name2.split("_");
                                        var nn = nList[0].substring(0,7);
                                        var num = nList[1];
                                        num = num.substring(0,num.indexOf(".mp4"));
                                        if(mark == ""){
                                            mark = nn;
                                            start = num;
                                        }

                                        if(nn != mark){
                                            var mp4Name = mark + ".mp4";
                                            //mp4+='<li class="list-group-item" start="'+start+'" count="'+count+'"><a href="'+path2+mp4Name+'" download="' + mp4Name + '"><i class="fa fa-download"></i>'+mp4Name+'</a><button type="button" class="btn btn-default btn-xs pull-right" onClick="play(\''+path2+mp4Name+'\');"><i class="fa fa-play"></i></button></li>';
                                            mp4+='<li class="list-group-item"><a href="javascript:void(0)" onclick="onDownloadMp4(\''+path2+'\',\''+mark+'\',\''+start+'\',\''+count+'\')"><i class="fa fa-download"></i>'+mp4Name+'</a><button type="button" class="btn btn-default btn-xs pull-right" onClick="play(\''+path2+'\',\''+mark+'\',\''+start+'\',\''+count+'\');"><i class="fa fa-play"></i></button></li>';
                                            mark = nn;
                                            count = 0;
                                            start = num;
                                        }
                                        count++;
                                        if(i == list2.length -1){
                                            var mp4Name = mark + ".mp4";
                                            mp4+='<li class="list-group-item"><a href="javascript:void(0)" onclick="onDownloadMp4(\''+path2+'\',\''+mark+'\',\''+start+'\',\''+count+'\')"><i class="fa fa-download"></i>'+mp4Name+'</a><button type="button" class="btn btn-default btn-xs pull-right" onClick="play(\''+path2+'\',\''+mark+'\',\''+start+'\',\''+count+'\');"><i class="fa fa-play"></i></button></li>';
                                        }
                                    } else {
                                        tmp2+='<li class="list-group-item"><a href="'+path2+name2+'" download="' + name2 + '"><i class="fa fa-download"></i>'+name2+'</a></li>';
                                    }
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

        function onDownloadMp4(path,name,startNum,count) {
            for(var i=0;i<count;i++){
                var url = path+name+"_"+(parseInt(startNum)+i)+".mp4";
                var a = document.createElement('a');
                var e = document.createEvent('MouseEvents');
                e.initEvent('click', false, false);
                a.href = url;
                a.download = name+"_"+(i+1)+".mp4";
                a.dispatchEvent(e)
            }
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

        function formatControl(event,val){
            setTimeout(()=>{
                rpc("rec.isMountDisk", [], function (data) {
                    if(!data){
                        initView();
                        setTimeout(function () {
                            htmlAlert("#alert", "danger", "<cn>没有找到外部存储设备！</cn><en>No external storage device was found!</en>", "", 3000);
                        },500);
                        return;
                    }
                    rpc("rec.execute", [JSON.stringify(config, null, 2)], function (data) {
                        if(intervalId < 0)
                            intervalId = setInterval( onTimer, 1000 );
                    });
                });
            },500);
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

        function getState() {
            rpc( "rec.getState", null, function ( data ) {
                if($.isEmptyObject(data))
                    $('#space').text("--/--");
                else
                    $('#space').text(data.used + " / " + data.total);
            } );
        }

        function initView() {
            var formats = ["mp4","ts","flv","mkv","mov"];
            $.getJSON("config/config.json", function (result) {
                ini = result;
                $.getJSON("config/record.json", function (cfg) {
                    config = cfg;
                    var chns = cfg["channels"];
                    var enabledChn = new Array();
                    var html = "";
                    var isRecordMark = false;
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
                                    for(var k=0;k<formats.length;k++){
                                        if(chns[j][formats[k]])
                                            isRecordMark = true;
                                    }
                                    enabledChn.push(chns[j]);
                                    html += '<div class="col-sm-3"><div class="checkbox"><label><input type="checkbox" name="' + i + '" value="'+result[i].id+'">' + result[ i ].name + '</label></div></div>';
                                }
                            }
                        }
                    }
                    $( "#channels" ).html( html );
                    var channels = cfg.any.chns;
                    for ( var i = 0; i < channels.length; i++ ) {
                        var cid = channels[ i ];
                        $( "#channels input[name='"+cid+"']" ).attr( "checked", true );
                    }

                    zctemplet("#templet", enabledChn);
                    zcfg("#all", cfg["any"]);

                    if(isRecordMark)
                        intervalId = setInterval( onTimer, 1000 )
                    else
                    {
                        clearInterval(intervalId);
                        intervalId = -1;
                    }
                    initList();
                    getState();

                    $("#templet .switch").on("switchChange.bootstrapSwitch",function ( event ,data ) {
                        formatControl(event,data);
                    });

                    $("#segmentSizeEnable").on("switchChange.bootstrapSwitch",function ( event ,data ) {
                        if(data) {

                            fragmentData["segmentDuraEnable"] = false;
                            fragmentData["segmentSizeEnable"] = true;
                            zcfg( "#segment", fragmentData );
                        }

                    });
                    $("#segmentDuraEnable").on("switchChange.bootstrapSwitch",function ( event ,data ) {
                        if(data) {
                            fragmentData["segmentSizeEnable"] = false;
                            fragmentData["segmentDuraEnable"] = true;
                            zcfg( "#segment", fragmentData );
                        }

                    });
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
                rpc("rec.isMountDisk", [], function (data) {
                    if(!data){
                        htmlAlert("#alert", "danger", "<cn>没有找到外部存储设备！</cn><en>No external storage device was found!</en>", "", 3000);
                        return;
                    }
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
                    })
                })
            });

            $("#stopRecord").click(function (e) {
                rpc( "rec.stop", [], function ( data ) {
                    if(data){
                        $.getJSON("config/record.json", function (cfg) {
                            clearInterval(intervalId);
                            intervalId = -1;
                            initView();
                            htmlAlert("#alert", "success", "<cn>停止录制成功！</cn><en>Stop record success!</en>", "", 3000);
                        });
                    }
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
