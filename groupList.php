<div class="modal fade" id="grpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">
					<cn>群组设置同步</cn>
					<en>Group config sync</en>
				</h4>
			</div>
			<div class="modal-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Mac</th>
							<th>IP</th>
							<th>
								<cn>状态</cn>
								<en>Status</en>
							</th>
						</tr>
					</thead>
					<tbody id="grpList">
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" id="grpSync">
					<cn>开始同步</cn>
					<en>Start sync</en>
				</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<cn>关闭</cn>
					<en>Close</en>
				</button>
			</div>
		</div>
	</div>
</div>
<script>
	var grpList;

	function grpGetList() {
		rpc( "group.getList", null, function ( data ) {
			grpList=data;
			var html = '';
			for ( var i = 0; i < data.length; i++ ) {
				html += '<tr><td>' + data[ i ].mac + '</td>';
				html += '<td>' + data[ i ].ip + '</td>';
				html += '<td class="grpStatus"><i class="fa fa-ellipsis-h text-muted text-hide"></i><i class="fa fa-check text-success text-hide"></i><i class="fa fa-times text-danger text-hide"></i></td></tr>';
			}
			$( "#grpList" ).html( html );
		} );
	}

	function grpShow() {
		$( "#grpList" ).html( "" );
		$( '#grpModal' ).modal( 'show' );
		grpGetList();
	}

	function grpSetStatus( index, stat ) {
		$( "#grpList .grpStatus" ).eq( index ).find( "i" ).each( function ( i, e ) {
			if ( i != stat )
				$( this ).addClass( "text-hide" );
			else
				$( this ).removeClass( "text-hide" );
		} );
	}
</script>