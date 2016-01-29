<div class="modal fade" id="auth-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"><img src="{{ asset('images/venmo/app-icon.png') }}" style="width: 75px;"> Log in with Venmo</h3>
			</div><!-- /.modal-header -->
			<div class="modal-body">
				<p>
					Clicking <span class="blue-ib">Log in with Venmo</span> will take you to Venmo's authentication portal to log in. Once you log in, your Venmo information will be sent back to BillCalc and you'll be redirected back to BillCalc so that we can view your Venmo information within BillCalc and also make and receive payments without having to leave BillCalc.
				</p>
			</div><!-- /.modal-body -->
			<div class="modal-footer">
				<div id="venmo-auth-link-container">
					<div>
						<!-- <p><a href="{{ URL::to('auth/register') }}" class="pull-left">Sign up without Venmo</a></p> -->
						<!-- <p><a href="{{ URL::to('auth/login') }}" class="pull-left">Login without Venmo</a></p> -->
					</div>
					<div>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<a href="#" id="venmo-auth-link" class="btn btn-primary">Log in with Venmo</a>
						<a href="{{ URL::to('auth/login') }}" id="no-venmo-auth-link" class="btn btn-success">Log in with BillCalc <sup>&reg;</sup></a>
					</div>
				</div>
			</div><!-- /.modal-footer -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
$(document).ready(function() {
	var venmo_url, venmo_query_string;
	venmo_url = 'https://api.venmo.com/v1/oauth/authorize?';
	venmo_query_string = 'client_id=3303&scope=make_payments%20access_email%20access_phone%20access_balance%20access_friends';
	venmo_query_string += '%20access_payment_history%20access_feed%20access_profile&response_type=code';
	venmo_url += venmo_query_string;
	$('#venmo-auth-link').attr('href', venmo_url);
	$('#venmo-auth-link').attr('disabled', false);
});
// $('#venmo-auth-link').click(function(event) {
// 	console.log('INFO: Venmo auth link clicked');
// 	var venmo_url, venmo_query_string;
// 	venmo_url = 'https://api.venmo.com/v1/oauth/authorize?';
// 	venmo_query_string = 'client_id=3303&scope=make_payments…_email%20access_phone%20access_balance%20access_friends&response_type=code';
// 	venmo_url += venmo_query_string;
// 	$('#venmo-auth-link').attr('href', venmo_url);
// 	console.log($(this).attr('disabled'));
// 	if($(this).attr('disabled') == 'disabled') {
// 		event.preventDefault();
// 	}
// });

</script>