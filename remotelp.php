<?php
include( "head.php" );
?>
<link href="/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<link href="/css/loading.css" rel="stylesheet">
<div id="alert"></div>
    <div class="row" id="effect">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="title">
                    <h3 class="panel-title">
                        <cn>按键管理</cn>
                        <en>Controler manager</en>
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-md-offset-1 text-center">
                                    <cn>名称</cn>
                                    <en>Name</en>
                                </div>
                                <div class="col-md-3 col-sm-3 text-center">
                                    <cn>图标</cn>
                                    <en>Icon</en>
                                </div>
                                <div class="col-md-3 col-sm-3 text-center">
                                    <cn>操作</cn>
                                    <en>Operate</en>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top:10px; margin-bottom: 10px;"/>
                        <div id="remoteBtns" class="form-group"></div>
                        <hr style="margin-top:10px; margin-bottom: 10px;"/>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-warning text-center" id="addRemote" style="outline: none;width: 112px;height: 34px" >
                                            <div class="fa" style="font-weight: bold;font-size: 15px;">
                                                <cn>添加按键</cn>
                                                <en>Add</en>
                                            </div>
                                            <div class="sp sp-circle hide"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-5" style="padding: 0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-left" style="margin-top: 20px;color: #cccccc">
                                                <small id="addHint" class="hide" style="button:0">
                                                    <cn>按键识别中...</cn>
                                                    <en>Will be recognition...</en>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="title">
                            <h3 class="panel-title">
                                <cn>方案管理</cn>
                                <en>Project manager</en>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label">
                                        <cn>按键方案</cn>
                                        <en>Projects</en>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <cn>
                                            <select id="projectsCH" class="form-control"></select>
                                        </cn>
                                        <en>
                                            <select id="projectsEN" class="form-control"></select>
                                        </en>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div id="setProject" class="btn btn-warning">
                                            <cn>启用</cn>
                                            <en>Use</en>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="title">
                            <h3 class="panel-title">
                                <cn>功能设置</cn>
                                <en>Feature setting</en>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-md-offset-1 text-center">
                                            <cn>按键</cn>
                                            <en>Button</en>
                                        </div>
                                        <div class="col-md-3 col-sm-3 text-center">
                                            <cn>短按</cn>
                                            <en>Short Press</en>
                                        </div>
                                        <div class="col-md-3 col-sm-3 text-center">
                                            <cn>长按</cn>
                                            <en>Long Press</en>&nbsp;<span style="font-size: 6px;color: grey;">[>3s]</span></div>
                                    </div>
                                </div>
                                <hr style="margin-top:10px; margin-bottom: 10px;"/>
                                <div id="featureItem" class="form-group"></div>
                                <hr style="margin-top:10px; margin-bottom: 10px;"/>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="button" id="saveProject" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                                            <cn>保存</cn>
                                            <en>Save</en>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 20%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <cn>识别到新的按键</cn>
                    <en>Recognize the new button</en>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7" style="line-height: 34px;font-size: 14px">
                        <span>
                            <cn>选择一个按键图标：</cn>
                            <en>Select a button icon:</en>
                        </span>
                    </div>
                    <div class="col-md-5">
                        <div class="btn-group">
                            <button type="button" class="btn iconpicker-component" ><i id="icon" class="fa fa-power-off"></i></button>
                            <button type="button" class="icp icp-dd btn dropdown-toggle" data-selected="fa-car" data-toggle="dropdown">
                                <i class="fa fa-angle-double-down"></i>
                            </button>
                            <div class="dropdown-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <cn>取消</cn>
                    <en>Cancel</en>
                </button>
                <button type="button" class="btn btn-warning" onclick="onNewRemoteBtn()">
                    <cn>确定</cn>
                    <en>OK</en>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 20%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <cn>提示</cn>
                    <en>Info</en>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7" style="line-height: 34px;font-size: 14px">
                        <span>
                            <cn>确认删除?</cn>
                            <en>Confirm deletion?</en>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <cn>取消</cn>
                    <en>Cancel</en>
                </button>
                <button type="button" class="btn btn-warning" onclick="onDelRemoteBtn()">
                    <cn>确定</cn>
                    <en>OK</en>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./js/fontawesome-iconpicker.min.js"></script>
