<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row" id="effect">
	<div class="col-md-7">
		<div class="thumbnail">
			<div class="caption">
			</div>
			<img id="snap" src=""> </div>
	</div>
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>智能报警设置</cn>
					<en>Auto alarm config</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="alarm">
					<div class="form-group">
						<label class="col-md-3 control-label">
							<cn>总开关</cn>
							<en>Main enable</en>
						</label>
						<div class="col-md-9">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<cn>报警开关</cn>
							<en>Alarm enable</en>
						</label>
						<div class="col-md-9">
							<input type="checkbox" zcfg="alarm.enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group ">
						<label class="col-md-3 control-label">
							<cn>灵敏度</cn>
							<en>Thresh</en>
						</label>
						<div class="col-md-9">
							<input zcfg="alarm.thresh" class="slider" type="text" data-slider-min="100" data-slider-max="10000" data-slider-step="100"/>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-md-3 control-label">
							<cn>保存数量</cn>
							<en>Cache number</en>
						</label>
						<div class="col-md-9">
							<input zcfg="alarm.cache" type="text" class="form-control" />
						</div>
					</div>
				</form>
				<div class="row">
				<div class="col-md-12 text-center">
					<button id="save" type="button" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
						<cn>保存</cn>
						<en>Save</en>
					</button>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<cn>报警图片</cn>
				<en>Alarm image</en>
			</div>
			<div class="panel-body">
				<div class="row" id="fileList">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script src="vendor/slider/bootstrap-slider.min.js" type="text/javascript"></script>
<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="js/zcfg.js"></script>
<script>
	navIndex( 4 );
	$( ".slider" ).slider();
	$.fn.bootstrapSwitch.defaults.size = 'small';
	$.fn.bootstrapSwitch.defaults.onColor = 'warning';
	$( ".switch" ).bootstrapSwitch();
	var config = null;
	var lays;
	var chnId = 0;

	function init() {
		for ( var i = 0; i < config.length; i++ ) {
			if ( config[ i ].type == "usb" )
			{
				chnId = config[ i ].id;
				zcfg( "#alarm", config[ i ] );
			}
		}
		setInterval( show, 300 );
	}

	$.getJSON( "config/config.json", function ( result ) {
		config = result;
		init();
	} );

	function snap() {
		rpc( "enc.snap" );
	}

	function show() {
		setTimeout( snap, 100 );
		$( "#snap" ).attr( "src", "/snap/snap" + chnId + ".jpg?rnd=" + Math.random );
	}
	
	function getImage()
	{
		$.getJSON( "alarm/", function ( list ) {
      
		var str = "";
        for(var i=list.length-1;i>=0;i--){
			if(list[ i ].name.indexOf("jpg")<0)
				continue;
			
			str += '<div class="col-xs-6 col-sm-4 col-md-3">' +
								'<div class="thumbnail">' +
								'<img src="/alarm/'+list[ i ].name+'">' +
								'<div class="caption text-center">' +
								list[ i ].name +
								'</div></div></div>';
		}
          

        $("#fileList").html(str);
      });
	}
	getImage();
	setInterval(getImage,5000);
	
	
	
	$( "#save" ).click( function ( e ) {
			rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
				if ( typeof ( data.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功！</cn><en>Save config success!</en>", "", 2000 );
				}

			} );
		} );
</script>
<?php
include( "foot.php" );
?>