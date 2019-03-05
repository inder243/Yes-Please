$(document).ready(function(){

	/*****code for search in quote page******/
	$('#search_quotes').submit(function(e){
		e.preventDefault();

		var home_url = $('#home_url').val();
		var quote_status = $(this).find(":selected").val();

		location.href = home_url+'business_user/quotes_questions/'+quote_status;
	});/***search submit ends***/


	/*******code to finish job button*******/
	$('.finish_job_quotes').click(function(e){
		e.preventDefault();

		var home_url = $('#home_url').val();
		var quote_id = $(this).attr('data-quoteid');

		location.href = home_url+'business_user/user_quotereviews/'+quote_id;

	});/*****finish job code ends here******/

	/*******code for load more on quotes page*********/
	var display_quotes = $('.all_quote_section').find(".quote_section:visible").length;
	var total_quote_Section = $('.quote_section').length;
    x=3;
    //$('#myList li:lt('+x+')').show();
    $('div.quote_section:lt('+x+')').css('display','block');
    $('.load_more').click(function () {
        x= (x+5 <= total_quote_Section) ? x+5 : total_quote_Section;
        $('div.quote_section:lt('+x+')').css('display','block');
    });

    /*$('#showLess').click(function () {
        x=(x-5<0) ? 3 : x-5;
        $('div.quote_section').not(':lt('+x+')').css('display','none');
    });*/
    /*****load more code ends here*****/


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
		}
	}/***end else***/
	
}/*****fn ends here change_review****/