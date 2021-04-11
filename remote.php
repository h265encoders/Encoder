<?php
include( "head.php" );
?>
<link href="css/fontawesome-iconpicker.min.css" rel="stylesheet">
<link href="css/loading.css" rel="stylesheet">
<div id="alert"></div>
    <div class="row" id="effect">
        <div class="col-md-6 col-md-offset-3">
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
        <div class="dropdown-menu" style="width: 390px;padding:20px 0px 10px 20px">
            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
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
            </div>
        </div>
    </div>
</script>

<script>
    var iconMap = {"my-ok":"ok", "my-9":"9", "my-8":"8", "my-7":"7", "my-6":"6", "my-5":"5", "my-4":"4", "my-3":"3", "my-2":"2", "my-1":"1", "my-0":"0",}
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

    $("#setProject").click(function () {
        var id = $("#projectsCH").val();
        for(var i=0;i<feaArray.length;i++){
            var config = feaArray[i];
            if(config["id"] === parseInt(id))
                config["used"] = true;
            else
                config["used"] = false;
        }
        func("saveConfigFile",{path: "config/oled/remfea.json",data: JSON.stringify(feaArray,null,2)},function (res) {
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
        func("saveConfigFile",{path: "config/oled/remfea.json",data: JSON.stringify(feaArray,null,2)},function (res) {
            if(res["result"] === "OK"){
                rpc4("remote.updateConfig", [], function (data) {
                    htmlAlert("#alert", "success", "<cn>保存成功！</cn><en>Save success!</en>", "", 3000);
                });
            }
        })
    });


	$( function () {
		navIndex( 4 );
        $.ajax({url:"config/oled/remods.json",success:function(data){
                features = data;
                $.ajax({url:"config/oled/remfea.json",success:function(data){
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
	});
</script>
<?php
include( "foot.php" );
?>
