$(document).ready(function(){
	var home_url = $('#home_url').val();
	var pageURL = window.location.href;
	var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
	$('.datetimepicker').datetimepicker({
		format: 'HH:mm'
	});

	$('.reg_step7_submit').click(function(){
		if (!$('#register_schedule #agree').is(':checked')) {
			$('#register_schedule #agree').siblings('.outside_checkbox').attr('style','border:2px solid red'); 
			$('#register_schedule .bu_error_terms').html('Please agree with terms');
			return false;
		}else{
			var empty = 'false';
			$('#register_schedule .total_weekdays .form-control').each(function(){
				if($(this).val() != ''){
					empty = 'true';
				}
			});
			if(!$('#register_schedule #available').is(':checked') && empty == 'false'){
				$('#register_schedule .bu_error_hours').html('Please select any option from following');
				return false;
			}			
			$('#register_schedule').submit();
		}		
	});
	$('.category_search').keyup(function(){
		var input_text = $(this).val();
		//if(input_text != ''){
			var home_url = $('#home_url').val();
			var pageURL = window.location.href;
			var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
			
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
			$.ajax({
				url: home_url+'business_user/category_search/'+user_id,
				type: 'POST',
				data:{user_id:user_id,input_text:input_text},
				success:function(response){
					$('.category_list_dynamic ul').html(response);
				}
			});	
		//}
	});


	$('#forgot_password').click(function(e){
		e.preventDefault();
		var email = $('.text_email').val();
		var token = $("input[name=_token]").val();
		jQuery('.pre_loader').css('display','block');
		$.ajax({

			url: home_url+'business_user/check_admin_email_exists',
			type: 'POST',
			data:{email:email,"_token":token},
			success:function(response){ 
				jQuery('.pre_loader').css('display','none');
				if(response == 'true'){
					alert('User not found.');
				}else{
					$('#forgot_password_admin').submit();
				}
			}
		});

	});

	$(document).on('change', '.file_to_upload input[name=myfile]', function(){
		var file_name = $(this).val().replace(/C:\\fakepath\\/i, '');
		$('.registrationform .upload_file_section #msg').html('<b>'+file_name+'</b> is selected.');
	});

	/*$('.business_step_5_submit').click(function(){
		if(!$('.registrationform input[name="send_question"]').is(':checked') && !$('.registrationform input[name="send_schedule"]').is(':checked')){
		//if($('.registrationform textarea[name="send_question"]').val() == ''){
			$('.registrationform .outside_checkbox').css('border','2px solid #ff0900');
			$('.registrationform .fill_fields').html('Please mark a checkbox');
			return false;
		}else{
			$('#my-awesome-dropzone').submit();
		}
	});*/

	
});

