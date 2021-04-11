<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row" id="effect">
	<div class="col-md-7">
		<div class="thumbnail">
			<img id="snap" src=""> </div>
	</div>
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>NDI解码设置</cn>
					<en>NDI decode config</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="ndi">
					<div class="form-group">
						<label class="col-md-3 control-label">
							<cn>总开关</cn>
							<en>Main enable</en>
						</label>
						<div class="col-md-9">
							<input id="enable" type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group ">
						<label class="col-md-3 control-label">
							<cn>源设备名</cn>
							<en>Source name</en>
						</label>
						<div class="col-md-9">
							<input zcfg="ndirecv.name" id="curName" type="text" class="form-control" />
						</div>
					</div>
					<div class="form-group ">
						<label class="col-md-3 control-label">
							<cn>源列表</cn>
							<en>Source List</en>
						</label>
						<div class="col-md-9">
							<select id="list" type="text" class="form-control" >
							</select>


						</div>
					</div>
				</form>
				<div class="row">
				<div class="col-md-12 text-center">
					<button id="refresh" type="button" class="btn btn-warning"><cn>刷新</cn><en>Refresh</en></button>
					<button id="select" type="button" class="btn btn-warning"><cn>选择</cn><en>Select</en></button>
					<button id="display" type="button" class="btn btn-warning"><cn>输出</cn><en>Display</en></button>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>

<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="js/zcfg.js"></script>
<script>
	navIndex( 4 );
	$.fn.bootstrapSwitch.defaults.size = 'small';
	$.fn.bootstrapSwitch.defaults.onColor = 'warning';
	$( ".switch" ).bootstrapSwitch();
	var config = null;
	var chncfg = null;
	var chnId = 0;

	function init() {
		for ( var i = 0; i < config.length; i++ ) {
			if ( config[ i ].type == "ndi" )
			{
				chnId = config[ i ].id;
				chncfg=config[i];
				zcfg( "#ndi", config[ i ] );
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
		if(chncfg.enable && chncfg.ndi.name!="")
			$( "#snap" ).attr( "src", "snap/snap" + chnId + ".jpg?rnd=" + Math.random() );
		else
			$( "#snap" ).attr( "src", "img/nosignal.jpg" );
	}
	
	function getList()
	{
		rpc( "enc.getNDIList", null, function ( data ) {
			$( "#list" ).html("");
			for(var i=0;i<data.length;i++)
			{
				$( "#list" ).append( '<option value="' + data[i] + '">' + data[i] + '</option>' );
			}

		} );
	}
	getList();

	$( "#refresh" ).click( function ( e ) {
		getList();
	});

	$( "#select" ).click( function ( e ) {
		$("#curName").val($("#list").val());
		chncfg.ndirecv.name=$("#list").val();
		rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ]);
	});

	$( "#display" ).click( function ( e ) {
		config[config.length-1].output.enable=true;
		config[config.length-1].output.src=chnId;
		rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ]);
	});

	$( "#enable" ).on( "switchChange.bootstrapSwitch", function ( evt ) {
		chncfg.enable= $( this ).is( ":checked" );
		rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ]);
	} );
</script>
<?php
include( "foot.php" );
?>
