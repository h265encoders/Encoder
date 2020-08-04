<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					机型切换
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="type" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							机型
						</label>
						<div class="col-sm-6">
							<select name="type" id="typeVal" class="form-control">
								<?php
									if($chip=="3531D")
									{
								?>
								<option value="enc2">ENC2</option>
								<option value="enc5">ENC5</option>
								<option value="enc9">ENC9</option>
								<option value="enc9_mate">ENC9_MATE</option>
								<option value="enc18">ENC18(ENC9+LED)</option>
								<option value="sdi">C3531D</option>
								<option value="dsh">DSH</option>
								<option value="lite_audio">Lite_Audio</option>
								<?php
									}
									else if($chip=="3520D")
									{
								?>
								<option value="DEF">DEF(3520D)</option>
								<option value="EX2">EX2(3520D)</option>
								<option value="SH">SH(3521D)</option>
								<?php
									}
									else if($chip=="3519A")
									{
								?>
								<option value="DEF">DEF</option>
								<option value="MPTCP">MPTCP</option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="changeType" class=" save btn btn-warning">
								切换
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					功能开关
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="funcs" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							DHCP
						</label>
						<div class="col-sm-6">
							<select name="DHCP" class="form-control">
								<option value="false" <?php if(isset($DHCP) && $DHCP==false) echo "selected"; ?> cn="隐藏" en="hide" ></option>
								<option value="true" <?php if($DHCP) echo "selected"; ?> cn="显示" en="show" ></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							OPUS
						</label>
						<div class="col-sm-6">
							<select name="OPUS" class="form-control">
								<option value="false" <?php if(isset($OPUS) && $OPUS==false) echo "selected"; ?> cn="隐藏" en="hide" ></option>
								<option value="true" <?php if($OPUS) echo "selected"; ?> cn="显示" en="show" ></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							NDI
						</label>
						<div class="col-sm-6">
							<select name="NDI" class="form-control">
								<option value="false" <?php if(isset($NDI) && $NDI==false) echo "selected"; ?> cn="隐藏" en="hide" ></option>
								<option value="true" <?php if($NDI) echo "selected"; ?> cn="显示" en="show" ></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>默认语言</cn><en>Default Language</en>
						</label>
						<div class="col-sm-6">
							<select name="defLang" class="form-control">
								<option value="cn" <?php if(isset($defLang) && $defLang=="cn") echo "selected"; ?> >中文</option>
								<option value="en" <?php if(isset($defLang) && $defLang=="en") echo "selected"; ?> >English</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="showFunc" class=" save btn btn-warning">
								设定
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					MAC
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							MAC
						</label>
						<div class="col-sm-6">
							<input type="text" id="mac" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="setMAC" class=" save btn btn-warning">
								设定
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					EDID
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="edid" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							EDID
						</label>
						<div class="col-sm-6">
							<select name="edid" id="edidVal" class="form-control">
								<option value="LinkPi_1080">LinkPi_1080</option>
								<option value="LinkPi_4k">LinkPi_4k</option>
								<option value="RGB">RGB</option>
								<option value="ITE">ITE</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="setEDID" class=" save btn btn-warning">
								设定
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$( function () {
		navIndex( 5 );

		$.ajax({url:"/config/fac",success:function(data){
				$( "#typeVal" ).val(data.replace(/[\r\n]/g,""));

			}}).responseText;

		$.ajax({url:"/config/edid",success:function(data){
				$( "#edidVal" ).val(data.replace(/[\r\n]/g,""));

			}}).responseText;


		$( "#changeType" ).click( function () {
			func("changeType",$( "#type" ).serialize(), function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "机型切换成功！重启生效", "", 2000 );
			} );

		} );

		$( "#showFunc" ).click( function () {
			func("showFunc",$( "#funcs" ).serialize(), function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "修改成功", "", 2000 );
			} );

		} );

		$( "#setEDID" ).click( function () {
			func("setEDID",$( "#edid" ).serialize(), function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "修改成功", "", 2000 );
			} );

		} );

		$( "#setMAC" ).click( function () {
			var mac=$("#mac").val().replace( /[:]/g, "" );
			mac=mac.toLowerCase();
			func("setMac","mac="+mac, function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alert", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alert", "success", "修改成功", "", 2000 );
			} );

		} );

		$.ajax( {
			url: "/config/mac",
			success: function ( data ) {
				var mac=data.replace( /[\r\n]/g, "" ).toUpperCase();
				var macStr="";
				for(var i=0;i<mac.length;i+=2){
					macStr+=mac.substr(i,2);
					if(i+2<mac.length)
						macStr+=":";
				}
				$( "#mac" ).val(macStr);
			}
		} ).responseText;



	} );
</script>
<?php
include( "foot.php" );
?>
