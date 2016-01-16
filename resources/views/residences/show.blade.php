@extends('_layouts.default')

@section('content')

@include('residences/modals/add_resident_modal')
<meta name="residence_id" content="{{ $residence->id }}">

<h2 class="">{{ }}</h2>
<div class="row">
	<div class="col-md-4">
		<h3>Residence</h3>
		{{ $residence->nickname }}
	</div>
	{{-- /.column 6-1-1 --}}
	<div class="col-md-4">
		<!-- <h3>Bills due in &lt;MONTH&gt;</h3> -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Bills due in &lt;MONTH&gt;</h3>
			</div>
			<div class="panel-body">
				Panel content
			</div>
		</div>
	</div>
	<div class="col-md-4">
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
{{-- /.row --}}

@stop