//this function will be used when info of previous month,next month will be fetched
function getOtherMonthData(month,year)
{
  jQuery('.pre_loader').css('display','block');
	var home_url = $('#home_url').val();
	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
       	type:'POST',
       	url:home_url+'business_user/advertisement_dashboard',
       	data:{month:month, year:year},
       	success:function(result){
       		
       			$(".maindivForSections").html(result);
       		
          	jQuery('.pre_loader').css('display','none');
       	}

    });
}