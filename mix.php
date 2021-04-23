<?php
include( "head.php" );
?>
<div class="row">
	<div class="col-md-5">
		<div class="thumbnail">
			<div class="caption ">
				<form class="form-inline ">
				  <div class="form-group ">
						<label class="control-label">
							<cn>频道</cn>
							<en>Channel</en>:
						</label>
                        <select id="channels" class="form-control"></select>
						<label class="control-label" style="margin-left: 15px;">
						    <cn>布局</cn>
							<en>Layout</en>:
						</label>
							<select id="SysLayout" class="form-control">
<!--							<option cn="9宫格" en="grid 3x3" value="0"></option>-->
<!--							<option cn="4分屏" en="grid 2x2"value="1"></option>-->
<!--							<option value="2">1+2</option>-->
<!--							<option cn="画中画" en="PinP" value="3"></option>-->
<!--							<option cn="单画面" en="Single" value="4"></option>-->
<!--							<option cn="上下" en="UpDown" value="5"></option>-->
<!--							<option cn="自定义" en="user" value="6"></option>-->
						</select>
                        <label id="defLay" style="position: absolute;right: 30px;top:20px;cursor: pointer">
                            <i class="fa fa-cog fa-lg"></i>
                        </label>
				  </div>
				</form>
			</div>
			<img id="snap" src="">
		</div>
	</div>
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>布局设定</cn>
					<en>Layout config</en>
				</h3>
			</div>
			<div class="panel-body">
					<div id="templeLay" style="position: absolute; padding: 10px; width: 33%;height: 33%; border: 1px solid #ddd; z-index: 0; background-color: #777; display: none; ">
						
						<table style="width: 100%;">
							<tr>
								<td width="100%">
									<select onChange="update();" id="laySrc" class="form-control input-sm">
										<option cn="空" en="NULL" value="-1"></option>
									</select>
								</td>
								<td>
									<button style="width: 36px;" onClick="mute(this);" class="btn btn-sm btn-disable" ><i class="fa fa-volume-off"></i></button>
								</td>
							</tr>
						</table>
							
						</div>
					<div id="layout" style="position: relative; width: 100%; padding-bottom: 56.25%; background-color: #000;">
						
					</div>
			</div>
		</div>
	</div>
	
</div>
<div class="row" <?php if(isset($HDMI_Out) && !$HDMI_Out) echo 'style="display: none;"'; ?> >
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="title">
				<h3 class="panel-title">
					<cn>输出设置</cn>
					<en>Output Config</en>
				</h3>
			</div>
			<div class="panel-body">
				<div id="alertOut"></div>
				<form class="form-horizontal" id="output" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							 <cn>混合开关</cn><en>Mix enable</en>
						</label>
						<div class="col-sm-5">
							<input type="checkbox" zcfg="enable" class="switch form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
						<label class="col-sm-4 control-label">
							 HDMI <cn>开关</cn><en>enable</en>
						</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="output.enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">
							<cn>分辨率</cn><en>resolution</en>
						</label>
						<div class="col-sm-6">
							<select zcfg="output.output" class="form-control">
								<?php
									if($type!="ENC1H")
									{
								?>
								<option value="3840x2160_60">4K60</option>
								<option value="3840x2160_50">4K50</option>
								<option value="3840x2160_30">4K30</option>
								<?php
									}
								?>
								<option value="1080P60">1080P60</option>
								<option value="1080I60">1080I60</option>
								<option value="1080P50">1080P50</option>
								<option value="1080I50">1080I50</option>
								<option value="1080P30">1080P30</option>
								<option value="720P60">720P60</option>
								<option value="720P50">720P50</option>
							</select>
						</div>
					</div>
<!--
							<div class="form-group">
								<label class="col-sm-4 control-label">
									<cn>旋转</cn><en>rotate</en>
								</label>
								<div class="col-sm-6">
									<select zcfg="output.rotate" class="form-control">
										<option value="0">0</option>
										<option value="90">90</option>
										<option value="180">180</option>
										<option value="270">270</option>
									</select>
								</div>
							</div>
-->
					<div class="form-group">
						<label class="col-sm-4 control-label">
							<cn>视频源</cn><en>video source</en>
						</label>
						<div class="col-sm-6">
							<select zcfg="output.src" id="hdmisrc" class="form-control">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">
							 <cn>低延时</cn><en>low latency</en>
						</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="output.lowLatency" class="switch form-control">
						</div>
					</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
						<label class="col-sm-4 control-label">
<?php
echo isset($extraVo)?$extraVo:"VGA";
?>
							  <cn>开关</cn><en>enable</en>
						</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="output2.enable" class="switch form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">
							<cn>分辨率</cn><en>resolution</en>
						</label>
						<div class="col-sm-6">
							<select zcfg="output2.output" class="form-control">
								<option value="1080P60">1080P60</option>
								<option value="1080P50">1080P50</option>
								<option value="1080P30">1080P30</option>
								<option value="720P60">720P60</option>
								<option value="720P50">720P50</option>
							</select>
						</div>
					</div>
