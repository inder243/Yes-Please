$(document).ready(function(){

	$('.how_ask_qus').click(function(e){
		e.preventDefault();
		/***open describe question popup***/
		$('#ask_question').find('.how_to_ask').css('display','none');
		$('#ask_question').find('.descrptn_qus').css('display','block');
	});


	/*****code for search in questions page******/
	$('#search_questions').submit(function(e){
		e.preventDefault();

		var home_url = $('#home_url').val();
	    var ques_keyword = $(this).find('.gen_ques_keyword').val();

	    location.href = home_url+'general_user/quote_questions?ques_keyword='+ques_keyword+'&tab=ques';
		
	});/***search submit ends***/

	/****on click of mark as answered button*****/
	$('.mark_asnwered').click(function(e){
		e.preventDefault();
		var home_url = $('#home_url').val();

		var star_checked = '0';
		/****make all star inactive*****/
		$('.all_answers_bus li').each(function(){

			var status = $(this).find('.chat_call_sec').find('.rate_this').attr('data-status');

			if(status == 'active'){
				var business_id = $(this).find('.chat_call_sec').find('.rate_this').attr('data-business_id');
				var question_id = $(this).find('.chat_call_sec').find('.rate_this').attr('data-question_id');

				star_checked = '1';


				$.ajaxSetup({
				    headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
		  		});

		  		if (confirm('Are you sure you mark this as Answered')) {
		  		  $.ajax({
		         	type:'POST',
		         	url:home_url+'general_user/markanswered',
		         	data:{business_id:business_id, question_id:question_id},
		         	success:function(data){
		         		if(data.success == '1'){
		         			location.href = home_url+'general_user/quote_questions?tab=ques';
		         		}
			          	if(data.success == '2'){
			          		alert(data.message);
			          	}
			          	if(data.success == '0'){
			          		alert(data.message);
			          	}
		         	}

		        });/****ajax ends here****/

		      }/***confirm ends***/

			}/****if status active ends****/

		});	

		if(star_checked == '0'){
			alert('Star the correct answer and the question will be marked as answered');
		}
	});
	/****on click of mark as answered button ends*****/


	$('.descr_ques').click(function(e){
		e.preventDefault();

		/*****validations for title*****/
		var question_title 	= $('#ask_question').find('.descrptn_qus').find('.question_title').val();
		
		if(question_title == ''){
			$('#ask_question').find('.descrptn_qus').find('.question_title').addClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').css('display','block');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').text('Please add title');
	        return false;
		}else if((question_title).length < 10 || (question_title).length > 30){
	        $('#ask_question').find('.descrptn_qus').find('.question_title').addClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').css('display','block');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').text('Title must be between 10 and 30 digits.');
	        return false;
		}else{
	        $('#ask_question').find('.descrptn_qus').find('.question_title').removeClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').css('display','none');
		}

		/******validations for decsription*******/
		var question_description = $('#ask_question').find('.descrptn_qus').find('.question_description').val();

		if(question_description == ''){
			$('#ask_question').find('.descrptn_qus').find('.question_description').addClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').css('display','block');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').text('Please add decsription');
	        return false;
		}else if((question_description).length < 100 || (question_description).length > 2000){
	        $('#ask_question').find('.descrptn_qus').find('.question_description').addClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').css('display','block');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').text('Description must be between 100 and 2000 digits.');
	        return false;
		}else{
	        $('#ask_question').find('.descrptn_qus').find('.question_description').removeClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').css('display','none');
		}

		$('#ask_question').find('.descrptn_qus').css('display','none');
		$('#ask_question').find('.img_vid_popup').css('display','block');
		//$('#ask_question').find('.similar_result_qus').css('display','block');


		/******display images on select image*****/
		$('#ask_question .select_single_ques_img').change(function(e){
			e.preventDefault();

			var images = e.target.files;
			//$('.reg_img_msg').text('');
			var name='';
			var count = 0;
			$.each( images, function( key, value ) {
				if(count > 0){
					name += value.name+', ';
				}else{
					name = value.name+', ';
				}
				count++;
				$('#ask_question .registrationform .drag_option_main').find('#msg').append(value.name+', ');

				if(count > 0){
					$('#ask_question .img_vid_popup .P_N_btn a.skip_btn_imgs').text('Next');
				}
			});

		});/*******display images code ends here*******/
	});/****descr_ques click ends****/


	$('.skip_btn_imgs').click(function(e){
		e.preventDefault();
		$('#ask_question').find('.img_vid_popup').css('display','none');
		$('#ask_question').find('.similar_result_qus').css('display','block');

	});


	/*********close popup on cross********/
    $('.close_single_questions').click(function(e){
      e.preventDefault();
      location.reload();
    });
	
	$('.no_send_ques').click(function(e){
		e.preventDefault();

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		var home_url = $('#home_url').val();
		var ask_qus_url 			= $('#ask_question').find('.ask_qus_url').val();
		
		var question_title 			= $('#ask_question').find('.descrptn_qus').find('.question_title').val();
		var question_description 	= $('#ask_question').find('.descrptn_qus').find('.question_description').val();
		var hidden_cat_name 		= $('#ask_question').find('.hidden_cat_name').val();
		var hidden_cat_id 			= $('#ask_question').find('.hidden_cat_id').val();
		
		data = new FormData();
		data.append('question_title',question_title);
		data.append('question_description',question_description);
		data.append('hidden_cat_name',hidden_cat_name);
		data.append('hidden_cat_id',hidden_cat_id);
		
		jQuery('.pre_loader').css('display','block');
		
		/*****Check if user is logged in or not****/
		$.ajax({
			type:'POST',
			url:home_url+'general_user/check_login',
			data:{chk_login:'1'},
			success:function(data){
				jQuery('.pre_loader').css('display','none');
				if(data.success == '1'){

					/***user logged in****ajax to submit question data****/
					$('#ask_question').find('.descrptn_qus').css('display','none');
					$('#ask_question').find('.similar_result_qus').css('display','none');
					$('#ask_question').find('.mobile_phn_pop').css('display','block');
					
				}

				if(data.success == '0'){
					$('#ask_question').modal('hide');
					$('#general_login').find('#sign_in_general').attr('data-checkstatus','questionsingle');
					$('#general_login').modal('show');
					return false;
				}
			}

			});/****ajax ends here****/
          

        /***** end code for Check if user is logged in or not****/


	});

	/********Submit on validate/dont_want mobile*******/
	$('.SubmitSingleQues').click(function(e){
		e.preventDefault();

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		if (grecaptcha.getResponse() == ''){
			alert('Please verify Recaptcha');
			// $('#ask_question').find('.mobile_phn_pop').find('.recaptcha_error').css('display','block');
			// $('#ask_question').find('.mobile_phn_pop').find('.recaptcha_error').text('Please verify Recaptcha');
			return false;
		}


		var validate_mob_check 		= $(this).attr('name');

		var ask_qus_url 			= $('#ask_question').find('.ask_qus_url').val();
		
		var question_title 			= $('#ask_question').find('.descrptn_qus').find('.question_title').val();
		var question_description 	= $('#ask_question').find('.descrptn_qus').find('.question_description').val();
		var hidden_cat_name 		= $('#ask_question').find('.hidden_cat_name').val();
		var hidden_cat_id 			= $('#ask_question').find('.hidden_cat_id').val();
		var phone_number            = $('#ask_question').find('.mobile_phn_pop').find('.mobl_phn').val();


		var multipleBusiness = [];
		var question_type = '';

		if(window.location.href.indexOf("dashboard/catid") > -1) {

			/*****code to get selected business users****/
			var listItems = $(".all_bus_by_cat li");
	      	
			listItems.each(function(idx, li) {
		    
			   selectedli = $(li).find('.select_this');
			   selectedChk = $(selectedli).find('input[type=checkbox]');
			   chkBoxId = $(selectedChk).attr('id');

			   if($('#' + chkBoxId).is(":checked")){
			   		multipleBusiness.push($('#' + chkBoxId).attr('data-title'));
			   }
			  	    	
			});
			/*****code ends here to get selected business users*****/
			question_type = 'multiple';

		}else{
			multipleBusiness = [];
			question_type    = 'single';
		}
		
		//console.log(multipleBusiness);return false;

		data = new FormData();
		data.append('question_title',question_title);
		data.append('question_description',question_description);
		data.append('hidden_cat_name',hidden_cat_name);
		data.append('hidden_cat_id',hidden_cat_id);
		data.append('validate_mob_check',validate_mob_check);
		data.append('phone_number',phone_number);
		data.append('question_type',question_type);
		data.append('multipleBusiness',multipleBusiness);

		jQuery('.pre_loader').css('display','block');

		/*****append images****/
		error='';
			
		var files = $('#single_ques_imgs')[0].files;
		for(var count = 0; count<files.length; count++){

			var name = files[count].name;
			var extension = name.split('.').pop().toLowerCase();

			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1){
				error += "Invalid " + count + " Image File"
			}else{
				data.append("files[]", files[count]);
			}
		}



		jQuery('.pre_loader').css('display','block');

		/******ajax starts*****/
		$.ajax({
			type:'POST',
           	url:ask_qus_url,
           	data:data,
           	contentType: false,
			cache: false,
			processData:false,
           	success:function(data){
           		jQuery('.pre_loader').css('display','none');
           		if(data.success == 1){
           			$('#ask_question').find('.descrptn_qus').css('display','none');
					$('#ask_question').find('.similar_result_qus').css('display','none');
					$('#ask_question').find('.mobile_phn_pop').css('display','none');
					$('#ask_question').find('.Question_sent').css('display','block');
           		}

           		if(data.success == 0){
           			alert(data.message);
           		}

           	}

		});/****ajax ends to submit question data****/

	});
});

