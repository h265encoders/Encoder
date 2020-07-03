<?php
include( "head.php" );
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>录制参数</cn>
					<en>Record config</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alert"></div>
				<hr style="margin: 0;">
				<div class="row">
				<div class="col-sm-2 text-right"  style="line-height: 40px;">
						<strong><cn>通道选择</cn>
					<en>Channel select</en></strong>
					</div>
					<div class="col-sm-9 ">
						<div class="row" id="channels">
						</div>

					</div>
				</div>
				<hr style="margin: 0;">
				<div class="row" id="format">
					<div class="col-sm-2 text-right"  style="line-height: 40px;">
						<strong><cn>文件格式</cn>
						<en>Format</en></strong>
					</div>
					<div class="col-sm-9 ">
						<div class="row">
							<div class="col-sm-2">
								<div class="checkbox">
									<label>
								  <input type="checkbox" name="mp4"> MP4
								</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="checkbox">
									<label>
								  <input type="checkbox" name="ts"> TS
								</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="checkbox">
									<label>
								  <input type="checkbox" name="flv"> FLV
								</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="checkbox">
									<label>
								  <input type="checkbox" name="mkv"> MKV
								</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="checkbox">
									<label>
								  <input type="checkbox" name="mov"> MOV
								</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="checkbox">
									<label>
								  <input type="checkbox" name="avi"> AVI
								</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr style="margin: 0; margin-bottom: 8px;">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 text-center">
						
						<button type="button" id="save" class="btn btn-warning">
							<cn>保存参数</cn>
							<en>Save config</en>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3" id="recBar">
		<div class="row">
			<div class="col-sm-4 text-right" style="line-height: 34px;">
				<span id="fileName"></span>
				<strong id="time">[--:--]</strong>
			</div>
			<div class="col-sm-4 text-center">
				<button type="button" id="start" class="btn btn-warning">
					<i class="fa fa-video-camera"></i>
					<cn>录制</cn>
					<en>Record</en>
				</button>

				<button type="button" id="stop" class="btn btn-default disabled ">
					<i class="fa fa-stop"></i>
					<cn>停止</cn>
					<en>Stop</en>
				</button>
			</div>
			<div class="col-sm-4 text-left" style="line-height: 34px;">
				<cn>剩余空间</cn>
				<en>Space available</en>:
				<span id="space">-</span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row" id="fileList">
					
				</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<nav aria-label="...">
							<ul class="pagination" id="pagenav">
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="playerModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content text-dark">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<cn>视频播放</cn>
					<en>Video player</en>
				</h4>
			</div>
			<div class="modal-body">
				<div id="player" style="width: 100%; padding-bottom: 56.25%; background: #ccc;">
				</div>
			</div>
		</div>
	</div>