/******function to show selected categories and sub categories in next box******/
function categoriesselect(data){
	var pageURL = window.location.href;
	var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
	var home_url = $('#home_url').val();
	var category_id = $(data).attr('id');
	var category_type = $(data).attr('data-cat');
    var result='';
    var sub_cat_name = '';
    var sub_cat_id = '';
	if(category_type == 'sub'){
		var parent_id = $(data).parents('li').find('.categories').attr('id');
		var category_name = $(data).html();
		var parent_cat_name = $(data).parents('li').find('.categories').html();
		if(checkIfCategoryExists_reg(parent_id)){
			var exists = false;
			$('.added_category ul li .categories').each(function() {
				var search_id  = $(this).attr('id');
				if(search_id == parent_id){					
					$(this).siblings('.subcategories').find('li').each(function(){
						sub_cat_id = $(this).find('a').attr('id');
						if(sub_cat_id == category_id){
							exists = true;
						}
					});
					if(exists == false){						
						ajaxRequest_reg(user_id,parent_id,category_id); //Ajax request
						$(this).siblings('.subcategories').append('<li><a href="javascript:;" id="'+category_id+'" data-cat="sub">'+category_name+'</a><span class="cross_category_reg"><img src="'+home_url+'img/category_cancel.png" class="img-fluid"></span></li>');

					}
				}
			});
			if(exists == false){
				//$(data).siblings('.checked_category').show();
				$(data).siblings('.checked_category').attr('style','display:block');
			}
		}else{	
			if(checkNoOfCategories_reg() <= 10){
				ajaxRequest_reg(user_id,parent_id,category_id); //Ajax request		
				$('.added_category_list_heading .added_category ul.added_category_ul').append('<li><a href="javascript:;" id="'+parent_id+'" data-cat="parent" class="categories">'+parent_cat_name+'</a><span class="cross_category_reg"><img src="'+home_url+'img/category_cancel.png" class="img-fluid"></span><ul class="subcategories"><li><a href="javascript:;" id="'+category_id+'" data-cat="sub">'+category_name+'</a><span class="cross_category_reg"><img src="'+home_url+'img/category_cancel.png" class="img-fluid"></span></li></ul></li>');
				$(data).siblings('.checked_category').attr('style','display:block');
			}else{
				$('.forerror').addClass('disp_none');
			}
		}

	}else{
		if(checkIfCategoryExists_reg(category_id) == false){
			if(checkNoOfCategories_reg() <= 10){
				var category_name = $(data).html();
				var sub_cat = $(data).next('.subcategories').html();
				result = '<li><a href="javascript:;" id="'+category_id+'" data-cat="parent" class="categories">'+category_name+'</a><span class="cross_category_reg"><img src="'+home_url+'img/category_cancel.png" class="img-fluid"></span>';
				result += '<ul class="subcategories">';
				if($(data).next('.subcategories').find('li').length == 0){
					ajaxRequest_reg(user_id,category_id,1); //Ajax request
				}
				$(data).next('.subcategories').find('li').each(function() {
					sub_cat_name = $(this).find('a').html();
					sub_cat_id = $(this).find('a').attr('id');
					$(this).find('.checked_category').show();

					ajaxRequest_reg(user_id,category_id,sub_cat_id); //Ajax request

					result +=  '<li><a href="javascript:;" id="'+sub_cat_id+'" data-cat="sub">'+sub_cat_name+'</a><span class="cross_category_reg"><img src="'+home_url+'img/category_cancel.png" class="img-fluid"></span></li>';			
				});
				result += '</li>';
				$('.added_category_list_heading .added_category ul.added_category_ul').append(result);
			}else{
				$('.forerror').removeClass('disp_none');
			}
		}
	}
	$('.added_category_list').removeClass('error');
	$('.fill_fields').addClass('disp_none');
	$('.add_cat_list').removeClass('error');
	$('.forerror').addClass('addcategory');
	if($('.added_category_list_heading .added_category ul.added_category_ul').html() != ''){
		$('#no_categories').hide();
	}

	//if main category select the all main and sub cat selected
}
function ajaxRequest_reg(user_id,category_id,sub_cat_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/add_business_user_category',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,sub_cat_id:sub_cat_id},
		success:function(){

		}
	});	
}

function checkIfCategoryExists_reg(category_id){
	var exists = false;
	$('.added_category ul li .categories').each(function() {
		var search_id = $(this).attr('id');
		if(category_id == search_id){
			exists = true;
		}
	});
	return exists;
}
function checkNoOfCategories_reg(){
	var count = 1;
	$('.added_category ul li .categories').each(function() {
		count++;
	});
	return count;
}

