<nav class="navbar navbar-inverse">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::to('/home/calc') }}"><strong>BillCalc</strong></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav" id="default-nav-left">
				@if(Auth::check())
					<li><a href="{{ URL::to('residences') }}">My Residences</a></li>
					<li><a href="{{ URL::to('bills/manage') }}">My Bills</a></li>
				@endif
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" id="global-search-input" placeholder="Search for anything">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right" id="default-nav-right">
				@if( ! Auth::check())
					<li><a href="{{ URL::to('auth/login') }}">Login</a></li>
					<li><a href="{{ URL::to('auth/register') }}">Register</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->display_name }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							@if(Auth::check())
							<li><a href="{{ URL::to('account/manage') . '/' . Auth::user()->username }}">Manage Account</a></li>
							<li><a href="{{ URL::to('venmo/logout') }}">Logout</a></li>
							@endif
						</ul>
					</li>
				@endif				
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>

@include('Auth.modals.auth_modal');