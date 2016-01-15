@extends('_layouts.default')

@section('content')

<form id="user-registration-form" method="post" action="{{ URL::to('auth/register') }}" class="form-horizontal">
	{!! csrf_field() !!}
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" name="name" class="form-control" id="input-name" placeholder="Name">
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-10">
			<input type="text" name="username" class="form-control" id="input-username" placeholder="Username">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" name="email" class="form-control" id="input-email" placeholder="Email address">
		</div>
	</div>
	<div class="form-group">
		<label for="phone" class="col-sm-2 control-label">Phone</label>
		<div class="col-sm-10">
			<input type="text" name="phone" class="form-control" id="input-phone" placeholder="Phone #">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
			<input type="password" name="password" class="form-control" id="input-password" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<label for="password_confirmation" class="col-sm-2 control-label">Confirm Password</label>
		<div class="col-sm-10">
			<input type="password" name="password_confirmation" class="form-control" id="input-password-confirmation" placeholder="Confirm Password">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2">&nbsp;</label>
		<div class="col-sm-10">
			<button type="submit" id="register-submit-btn" class="btn btn-primary">Register</button>
		</div>
	</div>


</form>

@stop