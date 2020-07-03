<?php
include( "head.php" );
include( "groupList.php" );
?>
<div id="alert"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>全局配置</cn>
					<en>Overall config</en>
				</h3>
			</div>
			<div class="panel-body">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4"></div>
					<div class="col-md-1 col-xs-2">HTTP</div>
<?php
if(!isset($HLS) || $HLS)
{
?>
					<div class="col-md-1 col-xs-2">HLS</div>
<?php
}
?>
					<div class="col-md-1 col-xs-2">RTMP</div>
					<div class="col-md-1 col-xs-2">RTSP</div>
					<div class="col-md-1 col-xs-4">
						<cn>组播</cn>
						<en>multicast</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>组播地址</cn>
						<en>multicast addr</en>
					</div>
					<div class="col-md-1 col-xs-2">
						<cn>推流</cn>
						<en>push</en>
					</div>
					<div class="col-md-2 col-xs-4"></div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div class="row" id="all">
					<div class="col-md-2 col-xs-4 text-center">
						<cn>主流协议</cn>
						<en>Main protocol</en>
					</div>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="http" class="switch form-control">
					</div>
<?php
if(!isset($HLS) || $HLS)
{
?>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="hls" class="switch form-control">
					</div>
<?php
}
?>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="rtmp" class="switch form-control">
					</div>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="rtsp" class="switch form-control">
					</div>
					<div class="col-md-1 col-xs-4">
						<input type="checkbox" zcfg="udp.enable" class="switch form-control">
					</div>
					<div class="col-md-2 col-xs-4">
						<input zcfg="udp.ip*:*udp.port" type="text" class="form-control">
					</div>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="push.enable" class="switch form-control">
					</div>
					<div class="col-md-2 col-xs-4 text-center"></div>
				</div>
				<div class="row" id="all_sub" style="margin-top: 5px;">
					<?php
					if($enableSub)
					{
					?>
					<div class="col-md-2 col-xs-4 text-center">
						<cn>辅流协议</cn>
						<en>Sub protocol</en>
					</div>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="http" class="switch form-control">
					</div>
<?php
if(!isset($HLS) || $HLS)
{
?>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="hls" class="switch form-control">
					</div>
<?php
}
?>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="rtmp" class="switch form-control">
					</div>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="rtsp" class="switch form-control">
					</div>
					<div class="col-md-1 col-xs-4">
						<input type="checkbox" zcfg="udp.enable" class="switch form-control">
					</div>
					<div class="col-md-2 col-xs-4">
						<input zcfg="udp.ip*:*udp.port" type="text" class="form-control">
					</div>
					<div class="col-md-1 col-xs-2">
						<input type="checkbox" zcfg="push.enable" class="switch form-control">
					</div>
					<div class="col-md-2 col-xs-4 text-center"></div>
					<?php
					}
					?>
				</div>
				<hr/>
				<div class="row text-center">
					<button id="setAll" type="button" class="btn btn-warning">
						<cn>应用到本地</cn>
						<en>Save to local</en>
					</button>
					<button id="setAllGroup" type="button" class="btn btn-warning">
						<cn>应用到群组</cn>
						<en>Save to group</en>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><i class="fa fa-upload"></i> <cn>码流配置</cn><en>Stream config</en></a>
			</li>
			<li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><i class="fa fa-gear"></i> <cn>TS设置</cn><en>TS Config</en></a>
			</li>
			<?php
			if(!isset($HLS) || $HLS)
              		{
			?>
			<li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><i class="fa fa-gear"></i> <cn>HLS设置</cn><en>HLS Config</en></a>
			</li>
			<?php
			}

			if(!isset($SRT) || $SRT)
              		{
			?>
			<li role="presentation"><a href="#tab7" aria-controls="tab7" role="tab" data-toggle="tab"><i class="fa fa-gear"></i> <cn>SRT设置</cn><en>SRT Config</en></a>
			</li>
			<?php
			}

			if(!isset($NDI) || $NDI)
              		{
			?>
			<li role="presentation"><a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab"><i class="fa fa-gear"></i> <cn>NDI设置</cn><en>NDI Config</en></a>
			</li>
			<?php
			}
			?>
			<li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab"><i class="fa fa-podcast"></i> <cn>推流设置</cn><en>Push Config</en></a>
			</li>
			<li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><i class="fa fa-link"></i> <cn>播放地址</cn><en>Play URL</en></a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active thin" id="tab1">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-1 col-xs-2">HTTP</div>
