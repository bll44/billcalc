@extends('_layouts.default')

@section('content')

@include('residences.modals.add_resident_modal')
@include('residences.modals.proposeBillModal')
<meta name="residence_id" content="{{ $residence->id }}">
<meta name="resident_id" content="{{ Auth::user()->id }}">

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
	<div class="col-md-4" id="current-bills-container">
		<h3>Current Bills</h3>
		<div class="list-group">
		@foreach($residence->bills as $b)
			@if( ! $b->active && ! in_array($b->id, $approved_bills))
				<li class="list-group-item text-danger">
					{{ $b->name }} <a href="{{ URL::to('bills/approve/' . $b->id . '/' . $residence->id) }}" class="pull-right"><span class="badge badge-approval">Approve</span></a>
				</li>
			@elseif( ! $b->active && in_array($b->id, $approved_bills))
				<li class="list-group-item text-danger">{{ $b->name }} <span class="badge">Already approved</span></li>
			@else
				<li class="list-group-item">{{ $b->name }} <span class="badge">Active</span></li>
			@endif
		@endforeach
			<button type="button" class="list-group-item list-group-item-warning" data-toggle="modal" data-target="#proposeBillModal">
				+ Propose new residence bill
			</button>

		</div>
		{{-- /.list-group --}}
	</div>
	{{-- /.column --}}
</div>
{{-- /.row --}}

@stop

@section('scripts')

<script type="text/javascript">

</script>

@stop