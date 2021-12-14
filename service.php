<?php
include( "head.php" );
?>
<div id="alert"></div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					SRT Live Server
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="sls" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>启用</cn>
							<en>Enable</en>
						</label>
						<div class="col-sm-2">
							<input type="checkbox" name="enable" id="sls_enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>配置</cn>
							<en>Config</en>
						</label>
						<div class="col-sm-8">
							<textarea  class="form-control" name="config" id="sls_cfg" style="min-height: 150px; margin-bottom: 10px;"></textarea>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="button" id="save_sls" class=" save btn btn-warning col-sm-6 col-sm-offset-3">
							<cn>保存</cn><en>Save</en>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					RTMP
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="rtmp" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>配置</cn>
							<en>Config</en>
						</label>
						<div class="col-sm-8">
							<textarea  class="form-control" name="config" id="rtmp_cfg" style="min-height: 150px; margin-bottom: 10px;"></textarea>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="button" id="save_rtmp" class=" save btn btn-warning col-sm-6 col-sm-offset-3">
							<cn>保存</cn><en>Save</en>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					NDI
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="ndi" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>配置</cn>
							<en>Config</en>
						</label>
						<div class="col-sm-8">
							<textarea  class="form-control" name="config" id="ndi_cfg" style="min-height: 150px; margin-bottom: 10px;"></textarea>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="button" id="save_ndi" class=" save btn btn-warning col-sm-6 col-sm-offset-3">
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

		$.ajax( {
			url: "config/sls_enable",
			success: function ( data ) {
				$("#sls_enable").bootstrapSwitch('state', (data.replace( /[\r\n]/g, "" )=="true"), true);
			}
		} ).responseText;

		$.ajax( {
			url: "config/sls.conf",
			success: function ( data ) {
				$("#sls_cfg").text(data);
			}
		} ).responseText;

		$( "#save_sls" ).click( function ( e ) {
			func( "saveConfigFile", {path:"config/sls_enable",data:($("#sls_enable").is(":checked"))}, function ( res ) {
				console.log( res );
			} );
			func( "saveConfigFile", {path:"config/sls.conf",data:$("#sls_cfg").val()}, function ( res ) {
				console.log( res );
				if ( res.result == "OK" ) {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "<cn>重启后生效</cn><en>effect after reboot</en>", 2000 );
				} else {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				}
			} );
		} );	

		$.ajax( {
			url: "config/rtmp.conf",
			success: function ( data ) {
				$("#rtmp_cfg").text(data);
			}
		} ).responseText;

		$( "#save_rtmp" ).click( function ( e ) {
			func( "saveConfigFile", {path:"config/rtmp.conf",data:$("#rtmp_cfg").val()}, function ( res ) {
				console.log( res );
				if ( res.result == "OK" ) {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "<cn>重启后生效</cn><en>effect after reboot</en>", 2000 );
				} else {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				}
			} );
		} );	

		$.ajax( {
			url: "config/ndi.json",
			success: function ( data ) {
				$("#ndi_cfg").text(JSON.stringify( data, null, 2 ));
			}
		} ).responseText;

		$( "#save_ndi" ).click( function ( e ) {
			func( "saveConfigFile", {path:"config/ndi.json",data:$("#ndi_cfg").val()}, function ( res ) {
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
