@extends('_layouts.default')

@section('content')

<h3>Bill Manager</h3>


<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	<h4>Residences</h4>
	<ul class="list-group">
		@foreach($residences as $r)
		<a href="{{ URL::to('bills/view') . '?residence=' . $r->id }}">
			<li class="list-group-item">
				<h4>{{ $r->nickname }}</h4>
				<small>{{ $r->address }}</small>
			</li><!-- /.list-group-item -->
		</a>
		@endforeach
	</ul><!-- /.list-group -->
</div><!-- /.column -->

<div class="col-lg-offset-2 col-md-offset-2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<h4>Outstanding Bills</h4>
</div><!-- /.column -->

@stop