/**
 * Create report page
 */
$("#add-issue-btn").click(function(e){

	e.preventDefault();
	var row = '<div class="row"><div class="col-xs-3 form-group"><label for="issue-list">Select</label><select class="form-control" class="issue-list"><option val="def" selected disabled>Select an issue</option><option value="1">Red Card</option><option value="2">Yellow Card</option></select></div><div class="col-xs-9 form-group"><label>Description</label><input class="form-control" placeholder="your issue here..."></input></div></div>';
	$('#issue-container').append(row);
	
	var y = $(window).scrollTop();  //your current y position on the page
	//scroll down by 75px when a new issue is added
	$(window).scrollTop(y+75);
});