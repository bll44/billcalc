<!DOCTYPE html>
<html lang="en">

@include('_layouts._partials.header')

<body>

	@yield('styles')
	
	<div class="container">
		
		@yield('content')

	</div>

	@yield('scripts')

</body>

@include('_layouts._partials.footer')

</html>