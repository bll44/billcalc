<!DOCTYPE html>
<html lang="en">

@include('_layouts._partials.header')

<body>

	@yield('styles')
	@include('_layouts._navigation.default_nav')
	<div class="container">
		<h1>BillCalc</h1>
		@yield('content')

	</div>

	@yield('scripts')

</body>

@include('_layouts._partials.footer')

</html>