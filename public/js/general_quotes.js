$(document).ready(function(){

	/*****code for search in quote page******/
	$('#search_quotes').submit(function(e){
		e.preventDefault();

		var home_url = $('#home_url').val();
		var quote_status = $(this).find(":selected").val();
    var quote_keyword = $(this).find('.gen_quote_keyword').val();

    if(quote_keyword == ''){
      location.href = home_url+'general_user/quote_questions/'+quote_status;
    }else{
      location.href = home_url+'general_user/quote_questions/'+quote_status+'/'+quote_keyword;
    }

		
	});/***search submit ends***/

	/*******code for load more on quotes questions page*********/
// 	var display_quotes = $('.all_quote_section').find(".quote_section:visible").length;
// 	var total_quote_Section = $('.quote_section').length;
// //alert(total_quote_Section);
//     if(total_quote_Section <= 5){
//       $('.loadMore').css('display','none');
//     }

//     x=5;
//     $('div.quote_section:lt('+x+')').css('display','block');
//     $('.loadMore').click(function () {
//         x= (x+5 <= total_quote_Section) ? x+5 : total_quote_Section;
//         $('div.quote_section:lt('+x+')').css('display','block');

//         var nowShowing = $('.all_quote_section').find(".quote_section:visible").length;
//         //alert(nowShowing);
//         // if (nowShowing >= total_quote_Section) {
//         //   alert('hhh');
//         //   $('.loadMore').css('display','none');
//         // }
//     });

    /*********fn to accept quote by general user********/
    $('.accept_by_gen').click(function(e){
    	e.preventDefault();

    	var home_url = $('#home_url').val();
    	var quote_id = $(this).attr('data-quote_id');
    	var business_id = $(this).attr('data-business_id');

    	$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });

		$.ajax({
           	type:'POST',
           	url:home_url+'general_user/quote_accept',
           	data:{quote_id:quote_id, business_id:business_id},
           	success:function(data){
           		if(data.success == '1'){
           			location.href = home_url+'general_user/quoteaccepted/'+quote_id;
           			
           		}
              	if(data.success == '2'){
              		alert(data.message);
              	}
              	if(data.success == '0'){
              		alert(data.message);
              	}
           	}

        });/****ajax ends here****/

    });/******accept click ends here******/

     /*********fn to accept quote by general user********/
    $('.ignore_by_gen').click(function(e){
    	e.preventDefault();

    	var home_url = $('#home_url').val();
    	var quote_id = $(this).attr('data-quote_id');
    	var business_id = $(this).attr('data-business_id');

    	$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
           	type:'POST',
           	url:home_url+'general_user/quote_ignore',
           	data:{quote_id:quote_id, business_id:business_id},
           	success:function(data){
           		if(data.success == '1'){
           			location.href = home_url+'general_user/quote_questions/';
           		}
              	if(data.success == '2'){
              		alert(data.message);
              	}
              	if(data.success == '0'){
              		alert(data.message);
              	}
           	}

        });/****ajax ends here****/

    });/******ignore click ends here******/


    /********rating require code*******/
    $('.submit_reviewr').click(function(e){
      e.preventDefault();

      var check_rated_star = $('#general_review_submit').find('.gen_hidden_star_active').val();

      if(check_rated_star == '0' || check_rated_star == ''){
        alert('Please rate us');
        return false;
      }else{
        $('#general_review_submit').submit();
      }

    });
    /*****rating require code ends*****/

    $('.quotes_radio_next').click(function(){
      $('#ask_quote').modal('hide');
    });

    /*****prevent first space on textarea*****/
    $("textarea").on("keypress", function(e) {
        if (e.which === 32 && !this.value.length)
            e.preventDefault();
    });

    $('.desc_work_modal').click(function(e){

      /****check data****/
      var text_desc = $('#work_description').find('.work_description_modal').val();
      if(text_desc == ''){
        $('#work_description').find('.work_description_modal').addClass('error_border');
        $('#work_description').find('.work_description_modal').next('.fill_fields').text('Please add description');
        return false;
      }else if((text_desc).length < 100 || (text_desc).length > 2000){
        $('#work_description').find('.work_description_modal').addClass('error_border');
        $('#work_description').find('.work_description_modal').next('.fill_fields').text('Description must be between 100 and 2000 digits.');
        return false;
      }

      $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          var home_url = $('#home_url').val();

          $.ajax({
              type:'POST',
              url:home_url+'general_user/check_login',
              data:{chk_login:'1'},
              success:function(data){

                
                if(data.success == '1'){
                  
                  $('#work_description').modal('show');
                  $('.describe_work').css('display','none');
                  $('.img_vid_popup').css('display','block');
                }
                if(data.success == '2'){
                  alert(data.message);
                }
                if(data.success == '0'){
                  $('#work_description').modal('hide');
                  $('#general_login').find('#sign_in_general').attr('data-checkstatus','quotessingle');
                  $('#general_login').modal('show');
                }
              }

          });/****ajax ends here****/
      //$('#work_description').modal('hide');
     // $('.describe_work').css('display','none');
      //$('.img_vid_popup').css('display','block');
    });

    $('.skip_pic_vid').click(function(){
      $('.img_vid_popup').css('display','none');
      $('.mobile_phone_pop').css('display','block');
    });

    $('.mobile_validate_submit').click(function(){
        var mobile_filed_val = $('#work_description').find('.mobl_phn').val();
        if(mobile_filed_val == ''){
          $('#work_description').find('.mobl_phn').next('.fill_fields').css('display','block');
          $('#work_description').find('.mobl_phn').next('.fill_fields').text('Please enter Mobile phone.');
          $('#work_description').find('.mobl_phn').addClass('error_border');
          return false;
        }
        if((mobile_filed_val).length < 9 || (mobile_filed_val).length > 15){
          $('#work_description').find('.mobl_phn').next('.fill_fields').css('display','block');
          $('#work_description').find('.mobl_phn').next('.fill_fields').text('Mobile phone must be between 9 and 15 digits.');
          $('#work_description').find('.mobl_phn').addClass('error_border');
          return false;
        }else{
          $('#work_description').find('.mobl_phn').next('.fill_fields').css('display','none');
          $('#work_description').find('.mobl_phn').removeClass('error_border');
        }

        var mobile_filed_val1 = $('#ask_quote').find('.mobl_phn').val();
        if(mobile_filed_val1 == ''){
          $('#ask_quote').find('.mobl_phn').next('.fill_fields').css('display','block');
          $('#ask_quote').find('.mobl_phn').next('.fill_fields').text('Please enter Mobile phone.');
          $('#ask_quote').find('.mobl_phn').addClass('error_border');
          return false;
        }
        if((mobile_filed_val1).length < 9 || (mobile_filed_val1).length > 15){
          $('#ask_quote').find('.mobl_phn').next('.fill_fields').css('display','block');
          $('#ask_quote').find('.mobl_phn').next('.fill_fields').text('Mobile phone must be between 9 and 15 digits.');
          $('#ask_quote').find('.mobl_phn').addClass('error_border');
          return false;
        }else{
          $('#ask_quote').find('.mobl_phn').next('.fill_fields').css('display','none');
          $('#ask_quote').find('.mobl_phn').removeClass('error_border');
        }
    });

    /****on click prev of vid_pic modal***/
    $('.prev_pic_vid').click(function(){
       $('.img_vid_popup').css('display','none');
     $('.describe_work').css('display','block');
    });


});/*****document ready ends****/


