<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>集成通信设置</cn>
					<en>Intercom config</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="intercom" role="form">
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label">
							 <cn>开关</cn><en>Enable</en>
						</label>
						<div class="col-md-6 col-sm-8">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-4 control-label"><cn>服务器IP</cn><en>Server IP</en></label>
                        <div class="col-md-6 col-sm-8">
                            <input zcfg="ip" type="text" class="form-control">
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>服务器端口</cn><en>Server port</en></label>
						<div class="col-md-6 col-sm-8">
							<input zcfg="port" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>名称</cn><en>Name</en></label>
						<div class="col-md-6 col-sm-8">
							<input zcfg="name" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>本机ID</cn><en>Device ID</en></label>
						<div class="col-md-6 col-sm-8">
							<select zcfg="did" class="form-control">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>目标ID</cn><en>Target ID</en></label>
						<div class="col-md-6 col-sm-8">
							<select zcfg="tid" class="form-control">
								<option value="-1">ALL</option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>自动静音</cn><en>Auto mute</en></label>
						<div class="col-md-6 col-sm-8">
							<select zcfg="vad" class="form-control">
								<option value="0" cn="关闭" en="Disable"></option>
								<option value="40" cn="低" en="Low"></option>
								<option value="50" cn="中" en="Mid"></option>
								<option value="65" cn="高" en="High"></option>
							</select>
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
	</div>	
	<div class="col-md-6">
		<div class="row">
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
							offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did1" class="intercomBtn">1</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
						offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did2" class="intercomBtn">2</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
							offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did3" class="intercomBtn ">3</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
						offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did4" class="intercomBtn">4</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
						offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did5" class="intercomBtn">5</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
						offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did6" class="intercomBtn">6</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
						offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did7" class="intercomBtn">7</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
						offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did8" class="intercomBtn">8</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="panel panel-default">
					<div class="title">
						<h3 class="panel-title text-center">
						offline
						</h3>
					</div>
					<div class="panel-body text-center">
						<div id="did0" class="intercomBtn">0</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	

<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script src="js/zcfg.js"></script>
<script>
	$( function () {
		navIndex( 4 );
		$.fn.bootstrapSwitch.defaults.size = 'small';
		$.fn.bootstrapSwitch.defaults.onColor = 'warning';
		
		var config;
		
		$.getJSON( "config/intercom.json", function ( res ) {
			config=res;
				zcfg( "#intercom", config );
		} );
		
		$( "#save" ).click( function (){
			rpc( "intercom.update", [config], function ( res ) {
				if ( typeof ( res.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
		});

		function getState()
		{
			$("#did"+config.did).parent().parent().find("h3").text(config.name);
			rpc( "intercom.getState", null, function ( res ) {
				console.log(res);
				var ids=[];
				ids.push(config.did);
				$("#did"+config.did).addClass("alive");
				for(var i=0;i<res.length;i++)
				{
					var chn=res[i];
					ids.push(chn.id);
					$("#did"+chn.id).parent().parent().find("h3").text(chn.name);
					$("#did"+chn.id).addClass("alive");
					if(chn.talking)
						$("#did"+chn.id).addClass("talking");
					else
						$("#did"+chn.id).removeClass("talking");
				}

				for(var i=0;i<=8;i++)
				{
					if(ids.indexOf(i)<0)
					{
						$("#did"+i).parent().parent().find("h3").text("offline");
						$("#did"+i).removeClass("alive");
						$("#did"+i).removeClass("talking");
					}
				}
			} );
		}

		setInterval(getState, 500);
	} );
</script>
<?php
include( "foot.php" );
?>
