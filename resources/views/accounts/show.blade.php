@extends('_layouts.default')

@section('content')

<h2>{{ $user->display_name }}</h2>


<div class="row">
	<div class="col-sm-8">
		<h4>BillCalc Information <i id="edit-account-info-trigger" class="fa fa-pencil-square-o clickable"></i></h4>
		<table class="table">
			<thead>
				<th>Item</th>
				<th>Value</th>
			</thead>
			<tr>
				<td><strong>Username</strong></td>
				<td>{{ $user->username }}</td>
			</tr>
			<tr>
				<td><strong>Email</strong></td>
				<td>{{ $user->email }}</td>
			</tr>
			<tr>
				<td><strong>Phone</strong></td>
				<td>{{ $user->phone }}</td>
			</tr>
			<tr>
				<td><strong>Password</strong></td>
				<td>***********&nbsp;<a id="password-reset-edit-link">Reset</a></td>
			</tr>
		</table>
	</div>
	{{-- /.column --}}
</div>
{{-- /.row --}}

<div class="row">
	<div class="col-sm-8">
		<h4>Venmo Account Details <i id="venmo-account-details-trigger-refresh" class="fa fa-refresh clickable"></i></h4>
		<table class="table">
			<thead>
				<th>Item</th>
				<th>Value</th>
			</thead>
			<tr>
				<td><strong>Venmo ID</strong></td>
				<td><i>null</i></td>
			</tr>
			<tr>
				<td><strong>Venmo Email</strong></td>
				<td>{{ $user->email }}</td>
			</tr>
			<tr>
				<td><strong>Venmo Phone</strong></td>
				<td>{{ $user->phone }}</td>
			</tr>
			<tr>
				<td><strong>Venmo Account Balance</strong></td>
				<td>$10.73</td>
			</tr>
		</table>
	</div>
	{{-- /.column --}}
</div>
{{-- /.row --}}

@include('accounts.modals.editBillCalcInfo')
@include('accounts.modals.inAppPasswordReset')
{{--@include('accounts.modals.editVenmoDetailsInfo')--}}

@stop

@section('scripts')

<script type="text/javascript">

$('#edit-account-info-trigger').click(function() {
	$('#editBillCalcInfo').modal('show');
});

$('#venmo-account-details-trigger-refresh').click(function() {
	alert('starts spinning and then does not stop for now');
	$(this).addClass('fa-spin');
});

$('#password-reset-edit-link').click(function() {
	$('#passwordResetModal').modal('show');
});

</script>

@stop