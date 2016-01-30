@extends('_layouts.default')

@section('content')

<form id="user-login-form" method="post" action="{{ URL::to('auth/login') }}" class="form-horizontal">
	{!! csrf_field() !!}
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-8">
			<input type="text" autofocus="autofocus" name="username" class="form-control" id="input-username" placeholder="Username">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-8">
			<input type="password" name="password" class="form-control" id="input-password" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2">&nbsp;</label>
		<div class="col-sm-8">
			<button type="submit" id="login-submit-btn" class="btn btn-primary">Login</button>
		</div>
	</div>


</form>

@stop