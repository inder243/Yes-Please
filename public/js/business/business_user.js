$(document).ready(function(){

	/*****prevent first space on inputs*****/
	$("input").on("keypress", function(e) {
	    if (e.which === 32 && !this.value.length)
	        e.preventDefault();
	});

	/********click on profile setting popup redirect*********/
	$('.profile_setting').click(function(){
		var homeurl = $('#home_url').val();
		window.location.href = homeurl+"business_user/business_dashboard";
	});

	$('.business_verify').click(function(){
		var homeurl = $('#home_url').val();
		window.location.href = homeurl+"business_user/verify";
	});

	/*********code for datepicker in profile setting page*********/
	$('.datetimepicker').datetimepicker({
		format: 'HH:mm'
	});


	$('.select_profile_img').change(function(e){
		e.preventDefault();
		var images = e.target.files;
		$('.profileImages').text('');
		$.each( images, function( key, value ) {
		  	$('.profileImages').append(value.name+', ');
		});

    });

    $('.select_verify_img').change(function(e){
		e.preventDefault();
		var images = e.target.files;
		$('#msg').text('');
		$.each( images, function( key, value ) {
		  	$('#msg').append(value.name+', ');
		});

    });

    $('.select_quote_rply_img').change(function(e){
		e.preventDefault();
		var images = e.target.files;
		$('.BusQuoteRply').text('');
		$.each( images, function( key, value ) {
		  	$('.BusQuoteRply').append(value.name+', ');
		});

    });

    $('.select_product_img').change(function(e){
		e.preventDefault();
		var images = e.target.files;
		$('.products_img_msg').text('');
		$.each( images, function( key, value ) {
		  	$('.products_img_msg').append(value.name+', ');
		});

    });
	

    $('.save_agree').click(function(){
    	/*if(!$('.registrationform input[name="send_question"]').is(':checked') && !$('.registrationform input[name="send_schedule"]').is(':checked')){
		//if($('.registrationform textarea[name="send_question"]').val() == ''){
			$('.registrationform .outside_checkbox').css('border','2px solid #ff0900');
			$('.registrationform .fill_fields').html('Please mark a checkbox');
			return false;
		}

		if (!$('#agree').is(':checked')) {
			$('#agree').siblings('.outside_checkbox').attr('style','border:2px solid red'); 
			$('.bu_error_terms').html('Please agree with terms');
			return false;
		}else */
		
		if($('.added_category_list_heading .added_category ul.added_category_ul li').length == 0){
			$('.added_category_list').addClass('error');
			$('.fill_fields').removeClass('disp_none');

			$('html, body').animate({
		        scrollTop: $("#part_heading_three").offset().top
		    }, 2000);

			return false;
		}else{
			var empty = 'false';
			$('.total_weekdays .form-control').each(function(){
				if($(this).val() != ''){
					empty = 'true';
				}
			});

			if(!$('#available').is(':checked') && empty == 'false'){
				$('.bu_error_hours').html('Please select any option from following');
				return false;
			}			
			$('#profilesetting_form').submit();
		}		
	});


	

	/******Business user login******/
	$('#sign_in_business').submit(function(e){
		e.preventDefault();

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
		var url_general = $('.action_business').val();
		var website_url_b = $('.website_url_b').val();

		var email = $('.email_bu').val();
		$('.bu_error').css('display','none');
		$('.bu_error').text('');
		if(email == ''){
			$('.email_business_error').css('display','block');
			$('.email_business_error').text('Please add email address');
			return false;
		}
		var password = $('.password_bu').val();
		if(password == ''){
			$('.password_business_error').css('display','block');
			$('.password_business_error').text('Please add password');
			return false;
		}else{
			$('.password_business_error').css('display','none');
			$('.password_business_error').text('');
		}
		// if(password.length < 6){
		// 	$('.password_business_error').css('display','block');
		// 	$('.password_business_error').text('The password must be at least 6 characters.');
		// 	return false;
		// }else{
		// 	$('.password_business_error').css('display','none');
		// 	$('.password_business_error').text('');
		// }

		$.ajax({
           	type:'POST',
           	url:url_general,
           	data:{password:password, email:email},
           	success:function(data){
           		if(data.message == 'pending'){
           			window.location = website_url_b+'/'+data.url;
           			return false;
           		}
              	if(data.success == '1'){
              		window.location = website_url_b+data.url;
              	}
              	if(data.success == '0'){
              		$('.bu_error').css('display','block');
              		$('.bu_error').text(data.message);
              	}
           	}

        });

	});/******general sign in ends******/

	$('.forgot_pass_bus').click(function(){
		$('#login_business').modal('hide');
		$('#business_forgot_password').modal('show');
	});

	/*****empty fields fo forget password popup on hide*****/
	$("#business_forgot_password").on("hidden.bs.modal", function(){
	    $(".forget_email").val("");
	    $('#forgot_password_business .bu_error').html('');
	});

	/******empty fields of sign in modal on hide*****/
	$("#login_business").on("hidden.bs.modal", function(){
	    $("#sign_in_business").find('.email_bu').val("");
	    $("#sign_in_business").find('.password_bu').val("");
	    $('#sign_in_business .bu_error').html('');
	    $('#sign_in_business .email_business_error').html('');
	    $('#sign_in_business .password_business_error').html('');
	});

	$('#forgot_password_business #submit').click(function(){
		var email = $('#forgot_password_business .email_bu').val();

		if(validateEmail(email) == false){
			$('#forgot_password_business .bu_error').show();
			$('#forgot_password_business .bu_error').html('Please add a valid email.');
			return false;
		}else if(email == ""){
			$('#forgot_password_business .bu_error').show();
			$('#forgot_password_business .bu_error').html('Please enter any email id.');
			return false;
		}else{
			$('#forgot_password_business .bu_error').html('');
		}

		var token = $("input[name=_token]").val();
		var home_url = $('.website_url_b').val();
		jQuery('.pre_loader').css('display','block');
		$.ajax({
			url: home_url+'/business_user/check_admin_email_exists',
			type: 'POST',
			data:{email:email,"_token":token},
			success:function(response){ 
				jQuery('.pre_loader').css('display','none');
				if(response == 'true'){
					$('#forgot_password_business .bu_error').show();
					$('#forgot_password_business .bu_error').html('Email doest not exists.');
				}else{
					jQuery('.pre_loader').css('display','block');
					$.ajax({
						url: home_url+'/business_user/forgot_password_submit',
						type: 'POST',
						data:{email:email,"_token":token},
						success:function(response){
							jQuery('.pre_loader').css('display','none');
							if(response == 'sent'){
								$('#forgot_password_business .bu_error').show();
								$('#forgot_password_business .bu_error').html('A link is sent to your registered email id.');
							}
						}
					});
					
					//$('#forgot_password_admin').submit();
				}
			}
		});
	});

	

	/****category search code****/
	$('.category_search').keyup(function(){
		var input_text = $(this).val();
		//if(input_text != ''){
			var home_url = $('#home_url').val();
			var pageURL = window.location.href;
			var user_id = $('#business_user_id').val();
			
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
			$.ajax({
				url: home_url+'business_user/categorysearch/'+user_id,
				type: 'POST',
				data:{user_id:user_id,input_text:input_text},
				success:function(response){
					$('.category_list_dynamic ul').html(response);
				}
			});	
		//}
	});/******cat search ends*****/

	/*****delete image on profile setting page*****/
	$('.profile_imgcross').on('click',function(){
		var img_name = $(this).attr('data-img');

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			url: home_url+'business_user/removeprofileimg',
			type: 'POST',
			data:{img_name:img_name},
			success:function(response){
				if(response.success == 1){
					var image_name = img_name.split(".");
					$('#img_'+image_name[0]).remove();
				}
				
			}
		});/**ajax ends here**/	

	});/****delete image code ends here****/

});/*****document ready*****/

