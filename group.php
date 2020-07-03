<?php
include( "head.php" );
include( "groupList.php" );
?>
<div class="modal fade" id="netConfig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">
					<cn>网络设置</cn>
					<en>Network config</en>
				</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="net" role="form">
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
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" onclick="setNetwork();">
					<cn>保存</cn>
					<en>Save</en>
				</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<cn>关闭</cn>
					<en>Close</en>
				</button>
			</div>
		</div>
	</div>
</div>
<div id="alert"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>群组列表</cn>
					<en>Group list</en>
				</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Mac</th>
							<th>IP</th>
							<th>
								<cn>设备型号</cn>
								<en>Device</en>
							</th>
							<th>
								<cn>软件版本</cn>
								<en>APP version</en>
							</th>
							<th>
								<cn>频道</cn>
								<en>Channels</en>
							</th>
							<th>
								<cn>操作</cn>
								<en>Operation</en>
							</th>
						</tr>
					</thead>
					<tbody id="groupList">
					</tbody>
				</table>
				<form class="form-inline" id="group">
					<div class="form-group">
						<label for="groupId">
							<cn>分组ID</cn>
							<en>Group ID</en>
						</label>
						<input type="text" class="form-control" id="groupId" zcfg="groupId" placeholder="">
					</div>
					<button type="button" class="btn btn-warning" onclick="updateGroup();">
						<cn>保存</cn>
						<en>Save</en>
					</button>
					<button type="button" id="research" class="btn btn-warning ">
						<cn>重新搜索</cn>
						<en>Search again</en>
					</button>
				</form>

			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<cn>频道表汇总</cn>
					<en>Channel collect</en>
				</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>
								<cn>序号</cn>
								<en>Number</en>
							</th>
							<th>
								<cn>频道名称</cn>
								<en>Channel name</en>
							</th>
							<th>URL</th>
							<th>
								<cn>排序</cn>
								<en>Sequence</en>
							</th>
						</tr>
					</thead>
					<tbody id="epgList">
					</tbody>
				</table>
				<form class="form-inline" id="group">
					<button type="button" class="btn btn-warning" onclick="getEPG();">
						<cn>汇总</cn>
						<en>Collect</en>
					</button>
					<button type="button" class="btn btn-warning" onclick="createEPG();">
						<cn>生成节目单</cn>
						<en>Create EPG</en>
					</button>
					<button type="button" class="btn btn-warning" onclick="syncEPG();">
						<cn>同步节目单</cn>
						<en>Sync EPG</en>
					</button>
					<a type="button" role="button" class="btn btn-default" href="config/epg.json" target="_blank">
						<cn>查看节目单</cn>
						<en>Show EPG</en>
					</a>
				</form>
				<div id="alertEPG"></div>
			</div>
		</div>
	</div>
