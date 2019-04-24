$(document).ready(function(){
	var home_url = $('#home_url').val();
	var pageURL = window.location.href;
	var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
	$('.datetimepicker').datetimepicker({
		format: 'HH:mm'
	});

	/******display images on select image*****/
	$('.select_reg_img').change(function(e){
    	e.preventDefault();
		var images = e.target.files;
		$('.reg_img_msg').text('');
		$.each( images, function( key, value ) {
		  	$('.reg_img_msg').append(value.name+', ');
		});

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


	var inc_cat_id = $(data).attr('inc_id');



	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
	$.ajax({


		url: home_url+'business_user/getFormsData/'+user_id,
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,inc_cat_id:inc_cat_id},
		dataType:'json',
		success:function(data){
			
			if(data['success']==1)
			{
				$('.login_body_main').show();
				$('.cat_html_dataa').show();
				$('.ask_for_quote_section').hide();
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').html('');
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').html(data['html']);
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').addClass('text-center');
				$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').prepend('<span class="text-error"></span>');
				$('#openPopUpForQuestion').modal('show');
				$('#getBuid').val(user_id);
				$('#getcatid').val(category_id);
				
			}


		},error: function() { alert("Error posting feed."); }
	});	


 
	var category_type = $(data).attr('data-cat');


    var result='';
    var sub_cat_name = '';
    var sub_cat_id = '';
	if(category_type == 'sub'){
		var parent_id = category_id;
		var category_name = $(data).html();
		var parent_cat_name = $(data).parents('.subcategories').parent().find('.categories').html();
		if(!checkIfCategoryExists_reg(parent_id)){	

			if(checkNoOfCategories_reg() <= 10){
				var length = $('.added_category_list_heading .added_category ul').length;
				//alert(length);
				$('.added_category_list_heading .added_category ul.added_category_ul').append('<li><a href="javascript:;" id="'+category_id+'" data-cat="parent" class="categories">'+category_name+'</a><span class="cross_category_reg"><img src="'+home_url+'img/category_cancel.png" class="img-fluid"></span></li>');
				ajaxRequest_reg(user_id,category_id);
				$(data).siblings('span.checked_category').attr('style','display: block;');
				$('#no_categories').hide();
			}else{
				$('.forerror').addClass('disp_none');
			}
		}

	}
}
function ajaxRequest_reg(user_id,category_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/add_business_user_category',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id},
		success:function(){

		}
	});	
}

function checkIfCategoryExists_reg(category_id){
	var exists = false;
	// $('.added_category ul li .categories').each(function() {
	// 	var search_id = $(this).attr('id');
	// 	if(category_id == search_id){
	// 		exists = true;
	// 	}
	// });
	$('.added_category_ul li a').each(function() {
		var search_id = $(this).attr('id');
		if(category_id == search_id){
			exists = true;
		}
	});
	
	return exists;
}
function checkNoOfCategories_reg(){
	var count = 1;
	$('.added_category_ul li .categories').each(function() {
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
		if(confirm('Do you want to delete ?')){	
			//$(".category_list_dynamic ul").find("a#" + horaInicial)
			$(this).parents('li').remove();	
			$(".category_list_dynamic ul").find("a#" + id).siblings('.checked_category').hide();
			ajaxRemoveRequest_reg(user_id,id);
		}		
	}
});

function saveCategoryData()
{
	var services =[];
	$('#openPopUpForQuestion .cat_html_dataa .form-ques').each(function(i, obj) {

		var data_type = $(this).attr('data-type');

		var data_id   = $(this).attr('data-id');

		console.log(data_type);
		console.log(data_id);

		if(data_type == "dropdown")
		{
			var selected= {};

			var chkboxId = "dynamicQues_"+data_id;
			var text =  $('.'+chkboxId+' option:selected').text();
			 selected['type'] = data_type;
			if(text !== '')
			{
            	selected['text']= text;
        	}
	        

			services.push(selected);


		}
		else if(data_type == "checkbox")
		{
			var selected= {};
			var chkboxId = "dynamicQues_"+data_id;
			selected['type'] = data_type;

        	var selectedtext = $('.'+chkboxId+' input:checked').map(function() {
            return  $(this).parents('label').find('p').text();
        	}).get().join(',');

            selected['text']= selectedtext;
			
			services.push(selected);

		}
		else if(data_type == "radio")
		{

			var selected= {};
			var radioValue = $(this).find("input[name='radios"+data_id+"[]']:checked").parents('label').find('p').text();
			 selected['type'] = data_type;
			if(radioValue !== ''){
				selected['text']= radioValue;
			}
			// var radioValue = $('#openPopUpForQuestion').find('.modal-body').find('.form-ques').find("input[name='radios"+data_id+"[]']:checked").text();      
			services.push(selected);
		}
		else if(data_type == "textbox")
		{
			var selected= {};
			var text = $(this).val();
			 selected['type'] = data_type;
			if(radioValue !== ''){
				selected['text']= text;
			}
			// var radioValue = $('#openPopUpForQuestion').find('.modal-body').find('.form-ques').find("input[name='radios"+data_id+"[]']:checked").text();      
			services.push(selected);
		}
    
	});

		
	console.log(services);
	if(services.length == 0){
		$(data).parents('.modal-body').find('.text-error').text('Please select an element.');
	}else{
		var user_id = $('#getBuid').val();
		var category_id = $('#getcatid').val();
		ajaxRequest_service(user_id,category_id,services);
		$('#openPopUpForQuestion').modal('hide');
	}
	// alert($(data).attr('data-id'));

	// alert(data_id);

	// alert(data_type);
}

