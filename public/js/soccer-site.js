//on document ready
$(function(){
/**
 * USER MANAGEMENT PANEL
 */

	//check/uncheck boxes if the check all box is checked
	$('#check-all-permissions').change(function(e){

		if($(this).prop('checked')){
			//check all boxes			
			$(this).prop('checked', true);
			$('.permission-check').prop('checked', true);
		}else{
			//remove all checked boxes
			$(this).prop('checked', false);
			$('.permission-check').prop('checked', false);
		}
	});

	//uncheck the check all box if it is checked and a permission is unchecked
	$('.permission-check').change(function(e){
		
		$('#check-all-permissions').prop('checked',false);
	});

	$('#add-user-form').validate({
		rules:{
			username:"required",
			first_name:"required",
			last_name:"required",
			password:"required",
			confirmPassword:{
				equalTo:"#password"
			},
			permissions:{
				required:true
			}
		},
		submitHandler:function(form){
			//make sure at least one permission is checked before form submit
			if($('.permission-check:checked').length > 0){
				form.submit();
			}else{
				var errorHTML = '<label id="permissions-error" class="error" for="permissions">At least one permission must be selected.</label>';
				$(errorHTML).insertAfter('.permission-list');
			}
		}
	});
	
	//add confirm dialog to user delete
	$('.delete-user-form').submit(function(){
		return confirm('Are you sure you want to delete this user?');
	});

	$('#users-table').tablesorter({
		headers:{
			3:{
				sorter:false
			},
			4:{
				sorter:false
			},
			5:{
				sorter:false
			},
			6:{
				sorter:false
			},
			7:{
				sorter:false
			}
		}
	});

	//
	$('.view-user-link').click(function(e){
		e.preventDefault();

		var userId = $(this).data('user-id');

		$.ajax({
			url:'../user/get',
			method:'post',
			data:{
				userId:userId
			}
		}).done(function(user){
			//TODO populate user view modal
			console.log(user);
			populateViewUserModal(user.profile,user.permissions);
		}).fail(function(){
			console.log('error');
		});
	});

	/**
	 * Populates the user view modal with data from the user
	 */
	function populateViewUserModal(user,permissions){
		//set the title
		$('#view-user-modal-title').html(user.username);

		//gen the html for the user profile info
		//full name
		var fullName = user.first_name + " ";
		if(user.preferred_name){
			fullName += "(" + user.preferred_name + ") ";
		}
		if(user.middle_name){
			fullName += user.middle_name + " ";
		}
		fullName += user.last_name;
		$('#view-full-name').html(genProfileElementHtml('Full Name', fullName));
		//phone numbers
		$('#view-phone-number').html(genProfileElementHtml('Phone Number', user.phone));
		$('#view-alt-phone-number').html(genProfileElementHtml('Alt Phone Number', user.alt_phone));
		//email
		$('#view-email').html(genProfileElementHtml('Email', user.email));
		//address lines
		var address = genProfileElementHtml('Address', user.address_line_1);
		if(user.address_line_2){
			address += genProfileElementHtml(null, user.address_line_2);
		}
		address += genProfileElementHtml(null, [user.city, user.postal_code]);
		$('#view-address').html(address);
		$('#view-notes').html(genProfileElementHtml('Notes', user.notes));

		//gen the html for the user permissions
		if(permissions && permissions.length > 0){
			var permissionsHtml = "<ul class='permission-list'>";
			for(var i = 0; i < permissions.length; i++){
				permissionsHtml +=  "<li>" +
										"<label>" +
											"<input class='permission-check' name='permissions[]' value="+permissions[i].id+" type='checkbox' checked disabled> " +permissions[i].name+
										"</label>" +
									"</li>";
			}
			permissionsHtml += "</ul>";
			$('#view-permissions').html(permissionsHtml);
		}
	}

	/**
	 * Generates html based for the user profile
	 */
	function genProfileElementHtml(label,text,joiner){
		var html = "";
		var joined = "";
		if(label){
			html +=  "<label>" + label + "</label>";	
		}
		
		html += "<p>";
		if(text){
			//if the text being passed is an array
			if(typeof text === 'object'){
				if(joiner){
					joined += text.join(joiner + ' ');
				}else{
					joined += text.join(', ');
				}
				html += joined;
			}else{
				html += text;
			}
		}else{
			html += "N/A";
		}
		html += "</p>";

		if(joined == ', ' || joined == joiner + ' '){
			html = "";
		}

		return html;
	}

	/**
	 * prettifies an object key for display
	 */
	function prettifyKey(key){
		console.log(key);
		var prettified = key.replace('_', ' ');
		return toTitleCase(prettified);
	}

	/**
	 * capitalizes each word in a string
	 */
	function toTitleCase(str){
	    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	}

/**
 * END USER MANAGEMENT PANEL
 */

/**
 * EDIT USER PAGE
 */

	$('#edit-user-form').validate({
		rules:{
			first_name:"required",
			last_name:"required",
			permissions:{
				required:true
			}
		},
		submitHandler:function(form){
			//make sure at least one permission is checked before form submit
			if($('.edit-permission-check:checked').length > 0){
				form.submit();
			}else{
				var errorHTML = '<label id="permissions-error" class="error" for="permissions">At least one permission must be selected.</label>';
				$(errorHTML).insertAfter('.permission-list');
			}
		}
	});

/**
 * END EDIT USER PAGE
 */

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

});