</div>
<script src="js/zcfg.js"></script>
<script type="text/javascript" language="javascript" src="js/confirm/jquery-confirm.min.js"></script>
<script>
	var netConfig;
	var groupConfig;
	var curMac = "";

	function updateGroup() {
		rpc( "group.update", [ groupConfig ], function ( data ) {
			$( "#research" ).click();
		} );
	}

	function setNetwork() {
		rpc( "group.callSetNetwork", [ curMac, netConfig ] );
	}

	function reboot( mac ) {
		$.confirm( {
			title: '<cn>重启</cn><en>Reboot</en>',
			content: '<cn>是否立即重启系统？</cn><en>Reboot immediately?</en>',
			buttons: {
				ok: {
					text: "<cn>确认重启</cn><en>Confirm</en>",
					btnClass: 'btn-warning',
					keys: [ 'enter' ],
					action: function () {
						rpc( "group.callReboot", [ mac ] );
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

	}

	function getNetwork( mac ) {
		$( '#netConfig' ).modal( 'show' );
		curMac = mac;
		rpc( "group.callGetNetwork", [ mac ], function ( data ) {
			netConfig = data;
			zcfg( "#net", netConfig );
		} );
	}

	function showEPG( data ) {
		epgOrder = new Array();
		var html = '';
		for ( var i = 0; i < data.length; i++ ) {
			epgOrder.push( data[ i ].id );
			html += '<tr><td>' + ( i + 1 ) + '</td>';
			html += '<td>' + data[ i ].name + '</td>';
			html += '<td>' + data[ i ].url + '</td>';
			html += '<td><button type="button" onclick="epgSwap(0,'+i+');" class="btn btn-sm btn-default "><cn>置顶</cn><en>Top</en></button> ';
			html += '<button type="button" onclick="epgSwap('+(i-1)+','+i+');"" class="btn btn-sm btn-warning "><i class="fa fa-arrow-up"></i></button> ';
			html += '<button type="button" onclick="epgSwap('+(i+1)+','+i+');" class="btn btn-sm btn-warning "><i class="fa fa-arrow-down"></i></button> ';
			html += '<button type="button" onclick="epgSwap('+(data.length-1)+','+i+');" class="btn btn-sm btn-default "><cn>置底</cn><en>Bottom</en></button></td>';
			html += '</tr>';
		}
		$( "#epgList" ).html( html );
	}

	var epgOrder;

	function getEPG() {

		rpc( "group.callGetEPG", null, function ( data ) {
			showEPG( data );
		} );
	}
	
	function createEPG() {

		rpc( "group.createEPG", null, function ( data ) {
			if(data)
				htmlAlert( "#alertEPG", "success", "<cn>生成节目单成功</cn><en>Create EPG success</en>！", "", 2000 );
		} );
	}
	
	function syncEPG() {
			grpShow();
	}

	function epgSwap( a, b ) {
		if(a<0 || b>=epgOrder.length)
			return;
			
		var t = epgOrder[ a ];
		epgOrder[ a ] = epgOrder[ b ];
		epgOrder[ b ] = t;

		rpc( "group.orderEPG", [ epgOrder ], function ( data ) {
			showEPG( data );
		} );
	}


	$( function () {
		navIndex( 5 );
		$.getJSON( "config/group.json", function ( result ) {
			groupConfig = result;
			zcfg( "#group", groupConfig );
		} );

		function getList() {
			rpc( "group.getList", null, function ( data ) {
				var currentHtml = $( "#groupList" ).html();
				var html = '';
				for ( var i = 0; i < data.length; i++ ) {
					if ( data[ i ].info == undefined )
						continue;
					html += '<tr><td>' + data[ i ].mac + '</td>';
					html += '<td>' + data[ i ].ip + '</td>';
					
					if(data[ i ].version && data[ i ].type){
						html += '<td>' + data[ i ].type + '</td>';
						html += '<td>' + data[ i ].version.app + '<br/>' + data[ i ].version.sdk + '</td>';
					}
					else{
						html += '<td></td>';
						html += '<td></td>';
					}
					
					html += '<td>' + data[ i ].info.join() + '</td>';
					html += '<td><button type="button" onclick="getNetwork(\'' + data[ i ].mac + '\')" class="btn btn-sm btn-warning "><cn>网络设置</cn><en>Network config</en></button> <button type="button" onclick="reboot(\'' + data[ i ].mac + '\')" class="btn btn-sm btn-danger "><cn>重启</cn><en>Reboot</en></button></td></tr>';
				}
				if ( currentHtml != html )
					$( "#groupList" ).html( html );
			} );
		}
		getList();
		setInterval( getList, 3000 );

		$( "#research" ).click( function ( e ) {
			rpc( "group.clearMember" );
			$( "#groupList" ).html( '' );
		} );
		
		
		$( "#grpSync" ).click( function ( e ) {
			for ( var i = 0; i < grpList.length; i++ ) {
				grpSetStatus( i, 0 );
				rpc( "group.callSyncEPG", [ grpList[ i ].mac ], function ( data, index ) {
					grpSetStatus( index, data ? 1 : 2 );
				}, i );
			}
		} );



	} );
</script>
<?php
include( "foot.php" );
?>