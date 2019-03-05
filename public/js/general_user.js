$(document).ready(function(){


    var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  

	if(window.location.href.indexOf("dashboard/catid") > -1) {

      if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else { 
	    console.log('naa');
	  }
    }


    if($('.publicprofile_status').length > 0) {

    	$('#work_description').find('.mobile_phone_pop').css('display','none');
    	$('#work_description').find('.img_vid_popup').css('display','none');
    	$('#work_description').find('.describe_work').css('display','none');
    	$('#work_description').find('.final_ques_thanks').css('display','block');
    	$('#work_description').modal('show');
    }


    if(window.location.href.indexOf("general_dashboard") > -1) {
      $('html, body').animate({
	        scrollTop: $(".yep_section_bg").offset().top
	    }, 2000);
    }

    /******code to check radio buttons*****
    $('.total_quote .radio-inline').on('change', function() {
	   alert($('input[name=radios]:checked', '.total_quote').val()); 
	});*****/


	/*********check hidden error msg***********/
	var hidden_error = $('.hidden_error_msg').val();
	var hidden_id = $('.hidden_error_msg').attr('data-id');
	if(hidden_error != "" && hidden_id == "1"){
		$("#general_login").modal('show');
		//$('.login_with_social').before(hidden_error);
		//$( hidden_error ).insertBefore( ".login_with_social" );
	}


	$('.general_radius').on('change', function() {
	  alert( this.value );
	});

	/*******user dashboard page lising of business********/
	var listItems = $(".all_bus_by_cat li");

	listItems.each(function(idx, li) {
	    var product = $(li);

	    $(li).find('.select_this').find('#hmm_'+idx).click(function() {
	    	
	        if($(this).is(':checked')){
	            $(li).addClass('border_color');
	        } else{
	            $(li).removeClass('border_color');
	        }

	        var countCheckedCheckboxes = listItems.find('.check_bus').filter(':checked').length;
	    	if(countCheckedCheckboxes > 5){
	    		alert('You can not select more than 5 business !');
	    		$(li).removeClass('border_color');
	    		return false;
	    	}
	    });

	    // and the rest of your code
	});
	/*******lisung of business on user dashboard page ends********/


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
		
      	var attr_status = $('#sign_in_general').attr('data-checkstatus');

      	if(attr_status && attr_status != 'undefined'){
      		var attr_status = 'quotes';
      	}else{
      		var attr_status = 'simple';
      	}
      	

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
           	data:{password:password, email:email,attr_status:attr_status},
           	success:function(data){
              	if(data.success == '1'){
              		window.location = website_url+data.url;

              		$('html, body').animate({
				        scrollTop: $(".yep_section_bg").offset().top
				    }, 2000);
              	}
              	if(data.success == '0'){
              		$('.gen_error').css('display','block');
              		$('.gen_error').text(data.message);
              	}

              	if(data.success == '2'){
              		$('#general_login').modal('hide');
              		$('#ask_quote').modal('show');
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

/*******fn for cat page to display business according to long lat******/
function showPosition(position) {

	var current_loc_latitude = position.coords.latitude;
	var current_loc_longitude = position.coords.longitude;

	var current_url = window.location.href;
	var cat_id = current_url.substring(current_url.lastIndexOf('/') + 1);

	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	/*****ajax starts*****/
	$.ajax({
		url: home_url+'general_user/dashboard/catid/'+cat_id,
		type: 'GET',
		data:{latitude:current_loc_latitude,longitude:current_loc_longitude},
		dataType:'html',
		success:function(response){
			$('.content').html(response);

			/******on select of business users ->change color and give limit******/
			var listItems = $(".all_bus_by_cat li");

			listItems.each(function(idx, li) {
			    var product = $(li);

			    $(li).find('.select_this').find('#hmm_'+idx).click(function() {
			    	
			        if($(this).is(':checked')){
			            $(li).addClass('border_color');
			        } else{
			            $(li).removeClass('border_color');
			        }

			        var countCheckedCheckboxes = listItems.find('.check_bus').filter(':checked').length;
			    	if(countCheckedCheckboxes > 5){
			    		alert('You can not select more than 5 business !');
			    		$(li).removeClass('border_color');
			    		return false;
			    	}
			    });

			    // and the rest of your code
			});/*****business list code ends here****/


		}
	});/***ajax ends here***/


}/*****fn show position ends here*****/


/********dropzone files*********/

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var home_url = $('#home_url').val();
var page_name = $('#dropzone_form').attr('data-page');

var myDropzone = new Dropzone("div#drag_div", { 

	addRemoveLinks: true,
	removedfile: function(file) {
	   // var name = file.name;  
	   /*******code to get name of image that is created to save in folder*******/      
	    var name = file.previewElement.id; 
	    var img_name = name.split(".");
	    $('#dropzone_form').find('.hidden_new_image'+img_name[0]).remove();
	    
	    $.ajax({
	        type: 'POST',
	        url: home_url+"/general_user/removeimg_"+page_name,
	        data: "id="+name,
	        dataType: 'html'
	    });

	    
	 	// $('#dropzone_form').append('<input type="hidden" id="'+response+'" name="dropzone_file[]" value="" >');
		// $( ".dz-error-mark svg:last-child" ).attr('data-id',response);

		var _ref;
		return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
	},
	url: home_url+"/general_user/uploadmultiple_"+page_name,
	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	acceptedFiles: "image/*",
	success: function(file, response){
		if(response != "false"){

			/*******code to get name of image that is created to save in folder*******/
			file.previewElement.id = response;
			var img_name = response.split(".");

			//$('#dropzone_form').find('.drag_drop_text').text('');
			
			$('#dropzone_form').append('<input type="hidden" class="hidden_new_image'+img_name[0]+'" id="'+response+'" name="dropzone_file[]" value="'+response+'" >');
			$( ".dz-error-mark svg:last-child" ).attr('data-id',response);

			setTimeout(function(){
				$('#dropzone_form').find('.dz-preview').each(function(){
					$(this).find('.dz-remove').text('');
					$(this).find('.dz-remove').text('x');
				});
			}, 1000);
			return true;

		}
		$('.registrationform .upload_file_section .drag_file a').hide();
	},
	async: false

});

myDropzone.on("addedfile", function(file) {
    var fileType = file.type;

    if(fileType.indexOf('video') !== -1){
    	$( "#drag_div div.dz-preview:last .dz-image img").attr('src',home_url+'img/vedio_thumb.png');
    }

});
/********dropzone code ends********/

/****close modal on single profile page***/
function closestaticmodal(){
	$('#work_description').modal('hide');

	var current_url = window.location.href;
	var new_url = current_url.slice(0, current_url.lastIndexOf('/'));
	window.location.href = new_url;
}