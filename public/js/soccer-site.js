//on document ready
$(function(){
/**
 * REPORT CREATE PAGE
 */

	//Add a new incident input to page
	$("#add-incident-btn").click(function(e){

		e.preventDefault();
		var n = $('#incident-container').data('incidentCount') + 1;
		$('#incident-container').data('incidentCount',n);
		var row =   '<div id="incident-row-'+n+'" class="row incident-row" style="opacity:0;position:relative;margin-left:300px;">' + 
						'<div class="col-sm-3 col-xs-4 form-group no-padding-right">' + 
							'<label for="incident-list-' + n +  '">Select</label>'+
							'<select class="form-control incident-list" id="incident-type-list-'+n+'" name="incidents['+n+'][typeId]"'+n+'">'+
								'<option val="def" selected disabled>Select an incident</option>'+
								'<option value="1">Red Card</option>'+
								'<option value="2">Yellow Card</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-sm-9 col-xs-8 form-group">'+
							'<label>Description</label>'+
							'<input class="form-control" id="incident-description'+n+'" name="incidents['+n+'][description]'+n+'" placeholder="your incident here..."></input>'+
						'</div>'+
					'</div>';
		$('#incident-container').append(row);
		
		var y = $(window).scrollTop();  //your current y position on the page
		//scroll down by height of incident-row
		var incidentRowHeight = $('#incident-container .incident-row').first().height(); //get height of an incident-row
		$(window).scrollTop(y+incidentRowHeight);

		
		// $('#incident-row-' + n).fadeIn();
		$('#incident-row-' + n).animate({
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
	//TODO uncomment after testing is done
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
	// $('#search-game-time').timepicker({
	// 	minuteStep:5
	// });

	//Initalize form validation
	//TODO uncomment after testing is done
	// $('#search-report-form').validate({
	// 	rules:{
	// 		gameDate:{
	// 			dateString:true
	// 		}
	// 	}
	// });

/**
 * END SEARCH REPORT PAGE
 */

/** 
 * ADD USER PAGE
 */

 	//check/uncheck boxes if the check all box is checked
	$('#check-all-divisions').change(function(e){

		if($(this).prop('checked')){
			//check all boxes			
			$(this).prop('checked', true);
			$('.division-check').prop('checked', true);
		}else{
			//remove all checked boxes
			$(this).prop('checked', false);
			$('.division-check').prop('checked', false);
		}
	});

	//uncheck the check all box if it is checked and a division is unchecked
	$('.division-check').change(function(e){
		
		$('#check-all-divisions').prop('checked',false);
	});

	//add validator methods
	$.validator.addMethod("canadianPhone", function(value, element){
		//allows for a 10 digit number with an optional country code 1
		return this.optional(element) || /^1?[0-9]{10}$/.test(value);
	},"Please enter a valid Canadian phone number");

	//validate form
	//TODO uncomment when testing finished
	// $('#add-user-form').validate({
	// 	rules:{
	// 		firstName:"required",
	// 		lastName:"required",
	// 		email:{
	// 			required:true,
	// 			email:true
	// 		},
	// 		phone1:{
	// 			required:true,
	// 			canadianPhone:true
	// 		},
	// 		addressLine1:"required",
	// 		city:"required",
	// 		postalCode:"required",
	// 		userType:{
	// 			required:true,
	// 			notDefault:true
	// 		}
	// 	}
	// });

/** 
 * END ADD USER PAGE
 */
});