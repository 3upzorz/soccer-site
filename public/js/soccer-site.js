/**
 * Create report page
 */
$("#add-issue-btn").click(function(e){

	e.preventDefault();
	//TODO add counter to the issues-lists
	var n = 1;
	var row = '<div class="row"><div class="col-xs-3 form-group"><label for="issue-list-' + n +  ' ">Select</label><select class="form-control issue-list" id="issue-list-'+n+'" name="issueList'+n+'"><option val="def" selected disabled>Select an issue</option><option value="1">Red Card</option><option value="2">Yellow Card</option></select></div><div class="col-xs-9 form-group"><label>Description</label><input class="form-control" id="issue-description'+n+'" name="issueDescription'+n+'" placeholder="your issue here..."></input></div></div>';
	$('#issue-container').append(row);
	
	var y = $(window).scrollTop();  //your current y position on the page
	//scroll down by 75px when a new issue is added
	$(window).scrollTop(y+75);
});