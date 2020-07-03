<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>视频预览</cn>
					<en>Preview</en>
					<small><cn>推流后可见</cn><en>visible when pushing</en></small>
				</h3>
			</div>
			<div class="panel-body">
				<video id="player" controls style="width:100%;height: 294px; background: #555;"></video>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>基本设置</cn>
					<en>Basic config</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="push" role="form">
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>视频源</cn><en>Video source</en></label>
						<div class="col-md-6 col-sm-8">
							<select id="srcV" zcfg="srcV" class="form-control"></select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>音频源</cn><en>Audio source</en></label>
						<div class="col-md-6 col-sm-8">
							<select id="srcA" zcfg="srcA" class="form-control">
								<option value="-1" cn="无" en="None"></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>自动运行</cn><en>Autorun</en></label>
						<div class="col-md-6 col-sm-8">
							<input zcfg="autorun" type="checkbox" class="switch form-control">
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
					<div class="form-group">
						<div class="text-center">
							<button type="button" id="save" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
								<cn>保存</cn>
								<en>Save</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="recBar">
			<div class="row">
				<div class="col-sm-4 text-right" style="line-height: 34px;">
					<strong id="time">[--:--]</strong>
				</div>
				<div class="col-sm-4 text-center">
					<button type="button" id="start" class="btn btn-warning">
						<i class="fa fa-video-camera"></i>
						<cn>推流</cn>
						<en>Push</en>
					</button>

					<button type="button" id="stop" class="btn btn-default disabled ">
						<i class="fa fa-stop"></i>
						<cn>停止</cn>
						<en>Stop</en>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">

</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>推流设置</cn>
					<en>Push config</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="url" role="form">
					<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>描述</cn>
						<en>Description</en>
					</div>
					<div class="col-md-7 col-xs-4">
						URL
					</div>
					<div class="col-md-1 col-xs-2">
						<cn>启用</cn>
						<en>Enable</en>
					</div>
					<div class="col-md-1 col-xs-2">
						<cn>操作</cn>
						<en>Option</en>
					</div>
					<div class="col-md-1 col-xs-2">
						<cn>速度</cn>
						<en>Speed</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetURL">
					<div class="row" style="margin-top: 5px;">
						<div class="col-md-2 col-xs-4">			
							<input zcfg="[#].des" type="text" class="form-control">				
						</div>
						<div class="col-md-7 col-xs-4">
							<input zcfg="[#].path" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2 text-center">
							<input type="checkbox" zcfg="[#].enable" class="switch form-control">
						</div>
						<div class="col-md-1 col-xs-2 text-center">
							<button type="button" class="del btn btn-default">
								<cn>删除</cn>
								<en>Delete</en>
							</button>
						</div>
						<div class="col-md-1 col-xs-2 text-center">
							<p class="form-control-static speed"></p>
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
					<div class="row" style="margin-top: 5px;" id="newUrl">
						<div class="col-md-2 col-xs-4">			
							<input zcfg="des" type="text" class="form-control">				
						</div>
						<div class="col-md-7 col-xs-4">
							<input zcfg="path" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2 text-center">
							<input  zcfg="enable" id="addEnable" type="checkbox" class="switch form-control">
						</div>
						<div class="col-md-1 col-xs-2 text-center">
							<button id="add" type="button" class="btn btn-warning">
								<cn>添加</cn>
								<en>Add</en>
							</button>
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
					<div class="form-group">
						<div class="text-center">
							<button type="button" id="save2" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
								<cn>保存</cn>
								<en>Save</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>

