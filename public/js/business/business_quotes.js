$(document).ready(function(){

	/*****code for search in quote page******/
	$('#bus_search_quotes').submit(function(e){
		e.preventDefault();

		var home_url = $('#home_url').val();
		var quote_status = $(this).find(":selected").val();
		var quote_keyword = $(this).find('.bus_quote_keyword').val();
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

		if(quote_keyword == ''){
	      location.href = home_url+'quote_status='+quote_status;
	    }else{
	      location.href = home_url+'quote_status='+quote_status+'&quote_keyword='+quote_keyword;
	    }

	});/***search submit ends***/

	/********fn to save templates*******/
	$('.save_template').click(function(e){
		e.preventDefault();

		var temp_text = $('#template_text').val();
		if(temp_text == ''){
			alert('Please add Template text');
			return false;
		}

		$('.temp_title').val('');
		$('#showtemplatetitle').modal('show');

	});

	$('.templattitle_submit').click(function(e){
		e.preventDefault();

		var template_title = $('.temp_title').val();
		var temp_text = $('#template_text').val();
		
		var home_url = $('#home_url').val();

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
           	type:'POST',
           	url:home_url+'business_user/quote_template',
           	data:{template_title:template_title, temp_text:temp_text},
           	success:function(data){
           		if(data.success == '1'){
           			alert(data.message);
           			/*****hide button after submit****/
					$('#showtemplatetitle').modal('hide');
           			//return false;
           		}
              	if(data.success == '2'){
              		alert(data.message);
              	}
              	if(data.success == '0'){
              		
              	}
           	}

        });/****ajax ends here****/
		
	});
	/********end fn to save templates*******/


	/*******code for load more on quotes page*********/
	// var display_quotes = $('.all_quote_section').find(".quote_section:visible").length;
	// var total_quote_Section = $('.quote_section').length;
 //    x=3;
 //    $('div.quote_section:lt('+x+')').css('display','block');
 //    $('.load_more').click(function () {
 //        x= (x+5 <= total_quote_Section) ? x+5 : total_quote_Section;
 //        $('div.quote_section:lt('+x+')').css('display','block');
 //    });

    /*$('#showLess').click(function () {
        x=(x-5<0) ? 3 : x-5;
        $('div.quote_section').not(':lt('+x+')').css('display','none');
    });*/
    /*****load more code ends here*****/


    /********rating require code*******/
    $('.submit_reviewr').click(function(e){
      e.preventDefault();

      var check_review_text = $('#business_review_submit').find('.bus_review_text').val();
      var check_rated_star = $('#business_review_submit').find('.hidden_star_active').val();

      if(check_review_text.length == 0){

        $('#business_review_submit').find('.bus_review_text').addClass('error_border');
        $('#business_review_submit').find('.bus_review_text').next('.fill_fields').css('display','block');
        $('#business_review_submit').find('.bus_review_text').next('.fill_fields').text('Please add Review');
        return false;

      }else if(check_review_text.length < 50 || check_review_text.length > 2000){

        $('#business_review_submit').find('.bus_review_text').addClass('error_border');
        $('#business_review_submit').find('.bus_review_text').next('.fill_fields').css('display','block');
        $('#business_review_submit').find('.bus_review_text').next('.fill_fields').text('Please add minimum 50 chars and 2000 maximum');
        return false;
        
      }else if(check_rated_star == '0' || check_rated_star == ''){
        alert('Please rate.');
        return false;
      }else{
      	if(confirm('Are you sure you want to Submit this Rating?')) {
        	$('#business_review_submit').submit();
        }
      }

    });
    /*****rating require code ends*****/


});/******document ready ends here*****/


/******fn to change review*******/
function change_review(data){

	var home_url = $('#home_url').val();
	var status = $(data).attr('data-status');
	var star_id = $(data).attr('data-id');

	$('.hidden_star_active').val('');
	$('.hidden_star_active').val(star_id);

	if(status == "inactive"){
		var i;
		for(i=1; i<=star_id; i++){
			$('#start_'+i).attr('data-status','');
			$('#start_'+i).attr('data-status','active');

			$('#start_'+i).html('');
			$('#start_'+i).html('<img src="'+home_url+'img/active_star.png">');
		}
	}else{

		var last_li_id = $('.review_ul').find( "li" ).last().attr('data-id');
		
		var j;
		for(j=star_id; j<=last_li_id; j++){
			$('#start_'+j).attr('data-status','');
			$('#start_'+j).attr('data-status','inactive');

			$('#start_'+j).html('');
			$('#start_'+j).html('<img src="'+home_url+'img/inactive_star.png">');

			if(star_id == '1'){
		        $('.hidden_star_active').val('');
		        $('.hidden_star_active').val('0');
			}
		}
	}/***end else***/
	
}/*****fn ends here change_review****/

/*****fn to choose template popup******/
function choose_temp(data){
	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
       	type:'POST',
       	url:home_url+'business_user/get_all_templates',
       	success:function(data){
       		if(data.success == '1'){
       			$('#showalltemplates').find('#all_quote_templates').html('');
       			$('#showalltemplates').find('#all_quote_templates').append(data.temphtml);
       			$('#showalltemplates').modal('show');
       		}
          	if(data.success == '2'){
          		alert(data.message);
          		return false;
          	}
          	if(data.success == '0'){
          		
          	}
       	}

    });/*****ajax ends here*****/
}
/*****fn to choose template popup ends******/

/*****fn to use template*****/
function use_template(data){
	var temp_text = $(data).parents('tr').find('.td_temp_text').text();
	
	$('#template_text').val('');
	$('#template_text').val(temp_text);

	$('#showalltemplates').modal('hide');
}/****use template fn ends here****/

/******fn to delete template******/
function delete_template(data){
	var temp_id = $(data).attr('data-temp_id');

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
       	type:'POST',
       	url:home_url+'business_user/quote_template_delete',
       	data:{temp_id:temp_id},
       	success:function(data){
       		if(data.success == '1'){
       			alert(data.message);
       			
       			/****remove table row*****/
				$('table#all_quote_templates tr#'+temp_id).remove();

				var i = 1
			    $('#all_quote_templates tr').each(function(index) {
			        $(this).children('td').first().text(index);
			    });

       			//return false;
       		}
          	if(data.success == '2'){
          		alert(data.message);
          		return false;
          	}
          	if(data.success == '0'){
          		alert(data.message);
          		return false;
          	}
       	}

    });/*****ajax ends here*****/
}
/******fn ends to delete template******/

/****fn to open big images on quote pages***/
function openBigImage(data){
    $('#showBigImageModalBusiness').find('.modal-body').find('img').attr('src','');
    $('#showBigImageModalBusiness').find('.modal-body').find('img').attr('src',$(data).attr('data-image'));
    
    $('#showBigImageModalBusiness').modal('show');
}
/****fn ends to open big images on quote pages***/


/******function to remove error messages on quotes*******/
function remove_errorrmsg(data){
	var value_field = $(data).val();
	var current_id = $(data).attr('id');

	if(current_id == "bus_reviewtext"){
		$(data).next('.fill_fields').css('display','none');
    	$(data).removeClass('error_border');
	}

}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}