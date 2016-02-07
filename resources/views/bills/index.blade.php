@extends('_layouts.default')

@section('content')

<h3>Bills</h3>
<div class="row">
	<div class="col-sm-12">
		<p>
			<strong>Filter:</strong> <a href="{{ URL::to('bills/manage/?filter=all') }}">All</a> | <a href="{{ URL::to('bills/manage/?filter=owned') }}">Owned</a>
		</p>
	</div>
</div>
{{-- /.row --}}
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover table-bordered" id="bill-listings-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Owner</th>
					<th>Residence</th>
					<th>Due date</th>
					<th>Amount <small>(if applicable)</small></th>
				</tr>
			</thead>
			<tbody>
			@foreach($bills as $bill)
				<tr>
					<td>{{ $bill->name }}</td>
					<td>{{ $bill->getOwner()->display_name }}</td>
					<td>{{ $bill->residence->nickname }}</td>
					<td>{{ date('M jS', strtotime($bill->due_date)) }}</td>
					<td>@if( ! is_null($bill->amount)){{ $bill->amount }}@else{{ 'N/A' }}@endif</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
{{-- /.row --}}

@stop