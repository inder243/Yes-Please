$(document).ready(function(){

	$('.how_ask_qus').click(function(e){
		e.preventDefault();
		/***open describe question popup***/
		$('#ask_question').find('.how_to_ask').css('display','none');
		$('#ask_question').find('.descrptn_qus').css('display','block');
	});

	$('.descr_ques').click(function(e){
		e.preventDefault();

		/*****validations for title*****/
		var question_title 	= $('#ask_question').find('.descrptn_qus').find('.question_title').val();
		
		if(question_title == ''){
			$('#ask_question').find('.descrptn_qus').find('.question_title').addClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').css('display','block');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').text('Please add title');
	        return false;
		}else if((question_title).length < 10 || (question_title).length > 100){
	        $('#ask_question').find('.descrptn_qus').find('.question_title').addClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').css('display','block');
	        $('#ask_question').find('.descrptn_qus').find('.question_title').next('.fill_fields').text('Title must be between 10 and 100 digits.');
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
		}else if((question_description).length < 100 || (question_description).length > 1000){
	        $('#ask_question').find('.descrptn_qus').find('.question_description').addClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').css('display','block');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').text('Description must be between 100 and 1000 digits.');
	        return false;
		}else{
	        $('#ask_question').find('.descrptn_qus').find('.question_description').removeClass('error_border');
	        $('#ask_question').find('.descrptn_qus').find('.question_description').next('.fill_fields').css('display','none');
		}

		$('#ask_question').find('.descrptn_qus').css('display','none');
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

		//var home_url = $('#home_url').val();
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
								$('#ask_question').find('.Question_sent').css('display','block');
			           		}

			           		if(data.success == 0){
			           			alert(data.message);
			           		}

			           	}

					});/****ajax ends to submit question data****/
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
});

/****fn to remove error messages****/
function removeErrmsgs(data){
	
	var value_field = $(data).val();
	var current_id = $(data).attr('id');

	if(current_id == "single_ques_title"){

		$(data).removeClass('error_border');
		$(data).next('.fill_fields').css('display','none');

	}else if(current_id == "single_ques_desc"){

		$(data).removeClass('error_border');
		$(data).next('.fill_fields').css('display','none');

	}
}