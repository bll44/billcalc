@extends('_layouts.default')

@section('styles')
<style type="text/css">

body { padding-top: 40px; }
.split-btns { margin-top: 5px; }
#calculate-amounts-btn { margin-top: 5px; }
#temp-default-vals { color: #00b5ff; }
#results-text-bucket { font-size: 32pt; width: 300px; }
#num-persons { width: 100px; }
#clear-results-btn { margin-top: 5px; }
#clear-results-btn, #calculate-amounts-btn {
	width: 150px;
}
.border-test { border: 1px solid green; }
#results-input-addon { font-size: 32pt; }
#results-input-group { margin-top: 15px; }
</style>
@stop

@section('content')
<p id="temp-default-vals"><i><strong>Default values in inputs are temporary for testing</strong></i></p>
<div class="row">
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="verizon-bill">Total Verizon Bill</label>
		<input type="text" name="verizon-bill" id="verizon-bill" class="form-control bill-amount" value="182.57" data-key="verizon">
		<button type="button" id="verizon-split-btn" class="btn btn-sm btn-primary btn-block split-btns" data-bill-input-id="verizon-bill">Split Verizon Bill</button>
	</fieldset>
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="gas-bill">Total Gas Bill</label>
		<input type="text" name="gas-bill" id="gas-bill" class="form-control bill-amount" value="14.61" data-key="gas">
		<button type="button" id="gas-split-btn" class="btn btn-sm btn-primary btn-block split-btns" data-bill-input-id="gas-bill">Split Gas Bill</button>
	</fieldset>
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="water-bill">Total Water Bill</label>
		<input type="text" name="water-bill" id="water-bill" class="form-control bill-amount" value="90.37" data-key="water">
		<button type="button" id="water-split-btn" class="btn btn-sm btn-primary btn-block split-btns" data-bill-input-id="water-bill">Split Water Bill</button>
	</fieldset>
	<fieldset class="form-group col-md-2 col-sm-12 col-xs-12">
		<label for="electric-bill">Total Electric Bill</label>
		<input type="text" name="electric-bill" id="electric-bill" class="form-control bill-amount" value="99.83" data-key="electric">
		<button type="button" id="electric-split-btn" class="btn btn-sm btn-primary btn-block split-btns" data-bill-input-id="electric-bill">Split Electric Bill</button>
	</fieldset>
	<fieldset class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
		<label for="num-persons">Number of people</label>
		<input type="number" name="num-persons" id="num-persons" class="form-control bill-selection-chkbox" min="1" value="1">
	</fieldset>
</div>
<!-- /.row -->
<!-- <div class="row">
	<div id="result-container" class="col-lg-8 col-md-8 col-xs-12">
		<input id="results-text-bucket" class="form-control" placeholder="Results...">
		<textarea id="results-text-bucket" class="form-control" placeholder="Results will dipslay here..."></textarea>
	</div>
</div> -->
<!-- /.row -->
<!-- /#result-container -->
<div class="row">
	<fieldset class="col-lg-12 col-md-12">
		<button type="button" class="btn btn-danger" id="calculate-amounts-btn">Split All Bills</button>
		<button type="button" class="btn btn-default" id="clear-results-btn">Clear Results</button>
	</fieldset>
	<div class="input-group col-lg-12" id="results-input-group">
		<span class="input-group-addon" id="results-input-addon">$</span>
		<input id="results-text-bucket" class="form-control" placeholder="0.00">
	</div>
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

</script>
@stop