<?php
include( "../head.php" );
?>
<div id="audio" class="col-md-12">
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">EQ</div>
									<div class="panel-body dark" style="padding-left:0; padding-right:0;">
										<div class="col-lg-12 text-center">
											<div id="eq">
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq0" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">0~<br>312HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq1" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">313~<br>437HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq2" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">438~<br>562HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq3" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">563~<br>687HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq4" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">688~<br>937HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq5" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">938~<br>1312HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq6" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">1313~<br>1687HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq7" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">1688~<br>2312HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq8" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">2313~<br>3187HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq9" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">3188~<br>4312HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq10" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">4313~<br>5937HZ</div>
												</div>
												<div class="col-md-1 col-sm-2 col-xs-3">
													<div id="eq11" class="volume in" min="-60" max="0"></div>
													<div class="volTitle">5838~<br>7937HZ</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div>
						<button class="btn btn btn-danger" id="saveEQ">保存</button>
					</div>
				</div>
			</div>
		</div>


	</div>
	<div class="row" id="setting">
		<div class="col-lg-12">



			<div class="col-lg-3 col-md-12" id="main">
				<div class="panel panel-default">
					<div class="panel-heading">主输入</div>
					<div class="panel-body dark" style="padding-left:0; padding-right:0;">
						<div class="row text-center">
							<div class="col">
								<div class="volTitle">Main</div>
								<div class="volume sel active" id="vol_main" min="-74" max="5"></div>
								<div class="mute" id="mute_main"></div>
							</div>
							<div class="col">

								<div id="gain">
									<div class="col">
										<div class="volume in" id="vadth" min="0" max="96"></div>
										<div class="volTitle">VAD</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="volTitle">Input Gain</div>
								<div id="gain">
									<div class="col">
										<div class="volume in" id="vol_gain_line1" min="-34.5" max="12"></div>
										<div class="volTitle">Line1</div>
										<div class="mute" id="mute_line1"></div>
									</div>
									<div class="col">
										<div class="volume in" id="vol_gain_line2" min="-34.5" max="12"></div>
										<div class="volTitle">Line2</div>
										<div class="mute" id="mute_line2"></div>
									</div>

								</div>
							</div>
						</div>
						<div class="row arg">
							<div class="arg-line">
								<label>ANR</label>
								<input type="checkbox" class="switch" name="anr">
							</div>
							<div class="arg-line">
								<label>VAD</label>
								<div class="btn-group activeSW" id="vad">
									<button type="button" class="btn btn-sm btn-default active">OFF</button>
									<button type="button" class="btn btn-sm btn-default">LOW</button>
									<button type="button" class="btn btn-sm btn-default">HIGH</button>
								</div>


							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6" id="omni">
				<div class="panel panel-default">
					<div class="panel-heading">全向麦克风</div>
					<div class="panel-body dark">
						<div class="row text-center">
							<div class="col">
								<div class="volTitle">Omni</div>
								<div class="volume sel" id="vol_omni" min="-74" max="5"></div>
								<div class="mute" id="mute_omni"></div>
							</div>
							<div class="col">
								<div id="gain">
									<div class="col">
										<div class="volume in" id="vol_omni_aec" min="0" max="100" percent="true"></div>
										<div class="volTitle">AEC</div>
										<div class="nomute"></div>
									</div>
								</div>
							</div>

						</div>
						<div class="row arg">
							<div class="arg-line">
								<label>AGC</label>
								<input type="checkbox" class="switch" name="agc">
							</div>
							<div class="arg-line">
								<label>AEC</label>
								<input type="checkbox" class="switch" name="aec">
							</div>
							<div class="arg-line">
								<label>ANR</label>
								<input type="checkbox" class="switch" name="anr">
							</div>
							<div class="arg-line">
								<label>EQ</label>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Edit</button>
							</div>
							<div class="arg-line">
								<label style="width:50px;">Boost</label>
								<div class="btn-group activeSW" id="boost">
									<button type="button" class="btn btn-sm btn-default active">LOW</button>
									<button type="button" class="btn btn-sm btn-default">MID</button>
									<button type="button" class="btn btn-sm btn-default">HIGH</button>
								</div>


							</div>

						</div>

					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6" id="output">
				<div class="panel panel-default">
					<div class="panel-heading">输出</div>
					<div class="panel-body dark">
						<div class="row text-center">
							<div class="col">
								<div class="volTitle">Output</div>
								<div class="volume" id="vol_output" min="-74" max="5"></div>
								<div class="mute" id="mute_output"></div>
							</div>
							<div class="col" style="display: none;">
								<div class="volTitle">Monitor</div>
								<div class="volume" id="vol_monitor" min="-74" max="5"></div>
								<div class="mute" id="mute_monitor"></div>
							</div>

						</div>


					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6" id="remote">
				<div class="panel panel-default">
					<div class="panel-heading">远端</div>
					<div class="panel-body dark">
						<div class="row text-center">
							<div class="col">
								<div class="volTitle">Remote</div>
								<div class="volume" id="vol_remote" min="-24" max="24"></div>
								<div class="mute" id="mute_remote"></div>
							</div>

						</div>


					</div>
				</div>
			</div>


		</div>
	</div>
