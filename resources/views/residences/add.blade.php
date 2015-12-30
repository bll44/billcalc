@extends('_layouts.default')


@section('content')

<h3>Add Residence</h3>

<form class="form-horizontal" method="POST" action="{{ URL::to('residences/store') }}">
	{!! csrf_field() !!}
	<div class="form-group">
		<label for="nickname" class="col-lg-2 control-label">Residence Nickname</label>
		<div class="col-lg-8">
			<input type="text" name="nickname" class="form-control" placeholder="Residence nickname">
		</div>
	</div>

	<div class="form-group">
		<label for="address" class="col-lg-2 control-label">Residence Address</label>
		<div class="col-lg-8">
			<input type="text" name="address" class="form-control" placeholder="Residence address">
		</div>
	</div>

	<div class="form-group">
		<label for="num_residents" class="col-lg-2 control-label">Total Occupants</label>
		<div class="col-lg-1">
			<input type="number" name="num_residents" class="form-control" placeholder="Total occupants">
		</div>
	</div>

	<div class="form-group">
		<label for="rent" class="col-lg-2 control-label">Total Monthly Rent</label>
		<div class="input-group col-lg-2">
			<span class="input-group-addon">$</span>
			<input type="text" name="rent" class="form-control" placeholder="Total monthly rent">
		</div>
	</div>

	<div class="form-group">
		<label for="form-submit" class="col-lg-2 control-label sr-only">Submit Form</label>
		<div class="col-lg-10">
			<button type="submit" class="btn btn-primary" name="form-submit">Add Residence</button>
		</div>
	</div>

</form>

@stop