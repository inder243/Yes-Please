//get click of campaign
function countClickOfAd(catId,buId,campId)
{
	
	var site_url = $('#site_url').text();

	window.location.href = site_url+"/general_user/public_profile/"+buId+"/"+catId;

	if(catId!='' && buId!='' && campId!='')
	{
		$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url: site_url+"/general_user/save_click",        
          type:'POST',
          data: {'catId':catId,'buId':buId,'campId':campId},	
          success:function(response){  
           
           
			if(response.success==1)
			{
				
				console.log(response);
			}
			
          }
        });
	}
}
$(document).on('click','.dynamicradio_button', function () {

	var site_url = $('#site_url').text();
	var lastdiv = $('.dynmic_quoteform .form-ques:visible');//get last question
	var catid = $('.dynmic_quoteform .hiddencatId').val();//get catid
	var qid = $(lastdiv).attr('data-id');//get id of question
	var qtype = $(lastdiv).attr('data-type');//get type of question
	var value = '';

	if(qtype=="radio")//get value of radio
	{
		$(lastdiv).find('input[type=radio]').each(function(){
        var option = {};
          if($(this).is(":checked")){
            value = $(this).val();
          }
        });
	}

	methodAjaxToGetNextQuestion(qid,value,qtype,catid,site_url);

});


