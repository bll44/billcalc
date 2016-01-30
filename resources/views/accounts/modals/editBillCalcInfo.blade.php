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

					<input type="hidden" name="resetPassword" value="false">
					<div class="form-group">
						<button type="button" class="btn btn-danger btn-sm" id="password-reset-btn">Reset Password</button>
						<p style="color: red"><i>* Currently does not work</i></p>
					</div>
					<div id="password-reset-fields" class="custom-hidden">
						<div class="form-group">
							<label for="old_password">Old Password</label>
							<input type="text" name="old_password" class="form-control" placeholder="Old password">
						</div>
						<div class="form-group">
							<label for="new_password">New Password</label>
							<input type="text" name="new_password" class="form-control" placeholder="New password">
						</div>
						<div class="form-group">
							<label for="confirm_new_password">Confirm New Password</label>
							<input type="text" name="confirm_new_password" class="form-control" placeholder="Confirm new password">
						</div>
					</div>
				</form>
			</div>
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