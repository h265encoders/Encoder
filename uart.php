<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>基本设置</cn>
					<en>Basic config</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="uart" role="form">
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>串口</cn><en>Serial port</en></label>
						<div class="col-md-6 col-sm-8">
							<select zcfg="device" class="form-control">
								<option value="/dev/ttyAMA1">ttyAMA1</option>
								<option value="/dev/ttyUSB0">ttyUSB0</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>波特率</cn><en>BaudRate</en></label>
						<div class="col-md-6 col-sm-8">
							<select zcfg="baudRate" class="form-control">
								<option value="115200">115200</option>
								<option value="9600">9600</option>
								<option value="4800">4800</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>网络端口</cn><en>Socket port</en></label>
						<div class="col-md-6 col-sm-8">
							<input zcfg="port" type="text" class="form-control">
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-4 control-label"><cn>IP地址</cn><en>IP Address</en></label>
                        <div class="col-md-6 col-sm-8">
                            <input zcfg="ip" type="text" class="form-control">
                        </div>
                    </div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
					<div class="form-group">
						<div class="text-center">
							<button type="button" id="save" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
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
<?php
if(isset($button) && $button)
{
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>按键定义</cn>
					<en>Button define</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="button" role="form">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3 col-sm-4"></div>
                            <div class="col-md-4 col-sm-4">
                                <cn>短按</cn>
                                <en>Short Press</en>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <cn>长按</cn>
                                <en>Long Press</en>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="btnList">
                            <div class="form-group">
                                <div class="col-md-3 col-sm-4">
                                    <input type="text" class="form-control text-right" style="border: 0px; background-color: transparent; -webkit-box-shadow: none; box-shadow: none;" readonly zcfg="[#].name" />
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <select zcfg="[#].click" class="form-control">
                                        <option value="push.start" cn="开始推流" en="Start push"></option>
                                        <option value="push.stop" cn="停止推流" en="Stop push"></option>
                                        <option value="rec.start" cn="开始录制" en="Start record"></option>
                                        <option value="rec.stop" cn="停止录制" en="Stop record"></option>
                                        <option value="" cn="无" en="None"></option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <select zcfg="[#].press" class="form-control">
                                        <option value="enc.setNetDhcp" cn="dhcp" en="dhcp"></option>
                                        <option value="" cn="无" en="None"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
					<div class="form-group">
						<div class="text-center">
							<button type="button" id="saveBtn" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
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
<?php
}
?>
<script src="js/zcfg.js"></script>
<script>
	$( function () {
		navIndex( 4 );
		
		var config;
		var button;
		
		$.getJSON( "config/uart.json", function ( res ) {
			config=res;
				zcfg( "#uart", config );
		} );
		
		$.getJSON( "config/button.json", function ( res ) {
		    console.log(res)
			button=res;
				zctemplet( "#btnList", button );
		} );
		
		
		$( "#save" ).click( function (){
			rpc( "uart.update", [ JSON.stringify( config, null, 2 ) ], function ( res ) {
				if ( typeof ( res.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
		});
		
		$( "#saveBtn" ).click( function (){
			rpc4( "oled.update", [ JSON.stringify( button, null, 2 ) ], function ( res ) {
				if ( typeof ( res.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
		});
	} );
</script>
<?php
include( "foot.php" );
?>
