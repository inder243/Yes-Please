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


  $( function() {
    $( "#edate" ).datepicker();//intialize datepicker
    $( "#edate" ).datepicker( "option", "dateFormat",'yy-mm-dd');//set format
    $( "#edate" ).datepicker( "option",  "minDate", "+1" );//hide past and today date

  } );

$('#form_add_topad_submit').click(function(e){
  e.preventDefault();

  $('#form_add_topad .alert-danger').hide();
  $('#form_add_topad .alert-success').hide();
  $('#form_add_topad .alert-danger').text('');
  $('#form_add_topad .alert-success').text('');

  var name = $.trim($('#inputEmail4').val());
  var payperclick =  $.trim($('#payperclick').val());
  var dbudget =$.trim($('#dbudget').val());
  var edate = $.trim($('#edate').val());

  var cats = [];
  $('#catlist li input:checked').each(function() {
    cats.push($(this).val());
  });
  
  if(name=='')
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Please provide campaign name');
    return false;
   
  }
  else if(cats.length<=0)
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Please choose atleast one category');
    return false;
  }
  else if(payperclick=='')
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Please provide pay per click value');
    return false;
  }
  else if(parseInt(payperclick)<=0)
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Please provide pay per click valid value');
    return false;
  }
  else if(dbudget=='')
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Please provide daily budget');
    return false;
  }
  else if(parseInt(dbudget)<=0)
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Please provide valid daily budget');
    return false;
  }
  else if(parseInt(dbudget)<10)
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Daily budget should be minimum 10 NIS.');
    return false;
  }
  else if(parseInt(dbudget)<parseInt(payperclick))
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Daily budget should be greater than payperclick');
    return false;
  }
  else if(edate=='')
  {
    $('#form_add_topad .alert-danger').show();
    $('#form_add_topad .alert-danger').text('Please provide end date');
    return false;
  }

  $('#form_add_topad').submit();

});