<?php
if(!isset($HLS) || $HLS)
{
?>
					<div class="col-md-1 col-xs-2">HLS</div>
<?php
}
?>
					<div class="col-md-1 col-xs-2">RTMP</div>
					<div class="col-md-1 col-xs-2">RTSP</div>
					<div class="col-md-1 col-xs-4">
						<cn>组播</cn>
						<en>multicast</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>组播地址</cn>
						<en>multicast addr</en>
					</div>
					<div class="col-md-1 col-xs-2">
						<cn>推流</cn>
						<en>push</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>推流地址</cn>
						<en>push url</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templet">
					<div class="row">
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].name" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream.http" class="switch form-control">
						</div>
<?php
if(!isset($HLS) || $HLS)
{
?>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream.hls" class="switch form-control">
						</div>
<?php
}
?>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream.rtmp" class="switch form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream.rtsp" class="switch form-control">
						</div>
						<div class="col-md-1 col-xs-4">
							<input type="checkbox" zcfg="[#].stream.udp.enable" class="switch form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream.udp.ip*:*[#].stream.udp.port" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2"><input type="checkbox" zcfg="[#].stream.push.enable" class="switch form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream.push.path" type="text" class="form-control">
						</div>
					</div>
					<?php
					if($enableSub)
					{
					?>
					<div class="row"  style="margin-top: 5px;">
						<div class="col-md-2 col-xs-4">
						</div>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream2.http" class="switch form-control">
						</div>
<?php
if(!isset($HLS) || $HLS)
{
?>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream2.hls" class="switch form-control">
						</div>
<?php
}
?>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream2.rtmp" class="switch form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input type="checkbox" zcfg="[#].stream2.rtsp" class="switch form-control">
						</div>
						<div class="col-md-1 col-xs-4">
							<input type="checkbox" zcfg="[#].stream2.udp.enable" class="switch form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream2.udp.ip*:*[#].stream2.udp.port" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2"><input type="checkbox" zcfg="[#].stream2.push.enable" class="switch form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream2.push.path" type="text" class="form-control">
						</div>
					</div>
					<?php
					}
					?>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>

				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab2">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-1 col-xs-2">
						PID
					</div>
					<div class="col-md-1 col-xs-2">
						TTL
					</div>
					<div class="col-md-1 col-xs-2">
						<cn>流控</cn>
						<en>Flow Control</en>
					</div>
					<div class="col-md-1 col-xs-2">
						<cn>带宽</cn>
						<en>Bandwidth</en>
					</div>
					<div class="col-md-1 col-xs-2">
						PMT PID
					</div>
					<div class="col-md-1 col-xs-2">
						ServiceID
					</div>
					<div class="col-md-1 col-xs-2">
						StreamID
					</div>
					<div class="col-md-1 col-xs-2">
						NetworkID
					</div>
					<div class="col-md-1 col-xs-2">
						PacketSize
					</div>
					<div class="col-md-1 col-xs-2">
						RTP Head
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetTS">
					<div class="row">
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].name" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].ts.mpegts_start_pid" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].stream.udp.ttl" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].stream.udp.flowCtrl" type="checkbox" class="switch form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].stream.udp.bandwidth" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].ts.mpegts_pmt_start_pid" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].ts.mpegts_service_id" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-1">
							<input zcfg="[#].ts.mpegts_transport_stream_id" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].ts.mpegts_original_network_id" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-xs-2">
							<select zcfg="[#].ts.tsSize" class="form-control">
								<option value="188">188</option>
								<option value="376">376</option>
								<option value="564">564</option>
								<option value="752">752</option>
								<option value="940">940</option>
								<option value="1128">1128</option>
								<option value="1316">1316</option>
								<option value="1504">1504</option>
								<option value="1692">1692</option>
								<option value="1880">1880</option>
							</select>
						</div>
						<div class="col-md-1 col-xs-2">
							<input zcfg="[#].stream.udp.rtp" type="checkbox" class="switch form-control">
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>

				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab3">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>分片长度(秒)</cn><en>Segment length(s)</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>列表长度</cn><en>List length</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>URL前缀</cn>
						<en>Base url</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>文件名后缀</cn>
						<en>Name format</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetHLS">
					<div class="row">
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].name" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].hls.hls_time" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].hls.hls_list_size" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].hls.hls_base_url" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].hls.hls_filename" type="text" class="form-control">
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>

				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab7">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>模式</cn><en>Mode</en>
					</div>
					<div class="col-md-2 col-xs-4">
						IP
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>端口</cn><en>Port</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>延时</cn><en>Latency</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>开关</cn>
						<en>enable</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetSRT">
					<div class="row">
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].name" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<select zcfg="[#].stream.srt.mode" class="form-control">
								<option value="caller">caller</option>
								<option value="listener">listener</option>
								<option value="rendezvous">rendezvous</option>
							</select>
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream.srt.ip" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream.srt.port" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4 text-center">
							<input zcfg="[#].stream.srt.latency" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4 text-center">
							<input zcfg="[#].stream.srt.enable" type="checkbox" class="switch form-control">
						</div>
					</div>
					<div class="row" style="margin-top: 5px;">
						<div class="col-md-2 col-xs-4">
						</div>
						<div class="col-md-2 col-xs-4">
							<select zcfg="[#].stream2.srt.mode" class="form-control">
								<option value="caller">caller</option>
								<option value="listener">listener</option>
								<option value="rendezvous">rendezvous</option>
							</select>
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream2.srt.ip" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream2.srt.port" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4 text-center">
							<input zcfg="[#].stream2.srt.latency" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4 text-center">
							<input zcfg="[#].stream2.srt.enable" type="checkbox" class="switch form-control">
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab6">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>NDI名称</cn><en>NDI name</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>NDI分组</cn><en>NDI group</en>
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>开关</cn>
						<en>enable</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetNDI">
					<div class="row">
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].name" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].ndi.name" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].ndi.group" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4 text-center">
							<input zcfg="[#].ndi.enable" type="checkbox" class="switch form-control">
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab5">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-2 col-xs-4">
						HEVC ID
					</div>
					<div class="col-md-2 col-xs-4">
						Format
					</div>
					<div class="col-md-2 col-xs-4">
						<cn>上传速度</cn>
						<en>Push speed</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetPUSH">
					<div class="row">
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].name" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream.push.hevc_id" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<select zcfg="[#].stream.push.format" class="form-control">
								<option value="auto">auto</option>
								<option value="flv">flv</option>
								<option value="rtsp">rtsp</option>
								<option value="rtp">rtp</option>
								<option value="mpegts">mpegts</option>
								<option value="rtp_mpegts">rtp_mpegts</option>
							</select>
						</div>
						<div class="col-md-2 col-xs-4 text-center">
							<span class="info"></span>kb/s
						</div>
					</div>
					<div class="row" style="margin-top: 5px;">
						<div class="col-md-2 col-xs-4">							
						</div>
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].stream2.push.hevc_id" type="text" class="form-control">
						</div>
						<div class="col-md-2 col-xs-4">
							<select zcfg="[#].stream2.push.format" class="form-control">
								<option value="auto">auto</option>
								<option value="flv">flv</option>
								<option value="rtsp">rtsp</option>
								<option value="rtp">rtp</option>
								<option value="mpegts">mpegts</option>
								<option value="rtp_mpegts">rtp_mpegts</option>
							</select>
						</div>
						<div class="col-md-2 col-xs-4 text-center">
							<span class="info"></span>kb/s
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab4">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-xs-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-5 col-xs-4">
						<cn>主流地址</cn>
						<en>Main URL</en>
					</div>
					
					<div class="col-md-5 col-xs-4">
						<cn>辅流地址</cn>
						<en>Sub URL</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetURL">
					<div class="row">
						<div class="col-md-2 col-xs-4">
							<input zcfg="[#].name" type="text" class="form-control">
						</div>

						<div class="col-md-5 col-xs-4">
							<div class="well well-sm mainUrl">
							</div>
						</div>
						<div class="col-md-5 col-xs-4">
							<div class="well well-sm subUrl">
							</div>
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<button id="save" type="button" class="btn btn-warning col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
						<cn>保存</cn>
						<en>Save</en>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="vendor/switch/bootstrap-switch.js"></script>
