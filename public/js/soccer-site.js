//on document ready
$(function(){
	/**
	 * REPORT CREATE PAGE
	 */

	//Add a new issue input to page
	$("#add-issue-btn").click(function(e){

		e.preventDefault();
		var n = $('#issue-container').data('issueCount') + 1;
		$('#issue-container').data('issueCount',n);
		var row =   '<div id="issue-row-'+n+'" class="row issue-row" style="opacity:0;position:relative;margin-left:300px;">' + 
						'<div class="col-sm-3 col-xs-4 form-group no-padding-right">' + 
							'<label for="issue-list-' + n +  '">Select</label>'+
							'<select class="form-control issue-list" id="issue-list-'+n+'" name="issueList['+n+'][issueName]"'+n+'">'+
								'<option val="def" selected disabled>Select an issue</option>'+
								'<option value="1">Red Card</option>'+
								'<option value="2">Yellow Card</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-sm-9 col-xs-8 form-group">'+
							'<label>Description</label>'+
							'<input class="form-control" id="issue-description'+n+'" name="issueList['+n+'][issueDescription]'+n+'" placeholder="your issue here..."></input>'+
						'</div>'+
					'</div>';
		$('#issue-container').append(row);
		
		var y = $(window).scrollTop();  //your current y position on the page
		//scroll down by height of issue-row
		var issueRowHeight = $('#issue-container .issue-row').first().height(); //get height of an issue-row
		$(window).scrollTop(y+issueRowHeight);

		
		// $('#issue-row-' + n).fadeIn();
		$('#issue-row-' + n).animate({
								opacity:1,
								//marginLeft:-15px to match bootstrap row style
								marginLeft:"-15px"
							},
							{
								queue:false,
								duration:300
							});
	});

	//Initalize datepicker
	$('#game-date').datepicker({
		format:'dd/mm/yyyy'
	}).on('changeDate',function(){
		//hide datepicker when date is picked
		$(this).datepicker('hide');
		//remove error class if it is applied
		$(this).removeClass('error');
		$('#game-date-error').hide();
	});

	//Initialize timepicker
	$('#game-time').timepicker({
		minuteStep:5
	});

	//add validator method to check that input time is a time string
	$.validator.addMethod("timeString", function(value, element){
		return this.optional(element) || /^((1[0-2])|(0?[0-9]))\:[0-5][0-9] ((AM)|(PM))$/.test(value);
	},"Please enter a valid time (HH:MM AM/PM)");

	//add validator method to check that input date is a date string using format dd/mm/yyyy
	$.validator.addMethod("dateString", function(value, element){
		return this.optional(element) || /^((0?[1-9])|([1-2][0-9])|(3[0-1]))\/((1[0-2])|(0?[1-9]))\/[0-9]{4}$/.test(value);
	},"Please enter a valid date");

	//add a validator method to check the select value is not default
	$.validator.addMethod("notDefault", function(value, element){
		return this.optional(element) || value != 'def'
	},"Please select an option");

	//Initalize form validation
	//TODO uncommented for testing
	// $('#create-report-form').validate({
	// 	rules:{
	// 		gameNumber:"required",
	// 		gameDate:{
	// 			required:true,
	// 			dateString:true
	// 		},
	// 		gameTime:{
	// 			required:true,
	// 			timeString:true
	// 		},
	// 		field:"required",
	// 		refType:{
	// 			required:true,
	// 			notDefault:true
	// 		},
	// 		homeName:"required",
	// 		homeScore:{
	// 			required:true,
	// 			min:0
	// 		},
	// 		awayName:"required",
	// 		awayScore:{
	// 			required:true,
	// 			min:0
	// 		}
	// 	}
	// });

	//Hide datepicker when tab pressed
	$(document).on('keydown', '#game-date', function(e) { 
		var keyCode = e.keyCode || e.which; 

		//tab
		if (keyCode == 9) { 
			$(this).datepicker('hide');
		} 
	});

	/**
	 * END REPORT CREATE PAGE
	 */

	/**
	 * SEARCH REPORT PAGE
	 */

	//Initalize datepicker
	$('#search-game-date').datepicker({
		format:'dd/mm/yyyy'
	}).on('changeDate',function(){
		//hide datepicker when date is picked
		$(this).datepicker('hide');
		//remove error class if it is applied
		$(this).removeClass('error');
		$('#search-game-date-error').hide();
	});

	//Initialize timepicker
	$('#search-game-time').timepicker({
		minuteStep:5
	});
	/**
	 * END SEARCH REPORT PAGE
	 */
});