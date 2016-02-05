<div class="modal fade" tabindex="-1" role="dialog" id="proposeBillModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Propose new bill</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form class="form-horizontal" method="post" action="{{ URL::to('bill/store') }}"
				</div>
				{{-- /.row --}}
			</div>
			{{-- /.modal-body --}}
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->