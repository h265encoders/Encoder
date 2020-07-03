<?php
include( "head.php" );
?>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" >
				连接状态：<span class="state"></span><br>
				信号质量：<span class="signal"></span><br>
				网络类型：<span class="service"></span><br>
				SIM卡：<span class="sim"></span><br>
				运营商：<span class="oper"></span>
			</div>
			<div class="col-md-8">
				<div class="netChart" style="height: 150px;"></div>
			</div>
		</div>		
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" >
				连接状态：<span class="state"></span><br>
				信号质量：<span class="signal"></span><br>
				网络类型：<span class="service"></span><br>
				SIM卡：<span class="sim"></span><br>
				运营商：<span class="oper"></span>
			</div>
			<div class="col-md-8">
				<div class="netChart" style="height: 150px;"></div>
			</div>
		</div>		
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" >
				连接状态：<span class="state"></span><br>
				信号质量：<span class="signal"></span><br>
				网络类型：<span class="service"></span><br>
				SIM卡：<span class="sim"></span><br>
				运营商：<span class="oper"></span>
			</div>
			<div class="col-md-8">
				<div class="netChart" style="height: 150px;"></div>
			</div>
		</div>		
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" >
				连接状态：<span class="state"></span><br>
				信号质量：<span class="signal"></span><br>
				网络类型：<span class="service"></span><br>
				SIM卡：<span class="sim"></span><br>
				运营商：<span class="oper"></span>
			</div>
			<div class="col-md-8">
				<div class="netChart" style="height: 150px;"></div>
			</div>
		</div>		
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" >
				连接状态：<span class="state"></span><br>
				信号质量：<span class="signal"></span><br>
				网络类型：<span class="service"></span><br>
				SIM卡：<span class="sim"></span><br>
				运营商：<span class="oper"></span>
			</div>
			<div class="col-md-8">
				<div class="netChart" style="height: 150px;"></div>
			</div>
		</div>		
	</div>
</div>
<script src="vendor/flot-chart/jquery.flot.js"></script>
<script src="vendor/flot-chart/jquery.flot.tooltip.js"></script>
<script src="vendor/flot-chart/jquery.flot.resize.js"></script>
<script src="vendor/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="vendor/flot-chart/jquery.flot.selection.js"></script>
<script src="vendor/flot-chart/jquery.flot.stack.js"></script>
<script src="vendor/flot-chart/jquery.flot.time.js"></script>
<script src="vendor/pie/jquery.easypiechart.js"></script>
<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script>
	$( function () {
		

		var charts = new Array();
		var datas1 = new Array();
		var datas2 = new Array();
		$( ".netChart" ).each( function ( index, element ) {

				try {
					var data1 = [];
					var data2 = [];
					var maxy = 100;
					for ( var i = 0; i < 100; i++ ) {
						data1.push( 0 );
						data2.push( 0 );
					}


					function GetData1( d ) {
						data1.shift();
						data1.push( d );
						var rt = [];
						for ( var i = 0; i < 100; i++ )
							rt.push( [ i, data1[ i ] ] );
						return rt;
					}
					datas1.push( GetData1 );

					function GetData2( d ) {
						data2.shift();
						data2.push( d );
						var rt = [];
						for ( var i = 0; i < 100; i++ )
							rt.push( [ i, data2[ i ] ] );
						return rt;
					}
					datas2.push( GetData2 );

					var bandwidth = 5;

					var plot = $.plot( $( element ), [
						GetData1( 10 ), GetData2( 10 )
					], {
						series: {
							lines: {
								show: true,
								fill: true
							},
							shadowSize: 0
						},
						yaxis: {
							min: 0,
							max: 1024 * bandwidth,
							tickSize: 1024 * bandwidth / 2,
							tickFormatter: function ( v, axis ) {

								v /= 1024;
								return Math.floor( v ) + "Mb/s";
							}
						},
						xaxis: {
							show: false
						},
						grid: {
							hoverable: true,
							clickable: true,
							tickColor: "#eeeeee",
							borderWidth: 1,
							borderColor: "#FFC68C"
						},
						colors: [ "#FF9933", "#555" ],
						tooltip: false
					} );

					charts.push( plot );
				} catch ( e ) {
					console.log(e);
				}
			} );
		
		function update2() {
			rpc2("net.getReport",null, function ( data ) {
				console.log(data);
				for ( var i = 0; i < data.length; i++ ) {
					
					var txdat;
					var rxdat;
					txdat = datas1[ i ]( data[i].tx );
					rxdat = datas2[ i ]( data[i].rx );
					try {

						charts[ i ].setData( [ txdat, rxdat ] );
						charts[ i ].draw();
					} catch ( e ) {
						console.log(e);
					}
					$( ".state" ).eq(i).text( data[i].state?"已连接":"未连接" );
					$( ".signal" ).eq(i).text( data[i].rssi );
					$( ".service" ).eq(i).text( data[i].service );
					$( ".sim" ).eq(i).text( data[i].sim?"OK":"Error" );
					$( ".oper" ).eq(i).text( data[i].oper );

				}

			} );

			setTimeout( update2, 1000 );
		}
		update2();


	} );
</script>
<?php
include( "foot.php" );
?>