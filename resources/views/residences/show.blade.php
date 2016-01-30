@extends('_layouts.default')

@section('content')

@include('residences/modals/add_resident_modal')
<meta name="residence_id" content="{{ $residence->id }}">

<h2 class=""></h2>
<div class="row">
	<div class="col-md-4">
		<h3>{{ $residence->nickname }}</h3>
		<h3>Residents</h3>

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
	<div class="col-md-8">
		<h3>Action History</h3>
		<div id="action-history-table-container">

			<table class="table table-bordered" id="action-history-table">
				<thead>

				</thead>
				<tbody>

				</tbody>
			</table>
			{{-- /#action-history-table --}}

		</div>
		{{-- /#action-history-table-container --}}
	</div>
	{{-- /.column --}}
</div>
{{-- /.row --}}

@stop