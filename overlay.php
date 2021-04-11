<?php
include( "head.php" );
?>
<div class="row" id="effect">
	<div class="col-md-7">
		<div class="thumbnail">
			<div class="caption">
				<select id="channels" class="form-control">
          </select>
			
			</div>
			<img id="snap" src=""> </div>
	</div>
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>特效编辑</cn>
					<en>Effect edit</en> <small id="editIndex"></small>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="edit">
					<div class="form-group">
						<label class="col-md-3 control-label">
							<cn>显示</cn>
							<en>Visable</en>
						</label>
						<div class="col-md-9">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group " id="mask">
						<label class="col-md-3 control-label">
							<cn>强度</cn>
							<en>Strength</en>
						</label>
						<div class="col-md-6">
							<select zcfg="content" class="form-control">
								<option value="8">8</option>
								<option value="16">16</option>
								<option value="32">32</option>
								<option value="64">64</option>
							</select>
						</div>
					</div>
					<div class="form-group " id="pic">
						<label class="col-md-3 control-label">
							<cn>图片</cn>
							<en>Image</en>
						</label>
						<div class="col-md-6">
							<select zcfg="content" class="form-control">
                </select>
						
						</div>
					</div>
					<div class="form-group " id="text">
						<label class="col-md-3 control-label">
							<cn>文字</cn>
							<en>Text</en>
						</label>
						<div class="col-md-6">
							<input zcfg="content" class="form-control" type="text"/>
						</div>
					</div>
					<div class="form-group " id="font">
						<label class="col-md-3 control-label">
							<cn>字体</cn>
							<en>Font</en>
						</label>
						<div class="col-md-6">
							<select zcfg="font" class="form-control">
                </select>
						
						</div>
					</div>
					<div class="form-group " id="move">
						<label class="col-md-3 control-label">
							<cn>移动</cn>
							<en>Move</en>
						</label>
						<div class="col-md-9">
							<input zcfg="move" class="slider" type="text" data-slider-min="-20" data-slider-max="20" data-slider-step="1"/>
						</div>
					</div>
					<div class="form-group " id="x">
						<label class="col-md-3 control-label">
							<cn>水平位置</cn>
							<en>Pos X</en>
						</label>
						<div class="col-md-9">
							<input zcfg="x" class="slider" type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.001"/>
						</div>
					</div>
					<div class="form-group " id="y">
						<label class="col-md-3 control-label">
							<cn>垂直位置</cn>
							<en>Pos Y</en>
						</label>
						<div class="col-md-9">
							<input zcfg="y" class="slider" type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.001"/>
						</div>
					</div>
					<div class="form-group " id="w">
						<label class="col-md-3 control-label">
							<cn>宽度</cn>
							<en>Width</en>
						</label>
						<div class="col-md-9">
							<input zcfg="w" class="slider" type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.001"/>
						</div>
					</div>
					<div class="form-group " id="h">
						<label class="col-md-3 control-label">
							<cn>高度</cn>
							<en>Height</en>
						</label>
						<div class="col-md-9">
							<input zcfg="h" class="slider" type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.001"/>
						</div>
					</div>
					<div class="form-group " id="border">
						<label class="col-md-3 control-label">
							<cn>边框宽度</cn>
							<en>Border</en>
						</label>
						<div class="col-md-9">
							<input zcfg="border" class="slider" type="text" data-slider-min="1" data-slider-max="50" data-slider-step="1"/>
						</div>
					</div>
					<div class="form-group " id="color">
						<label class="col-md-3 control-label">
							<cn>颜色</cn>
							<en>Color</en>
						</label>
						<div class="col-md-6">
							<input zcfg="color" class="colorPicker form-control" type="text"/>
						</div>
					</div>
					<div class="form-group row" id="bgColor">
						<label class="col-md-3 col-form-label text-right">
							<cn>背景色</cn>
							<en>Back color</en>
						</label>
						<div class="col-md-6">
							<input zcfg="bgColor" class="colorPicker form-control" type="text"/>
						</div>
					</div>
					<div class="form-group " id="scale">
						<label class="col-md-3 control-label">
							<cn>缩放</cn>
							<en>Scale</en>
						</label>
						<div class="col-md-9">
							<input zcfg="scale" class="slider" type="text" data-slider-min="0.1" data-slider-max="4" data-slider-step="0.01"/>
						</div>
					</div>
					<div class="form-group " id="alpha">
						<label class="col-md-3 control-label">
							<cn>透明度</cn>
							<en>Alpha</en>
						</label>
						<div class="col-md-9">
							<input zcfg="alpha" class="slider" type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.01"/>
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
<div class="row">
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="panel-title">
							<cn>特效列表</cn>
							<en>Effect list</en>
						</h3>
					</div>
					<div class="col-xs-6 text-right">
						<button id="btnAddShow" class="btn btn-xs btn-warning"><i class="fa fa-plus"></i> <cn>新建特效</cn><en>New effect</en></button>
					</div>
				</div>
			</div>
			<table id="list" class="table table-striped text-center">
			</table>
		</div>
	</div>
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>资源列表</cn>
					<en>Resource</en>
				</h3>
			</div>
			<div class="panel-body">
				<button id="btnUpload" type="button" class="btn btn-sm btn-warning"><i class="fa fa-upload"></i><cn>上传</cn><en>Upload</en></button>
			</div>
			<table id="resList" class="table table-striped text-center">
			</table>

		</div>
	</div>
