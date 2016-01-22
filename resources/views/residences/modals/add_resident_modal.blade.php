<div class="modal fade" tabindex="-1" role="dialog" id="addResidentModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add Resident</h4>
			</div>
			<form method="post" action="{{ URL::to('residences/add_resident') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="resident_id" value="55">
				<input type="hidden" name="residence_id" value="1">
				<input type="submit" value="Submit">
			</form>
			<div class="modal-body">
				<div>
					<form id="add-resident-form" class="form-inline" method="post">
						<div class="form-group">
							<label for="multi-search">&nbsp;</label>
							<input type="text" class="form-control" id="multi-search-input" placeholder="Name, Email, Username search" autocomplete="off">
						</div>
						<button type="button" id="multi-search-btn" class="btn btn-default">Search</button>
					</form>
				</div>
				<div id="search-results-container">
					<ul class="list-group" id="resident-result-list">
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

function bindAddResidentLinks() {
	$(document).on('click', '.add-resident-btn', function() {
		var resident_id = $(this).data('resident-identifier');
		var residence_id = $('meta[name="residence_id"]').attr('content');
		console.log('resident id: ' + resident_id);
		console.log('residence id: ' + residence_id);
		$.ajax({
			url: '{{ URL::to("residences/add_resident") }}',
			method: 'POST',
			data: { resident_id: resident_id, residence_id: residence_id }
		}).done(function(data) {
			if(data.status == 200) {
				console.log('saved.');
				console.log(data.query);
			}
		});
	});
}

function searchAvailableUsers() {
	$('#search-results-container ul').html('');
	var search_value = $('#multi-search-input').val();
	if(search_value.length < 1) return false;
	$.ajax({
		url: '{{ URL::to('residences/add_resident/search') }}',
		type: 'GET',
		data: { ss: search_value },
		dataType: 'json',
		success: function(data) {
			console.log('Response size: ' + data.length)
			for(var i in data) {
				$('#search-results-container ul')
				.append('<li class="list-group-item" data-user-id="' + data[i].id + '">'
				+ data[i].display_name + ' ('+data[i].username+', '+data[i].email+')'
				+ '<a href="#" class="btn btn-success btn-sm pull-right add-resident-btn" data-resident-identifier="'+data[i].id+'">Add</a></li>');
			}
		}
	});

	// bind a response to clicking the Add button on a returned resident from search
	bindAddResidentLinks();
}

$('#add-resident-form').submit(function(event) {
	searchAvailableUsers();
	// prevent the form from actually submitting
	event.preventDefault();
});

$('#multi-search-btn').click(function() {
	searchAvailableUsers();
});



</script>