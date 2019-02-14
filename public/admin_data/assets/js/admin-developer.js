/********to enable business user status from admin**********/
function enableBusinessUser(data){

  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	var id = $(data).attr('data-id');
  var type = $(data).attr('data-type');
  var urls = $(data).attr('data-url');

	$.ajax({
       	type:'POST',
       	url:urls,
       	data:{id:id, type:type},
       	success:function(data){
          	if(data.success == '1'){
          		alert(data.message);
          	}
          	if(data.success == '0'){
          		alert(data.message)
          	}
       	}
    });
}/****end of function****/

/********to enable business user status from admin**********/
function disableBusinessUser(data){

  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  var id = $(data).attr('data-id');
  var type = $(data).attr('data-type');
  var urls = $(data).attr('data-url');

  $.ajax({
        type:'POST',
        url:urls,
        data:{id:id, type:type},
        success:function(data){
            if(data.success == '1'){
              alert(data.message);
            }
            if(data.success == '0'){
              alert(data.message)
            }
        }
    });
}/****end of function****/


/*******function to approve'/Disapprove users by admin*******/
function approveBusinessUser(data){
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  var id = $(data).attr('data-id');
  var status = $(data).attr('data-status');
  var urls = $(data).attr('data-url');
  
  $.ajax({
        type:'POST',
        url:urls,
        data:{id:id, status:status},
        success:function(data){
            if(data.success == '1'){
              alert(data.message);
            }
            if(data.success == '0'){
              alert(data.message)
            }
        }
    });
}