</div>



<script src="/vendor/switch/bootstrap-switch.js"></script>
<script>
	$.fn.InitActiveSW = function () {
		$( this ).children( "button" ).click( function ( e ) {
			if ( $( this ).hasClass( "disable" ) )
				return;
			$( this ).parent().children( "button" ).each( function ( index, element ) {
				$( element ).removeClass( "active" );
			} );
			if ( !$( this ).hasClass( "active" ) )
				$( this ).addClass( "active" );

		} );
	}
	$.fn.activeSWArray = function () {
		var array = new Array();
		for ( var i = 0; i < $( this ).find( "button" ).length; i++ ) {
			array.push( $( this ).find( "button" ).eq( i ).hasClass( "active" ) );
		}
		return array;
	};
	$.fn.activeSW = function () {
		if ( arguments.length == 0 ) {
			for ( var i = 0; i < $( this ).children( "button" ).length; i++ ) {
				if ( $( this ).children( "button" ).eq( i ).hasClass( "active" ) ) {
					return i;
				}
			}

			return -1;
		}

		$( this ).children( "button" ).each( function ( index, element ) {
			$( element ).removeClass( "active" );
		} );
		$( this ).children( "button:eq(" + arguments[ 0 ] + ")" ).addClass( "active" );

	};

	$( ".activeSW" ).InitActiveSW();
	$( ".activeSW .btn" ).click( function () {
		setAudio();
	} );



	$( ".switch" ).on( 'switchChange.bootstrapSwitch', function ( event, state ) {
		setAudio();
	} );
	$( document ).bind( "selectstart", function () {
		return false;
	} );

	$( ".mute" ).append( $( "<span class='fa fa-volume-off'></span><span class='fa fa-volume-up'></span>" ) );
	$( ".mute" ).click( function ( e ) {
		if ( $( this ).hasClass( "active" ) )
			$( this ).removeClass( "active" );
		else
			$( this ).addClass( "active" );
	} );
	$( ".mute" ).click( function () {
		setAudio();
	} );

	$.fn.mute = function () {
		if ( arguments.length == 0 )
			return $( this ).hasClass( "active" );

		var m = arguments[ 0 ];

		if ( m ) {
			if ( !$( this ).hasClass( "active" ) )
				$( this ).addClass( "active" );
		} else
			$( this ).removeClass( "active" );
	};
	$( ".volume" ).append( $( "<div class='bg' ><div class='r' /><div class='y' /><div class='g' /><div class='bar' /></div><div class='gain' ></div><div class='selector' ></div>" ) );
	var mousey = 0;
	var divLeft, divTop;
	var curGain = null;

	function gainMouseDown( e ) {
		divTop = $( this ).position().top;
		mousey = e.pageY;
		if ( event.touches )
			mousey = event.touches[ 0 ].pageY;
		curGain = $( this ).parent();
		$( this ).parent().bind( 'mousemove', dragElement );
		$( this ).parent().bind( 'touchmove', dragElement );
	};
	$( '.volume .gain' ).mousedown( gainMouseDown );
	$( '.volume .gain' ).bind( 'touchstart', gainMouseDown );

	function dragElement( event ) {

		var top = divTop + ( event.pageY - mousey );
		if ( event.touches )
			top = divTop + ( event.touches[ 0 ].pageY - mousey );
		if ( top < 20 )
			top = 20;
		if ( top > $( this ).height() - 20 )
			top = $( this ).height() - 20;
		$( this ).children( ".gain" ).css( {
			'top': top + 'px'
		} );
		$( this ).gainText();
		return false;
	}

	function gainMouseUp() {
		if ( curGain != null ) {
			$( '.volume' ).unbind( 'mousemove' );
			//alert(curGain.gain());
			setAudio();
		}
		curGain = null;
	};
	$( document ).mouseup( gainMouseUp );
	$( document ).bind( 'touchend', gainMouseUp );

	$.fn.vol = function ( v ) {
		var vv = ( 90.0 - v ) / 90.0;
		$( this ).find( ".bar" ).css( {
			'height': vv * 100 + '%'
		} );
	};
	$.fn.gainText = function () {
		var g = 0;
		if ( arguments.length == 0 )
			g = $( this ).gain();
		else
			g = arguments[ 0 ];
		var text = g.toFixed( 1 );
		if ( $( this ).attr( "percent" ) ) {
			text = g.toFixed( 0 );
			text += '%';
		} else if ( text > 0 )
			text = '+' + text;

		$( this ).find( ".gain" ).text( text );
	}
	var intervals = new Array();

	function clearMotion() {
		for ( var i = 0; i < intervals.length; i++ )
			clearInterval( intervals[ i ] );
		intervals = new Array();
	}
	$.fn.gain = function () {
		var th = $( this ).find( ".bg" ).height();
		var tt = th * 0.3;
		var bt = th - tt;
		var gmin = Number( $( this ).attr( "min" ) );
		var gmax = Number( $( this ).attr( "max" ) );


		if ( arguments.length == 0 ) {
			var rt = 0;
			var ct = $( this ).find( ".gain" ).position().top - 20;
			var t = tt - ct;

			if ( gmin < 0 && gmax != 0 ) {
				if ( t > 0 )
					rt = gmax * t / tt;
				else
					rt = -gmin * t / bt;
			} else if ( gmax != 0 ) {
				rt = ( th - ct ) / th * gmax;
			} else {
				rt = gmin + ( ct - th ) / th * gmin;
			}
			if ( rt < gmin )
				rt = gmin;
			if ( rt > gmax )
				rt = gmax;
			return rt;
		}

		var g = arguments[ 0 ];
		var top = tt;
		if ( gmin < 0 && gmax != 0 ) {
			if ( g > 0 ) {
				top -= g / gmax * tt;
			} else {
				top += g / gmin * bt;
			}
		} else if ( gmax != 0 ) {
			top = th - g / gmax * th;
		} else {
			top = g / gmin * th;
		}
		if ( arguments.length >= 2 && arguments[ 1 ] ) {

			var obj = $( this ).find( ".gain" );
			if ( $( obj ).position() == undefined )
				return;
			var st = $( obj ).position().top;
			var dt = 20 + top;
			var itv = setInterval( test, 30 );
			intervals.push( itv );

			function test() {
				if ( curGain != null )
					return;
				var ct = $( obj ).position().top;
				var ss = ( dt - ct ) / 4;
				if ( ss > 0 && ss < 1 )
					ss = 1;
				if ( ss < 0 && ss > -1 )
					ss = -1;
				var tt = ct + ss;
				if ( ( st <= dt && tt >= dt ) || ( st >= dt && tt <= dt ) ) {
					$( obj ).css( {
						'top': ( dt ) + 'px'
					} );
					clearInterval( itv );
				} else {
					$( obj ).css( {
						'top': ( tt ) + 'px'
					} );
				}

			}

		} else {
			$( this ).find( ".gain" ).css( {
				'top': ( 20 + top ) + 'px'
			} );
		}
		$( this ).gainText( g );
	};

	$.fn.bootstrapSwitch.defaults.size = 'small';
	$.fn.bootstrapSwitch.defaults.onColor = 'danger';
	$( ".switch" ).bootstrapSwitch();

	function updateVolume() {
		rpc2( "getVolume", [], function ( data ) {

			if ( typeof ( data.error ) != "undefined" ) {
				//$("#audio").myAlert("danger","通信错误:",data.error);
				return;
			}
			$( "#vol_main" ).vol( data.Main );
			$( "#vol_omni" ).vol( data.Omni );
			$( "#vol_output" ).vol( data.Output );
			$( "#vol_remote" ).vol( data.remote );
			if ( data.active == "main" ) {
				$( "#vol_main" ).addClass( "active" );
				$( "#vol_omni" ).removeClass( "active" );
			} else if ( data.active == "omni" ) {
				$( "#vol_main" ).removeClass( "active" );
				$( "#vol_omni" ).addClass( "active" );
			}
			setTimeout( updateVolume, 200 );
		} );


	}
	updateVolume();



	function getAudio() {
		rpc2( "getAudio", [], function ( data ) {
			if ( typeof ( data.error ) != "undefined" ) {
				$( "#audio" ).myAlert( "danger", "通信错误:", data.error );
				return;
			}
			clearMotion();
			var main = data.main;
			$( "#main #vol_main" ).gain( main.gain, true );
			$( "#main #vadth" ).gain( main.vadth, true );
			$( "#main #vol_gain_line1" ).gain( main.gain0, true );
			$( "#main #vol_gain_line2" ).gain( main.gain1, true );
			$( "#main #mute_main" ).mute( main.mute );
			$( "#main #mute_line1" ).mute( main.mute0 );
			$( "#main #mute_line2" ).mute( main.mute1 );
			$( "#main input[name='anr']" ).bootstrapSwitch( 'state', main.anr, true );
			$( "#main #vad" ).activeSW( main.vad );

			var omni = data.omni;
			$( "#omni #vol_omni" ).gain( omni.gain0, true );
			$( "#omni #mute_omni" ).mute( omni.mute0 );
			$( "#omni #vol_omni_aec" ).gain( omni.aecgain, true );
			$( "#omni input[name='agc']" ).bootstrapSwitch( 'state', omni.agc, true );
			$( "#omni input[name='anr']" ).bootstrapSwitch( 'state', omni.anr, true );
			$( "#omni input[name='aec']" ).bootstrapSwitch( 'state', omni.aec, true );
			$( "#omni #boost" ).activeSW( omni.boost );

			var output = data.output;
			$( "#output #vol_output" ).gain( output.gain0, true );
			$( "#output #mute_output" ).mute( output.mute0 );
			
			$( "#remote #vol_remote" ).gain( data.remote.gain, true );
			$( "#remote #mute_remote" ).mute( data.remote.mute);
			

			if ( true ) {
				var eq = data.eq;
				for ( var i = 0; i < 12; i++ ) {
					$( "#eq #eq" + i ).gain( eq[ "eq" + i ], true );
				}
			}


		} );
	}
	getAudio();


	function setAudio() {
		var data = new Object();
		var main = new Object();
		main.gain = Math.round( $( "#main #vol_main" ).gain() );
		main.gain0 = $( "#main #vol_gain_line1" ).gain();
		main.gain1 = $( "#main #vol_gain_line2" ).gain();
		main.mute = $( "#main #mute_main" ).mute();
		main.mute0 = $( "#main #mute_line1" ).mute();
		main.mute1 = $( "#main #mute_line2" ).mute();
		main.anr = $( "#main input[name='anr']" ).is( ":checked" );
		main.vad = $( "#main #vad" ).activeSW();
		main.vadth = $( "#main #vadth" ).gain();
		data.main = main;

		var omni = new Object();
		omni.gain0 = Math.round( $( "#omni #vol_omni" ).gain() );
		omni.mute0 = $( "#omni #mute_omni" ).mute();
		omni.aecgain = $( "#omni #vol_omni_aec" ).gain();
		omni.agc = $( "#omni input[name='agc']" ).is( ":checked" );
		omni.anr = $( "#omni input[name='anr']" ).is( ":checked" );
		omni.aec = $( "#omni input[name='aec']" ).is( ":checked" );
		omni.boost = $( "#omni #boost" ).activeSW();

		data.omni = omni;

		var output = new Object();
		output.gain0 = $( "#output #vol_output" ).gain();
		output.mute0 = $( "#output #mute_output" ).mute();

		data.output = output;
		
		var remote = new Object();
		remote.gain = $( "#remote #vol_remote" ).gain();
		remote.mute = $( "#remote #mute_remote" ).mute();
		data.remote = remote;

		var eq = new Object();
		for ( var i = 0; i < 12; i++ ) {
			eq[ "eq" + i ] = $( "#eq #eq" + i ).gain();
		}

		data.eq = eq;

		rpc2( "setAudio", [ data ], function ( data ) {
			if ( typeof ( data.error ) != "undefined" ) {
				$( "#audio" ).myAlert( "danger", "通信错误:", data.error );
				return;
			}

		} );

	}
</script>
<?php
include( "../foot.php" );
?>