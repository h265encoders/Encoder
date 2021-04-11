<?php
include( "head.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-md-6">
		<div id="alertnet"></div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"> <cn>网口1</cn><en>LAN1</en></a>
			</li>
			<?php
			if ( isset( $ETH1 ) && $ETH1 ) {
			?>
			<li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"> <cn>网口2</cn><en>LAN2</en></a>
			</li>
			<?php
			}

			if ( !isset( $wifi ) || $wifi ) {
			?>
			<li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"> <cn>无线网</cn><en>WIFI</en></a>
			</li>
			<?php
			}
			?>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="tab1">
				<form class="form-horizontal" id="net" role="form" style="margin-top: 20px;">
					<?php
					if ( !isset( $DHCP ) || $DHCP ) {
						?>
					<div class="form-group">
						<label class="col-sm-3 control-label">DHCP</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="dhcp" class="switch form-control">
						</div>
					</div>
					<?php
					}
					?>
					<div class="form-group">
						<label class="col-sm-3 control-label">IP</label>
						<div class="col-sm-6">
							<input type="text" zcfg="ip" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>掩码</cn>
							<en>Mask</en>
						</label>
						<div class="col-sm-6">
							<input type="text" zcfg="mask" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>网关</cn>
							<en>Gateway</en>
						</label>
						<div class="col-sm-6">
							<input type="text" zcfg="gateway" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							DNS
						</label>
					
						<div class="col-sm-6">
							<input type="text" zcfg="dns" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							MAC
						</label>
						<div class="col-sm-6">
							<input type="text" readonly id="mac" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="saveNet" class=" save btn btn-warning">
								<cn>保存</cn>
								<en>Save</en>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab2">
				<form class="form-horizontal" id="net2" role="form" style="margin-top: 20px;">
					<?php
					if ( !isset( $DHCP ) || $DHCP ) {
						?>
					<div class="form-group">
						<label class="col-sm-3 control-label">DHCP</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="dhcp" class="switch form-control">
						</div>
					</div>
					<?php
					}
					?>
					<div class="form-group">
						<label class="col-sm-3 control-label">IP</label>
						<div class="col-sm-6">
							<input type="text" zcfg="ip" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>掩码</cn>
							<en>Mask</en>
						</label>
						<div class="col-sm-6">
							<input type="text" zcfg="mask" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>网关</cn>
							<en>Gateway</en>
						</label>
						<div class="col-sm-6">
							<input type="text" zcfg="gateway" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							DNS
						</label>
					
						<div class="col-sm-6">
							<input type="text" zcfg="dns" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							MAC
						</label>
						<div class="col-sm-6">
							<input type="text" readonly id="mac2" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="saveNet2" class=" save btn btn-warning">
								<cn>保存</cn>
								<en>Save</en>
							</button>
						</div>
					</div>
				</form>
			</div>

			<div role="tabpanel" class="tab-pane fade in" id="tab3">
				<form class="form-horizontal" id="wifi" role="form">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">SSID</label>
						<div class="col-sm-6">
							<input type="text" id="ssid" readonly class="form-control"/>
						</div>

					</div>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<button type="button" class="btn btn-warning" id="addWifi">
								<cn>添加Wifi</cn>
								<en>Add</en>
							</button>
							<button type="button" class="btn btn-warning" id="setWifi">
								<cn>管理Wifi</cn>
								<en>Manage</en>
							</button>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">
							<cn>启用</cn>
							<en>Enable</en>
						</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="enable" class="switch form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">DHCP</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="dhcp" class="switch form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">IP</label>
						<div class="col-sm-6">
							<input type="text" zcfg="ip" class="form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">
							<cn>掩码</cn>
							<en>Mask</en>
						</label>
						<div class="col-sm-6">
							<input type="text" zcfg="mask" class="form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">
							<cn>网关</cn>
							<en>Gateway</en>
						</label>
						<div class="col-sm-6">
							<input type="text" zcfg="gateway" class="form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label text-right">
							DNS
						</label>
						<div class="col-sm-6">
							<input type="text" zcfg="dns" class="form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col text-center">
							<button type="button" id="saveWifi" class=" save btn btn-warning">
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
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>密码设置</cn>
					<en>Password</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alertpw"></div>
				<form class="form-horizontal" role="form" id="passwd">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>旧密码</cn>
							<en>Current</en>
						</label>
						<div class="col-sm-6">
							<input type="password" name="old" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>新密码</cn>
							<en>New</en>
						</label>
						<div class="col-sm-6">
							<input type="password" name="new1" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>确认密码</cn>
							<en>Confirm</en>
						</label>
						<div class="col-sm-6">
							<input type="password" name="new2" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<button type="button" id="savePasswd" class=" save btn btn-warning">
								<cn>保存</cn>
								<en>Save</en>
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
		<div class="panel panel-default" style="margin-top: 15px;">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>应用场景</cn>
					<en>Application scenario</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alertvb"></div>
				<form class="form-horizontal" role="form" id="vb">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>场景</cn>
							<en>Scene</en>
						</label>
						<div class="col-sm-6">
							<select name="scene" id="scene" class="form-control">
								
							</select>
						</div>
						<div class="col-sm-2">
							<button type="button" id="change" class="btn btn-warning ">
								<cn>切换</cn>
								<en>Change</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>定时维护</cn>
					<en>Auto reboot</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alerttm"></div>
				<form class="form-horizontal" role="form" id="time">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>系统时间</cn>
							<en>system time</en>
						</label>
						<div class="col-sm-6">
							<input type="text" name="time" class="form-control"/>
						</div>
						<div class="col-sm-2">
							<button type="button" id="sync" class="btn btn-warning ">
								<cn>本地同步</cn>
								<en>Sync to PC</en>
							</button>
						</div>
					</div>
				</form>
				<form class="form-horizontal" role="form" id="ntp">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							NTP <cn>同步</cn>
							<en>sync</en>
						</label>
					
						<div class="col-sm-6">
							<input type="text" zcfg="server" class="form-control"/>
						</div>
						<div class="col-sm-2">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
				</form>
				<form class="form-horizontal" role="form" id="cron">
					<div class="form-group">
						<label class="col-sm-3 control-label">
							<cn>维护时间</cn>
							<en>reboot time</en>
						</label>
						<div class="col-sm-3">
							<select id="cron_day" name="day" class="selectpicker form-control">
								<option cn="从不" en="never" value="x"></option>
								<option cn="每天" en="everyday" value="*"></option>
								<option cn="每周一" en="monday" value="1"></option>
								<option cn="每周二" en="tuesday" value="2"></option>
								<option cn="每周三" en="wednesday" value="3"></option>
								<option cn="每周四" en="thursday" value="4"></option>
								<option cn="每周五" en="friday" value="5"></option>
								<option cn="每周六" en="saturday" value="6"></option>
								<option cn="每周日" en="sunday" value="0"></option>
							</select>
						</div>
						<div class="col-sm-3">
							<select id="cron_time" name="time" class="selectpicker form-control">
								<option value="0">0:00</option>
								<option value="1">1:00</option>
								<option value="2">2:00</option>
								<option value="3">3:00</option>
								<option value="4">4:00</option>
								<option value="5">5:00</option>
								<option value="6">6:00</option>
								<option value="7">7:00</option>
								<option value="8">8:00</option>
								<option value="9">9:00</option>
								<option value="10">10:00</option>
								<option value="11">11:00</option>
								<option value="12">12:00</option>
								<option value="13">13:00</option>
								<option value="14">14:00</option>
								<option value="15">15:00</option>
								<option value="16">16:00</option>
								<option value="17">17:00</option>
								<option value="18">18:00</option>
								<option value="19">19:00</option>
								<option value="20">20:00</option>
								<option value="21">21:00</option>
								<option value="22">22:00</option>
								<option value="23">23:00</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-3">
							<button id="save" type="button" class="btn btn-warning" style="margin-right:20px;">
								<cn>保存</cn>
								<en>Save</en>
							</button>
							<button id="reboot" type="button" class="btn btn-warning" style="margin-right:20px;">
								<cn>立即重启</cn>
								<en>Reboot</en>
							</button>
							<button id="reset" type="button" class="btn btn-warning">
								<cn>恢复出厂设置</cn>
								<en>Reset default</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>系统升级</cn>
					<en>Upgrade</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alertup"></div>
				<div class="col-md-12">
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-xs-3 text-right">
							<strong>
								<cn>应用版本</cn>
								<en>App version</en>:</strong>
						</div>
						<div class="col-xs-9" id="ver_app">---</div>
					</div>
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-xs-3 text-right">
							<strong>
								<cn>SDK版本</cn>
								<en>SDK version</en>:</strong>
						</div>
						<div class="col-xs-9" id="ver_sdk">---</div>
					</div>
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-xs-3 text-right">
							<strong>
								<cn>系统版本</cn>
								<en>Sys version</en>:</strong>
						</div>
						<div class="col-xs-9" id="ver_sys">---</div>
					</div>
					<hr>
					<form class="form-horizontal">
						<div id="update">
							<form class="form-horizontal" role="form" id="ff" enctype="multipart/form-data">
								<label class="col-sm-3 control-label">
									<cn>上传升级包</cn>
									<en>upload packet</en>
								</label>
								<div class="col-sm-6">
									<div id="uploader" class="wu-example">
										<!--用来存放文件信息-->
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
							</form>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if(isset($PortCtrl) && $PortCtrl==true)
{
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" style="margin-top: 15px;">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>端口配置</cn>
					<en>Port config</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alertPort"></div>
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4"></div>
					<div class="col-md-1 col-xs-2">HTTP</div>
					<div class="col-md-1 col-xs-2">RTSP</div>
					<div class="col-md-1 col-xs-2">RTMP</div>
					<div class="col-md-1 col-xs-2">HTTPTS</div>
					<div class="col-md-1 col-xs-2">Telnet</div>
					<div class="col-md-1 col-xs-2">SSH</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="port">
					<div class="row">
						<div class="col-md-2 col-xs-4 text-right">
							<p class="form-control-static"><cn>固定端口</cn><en>Static port</en></p>
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="http[0]" type="text" readonly class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="rtsp[0]" type="text" readonly class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="rtmp[0]" type="text" readonly class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="httpts[0]" type="text" readonly class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="telnet[0]" type="text" readonly class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="ssh[0]" type="text" readonly class="form-control">
						</div>
					</div>
					<div class="row" style="margin-top:15px;">
						<div class="col-md-2 col-xs-4 text-right">
							<p class="form-control-static"><cn>备用端口</cn><en>Reserve port</en></p>
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="http[1]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="rtsp[1]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="rtmp[1]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="httpts[1]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="telnet[1]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="ssh[1]" type="text" class="form-control">
						</div>
					</div>
					<div class="row" style="margin-top:15px;">
						<div class="col-md-2 col-xs-4 text-right">
							<p class="form-control-static"><cn>映射(外网)端口</cn><en>NAT port</en></p>
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="http[2]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="rtsp[2]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="rtmp[2]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="httpts[2]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="telnet[2]" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="ssh[2]" type="text" class="form-control">
						</div>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div class="row">
					<div class="col-md-12 text-center">
						<button id="savePort" type="button" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
							<cn>保存</cn>
							<en>Save</en>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
if(isset($help) && $help!="")
{
?>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default" style="margin-top: 15px;">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>网络测试</cn>
					<en>Network Test</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alertNetTest"></div>
				<div class="text-center">
							<button id="netTest" type="button" class="btn btn-warning ">
								<cn>开始测试</cn>
								<en>Start Test</en>
							</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default" style="margin-top: 15px;">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>远程协助</cn>
					<en>Remote Assistance</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alertHelp"></div>
				<form class="form-horizontal" role="form" >
					<div class="form-group">
						<label class="col-sm-3 control-label"><cn>授权码</cn><en>Auth code</en></label>
						<div class="col-sm-3">
							<input type="text" id="authCode" readonly class="form-control"/>
						</div>
						<div class="col-sm-6">
							<button id="startHelp" type="button" class="btn btn-warning ">
								<cn>开始协助</cn>
								<en>Start</en>
							</button>

							<button id="stopHelp" type="button" class="btn btn-warning ">
								<cn>停止协助</cn>
								<en>Stop</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="add">
					<div class="form-group">
						<label class="col-sm-2 control-label">SSID</label>
						<div class="col-sm-8">
							<select name="ssid" class="form-control">
							</select>

						</div>
						<div class="col-sm-2">
							<button id="scanWifi" type="button" class="btn btn-warning">
								<cn>刷新</cn>
								<en>Refresh</en>
							</button>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<cn>密码</cn>
							<en>Passwd</en>
						</label>
						<div class="col-sm-8">
							<input type="text" name="passwd" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button id="connectWifi" type="button" class="btn btn-warning">
								<cn>连接</cn>
								<en>Connect</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalSet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" id="set">

			</div>
		</div>
	</div>
</div>
<script src="js/zcfg.js"></script>
<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
<script type="text/javascript" src="webuploader/webuploader.js"></script>
<script>
	function setWifi( func, id ) {
		rpc2( "wifi.setWifi", [ func, id.toString() ], function ( data ) {

			if ( typeof ( data.error ) != "undefined" ) {
				$( "#tab2" ).myAlert( "danger", "<cn>通信错误</cn><en>Connect faild</en>:", data.error );
				return;
			}
			wifiList();
		} );
	}

	function wifiList() {
		rpc2( "wifi.wifiList", null, function ( data ) {

			if ( typeof ( data.error ) != "undefined" ) {
				$( "#tab2" ).myAlert( "danger", "<cn>通信错误</cn><en>Connect faild</en>:", data.error );
				return;
			}

			var str = "";
			for ( var i = 0; i < data.length; i++ ) {
				str += '<form class="form-horizontal" role="form">' +
						'<div class="row">' +
						'<div class="col-sm-6 text-center"><label class="control-label" id="ssid">' +
						data[ i ].ssid + '<small style="font-weight: normal;">';
				if ( data[ i ].flags == "[CURRENT]" )
					str += '[<cn>当前连接</cn><en>Current</en>]';
				else if ( data[ i ].flags == "[DISABLED]" )
					str += '[<cn>禁用</cn><en>Disable</en>]';
				str += '</small></label>' +
						'</div>' +
						'<div class="col-sm-6 text-center">' +
						'<button onClick="setWifi(\'enable_network\',' + data[ i ].id + ');" type="button" class="btn btn-warning"><cn>启用</cn><en>Enable</en></button> ' +
						'<button onClick="setWifi(\'disable_network\',' + data[ i ].id + ');" type="button" class="btn btn-warning"><cn>禁用<cn><en>Disable</en></button> ' +
						'<button onClick="setWifi(\'remove_network\',' + data[ i ].id + ');" type="button" class="btn btn-warning"><cn>删除</cn><en>Delete</en></button> ' +
						'</div></div></form><hr/>';
			}
			$( "#set" ).html( str );

		} );
	}
	$( function () {
		navIndex( 5 );

		$.fn.bootstrapSwitch.defaults.size = 'small';
		$.fn.bootstrapSwitch.defaults.onColor = 'warning';
		$( ".switch" ).bootstrapSwitch();

		$.ajax( {
			url: "config/mac",
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
		
		
		$.ajax( {
			url: "config/mac2",
			success: function ( data ) {
				var mac=data.replace( /[\r\n]/g, "" ).toUpperCase();
				var macStr="";
				for(var i=0;i<mac.length;i+=2){
					macStr+=mac.substr(i,2);
					if(i+2<mac.length)
						macStr+=":";
				}
				$( "#mac2" ).val(macStr);
			}
		} ).responseText;

		var ntpCfg;
		$.getJSON( "config/ntp.json", function ( result ) {
			ntpCfg = result;
			zcfg( "#ntp", ntpCfg );
		} );
<?php
if(isset($PortCtrl) && $PortCtrl==true)
{
?>
		var portCfg;
		$.getJSON( "config/port.json", function ( result ) {
			portCfg = result;
			zcfg( "#port", portCfg );
		} );
		
		$( "#savePort" ).click( function ( e ) {
			rpc3( "update", [ JSON.stringify( portCfg, null, 2 ) ], function ( data ) {
				if ( typeof ( data.error ) != "undefined" ) {
					htmlAlert( "#alertPort", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
				} else {
					htmlAlert( "#alertPort", "success", "<cn>保存设置成功！</cn><en>Save config success!</en>", "", 2000 );
				}
			} );
		} );
<?
}
?>
		var netConfig;
		$.getJSON( "config/net.json", function ( result ) {
			netConfig = result;
			zcfg( "#net", netConfig );
		} );
		
		var netConfig2;
		$.getJSON( "config/net2.json", function ( result ) {
			netConfig2 = result;
			zcfg( "#net2", netConfig2 );
		} );

		var wifiConfig;
		$.getJSON( "config/wifi.json", function ( result ) {
			wifiConfig = result;
			zcfg( "#wifi", wifiConfig );
		} );

		$.getJSON( "config/ssid.json", function ( ssid ) {
			$("#wifi #ssid").val(ssid.ssid);
		} );
		
		var videoBuffer;
		$.getJSON( "config/version.json", function ( ver ) {
			$( "#ver_app" ).text( ver.app );
			$( "#ver_sdk" ).text( ver.sdk );
			$( "#ver_sys" ).text( ver.sys );
		} );

		$.getJSON( "config/board.json", function ( board ) {
			$.getJSON( "config/videoBuffer.json", function ( vb ) {
				videoBuffer = vb;
				var str = "";
				var val;
				var cur = JSON.stringify( board.videoBuffer, null, 2 )
				for ( var key in vb ) {
					str += '<option value="' + key + '">' + key + '</option>';
					console.log( JSON.stringify( vb[ key ], null, 2 ) );
					if ( cur == JSON.stringify( vb[ key ], null, 2 ) )
						val = key;
				}
				$( "#scene" ).html( str );
				$( "#scene" ).val( val );
			} );
		} );

		$( "#change" ).click( function ( e ) {
			console.log( "aa" + $( "#vb" ).serialize() );
			func( "setVideoBuffer", $( "#vb" ).serialize(), function ( res ) {

				if ( res.error != "" ) {
					htmlAlert( "#alertvb", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alertvb", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
		} );

		$( "#saveNet" ).click( function ( e ) {
			func( "setNetwork", netConfig, function ( res ) {
				if ( res.error != "" ) {
					htmlAlert( "#alertnet", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alertnet", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
			setTimeout( 'window.location.href="http://' + netConfig.ip + '/sys.php";', 1000 );
		} );
		
		$( "#saveNet2" ).click( function ( e ) {
			func( "setNetwork2", netConfig2, function ( res ) {
				if ( res.error != "" ) {
					htmlAlert( "#alertnet", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alertnet", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
		} );

		$( "#saveWifi" ).click( function ( e ) {
			rpc2( "wifi.update", [wifiConfig], function ( data ) {
				if ( typeof ( data.error ) != "undefined" ) {
					htmlAlert( "#alertnet", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				} else {
					htmlAlert( "#alertnet", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				}
			} );
			//setTimeout( 'window.location.href="http://' + wifiConfig.ip + '/sys.php";', 1000 );
		} );

		$( "#addWifi" ).click( function () {
			$( '#modalAdd' ).modal( 'show' );
			scanWifi();
		} );
		$( "#setWifi" ).click( function () {
			$( '#modalSet' ).modal( 'show' );
			wifiList();
		} );
		$( "#scanWifi" ).click( function () {
			scanWifi();
		} );

		$( "#connectWifi" ).click( function () {
			connectWifi();
		} );

		function connectWifi() {
			rpc2( "wifi.addWifi", [ $( "#add select[name='ssid']" ).val(), $( "#add input[name='passwd']" ).val() ], function ( data ) {

				if ( typeof ( data.error ) != "undefined" ) {
					$( "#tab2" ).myAlert( "danger", "<cn>通信错误</cn><en>Connect faild</en>:", data.error );
					return;
				}

				$( "#add" ).myAlert( "success", "<cn>添加成功</cn><en>Add success</en>:", "<cn>若未连接，请确认密码，删除后重新添加。</cn><en>If didn't connect, confirm password, delete and add again.</en>" );
			} );
		}

		function scanWifi() {
			rpc2( "wifi.scanWifi", null, function ( data ) {

				if ( typeof ( data.error ) != "undefined" ) {
					$( "#tab2" ).myAlert( "danger", "<cn>通信错误</cn><en>Connect faild</en>:", data.error );
					return;
				}

				$( "#add select[name='ssid']" ).html( '' );

				$.each( data, function ( i, d ) {
					var text = d.ssid;
					if ( d.flags == "open" )
						text += '[open]';

					$( "#add select[name='ssid']" ).append( $( '<option>', {
						value: d.ssid,
						text: text
					} ) );
				} );


			} );

		}

		$( "#savePasswd" ).click( function () {
			func( "setPasswd", $( "#passwd" ).serialize(), function ( res ) {
				if ( res.error != "" )
					htmlAlert( "#alertpw", "danger", res.error, "", 2000 );
				else
					htmlAlert( "#alertpw", "success", "<cn>修改密码成功</cn><en>Save password success</en>！", "", 2000 );
			} );

		} );

		$( "#save" ).click( function ( e ) {
			func( "setNTP", ntpCfg );

			func( "setCron", $( "#cron" ).serialize(), function ( res ) {
				console.log( res );
				if ( res.result == "OK" ) {
					htmlAlert( "#alerttm", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
				} else {
					htmlAlert( "#alerttm", "danger", "<cn>保存设置失败</cn><en>Save config failed</en>！", "", 2000 );
				}
			} );
		} );

		$( "#startHelp" ).click( function ( e ) {
			var authCode=Math.floor(Math.random()*1000);
			$("#authCode").val(authCode);
			func( "startHelp", {authCode:authCode}, function ( res ) {
				if ( res.result == "OK" ) {
					htmlAlert( "#alertHelp", "success", "<cn>连接成功，请向客服提供授权码以便控制您的编码器。</cn><en>Connect success, please provide auth code to customer service to control your encoder</en>！", "", 3000 );
				}
			} );
		} );

		$( "#stopHelp" ).click( function ( e ) {
			func( "stopHelp", null, function ( res ) {
				if ( res.result == "OK" ) {
					htmlAlert( "#alertHelp", "success", "<cn>已断开连接</cn><en>Disconnect success</en>！", "", 2000 );
				}
			} );
		} );

		func( "setCron", null, function ( result ) {
			console.log( result );
			if ( result.result == null || result.result.split( " " ).length != 6 ) {
				$( '#cron_time' ).val( '0' );
				$( '#cron_day' ).val( 'x' );
			} else {
				$( '#cron_time' ).val( result.result.split( " " )[ 1 ] );
				$( '#cron_day' ).val( result.result.split( " " )[ 4 ] );
			}
		} );

		Date.prototype.Format = function ( fmt ) { //author: meizz 
			var o = {
				"M+": this.getMonth() + 1, //月份 
				"d+": this.getDate(), //日 
				"h+": this.getHours(), //小时 
				"m+": this.getMinutes(), //分 
				"s+": this.getSeconds(), //秒 
				"q+": Math.floor( ( this.getMonth() + 3 ) / 3 ), //季度 
				"S": this.getMilliseconds() //毫秒 
			};
			if ( /(y+)/.test( fmt ) ) fmt = fmt.replace( RegExp.$1, ( this.getFullYear() + "" ).substr( 4 - RegExp.$1.length ) );
			for ( var k in o )
				if ( new RegExp( "(" + k + ")" ).test( fmt ) ) fmt = fmt.replace( RegExp.$1, ( RegExp.$1.length == 1 ) ? ( o[ k ] ) : ( ( "00" + o[ k ] ).substr( ( "" + o[ k ] ).length ) ) );
			return fmt;
		}
		func( "getTime", null, function ( res ) {
			if ( res.error == "" )
				$( 'input[name="time"]' ).val( res.result );
		} );

		$( "#sync" ).click( function ( e ) {
			var now = new Date();
			var tm = now.Format( "yyyy-MM-dd hh:mm:ss" );
			var tm2 = now.Format( "yyyy/MM/dd/hh/mm/ss" );
			$( 'input[name="time"]' ).val( tm );
			func( "setTime", {
				time: tm2,
				time2: tm
			}, function ( res ) {
				console.log( res );
				htmlAlert( "#alerttm", "success", "<cn>保存设置成功</cn><en>Save config success</en>！", "", 2000 );
			} );
		} );

		$( "#netTest" ).click( function ( e ) {
			func( "testNet", netConfig, function ( res ) {
				var str=res.result.join();
				console.log(str);
				if(str==""){
					htmlAlert( "#alertNetTest", "danger", "<cn>域名解析超时</cn><en>DNS timeout</en>！", "", 2000 );
				}
				else if(str.indexOf(" 0%")>0){
					htmlAlert( "#alertNetTest", "success", "<cn>网络可用</cn><en>Network available</en>！", "", 2000 );
				}
				else
					htmlAlert( "#alertNetTest", "danger", "<cn>网络不可用</cn><en>Network Unavailable</en>！", "", 2000 );

			} );

		} );

		$( "#reboot" ).click( function ( e ) {
			$.confirm( {
				title: '<cn>重启</cn><en>Reboot</en>',
				content: '<cn>是否立即重启系统？</cn><en>Reboot immediately?</en>',
				buttons: {
					ok: {
						text: "<cn>确认重启</cn><en>Confirm</en>",
						btnClass: 'btn-warning',
						keys: [ 'enter' ],
						action: function () {
							func( "reboot" );
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

		} );

		$( "#reset" ).click( function ( e ) {
			$.confirm( {
				title: '<cn>还原</cn><en>Reset</en>',
				content: '<cn>是否还原全部设置？</cn><en>Reset all config to default and reboot immediately?</en>',
				buttons: {
					ok: {
						text: "<cn>确认</cn><en>Confirm</en>",
						btnClass: 'btn-warning',
						keys: [ 'enter' ],
						action: function () {
							func( "resetCfg" );
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

		} );

		var $list = $( "#thelist" ); //这几个初始化全局的百度文档上没说明，好蛋疼。  
		var $btn = $( "#ctlBtn" ); //开始上传  
		var uploader = WebUploader.create( {

			// swf文件路径
			swf: 'webuploader/Uploader.swf',

			// 文件接收服务端。
			server: 'upload.php',

			// 选择文件的按钮。可选。
			// 内部根据当前运行是创建，可能是input元素，也可能是flash.
			pick: '#picker',

			// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
			resize: false,
			accept: {
				title: 'Update',
				extensions: 'bin',
				mimeTypes: 'Data/*'
			}
		} );
		uploader.on( 'fileQueued', function ( file ) {
			console.log( file );
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
			$( "#update" ).myAlert( "success", "<cn>上传成功</cn><en>Upload success</en>！", "<cn>重启后生效</cn><en>effect after reboot</en>" );
		} );

		uploader.on( 'uploadError', function ( file ) {
			$( '#' + file.id ).find( 'p.state' ).html( '<cn>上传出错</cn><en>Upload faild</en>' );
		} );

		uploader.on( 'uploadComplete', function ( file ) {
			$( '#' + file.id ).find( '.progress' ).fadeOut();
		} );
		$btn.on( 'click', function () {
			console.log( "<cn>上传</cn><en>Uploading</en>..." );
			uploader.upload();
			console.log( "<cn>上传成功</cn><en>Upload success</en>" );
		} );
	} );
</script>
<?php
include( "foot.php" );
?>