<script src="./js/handlebars-v4.7.6.js"></script>
<!--按键管理模板-->
<script id="tpl" type="text/x-handlebars-template">
    {{#each this}}
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            {{#handleHr @index 10}} {{/handleHr}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-md-offset-1 text-center" style="line-height: 22px">
            <span>
                <cn>{{btnNameCN}}</cn>
                <en>{{btnNameEN}}</en>
            </span>
        </div>
        <div class="col-md-3 col-sm-3 text-center" style="font-size: 20px;line-height: 22px">
            {{#showIcon icon}} {{/showIcon}}
        </div>
        <div class="col-md-3 col-sm-3 text-center" style="line-height: 22px;cursor: pointer">
            <a onclick="deleteBtn({{btnId}})">
                <cn>删除</cn>
                <en>delete</en>
            </a>
        </div>
    </div>
    {{/each}}
</script>
<!--功能布局模板-->
<script id="tpl1" type="text/x-handlebars-template">
    {{#each this}}
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            {{#handleHr @index 8}} {{/handleHr}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-md-offset-1 text-center"　style="font-size: 18px;line-height: 18px">
            {{#showIcon icon}} {{/showIcon}}
        </div>
        <div class="col-md-3 col-sm-3 text-center"　style="font-size: 18px;line-height: 18px">
            {{#handleDrop @index 2 icon tapCH tapEN "tap"}} {{/handleDrop}}
        </div>
        <div class="col-md-3 col-sm-3 text-center"　style="font-size: 18px;line-height: 18px">
            {{#handleDrop @index 3 icon pressCH pressEN "press"}} {{/handleDrop}}
        </div>
    </div>
    {{/each}}
</script>
<!--选择按键功能模板-->
<script id="tpl2" type="text/x-handlebars-template">
    <div class="dropup">
        <button type="button" class="dropdown-toggle"  style="font-size:10px;outline: none;border: none;width: 140px;height: 25px;background: white" id="{{menuId}}" data-toggle="dropdown">
            <cn>{{ch}}</cn>
            <en>{{en}}</en>
            <span class="caret"></span>
        </button>
        <div class="dropdown-menu" style="width: 550px;padding:20px 0px 10px 20px">
            <div class="row">
                <div class="col-md-4">
                    <ul>
                        {{#each mods1}}
                            <li class="dropdown-header">
                                <cn>{{titleCH}}</cn>
                                <en>{{titleEN}}</en>
                            </li>
                                {{#each func}}
                                    <li><a style="cursor: pointer;font-size: 12px;" onclick="setDropVal('{{../../menuId}}','{{ch}}','{{en}}','{{../../icon}}','{{../../type}}')">
                                            <cn>{{ch}}</cn>
                                            <en>{{en}}</en>
                                        </a>
                                    </li>
                                {{/each}}
                            <li class="divider"></li>
                        {{/each}}
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        {{#each mods2}}
                            <li class="dropdown-header">
                                <cn>{{titleCH}}</cn>
                                <en>{{titleEN}}</en>
                            </li>
                            {{#each func}}
                                <li><a style="cursor: pointer;font-size: 12px;" onclick="setDropVal('{{../../menuId}}','{{ch}}','{{en}}','{{../../icon}}','{{../../type}}')">
                                        <cn>{{ch}}</cn>
                                        <en>{{en}}</en>
                                    </a>
                                </li>
                            {{/each}}
                            <li class="divider"></li>
                        {{/each}}
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        {{#each mods3}}
                        <li class="dropdown-header">
                            <cn>{{titleCH}}</cn>
                            <en>{{titleEN}}</en>
                        </li>
                        {{#each func}}
                        <li><a style="cursor: pointer;font-size: 12px;" onclick="setDropVal('{{../../menuId}}','{{ch}}','{{en}}','{{../../icon}}','{{../../type}}')">
                                <cn>{{ch}}</cn>
                                <en>{{en}}</en>
                            </a>
                        </li>
                        {{/each}}
                        <li class="divider"></li>
                        {{/each}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</script>

<script>

    var iconMap = {"my-ok":"ok", "my-9":"9", "my-8":"8", "my-7":"7", "my-6":"6", "my-5":"5", "my-4":"4", "my-3":"3", "my-2":"2", "my-1":"1", "my-0":"0",}
    var iconArray = ['fa-power-off','fa-bars','fa-caret-up', 'fa-caret-left','fa-caret-right','fa-caret-down', 'fa-volume-down','fa-volume-up','fa-home','fa-clone', 'fa-reply','my-ok','my-0','my-1','my-2','my-3','my-4', 'my-5','my-6','my-7','my-8','my-9']
    var iconSelect = "fa-power-off";
    var remoteCode = "";
    var wsocket = null;
    var btnArray = [];
    var delBtnId = -1;
    var features = null;
    var feaArray = [];

    //注册helper
    Handlebars.registerHelper("showIcon",function (value,options) {
        var html = "";
        if(value.match(/^fa-/)){
            html = '<i class="fa '+value+'"></i>'
        } else {
            html = '<span style="font-weight: bold">'+iconMap[value]+'</span>'
        }
        return html;
    })

    //注册helper
    Handlebars.registerHelper("handleHr",function (value,hh,options) {
        var html = "";
        if(value !== 0){
            html = "<hr style=\"margin-top:"+hh+"px; margin-bottom: "+hh+"px;\"/>";
        }
        return html;
    })

    //注册helper
    Handlebars.registerHelper("handleDrop",function (index,num,icon,ch,en,type,options) {
        var nn = (index+1)*num;
        features["ch"] = ch;
        features["en"] = en;
        features["menuId"] = "menu_"+icon+nn;
        features["type"] = type;
        features["icon"] = icon;
        var tpl = $("#tpl2").html();
        var template = Handlebars.compile(tpl);
        var html = template(features);
        return html;
    })

    function setDropVal(id,valCH,valEN,icon,type){
        var html = "<cn>"+valCH+"</cn><en>"+valEN+"</en><span class='caret'></span>";
        $("#"+id).html(html);
        for(var i=0;i<feaArray.length;i++){
            var config = feaArray[i];
            if(config["used"]){
                var btns = config["btns"];
                for(var j=0;j<btns.length;j++){
                    var btn = btns[j];
                    if(btn["icon"] == icon){
                        if(type == "tap"){
                            btn["tapCH"] = valCH;
                            btn["tapEN"] = valEN;
                        }
                        if(type == "press"){
                            btn["pressCH"] = valCH;
                            btn["pressEN"] = valEN;
                        }
                    }
                }
            }
        }
    }

    // Modal垂直居中
    $("#myModal,#infoModal").on('show.bs.modal', function(){
        var $this = $(this);
        var $modal_dialog = $this.find('.modal-dialog');
        // 关键代码，如没将modal设置为 block，则$modala_dialog.height() 为零
        $this.css('display', 'block');
        $modal_dialog.css({'margin-top': Math.max(0, ($(window).height() - $modal_dialog.height()) / 2) });
    });

    // Modal关闭
    $("#myModal").on('hide.bs.modal', function(){
        $("#addRemote").find(".fa").removeClass("hide");
        $("#addRemote").find(".sp").addClass("hide");
        $("#addHint").addClass("hide");
        wsocket.close();
    });

    // 初始化websocket
    function initWSocket() {
        var wsuri = 'ws://' + location.hostname + '/api/remote/socket.io' // ws地址
        wsocket = new WebSocket(wsuri)
        wsocket.onopen = function () {
            wsocket.send('bind')
        };
        wsocket.onmessage = function (msg) {
            var data = JSON.parse(msg.data);
            if(data.state === 0)
                return;
            remoteCode = data["high"]+data["low"];
            var mark = false;
            for(var i=0;i<btnArray.length;i++){
                var btn = btnArray[i];
                if(btn["remoteCode"] === remoteCode)
                    mark = true;
            }
            if(mark) {
                htmlAlert("#alert", "danger", "<cn>重复按键,请重试！</cn><en>Repeat the key, Please try again!</en>", "", 3000);
                return;
            }
            $('#myModal').modal({
                keyboard: false,
                show: true,
                backdrop: "static"
            });
        };
        wsocket.onerror = function () {
            $("#addRemote").find(".fa").removeClass("hide");
            $("#addRemote").find(".sp").addClass("hide");
            $("#addHint").addClass("hide");
        };
        wsocket.onclose = function () {
            $("#addRemote").find(".fa").removeClass("hide");
            $("#addRemote").find(".sp").addClass("hide");
            $("#addHint").addClass("hide");
        };
    }

    function initRemoteBtns() {
        var theme_tpl = $("#tpl").html();
        var template = Handlebars.compile(theme_tpl);
        var html = template(btnArray);
        $("#remoteBtns").html(html);
    }

    function initFeatures() {
        for(var i=0;i<feaArray.length;i++){
            var config = feaArray[i];
            if(config["used"]){
                var tpl1 = $("#tpl1").html();
                var tem = Handlebars.compile(tpl1);
                var ht = tem(config["btns"]);
                $("#featureItem").html(ht);
            }
        }
    }

    function deleteBtn(btnId) {
        delBtnId = btnId;
        $("#infoModal").modal({
            keyboard: false,
            show: true,
            backdrop: "static"
        });
    }
    function onDelRemoteBtn() {
        var index = -1;
        for(var i=0;i<btnArray.length;i++){
            var btn = btnArray[i];
            if(btn["btnId"] === delBtnId){
                index = i;
            }
        }
        btnArray.splice(index,1);
        for(var i=0;i<btnArray.length;i++){
            btnArray[i].btnNameCN = "按键"+(i+1);
            btnArray[i].btnNameEN = "Button"+(i+1);
        }
        func("saveConfigFile",{path: "/config/oled/remote.json",data: JSON.stringify(btnArray,null,2)},function (res) {
            if(res["result"] === "OK"){
                initRemoteBtns();
                $('#infoModal').modal("hide");
                for(var i=0;i<feaArray.length;i++){
                    var config = feaArray[i];
                    config["btns"].splice(index,1);
                }
                func("saveConfigFile",{path: "/config/oled/remfea.json",data: JSON.stringify(feaArray,null,2)},function (res) {
                    if(res["result"] === "OK")
                        initFeatures();
                })
            }
        })
    }
    function onNewRemoteBtn() {
        var count = btnArray.length;
        var obj = {
            btnId:(count+1),
            remoteCode:remoteCode,
            btnNameCN:"按键 "+(count+1),
            btnNameEN:"Button "+(count+1),
            icon:iconSelect,
        }
        btnArray.push(obj);
        func("saveConfigFile",{path: "/config/oled/remote.json",data: JSON.stringify(btnArray,null,2)},function (res) {
            if(res["result"] === "OK"){
                initRemoteBtns();
                $('#myModal').modal("hide");
                for(var i=0;i<feaArray.length;i++){
                    var feaObj = {
                        icon: iconSelect,
                        code: remoteCode,
                        tapCH:"未启用",
                        tapEN:"None",
                        pressCH:"未启用",
                        pressEN:"None"
                    }
                    var config = feaArray[i];
                    config["btns"].push(feaObj);
                }
                func("saveConfigFile",{path: "/config/oled/remfea.json",data: JSON.stringify(feaArray,null,2)},function (res) {
                    if(res["result"] === "OK")
                        initFeatures();
                })
            }
        })
    }

    $("#addRemote").click(function () {
        if($(this).find(".fa").hasClass("hide")) {
            $(this).find(".fa").removeClass("hide");
            $(this).find(".sp").addClass("hide");
            $("#addHint").addClass("hide");
            wsocket.close();
            return;
        }
        $(this).find(".fa").addClass("hide");
        $(this).find(".sp").removeClass("hide");
        $("#addHint").removeClass("hide");
        initWSocket();

    });
    $("#setProject").click(function () {
        var id = $("#projectsCH").val();
        for(var i=0;i<feaArray.length;i++){
            var config = feaArray[i];
            if(config["id"] === parseInt(id))
                config["used"] = true;
            else
                config["used"] = false;
        }
        func("saveConfigFile",{path: "/config/oled/remfea.json",data: JSON.stringify(feaArray,null,2)},function (res) {
            if(res["result"] === "OK"){
                rpc4("remote.updateConfig", [], function (data) {
                    initFeatures();
                });
            }
        })
    });

    $("#projectsCH").change(function () {
        var id = $("#projectsCH").val();
        $("#projectsEN").val(id);
    });

    $("#projectsEN").change(function () {
        var id = $("#projectsEN").val();
        $("#projectsCH").val(id);
    });

    $("#saveProject").click(function () {
        func("saveConfigFile",{path: "/config/oled/remfea.json",data: JSON.stringify(feaArray,null,2)},function (res) {
            if(res["result"] === "OK"){
                rpc4("remote.updateConfig", [], function (data) {
                    htmlAlert("#alert", "success", "<cn>保存成功！</cn><en>Save success!</en>", "", 3000);
                });
            }
        })
    });

    $('.btn-group>button').one("click",function(){
        $('.icp-dd').iconpicker({
            title: false,
            icons: iconArray,
            emptyIconValue: 'none',
        });
    }) ;

    $('.icp-dd').on('iconpickerCreated', function(event){
        for(var i=0;i<iconArray.length;i++){
            var icon = iconArray[i];
            if(icon.match(/^my-/)){
                $("."+icon).html(iconMap[icon])
            }
        }
    });

    $('.icp-dd').on('iconpickerSetValue', function(event){
        let cl = event.iconpickerValue;
        if(cl.match(/^my-/)) {
            $("#icon").html(iconMap[cl])
        } else {
            $("#icon").html("");
        }
    });

    $('.icp-dd').on('iconpickerSelected', function(event){
        iconSelect = event.iconpickerValue;
    });


	$( function () {
		navIndex( 4 );
        $.ajax({url:"/config/oled/remote.json",success:function(data){
                btnArray = data;
                initRemoteBtns();
                $.ajax({url:"/config/oled/remods.json",success:function(data){
                        features = data;
                        var mods3 = new Array();
                        var func = new Array();
                        var obj = {
                            titleCH:"布局模块",
                            titleEN:"Layout",
                            func:func
                        }
                        mods3.push(obj);
                        features["mods3"] = mods3;
                        //加载自定义布局模块
                        $.ajax({url:"/config/defLays.json",success:function (data) {
                            //var func = new Array();
                            for(var i=0;i<data.length;i++){
                                var mark = false;
                                var layouts = data[i].layouts;
                                for(var j=0;j<layouts.length;j++) {
                                    var id = layouts[j].id;
                                    if(parseInt(id) >= 0){
                                        mark = true;
                                        break;
                                    }
                                }
                                if(mark){
                                    var lay = {
                                        ch:data[i].layName,
                                        en:data[i].layNameEn
                                    }
                                    func.push(lay);
                                }
                            }
                        }})

                        $.ajax({url:"/config/oled/remfea.json",success:function(data){
                                feaArray = data;
                                initFeatures();
                                for(var i=0;i<feaArray.length;i++){
                                    var config = feaArray[i];
                                    var optionCH = new Option(config["nameCH"],config["id"]);
                                    if(config["used"])
                                        optionCH.selected = true;
                                    $("#projectsCH").append(optionCH);

                                    var optionEN = new Option(config["nameEN"],config["id"]);
                                    if(config["used"])
                                        optionEN.selected = true;
                                    $("#projectsEN").append(optionEN);
                                }
                            }
                        });
                    }
                });
            }
        });
	});
</script>
<?php
include( "foot.php" );
?>