<script src="js/zcfg.js"></script>
<script>
	$( function () {
		navIndex( 2 );
		var config;
		var epg;
		var all = new Object();
		var all_sub = new Object();
		
		$.fn.bootstrapSwitch.defaults.size = 'small';
		$.fn.bootstrapSwitch.defaults.onColor = 'warning';
		$.getJSON( "config/config.json", function ( result ) {
			config = result;
			var enabledChn = new Array();
			for(var i=0;i<config.length;i++){
				if(config[i].enable || config[i].enable2)
					enabledChn.push(config[i]);
			}
			zctemplet( "#templet", enabledChn );
			zctemplet( "#templetTS", enabledChn );
			zctemplet( "#templetHLS", enabledChn );
			zctemplet( "#templetPUSH", enabledChn );
			zctemplet( "#templetNDI", enabledChn );
			zctemplet( "#templetSRT", enabledChn );
			setTimeout(getSpeed,2000);
			//				$( ".switch" ).bootstrapSwitch();

			all.http = config[ 0 ].stream.http;
			all.hls = config[ 0 ].stream.hls;
			all.rtmp = config[ 0 ].stream.rtmp;
			all.rtsp = config[ 0 ].stream.rtsp;
			all.udp = new Object();
			all.udp.enable = config[ 0 ].stream.udp.enable;
			all.udp.ip = config[ 0 ].stream.udp.ip;
			all.udp.port = config[ 0 ].stream.udp.port + "+";
			all.push = new Object();
			all.push.enable = config[ 0 ].stream.push.enable;
			zcfg( "#all", all );

			all_sub.http = config[ 0 ].stream2.http;
			all_sub.hls = config[ 0 ].stream2.hls;
			all_sub.rtmp = config[ 0 ].stream2.rtmp;
			all_sub.rtsp = config[ 0 ].stream2.rtsp;
			all_sub.udp = new Object();
			all_sub.udp.enable = config[ 0 ].stream2.udp.enable;
			all_sub.udp.ip = config[ 0 ].stream2.udp.ip;
			all_sub.udp.port = config[ 0 ].stream2.udp.port + "+";
			all_sub.push = new Object();
			all_sub.push.enable = config[ 0 ].stream2.push.enable;
			zcfg( "#all_sub", all_sub );

		} );
		
		function getSpeed()
		{
			rpc( "enc.getPushSpeed", null, function ( data ) {
				for(var i=0;i<data.length;i++)
				{
					$("#templetPUSH .info").eq(i).text(data[i]);
				}
				setTimeout(getSpeed,2000);
			} );
		}
		
		function getport(list){
			if(list[2]!=list[0])
				return ":"+list[2];
			else if(list[1]!=list[0])
				return ":"+list[1];
			else
				return "";
		}
		
		function transURL(str)
		{
			var ret="";
			var ip=window.location.hostname;
			var list=str.split("|");
			for(var i=0;i<list.length;i++){
				var url=list[i];
				if(url.indexOf("http")==0){
					if(url.indexOf("///live")>0){
						var port=getport(portCfg.http);
						var port2=getport(portCfg.httpts);
						if(port!="" || port2!=""){
							if(port!="" && port2=="")
								port2=":"+portCfg.httpts[0];
							url=url.replace("///live","//"+ip+port2);	
						}else{
							url=url.replace("///","//"+ip+"/");	
						}
					}
					else{
						var port=getport(portCfg.http);
						url=url.replace("///","//"+ip+port+"/");	
					}
				}
				else if(url.indexOf("rtmp")==0){
					var port=getport(portCfg.rtmp);
					url=url.replace("///","//"+ip+port+"/");	
				}
				else if(url.indexOf("rtsp")==0){
					var port=getport(portCfg.rtsp);
					url=url.replace("///","//"+ip+port+"/");
				}
				else if(url.indexOf("srt")==0){
					url=url.replace("//:","//"+ip+":");
				}
				
				ret+=url+"<br>";
			}
			return ret;
		}
		
		
		function getEPG() {
			rpc( "enc.getEPG", null, function ( data ) {
				epg = data;
	//			console.log( data );
				zctemplet( "#templetURL", epg );
				for(var i=0;i<epg.length;i++){
					$(".mainUrl").eq(i).html(transURL(epg[i].url));
					$(".subUrl").eq(i).html(transURL(epg[i].url2));
				}
			} );
		}
		
		var portCfg;
		$.getJSON( "config/port.json", function ( result ) {
			portCfg = result;
			getEPG();
		} );
		

		



		$( "#setAll" ).click( function ( e ) {
			var ipPlus = false;
			var portPlus = false;
			var ipBase1 = "";
			var ipBase2 = 0;
			var portBase = 0;
			if ( all.udp.ip.indexOf( "+" ) > 0 ) {
				var ip = all.udp.ip;
				ip = ip.replace( "+", "" );
				ipPlus = true;

				var n = ip.lastIndexOf( "." );
				ipBase1 = ip.substr( 0, n + 1 );
				ipBase2 = Number( ip.substr( n + 1 ) );
			}
			if ( all.udp.port.toString().indexOf( "+" ) > 0 ) {
				var port = all.udp.port;
				port = Number( port.replace( "+", "" ) );
				portPlus = true;
				portBase = Number( port );
			}
			
			var ipPlus_2 = false;
			var portPlus_2 = false;
			var ipBase1_2 = "";
			var ipBase2_2 = 0;
			var portBase_2 = 0;
			if ( all_sub.udp.ip.indexOf( "+" ) > 0 ) {
				var ip = all_sub.udp.ip;
				ip = ip.replace( "+", "" );
				ipPlus_2 = true;

				var n = ip.lastIndexOf( "." );
				ipBase1_2 = ip.substr( 0, n + 1 );
				ipBase2_2 = Number( ip.substr( n + 1 ) );
			}
			if ( all_sub.udp.port.toString().indexOf( "+" ) > 0 ) {
				var port = all_sub.udp.port;
				port = Number( port.replace( "+", "" ) );
				portPlus_2 = true;
				portBase_2 = Number( port );
			}
			
			for ( var i = 0; i < config.length; i++ ) {
				$.extend( true, config[ i ].stream, all );
				$.extend( true, config[ i ].stream2, all_sub );
				if ( ipPlus ) {
					config[ i ].stream.udp.ip = ipBase1 + ( ipBase2 + i );
				}
				if ( portPlus ) {
					config[ i ].stream.udp.port = portBase + i;
				}
				
				if ( ipPlus_2 ) {
					config[ i ].stream2.udp.ip = ipBase1_2 + ( ipBase2_2 + i );
				}
				if ( portPlus_2 ) {
					config[ i ].stream2.udp.port = portBase_2 + i;
				}
			}
			zcfg( "#templet", config );
			$( "#save" ).click();
		} );

		$( "#save" ).click( function ( e ) {
			rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
				if ( typeof ( data.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功！</cn><en>Save config success!</en>", "", 2000 );
				}
				getEPG();
			} );
		} );

		$( "#setAllGroup" ).click( function ( e ) {
			grpShow();
		} );


		$( "#grpSync" ).click( function ( e ) {
			var ipPlus = false;
			var portPlus = false;
			var ipBase1 = "";
			var ipBase2 = 0;
			var portBase = 0;
			if ( all.udp.ip.indexOf( "+" ) > 0 ) {
				var ip = all.udp.ip;
				ip = ip.replace( "+", "" );
				ipPlus = true;

				var n = ip.lastIndexOf( "." );
				ipBase1 = ip.substr( 0, n + 1 );
				ipBase2 = Number( ip.substr( n + 1 ) );
			}
			if ( all.udp.port.toString().indexOf( "+" ) > 0 ) {
				var port = all.udp.port;
				port = Number( port.replace( "+", "" ) );
				portPlus = true;
				portBase = Number( port );
			}
			
			var ipPlus_2 = false;
			var portPlus_2 = false;
			var ipBase1_2 = "";
			var ipBase2_2 = 0;
			var portBase_2 = 0;
			if ( all_sub.udp.ip.indexOf( "+" ) > 0 ) {
				var ip = all_sub.udp.ip;
				ip = ip.replace( "+", "" );
				ipPlus_2 = true;

				var n = ip.lastIndexOf( "." );
				ipBase1_2 = ip.substr( 0, n + 1 );
				ipBase2_2 = Number( ip.substr( n + 1 ) );
			}
			if ( all_sub.udp.port.toString().indexOf( "+" ) > 0 ) {
				var port = all_sub.udp.port;
				port = Number( port.replace( "+", "" ) );
				portPlus_2 = true;
				portBase_2 = Number( port );
			}
			
			var cfg = new Object();
			var cfg2 = new Object();
			var map = new Object();
			$.extend( cfg, all );
			$.extend( cfg2, all_sub );
			var k = grpList.length;
			for ( var i = 0; i < grpList.length; i++ ) {
				grpSetStatus( i, 0 );
				if ( ipPlus ) {
					cfg.udp.ip = ipBase1 + ( ipBase2 + i * 20 ) + "+";
				}
				if ( portPlus ) {
					cfg.udp.port = ( portBase + i * 20 ) + "+";
				}
				
				if ( ipPlus_2 ) {
					cfg2.udp.ip = ipBase1_2 + ( ipBase2_2 + i * 20 ) + "+";
				}
				if ( portPlus_2 ) {
					cfg2.udp.port = ( portBase_2 + i * 20 ) + "+";
				}
				map.cfg=cfg;
				map.cfg2=cfg2;
				
				rpc( "group.callSetStream", [ grpList[ i ].mac, map ], function ( data, index ) {
					grpSetStatus( index, data ? 1 : 2 );
					k--;
					if ( k == 0 ) {
						$.getJSON( "config/config.json", function ( result ) {
							config = result;
							zcfg( "#templet", config );
						} );
					}
				}, i );
			}
		} );

	} );
</script>
<?php
include( "foot.php" );
?>
