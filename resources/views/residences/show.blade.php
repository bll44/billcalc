@extends('_layouts.default')

@section('content')

@include('residences/modals/add_resident_modal')
<meta name="residence_id" content="{{ $residence->id }}">

<div class="row">
	<div class="col-md-6">
		<h3>Residence</h3>
		{{ $residence->nickname }}
	</div>
	{{-- /.column 6-1-1 --}}
	<div class="col-md-6">
		<h3>Bound Residents</h3>
		@foreach($residence->residents as $m)
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
	{{-- /.column 6-2-1 --}}
</div>
{{-- /.row 1 --}}
<div class="row">
	<h3>Outstanding Achievemnts</h3>
	<div class="col-md-12">

		<table class="table table-bordered">
			<thead>
			</thead>
			<tbody>
			</tbody>
		</table>

	</div>
	{{-- /.column 12-1 --}}

</div>
{{-- /.row 2 --}}
@stop