<div class="modal fade" tabindex="-1" role="dialog" id="proposeBillModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Propose New Residence Bill</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form class="form-horizontal" method="post" action="{{ URL::to('') }}">
						<div class="form-group">
							<label for="name" class="control-label">Resident Owner of bill</label>
							<input type="text" class="form-control" disabled="disabled" value="{{ Auth::user()->display_name }}">
							<input type="hidden" name="resident_id" value="{{ Auth::user()->id }}">
						</div>
						<div class="form-group">
							<label for="name" class="control-label">Associated residence</label>
							<input type="text" class="form-control" disabled="disabled" value="{{ $residence->nickname }}">
							<input type="hidden" name="residence_id" value="{{ $residence->id }}">
						</div>
						<div class="form-group">
							<label for="name" class="control-label">Name of bill</label>
							<input type="text" name="bill_name" class="form-control" placeholder="Verizon cable, PGW Gas, etc.">
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="recurring" value="1"> Recurring
							</label>
						</div>
					</form>
					{{-- /.bill-proposition-form --}}
				</div>
				{{-- /.row --}}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="propose-bill-form-submit-btn" class="btn btn-primary">Propose Bill</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

$('#propose-bill-form-submit-btn').click(function() {
	event.preventDefault();
	alert('Form submitted');
});

</script>