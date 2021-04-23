<?php
include( "head.php" );
?>
<div class="row" id="effect">
	<div class="col-md-7">
		<div class="thumbnail" style="position: relative;">
			<div class="caption">
				<div class="row">
					<div class="col-xs-6">
						<select id="channels" class="form-control"></select>
					</div>
					<div class="col-xs-6">
						<select id="index" class="form-control">
							<option value="0" en="area_0" cn="区域0"></option>
							<option value="1" en="area_1" cn="区域1"></option>
							<option value="2" en="area_2" cn="区域2"></option>
							<option value="3" en="area_3" cn="区域3"></option>
							<option value="4" en="area_4" cn="区域4"></option>
							<option value="5" en="area_5" cn="区域5"></option>
							<option value="6" en="area_6" cn="区域6"></option>
							<option value="7" en="area_7" cn="区域7"></option>
						</select>
					</div>
				</div>
			</div>
			<img id="snap" src="" style="">
			<div style="padding-bottom: 56.25%; position: absolute; left: 5px; right: 5px; top:56px;" id="rectP">
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
							<en>BG framerate</en>
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
	var curIndex = -1;
	var curRoi = null;

	function init() {
		for ( var i = 0; i < config.length; i++ ) {
			if ( config[ i ].type == "file" || !config[i].enable )
				continue;
			$( "#channels" ).append( '<option value="' + i + '">' + config[ i ].name + '</option>' );
		}
		setChannel( 0 );
		setInterval( show, 300 );

		$( "#channels" ).change( function () {
			setChannel( $( "#channels" ).val() );

		} );

		$( "#index" ).change( function () {
			setIndex( $( "#index" ).val() );
		} );
	}

	function setIndex( id ) {
		curIndex = id;
		curRoi = config[ curChn ].encv.roi[ curIndex ];
		zcfg( "#edit", curRoi );
		$("#rect").css("left",(100*curRoi.x)+"%");
		$("#rect").css("top",(100*curRoi.y)+"%");
		$("#rect").css("width",(100*curRoi.w)+"%");
		$("#rect").css("height",(100*curRoi.h)+"%");
		$("#rect").css("display","block");
	}

	$.getJSON( "config/config.json", function ( result ) {
		config = result;
		init();
	} );

	function setChannel( id ) {
		curChn = id;
		$( "#index" ).val(0);
		setIndex(0);
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
		setTimeout( snap, 200 );
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
