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
    .wc-new-theme {
        font-size: 14px;
        color: var(--btn_background);
        cursor: pointer;
    }
    .wc-new-theme:hover {
        color: var(--btn_hover_background);
        cursor: pointer;
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
								<option value="EX2">EX2(ENC1)</option>
								<option value="SH">SH(ENCSH)</option>
								<option value="V2">V2(ENC1V2)</option>
								<?php
									}
									else if($chip=="3519A")
									{
								?>
								<option value="ENC1P">ENC1P</option>
								<option value="C3519A">C3519A</option>
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
								<option value="1080">1080</option>
								<option value="4k">4k</option>
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
                            <div class="row" style="margin-top: 15px">
                                <label class="col-sm-3 control-label">
                                    设计
                                </label>
                                <div class="col-sm-3">
                                    <div id="box" style="width: 256px;height: 128px;background-color: #eeeeee;outline: 1px solid #cccccc"></div>
                                </div>
                                <div class="col-sm-3"></div>
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
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="title">
                <div class="row">
                    <div class="col-md-10 col-sm-10">
                        <h3 class="panel-title">
                            <cn>主题</cn>
                            <en>Theme</en>
                        </h3>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="row">
                            <div class="col-md-2 col-sm-2"></div>
                            <div class="col-md-10 col-sm-10">
                                <h3 class="panel-title">
                                    <i class="fa fa-edit wc-new-theme" data-toggle="modal" data-target=".bs-modal-lg">
                                        <cn>编辑</cn>
                                        <en>Edit</en>
                                    </i>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                主题选择
                            </label>
                            <div class="col-sm-6">
                                <select name="theme" id="theme" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button type="button" id="setTheme" class=" save btn btn-warning">
                                    设定
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/handlebars-v4.7.6.js"></script>
<script src="js/zcfg.js"></script>

<?php
    include( "oled.php" );
    include("themes.php");
?>
<script>

	$( function () {
		navIndex( 5 );
		$.ajax({url:"/config/fac",success:function(data){
				$( "#typeVal" ).val(data.replace(/[\r\n]/g,""));
			}}).responseText;

        $.ajax( {url: "/config/mac", success: function ( data ) {
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

		$.ajax({url:"/config/curEDID",success:function(data){
				$( "#edidVal" ).val(data.replace(/[\r\n]/g,""));

			}}).responseText;

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
	} );
</script>
<?php
include( "foot.php" );
?>
