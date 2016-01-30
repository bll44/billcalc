<!-- Modal -->
<div class="modal fade" id="editVenmoDetailsInfo" tabindex="-1" role="dialog" aria-labelledby="editVenmoDetailsInfoLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Linked Venmo Account Details</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="#" class="form-horizontal">
					{!! csrf_field() !!}
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$('#submit-billcalc-form').click(function() {
	$('#edit-billcalc-info-form').submit();
});

</script>