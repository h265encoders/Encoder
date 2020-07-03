<?php
include( "head.php" );
?>
<div class="row" >
	<div class="col-md-12">
		<div style="position:fixed;width:720px;height:576px; margin: 0 auto;">
		  <video id="player" controls autoplay style="width:720px;height:576px; background: #555;"></video>  
		  <div id="#rectP" style="position: absolute;z-index: 999;width:720px;height:576px; top: 0; left:0;">
			<div id="rect" style="position: absolute; border: 4px solid #ff0000;"></div>
		  </div>
		</div>
	</div>
</div>

<script src="vendor/slider/bootstrap-slider.min.js" type="text/javascript"></script>
<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="js/zcfg.js"></script>
<script language="javascript" src="js/flv.js" ></script>
<script>
	navIndex( 4 );
	if (flvjs.isSupported()) {
				var player = flvjs.createPlayer({
					type: 'flv',
					hasAudio: false,
					url: 'http://'+window.location.host+'/flv?app=live&stream=test'
				});
				player.attachMediaElement(document.getElementById("player"));
				player.load(); //加载
		  setInterval( checkDelay, 5000 );
      }
	
	

		function checkDelay() {

			if ( player != null && player.buffered.length > 0 ) {
				//console.log(player.currentTime,player.buffered.end(0));
				if ( player.buffered.end( 0 ) - player.currentTime > 2 ) {
					console.log( "seek" );
					player.currentTime = player.buffered.end( 0 ) - 0.5;
				}
			}
		}
	
	var startX=-1, startY, totalW, totalH;
	$("#rectP").mousedown(function(e){
		console.log(e);
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
</script>
<?php
include( "foot.php" );
?>