/******function to remove error messages on type on registration page*******/
function remove_errmsg(data){
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
	}else if(current_id == "mobile_phone"){
		if((value_field).length < 9 || (value_field).length > 15){
			$(data).next('.fill_fields').css('display','block');
			$(data).next('.fill_fields').text('Mobile phone must be between 9 and 15 digits.');
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


/*******code for dropzone files********/
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
	        url: home_url+"/business_user/removeimg_"+page_name,
	        data: "id="+name,
	        dataType: 'html'
	    });

	    
	 	// $('#dropzone_form').append('<input type="hidden" id="'+response+'" name="dropzone_file[]" value="" >');
		// $( ".dz-error-mark svg:last-child" ).attr('data-id',response);

		var _ref;
		return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
	},
	url: home_url+"/business_user/uploadmultiple_"+page_name,
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



/******verify user upload image******/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


/****************************
function to select/remove categories on profile-setting
****************************/
/******function to show selected categories and sub categories in next box******/
function categoriesselect(data){
	var pageURL = window.location.href;

	var user_id = $('#business_user_id').val();

	var home_url = $('#home_url').val();

	var category_id = $(data).attr('id');


	var inc_cat_id = $(data).attr('inc_id');
	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
	$.ajax({
		url: home_url+'business_user/get_forms_data_auth/'+user_id,
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,inc_cat_id:inc_cat_id},
		dataType:'json',
		success:function(data){
			
			if(data['success']==1)
			{
				$('.login_body_main').show();
				$('.cat_html_dataa').show();
				$('.ask_for_quote_section').hide();
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').html('');
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').html(data['html']);
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').addClass('text-center');
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').prepend('<span class="text-error"></span>');
				$('#openPopUpForQuestion').modal('show');
				$('#getBuid').val(user_id);
				$('#getcatid').val(category_id);
			}

		},error: function() { alert("Error posting feed."); }
	});	
 
	var category_type = $(data).attr('data-cat');
    var result='';
    var sub_cat_name = '';
    var sub_cat_id = '';
	var parent_id = category_id;
	var category_name = $(data).html();
	var parent_cat_name = $(data).parents('.subcategories').parent().find('.categories').html();
	if(!checkIfCategoryExists_reg(parent_id)){	

		if(checkNoOfCategories_reg() <= 10){
			var length = $('.added_category_list_heading .added_category ul').length;
			//alert(length);
			$('.added_category_list_heading .added_category ul.added_category_ul').append('<li><a href="javascript:;" id="'+category_id+'" data-cat="parent" class="categories">'+category_name+'</a><span class="cross_category cross_category_reg"><img src="'+home_url+'img/category_cancel.png" class="img-fluid"></span></li>');
			$('#no_categories').hide();
			ajaxRequest_reg(user_id,category_id);
			$(data).siblings('span.checked_category').attr('style','display: block;');
			
		}else{
			$('.forerror').addClass('disp_none');
		}
	}
}
function checkIfCategoryExists_reg(category_id){
	var exists = false;
	$('.added_category_ul li a').each(function() {
		var search_id = $(this).attr('id');
		if(category_id == search_id){
			exists = true;
		}
	});
	
	return exists;
}