<!--
							<div class="form-group">
								<label class="col-sm-4 control-label">
									<cn>旋转</cn><en>rotate</en>
								</label>
								<div class="col-sm-6">
									<select zcfg="output2.rotate" class="form-control">
										<option value="0">0</option>
										<option value="90">90</option>
										<option value="180">180</option>
										<option value="270">270</option>
									</select>
								</div>
							</div>
-->
					<div class="form-group">
						<label class="col-sm-4 control-label">
							<cn>视频源</cn><en>video source</en>
						</label>
						<div class="col-sm-6">
							<select zcfg="output2.src" id="vgasrc" class="form-control">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">
							 <cn>低延时</cn><en>low latency</en>
						</label>
						<div class="col-sm-6">
							<input type="checkbox" zcfg="output2.lowLatency" class="switch form-control">
						</div>
					</div>
						</div>
					</div>
					
					<hr />
					<div class="form-group">
						<div class="col-md-12 text-center">
							<button type="button" id="save" class=" save btn btn-warning">
								<cn>保存</cn>
								<en>Save</en>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="vendor/switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
<script src="js/zcfg.js"></script>
<script>
	$.fn.bootstrapSwitch.defaults.size = 'small';
	$.fn.bootstrapSwitch.defaults.onColor = 'warning';
	navIndex( 4 );
	var config = null;
	var mixCfg = null;
	var curChn = -1;
	var defLays = null;
	var curLayIndex = 0;
	var SysLayout = [];

    $("#myModal").on('show.bs.modal', function(){
        var $this = $(this);
        var $modal_dialog = $this.find('.modal-dialog');
        $this.css('display', 'block');
        $modal_dialog.css({'margin-top': Math.max(0, ($(window).height() - $modal_dialog.height()) / 2) });
    });

	function isMute(obj)
	{
		return $(obj).hasClass("btn-disable");
	}
	
	function setMute(obj,bMute)
	{
		var btn=$(obj).find("i");
		if(bMute){
			btn.removeClass("fa-volume-up");
			btn.addClass("fa-volume-off");
			$(obj).removeClass("btn-warning");
			$(obj).addClass("btn-disable");
		}
		else{
			btn.removeClass("fa-volume-off");
			btn.addClass("fa-volume-up");
			$(obj).removeClass("btn-disable");
			$(obj).addClass("btn-warning");
		}
	}

	function mute(obj){
		setMute(obj,!isMute(obj));
		update();
	}
	function init() {
		for ( var i = 0; i < config.length; i++ ) {
			if(config[i].type != "file"){
				$( "#laySrc" ).append( '<option value="' + config[ i ].id + '">' + config[ i ].name + '</option>' );
				$( "#vgasrc" ).append( '<option value="' + config[ i ].id + '">' + config[ i ].name + '</option>' );
				$( "#hdmisrc" ).append( '<option value="' + config[ i ].id + '">' + config[ i ].name + '</option>' );
				
			}
				
			if ( config[ i ].type != "mix" )
				continue;
			
			$( "#channels" ).append( '<option value="' + config[ i ].id + '">' + config[ i ].name + '</option>' );
			zcfg("#output",config[ i ]);
			
		}
		
		setInterval( show, 300 );

		$( "#channels" ).change( function () {
			setChannel( $( "#channels" ).val() );
		} );
		$( "#SysLayout" ).change( function () {
			curLayIndex=$( "#SysLayout" ).val();
			var defLay = defLays[curLayIndex];
            var temp = [];
            var type = false;
			for(var i=0;i<defLay.layouts.length;i++){
                var lay = defLay.layouts[i];
                if(lay.id < 0){
                    temp.push("-1");
                } else {
                    type = true;
                    temp.push(lay.id+"");
                }
            }
			var mixSrcV = mixCfg["srcV"];

			//如果自定义布局中存在指定输入源
			if(type){
                mixCfg["srcV"] = temp;
            }
			// for(var i=0;i<mixSrcV.length;i++){
			//     if( i >= temp.length)
			//         break;
            //     if(mixSrcV[i] == "-1")
            //         continue;
			//     var mark = false;
			//     for(var j=0;j<temp.length;j++){
			//         if(temp[j] == mixSrcV[i])
			//             mark = true;
            //     }
			//     if(!mark)
			//         temp[i] = mixSrcV[i];
            // }
			// mixCfg["srcV"] = temp;
			setLayout();
			update();
		} );
		setChannel($('#channels option:first').val() );
	}

	function setLayout()
	{
		var layout=SysLayout[curLayIndex];
		$("#userLay").val(JSON.stringify(layout).replace(/},{/g,"},\n{"));
		$("#layout").html('');
		for(var i=0;i<layout.length;i++){
			var lay=$("#templeLay").clone();
			
			lay.css("display","block");
			lay.css("left",(layout[i].x*100)+"%");
			lay.css("top",(layout[i].y*100)+"%");
			lay.css("width",(layout[i].w*100)+"%");
			lay.css("height",(layout[i].h*100)+"%");
			lay.css("z-index",i);
			
			var color=128;
			if(i%2==0){
				color+=25*(i/2);
			}
			else{
				color-=25*(i/2+1);
			}
			lay.css("background-color", "rgb("+color+","+color+","+color+")");
			lay.appendTo("#layout");
		}
		
		var srcA=mixCfg["srcA"];
		var srcV=mixCfg["srcV"];
		
		for(var i=0;i<srcV.length && i<$("#layout #templeLay").length;i++){
			$("#layout #templeLay").eq(i).find("#laySrc").val(srcV[i]);
			setMute($("#layout #templeLay").eq(i).find("button"),($.inArray(srcV[i], srcA)==-1) || srcV[i]==-1 );
		}
	}

	function setChannel( id ) {
		curChn = id;
		mixCfg = config[id];
		var str=JSON.stringify(mixCfg["layout"]);
		curLayIndex=6;
		for(var i=0;i<SysLayout.length;i++){
			if(JSON.stringify(SysLayout[i])==str)
			{
				$( "#SysLayout" ).val(i);
				curLayIndex=i;
			}
				
		}
		
		if(curLayIndex==6){
			$( "#SysLayout" ).val(6);
			SysLayout[6]=mixCfg["layout"];
		}
		setLayout();
	}

	function update()
	{
		var srcV=new Array();
		var srcA=new Array();
		for(var i=0;i<$("#layout #templeLay").length;i++){
			var id=$("#layout #templeLay").eq(i).find("#laySrc").val();
			if($.inArray(id, srcV)>=0 && id!=-1){
				$("#layout #templeLay").eq(i).find("#laySrc").val(-1);
				setMute($("#layout #templeLay").eq(i).find("button"),true);
				continue;
			}
			else
				srcV.push(id);
			if(!isMute($("#layout #templeLay").eq(i).find("button"))){
//				if(config[id].type!="vi")
//					setMute($("#layout #templeLay").eq(i).find("button"),true);
//				else
					srcA.push(id);
			}
				
		}
		mixCfg["srcA"]=srcA;
		mixCfg["srcV"]=srcV;
		mixCfg["layout"]=SysLayout[curLayIndex];
		save();
	}


	function snap() {
		rpc( "enc.snap" );
	}

	function show() {
		setTimeout( snap, 100 );
		$( "#snap" ).attr( "src", "snap/snap" + curChn + ".jpg?rnd=" + Math.random() );
	}

	$("#defLay").click(function () {
        $.confirm( {
            title: '<cn>布局</cn><en>Layout</en>',
            content: '<cn>是否打开布局管理器？</cn><en>Jump to Layout Manager?</en>',
            buttons: {
                ok: {
                    text: "<cn>打开</cn><en>Confirm</en>",
                    btnClass: 'btn-warning',
                    keys: [ 'enter' ],
                    action: function () {
                        window.location.href　= "defLayout.php";
                    }
                },
                cancel: {
                    text: "<cn>取消</cn><en>Cancel</en>"
                }

            }
        } );
    });


	function save() {
		rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
			if ( typeof ( data.error ) != "undefined" ) {
				htmlAlert( "#alert", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
			}
		} );
	}
	
	$( "#save" ).click( function ( e ) {
			rpc( "enc.update", [ JSON.stringify( config, null, 2 ) ], function ( data ) {
			if ( typeof ( data.error ) != "undefined" ) {
				htmlAlert( "#alertOut", "danger", "<cn>保存设置失败！</cn><en>Save config failed!</en>", "", 2000 );
			}
			else
				htmlAlert( "#alertOut", "success", "<cn>保存设置成功！</cn><en>Save config success!</en>", "", 2000 );
		} );
	} );

    $.ajaxSettings.async = false;
    $.getJSON( "config/defLays.json?rnd=" + Math.random(), function ( result ) {
        defLays = result;
        for(var i=0;i<defLays.length;i++){
            var defLay = defLays[i];
            var las = defLay.layouts;
            var layout = [];
            for(var j=0;j<las.length;j++) {
                layout.push(las[j].pos);
            }
            SysLayout.push(layout);
            $("#SysLayout").append("<option cn='"+defLay.layName+"' en='"+defLay.layNameEn+"' value='"+defLay.layId+"'></option>");
        }
    } );

	$.getJSON( "config/config.json?rnd=" + Math.random(), function ( result ) {
		config = result;
		init();
	} );
    $.ajaxSettings.async = true;

</script>
<?php
include( "foot.php" );
?>