function ajaxRequest_service(user_id,category_id,services){
	var home_url = $('#home_url').val();
	services = JSON.stringify(services);
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/add_selected_service',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id,selected:services},
		success:function(){

		}
	});
}

function ajaxRemoveRequest_reg(user_id,category_id){
	var home_url = $('#home_url').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.ajax({
		url: home_url+'business_user/remove_business_user_category',
		type: 'POST',
		data:{user_id:user_id,category_id:category_id},
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

//event will be called each time next button is clicked
	function getNextQuesButton(catid){

		
		var site_url   = $('#home_url').val();
		
		var lastdiv = $('.cat_html_dataa .form-ques:visible');//get last question
		
		console.log(lastdiv);

		var qid = $(lastdiv).attr('data-id');//get id of question
		var qtype = $(lastdiv).attr('data-type');//get type of question
		var value = '';
		if(qtype=="textbox" || qtype=="datepicker" || qtype=="timepicker")//get value of textbox/datepicker/timepicker
		{
			var value = $(lastdiv).find(':input').val();
		}
		if(qtype=="textarea")//get value of textbox
		{
			var value = $(lastdiv).find('textarea').val();
		}
		else if(qtype=="radio")//get value of radio
		{
			$(lastdiv).find('input[type=radio]').each(function(){
            var option = {};
              if($(this).is(":checked")){
                value = $(this).val();
              }
            });
		}
		else if(qtype=="dropdown")//get value of dropdown
		{
			var value = $(lastdiv).find(":selected").val();
		}
		else if(qtype=="checkbox")//get value of checkbox
		{	
			var value = [];
			$(lastdiv).find('input[type=checkbox]').each(function(){
            var option = {};
              if($(this).is(":checked")){
                cvalue = $(this).val();
                value.push(cvalue);
              }
            });
		}
		console.log(value);
		console.log(qid);
		console.log(qtype);

		methodAjaxToGetNextQuestion(qid,value,qtype,catid,site_url);
		
	}

	//function will be called when prev button is clicked.
	function getPrevQuesButton(prevQuesId)
	{
		if(prevQuesId!='')
		{
			$('.form-ques').hide();
			$('.dynamicQues_'+prevQuesId).show();
		}
		

	}

	function methodAjaxToGetNextQuestion(qid,value,qtype,catid,site_url)
	{
	//set csrf token
	if(qid!='' && value!='' && qtype!='' && catid!='')
	{
		var user_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
		$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

		$.ajax({
          url: site_url+"/business_user/getdataforbu",        
          type:'POST',
          data: {'qid':qid,'value':value,'type':qtype,'catid':catid},	
          success:function(response){  
           
			if(response.success==1)
			{
				if(response.data!='' && $(".dynamicQues_"+response.nextid).length<=0)
				{
					$('.form-ques').hide();
					$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').append(response.data);
					$('#openPopUpForQuestion').find('.modal-body').find('.cat_html_dataa').addClass('text-center');
					
				}
				else if(response.nextid!='' && $(".dynamicQues_"+response.nextid).length>0) 
				{
				  	$('.form-ques').hide();
					$('.dynamicQues_'+response.nextid).show();
				}
				else if(response.data=='')
				{
					$('.login_body_main').hide();
					$('.cat_html_dataa').hide();
					$('.ask_for_quote_section').show();
				}
						
			}
			else
			{
				alert(response.message);
			}
          }
        });
	}
	else
	{
		alert('Please answer given question');
		return false;
	}
}

