$(document).ready(function(){

	/*********check hidden error msg***********/
	var hidden_error = $('.hidden_error_msg').val();
	var hidden_id = $('.hidden_error_msg').attr('data-id');
	if(hidden_error != "" && hidden_id == "1"){
		$("#general_login").modal('show');
		//$('.login_with_social').before(hidden_error);
		//$( hidden_error ).insertBefore( ".login_with_social" );
	}


	/*****prevent first space on inputs*****/
	$("input").on("keypress", function(e) {
	    if (e.which === 32 && !this.value.length)
	        e.preventDefault();
	});

	/******General user login******/
	$('#sign_in_general').submit(function(e){
		e.preventDefault();

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
		var url_general = $('.action_general').val();
		var website_url = $('.website_url').val();

		var email = $('.email_gen').val();
		$('.gen_error').css('display','none');
		$('.gen_error').text('');
		if(email == ''){
			$('.email_gen_error').css('display','block');
			$('.email_gen_error').text('Please add email address');
			return false;
		}
		var password = $('.password_gen').val();
		if(password == ''){
			$('.password_gen_error').css('display','block');
			$('.password_gen_error').text('Please add password');
			return false;
		}else{
			$('.password_gen_error').css('display','none');
			$('.password_gen_error').text('');
		}
		// if(password.length < 6){
		// 	$('.password_gen_error').css('display','block');
		// 	$('.password_gen_error').text('The password must be at least 6 characters.');
		// 	return false;
		// }else{
		// 	$('.password_gen_error').css('display','none');
		// 	$('.password_gen_error').text('');
		// }


		$.ajax({
           	type:'POST',
           	url:url_general,
           	data:{password:password, email:email},
           	success:function(data){
              	if(data.success == '1'){
              		window.location = website_url+data.url;
              	}
              	if(data.success == '0'){
              		$('.gen_error').css('display','block');
              		$('.gen_error').text(data.message);
              	}
           	}

        });

	});/******general sign in ends******/

	$('.forgot_pass').click(function(){
		$('#general_login').modal('hide');
		$('#user_forgot_password').modal('show');
	});

	/*******empty fields of forget password modal on hide******/
	$("#user_forgot_password").on("hidden.bs.modal", function(){
	    $(".forget_email").val("");
	    $('#user_forgot_password .bu_error').html('');
	});

	/******empty fields of sign in modal on hide*****/
	$("#general_login").on("hidden.bs.modal", function(){
	    $("#sign_in_general").find('.email_gen').val("");
	    $("#sign_in_general").find('.password_gen').val("");
	    $('#sign_in_general .gen_error').html('');
	    $('#sign_in_general .email_gen_error').html('');
	    $('#sign_in_general .password_gen_error').html('');
	});

	$('#user_forgot_password #submit').click(function(){
		var email = $('#user_forgot_password .email_bu').val();

		if(validateEmail(email) == false){
			$('#user_forgot_password .bu_error').css('display','inline-block');
			$('#user_forgot_password .bu_error').html('Please add a valid email.');
			return false;
		}else if(email == ""){
			$('#user_forgot_password .bu_error').css('display','inline-block');
			$('#user_forgot_password .bu_error').html('Please enter any email id.');
			return false;
		}else{
			$('#user_forgot_password .bu_error').html('');
		}

		var token = $("input[name=_token]").val();
		var home_url = $('.website_url_b').val();
		jQuery('.pre_loader').css('display','block');
		$.ajax({
			url: home_url+'/general_user/check_user_email_exists',
			type: 'POST',
			data:{email:email,"_token":token},
			success:function(response){ 
				jQuery('.pre_loader').css('display','none');
				if(response == 'true'){
					$('#user_forgot_password .bu_error').css('display','inline-block');
					$('#user_forgot_password .bu_error').html('Email doest not exists.');
				}else{
					jQuery('.pre_loader').css('display','block');
					$.ajax({
						url: home_url+'/general_user/forgot_password_submit',
						type: 'POST',
						data:{email:email,"_token":token},
						success:function(response){
							jQuery('.pre_loader').css('display','none');
							if(response == 'sent'){
								$('#user_forgot_password .bu_error').css('display','inline-block');
								$('#user_forgot_password .bu_error').html('A link is sent to your registered email id.');
							}
						}
					});
					
					//$('#forgot_password_admin').submit();
				}
			}
		});
	});

	/*******on change radius - dashboard page**********/
	$('.general_radius').on('change', function (e) {
		e.preventDefault();
		var optionSelected = $("option:selected", this);
    	var valueSelected = this.value;

    	var home_url = $('#home_url').val();

    	$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
    	
    	$.ajax({
			url: home_url+'general_user/getlist_businessusers',
			type: 'POST',
			data:{option:valueSelected},
			success:function(response){
				if(response == 'sent'){
					$('#user_forgot_password .bu_error').show();
					$('#user_forgot_password .bu_error').html('A link is sent to your registered email id.');
				}
			}
		});/***ajax ends here***/
	});/****change fn ends here****/


});/*****document ready*****/


/******function to remove error messages on type*******/
function remove_errormsg(data){
	var value_field = $(data).val();
	var current_id = $(data).attr('id');

	if(current_id == "email"){
		if(validateEmail(value_field) == false){
			$(data).next('.fill_fields').css('display','block');
			$(data).next('.fill_fields').text('Please add a valid email');
			$(data).addClass('error_border');
		}else if(value_field == ""){
			$(data).next('.fill_fields').css('display','block');
			$(data).addClass('error_border');
		}else{
			$(data).next('.fill_fields').css('display','none');
			$(data).removeClass('error_border');
		}
	}else if(current_id == "phone_number"){
		if((value_field).length < 9 || (value_field).length > 15){
			$(data).next('.fill_fields').css('display','block');
			$(data).next('.fill_fields').text('Phone number must be between 9 and 15 digits');
			$(data).addClass('error_border');
		}else{
			$(data).next('.fill_fields').css('display','none');
			$(data).removeClass('error_border');
		}
	}else if(value_field == ""){
		$(data).next('.fill_fields').css('display','block');
		$(data).addClass('error_border');
	}else{
		$(data).next('.fill_fields').css('display','none');
		$(data).removeClass('error_border');
	}

}

/***fn to check email***/
function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( email );
}
