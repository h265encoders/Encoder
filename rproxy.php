<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>远程访问</cn>
					<en>Reverse Proxy</en>
				</h3>
			</div>
			<div class="panel-body">
						<form class="form-horizontal" id="trans" role="form">
							<div class="form-group">
								<label class="col-sm-2 control-label">
									<cn>启用</cn>
									<en>Enable</en>
								</label>
								<div class="col-sm-2">
									<input type="checkbox" zcfg="enable" class="switch form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									<cn>设备名</cn>
									<en>Device name</en>
								</label>
								<div class="col-sm-6">
									<input zcfg="Name" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									<cn>绑定码</cn>
									<en>Bind code</en>
								</label>
								<div class="col-sm-6">
									<input zcfg="DevBind" type="text" class="form-control">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<button type="button" id="save" class=" save btn btn-warning col-sm-6 col-sm-offset-3">
									<cn>保存</cn><en>Save</en>
								</button>
							</div>
						</form>

			</div>
		</div>
	</div>
</div>

<!--
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					ngrok
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="ngrok" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>启用</cn>
							<en>Enable</en>
						</label>
						<div class="col-sm-2">
							<input type="checkbox" name="enable" id="ngrok_enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>配置</cn>
							<en>Config</en>
						</label>
						<div class="col-sm-8">
							<textarea  class="form-control" name="config" id="ngrok_cfg" style="min-height: 150px; margin-bottom: 10px;"></textarea>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="button" id="save_ngrok" class=" save btn btn-warning col-sm-6 col-sm-offset-3">
							<cn>保存</cn><en>Save</en>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
-->

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					frp
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="frp" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>启用</cn>
							<en>Enable</en>
						</label>
						<div class="col-sm-2">
							<input type="checkbox" name="enable" id="frp_enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>配置</cn>
							<en>Config</en>
						</label>
						<div class="col-sm-8">
							<textarea  class="form-control" name="config" id="frp_cfg" style="min-height: 150px; margin-bottom: 10px;"></textarea>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="button" id="save_frp" class=" save btn btn-warning col-sm-6 col-sm-offset-3">
							<cn>保存</cn><en>Save</en>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="js/zcfg.js"></script>
<script>
	$( function () {
		navIndex( 5 );
		$.fn.bootstrapSwitch.defaults.onColor = 'warning';

		var transCfg;
		$.getJSON( "config/trans.json", function ( result ) {
			transCfg = result;
			zcfg( "#trans", transCfg );
		} );

		$( "#save" ).click( function ( e ) {
			rpc( "enc.setTrans", [ JSON.stringify( transCfg, null, 2 ) ], function ( data ) {
				if ( typeof ( data.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功！</cn><en>Save config success!</en>", "", 2000 );
				}
			} );
		} );

/*		$.ajax( {
			url: "config/rproxy/ngrok_enable",
			success: function ( data ) {
				$("#ngrok_enable").bootstrapSwitch('state', (data.replace( /[\r\n]/g, "" )=="true"), true);
			}
		} ).responseText;

		$.ajax( {
			url: "config/rproxy/ngrok.cfg",
			success: function ( data ) {
				$("#ngrok_cfg").text(data);
			}
		} ).responseText;
*/

		$.ajax( {
			url: "config/rproxy/frp_enable",
			success: function ( data ) {
				$("#frp_enable").bootstrapSwitch('state', (data.replace( /[\r\n]/g, "" )=="true"), true);
			}
		} ).responseText;

		$.ajax( {
			url: "config/rproxy/frpc.ini",
			success: function ( data ) {
				$("#frp_cfg").text(data);
			}
		} ).responseText;


/*
		$( "#save_ngrok" ).click( function ( e ) {
			func( "setNgrok", $( "#ngrok" ).serialize(), function ( res ) {
				console.log( res );
				if ( res.result == "OK" ) {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "<cn>重启后生效</cn><en>effect after reboot</en>", 2000 );
				} else {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				}
			} );
		} );
*/

		$( "#save_frp" ).click( function ( e ) {
			func( "setFrp", $( "#frp" ).serialize(), function ( res ) {
				console.log( res );
				if ( res.result == "OK" ) {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "<cn>重启后生效</cn><en>effect after reboot</en>", 2000 );
				} else {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				}
			} );
		} );		

	} );
</script>
<?php
include( "foot.php" );
?>
