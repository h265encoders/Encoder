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

<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="js/zcfg.js"></script>
<script>
	$( function () {
		navIndex( 5 );

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
		

	} );
</script>
<?php
include( "foot.php" );
?>