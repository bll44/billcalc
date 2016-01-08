@extends('_layouts.default')

@section('content')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<input type="hidden" name="residence" id="residence-id" value="{{ $residence->id }}">
		<select name="month" id="month-selector" class="form-control">
			@for($i = 12; $i >= 1; $i--)
			<option value="{{ strtolower(date('F', strtotime($i . '/01/1970'))) }}">
				{{ date('F', strtotime($i . '/01/1970')) }}
			</option>
			@endfor
		</select>
	</div>
</div>

@stop

@section('scripts')

<script>

$('#month-selector').change(function() {
	var url = '{{ URL::to("bills/month") }}';
	var month = $(this).val();
	var residence_id = $('#residence-id').val();
	var year = 2015;
	$.ajax({
		url: url,
		type: 'GET',
		data: { month_of: month, year_of: year, residence: residence_id }
	}).done(function(data) {
		console.log(data);
	});
});

</script>

@stop