function methodAjaxToGetNextQuestion(qid,value,qtype,catid,site_url)
{
	//set csrf token
	if(qid!='' && value!='' && qtype!='' && catid!='')
	{
		$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

		$.ajax({
          url: site_url+"/general_user/getdata",        
          type:'POST',
          data: {'qid':qid,'value':value,'type':qtype,'catid':catid},	
          success:function(response){  
           
			if(response.success==1)
			{
				if(response.data!='')
				{
					if(response.nextid!='' && $(".dynamicQues_"+response.nextid).length != 0) 
					{
					  	$('.form-ques').hide();
						$('.dynamicQues_'+response.nextid).show();
						$('.submit_dynamic_from').parent().show();
						
					}
					else
					{
						$('.form-ques').hide();
						$('.dynmic_quoteform .modal-body .ask_for_quote_section').append(response.data);
						$('.submit_dynamic_from').parent().show();

					}
				}
				else
				{
					
					var Ques = 'dynamicQues_'+qid;
					$('.form-ques').hide();
					$('.dynmic_quoteform .static_ques_1').show();
					$('.dynmic_quoteform .static_ques_1').find('.ele_pre').attr('data_nxt_id',Ques);
					$('.submit_dynamic_from').parent().show();
					
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

//this function will work if there are no dynamic questions added
function getOnlyStaticQuestions()
{
	$('.buttonForOnlyStaticQues').hide();
	$('.dynmic_quoteform .static_ques_1').show();
	$('.dynmic_quoteform .static_ques_1').find('.ele_pre').attr('data_nxt_id','buttonForOnlyStaticQues');
}


//event will be called each time next button is clicked
	function getNextQuesButton(){

		/*****code to check how many business users are checked****/
		var listItems = $(".all_bus_by_cat li");

		var multipleBusiness = [];
		var count_users = 0;
		listItems.each(function(idx, li) {
	    
		   selectedli = $(li).find('.select_this');
		   selectedChk = $(selectedli).find('input[type=checkbox]');
		   chkBoxId = $(selectedChk).attr('id');

		   if($('#' + chkBoxId).is(":checked")){
		   		multipleBusiness.push($('#' + chkBoxId).attr('data-title'));
		   		count_users++;	
		   }
		  
			    	
		});

      	if(count_users >= 1){

      		for(var i=1; i<=5; i++){
      			if(i == count_users){
      				/******make the radio button selected*****/
					$('.static_ques_1').find('.total_quote ul li').find("input[name=radios][value=" + count_users + "]").attr('checked', 'checked');
      			}else{
      				/*****make other options disbale******/
      				$('.static_ques_1').find('.total_quote ul li').find("input[name=radios][value=" + i + "]").attr('disabled', true);
      			}
      		}/*** end for loop***/

      	}/**end if**/
      	/*****code ends to check how many business users are checked****/

		/*$('.tpicker').datetimepicker({
			format: 'HH:mm'
		});
		$('.dpicker').datepicker();*/
		var site_url = $('#site_url').text();
		
		var lastdiv = $('.dynmic_quoteform .form-ques:visible');//get last question
		var catid = $('.dynmic_quoteform .hiddencatId').val();//get catid
		
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

	//save quote data
	$('.submit_dynamic_from').click(function(event){
		
		var site_url = $('#site_url').text();
		event.preventDefault();	
      	var fields = [];
      	$('.dynmic_quoteform .form-ques').each(function(){
	        var type = $(this).attr('data-type'); //get type of field
	        var q_id = $(this).attr('data-id');//get qid
	        var filter = $(this).find('.is_filter').is(':checked'); 
	        //console.log(type);
	        switch(type)
	        {
				case 'textbox':

				var value = $.trim($(this).find('input[type=text]').val());
				var field = {};
				field['q_id'] = q_id;
				field['value'] = value;
				field['filter'] = filter;
				field['type'] = type;
				fields.push(field);
				break;

				case 'textarea':

				var value = $.trim($(this).find('textarea').val());
				var field = {};
				field['q_id'] = q_id;
				field['value'] = value;
				field['filter'] = filter;
				field['type'] = type;
				fields.push(field);
				break;

				case 'checkbox':

				var alloptions = [];
				var field = {};
				field['q_id'] = q_id;
				field['options'] = {};
				field['filter'] = filter;
				field['type'] = type;
				var options = {};
				var count = 0;
				//required = 'true';

	            $(this).find('input[type=checkbox]').each(function(){
	            var option = {};
	              if($(this).is(":checked")){
	                option['value'] = $(this).val();
	                option['label'] = $(this).text();
	                alloptions.push(option);
	                count++;
	              }
	            });
            
				field['options'] = alloptions;
				fields.push(field);
				break;

				case 'radio':

				var alloptions = [];
				var field = {};
				field['q_id'] = q_id;
				field['options'] = {};
				field['filter'] = filter;
				field['type'] = type;
				var options = {};
				var count = 0;
				$(this).find('input[type=radio]').each(function(){
					var option = {};
					if($(this).is(":checked")){
						option['value'] = $(this).val();
						option['label'] = $(this).text();
						alloptions.push(option);
						count++;
					}
				});

				field['options'] = alloptions;
				fields.push(field);
				break;

				case 'dropdown':

				//required = 'true';
				var field = {};
				field['q_id'] = q_id;
				field['filter'] = filter;
				field['value'] = $.trim($(this).find(":selected").val());
				field['label'] = $.trim($(this).find(":selected").text());
				field['type'] = type;
				fields.push(field);
				break;
        	}

      });
      	//save filled data
		if(fields.length >0)
		{
			$.ajaxSetup({
	          headers: {
	              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });

			$.ajax({
	          url: site_url+"/general_user/savedynamicdata",        
	          type:'POST',
	          data: {answers:fields},	
	          success:function(response){  
	           
				if(response.success==1)
				{
					alert(response.message);
				}
				else
				{
					alert(response.message);
				}
	          }
	        });
		}

    });

	function validate_quote_dynamicandstatic(obj)
	{
    	var site_url = $('#site_url').text();
    	data = new FormData();
      	var fields = [];
      	$('.dynmic_quoteform .form-ques').each(function(){
      		var type = $(this).attr('data-type'); //get type of field
	        var q_id = $(this).attr('data-id');//get qid
	        var filter = $(this).attr('data-filter');
	        switch(type)
	        {
				case 'textbox':

				var value = $.trim($(this).find('input[type=text]').val());
				var title = $.trim($(this).find('.questitle').text());

				var field = {};
				field['title'] = title;
				field['value'] = value;
				field['filter'] = filter;
				field['type'] = type;
				fields.push(field);
				break;

				case 'textarea':

				var field = {};
				var value = $.trim($(this).find('textarea').val());
				var title = $.trim($(this).find('.questitle').text());
				
				field['title'] = title;
				field['value'] = value;
				field['filter'] = filter;
				field['type'] = type;
				fields.push(field);
				break;

				case 'checkbox':

				var field = {};
				var value = $.trim($(this).find('textarea').val());
				var title = $.trim($(this).find('.questitle').text());

				var alloptions = [];

				field['title'] = title;
				field['value'] = value;
				field['filter'] = filter;
				field['type'] = type;
				field['options'] = {};
				
				var options = {};
				var count = 0;
				//required = 'true';

	            $(this).find('input[type=checkbox]').each(function(){
	            var option = {};
	              if($(this).is(":checked")){
	                option['value'] = $(this).val();
	                
	                option['label'] = $(this).attr('data-text');
	                alloptions.push(option);
	                count++;
	              }
	            });
            
				field['options'] = alloptions;
				fields.push(field);
				break;

				case 'radio':

				var title = $.trim($(this).find('.questitle').text());
				
				var alloptions = [];
				var field = {};
				field['title'] = title;
				field['q_id'] = q_id;
				field['options'] = {};
				field['filter'] = filter;
				field['type'] = type;
				var options = {};
				var count = 0;
				$(this).find('input[type=radio]').each(function(){
					var option = {};
					if($(this).is(":checked")){
						option['value'] = $(this).val();
						option['label'] = $(this).attr('data-text');
						alloptions.push(option);
						count++;
					}
				});

				field['options'] = alloptions;
				fields.push(field);
				break;

				case 'dropdown':

				//required = 'true';
				var field = {};
				field['q_id'] = q_id;
				field['title'] = title;
				field['filter'] = filter;
				field['value'] = $.trim($(this).find(":selected").val());
				field['label'] = $.trim($(this).find(":selected").text());
				field['type'] = type;
				fields.push(field);
				break;
        	} 

      	});

      	var listItems = $(".all_bus_by_cat li");
      	
      	
      	var multipleBusiness = [];
		listItems.each(function(idx, li) {
	    
		   selectedli = $(li).find('.select_this');
		   selectedChk = $(selectedli).find('input[type=checkbox]');
		   chkBoxId = $(selectedChk).attr('id');
		   if($('#' + chkBoxId).is(":checked"))
		   {
		   		
		   		multipleBusiness.push($('#' + chkBoxId).attr('data-title'));
		   }
		  
					    	
		});
	    

      	var phone = $('.dynmic_quoteform').find('#dynamic_mobile_phone').val();
      	var desc = $('.dynmic_quoteform').find('#dynamic_description').val();
      	var quotecount = $('.dynmic_quoteform').find('input[name="radios"]:checked').val();
      	var hiddencatId = $('.dynmic_quoteform').find('.hiddencatId').val();
      	
      	if(phone==''){
      		var this_class = $(obj).find('a').attr('class');
      		if(this_class != 'mobile_dont_want'){
      			$('#dynamic_mobile_phone').next('.fill_fields').css('display','block');
			    $('#dynamic_mobile_phone').next('.fill_fields').text('Please enter Mobile phone.');
			    $('#dynamic_mobile_phone').addClass('error_border');
      			return false;
      		}else{
      			
      			$('#dynamic_mobile_phone').next('.fill_fields').css('display','none');
	      		$('#dynamic_mobile_phone').removeClass('error_border');
      		}
      	}
      	if((phone).length < 9 || (phone).length > 15){
      		var this_class = $(obj).find('a').attr('class');
      		if(this_class != 'mobile_dont_want'){
				$('#dynamic_mobile_phone').next('.fill_fields').css('display','block');
		      	$('#dynamic_mobile_phone').next('.fill_fields').text('Mobile phone must be between 9 and 15 digits.');
		      	$('#dynamic_mobile_phone').addClass('error_border');
		      	return false;
		    }else{
		    	
      			$('#dynamic_mobile_phone').next('.fill_fields').css('display','none');
	      		$('#dynamic_mobile_phone').removeClass('error_border');
		    }
	    }

	    var this_class = $(obj).find('a').attr('class');
  		if(this_class == 'mobile_dont_want'){
  			phone = '';
  		}

      	if(desc=='')
      	{
      		alert('Please provide Description');
      		return false;
      	}
      	if(quotecount=='')
      	{
      		alert('Please provide quotes count');
      		return false;
      	}
      	

			
			error='';
			
			var files = $('#dynamic_vid_img')[0].files;
			for(var count = 0; count<files.length; count++)
			{
				var name = files[count].name;
				var extension = name.split('.').pop().toLowerCase();

				if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
				{
					error += "Invalid " + count + " Image File"
				}
				else
				{
					data.append("files[]", files[count]);
				}
			}

			answers = JSON.stringify(fields);
			
	        //data.append('images',fileList);
	        data.append('answers',answers);
			data.append('phone',phone);
			data.append('desc',desc);
			data.append('quotecount',quotecount);
			data.append('hiddencatId',hiddencatId);
			data.append('multipleBusiness',multipleBusiness);
			//alert('dfgkmfkjg');
			//console.log(data);
		

      	if( desc!='' && quotecount!='')
      	{
      		jQuery('.pre_loader').css('display','block');
      		$.ajaxSetup({
	          headers: {
	              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });

			$.ajax({
	          url: site_url+"/general_user/savequotedata",        
	          type:'POST',
	         //data: {answers:fields,phone:phone,desc:desc,quotecount:quotecount,multipleBusiness:multipleBusiness},	
	         data:data,
			contentType: false,
			cache: false,
			processData:false,
	          success:function(response){  
	           
				if(response.success==1)
				{
					alert(response.emails);
					jQuery('.pre_loader').css('display','none');
					$('.dynmic_quoteform .form-ques').hide();
			    	$('.dynmic_quoteform .static_ques').hide();
			    	$('.dynmic_quoteform .final_ques_thanks').show();
				}
				else if(response.success==2)
				{
					jQuery('.pre_loader').css('display','none');
					$('.dynmic_quoteform .form-ques').hide();
			    	$('.dynmic_quoteform .static_ques').hide();
			    	$('.dynmic_quoteform .final_ques_thanks').find('h1').text(response.message);
			    	$('.dynmic_quoteform .final_ques_thanks').show();
			    	$('.dynmic_quoteform .final_ques_thanks').find('.ph_detail').css('display','none');
			    	
				}
				else
				{
					jQuery('.pre_loader').css('display','none');
					alert(response.message);
				}

	          }
	        })
      	}

     }

   

    function getStaticQuestion(ele)
    {
    	
		var toShowQues = $(ele).attr('data_nxt_id');

		if(toShowQues=="buttonForOnlyStaticQues")
		{
			$('.dynmic_quoteform .form-ques').hide();
			$('.dynmic_quoteform .static_ques').hide();
			$('.dynmic_quoteform .buttonForOnlyStaticQues').show();
		}
		else
		{
			$('.dynmic_quoteform .form-ques').hide();
			$('.dynmic_quoteform .static_ques').hide();
			$('.dynmic_quoteform .'+toShowQues).show();
    	
		}
		
		
    	
    	
    }

    function getStaticQuestionNext(ele)
    {
    	
    	//return false;
    	var current_btn_id = $(ele).attr('id');
    	var toShowQues = $(ele).attr('data_nxt_id');
    	//alert(current_btn_id);
    	var data_nxt_id = $(ele).attr('data_nxt_id');

    	quotesSelected ='';

    	if(data_nxt_id == 'static_ques_2'){

    		var lastdiv = $('.dynmic_quoteform .static_ques_1');//get last question
			$(lastdiv).find('input[type=radio]').each(function(){
            var option = {};
              if($(this).is(":checked")){
                quotesSelected = $(this).val();
               
              }
            });

            if(quotesSelected=='')
            {
            	alert('Please select no of quotes you want to receive.');
            	return false;
            }
    	}

    	if(data_nxt_id == 'static_ques_3'){
    		/****check data****/
			var text_desc1 = $('.describe_work').find('.work_description_modal').val();

			if(text_desc1 == ''){
				$('.describe_work').find('.work_description_modal').addClass('error_border');
				$('.describe_work').find('.work_description_modal').next('.fill_fields').css('display','block');
				$('.describe_work').find('.work_description_modal').next('.fill_fields').text('Please add description');
				return false;
			}
			else if((text_desc1).length < 100 || (text_desc1).length > 2000){
				$('.describe_work').find('.work_description_modal').addClass('error_border');
				$('.describe_work').find('.work_description_modal').next('.fill_fields').css('display','block');
				$('.describe_work').find('.work_description_modal').next('.fill_fields').text('Description must be between 100 and 2000 digits.');
				return false;
			}else{
				$('.describe_work').find('.work_description_modal').removeClass('error_border');
				$('.describe_work').find('.work_description_modal').next('.fill_fields').css('display','none');
			}
			
    	}

    	
    	if(current_btn_id == 'dynamicquote_chk_login'){
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
			    	//$('.'+toShowQues).show();
			    	$('.dynmic_quoteform .form-ques').hide();
			    	$('.dynmic_quoteform .static_ques').hide();
			    	$('.dynmic_quoteform .'+toShowQues).show();
	              }
	              if(data.success == '2'){
	                alert(data.message);
	              }
	              if(data.success == '0'){
	              	
	              	$('#ask_quote').modal('hide');
	              	$('#general_login1').modal('show');
	              	$('#ask_quote').modal('hide');
	              	$('#ask_quote').modal('hide');
	              	$('#ask_quote').modal('hide');
	              	$('#general_login1').find('#sign_in_general1').attr('data-checkstatus','quotes_login');
	              	$('#general_login1').find('#sign_in_general1').attr('data-checkstatus-nxtques',toShowQues);
	                
	              }
	            }

	        });/****ajax ends here****/
    	}
    	else
    	{
    		var toShowQues = $(ele).attr('data_nxt_id');
	    	$('.dynmic_quoteform .form-ques').hide();
	    	$('.dynmic_quoteform .static_ques').hide();
	    	$('.dynmic_quoteform .'+toShowQues).show();
    	}
    	
      	
    }/******fn get static next question*****/

     /******display images on select image*****/
     $(document).on('change', '#ask_quote #dynamic_vid_img', function(e){
    	e.preventDefault();
		var images = e.target.files;
		//$('.reg_img_msg').text('');
		var name='';
		var count = 0;
		$.each( images, function( key, value ) {
			if(count > 0){
				name += value.name+', ';
			}else{
				name = value.name;
			}
			count++;
		  	//$('.reg_img_msg').append(value.name+', ');
		});
		$('#ask_quote .file_to_upload #dynamic_vid_img').after('<span id="image_names">'+name+'</span>');
		if(count > 0){
			$('#ask_quote .static_ques_3 .describe_work_btn .ele_next a').text('Next');
		}
		//alert(name);

    });
    function closdynamicemodal()
    {
    	$('#ask_quote').modal('hide');
   		//$('.dynmic_quoteform').trigger("reset");
    	location.reload();
    }

  function testsubmit(ele)
  {
  	//ele.preventDefault();

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
      	var attr_status = $('#sign_in_general1').attr('data-checkstatus');
      	
      	var attr_status_nxt_question = '';

      	if(attr_status != 'undefined' && attr_status != undefined && attr_status == 'quotes_login')
      	{
      		var attr_status = 'quotes';
      		 attr_status_nxt_question = $('#sign_in_general1').attr('data-checkstatus-nxtques');
      	}
      	else if( attr_status != 'undefined' && attr_status != undefined && attr_status == 'quotessingle')
      	{
      		var attr_status = 'quotessingle';
      	}
      	else{
      		var attr_status = 'simple';
      	}
      	


		var url_general = $('.action_general').val();
		var website_url = $('.website_url').val();

		var email = $('.email_gen').val();
		$('.gen_error').css('display','none');
		$('.gen_error').text('');
		if(email == ''){
			$('.email_gen_error').css('display','block');
			$('.email_gen_error').text('Please add email address');
			return false;
		}
		var password = $('.password_gen').val();
		if(password == ''){
			$('.password_gen_error').css('display','block');
			$('.password_gen_error').text('Please add password');
			return false;
		}else{
			$('.password_gen_error').css('display','none');
			$('.password_gen_error').text('');
		}
		

		$.ajax({
           	type:'POST',
           	url:url_general,
           	data:{password:password, email:email,attr_status:attr_status},
           	success:function(data){

              	if(data.success == '1'){
              		window.location = website_url+data.url;

              		$('html, body').animate({
				        scrollTop: $(".yep_section_bg").offset().top
				    }, 2000);
              	}
              	if(data.success == '0'){
              		$('.gen_error').css('display','block');
              		$('.gen_error').text(data.message);
              	}

              	if(data.success == '2'){
              		$('#general_login1').modal('hide');
              		$('#ask_quote').modal('show');
              		$('.dynmic_quoteform .form-ques').hide();
			    	$('.dynmic_quoteform .static_ques').hide();
			    	$('.dynmic_quoteform .'+attr_status_nxt_question).show();
			    	$('#ask_quote').find('.static_ques_4').find('.mobl_phn').val('');
              		$('#ask_quote').find('.static_ques_4').find('.mobl_phn').val(data.phone);
              		
              	}
              	if(data.success == '3'){

              		$('#general_login1').modal('hide');
              		$('#work_description').modal('show');
                  	$('#work_description').find('.describe_work').css('display','none');
                  	$('#work_description').find('.img_vid_popup').css('display','block');
                  	$('#work_description').find('.mobile_phone_pop').find('.mobl_phn').val('');
                  	$('#work_description').find('.mobile_phone_pop').find('.mobl_phn').val(data.phone);
              	}
           	}

        });
  	return false;
  }



  $(document).on("click",".ask_quote_close",function() {

  	
  	location.reload();
  });
/*
    $(document).on('hide.bs.modal','#ask_quote', function () {

    	
	});

	  $(document).on('show.bs.modal','#ask_quote', function () {

    	
	});*/
    
   
    