$(document).on('click', '.cross_category_reg', function(){
	var pageURL = window.location.href;
	var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
	var category_type = $(this).siblings('a').attr('data-cat');
	var id = $(this).siblings('a').attr('id');
	if(category_type == 'parent'){

		// if($('.category_list_dynamic ul li .categories').length == 0){
		// 	alert('fkjkj');
		// }
		$('.category_list_dynamic ul li .categories').each(function(){
			var search_parent_id = ($(this).attr('id'));
			if(id == search_parent_id){
				 //Remove Request
				if($(this).siblings('.subcategories').find('li').length == 0){
					ajaxRemoveRequest_reg(user_id,id,1); //Remove Request
				}
				$(this).siblings('.subcategories').find('li').each(function(){		
					var sub_cat_id = $(this).find('a').attr('id'); 
					ajaxRemoveRequest_reg(user_id,id,sub_cat_id); //Remove Request
				 	$(this).find('.checked_category').attr('style','display:none');
				});
			}
		});
		$(this).parents('li').remove();
	}else{
		var parent_id = $(this).parents('li').find('.categories').attr('id');
		var found = false;
		$('.category_list_dynamic ul li .categories').each(function(){
			var search_parent_id = ($(this).attr('id'));
			if(parent_id == search_parent_id){
				$(this).siblings('.subcategories').find('li').each(function(){
					var search_sub_id = $(this).find('a').attr('id');
					if(search_sub_id == id){
						found = true;
						ajaxRemoveRequest_reg(user_id,parent_id,id); //Remove Request
						$(this).find('.checked_category').attr('style','display:none');
					}
				 	//$(this).find('.checked_category').attr('style','display:none');
				});
			}
		});
		if(found){
			$(this).closest('li').remove();
		}
	}
	if($('.added_category_list_heading .added_category ul.added_category_ul li').length == 0){
		$('#no_categories').show();
	}
	//alert($(this).siblings('a').attr('id'));
});

function ajaxRemoveRequest_reg(user_id,category_id,sub_cat_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/remove_business_user_category',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,sub_cat_id},
		success:function(){

		}
	});	
}

$('.reg_step3_submit').click(function(){
	var pageURL = window.location.href;
	var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
	var home_url = $('#home_url').val();
	if($('.added_category_list_heading .added_category ul.added_category_ul li').length == 0){
		$('.add_cat_list').addClass('error');
		$('.fill_fields').removeClass('disp_none');
		$('.forerror').removeClass('addcategory');

	}else{
		$('#stepthree_bu_reg').submit();
		//window.location.href = home_url+'business_user'+'/register_four/'+user_id;
	}
	
});
var home_url = $('#home_url').val();
var pageURL = window.location.href;
var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var myDropzone = new Dropzone("div#myId", { 
	addRemoveLinks: true,
	removedfile: function(file) {
	   // var name = file.name;  
	   /*******code to get name of image that is created to save in folder*******/      
	    var name = file.previewElement.id; 
	    var img_name = name.split(".");
	    $('#my-awesome-dropzone').find('.hidden_new_image'+img_name[0]).remove();
	    
	    $.ajax({
	        type: 'POST',
	        url: home_url+"/business_user/removeimgreg",
	        data: "id="+name,
	        dataType: 'html'
	    });

	    
	 	// $('#dropzone_form').append('<input type="hidden" id="'+response+'" name="dropzone_file[]" value="" >');
		// $( ".dz-error-mark svg:last-child" ).attr('data-id',response);

		var _ref;
		return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
	},
	url: home_url+"/business_user/upload_user_multiple_files/"+user_id,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				addRemoveLinks: true,
				
				success: function(file, response){
					//console.log(file);
					if(response != "false"){

						/*******code to get name of image that is created to save in folder*******/
						file.previewElement.id = response;
						var img_name = response.split(".");

						$('#my-awesome-dropzone').append('<input type="hidden" class="hidden_new_image'+img_name[0]+'" id="'+response+'" name="dropzone_file[]" value="'+response+'" >');
						$( ".dz-error-mark svg:last-child" ).attr('data-id',response);
						setTimeout(function(){
							$('#my-awesome-dropzone').find('.dz-preview').each(function(){
								$(this).find('.dz-remove').text('');
								$(this).find('.dz-remove').text('x');
							});
						}, 1000);

						return true;
					}
        			$('.registrationform .upload_file_section .drag_file a').hide();
    			},
    			async: false
    // 			complete: function(file){
    // 				console.log('response');
				// 	console.log(response);
				// }
			});

 myDropzone.on("addedfile", function(file) {
    var fileType = file.type;
    if(fileType.indexOf('video') !== -1){
    	$( "#myId div.dz-preview:last .dz-image img").attr('src',home_url+'img/vedio_thumb.png');
    }
  });

$('.drag_file').click(function(){
	//alert($('.drag_file input[name^=file]').html());
	$('.drag_file input[name^=file]').trigger('click');
});

// $(document).on('click', '.upload_file_section .dz-preview .dz-error-mark', function(){
// 	alert('dfd');
// });




