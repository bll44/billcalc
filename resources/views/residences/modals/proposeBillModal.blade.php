<div class="modal fade" tabindex="-1" role="dialog" id="proposeBillModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Propose new bill</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<form class="form-horizontal" method="post" action="{{ URL::to('bills/store') }}" id="propose-new-bill-form">
							{!! csrf_field() !!}
							<input type="hidden" name="resident_id" value="{{ Auth::user()->id }}">
							<input type="hidden" name="residence_id" value="{{ $residence->id }}">
							<div class="form-group">
								<label for="resident_display" class="control-label">Resident owner of this bill</label>
								<input type="text" class="form-control" value="{{ Auth::user()->display_name }}" disabled="disabled">
							</div>
							<div class="form-group">
								<label for="residence_display" class="control-label">Associated residence</label>
								<input type="text" class="form-control" value="{{ $residence->nickname }}" disabled="disabled">
							</div>
							<div class="form-group">
								<label for="bill_name" class="control-label">Name</label>
								<input type="text" name="bill_name" class="form-control" placeholder="Name of the bill">
							</div>
							<div class="form-group">
								<label for="bill_amount" class="control-label">Amount <small class="text-muted">(if static)*</small></label>
								<input type="text" name="bill_amount" class="form-control" placeholder="Amount of bill if static">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="not_static_checkbox"> Amount is not static for this bill
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
									<label for="bill_due_date" class="control-label">Active month</label>
									<select name="bill_due_date_month" class="form-control">
										<option value="1">January</option>
										<option value="2">February</option>
										<option value="3">March</option>
										<option value="4">April</option>
										<option value="5">May</option>
										<option value="6">June</option>
										<option value="7">July</option>
										<option value="8">August</option>
										<option value="9">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
									</div>
									<div class="col-sm-6">
									<label for="bill_due_date_year" class="control-label">Year</label>
									<select name="bill_due_date_year" class="form-control">
										<option value="2016">2016</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
									</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="bill_description" class="control-label">Description <small class="text-muted">(optional)</small></label>
								<textarea name="bill_description" class="form-control" placeholder="Description of the bill (optional)"></textarea>
							</div>
						</form>
					</div>
				</div>
				{{-- /.row --}}
				<p class="pull-left"><small>* Static meaning if the amount of the bill will not change month-to-month</small></p>
			</div>
			{{-- /.modal-body --}}
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="submit-new-bill-form-btn">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

$('#not_static_checkbox').click(function() {
	if($(this).is(':checked')) {
		$('input[name="bill_amount"]').attr('disabled', 'disabled');
	}
	else {
		$('input[name="bill_amount"]').removeAttr('disabled');
	}
});

$('#submit-new-bill-form-btn').click(function() {
	$('#propose-new-bill-form').submit();
});

</script>