</div>
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="add">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>类型</cn>
							<en>Type</en>
						</label>
						<div class="col-sm-8">
							<select id="addType" class="form-control">
								<option cn="水印" en="Image" value="pic"></option>
								<option cn="字幕" en="Text" value="text"></option>
								<option cn="马赛克" en="Mosaic" value="mask"></option>
								<option cn="时间" en="Time" value="time"></option>
								<option cn="矩形" en="Rect" value="rect"></option>
								<option cn="边框" en="Border" value="border"></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button id="btnAdd" type="button" class="btn btn-warning">
								<cn>添加特效</cn>
								<en>Add effect</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body text-center">
				<div id="uploader" class="wu-example">
					<div id="thelist" class="uploader-list"></div>
					<div class="btns">
						<div id="picker">
							<cn>选择文件</cn>
							<en>Select file</en>
						</div>
						<button id="ctlBtn" role="button" type="button" class="btn btn-default">
							<cn>开始上传</cn>
							<en>Upload</en>
						</button>
					</div>
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
	navIndex( 3 );
	$( '.colorPicker' ).colorpicker( {
		"format": "hex"
	} );
	$( ".slider" ).slider();
	$.fn.bootstrapSwitch.defaults.size = 'small';
	$.fn.bootstrapSwitch.defaults.onColor = 'warning';
	$( ".switch" ).bootstrapSwitch();
	var config = null;
	var lays;
	var curChn = -1;
	var curOvr = -1;
	getRes();

	function init() {
		for ( var i = 0; i < config.length; i++ ) {
			if ( config[ i ].type == "file" )
				continue;
			$( "#channels" ).append( '<option value="' + i + '">' + config[ i ].name + '</option>' );
		}
		setChannel( 0 );
		//show();
		setInterval( show, 300 );

		$( "#channels" ).change( function () {
			setChannel( $( "#channels" ).val() );

		} );
	}


	function setChannel( id ) {
		curChn = id;
		lays = config[ id ].overlay;
		var list = lays;
		$( "#list" ).html( "" );
		var str = "";
		for ( var i = 0; i < list.length; i++ ) {
			var data = list[ i ];
			str += '<tr><td>#' + i + '</td><td>';
			if ( data.type == "pic" )
				str += "<cn>水印</cn><en>Image</en>";
			if ( data.type == "text" )
				str += "<cn>字幕</cn><en>Text</en>";
			if ( data.type == "mask" )
				str += "<cn>马赛克</cn><en>Mosaic</en>";
			if ( data.type == "time" )
				str += "<cn>时间</cn><en>Time</en>";
			if ( data.type == "rect" )
				str += "<cn>矩形</cn><en>Rect</en>";
			if ( data.type == "border" )
				str += "<cn>边框</cn><en>border</en>";
			str += '</td><td>' + data.content + '</td>';
			str += '<td>x:' + data.x + ', y:' + data.y + '</td>';
			str += '<td><button  onClick="edit(' + i + ');" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> <cn>编辑</cn><en>Edit</en></button> ';
			str += '<button onClick="del(' + i + ');" class="btn btn-sm btn-warning"><i class="fa fa-minus"></i> <cn>删除</cn><en>Delete</en></button></td></tr>';
		}
		$( "#list" ).html( str );

		if ( list.length > 0 )
			edit( 0 );
		else
			edit( -1 );
	}



	function getRes() {
		$.getJSON( "res/", function ( list ) {
			$( "#pic select" ).html( "" );
			$( "#font select" ).html( "" );
			$( "#resList" ).html( "" );
			for ( var i = 0; i < list.length; i++ ) {
				if ( list[ i ].name.indexOf( ".png" ) > 0 )
					$( "#pic select" ).append( '<option value="/link/res/' + list[ i ].name + '">' + list[ i ].name + '</option>' );
				else
					$( "#font select" ).append( '<option value="/link/res/' + list[ i ].name + '">' + list[ i ].name + '</option>' );

				if(list[ i ].name!="led.ttf" && list[ i ].name!="font.ttf")
					$( "#resList" ).append( '<tr><td>' + list[ i ].name + '</td><td><button onclick="delRes(\'' + list[ i ].name + '\')" class="btn btn-sm btn-warning"><cn>删除</cn><en>Delete</en></button></td></tr>' );
			}

			if ( config == null ) {
				$.getJSON( "config/config.json", function ( result ) {
					config = result;
					init();
				} );
			}
		} );
	}

	function edit( id ) {
		if ( id == -1 ) {
			showHide( "null" );
			return;
		}
		curOvr = id;
		zcfg( "#edit", config[ curChn ].overlay[ id ] );
		showHide( config[ curChn ].overlay[ id ].type );
		$( "#editIndex" ).text( "#" + id );
		$( "#list tr" ).removeClass( "info" );
		$( "#list tr" ).eq( id ).addClass( "info" );
	}

	function del( id ) {
		$.confirm( {
			title: '<cn>删除特效</cn><en>Delete effect</en>',
			content: '<cn>是否确认删除特效？</cn><en>Delete effect?</en>',
			buttons: {
				ok: {
					text: "<cn>确认删除</cn><en>Confirm</en>",
					btnClass: 'btn-warning',
					keys: [ 'enter' ],
					action: function () {
						config[ curChn ].overlay.splice( id, 1 );
						setChannel( curChn );
						save();
					}

				},
				cancel: {
					text: "<cn>取消</cn><en>Cancel</en>",
					action: function () {
						console.log( 'the user clicked cancel' );
					}
				}

			}
		} );

	}

	function snap() {
		rpc( "enc.snap" );
	}

	function show() {
		setTimeout( snap, 100 );
		$( "#snap" ).attr( "src", "snap/snap" + curChn + ".jpg?rnd=" + Math.random() );
	}

	//	  $("#snap").load(function(){
	//		  // 加载完成    
	//		});

	function showHide( type ) {
		if ( type == "null" ) {
			$( "#edit" ).hide();
			return;
		}
		$( "#edit" ).show();
		$( "#edit #pic" ).hide();
		$( "#edit #text" ).hide();
		$( "#edit #mask" ).hide();
		$( "#edit #border" ).hide();
		
		if(type!="rect")
			$( "#edit #" + type ).show();
		
		if ( type == "mask" ) {
			$( "#edit #w, #edit #h" ).show();
			$( "#edit #scale" ).hide();
			$( "#edit #alpha" ).hide();
		} else {
			$( "#edit #w, #edit #h" ).hide();
			$( "#edit #scale" ).show();
			$( "#edit #alpha" ).show();
		}

		if ( type == "text" || type == "time" ) {
			
			$( "#edit #text" ).show();
			if ( type == "text")
				$( "#edit #w" ).show();
			$( "#edit #move" ).show();
			$( "#edit #color" ).show();
			$( "#edit #bgColor" ).show();
			$( "#edit #font" ).show();
		} else {
			$( "#edit #move" ).hide();
			$( "#edit #color" ).hide();
			$( "#edit #bgColor" ).hide();
			$( "#edit #font" ).hide();
		}
		
		if ( type == "rect" || type == "border" ) {
			$( "#edit #color" ).show();
			$( "#edit #w, #edit #h" ).show();
			$( "#edit #alpha" ).show();
		}
	}

	function delRes( name ) {
		func( "delRes", {
			file: name
		}, function ( data ) {
			getRes();
		} );
	}


	function save() {
		rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
			if ( typeof ( data.error ) != "undefined" ) {
				htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
			}
		} );
	}
	$( "#btnUpload" ).click( function () {
		$( '#modalUpload' ).modal( 'show' );
	} );
	var initUpload = false;
	$( '#modalUpload' ).on( 'shown.bs.modal', function ( e ) {
		if ( initUpload )
			return;
		initUpload = true;
		var $list = $( "#thelist" ); //这几个初始化全局的百度文档上没说明，好蛋疼。  
		var $btn = $( "#ctlBtn" ); //开始上传  
		var uploader = WebUploader.create( {

			// swf文件路径
			swf: 'webuploader/Uploader.swf',

			// 文件接收服务端。
			server: 'upload2.php?path=res',

			// 选择文件的按钮。可选。
			// 内部根据当前运行是创建，可能是input元素，也可能是flash.
			pick: '#picker',

			// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
			resize: false
		} );
		uploader.on( 'fileQueued', function ( file ) {
			$list.append( '<div id="' + file.id + '" class="item">' +
				'<h4 class="info">' + file.name + '</h4>' +
				'<p class="state"><cn>等待上传</cn><en>Waiting for upload</en>...</p>' +
				'</div>' );
		} );
		uploader.on( 'uploadProgress', function ( file, percentage ) {
			var $li = $( '#' + file.id ),
				$percent = $li.find( '.progress .progress-bar' );

			// 避免重复创建
			if ( !$percent.length ) {
				$percent = $( '<div class="progress progress-striped active">' +
					'<div class="progress-bar" role="progressbar" style="width: 0%">' +
					'</div>' +
					'</div>' ).appendTo( $li ).find( '.progress-bar' );
			}

			$li.find( 'p.state' ).html( '<cn>上传中</cn><en>Uploading</en>' );

			$percent.css( 'width', percentage * 100 + '%' );
		} );
		uploader.on( 'uploadSuccess', function ( file ) {
			$( '#' + file.id ).find( 'p.state' ).html( '<cn>已上传</cn><en>Upload done</en>' );
			getRes();
			setTimeout( "$( '#modalUpload' ).modal( 'hide' );", 300 );

		} );

		uploader.on( 'uploadError', function ( file ) {
			$( '#' + file.id ).find( 'p.state' ).html( '<cn>上传出错</cn><en>Upload faild</en>' );
		} );

		uploader.on( 'uploadComplete', function ( file ) {
			$( '#' + file.id ).find( '.progress' ).fadeOut();
		} );
		$btn.on( 'click', function () {
			console.log( "上传..." );
			uploader.upload();
			console.log( "上传成功" );
		} );
	} );

	$( "#btnAddShow" ).click( function () {
		$( '#modalAdd' ).modal( 'show' );
	} );


	$( "#btnAdd" ).click( function () {
		$( '#modalAdd' ).modal( 'hide' );
		config[ curChn ].overlay.push( {
			type: $( "#addType" ).val(),
			x: 0,
			y: 0,
			h: 0,
			w: 0,
			scale: 1,
			content: "",
			enable: false,
			color: "#000000",
			alpha: 1,
			font: ""
		} );
		setChannel( curChn );
		edit( config[ curChn ].overlay.length - 1 );
	} );
</script>
<?php
include( "foot.php" );
?>
