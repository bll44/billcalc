<!-- Modal -->
<div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Reset Your Password</h4>
			</div>
			<div class="modal-body">
				<div id="reset-password-messages">
				</div>
				{{-- /.password-error-messages --}}
				<form method="post" id="password-reset-form" class="form-horizontal">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="old_password">Old Password</label>
						<input type="password" name="old_password" placeholder="Old password" id="old_password_input" class="form-control">
					</div>
					<div class="form-group">
						<label for="new_password">New Password</label>
						<input type="password" name="new_password" placeholder="New password" id="new_password_input" class="form-control">
					</div>
					<div class="form-group">
						<label for="old_password">Confirm New Password</label>
						<input type="password" name="new_password_confirmation" placeholder="Confirm new password" class="form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="password-reset-close-btn" data-dismiss="modal">Close</button>
				<button type="button" id="password-reset-submit-btn" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
var passwordFormSubmitted = false;
function displayPasswordMessage(message, status) {
	if(status) {
		$('#reset-password-messages').append(
			'<div class="row">'
			+ '<div class="alert alert-success">' + message + '</div>'
			+ '</div>'
			);
	}
	else if( ! status) {
		$('#reset-password-messages').append(
			'<div class="row">'
			+ '<div class="alert alert-danger">' + message + '</div>'
			+ '</div>'
			);
	}
}

$('#password-reset-submit-btn').click(function() {
	var old_password = $('#old_password_input').val();
	var new_password = $('#new_password_input').val();
	var new_password_confirmation = $('input[name="new_password_confirmation"]').val();
	if( ! passwordFormSubmitted) {
		passwordFormSubmitted = true;
		$.ajax({
			url: "{{ URL::to('account/password-reset') }}",
			data: { old_password: old_password,
					  new_password: new_password,
					  new_password_confirmation: new_password_confirmation },
			type: 'POST'
		}).done(function(data) {
			if( ! data.errorMessages) {
				displayPasswordMessage(data.message, true);
				$('#password-reset-close-btn').hide();
				$('#password-reset-submit-btn')
					.text('Ok')
					.attr('id', 'close-password-reset-modal-btn');
			}
			else if(data.errorMessages) {
				for(var y in data.errorMessages) {
					displayPasswordMessage(data.errorMessages[y], false);
					passwordFormSubmitted = false;
				}
			}


		});
	}
});

$('#passwordResetModal').on('shown.bs.modal', function() {
	$('input[name="old_password"]').focus();
});

$(document).on('click', '#close-password-reset-modal-btn', function() {
	$('#passwordResetModal').modal('hide');
});

</script>