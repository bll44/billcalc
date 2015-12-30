@extends('_layouts.default')

@section('content')
<div class="row first-row">
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="cable-bill">Total cable Bill</label>
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{-- <input type="text" name="cable-bill" id="cable-bill" class="form-control bill-amount" placeholder="0.00" data-key="cable"> --}}
			<input type="text" name="cable-bill" id="cable-bill" class="form-control bill-amount" value="0.00" data-key="cable">
		</div>
		<button type="button" id="cable-split-btn" class="btn btn-primary btn-block split-btns" data-bill-input-id="cable-bill">Split cable Bill</button>
	</fieldset>
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="gas-bill">Total Gas Bill</label>
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{-- <input type="text" name="gas-bill" id="gas-bill" class="form-control bill-amount" placeholder="0.00" data-key="gas"> --}}
			<input type="text" name="gas-bill" id="gas-bill" class="form-control bill-amount" value="0.00" data-key="gas">
		</div>
		<button type="button" id="gas-split-btn" class="btn btn-primary btn-block split-btns" data-bill-input-id="gas-bill">Split Gas Bill</button>
	</fieldset>
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="water-bill">Total Water Bill</label>
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{-- <input type="text" name="water-bill" id="water-bill" class="form-control bill-amount" placeholder="0.00" data-key="water"> --}}
			<input type="text" name="water-bill" id="water-bill" class="form-control bill-amount" value="0.00" data-key="water">
		</div>
		<button type="button" id="water-split-btn" class="btn btn-primary btn-block split-btns" data-bill-input-id="water-bill">Split Water Bill</button>
	</fieldset>
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="electric-bill">Total Electric Bill</label>
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{{-- <input type="text" name="electric-bill" id="electric-bill" class="form-control bill-amount" placeholder="0.00" data-key="electric"> --}}
			<input type="text" name="electric-bill" id="electric-bill" class="form-control bill-amount" value="0.00" data-key="electric">
		</div>
		<button type="button" id="electric-split-btn" class="btn btn-primary btn-block split-btns" data-bill-input-id="electric-bill">Split Electric Bill</button>
	</fieldset>
	<fieldset class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
		<label for="num-persons">Number of people</label>
		<input type="number" name="num-persons" id="num-persons" class="form-control bill-selection-chkbox" min="1" value="1">
	</fieldset>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="input-group col-lg-4" id="results-input-group">
			<span class="input-group-addon" id="results-input-addon">$</span>
			<input id="results-text-bucket" class="form-control" placeholder="0.00" disabled="disabled">
		</div>
	</div>
</div>
{{-- /.row --}}

<div class="row">
	<div class="col-lg-12 col-md-12" id="control-panel-container">
		<button type="button" class="btn btn-danger" id="calculate-amounts-btn">Split All Bills</button>
		<button type="button" class="btn btn-default" id="clear-results-btn">Clear Results</button>
		<button type="button" class="btn btn-warning" id="save-trans-btn">Save Details</button>
	</div>
</div>
{{-- /.row --}}

<!-- Transaction history -->
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3 id="trans-history-title"><strong>Transaction History</strong></h3>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="transaction-history-table-container">
	<table class="table table-hover table-sm">
		<thead>
			<tr>
				<th>Date</th>
				<th>Cable</th>
				<th>Gas</th>
				<th>Water</th>
				<th>Electric</th>
				<th>Split</th>
				<th>Split amount</th>
				<th>Raw amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transaction_history as $trans)
			<tr>
				<td>{{ $trans->created_at }}</td>
				<td>{{ $trans->cable_amt }}</td>
				<td>{{ $trans->gas_amt }}</td>
				<td>{{ $trans->water_amt }}</td>
				<td>{{ $trans->electric_amt }}</td>
				<td>{{ $trans->num_people }} way</td>
				<td>{{ $trans->split() }}</td>
				<td>{{ $trans->raw_total }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
<!-- / Transaction history table -->
</div>
<!-- / Transaction history table container -->

</div>
<!-- /.row -->
@stop


@section('scripts')
<script type="text/javascript">

function getSplitByNum() {
	return parseInt($('#num-persons').val());
}

function calculateTotalBill() {
	var billCount = $('.bill-amount');
	var rawTotal = 0;
	$('.bill-amount').each(function() {
		rawTotal += parseFloat($(this).val());
	});
	splitAndPublish(rawTotal, true, 2);
}

function publish(data_string) {
	$('#results-text-bucket').val(data_string);
	// $('#results-text-bucket').addClass('form-control-success');
	$('#results-input-group').addClass('has-success');
	$('#results-text-bucket').addClass('text-success');
}

function splitAndPublish(value, is_fixed, length) {
	is_fixed = typeof is_fixed !== 'undefined' ? is_fixed : false;
	length = typeof length !== 'undefined' ? length : 0;
	var splitValue = value / getSplitByNum();
	if(is_fixed) {
		splitValue = splitValue.toFixed(length);
	}
	publish(splitValue);
}

$('#calculate-amounts-btn').click(function() {
	calculateTotalBill();
});

$('.split-btns').click(function() {
	var billInput = $('#' + $(this).data('bill-input-id'));
	var billAmount = billInput.val();
	splitAndPublish(billAmount, true, 2);
});

function clearResults() {
	$('#results-text-bucket').val('');
	$('#results-input-group').removeClass('has-success');
	$('#results-text-bucket').removeClass('text-success');
}

$('#clear-results-btn').click(function() { clearResults(); });

function saveTransactionDetails() {
	$('#save-trans-btn').html('<i class="fa fa-spin fa-circle-o-notch"></i>');
	var cable_amt, gas_amt, water_amt, num_persons,
		electric_amt, raw_total, price_per;

	var data = {};
	data.cable_amt = parseFloat($('#cable-bill').val());
	data.gas_amt = parseFloat($('#gas-bill').val());
	data.water_amt = parseFloat($('#water-bill').val());
	data.electric_amt = parseFloat($('#electric-bill').val());
	data.raw_total = parseFloat(data.cable_amt + data.gas_amt + data.water_amt + data.electric_amt);
	data.num_people = $('#num-persons').val();
	// var check_value = data.cable_amt + data.gas_amt + data.water_amt + data.electric_amt;

	// if total bills add up to 0 or less, it should not be saved to the database
	if(data.raw_total <= 0) {
		alert('Check those values before attempting to save this transaction. Something seems off.');
		$('#save-trans-btn').html('Save Transaction Details');
		return false;
	}
	
	// send data to be written to the database
	$.ajax({
		url: '{{ URL::to('transaction/store') }}',
		type: 'GET',
		data: data,
		dataType: 'json',
		statusCode: {
			500: function() {
				alert('500 internal server error when saving transaction details');
			},
			404: function() {
				alert('error 404 - page no longer exists?');
			}
		},
		success: function(data) {
			if(data.status == 200) {
				// if the transaction is logged successfully, reload the page
				// this will pull in the latest Transaction History table
				console.log('Transaction logged successfully');
				location.reload();
			}
		}
	});
}

$('#save-trans-btn').click(function() {
	saveTransactionDetails();
});

// dynamic calculations testing
$(document).ready(function() {
	// calculateTotalBill();
});

$('#num-persons').on('change', function() {
	calculateTotalBill();
});

$('.bill-amount').focusout(function() {
	calculateTotalBill();
});

</script>
@stop