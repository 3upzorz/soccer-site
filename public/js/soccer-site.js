/**
 * Create report page
 */
$("#add-issue-btn").click(function(e){

	e.preventDefault();
	var n = $('#issue-container').data('issueCount') + 1;
	$('#issue-container').data('issueCount',n);
	var row = '<div class="row issue-row">' + 
					'<div class="col-sm-3 col-xs-4 form-group no-padding-right">' + 
						'<label for="issue-list-' + n +  ' ">Select</label>'+
						'<select class="form-control issue-list" id="issue-list-'+n+'" name="issueList'+n+'">'+
							'<option val="def" selected disabled>Select an issue</option>'+
							'<option value="1">Red Card</option>'+
							'<option value="2">Yellow Card</option>'+
						'</select>'+
					'</div>'+
					'<div class="col-sm-9 col-xs-8 form-group">'+
						'<label>Description</label>'+
						'<input class="form-control" id="issue-description'+n+'" name="issueDescription'+n+'" placeholder="your issue here..."></input>'+
					'</div>'+
				'</div>';
	$('#issue-container').append(row);
	
	var y = $(window).scrollTop();  //your current y position on the page
	//scroll down by height of issue-row
	var issueRowHeight = $('#issue-container .issue-row').first().height(); //get height of an issue-row
	$(window).scrollTop(y+issueRowHeight);
});