</div>
<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="js/zcfg.js"></script>
<script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
<script src="vendor/jwplayer/jwplayer.js"></script>
<script>
	var isIE = !-[ 1, ];
	var hasFlash = true;
	var inited = false;

	function initPlayer( url ) {
		if ( inited )
			return false;
		inited = true;
		if ( isIE ) {
			try {
				var swf1 = new ActiveXObject( 'ShockwaveFlash.ShockwaveFlash' );
				hasFlash = true;
			} catch ( e ) {
				hasFlash = false;
			}
		} else {
			try {
				var swf2 = navigator.plugins[ 'Shockwave Flash' ];
				if ( swf2 == undefined ) {
					hasFlash = false;
				} else {
					hasFlash = true;
				}
			} catch ( e ) {
				hasFlash = false;
			}
		}
		if ( hasFlash ) {

			jwplayer( "player" ).setup( {
				width: "100%",
				height: "auto",
				autostart: "false",
				aspectratio: "16:9",
				rtmp: {
					bufferlength: 0.1
				},
				playlist: [ {
					file: url
				} ],
				mute: "false",
				androidhls: false
			} );
		}
		return true;
	}

	$( '#playerModal' ).on( 'hidden.bs.modal', function ( e ) {
		jwplayer( "player" ).stop();
	} )

	function play( url ) {

		$( '#playerModal' ).modal( 'show' )

		var host = window.location.host;
		var path = "http://" + host + url;
		if ( !initPlayer( path ) ) {
			jwplayer( "player" ).load( [ {
				file: path
			} ] );
		}
		jwplayer( "player" ).play( true );
	}


	function delFile( name ) {
		$.confirm( {
			title: '<cn>删除文件</cn><en>Delete</en>',
			content: '<cn>是否删除该文件？</cn><en>Confirm to delete this file?</en>',
			buttons: {
				ok: {
					text: "<cn>确认</cn><en>Confirm</en>",
					btnClass: 'btn-warning',
					keys: [ 'enter' ],
					action: function () {
						func( "delFile", {
							"name": name
						}, function ( data ) {
							console.log(data);
							initList();
						} );
					}
				},
				cancel: {
					text: "<cn>取消</cn><en>Cancel</en>",
					action: function () {}
				}

			}
		} );

	}

	var fileList = [];
	var totalPage = 0;
	var curPage = 0;
	var eachPage = 10;
	
		var config = null;
		var chnConfig = null;

	function gotoPage( num ) {
		curPage = num;
		$( "#fileList" ).html( "" );
		var html = "";
		$( "#pagenav li" ).each( function ( i, o ) {
			if ( i == num )
				$( o ).addClass( "active" );
			else
				$( o ).removeClass( "active" );
		} );
		$.ajaxSettings.async = false; 
		for ( var i = num * eachPage; i < fileList.length && i < num * eachPage + eachPage; i++ ) {
			if ( fileList[ i ].type != "directory" || fileList[ i ].name.length!=15 )
				continue;
			
			var name = fileList[ i ].name;
			var path = '/files/' + name + '/';
			var tmp = '<div class="col-md-12"><div class="panel panel-default"><div class="panel-heading text-center">'
						+'<span>'+name+'</span>'
						+'<button onClick="delFile(\'' + name + '\');" type="button" class="btn btn-sm btn-warning pull-right">'
						+'<i class="fa fa-trash-o"></i> <cn>删除</cn><en>Delete</en></button></div><div class="panel-body"><div class="row">';
			$.getJSON( path, function ( list1 ) {
				for(var i=0;i<list1.length;i++){
					if ( list1[ i ].type != "directory" )
						continue;
					var chnId=parseInt(list1[ i ].name);
					
					tmp+='<div class="col-sm-6 col-md-3"><ul class="list-group"><li class="list-group-item text-center">'
							+'<strong>'+chnConfig[chnId].name+'</strong></li>';
					var path2 = path + '/'+list1[ i ].name+'/';
					$.getJSON( path2, function ( list2 ) {
						var tmp2="";
						var jpg="";
						var mp4="";
						for(var i=0;i<list2.length;i++){
							var name2=list2[i].name;
							
							if(name2.indexOf(".jpg")>0)
								jpg='<li class="list-group-item img"><img src="'+path2+name2+'" alt="..."></li>';
							else{
								if(name2.indexOf(".mp4")>0)
									mp4='<li class="list-group-item"><a href="'+path2+name2+'" download="' + name2 + '"><i class="fa fa-download"></i>'+name2+'</a><button type="button" class="btn btn-default btn-xs pull-right" onClick="play(\''+path2+name2+'\');"><i class="fa fa-play"></i></button></li>';
								else
									tmp2+='<li class="list-group-item"><a href="'+path2+name2+'" download="' + name2 + '"><i class="fa fa-download"></i>'+name2+'</a></li>';
							}
						}
						tmp+=jpg+mp4+tmp2+'</ul></div>';
					});
				}
			});
			
			tmp+='</div></div></div></div>';			
			html += tmp;
		}
		$.ajaxSettings.async = true; 
		$( "#fileList" ).html( html );
	}
	
	function initList()
	{
		$.getJSON( "files/", function ( list ) {
      	
        fileList=[];
        for(var i=list.length-1;i>=0;i--)
          fileList.push(list[i]);
        totalPage = Math.ceil( list.length / eachPage );

        var nav = "";
        for ( var i = 0; i < totalPage; i++ ) {
          nav += '<li class="active"><a href="#" onClick="gotoPage('+i+')">'+(i+1)+'</a></li>';
        }
        $( "#pagenav" ).html( nav );
        gotoPage(curPage);
      });
	}

	$( function () {
		navIndex( 4 );
		$.getJSON( "config/record.json?rnd=" + Math.random(), function ( result ) {
			config = result;
			for ( var i = 0; i < config.format.length; i++ ) {
				var fmt = config.format[ i ];
				$( '#format input[name="' + fmt + '"]' ).attr( "checked", true );
			}

			$.getJSON( "config/config.json?rnd=" + Math.random(), function ( chns ) {
				chnConfig = chns;
				var html = "";
				for ( var i = 0; i < chns.length; i++ ) {
					html += '<div class="col-sm-3"><div class="checkbox"><label><input type="checkbox" name="' + i + '">' + chns[ i ].name + '</label></div></div>';
				}
				$( "#channels" ).html( html );
				for ( var i = 0; i < config.channel.length; i++ ) {
					var cid = config.channel[ i ];
					$( "#channels input" ).eq( cid ).attr( "checked", true );
				}
				initList();
			} );

		} );

		var duration = 0;
		var updateTime = 0;
		var isRecording = false;

		function getState() {
			rpc( "rec.getState", null, function ( data ) {
				duration = data.duration / 1000;
				var now = new Date();
				updateTime = now.getTime() / 1000;
				isRecording = data.isRecording;
				$('#space').text(data.space);
				if ( isRecording ) {
					$( '#fileName' ).text( data.fileName );
					$( "#start" ).removeClass( "btn-warning" );
					$( "#start" ).addClass( "btn-default" );
					$( "#start" ).addClass( "disabled" );
					$( "#stop" ).removeClass( "disabled" );
					$( "#stop" ).removeClass( "btn-default" );
					$( "#stop" ).addClass( "btn-warning" );

				} else {
					$( '#fileName' ).text( "" );
					$( "#stop" ).removeClass( "btn-warning" );
					$( "#stop" ).addClass( "btn-default" );
					$( "#stop" ).addClass( "disabled" );
					$( "#start" ).removeClass( "disabled" );
					$( "#start" ).removeClass( "btn-default" );
					$( "#start" ).addClass( "btn-warning" );
				}
			} );
		}

		function onTimer() {
			if ( isRecording ) {
				function fix( num ) {
					if ( num < 10 )
						return '0' + num;
					else
						return num;
				}
				var now = new Date();
				var diff = now.getTime() / 1000 - updateTime + duration;
				var m = Math.floor( diff / 60 );
				var s = Math.floor( diff % 60 );
				$( '#time' ).text( "[" + fix( m ) + ":" + fix( s ) + "]" );
			} else {
				$( '#time' ).text( "[--:--]" );
			}

		}

		function init() {
			
			getState();
			setInterval( onTimer, 1000 );

		}
		init();

		$( "#start" ).click( function ( e ) {
			rpc( "rec.start", null, function ( data ) {
				getState();
			} );
		} );

		$( "#stop" ).click( function ( e ) {
			rpc( "rec.stop", null, function ( data ) {
				getState();
			} );
		} );

		$( "#save" ).click( function ( e ) {
			var fmts = [];
			var chns = [];
			$( "#format :checked" ).each( function ( i, o ) {
				fmts.push( $( o ).attr( "name" ) );
			} );
			$( "#channels :checked" ).each( function ( i, o ) {
				chns.push( $( o ).attr( "name" ) );
			} );
			config.format = fmts;
			config.channel = chns;
			rpc( "rec.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
				if ( typeof ( data.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
				} else
					htmlAlert( "#alert", "success", "<cn>保存设置成功！</cn><en>Save config success!</en>", "", 2000 );
			} );
		} );


	} );
</script>
<?php
include( "foot.php" );
?>