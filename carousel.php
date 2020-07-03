<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>时间轴</cn>
					<en>Timeline</en>
				</h3>
			</div>
			<div class="panel-body text-center" id="tt">
				<input class="slider" id="timeline" type="text" data-slider-step="1"/>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>文件列表</cn>
					<en>File list</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-inline" id="cfg">
					<label class="control-label">
						<cn>文件选择</cn>
						<en>File select</en>:
					</label>
					<select class="form-control" id="fileSelect"></select>
					<button id="btnAdd" type="button" class="btn btn-warning">
						<cn>添加</cn>
						<en>Add</en>
					</button>

					<label class="control-label">
						<cn>开关</cn>
						<en>Enable</en>:
					</label>
					<input type="checkbox" zcfg="enable" class="switch form-control">
				</form>
				<hr/>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>
								<cn>序号</cn>
								<en>Num</en>
							</th>
							<th>
								<cn>文件名</cn>
								<en>file name</en>
							</th>
							<th>
								<cn>时长</cn>
								<en>duration</en>
							</th>
							<th>
								<cn>操作</cn>
								<en>option</en>
							</th>
						</tr>

					</thead>
					<tbody id="playList">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="vendor/switch/bootstrap-switch.js"></script>
<script src="vendor/slider/bootstrap-slider.min.js" type="text/javascript"></script>
<script src="js/zcfg.js"></script>
<script>
	$.fn.bootstrapSwitch.defaults.size = 'small';
	$.fn.bootstrapSwitch.defaults.onColor = 'warning';
	navIndex( 4 );
	var playList;
	var fileList;
	var timerId = -1;
	var ticks;
	var ticks_labels;
	var sliding = false;
	var config;


	function timeFormat( ms ) {
		var m = Math.floor( ms / 60000 );
		var t = ms % 60000;
		var s = Math.floor( t / 1000 );
		if ( s < 10 )
			s = "0" + s;
		return "[" + m + ":" + s + "]";
	}

	$.getJSON( "config/config.json", function ( result ) {
		config = result;
		for ( var i = 0; i < config.length; i++ ) {
			if ( config[ i ].type == "file" ) {
				
				zcfg( "#cfg", config[ i ] );
				
				break;
			}
		}

	} );
	$("#cfg .switch").on("switchChange.bootstrapSwitch",function ( evt ) {
					save();
	});

	function save() {
		for ( var i = 0; i < config.length; i++ ) {
			if ( config[ i ].type == "file" ) {
				var list = new Array();
				for ( var k = 0; k < playList.length; k++ ) {
					list.push( playList[ k ].name );
				}
				config[ i ].file = list;
				config[ i ].enable = $("#cfg .switch").is( ":checked" );
				rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
					getList();
				} );
				break;
			}
		}
	}
	
	

	$( "#btnAdd" ).click( function () {
		var n = new Object();
		n.name = fileList[ $( "#fileSelect" ).val() ].name;
		n.duration = 0;
		playList.push( n );
		save();
	} );

	function swap( a, b ) {
		if ( a < 0 || a >= playList.length )
			return;

		var t = playList[ a ];
		playList[ a ] = playList[ b ];
		playList[ b ] = t;
		save();
	}

	function del( i ) {
		playList.splice( i, 1 );
		save();
	}

	function showList() {
		var curTime = 1000000;
		var totalLen = 0;
		ticks = new Array();
		ticks_labels = new Array();
		var ticks_positions = new Array();
		var html = "";
		for ( var i = 0; i < playList.length; i++ ) {
			ticks_labels.push( playList[ i ].name );
			ticks.push( totalLen );
			totalLen += playList[ i ].duration;
			html += "<tr>";
			html += '<td>' + ( i + 1 ) + '</td>';
			html += '<td>' + playList[ i ].name + '</td>';
			html += '<td>' + timeFormat( playList[ i ].duration ) + '</td>';
			html += '<td><button class="btn btn-warning" onclick="swap(' + ( i - 1 ) + ',' + i + ');"><i class="fa fa-arrow-up"></i></button> ';
			html += '<button class="btn btn-warning" onclick="swap(' + ( i + 1 ) + ',' + i + ');"><i class="fa fa-arrow-down"></i></button> ';
			html += '<button class="btn btn-danger"  onclick="del(' + i + ');"><cn>移除</cn><en>Remove</en></button></td>';
			html += "</tr>";
		}

		ticks_labels.push( "End" );
		ticks.push( totalLen );
		for ( var i = 0; i < ticks.length; i++ ) {
			ticks_positions.push( ticks[ i ] / totalLen * 100 );
		}
		$( "#tt" ).html( '<input class="slider" id="timeline" type="text" data-slider-step="1"/>' );
		$( "#timeline" ).slider( {
			ticks: ticks,
			ticks_labels: ticks_labels,
			ticks_positions: ticks_positions,
			ticks_snap_bounds: 60000,
			formatter: function ( a ) {
				return timeFormat( a );
			}
		} );

		$( "#timeline" ).on( "slideStart", function ( val ) {
			sliding = true;

		} );
		$( "#timeline" ).on( "slideStop", function ( val ) {
			sliding = false;
			var pos = $( "#timeline" ).val();
			var time = 0;
			var index = 0;
			for ( var i = 0; i < ticks.length; i++ ) {
				if ( ticks[ i ] <= pos ) {
					index = i;
					time = Math.floor( pos - ticks[ i ] );
				}

			}
			rpc( "enc.play", [ index, time ], function ( ret ) {} );
		} );

		$( "#playList" ).html( html );
		if ( timerId == -1 )
			timerId = setInterval( getPosition, 1000 );
	}

	function getPosition() {
		if ( sliding )
			return;
		rpc( "enc.getPlayPosition", null, function ( ret ) {
			var index = 0;
			for ( var i = 0; i < playList.length; i++ ) {
				if ( playList[ i ].name == ret.file ) {
					index = i;
					break;
				}
			}
			var time = ret.position;
			var total = ticks[ index ] + time;
			$( "#timeline" ).slider( 'setValue', total );
		} );
	}



	function getList() {
		rpc( "enc.getPlayList", null, function ( list ) {
			playList = list;
			showList();
		} );

	}
	getList();


	$.getJSON( "usb/", function ( list ) {
		fileList = list;

		for ( var i = 0; i < list.length; i++ ) {
			if ( list[ i ].type != "file" )
				continue;
			$( "#fileSelect" ).append( '<option value="' + i + '">' + list[ i ].name + '</option>' );
		}



	} );
</script>
<?php
include( "foot.php" );
?>