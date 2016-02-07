@extends('_layouts.default')

@section('content')

<h3>Bills</h3>


<div class="row">
	<div class="col-sm-12">
		<table class="table" id="bill-listings-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Owner</th>
					<th>Residence</th>
					<th>Amount <small>(if applicable)</small></th>
					<th>Due date</th>
					<th>Active status</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
			@foreach($bills as $bill)
				<tr>
					<td>{{ $bill->name }}</td>
					<td>{{ Resident::find($bill->resident_id)->display_name }}</td>
					<td>{{ Residence::find($bill->residence_id)->nickname }}</td>
					<td>@if( ! is_null($bill->amount)){{ $bill->amount }}@endif</td>
					<td>{{ date('M dS') }}</td>
					<td>@if($bill->active){{ 'Yes' }}@else{{ 'No' }}@endif</td>
					<td>{{ $bill->description }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop