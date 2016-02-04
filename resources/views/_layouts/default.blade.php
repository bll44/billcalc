<!DOCTYPE html>
<html lang="en">

@include('_layouts._partials.header')

<body>

	@yield('styles')

	@include('_layouts._navigation.default_nav')
	
	<div class="container">
		
		@yield('content')

	</div>

	@yield('scripts')
<script type="text/javascript">
$(document).ready(function() {
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': csrf_token }
	});
});
</script>
</body>

@include('_layouts._partials.footer')

</html>