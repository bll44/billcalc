@extends('_layouts.default')

@section('content')

<div class="col-sm-offset-1 col-sm-10">
	@if(session('loginError'))
		<div class="alert alert-warning">
			{{ session('loginError') }}
		</div>
	@endif
	<form id="user-login-form" method="post" action="{{ URL::to('auth/login') }}" class="form-horizontal">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label large-input-label">Username</label>
			<div class="col-sm-8">
				<input type="text" autofocus="autofocus" name="username" class="form-control input-lg" id="input-username" placeholder="Username">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label large-input-label">Password</label>
			<div class="col-sm-8">
				<input type="password" name="password" class="form-control input-lg" id="input-password" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2">&nbsp;</label>
			<div class="col-sm-8">
				<button type="submit" id="login-submit-btn" class="btn btn-primary btn-lg">Login</button>
			</div>
		</div>
	</form>
</div>

@stop