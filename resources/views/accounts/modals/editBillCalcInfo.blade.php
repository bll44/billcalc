<!-- Modal -->
<div class="modal fade" id="editBillCalcInfo" tabindex="-1" role="dialog" aria-labelledby="editBillCalcInfoLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">BillCalc Information</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ URL::to('account/update') }}" class="form-horizontal" id="edit-billcalc-info-form">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="displayName">Name</label>
						<input type="text" name="displayName" class="form-control" placeholder="Display name" value="{{ $user->display_name }}">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email address" value="{{ $user->email }}">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" name="phone" class="form-control" placeholder="Phone number" value="{{ $user->phone }}">
					</div>
				</form>
			</div>
			{{-- /.modal-body --}}
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="submit-billcalc-form" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$('#submit-billcalc-form').click(function() {
	$('#edit-billcalc-info-form').submit();
});

$('#password-reset-btn').click(function() {
	$('input[name="reset-password"]').val('true');
	$('#password-reset-fields').show();
});

</script>