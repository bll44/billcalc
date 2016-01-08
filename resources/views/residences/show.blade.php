@extends('_layouts.default')

@section('content')

<div class="col-md-6">
	<h3>Residence</h3>
	{{ $residence->nickname }}
</div>

<div class="col-md-6">
	<h3>Residence Members</h3>
	@foreach($members as $m)
	<p>
	{{ $m->display_name }}
	</p>
	@endforeach
</div>

@stop