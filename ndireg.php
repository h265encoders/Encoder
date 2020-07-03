<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					NDI Vendor Setting
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="vendor" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Serial number
						</label>
						<div class="col-sm-4">
							<input id="sn" type="text" readonly class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Vendor name
						</label>
						<div class="col-sm-8">
							<input zcfg="ndi.vendor.name" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Vendor id (Encrypted)
						</label>
						<div class="col-sm-8">
							<input zcfg="ndi.vendor.id" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
							<button type="button" id="save" class=" save btn btn-warning col-sm-6 col-sm-offset-3">
								save
							</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="js/zcfg.js"></script>
<script>
	$( function () {
		navIndex( 5 );

		var ndiCfg;
		$.getJSON( "config/ndi.json", function ( result ) {
			ndiCfg = result;
			zcfg( "#vendor", ndiCfg );
		} );

		$( "#save" ).click( function ( e ) {
			func( "setNDI", ndiCfg, function ( res ) {
				if ( res.error != "" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功,重启后生效</cn><en>Save config success, please reboot!</en>！", "", 2000 );
				}
			} );
		} );

		rpc( "enc.getSN", null, function ( data ) {
			var sn=data.replace( /[\r\n]/g, "" );
			$( "#sn" ).val(sn);
		} );
		

	} );
</script>
<?php
include( "foot.php" );
?>