function checkNoOfCategories_reg(){
	var count = 1;
	$('.added_category_ul li .categories').each(function() {
		count++;
	});
	return count;
}

function ajaxRequest_reg(user_id,category_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/add_business_user_category_auth',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id},
		success:function(){

		}
	});	
}

function saveCategoryData()
{
	var services =[];
	$('#openPopUpForQuestion .cat_html_dataa .form-ques').each(function(i, obj) {

		var data_type = $(this).attr('data-type');

		var data_id   = $(this).attr('data-id');

		console.log(data_type);
		console.log(data_id);

		if(data_type == "dropdown")
		{
			var selected= {};

			var chkboxId = "dynamicQues_"+data_id;
			var text =  $('.'+chkboxId+' option:selected').text();
			 selected['type'] = data_type;
			if(text !== '')
			{
            	selected['text']= text;
        	}
	        

			services.push(selected);


		}
		else if(data_type == "checkbox")
		{
			var selected= {};
			var chkboxId = "dynamicQues_"+data_id;
			selected['type'] = data_type;

        	var selectedtext = $('.'+chkboxId+' input:checked').map(function() {
            return  $(this).parents('label').find('p').text();
        	}).get().join(',');

            selected['text']= selectedtext;
			
			services.push(selected);

		}
		else if(data_type == "radio")
		{

			var selected= {};
			var radioValue = $(this).find("input[name='radios"+data_id+"[]']:checked").parents('label').find('p').text();
			 selected['type'] = data_type;
			if(radioValue !== ''){
				selected['text']= radioValue;
			}
			// var radioValue = $('#openPopUpForQuestion').find('.modal-body').find('.form-ques').find("input[name='radios"+data_id+"[]']:checked").text();      
			services.push(selected);
		}
		else if(data_type == "textbox")
		{
			var selected= {};
			var text = $(this).val();
			 selected['type'] = data_type;
			if(radioValue !== ''){
				selected['text']= text;
			}
			// var radioValue = $('#openPopUpForQuestion').find('.modal-body').find('.form-ques').find("input[name='radios"+data_id+"[]']:checked").text();      
			services.push(selected);
		}
    
	});

		
	console.log(services);
	if(services.length == 0){
		$(data).parents('.modal-body').find('.text-error').text('Please select an element.');
	}else{
		var user_id = $('#getBuid').val();
		var category_id = $('#getcatid').val();
		ajaxRequest_service(user_id,category_id,services);
		$('#openPopUpForQuestion').modal('hide');
	}
	// alert($(data).attr('data-id'));

	// alert(data_id);

	// alert(data_type);
}


function ajaxRequest_service(user_id,category_id,services){
	var home_url = $('#home_url').val();
	services = JSON.stringify(services);
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/add_selected_service_auth',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,selected:services},
		success:function(){

		}
	});
}


