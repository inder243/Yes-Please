$(document).ready(function(){

	/*****code for search in quote page******/
	$('#bus_search_questions').submit(function(e){
		e.preventDefault();

		var home_url = $('#home_url').val();
		var ques_status = $(this).find(":selected").val();
		var ques_keyword = $(this).find('.bus_ques_keyword').val();
		var monthval = getParameterByName('month'); // "month"
		var typeval = getParameterByName('type'); // "type"

		home_url = home_url+'business_user/quotes_questions';

		if(monthval!='' && monthval!=undefined && typeval!='' && typeval!=undefined)
		{
			home_url = home_url+'?month='+monthval+'&type='+typeval+'&';
		}
		else
		{
			home_url = home_url+'?';
		}

		if(ques_keyword == ''){
	      location.href = home_url+'ques_status='+ques_status+'&tab=ques';
	    }else{
	      location.href = home_url+'ques_status='+ques_status+'&ques_keyword='+ques_keyword+'&tab=ques';
	    }

	});/***search submit ends***/

});


/****fn to submit answer for question****/
function submitQuestionAnswer(data){

	var get_answer = $('.question_answer').find('.question_answer_text').val();

	if(get_answer == ''){
		$('.question_answer').find('.question_answer_text').addClass('error_border');
		$('.question_answer').find('.question_answer_text').next('.fill_fields').css('display','block');
		$('.question_answer').find('.question_answer_text').next('.fill_fields').text('Please add any text');
		return false;
	}else if(get_answer.length < 100 || get_answer.length > 2000){
		$('.question_answer').find('.question_answer_text').addClass('error_border');
		$('.question_answer').find('.question_answer_text').next('.fill_fields').css('display','block');
		$('.question_answer').find('.question_answer_text').next('.fill_fields').text('Please add text of minimum 100 and maximum 2000 letters');
		return false;
	}else{
		$('.question_answer').find('.question_answer_text').removeClass('error_border');
		$('.question_answer').find('.question_answer_text').next('.fill_fields').css('display','none');
	}


	var question_id = $(data).attr('data-question_id');
	var business_id = $(data).attr('data-business_id');
	var answer_type = $(data).attr('data-answr_type');
	
	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	jQuery('.pre_loader').css('display','block');

	$.ajax({
       	type:'POST',
       	url:home_url+'business_user/question_ans_submit',
       	data:{question_id:question_id, business_id:business_id,get_answer:get_answer,answer_type:answer_type},
       	success:function(data){

       		jQuery('.pre_loader').css('display','none');

       		if(data.success == '1'){
       			window.location.href = home_url+'/'+data.url;

       		}

          	if(data.success == '0'){
          		alert(data.message);
          	}

       	}/***success ends***/

    });/****ajax ends here****/

}/****fn ends here****/


/****fnt o remove error msgs****/
function removeErrorMsgs(data){
	var id = $(data).attr('id');
	var value_field = $(data).val();

	if(id == 'qus_answer'){
		$(data).next('.fill_fields').css('display','none');
    	$(data).removeClass('error_border');
	}

}/***fn to remove errors ends here***/