/****fn to remove error messages****/
function removeErrmsgs(data){
	
	var value_field = $(data).val();
	var current_id = $(data).attr('id');

	if(current_id == "single_ques_title"){

		$(data).removeClass('error_border');
		$(data).next('.fill_fields').css('display','none');

	}else if(current_id == "single_ques_desc"){

		var total_length = value_field.length;
		$('#ask_question').find('.descrptn_qus p').text();
		$('#ask_question').find('.descrptn_qus p').text('('+total_length+'/2000 letters)');
		$(data).removeClass('error_border');
		$(data).next('.fill_fields').css('display','none');

	}
}/****remove error msg ends here***/

/***fn to mark as answered from star click***/
function markAnswered(data){

	var home_url = $('#home_url').val();

	/****make all star inactive*****/
	$('.all_answers_bus li').each(function(){

		$(this).find('.chat_call_sec').find('.rate_this').attr('data-status','');
		$(this).find('.chat_call_sec').find('.rate_this').attr('data-status','inactive');
		$(this).find('.chat_call_sec').find('.rate_this').html('');
		$(this).find('.chat_call_sec').find('.rate_this').html('<img src="'+home_url+'img/best.png">');

	});

	var status = $(data).attr('data-status');

	if(status == 'inactive'){

		$(data).attr('data-status','');
		$(data).attr('data-status','active');
		$(data).html('');
		$(data).html('<img src="'+home_url+'img/active_star.png">');

	}else{

		$(data).attr('data-status','');
		$(data).attr('data-status','inactive');
		$(data).html('');
		$(data).html('<img src="'+home_url+'img/best.png">');

	}
	
}/**fn ends star asnwered**/