/******fn to change review*******/
function gen_change_review(data){

  var home_url = $('#home_url').val();
  var status = $(data).attr('data-status');
  var star_id = $(data).attr('data-id');

  $('.gen_hidden_star_active').val('');
  $('.gen_hidden_star_active').val(star_id);

  if(status == "inactive"){
    var i;
    for(i=1; i<=star_id; i++){
      $('#star_'+i).attr('data-status','');
      $('#star_'+i).attr('data-status','active');

      $('#star_'+i).html('');
      $('#star_'+i).html('<img src="'+home_url+'img/active_star.png">');
    }
  }else{

    var last_li_id = $('.gen_review_ul').find( "li" ).last().attr('data-id');
    
    var j;
    for(j=star_id; j<=last_li_id; j++){
      $('#star_'+j).attr('data-status','');
      $('#star_'+j).attr('data-status','inactive');

      $('#star_'+j).html('');
      $('#star_'+j).html('<img src="'+home_url+'img/inactive_star.png">');

      if(star_id == '1'){
        $('.gen_hidden_star_active').val('');
        $('.gen_hidden_star_active').val('0');
      }
    }
  }/***end else***/
  
}/*****fn ends here change_review****/

/******function to remove error messages on type on registration page*******/
function remove_errmsg(data){

  var value_field = $(data).val();
  var current_id = $(data).attr('id');
  
  if(current_id == "description"){
    if(value_field == ""){
      $(data).next('.fill_fields').css('display','block');
      $(data).addClass('error_border');
      return false;
    }else if((value_field).length < 100 || (value_field).length > 2000){
      $(data).next('.fill_fields').css('display','block');
      $(data).next('.fill_fields').text('Description must be between 100 and 2000 digits.');
      $(data).addClass('error_border');
      return false;
    }else{
      $(data).next('.fill_fields').css('display','none');
      $(data).removeClass('error_border');
    }
  }else if(current_id == "dynamic_description"){
    if(value_field == ""){
      $(data).next('.fill_fields').css('display','block');
      $(data).addClass('error_border');
      return false;
    }else if((value_field).length < 100 || (value_field).length > 2000){
      $(data).next('.fill_fields').css('display','block');
      $(data).next('.fill_fields').text('Description must be between 100 and 2000 digits.');
      $(data).addClass('error_border');
      return false;
    }else{
      $(data).next('.fill_fields').css('display','none');
      $(data).removeClass('error_border');
    }
  }else if(current_id == "mobile_phone"){
    if(value_field == ""){
      $(data).next('.fill_fields').css('display','block');
      $(data).next('.fill_fields').text('Please enter Mobile phone.');
      $(data).addClass('error_border');
      return false;
    }else{
      $(data).next('.fill_fields').css('display','none');
      $(data).removeClass('error_border');
    }

    if((value_field).length < 9 || (value_field).length > 15){
      $(data).next('.fill_fields').css('display','block');
      $(data).next('.fill_fields').text('Mobile phone must be between 9 and 15 digits.');
      $(data).addClass('error_border');
      return false;
    }else {
      $(data).next('.fill_fields').css('display','none');
      $(data).removeClass('error_border');
    }
  }else if(current_id == "dynamic_mobile_phone"){
    if(value_field == ""){
      $(data).next('.fill_fields').css('display','block');
      $(data).next('.fill_fields').text('Please enter Mobile phone.');
      $(data).addClass('error_border');
      return false;
    }else{
      $(data).next('.fill_fields').css('display','none');
      $(data).removeClass('error_border');
    }

    if((value_field).length < 9 || (value_field).length > 15){
      $(data).next('.fill_fields').css('display','block');
      $(data).next('.fill_fields').text('Mobile phone must be between 9 and 15 digits.');
      $(data).addClass('error_border');
      return false;
    }else {
      $(data).next('.fill_fields').css('display','none');
      $(data).removeClass('error_border');
    }
  }else if(value_field == ""){
    $(data).next('.fill_fields').css('display','block');
    $(data).addClass('error_border');
    return false;
  }else{
    $(data).next('.fill_fields').css('display','none');
    $(data).removeClass('error_border');
  }

}