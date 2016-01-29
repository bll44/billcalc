@extends('_layouts.default')


@section('content')

<h3>Add Residence</h3>

<form class="form-horizontal" method="POST" action="{{ URL::to('residences/store') }}">
	{!! csrf_field() !!}
	<div class="form-group">
		<label for="nickname" class="col-sm-2 control-label">Residence Nickname</label>
		<div class="col-sm-8">
			<input type="text" name="nickname" class="form-control" placeholder="Easy-To-Remember Name">
		</div>
	</div>

	<div class="form-group">
		<label for="address1" class="col-sm-2 control-label">Residence Address 1</label>
		<div class="col-sm-8">
			<input type="text" name="address1" class="form-control" placeholder="Street Address">
		</div>
	</div>

	<div class="form-group">
		<label for="address2" class="col-sm-2 control-label">Residence Address 2</label>
		<div class="col-sm-8">
			<input type="text" name="address2" class="form-control" placeholder="Apartment, Unit, Suite, etc.">
		</div>
	</div>

	<div class="form-group">
		<label for="city" class="col-sm-2 control-label">City</label>
		<div class="col-sm-8">
			<input type="text" name="city" class="form-control" placeholder="City">
		</div>
	</div>

	<div class="form-group">
		<label for="state" class="col-sm-2 control-label">State</label>
		<div class="col-sm-8">
			<select class="form-control" name="state">
				<option value="Alabama">Alabama</option>
				<option value="Alaska">Alaska</option>
				<option value="Arizona">Arizona</option>
				<option value="Arkansas">Arkansas</option>
				<option value="California">California</option>
				<option value="Colorado">Colorado</option>
				<option value="Connecticut">Connecticut</option>
				<option value="Delaware">Delaware</option>
				<option value="District of Columbia">District of Columbia</option>
				<option value="Florida">Florida</option>
				<option value="Georgia">Georgia</option>
				<option value="Hawaii">Hawaii</option>
				<option value="Idaho">Idaho</option>
				<option value="Illinois">Illinois</option>
				<option value="Indiana">Indiana</option>
				<option value="Iowa">Iowa</option>
				<option value="Kansas">Kansas</option>
				<option value="Kentucky">Kentucky</option>
				<option value="Louisiana">Louisiana</option>
				<option value="Maine">Maine</option>
				<option value="Maryland">Maryland</option>
				<option value="Massachusetts">Massachusetts</option>
				<option value="Michigan">Michigan</option>
				<option value="Minnesota">Minnesota</option>
				<option value="Mississippi">Mississippi</option>
				<option value="Missouri">Missouri</option>
				<option value="Montana">Montana</option>
				<option value="Nebraska">Nebraska</option>
				<option value="Nevada">Nevada</option>
				<option value="New Hampshire">New Hampshire</option>
				<option value="New Jersey">New Jersey</option>
				<option value="New Mexico">New Mexico</option>
				<option value="New York">New York</option>
				<option value="North Carolina">North Carolina</option>
				<option value="North Dakota">North Dakota</option>
				<option value="Ohio">Ohio</option>
				<option value="Oklahoma">Oklahoma</option>
				<option value="Oregon">Oregon</option>
				<option value="Pennsylvania">Pennsylvania</option>
				<option value="Rhode Island">Rhode Island</option>
				<option value="South Carolina">South Carolina</option>
				<option value="South Dakota">South Dakota</option>
				<option value="Tennessee">Tennessee</option>
				<option value="Texas">Texas</option>
				<option value="Utah">Utah</option>
				<option value="Vermont">Vermont</option>
				<option value="Virginia">Virginia</option>
				<option value="Washington">Washington</option>
				<option value="West Virginia">West Virginia</option>
				<option value="Wisconsin">Wisconsin</option>
				<option value="Wyoming">Wyoming</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="zipcode" class="col-sm-2 control-label">Zip Code</label>
		<div class="col-sm-3">
			<input type="number" name="zipcode" class="form-control" placeholder="12345">
		</div>
	</div>

	<div class="form-group">
		<label for="num_residents" class="col-sm-2 control-label">Total Occupants</label>
		<div class="col-sm-2">
			<input type="number" name="num_residents" class="form-control" placeholder="Total Occupants">
		</div>
	</div>

	<div class="form-group">
		<label for="rent" class="col-sm-2 control-label">Total Monthly Rent</label>
		<div class="col-sm-2">
			<input type="text" name="rent" class="form-control" placeholder="$$$/month">
		</div>
	</div>

	<div class="form-group">
		<label for="form-submit" class="col-sm-2 control-label sr-only">Submit Form</label>
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary" name="form-submit">Add Residence</button>
		</div>
	</div>

</form>

@stop