$(document).on('click', '.cross_category', function(){
	var pageURL = window.location.href;
	var user_id = $('#business_user_id').val();
	var category_type = $(this).siblings('a').attr('data-cat');
	var id = $(this).siblings('a').attr('id');
	if(category_type == 'parent'){
		if(confirm('Do you want to delete ?')){	
			//$(".category_list_dynamic ul").find("a#" + horaInicial)
			$(this).parents('li').remove();	
			$(".category_list_dynamic ul").find("a#" + id).siblings('.checked_category').hide();
			ajaxRemoveRequest_reg(user_id,id);
		}		
	}
});

function ajaxRemoveRequest_reg(user_id,category_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/remove_business_user_category_auth',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id},
		success:function(){

		}
	});	
}



function ajaxRequest(user_id,category_id,sub_cat_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$.ajax({
		url: home_url+'business_user/add_businessuser_category',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,sub_cat_id:sub_cat_id},
		success:function(){

		}
	});	
}

function checkIfCategoryExists(category_id){
	var exists = false;
	$('.added_category ul li .categories').each(function() {
		var search_id = $(this).attr('id');
		if(category_id == search_id){
			exists = true;
		}
	});
	return exists;
}
function checkNoOfCategories(){
	var count = 1;
	$('.added_category ul li .categories').each(function() {
		count++;
	});
	return count;
}



function ajaxRemoveRequest(user_id,category_id,sub_cat_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
	$.ajax({
		url: home_url+'business_user/remove_businessuser_category',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,sub_cat_id},
		success:function(){

		}
	});	
}
/************category functions ends here*************/

//event will be called each time next button is clicked
	function getNextQuesButton(catid){

		
		var site_url   = $('#home_url').val();
		
		var lastdiv = $('.cat_html_dataa .form-ques:visible');//get last question
		
		console.log(lastdiv);

		var qid = $(lastdiv).attr('data-id');//get id of question
		var qtype = $(lastdiv).attr('data-type');//get type of question
		var value = '';
		if(qtype=="textbox" || qtype=="datepicker" || qtype=="timepicker")//get value of textbox/datepicker/timepicker
		{
			var value = $(lastdiv).find(':input').val();
		}
		if(qtype=="textarea")//get value of textbox
		{
			var value = $(lastdiv).find('textarea').val();
		}
		else if(qtype=="radio")//get value of radio
		{
			$(lastdiv).find('input[type=radio]').each(function(){
            var option = {};
              if($(this).is(":checked")){
                value = $(this).val();
              }
            });
		}
		else if(qtype=="dropdown")//get value of dropdown
		{
			var value = $(lastdiv).find(":selected").val();
		}
		else if(qtype=="checkbox")//get value of checkbox
		{	
			var value = [];
			$(lastdiv).find('input[type=checkbox]').each(function(){
            var option = {};
              if($(this).is(":checked")){
                cvalue = $(this).val();
                value.push(cvalue);
              }
            });
		}
		console.log(value);
		console.log(qid);
		console.log(qtype);

		methodAjaxToGetNextQuestion(qid,value,qtype,catid,site_url);
		
	}

	//function will be called when prev button is clicked.
	function getPrevQuesButton(prevQuesId)
	{
		if(prevQuesId!='')
		{
			$('.form-ques').hide();
			$('.dynamicQues_'+prevQuesId).show();
		}
		

	}
	function methodAjaxToGetNextQuestion(qid,value,qtype,catid,site_url)
	{
	//set csrf token
		if(qid!='' && value!='' && qtype!='' && catid!='')
		{
			var user_id = $('#business_user_id').val();
			$.ajaxSetup({
	          headers: {
	              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });

			$.ajax({
	          url: site_url+"/business_user/getdataprofile",        
	          type:'POST',
	          data: {'qid':qid,'value':value,'type':qtype,'catid':catid},	
	          success:function(response){  
	           
				if(response.success==1)
				{
					if(response.data!='' && $(".dynamicQues_"+response.nextid).length<=0)
					{
						$('.form-ques').hide();
						$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').append(response.data);
						$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').addClass('text-center');
						
					}
					else if(response.nextid!='' && $(".dynamicQues_"+response.nextid).length>0) 
					{
					  	$('.form-ques').hide();
						$('.dynamicQues_'+response.nextid).show();
					}
					else if(response.data=='')
					{
						$('.login_body_main').hide();
						$('.cat_html_dataa').hide();
						$('.ask_for_quote_section').show();
					}
							
				}
				else
				{
					alert(response.message);
				}
	          }
	        });
		}
		else
		{
			alert('Please answer given question');
			return false;
		}
	}