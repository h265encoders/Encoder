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
					<div class="col-md-2 col-sm-4"></div>
					<div class="col-md-6 col-sm-8">
						<div class="row">
							<div class="col-sm-3">
								<cn>分辨率</cn>
								<en>video size</en>
							</div>
							<div class="col-sm-6">
								<cn>编码方式</cn>
								<en>codec</en>
							</div>
							<div class="col-sm-3">
								<cn>码率控制</cn>
								<en>rate control</en>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-2"><cn>码率</cn><en>bitrate</en>(kb/s)</div>
					<div class="col-md-1 col-sm-2">
						<cn>帧率</cn>
						<en>framerate</en>
					</div>
					<div class="col-md-1 col-sm-2">GOP(
						<cn>秒</cn>
						<en>sec</en>)</div>
				</div>
				<div class="row" id="all">
					<div class="col-md-2 col-sm-4 text-right" style="line-height: 34px;">
						<cn>主流参数</cn>
						<en>Main stream</en>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="row">
							<div class="col-sm-3">
								<select zcfg="width*x*height" class="form-control">
									<option value="-1x-1">auto</option>
									<?php
										if($support4K)
										{
									?>
									<option value="3840x2160">4K</option>
									<?php
										}
									?>
									<option value="1920x1080">1080p</option>
									<option value="1280x720">720p</option>
									<option value="640x360">360p</option>
									<option value="1080x1920">1080x1920</option>
									<option value="720x1280">720x1280</option>
									<option value="360x640">360x640</option>
								</select>
							</div>
							<div class="col-sm-6">
								<select class="form-control" zcfg="codec*,*profile">
									<option value="h264,base">H.264 Baseline Profile</option>
									<option value="h264,main">H.264 Main Profile</option>
									<option value="h264,high">H.264 High Profile</option>
										<?php
										if($chip!="3531A")
										{
										?>
										<option value="h265,main">H.265 Main Profile</option>
										<?php
										}
										?>
									<option value="close,base" cn="关闭" en="close"></option>
								</select>
							</div>
							<div class="col-sm-3">
								<select zcfg="rcmode" class="form-control">
									<option value="cbr">CBR</option>
									<option value="vbr">VBR</option>
									<option value="avbr">AVBR</option>
									<option value="fixqp">FIXQP</option>
								</select>
							</div>
							
						</div>
					</div>
					<div class="col-md-1 col-sm-2">
						<input zcfg="bitrate" type="text" class="form-control">
					</div>
					<div class="col-md-1 col-sm-2">
						<input zcfg="framerate" type="text" class="form-control">
					</div>
					<div class="col-md-1 col-sm-2">
						<input zcfg="gop" type="text" class="form-control">
					</div>

				</div>
				<div class="row" id="all_sub" style="margin-top: 5px;">
					<?php
					if($enableSub)
					{
					?>
					<div class="col-md-2 col-sm-4 text-right" style="line-height: 34px;">
						<cn>辅流参数</cn>
						<en>Sub stream</en>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="row">
							<div class="col-sm-3">
								<select zcfg="width*x*height" class="form-control">
									<?php
										if($support4K)
										{
									?>
									<option value="3840x2160">4K</option>
									<?php
										}
									?>
									<option value="1920x1080">1080p</option>
									<option value="1280x720">720p</option>
									<option value="640x360">360p</option>
									<option value="1080x1920">1080x1920</option>
									<option value="720x1280">720x1280</option>
									<option value="360x640">360x640</option>
								</select>
							</div>
							<div class="col-sm-6">
								<select class="form-control" zcfg="codec*,*profile">
									<option value="h264,base">H.264 Baseline Profile</option>
									<option value="h264,main">H.264 Main Profile</option>
									<option value="h264,high">H.264 High Profile</option>
										<?php
										if($chip!="3531A")
										{
										?>
										<option value="h265,main">H.265 Main Profile</option>
										<?php
										}
										?>						
									<option value="close,base" cn="关闭" en="close"></option>		
								</select>
							</div>
							<div class="col-sm-3">
								<select zcfg="rcmode" class="form-control">
									<option value="cbr">CBR</option>
									<option value="vbr">VBR</option>
									<option value="avbr">AVBR</option>
									<option value="fixqp">FIXQP</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-2">
						<input zcfg="bitrate" type="text" class="form-control">
					</div>
					<div class="col-md-1 col-sm-2">
						<input zcfg="framerate" type="text" class="form-control">
					</div>
					<div class="col-md-1 col-sm-2">
						<input zcfg="gop" type="text" class="form-control">
					</div>
					<?php
					}
					?>
				</div>
				<hr style="margin-top:10px; margin-bottom: 10px;"/>
				<div class="row text-center">
					<div class="col-md-2 col-sm-4"></div>
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-md-3 col-sm-4">
								<cn>编码格式</cn>
								<en>codec</en>
							</div>
							<div class="col-md-3 col-sm-4">
								<cn>音源</cn>
								<en>source</en>
							</div>
							<div class="col-md-3 col-sm-4">
								<cn>增益</cn>
								<en>gain</en>
							</div>
							<div class="col-md-3 col-sm-4">
								<cn>采样率</cn>
								<en>samplerate</en>
							</div>
						</div>
					</div>					
					<div class="col-md-2 col-sm-4">
						<cn>声道</cn>
						<en>channels</en>
					</div>
					<div class="col-md-2 col-sm-4">
						<cn>码率</cn>
						<en>bitrate</en>(kb/s)</div>
				</div>
				<div class="row" id="allAudio">
					<div class="col-md-2 col-sm-4 text-right" style="line-height: 34px;">
						<cn>音频参数</cn>
						<en>Audio config</en>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-md-3 col-sm-4">
								<select zcfg="codec" class="form-control">
									<option value="aac">AAC</option>
									<option value="pcma">PCMA</option>
									<option value="mp2">MPEG2</option>
									<option value="mp3">MP3</option>
									<?php
									if($OPUS)
									{
									?>
									<option value="opus">OPUS</option>
									<?php
									}
									?>
									<option value="close" cn="关闭" en="close"></option>
								</select>
							</div>
							<div class="col-md-3 col-sm-4">
								<select zcfg="audioSrc" class="form-control">
									<option value="hdmi">HDMI</option>
									<?php
									if($type=="C3531D" || $type=="DSH" || $type=="C3531DV200")
									{
									?>
									<option value="sdi">SDI</option>
									<?php
									}
									if($type!="ENC2P" && (!isset($line) || $line==true) )
									{
									?>
									<option value="line">Line</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="col-md-3 col-sm-4">
								<select zcfg="gain" class="form-control">
									<option value="24">+24dB</option>
									<option value="18">+18dB</option>
									<option value="12">+12dB</option>
									<option value="6">+6dB</option>
									<option value="0">+0dB</option>
									<option value="-6">-6dB</option>
									<option value="-12">-12dB</option>
									<option value="-18">-18dB</option>
									<option value="-24">-24dB</option>
								</select>
							</div>
							<div class="col-md-3 col-sm-4">
								<select zcfg="samplerate" class="form-control">
									<option value="-1">auto</option>
									<option value="16000">16K</option>
									<option value="32000">32K</option>
									<option value="44100">44.1K</option>
									<option value="48000">48K</option>
								</select>
							</div>
						</div>
					</div>

					<div class="col-md-2 col-sm-4">
						<select zcfg="channels" class="form-control">
							<option cn="单声道" en="mono" value="1"></option>
							<option cn="立体声" en="stereo" value="2"></option>
						</select>
					</div>
					<div class="col-md-2 col-sm-4">
						<input zcfg="bitrate" type="text" class="form-control">
					</div>
				</div>
				<hr/>
				<div class="row text-center">
					<div class="col-md-12">
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
	</div>
	<div class="col-lg-12">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><i class="fa fa-sign-in"></i> <cn>编码参数</cn><en>Encode config</en></a>
			</li>
			<li role="presentation" ><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab"><i class="fa fa-file-video-o"></i> <cn>高级编码参数</cn><en>Advanced Encode config</en></a>
			</li>
			<?php
			if($chip!="3559A")
			{
			?>
			<li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><i class="fa fa-image"></i> <cn>视频参数</cn><en>Video config</en></a>
			</li>
			<?php
			}
			?>
			<li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><i class="fa fa-volume-up"></i> <cn>音频参数</cn><en>Audio config</en></a>
			</li>
			<li id="tabNet" role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><i class="fa fa-internet-explorer"></i> <cn>网络输入</cn><en>Network stream</en></a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="tab1">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-sm-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-6 col-sm-8">
						<div class="row">
							<div class="col-sm-3">
								<cn>分辨率</cn>
								<en>video size</en>
							</div>
							<div class="col-sm-6">
								<cn>编码方式</cn>
								<en>codec</en>
							</div>
							<div class="col-sm-3">
								<cn>码率控制</cn>
								<en>rate control</en>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-2">
						<cn>码率</cn>
						<en>bitrate</en>(kb/s)</div>
					<div class="col-md-1 col-sm-2">
						<cn>帧率</cn>
						<en>framerate</en>
					</div>
					<div class="col-md-1 col-sm-2">GOP(
						<cn>秒</cn>
						<en>sec</en>)</div>
					<div class="col-md-1 col-sm-2">
						<cn>开关</cn>
						<en>enable</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetHDMI">
					<div class="row">
						<div class="col-md-2 col-sm-4">
							<input type="text" zcfg="[#].name" class="form-control">
						</div>
						<div class="col-md-6 col-sm-8">
							<div class="row">
								<div class="col-sm-3">
									<select zcfg="[#].encv.width*x*[#].encv.height" class="form-control">
										<option value="-1x-1">auto</option>
										<?php
										if($support4K)
										{
									?>
									<option value="3840x2160">4K</option>
									<?php
										}
									?>
										<option value="1920x1080">1080p</option>
										<option value="1280x720">720p</option>
										<option value="640x360">360p</option>
										<option value="1080x1920">1080x1920</option>
										<option value="720x1280">720x1280</option>
										<option value="360x640">360x640</option>
									</select>
								</div>
								<div class="col-sm-6">
									<select class="form-control" zcfg="[#].encv.codec*,*[#].encv.profile">
										<option value="h264,base">H.264 Baseline Profile</option>
										<option value="h264,main">H.264 Main Profile</option>
										<option value="h264,high">H.264 High Profile</option>
										<?php
										if($chip!="3531A")
										{
										?>
										<option value="h265,main">H.265 Main Profile</option>
										<?php
										}
										?>
										<option value="close,base" cn="关闭" en="close"></option>
									</select>
								</div>
								<div class="col-sm-3">
									<select zcfg="[#].encv.rcmode" class="form-control">
										<option value="cbr">CBR</option>
										<option value="vbr">VBR</option>
										<option value="avbr">AVBR</option>
										<option value="fixqp">FIXQP</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-1 col-sm-4">
							<input zcfg="[#].encv.bitrate" type="text" class="form-control">
						</div>

						<div class="col-md-1 col-sm-2">
							<input zcfg="[#].encv.framerate" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input zcfg="[#].encv.gop" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input zcfg="[#].enable" type="checkbox" class="switch form-control">
						</div>
					</div>
					<?php
					if($enableSub)
					{
					?>
					<div class="row"  style="margin-top: 5px;">
						<div class="col-md-2 col-sm-4">
						</div>
						<div class="col-md-6 col-sm-8">
							<div class="row">
								<div class="col-sm-3">
									<select zcfg="[#].encv2.width*x*[#].encv2.height" class="form-control">
										<option value="-1x-1">auto</option>
										<?php
										if($support4K)
										{
									?>
									<option value="3840x2160">4K</option>
									<?php
										}
									?>
										<option value="1920x1080">1080p</option>
										<option value="1280x720">720p</option>
										<option value="640x360">360p</option>
										<option value="1080x1920">1080x1920</option>
										<option value="720x1280">720x1280</option>
										<option value="360x640">360x640</option>
									</select>
								</div>
								<div class="col-sm-6">
									<select class="form-control" zcfg="[#].encv2.codec*,*[#].encv2.profile">
										<option value="h264,base">H.264 Baseline Profile</option>
										<option value="h264,main">H.264 Main Profile</option>
										<option value="h264,high">H.264 High Profile</option>
										<?php
										if($chip!="3531A")
										{
										?>
										<option value="h265,main">H.265 Main Profile</option>
										<?php
										}
										?>
										<option value="close,base" cn="关闭" en="close"></option>
									</select>
								</div>
								<div class="col-sm-3">
									<select zcfg="[#].encv2.rcmode" class="form-control">
									<option value="cbr">CBR</option>
									<option value="vbr">VBR</option>
									<option value="avbr">AVBR</option>
									<option value="fixqp">FIXQP</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-1 col-sm-4">
							<input zcfg="[#].encv2.bitrate" type="text" class="form-control">
						</div>

						<div class="col-md-1 col-sm-2">
							<input zcfg="[#].encv2.framerate" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input zcfg="[#].encv2.gop" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input zcfg="[#].enable2" type="checkbox" class="switch form-control">
						</div>
					</div>
					<?php
					}
					?>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab5">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-sm-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-1 col-sm-2">
						<cn>宽</cn>
						<en>width</en>
					</div>
					<div class="col-md-1 col-sm-2">
						<cn>高</cn>
						<en>height</en>
					</div>
					<div class="col-md-2 col-sm-4">
						<cn>智能编码模式</cn>
						<en>smart encode</en>
					</div>
					<div class="col-md-1 col-sm-2">
						minQP
					</div>
					<div class="col-md-1 col-sm-2">
						maxQP
					</div>
					<div class="col-md-1 col-sm-2">
						fixIQP
					</div>
					<div class="col-md-1 col-sm-2">
						fixPQP
					</div>
					<div class="col-md-2 col-sm-4">
						<cn>低延时编码</cn>
						<en>low latency</en>
					</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetADV">
					<div class="row">
						<div class="col-md-2 col-sm-4">
							<input type="text" zcfg="[#].name" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv.width" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv.height" class="form-control">
						</div>
						<div class="col-md-2 col-sm-4">
								<select zcfg="[#].encv.gopmode" class="form-control">
									<option value="0">Normal</option>
										<?php
										if($chip!="3531A")
										{
										?>
										<option value="1">SmartP</option>
										<option value="2">DualP</option>
										<?php
										}
										if(isset($BFrame) && $BFrame)
										{
										?>
										<option value="3">BiPredB</option>
										<?php
										}
										?>
								</select>
							</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv.minqp" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv.maxqp" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv.Iqp" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv.Pqp" class="form-control">
						</div>
						<div class="col-md-2 col-sm-4 text-center">
							<input zcfg="[#].encv.lowLatency" type="checkbox" class="switch form-control">
						</div>
					</div>
					<div class="row"  style="margin-top: 5px;">
						<div class="col-md-2 col-sm-4">
							
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv2.width" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv2.height" class="form-control">
						</div>
						<div class="col-md-2 col-sm-4">
								<select zcfg="[#].encv2.gopmode" class="form-control">
									<option value="0">Normal</option>
										<?php
										if($chip!="3531A")
										{
										?>
										<option value="1">SmartP</option>
										<option value="2">DualP</option>
										<?php
										}
										if(isset($BFrame) && $BFrame)
										{
										?>
										<option value="3">BiPredB</option>
										<?php
										}
										?>
								</select>
							</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv2.minqp" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv2.maxqp" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv2.Iqp" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].encv2.Pqp" class="form-control">
						</div>
						<div class="col-md-2 col-sm-4 text-center">
							<input zcfg="[#].encv2.lowLatency" type="checkbox" class="switch form-control">
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab2">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-sm-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-10  col-sm-12">
						<div class="row">
							<div class="col-md-2 col-sm-4">
								<cn>全帧率去隔行</cn>
								<en>full framerate deinterlace</en>
							</div>
							<div class="col-md-2 col-sm-4">
								<cn>旋转</cn>
								<en>Rotate</en>
							</div>
							<div class="col-md-2 col-sm-4">
								<cn>左裁剪</cn>
								<en>left crop</en>
							</div>
							<div class="col-md-2 col-sm-4">
								<cn>右裁剪</cn>
								<en>right crop</en>
							</div>
							<div class="col-md-2 col-sm-4">
								<cn>上裁剪</cn>
								<en>top crop</en>
							</div>
							<div class="col-md-2 col-sm-4">
								<cn>下裁剪</cn>
								<en>bottom crop</en>
							</div>
						</div>
					</div>
					
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetVideo">
					<div class="row">
						<div class="col-md-2 col-sm-4">
							<input type="text" zcfg="[#].name" class="form-control">
						</div>
						<div class="col-md-10  col-sm-12">
							<div class="row">
								<div class="col-md-2 col-sm-4 text-center">
									<input zcfg="[#].cap.deinterlace" type="checkbox" class="switch form-control">
								</div>
								<div class="col-md-2 col-sm-4 text-center">
									<select zcfg="[#].cap.rotate" class="form-control">
										<option value="0">0</option>
										<option value="90">90</option>
										<option value="180">180</option>
										<option value="270">270</option>
									</select>
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].cap.crop.L" type="text" class="form-control">
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].cap.crop.R" type="text" class="form-control">
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].cap.crop.T" type="text" class="form-control">
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].cap.crop.B" type="text" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<!--
					<div class="row">
						<div class="col-md-2 col-sm-4">
							
						</div>
						<div class="col-md-10  col-sm-12">
							<div class="row">
								<div class="col-md-2 col-sm-4 text-center">
									
								</div>
								<div class="col-md-2 col-sm-4 text-center">
									
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].subCrop.L" type="text" class="form-control">
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].subCrop.R" type="text" class="form-control">
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].subCrop.T" type="text" class="form-control">
								</div>
								<div class="col-md-2 col-sm-4">
									<input zcfg="[#].subCrop.B" type="text" class="form-control">
								</div>
							</div>
						</div>
					</div>-->
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab3">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-2 col-sm-4">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<div class="col-md-3 col-sm-4">
								<cn>编码格式</cn>
								<en>codec</en>
							</div>
							<div class="col-md-3 col-sm-4">
								<cn>音源</cn>
								<en>source</en>
							</div>
							<div class="col-md-3 col-sm-4">
								<cn>增益</cn>
								<en>gain</en>
							</div>
							<div class="col-md-3 col-sm-4">
								<cn>采样率</cn>
								<en>samplerate</en>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<cn>声道</cn>
						<en>channels</en>
					</div>
					<div class="col-md-2 col-sm-4">
						<cn>码率</cn>
						<en>bitrate</en>(kb/s)</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetAudio">
					<div class="row">
						<div class="col-md-2 col-sm-4">
							<input type="text" zcfg="[#].name" class="form-control">
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<div class="col-md-3 col-sm-4">
									<select zcfg="[#].enca.codec" class="form-control">
										<option value="aac">AAC</option>
										<option value="pcma">PCMA</option>
										<option value="mp2">MPEG2</option>
										<option value="mp3">MP3</option>
										<?php
										if($OPUS)
										{
										?>
										<option value="opus">OPUS</option>
										<?php
										}
										?>
										<option value="close" cn="关闭" en="close"></option>
									</select>
								</div>
								<div class="col-md-3 col-sm-4">
									<select zcfg="[#].enca.audioSrc" class="form-control">
										<option value="hdmi">HDMI</option>
										<?php
										if($type=="C3531D" || $type=="DSH" || $type=="C3531DV200")
										{
										?>
										<option value="sdi">SDI</option>
										<?php
										}
										if($type!="ENC2P" && (!isset($line) || $line==true))
										{
										?>
										<option value="line">Line</option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-3 col-sm-4">
									<select zcfg="[#].enca.gain" class="form-control">
										<option value="24">+24dB</option>
										<option value="18">+18dB</option>
										<option value="12">+12dB</option>
										<option value="6">+6dB</option>
										<option value="0">+0dB</option>
										<option value="-6">-6dB</option>
										<option value="-12">-12dB</option>
										<option value="-18">-18dB</option>
										<option value="-24">-24dB</option>
									</select>
								</div>
								<div class="col-md-3 col-sm-4">
									<select zcfg="[#].enca.samplerate" class="form-control">
										<option value="-1">auto</option>
										<option value="16000">16K</option>
										<option value="32000">32K</option>
										<option value="44100">44.1K</option>
										<option value="48000">48K</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="col-md-2 col-sm-4">
							<select zcfg="[#].enca.channels" class="form-control">
								<option cn="单声道" en="mono" value="1"></option>
								<option cn="立体声" en="stereo" value="2"></option>
							</select>
						</div>
						<div class="col-md-2 col-sm-4">
							<input zcfg="[#].enca.bitrate" type="text" class="form-control">
						</div>
					</div>
					<hr style="margin-top:10px; margin-bottom: 10px;"/>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="tab4">
				<div class="row text-center" style="margin-top: 5px;">
					<div class="col-md-1 col-sm-2">
						<cn>频道名称</cn>
						<en>channel name</en>
					</div>
					<div class="col-md-4 col-sm-6">
						<cn>流地址</cn>
						<en>stream url</en>
					</div>
					<div class="col-md-1 col-sm-2">
						<cn>帧率</cn>
						<en>framerate</en>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="row">
							<div class="col-sm-6">
								<cn>缓冲模式</cn>
								<en>buffer mode</en>
							</div>
							<div class="col-sm-6">
								<cn>协议</cn>
								<en>protocol</en><small>for rtsp</small>
							</div>
						</div>
					</div>
							
							<div class="col-md-1 col-sm-2">
								<cn>视频解码</cn>
								<en>video decode</en>
							</div>
							<div class="col-md-1 col-sm-2">
								<cn>音频解码</cn>
								<en>audio decode</en>
							</div>
							<div class="col-md-1 col-sm-2">
								<cn>开关</cn>
								<en>enable</en>
							</div>
					
				</div>
				<hr style="margin-top:5px; margin-bottom: 10px;"/>
				<div id="templetNET">
					<div class="row">
						<div class="col-md-1 col-sm-2">
							<input type="text" zcfg="[#].name" class="form-control">
						</div>
						<div class="col-md-4 col-sm-6">
							<input zcfg="[#].net.path" type="text" class="form-control">
						</div>
						<div class="col-md-1 col-sm-2">
							<input zcfg="[#].net.framerate" type="text" class="form-control">
						</div>
						<div class="col-md-3 col-sm-6">
						<div class="row">
							<div class="col-sm-6">
								<select zcfg="[#].net.bufferMode" class="form-control">
									<option value="0" cn="一般" en="Normal"></option>
									<option value="1" cn="实时" en="NoBuffer"></option>
									<option value="2" cn="同步" en="Sync"></option>
								</select>
							</div>
							<div class="col-sm-6">
								<select zcfg="[#].net.protocol" class="form-control">
									<option value="udp">UDP</option>
									<option value="tcp">TCP</option>
								</select>
							</div>
							</div>
							</div>
							
							<div class="col-md-1 col-sm-2">
								<input type="checkbox" zcfg="[#].net.decodeV" class="switch form-control">
							</div>
							<div class="col-md-1 col-sm-2">
								<input type="checkbox" zcfg="[#].net.decodeA" class="switch form-control">
							</div>
							<div class="col-md-1 col-sm-2">
								<input type="checkbox" zcfg="[#].enable" class="switch form-control">
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
<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
<script src="js/zcfg.js"></script>
<script>
	$( function () {
		navIndex( 1 );
		var config;
		var hdmi = new Array();
		var video = new Array();
		var audio = new Array();
		var net = new Array();
		var all = new Object();
		var allAudio = new Object();
		var all_sub = new Object();
		$.fn.bootstrapSwitch.defaults.size = 'small';
		$.fn.bootstrapSwitch.defaults.onColor = 'warning';
		function init(){
			hdmi = new Array();
			video = new Array();
			audio = new Array();
			net = new Array();
			$.getJSON( "config/config.json", function ( result ) {
			config = result;
			for ( var i = 0; i < config.length; i++ ) {
				if ( config[ i ].type == "net" ) {
					net.push( config[ i ] );
					if ( config[ i ].net.decodeV ){
						hdmi.push( config[ i ] );
					}
					if(config[ i ].enable){
						audio.push( config[ i ] );
					}
				} else if ( config[ i ].type != "file" && config[ i ].type != "ndi" ) {
					audio.push( config[ i ] );
					hdmi.push( config[ i ] );
				}
				if ( config[ i ].type == "vi" )
					video.push( config[ i ] );
			}
			if ( net.length == 0 ) {
				$( "#tabNet" ).hide();
			}
			zctemplet( "#templetHDMI", hdmi );
			zctemplet( "#templetADV", hdmi );
			zctemplet( "#templetAudio", audio );
			zctemplet( "#templetNET", net );
			zctemplet( "#templetVideo", video );


			all.width = hdmi[ 0 ].encv.width;
			all.height = hdmi[ 0 ].encv.height;
			all.codec = hdmi[ 0 ].encv.codec;
			all.rcmode = hdmi[ 0 ].encv.rcmode;
			all.bitrate = hdmi[ 0 ].encv.bitrate;
			all.framerate = hdmi[ 0 ].encv.framerate;
			all.gop = hdmi[ 0 ].encv.gop;
			all.profile = hdmi[ 0 ].encv.profile;
			all.gopmode = hdmi[ 0 ].encv.gopmode;
			zcfg( "#all", all );

			all_sub.width = hdmi[ 0 ].encv2.width;
			all_sub.height = hdmi[ 0 ].encv2.height;
			all_sub.codec = hdmi[ 0 ].encv2.codec;
			all_sub.profile = hdmi[ 0 ].encv2.profile;
			all_sub.rcmode = hdmi[ 0 ].encv2.rcmode;
			all_sub.bitrate = hdmi[ 0 ].encv2.bitrate;
			all_sub.framerate = hdmi[ 0 ].encv2.framerate;
			all_sub.gop = hdmi[ 0 ].encv2.gop;
			all_sub.gopmode = hdmi[ 0 ].encv2.gopmode;
			zcfg( "#all_sub", all_sub );


			allAudio.codec = hdmi[ 0 ].enca.codec;
			allAudio.samplerate = hdmi[ 0 ].enca.samplerate;
			allAudio.channels = hdmi[ 0 ].enca.channels;
			allAudio.bitrate = hdmi[ 0 ].enca.bitrate;
			allAudio.audioSrc = hdmi[ 0 ].enca.audioSrc;
			allAudio.gain = hdmi[ 0 ].enca.gain;
			zcfg( "#allAudio", allAudio );

			$( ".switch" ).bootstrapSwitch();
		} );
		}
		init();



		$( "#setAll" ).click( function ( e ) {
			for ( var i = 0; i < config.length; i++ ) {
				if ( config[ i ].type == "file" ||  config[ i ].type == "ndi" )
					continue;
				$.extend( config[ i ].encv, all );
				$.extend( config[ i ].encv2, all_sub );
				$.extend( config[ i ].enca, allAudio );
			}
			zcfg( "#templetHDMI", hdmi );
			zcfg( "#templetADV", hdmi );
			zcfg( "#templetNET", net );
			zcfg( "#templetAudio", audio );
			$( "#save" ).click();
		} );
		
		var maxENC = <?php echo isset($maxENC)?$maxENC:"-1"; ?>;

		$( "#save" ).click( function ( e ) {
			
			var sum=0;
			for ( var i = 0; i < config.length; i++ ) {
				if(config[i].enable && config[i].type!="file" && config[i].type!="ndi"){
					if(config[i].encv.codec!="close")
						sum+=config[i].encv.width*config[i].encv.height*config[i].encv.framerate;
					if(config[i].enable2 && config[i].encv2.codec!="close"){
						sum+=config[i].encv2.width*config[i].encv2.height*config[i].encv2.framerate;
					}
				}
			}
			
			if(maxENC>0 && sum>maxENC){
				$.confirm( {
					title: '<cn>警告</cn><en>Warning</en>',
					content: '<cn>超出编码性能上限，请调整编码参数！</cn><en>The limit of encode performance is exceeded. Please adjust the encode parameters!</en>',
					buttons: {
						ok: {
							text: "<cn>知道了</cn><en>I know</en>",
							btnClass: 'btn-warning',
							keys: [ 'enter' ]
						}

					}
				} );
			}
			
			rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
				if ( typeof ( data.error ) != "undefined" ) {
					htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
				} else {
					htmlAlert( "#alert", "success", "<cn>保存设置成功！</cn><en>Save config success!</en>", "", 2000 );
					init();
				}

			} );
		} );

		$( "#setAllGroup" ).click( function ( e ) {
			grpShow();
		} );


		$( "#grpSync" ).click( function ( e ) {
			var cfg = new Object();
			cfg.encv = all;
			cfg.enca = allAudio;
			var k = grpList.length;
			for ( var i = 0; i < grpList.length; i++ ) {
				grpSetStatus( i, 0 );
				rpc( "group.callSetEncode", [ grpList[ i ].mac, cfg ], function ( data, index ) {
					grpSetStatus( index, data ? 1 : 2 );
					k--;
					if ( k == 0 ) {
						$.getJSON( "config/config.json", function ( result ) {
							config = result;
							for ( var i = 0; i < config.length; i++ ) {
								if ( config[ i ].type == "net" ) {
									net[ i ] = config[ i ];
								} else if ( config[ i ].type != "file" && config[ i ].type != "ndi" ) {
									hdmi[ i ] = config[ i ];
								}
							}
							zcfg( "#templetHDMI", hdmi );
							zcfg( "#templetADV", hdmi );
							zcfg( "#templetNET", net );
							zcfg( "#templetAudio", audio );
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