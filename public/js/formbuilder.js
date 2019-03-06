//event will be called each time next button is clicked
	function getNextQuesButton()
	{
		var site_url = $('#site_url').text();
		
		var lastdiv = $('.dynmic_quoteform .form-ques:visible');//get last question
		var catid = $('.dynmic_quoteform .hiddencatId').val();//get catid
		
		console.log(lastdiv);
		var qid = $(lastdiv).attr('data-id');//get id of question
		var qtype = $(lastdiv).attr('data-type');//get type of question
		var value = '';
		if(qtype=="textbox")//get value of textbox
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
					
					
					//alert(response.message);
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

	function validate_quote_dynamicandstatic(){
		
    	var site_url = $('#site_url').text();
		
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

      	if(phone=='')
      	{
      		alert('Please provide phone number');
      		return false;
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

      	if(fields.length >0 && phone!='' && desc!='' && quotecount!='')
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
	          data: {answers:fields,phone:phone,desc:desc,quotecount:quotecount,multipleBusiness:multipleBusiness},	
	          success:function(response){  
	           
				if(response.success==1)
				{
					//alert(response.message);
					jQuery('.pre_loader').css('display','none');
					$('.dynmic_quoteform .form-ques').hide();
			    	$('.dynmic_quoteform .static_ques').hide();
			    	$('.dynmic_quoteform .final_ques_thanks').show();
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
    	
    	//$('.dynmic_quoteform .static_ques_1').show();
    	$('.dynmic_quoteform .form-ques').hide();
    	$('.dynmic_quoteform .static_ques').hide();
    	$('.dynmic_quoteform .'+toShowQues).show();
    	
    	
    }

    function getStaticQuestionNext(ele)
    {

    	var current_btn_id = $(ele).attr('id');

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
				$('.describe_work').find('.work_description_modal').next('.fill_fields').text('Please add description');
				return false;
			}else if((text_desc1).length < 100 || (text_desc1).length > 2000){
				$('.describe_work').find('.work_description_modal').addClass('error_border');
				$('.describe_work').find('.work_description_modal').next('.fill_fields').text('Description must be between 100 and 2000 digits.');
				return false;
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
	              	
	              	var toShowQues = $(ele).attr('data_nxt_id');
	    
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
	              	$('#general_login').find('#sign_in_general').attr('data-checkstatus','quotes_login');
	                $('#general_login').modal('show');
	              }
	            }

	        });/****ajax ends here****/
    	}else{
    		var toShowQues = $(ele).attr('data_nxt_id');
	    	//$('.'+toShowQues).show();
	    	$('.dynmic_quoteform .form-ques').hide();
	    	$('.dynmic_quoteform .static_ques').hide();
	    	$('.dynmic_quoteform .'+toShowQues).show();
    	}
    	
      	
    }/******fn get static next question*****/


    function closdynamicemodal()
    {
    	$('#ask_quote').modal('hide');
   		$('.dynmic_quoteform').trigger("reset");
    	location.reload();
    }

  

    $(document).on('hide.bs.modal','#ask_quote', function () {
        location.reload();
        
 			//Do stuff here
		});
    

    