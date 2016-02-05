@extends('_layouts.default')

@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
	@foreach($errors->all() as $e)
		<p>{{ $e }}</p>
	@endforeach
</div>
@endif

<div class="row">
	<div class="col-sm-offset-1 col-sm-10">
		<h4 class="page-title">Propose New Residence Bill</h4>

		<form class="form-horizontal" method="post" action="{{ URL::to('bills/store') }}">
			{!! csrf_field() !!}
			<input type="hidden" name="resident_id" value="{{ Auth::user()->id }}">
			<input type="hidden" name="residence_id" value="{{ $residence->id }}">
			<div class="form-group">
				<label for="resident_placeholder" class="control-label">Resident Owner of bill</label>
				<input type="text" name="resident_placeholder" class="form-control" disabled="disabled" value="{{ Auth::user()->display_name }}">
			</div>
			<div class="form-group">
				<label for="residence_placeholder" class="control-label">Associated residence</label>
				<input type="text" name="residence_placeholder" class="form-control" disabled="disabled" value="{{ $residence->nickname }}">
			</div>
			<div class="form-group">
				<label for="name" class="control-label">Name of bill</label>
				<input type="text" name="name" class="form-control" placeholder="Verizon cable, PGW Gas, etc.">
			</div>
			<div class="form-group">
				<label for="amount" class="control-label">Amount of bill per month</label>
				<input type="text" name="amount" class="form-control" placeholder="Amount of bill per month">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="amount_varies"> Varying Amount
					</label>
				</div>
			</div>
			<div class="form-group" id="vary_description_group">
				<label for="vary_description">Varying description (optional)</label>
				<textarea name="vary_description" class="form-control" placeholder="(Optional) About how much does the bill vary?"></textarea>
			</div>

			<div class="form-group">
				<label for="due_day" class="control-label">Due day of the month</label>
				<select class="form-control" name="due_day_code">
					<option value="EOM">Due at the end of each month</option>
					<option value="MOM">Due on the 15th of each month</option>
					<option value="CDOM">Custom Day</option>
				</select>
			</div>
			<div class="form-group custom-hidden" id="day_of_month_container">
				<label for="day_of_month" class="control-label">Day of the month</label>
				<input type="number" class="form-control" name="day_of_month" min="1" max="28" placeholder="Maximum of the 28th">
			</div>

			<div class="checkbox form-checkbox">
				<label>
					<input type="checkbox" name="recurring"> Recurring
				</label>
			</div>

			<div class="form-group">
				<label for="" class="control-label sr-only"></label>
				<input type="submit" value="Propose new bill" class="btn btn-primary">
			</div>
		</form>
	</div>
</div>
{{-- /.row --}}

@stop

@section('scripts')

<script type="text/javascript">

$(function() {	$('input[type="submit"]').parent().css('margin-top', '15px') });

// $('input[name="amount_varies"]').click(function() {
// 	if($(this).is(':checked')) {
// 		$('input[name="amount"]').attr('disabled', 'disabled');
// 		$('#vary_description_group').removeClass('custom-hidden');
// 		$('textarea[name="vary_description"]').focus();
// 	}
// 	else {
// 		$('input[name="amount"]').removeAttr('disabled');
// 		if( ! $('vary_description_group').hasClass('custom-hidden')) {
// 			$('#vary_description_group').addClass('custom-hidden');
// 		}
// 	}
// });

// textarea variable
var ta = $('textarea[name="vary_description"]');
var charCount = 0;
ta.on('keyup', function(key) {
	console.log(ta.val().length);
	if(ta.val().length > 150) {
		ta.val(ta.val().substring(0, 150));
	}
});

$('select[name="due_day"]').change(function() {
	if($(this).val() == 3) {
		$('#day_of_month_container').removeClass('custom-hidden');
	}
	else {
		if( ! $('#day_of_month_container').hasClass('custom-hidden')) {
			$('#day_of_month_container').addClass('custom-hidden');
		}
	}
});

</script>

@stop