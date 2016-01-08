@extends('_layouts.default')

@section('content')

<h1>Residences</h1>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div>
			<a href="{{ URL::to('residences/new') }}">Add Residence</a>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div id="existing-residences-container">
			<ul class="list-group">
				@foreach($residences as $r)
				<a href="{{ URL::to('residences') . '/' . $r->id }}">
					<li class="list-group-item">
						<p><strong>{{ $r->nickname }}</strong></p>
						<p>{{ $r->address }}</p>
					</li>
				</a>
				@endforeach
			</ul>
		</div>
	</div>
</div>



</div>

@stop