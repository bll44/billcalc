@extends('_layouts.default')

@section('content')

@include('residences/modals/add_resident_modal')
@include('residences/modals/proposeBillModal')
<meta name="residence_id" content="{{ $residence->id }}">

<h3>{{ $residence->nickname }}</h3>
<div class="row">
	<div class="col-md-4">
		<h3>Current Residents</h3>

		<div class="list-group">
		@foreach($residence->residents as $r)
			<li class="list-group-item">{{ $r->display_name }}</li>
		@endforeach
			<button type="button" class="list-group-item list-group-item-success" data-toggle="modal" data-target="#addResidentModal">
				+ Add Resident
			</button>
		</div>
	</div>
	{{-- /.column --}}
	<div class="col-md-4">
		<h3>Current Bills</h3>
		<div class="list-group">
		{{--@foreach($residence->bills as $b)--}}
			{{--<li class="list-group-item">{{ $b->name }}</li>--}}
		{{--@endforeach--}}
			<a href="{{ URL::to('bills/residence/' . $residence->id . '/create') }}" class="list-group-item list-group-item-warning">
				+ Propose new residence bill
			</a>
		</div>
		{{-- /.list-group --}}
	</div>
	{{-- /.column --}}
</div>
{{-- /.row --}}

@stop