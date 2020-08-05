<?php
include( "head.php" );
?>
<style>
    .touch {
        width: 50px;
        height: 20px;
        background-color: #fb0;
        color: white;
        text-align: center;
        font-size: 12px;
        line-height: 30px;
    }
    .drag {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #fb0;
        top:0;
        opacity: 0;
    }
    .resize {
        display: block;
        position: absolute;
        width: 0px;
        height: 0px;
        border-right: 0px solid red;
        border-bottom: 0px solid red;
        right: 0px;
        bottom: 0px;
        overflow: hidden;
        cursor: nw-resize;
        z-index: 9;
    }
</style>
<div id="alert"></div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					机型切换
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="type" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							机型
						</label>
						<div class="col-sm-6">
							<select name="type" id="typeVal" class="form-control">
								<?php
									if($chip=="3531D")
									{
								?>
								<option value="enc2">ENC2</option>
								<option value="enc5">ENC5</option>
								<option value="enc9">ENC9</option>
								<option value="enc9_mate">ENC9_MATE</option>
								<option value="enc18">ENC18(ENC9+LED)</option>
								<option value="sdi">C3531D</option>
								<option value="dsh">DSH</option>
								<option value="lite_audio">Lite_Audio</option>
								<?php
									}
									else if($chip=="3520D")
									{
								?>
								<option value="DEF">DEF(3520D)</option>
								<option value="EX2">EX2(3520D)</option>
								<option value="SH">SH(3521D)</option>
								<?php
									}
									else if($chip=="3519A")
									{
								?>
								<option value="DEF">DEF</option>
								<option value="MPTCP">MPTCP</option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="changeType" class=" save btn btn-warning">
								切换
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					功能开关
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="funcs" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							DHCP
						</label>
						<div class="col-sm-6">
							<select name="DHCP" class="form-control">
								<option value="false" <?php if(isset($DHCP) && $DHCP==false) echo "selected"; ?> cn="隐藏" en="hide" ></option>
								<option value="true" <?php if($DHCP) echo "selected"; ?> cn="显示" en="show" ></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							OPUS
						</label>
						<div class="col-sm-6">
							<select name="OPUS" class="form-control">
								<option value="false" <?php if(isset($OPUS) && $OPUS==false) echo "selected"; ?> cn="隐藏" en="hide" ></option>
								<option value="true" <?php if($OPUS) echo "selected"; ?> cn="显示" en="show" ></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							NDI
						</label>
						<div class="col-sm-6">
							<select name="NDI" class="form-control">
								<option value="false" <?php if(isset($NDI) && $NDI==false) echo "selected"; ?> cn="隐藏" en="hide" ></option>
								<option value="true" <?php if($NDI) echo "selected"; ?> cn="显示" en="show" ></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>默认语言</cn><en>Default Language</en>
						</label>
						<div class="col-sm-6">
							<select name="defLang" class="form-control">
								<option value="cn" <?php if(isset($defLang) && $defLang=="cn") echo "selected"; ?> >中文</option>
								<option value="en" <?php if(isset($defLang) && $defLang=="en") echo "selected"; ?> >English</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="showFunc" class=" save btn btn-warning">
								设定
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					MAC
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							MAC
						</label>
						<div class="col-sm-6">
							<input type="text" id="mac" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="setMAC" class=" save btn btn-warning">
								设定
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					EDID
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="edid" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							EDID
						</label>
						<div class="col-sm-6">
							<select name="edid" id="edidVal" class="form-control">
								<option value="LinkPi1080">LinkPi1080</option>
								<option value="LinkPi4k">LinkPi4k</option>
								<option value="RGB">RGB</option>
								<option value="ITE">ITE</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="setEDID" class=" save btn btn-warning">
								设定
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="title">
                    <h3 class="panel-title">
                        OLED
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
<!--                            <div class="row">-->
<!--                                <label class="col-sm-3 control-label">-->
<!--                                    尺寸-->
<!--                                </label>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <select name="edid" class="form-control" disabled="disabled">-->
<!--                                        <option value="LinkPi_1080">128*64</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="row" style="margin-top: 15px">
                                <label class="col-sm-3 control-label">
                                    设计
                                </label>
                                <div class="col-sm-3">
                                    <div id="box" style="width: 256px;height: 128px;background-color: #eeeeee;outline: 1px solid #fb0"></div>
                                </div>
                                <div class="col-sm-3">
<!--                                    <div id="preview" style="width: 256px;height: 128px;background-color: black">-->
<!---->
<!--                                    </div>-->
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px">
                                <label class="col-sm-3 control-label">
                                    模块
                                </label>
                                <div id="mods" class="col-sm-6" style="border: 1px solid #eee">
                                    <div class="row" id="modBox"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button type="button" id="setOLED" class=" save btn btn-warning">
                                    设定
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<script src="./js/drag.js"></script>
<script src="./js/handlebars-v4.7.6.js"></script>

<script id="tpl" type="text/x-handlebars-template">
    {{#each this}}
        <div class="touch" id={{modId}} style="width: {{width}};height: {{height}};left: {{left}};top: {{top}};background-color: {{color}}">
            <div>{{name}}</div>
            <div class="drag" id={{dragId}}></div>
            <div class="resize" id={{resizeId}}></div>
        </div>
    {{/each}}
</script>

<script id="modtpl" type="text/x-handlebars-template">
    {{#each this}}
    <div class="col-sm-3">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="{{this}}" onclick="onCheckBoxClick(this)">
                <span>{{this}}</span>
            </label>
        </div>
    </div>
    {{/each}}
</script>
<script>

    var array = [];
    var own = [];
    var property = {
        IP:{color:"#66cccc",width:"256px",height:"30px"},
        AUD:{color:"#ff6666",width:"128px",height:"30px"},
        BR:{color:"#3399cc",width:"128px",height:"30px"},
        DISK:{color:"#483d8b",width:"256px",height:"30px"},
        MEM:{color:"#a52a2a",width:"128px",height:"30px"},
        REC:{color:"#c71585",width:"128px",height:"30px"},
        CPU:{color:"#cc6633",width:"128px",height:"30px"},
        TEMP:{color:"#993366",width:"128px",height:"30px"},
        HSIGN:{color:"#99cc66",width:"256px",height:"30px"},
        SSIGN:{color:"#666699",width:"256px",height:"30px"},
        INPUT:{color:"#009966",width:"256px",height:"30px"},
    }

    function onCheckBoxClick(obj) {
        var modName = $(obj).siblings().html();
        if(obj.checked){
            var pro = property[modName];
            var obj = {
                name: modName,
                width:pro["width"],
                height:pro["height"],
                left:"0px",
                top:"0px",
                color:pro["color"],
                modId: modName.toLowerCase()+"_",
                dragId:modName.toLowerCase()+"_dr",
                resizeId:modName.toLowerCase()+"_re"
            }
            array.push(obj);
        }else{
            var index = -1;
            for(var i=0;i<array.length;i++) {
                var obj = array[i];
                if(obj.name === modName)
                    index = i;
            }
            array.splice(index,1);
        }

        initDesign();
    }

    function initDesign() {
        var tpl   =  $("#tpl").html();
        var template = Handlebars.compile(tpl);
        var html = template(array);
        $("#box").html(html);

        for(var i=0;i<array.length;i++) {
            var obj = array[i];
            let container = $("#box")[0];
            let elem = $("#"+obj.modId)[0];
            let dragHandle = $("#"+obj.dragId)[0];
            let resizeHandle = $("#"+obj.resizeId)[0];
            new Draggable(container, elem, dragHandle, null, true, function (dragObj) {
                let id = $(elem).attr("id");
                for(var j=0;j<array.length;j++)
                {
                    if(array[j].modId == id){
                        array[j].left = dragObj.left;
                        array[j].top = dragObj.top;
                    }
                }
            }, function (resizeObj) {
                let id = $(elem).attr("id");
                for(var j=0;j<array.length;j++)
                {
                    if(array[j].modId == id){
                        array[j].width = resizeObj.width;
                        array[j].height = resizeObj.height;
                    }
                }
            });

            $( "#mods input[name='"+obj.name+"']" ).attr( "checked", true );
        }
    }


    function initMods(mods) {
        var tpl   =  $("#modtpl").html();
        var template = Handlebars.compile(tpl);
        var html = template(mods);
        $("#modBox").html(html);
    }

	$( function () {
		navIndex( 5 );
		$.ajax({url:"/config/fac",success:function(data){
				$( "#typeVal" ).val(data.replace(/[\r\n]/g,""));

			}}).responseText;

		$.ajax({url:"/config/curEDID",success:function(data){
				$( "#edidVal" ).val(data.replace(/[\r\n]/g,""));

			}}).responseText;
        $.ajax({url:"/config/oledMods.json",success:function(data){
                initMods(data["mods"]);
                own = data["own"];
            }});

        $.ajax({url:"/config/oled.json",success:function(data){
                array = data["mods"];
                initDesign();
            }});


		$( "#changeType" ).click( function () {
			func("changeType",$( "#type" ).serialize(), function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "机型切换成功！重启生效", "", 2000 );
			} );

		} );

		$( "#showFunc" ).click( function () {
			func("showFunc",$( "#funcs" ).serialize(), function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "修改成功", "", 2000 );
			} );

		} );

		$( "#setEDID" ).click( function () {
			func("setEDID",$( "#edid" ).serialize(), function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "修改成功", "", 2000 );
			} );

		} );

		$( "#setMAC" ).click( function () {
			var mac=$("#mac").val().replace( /[:]/g, "" );
			mac=mac.toLowerCase();
			func("setMac","mac="+mac, function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "修改成功", "", 2000 );
			} );

		} );

		$.ajax( {
			url: "/config/mac",
			success: function ( data ) {
				var mac=data.replace( /[\r\n]/g, "" ).toUpperCase();
				var macStr="";
				for(var i=0;i<mac.length;i+=2){
					macStr+=mac.substr(i,2);
					if(i+2<mac.length)
						macStr+=":";
				}
				$( "#mac" ).val(macStr);
			}
		} ).responseText;

        $( "#setOLED" ).click( function () {
            rpc4( "oled.upDesignConfig", [ JSON.stringify( {"mods":array, "own":own}, null, 2 ) ], function ( res ) {
                if ( typeof ( res.error ) != "undefined" ) {
                    htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
                } else {
                    htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
                }
            } );

        } );
	} );
</script>
<?php
include( "foot.php" );
?>
