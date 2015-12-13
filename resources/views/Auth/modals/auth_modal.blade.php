<div class="modal fade" id="auth-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"><img src="{{ asset('images/venmo/app-icon.png') }}" style="width: 75px;"> Log in with Venmo</h3>
			</div><!-- /.modal-header -->
			<div class="modal-body">
				<!-- <div class="col-lg-12 col-md-12"> -->
					<div class="row">
						<h4>Allow Venmo to...</h4>
					</div>
					<div id="venmo-checkbox-container">
						<div class="row">
							<label>
							<input type="checkbox" name="venmo-permissions" class="venmo-perms-checkbox" value="make_payments">
							Make payments
							</label>
						</div>
						<div class="row">
							<label>
							<input type="checkbox" name="venmo-permissions" class="venmo-perms-checkbox" value="access_payment_history">
							Access your payment history
							</label>
						</div>
						<div class="row">
							<label>
							<input type="checkbox" name="venmo-permissions" class="venmo-perms-checkbox" value="access_profile">
							Access your basic profile information
							</label>
						</div>
						<div class="row">
							<label>
							<input type="checkbox" name="venmo-permissions" class="venmo-perms-checkbox" value="access_email">
							Access your email address
							</label>
						</div>
						<div class="row">
							<label>
							<input type="checkbox" name="venmo-permissions" class="venmo-perms-checkbox" value="access_phone">
							Access your primary phone number
							</label>
						</div>
						<div class="row">
							<label>
							<input type="checkbox" name="venmo-permissions" class="venmo-perms-checkbox" value="access_balance">
							Access your Venmo balance
							</label>
						</div>
						<div class="row">
							<label>
							<input type="checkbox" name="venmo-permissions" class="venmo-perms-checkbox" value="access_friends">
							Access your Venmo friends list
							</label>
						</div>
					</div><!-- /.venmo-checkbox-container -->
					<div class="row">
						<h4>...on my behalf</h4>
					</div><!-- /.row -->
					<h4>
					
					</h4>
				<!--</div>--> <!-- /.modal-container -->
			</div><!-- /.modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="https://www.google.com" id="venmo-auth-link" class="btn btn-primary" disabled="disabled">Log in with Venmo</a>
			</div><!-- /.modal-footer -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">

var client_id, scope, response_type, final_url;
var base_url = 'https://api.venmo.com/v1/oauth/authorize?';
scope = new Array();
$('.venmo-perms-checkbox').change(function() {
	if($(this).is(':checked')) {
		if(scope.indexOf($(this).val()) == -1) {
			scope.push($(this).val());
		}
	}
	else if($(this).is(':not(:checked)')) {
		var index = scope.indexOf($(this).val());
		scope.splice(index, 1)
	}
	if(scope.length > 0) {
		$('#venmo-auth-link').attr('disabled', false);
	}
	else if(scope.length <= 0) {
		$('#venmo-auth-link').attr('disabled', 'disabled');
	}
});

$('#venmo-auth-link').click(function(event) {
	var base_url = 'https://api.venmo.com/v1/oauth/authorize?';
	var client_id, scope, response_type, final_url;
	client_id = 3303;
	scope = '';
	$('.venmo-perms-checkbox').each(function() {
		if(this.checked) scope += $(this).val() + '%20';
	});
	scope = scope.substring(0, scope.length - 3);
	response_type = 'code';

	final_url = '';
	final_url += base_url;
	final_url += 'client_id=' + client_id;
	final_url += '&scope=' + scope;
	final_url += '&response_type=' + response_type;

	// stop the link from actually working for now
	if($(this).attr('disabled') == 'disabled') event.preventDefault();
});

</script>