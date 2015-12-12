<div id="exceptionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exceptionModalLabel">Exceptions</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid bd-example-row">
					<div class="row">
						<div class='col-md-12'>
							<div class="row">
								<fieldset class="col-md-8">
									<label for="exception-name">Exception</label>
									<input type="text" name="exception-name" id="exception-name" class="form-control input-sm" placeholder="Exception Identifier">
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-md-12" id="exception-description-set">
									<label for="exception-desc">Exception description</label>
									<textarea class="form-control"></textarea>
								</fieldset>
							</div>
							<div class="row">
								<fieldset class="col-md-12">
									<button type="button" class="btn-link">+ Add exception property</button>
								</fieldset>
							</div>
						</div>
					</div>
					{{-- /.row --}}
				</div>
				{{-- /.container-fluid bd-example-row --}}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary btn-sm">Save changes</button>
			</div>
		</div>
	</div>
</div>