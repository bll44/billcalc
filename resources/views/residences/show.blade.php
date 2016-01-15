@extends('_layouts.default')

@section('content')

@include('residences/modals/add_resident_modal')

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
	<p>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addResidentModal">
			+ Add Resident
		</button>
	</p>
</div>

@stop