<script language="javascript" src="js/flv.js" ></script>
<script src="js/zcfg.js"></script>
<script src="vendor/switch/bootstrap-switch.js"></script>
<script>
	$( function () {
		navIndex( 4 );
		
		
		$.fn.bootstrapSwitch.defaults.size = 'small';
		$.fn.bootstrapSwitch.defaults.onColor = 'warning';
		$( "#addEnable" ).bootstrapSwitch();

		var player=null;
		var playerLoad=false;


		if (flvjs.isSupported()) {
			player = flvjs.createPlayer({
				type: 'flv',
				hasAudio: false,
				url: 'http://'+window.location.host+'/flv?app=live&stream=preview'
			});
			player.attachMediaElement(document.getElementById("player"));

		}

		function startPreview()
		{
			if(player==null)
				return;
			if(!playerLoad)
			{
				playerLoad=true;
				player.load();
			}
			player.play();
		}

		function stopPreview()
		{
			if(player==null)
				return;
			player.pause();

			if(playerLoad)
			{
				playerLoad=false;
				player.unload();
			}
		}

		var config;
		
		
		$.getJSON( "config/config.json", function ( res ) {
			var cfg = res;
			for ( var i = 0; i < cfg.length; i++ ) {
				if(cfg[i].enable){
					$( "#srcV" ).append( '<option value="' + cfg[ i ].id + '">' + cfg[ i ].name + '</option>' );
					$( "#srcA" ).append( '<option value="' + cfg[ i ].id + '">' + cfg[ i ].name + '</option>' );
				}
			}
			
			$.getJSON( "config/push.json", function ( result ) {
				config = result;
				zcfg( "#push", config );
				zctemplet( "#templetURL", config.url );
				setDel();				
			} );
		} );
		
		function setDel()
		{
			$(".del").each(function(index,obj){
					$(obj).click(function(){
						$(".del").each(function(index2,obj2){
							if(obj==obj2){
								config.url.splice(index2,1);
								zctemplet( "#templetURL", config.url );
								setDel();
								save();
								return;
							}
						});
					});
				});
		}
		
		var newUrl={};
		newUrl.enable=false;
		newUrl.url="";
		newUrl.des="";
		zcfg( "#newUrl", newUrl );
		
		$( "#add" ).click( function ( e ) {
			var url={};
			$.extend(true,url, newUrl);
			config.url.push(url);
			zctemplet( "#templetURL", config.url );
			setDel();
			save();
		} );
		
		
		
		
		var duration = 0;
		var updateTime = 0;
		var isPushing = false;

		function getState() {
			rpc( "push.getState", null, function ( data ) {
				duration = data.duration / 1000;
				var now = new Date();
				updateTime = now.getTime() / 1000;
				if(isPushing != data.pushing)
				{
					if(data.pushing)
						setTimeout(startPreview,3000);
					else
						stopPreview();
				}
				isPushing = data.pushing;
				if ( isPushing ) {
					$( "#start" ).removeClass( "btn-warning" );
					$( "#start" ).addClass( "btn-default" );
					$( "#start" ).addClass( "disabled" );
					$( "#stop" ).removeClass( "disabled" );
					$( "#stop" ).removeClass( "btn-default" );
					$( "#stop" ).addClass( "btn-warning" );
				} else {
					$( "#stop" ).removeClass( "btn-warning" );
					$( "#stop" ).addClass( "btn-default" );
					$( "#stop" ).addClass( "disabled" );
					$( "#start" ).removeClass( "disabled" );
					$( "#start" ).removeClass( "btn-default" );
					$( "#start" ).addClass( "btn-warning" );
				}
				
				for(var i=0;i<data.speed.length;i++)
				{
					$(".speed").eq(i).text(data.speed[i]+"kb/s");
				}
			} );
		}

		function onTimer() {
			if ( isPushing ) {
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
			setInterval( getState, 3000 );
		}
		init();

		$( "#start" ).click( function ( e ) {
			rpc( "push.start", null, function ( data ) {
				getState();
			} );
		} );

		$( "#stop" ).click( function ( e ) {
			rpc( "push.stop", null, function ( data ) {
				getState();
			} );
		} );
		
		function save()
		{
			rpc( "push.update", [ JSON.stringify( config, null, 2 ) ], function ( res ) {
				if ( typeof ( res.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
		}
		
		

		$( "#save" ).click( save );
		$( "#save2" ).click( save );

		
	} );
</script>
<?php
include( "foot.php" );
?>