<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="thin2">
<div class="row">
	<div class="col-md-6">
		<div class="row ">
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
						offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did1" class="intercomBtn"><i class="fa fa-microphone hide"></i>1</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
					offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did2" class="intercomBtn"><i class="fa fa-microphone hide"></i>2</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
						offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did3" class="intercomBtn "><i class="fa fa-microphone hide"></i>3</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
					offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did4" class="intercomBtn"><i class="fa fa-microphone hide"></i>4</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row ">
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
					offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did5" class="intercomBtn"><i class="fa fa-microphone hide"></i>5</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
					offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did6" class="intercomBtn"><i class="fa fa-microphone hide"></i>6</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
					offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did7" class="intercomBtn"><i class="fa fa-microphone hide"></i>7</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="title">
					<h3 class="panel-title text-center">
					offline
					</h3>
				</div>
				<div class="panel-body text-center">
					<div id="did8" class="intercomBtn"><i class="fa fa-microphone hide"></i>8</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="col-xs-3" style="display:none;">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title text-center">
				offline
				</h3>
			</div>
			<div class="panel-body text-center">
				<div id="did0" class="intercomBtn"><i class="fa fa-microphone hide"></i>0</div>
			</div>
		</div>
	</div>
</div>
</div>

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
						<label class="col-md-3 col-sm-4 control-label"><cn>缓冲时间</cn><en>Buffer time</en></label>
						<div class="col-md-6 col-sm-8">
							<select zcfg="buf" class="form-control">
								<option value="8">200ms</option>
								<option value="16">400ms</option>
								<option value="24">600ms</option>
								<option value="32">800ms</option>
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
				</form>
			</div>
		</div>
	</div>	
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>导播软件对接</cn>
					<en>Director software hook</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="vmix" role="form">
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label">
							 <cn>开关</cn><en>Enable</en>
						</label>
						<div class="col-md-6 col-sm-8">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label"><cn>模式</cn><en>Mode</en></label>
						<div class="col-md-6 col-sm-8">
							<select zcfg="mode" class="form-control">
								<option value="vmix">vMix</option>
								<option value="sinsam">Sinsam</option>
								<option value="rs232">RS232</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-4 control-label"><cn>导播IP</cn><en>Director IP</en></label>
                        <div class="col-md-6 col-sm-8">
                            <input zcfg="ip" type="text" class="form-control">
                        </div>
                    </div>
				</form>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>集成通信服务端</cn>
					<en>Intercom server</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="server" role="form">
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label">
							 <cn>开关</cn><en>Enable</en>
						</label>
						<div class="col-md-6 col-sm-8">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>Tally灯控制</cn>
					<en>Tally light control</en>
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="tally" role="form">
					<div class="form-group">
						<label class="col-md-3 col-sm-4 control-label">
							 <cn>开关</cn><en>Enable</en>
						</label>
						<div class="col-md-4 col-sm-8">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>

						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTest">
								<cn>测试</cn>
								<en>Test</en>
							</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<hr style="margin-top:10px; margin-bottom: 10px;"/>
<div class="text-center">
	<button type="button" id="save" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
		<cn>保存</cn>
		<en>Save</en>
	</button>
</div>


<div class="modal fade" id="modalTest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" id="test">
				<div class="row">
					<form class="form-horizontal" id="tallyTest" role="form">
						<div class="form-group">
							<label class="col-sm-2 col-xs-6 control-label">PVM</label>
							<div class="col-sm-2 col-xs-6">
								<select id="tally_PVM" class="form-control">
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

							<label class="col-sm-2 col-xs-6 control-label">PGM</label>
							<div class="col-sm-2 col-xs-6">
								<select id="tally_PGM" class="form-control">
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
					</form>
					<div class="row">
							<button type="button" id="tally_test" class="btn btn-warning col-md-4 col-md-offset-3">
								<cn>测试</cn>
								<en>Test</en>
							</button>
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
		var myid;
		var myname;
		
		$.getJSON( "config/intercom.json", function ( res ) {
			config=res;
			myid=config.intercom.did;
			myname=config.intercom.name;
			zcfg( "#intercom", config.intercom );
			zcfg( "#vmix", config.vmix );
			zcfg( "#tally", config.tally );
			zcfg( "#server", config.server );
		} );

		$( "#save" ).click( function (){
			rpc( "intercom.update", [config], function ( res ) {
				if ( typeof ( res.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					myid=config.intercom.did;
					myname=config.intercom.name;
					htmlAlert( "#alert", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
		});
		
		$( "#tally_test" ).click( function (){
			var list=[];
			for(var i=1;i<=8;i++)
			{
				var v=0;
				if($("#tally_PVM").val()==i)
					v=2;
				if($("#tally_PGM").val()==i)
					v=1;
				list.push(v);
			}
			rpc( "intercom.setTally", [list]);
		});

		function getState()
		{
			$("#did"+myid).parent().parent().find("h3").text(myname);
			rpc( "intercom.getState", null, function ( res ) {
				//console.log(res);
				var intercom=res.intercom;
				var tally=res.tally;
				var ids=[];
				ids.push(myid);
				$("#did"+myid).addClass("alive");
				$("#did"+myid).parent().parent().find("h3").text(myname);
				if(res.talking)
					$("#did"+myid+" i").removeClass("hide");
				else
					$("#did"+myid+" i").addClass("hide");

				for(var i=0;i<intercom.length;i++)
				{
					var chn=intercom[i];
					ids.push(chn.id);
					$("#did"+chn.id).parent().parent().find("h3").text(chn.name);
					$("#did"+chn.id).addClass("alive");
					if(chn.talking)
						$("#did"+chn.id+" i").removeClass("hide");
					else
						$("#did"+chn.id+" i").addClass("hide");
				}

				for(var i=0;i<=8;i++)
				{
					if(ids.indexOf(i)<0)
					{
						$("#did"+i).parent().parent().find("h3").text("offline");
						$("#did"+i).removeClass("alive");
						$("#did"+i+" i").addClass("hide");
					}

					if(i<8)
					{						
						if(tally && i<tally.length && tally[i]>0)
						{
							var x=tally[i];
							
							if(x==1)
							{
								$("#did"+(i+1)).removeClass("green");
								$("#did"+(i+1)).addClass("red");
							}
							else if(x==2)
							{
								$("#did"+(i+1)).removeClass("red");
								$("#did"+(i+1)).addClass("green");
							}
						}
						else{
							$("#did"+(i+1)).removeClass("green");
							$("#did"+(i+1)).removeClass("red");
						}
					}
				}

				setTimeout(getState, 500);
			} );
		}
		getState();
	} );
</script>
<?php
include( "foot.php" );
?>
