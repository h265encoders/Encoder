<?php
$needLogin=false;
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="title">
				<form class="form-inline ">
					<div class="form-group ">

						<label class="control-label">
							<cn>频道</cn>
							<en>Channel</en>:
						</label>
						<select id="channels" class="form-control"></select>
						<small><cn>需要开启rtmp协议</cn><en>Need to enable rtmp protocol</en></small>
					</div>
				</form>
			</div>
			<div class="panel-body">
				<div style="width:100%; padding-bottom: 56.25%;  position: relative;">
					<video id="player" controls muted autoplay style="width:100%;height: 100%; position: absolute; background: #555;"></video>
				</div>
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


		if (flvjs.isSupported()) {

		}

		function setChannel(id){
			if(player!=null)
			{
				player.unload();
				player.detachMediaElement();
				player.destroy();
			}

			player = flvjs.createPlayer({
				type: 'flv',
				hasAudio: true,
				url: 'http://'+window.location.host+'/flv?app=live&stream=stream'+id
			});
			player.attachMediaElement(document.getElementById("player"));
			player.load(); //加载
		};

		$( "#channels" ).change( function () {
			setChannel( $( "#channels" ).val() );
		} );




		var config;
		$.getJSON( "config/config.json?rnd=" + Math.random(), function ( result ) {
			config = result;
			var first=-1;
			for ( var i = 0; i < config.length; i++ ) {
				if ( !config[ i ].enable || !config[i].stream.rtmp )
					continue;
				if(first==-1)
					first=config[ i ].id;
				$( "#channels" ).append( '<option value="' + config[ i ].id + '">' + config[ i ].name + '</option>' );
			}
			setChannel(first);
		} );

		
	} );
</script>
<?php
include( "foot.php" );
?>