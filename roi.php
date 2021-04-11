<?php
include( "head.php" );
?>
<div class="row" id="effect">
	<div class="col-md-7">
		<div class="thumbnail" style="position: relative;">
			<div class="caption">
				<select id="channels" class="form-control"></select>
			</div>
			<img id="snap" src=""> 
			<div style="padding-bottom: 56.25%; position: absolute; left: 5px; right: 5px; margin-top: -56.25%;" id="rectP">
				<div id="rect" style="position: absolute; border: 4px solid #ff0000; display: none;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>感兴趣区域编码</cn>
					<en>Region Of Interest</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="edit">
					<div class="form-group">
						<label class="col-md-3 control-label">
							<cn>开关</cn>
							<en>Enable</en>
						</label>
						<div class="col-md-9">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<cn>绝对</cn>
							<en>ABS</en> QP
						</label>
						<div class="col-md-9">
							<input type="checkbox" zcfg="abs" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							QP
						</label>
					
						<div class="col-md-9">
							<input zcfg="qp" class="form-control" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							<cn>背景帧率</cn>
							<en>Text</en>
						</label>
						<div class="col-md-6">
							<input zcfg="framerate" class="form-control" type="text"/>
						</div>
					</div>
				</form>
				<div class="text-center">
					<button class="btn btn-warning" onClick="save();">
						<cn>保存</cn>
						<en>Save</en>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="vendor/slider/bootstrap-slider.min.js" type="text/javascript"></script>
<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="vendor/colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="js/zcfg.js"></script>
<script src="js/ajaxfileupload.js"></script>
<script type="text/javascript" src="webuploader/webuploader.js"></script>
<script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
<script>
	navIndex( 4 );
	$( '.colorPicker' ).colorpicker( {
		"format": "hex"
	} );
	$( ".slider" ).slider();
	$.fn.bootstrapSwitch.defaults.size = 'small';
	$.fn.bootstrapSwitch.defaults.onColor = 'warning';
	$( ".switch" ).bootstrapSwitch();
	var config = null;
	var curChn = -1;
	var curRoi = null;

	function init() {
		for ( var i = 0; i < config.length; i++ ) {
			if ( config[ i ].type == "file" )
				continue;
			$( "#channels" ).append( '<option value="' + i + '">' + config[ i ].name + '</option>' );
		}
		setChannel( 0 );
		setInterval( show, 300 );

		$( "#channels" ).change( function () {
			setChannel( $( "#channels" ).val() );

		} );
	}

	$.getJSON( "config/config.json", function ( result ) {
		config = result;
		init();
	} );

	function setChannel( id ) {
		curChn = id;
		curRoi = config[ id ].encv.roi[ 0 ];
		zcfg( "#edit", curRoi );
		$("#rect").css("left",(100*curRoi.x)+"%");
		$("#rect").css("top",(100*curRoi.y)+"%");
		$("#rect").css("width",(100*curRoi.w)+"%");
		$("#rect").css("height",(100*curRoi.h)+"%");
		$("#rect").css("display","block");
	}
	
	var startX=-1, startY, totalW, totalH;
	$("#rectP").mousedown(function(e){
		startX=e.offsetX;
		startY=e.offsetY;
		if($(e.target).attr("id")=="rect")
		{
			startX+=$("#rect").position().left;
			startY+=$("#rect").position().top;
		}
		totalW=$("#rectP").innerWidth();
		totalH=$("#rectP").innerHeight();
		
		$("#rect").css("left",(100*startX/totalW)+"%");
		$("#rect").css("top",(100*startY/totalH)+"%");
		$("#rect").css("width","0%");
		$("#rect").css("height","0%");
	});
	
	$("#rectP").mousemove(function(e){
		if(startX==-1)
			return;
		var x=e.offsetX;
		var y=e.offsetY;
		if($(e.target).attr("id")=="rect")
		{
			x+=$("#rect").position().left;
			y+=$("#rect").position().top;
		}
		var w=x-startX;
		if(w<0)
			w=0;
		var h=y-startY;
		if(h<0)
			h=0;
		
		$("#rect").css("width",(100*w/totalW)+"%");
		$("#rect").css("height",(100*h/totalH)+"%");
	});
	
	function drawDone(e)
	{
		if(startX==-1)
			return;
		var x=e.offsetX;
		var y=e.offsetY;
		var w=x-startX;
		if(w<0)
			w=0;
		var h=y-startY;
		if(h<0)
			h=0;
		curRoi.x=startX/totalW;
		curRoi.y=startY/totalH;
		curRoi.w=w/totalW;
		curRoi.h=h/totalH;
		startX=-1;
	}
	
	$("#rectP").mouseup(drawDone);
	$("#rectP").mouseleave(drawDone);
	$("#rectP").on("dragstart",function(){return false;});
	$("#rect").on("dragstart",function(){return false;});


	function snap() {
		rpc( "enc.snap" );
	}

	function show() {
		setTimeout( snap, 100 );
		$( "#snap" ).attr( "src", "snap/snap" + curChn + ".jpg?rnd=" + Math.random() );
	}

	function save() {
		rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
			if ( typeof ( data.error ) != "undefined" ) {
				htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
			}
		} );
	}
</script>
<?php
include( "foot.php" );
?>
