$(document).ready(function(){


	/**code to filter category dashboard page on radious change**/
	$(document).on('change','#dashboard_radious_general',function(){
        var selected_radious = $(this).val(); 

        var current_url = window.location.href;
		var cat_id = current_url.substring(current_url.lastIndexOf('/') + 1);

		var longi = $('.user_dashbord_cat').find('.hidden_default_longitude').val();
        var lati = $('.user_dashbord_cat').find('.hidden_default_latitude').val();
        /*****ajax starts*****/
        $.ajax({
          url: home_url+'general_user/dashboard/catid/'+cat_id+"/location",
          type: 'GET',
          data:{latitude:lati,longitude:longi,selected_radious:selected_radious},
          dataType:'html',
          success:function(response){
          
            $('.content').html(response);


            
            // if(response.success == '2'){
            //  alert('hmm');
            // }
            
            /******on select of business users ->change color and give limit******/
            var listItems = $(".all_bus_by_cat li");

            listItems.each(function(idx, li) {
                var product = $(li);

                $(li).find('.select_this').find('#hmm_'+idx).click(function() {
                  
                    if($(this).is(':checked')){
                        $(li).addClass('border_color');
                    } else{
                        $(li).removeClass('border_color');
                    }

                    var countCheckedCheckboxes = listItems.find('.check_bus').filter(':checked').length;
                  if(countCheckedCheckboxes > 5){
                    alert('You can not select more than 5 business !');
                    $(li).removeClass('border_color');
                    return false;
                  }
                });

                // and the rest of your code
            });/*****business list code ends here****/


            /*****code to bind map with multiple long lat*****/
            var mymap = new GMaps({
                el: '#mapDiv',
                lat: lati,
                lng: longi,
                zoom:12
              });

              $('.all_bus_by_cat li').each(function(i){
               var longitude = $(this).find('.hidden_longitude').val();
               var latitude = $(this).find('.hidden_latitude').val();
               var address = $(this).find('.hidden_address').val();
               var business_name = $(this).find('.hidden_buname').val();
               mymap.addMarker({
                        lat: latitude,
                        lng: longitude,
                        title: address,
                        click: function(e) {
                        	var contentString = '<div id="content">'+
					            '<div id="siteNotice">'+
					            '</div>'+
					            '<h1 id="firstHeading" class="firstHeading"></h1>'+
					            '<div id="bodyContent">'+
					            '<p><b>'+address+'</b>, '+business_name+' </p>'+
					            '</div>'+
					            '</div>';
				            var infowindow = new google.maps.InfoWindow({
					          content: contentString
					        });
	                    	//alert('Addreshhs : '+address+'.\n Business Name : '+ business_name);
	                    	infowindow.open(mymap, this);
                        }
                      });
            });
            /*****code to bind map with multiple long lat*****/

            /*****more option code*****/
            $('.more-option').on("click",function(e) {
              e.preventDefault();
                $('.more_options_data').toggle();
            });
            /*****more option code******/

            /******fn to display more items on load more*****/
            var list = $(".all_bus_by_cat li");
            var numToShow = 5;
            var button = $(".load_more");
            var numInList = list.length;
            list.hide();
            if (numInList > numToShow) {
              button.show();
            }else{
              button.hide();
            }
            list.slice(0, numToShow).show();

            button.click(function(){
              var showing = list.filter(':visible').length;
              list.slice(showing - 1, showing + numToShow).fadeIn();
              var nowShowing = list.filter(':visible').length;
              if (nowShowing >= numInList) {
                button.hide();
              }
            });

            /******fn to display more items on load more ends*****/

            /****code to filetr data with radiou***/
            $(document).on('change','#dashboard_radious_general',function(){
                var selected_radious = $(this).val();
            });
            /****end radious code here*****/
        
          }
        });/***ajax ends here***/   
    });
	/**end code to filter category dashboard page on radious change**/


	var home_url = $('#home_url').val();

	//scrol down on category classification page
	var url = window.location.href;
	var str = 'category-classifcation';
	if(url.indexOf(str) != -1){	
		$('.down_errow,.bounce a').trigger('click');
	}
	/********* for more options on category page*******/
	// $('.more-option').on("click",function(e) {
	// 	e.preventDefault();
	// 	$('.more_options_data').css('display','block');
	// });

	

	$('.more-option').on("click",function(e) {
	 	e.preventDefault();
	    $('.more_options_data').toggle();
	});
	/****more option ends here*****/

	/******fn to display more items on load more*****/
	var list = $(".all_bus_by_cat li");
	var numToShow = 5;
	var button = $(".load_more");
	var numInList = list.length;

	list.hide();
	if (numInList > numToShow) {
		button.show();
	}else{
		button.hide();
	}

	list.slice(0, numToShow).show();


	button.click(function(){
		var showing = list.filter(':visible').length;
		list.slice(showing - 1, showing + numToShow).fadeIn();
		var nowShowing = list.filter(':visible').length;
		if (nowShowing >= numInList) {
			button.hide();
		}
	});

	/******fn to display more items on load more ends*****/

	if(window.location.href.indexOf("dashboard/catid") > -1) {

		// if ("geolocation" in navigator){
		// 	navigator.geolocation.getCurrentPosition(showPosition, function(e)
		//     {  alert(e); //alerts error:1; message:Only Secure origins are allowed(see:  )
		//        console.error(e);
		//     })
		// }else{
		// 	console.log("Browser doesn't support geolocation!");
		// }
		// return false;
      if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else { 
	    console.log('naa');
	  }

	  /*****code to bind map with multiple long lat*****/
		var mymap = new GMaps({
	      	el: '#mapDiv',
	      	lat: 32.0853,
  			lng: 34.7818,
	      	zoom:12
	    });

  		$('.all_bus_by_cat li').each(function(i){
		   var longitude = $(this).find('.hidden_longitude').val();
		   var latitude = $(this).find('.hidden_latitude').val();
		   var address = $(this).find('.hidden_address').val();
		   var business_name = $(this).find('.hidden_buname').val();
		   mymap.addMarker({
              lat: latitude,
              lng: longitude,
              title: address,
              click: function(e) {
              	var contentString = '<div id="content">'+
		            '<div id="siteNotice">'+
		            '</div>'+
		            '<h1 id="firstHeading" class="firstHeading"></h1>'+
		            '<div id="bodyContent">'+
		            '<p><b>'+address+'</b>, '+business_name+' </p>'+
		            '</div>'+
		            '</div>';
	            var infowindow = new google.maps.InfoWindow({
		          content: contentString
		        });
            	//alert('Addreshhs : '+address+'.\n Business Name : '+ business_name);
            	infowindow.open(mymap, this);
              }
            });
		});
		/*****code to bind map with multiple long lat*****/

    }


    if($('.publicprofile_status').length > 0) {

    	$('#work_description').find('.mobile_phone_pop').css('display','none');
    	$('#work_description').find('.img_vid_popup').css('display','none');
    	$('#work_description').find('.describe_work').css('display','none');
    	$('#work_description').find('.final_ques_thanks').css('display','block');
    	$('#work_description').modal('show');
    }


    // if(window.location.href.indexOf("general_dashboard") > -1) {
    //   $('html, body').animate({
	   //      scrollTop: $(".yep_section_bg").offset().top
	   //  }, 2000);
    // }

    /******code to check radio buttons*****
    $('.total_quote .radio-inline').on('change', function() {
	   alert($('input[name=radios]:checked', '.total_quote').val()); 
	});*****/


	/*********check hidden error msg***********/
	var hidden_error = $('.hidden_error_msg').val();
	var hidden_id = $('.hidden_error_msg').attr('data-id');
	if(hidden_error != "" && hidden_id == "1"){
		$("#general_login").modal('show');
		//$('.login_with_social').before(hidden_error);
		//$( hidden_error ).insertBefore( ".login_with_social" );
	}


	/*******user dashboard page lising of business********/
	var listItems = $(".all_bus_by_cat li");

	listItems.each(function(idx, li) {
	    var product = $(li);

	    $(li).find('.select_this').find('#hmm_'+idx).click(function() {
	    	
	        if($(this).is(':checked')){
	            $(li).addClass('border_color');
	        } else{
	            $(li).removeClass('border_color');
	        }

	        var countCheckedCheckboxes = listItems.find('.check_bus').filter(':checked').length;
	    	if(countCheckedCheckboxes > 5){
	    		alert('You can not select more than 5 business !');
	    		$(li).removeClass('border_color');
	    		return false;
	    	}
	    });

	    // and the rest of your code
	});
	/*******lisung of business on user dashboard page ends********/


	/*****prevent first space on inputs*****/
	$("input").on("keypress", function(e) {
	    if (e.which === 32 && !this.value.length)
	        e.preventDefault();
	});

	/******General user login******/
	$('#sign_in_general').submit(function(e){
		e.preventDefault();

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
      	var attr_status = $('#sign_in_general').attr('data-checkstatus');
      	

      	if(attr_status != 'undefined' && attr_status != undefined && attr_status == 'quotes_login')
      	{
      		var attr_status = 'quotes';
      	}
      	else if( attr_status != 'undefined' && attr_status != undefined && attr_status == 'quotessingle')
      	{
      		var attr_status = 'quotessingle';
      	}
      	else if( attr_status != 'undefined' && attr_status != undefined && attr_status == 'questionsingle')
      	{
      		var attr_status = 'questionsingle';
      	}
      	else{
      		var attr_status = 'simple';
      	}
      	
      	alert(attr_status);return false;

		var url_general = $('.action_general').val();
		var website_url = $('.website_url').val();

		var email = $('#general_login').find('.email_gen').val();
		$('.gen_error').css('display','none');
		$('.gen_error').text('');
		if(email == ''){
			$('.email_gen_error').css('display','block');
			$('.email_gen_error').text('Please add email address');
			return false;
		}
		var password = $('#general_login').find('.password_gen').val();
		if(password == ''){
			$('.password_gen_error').css('display','block');
			$('.password_gen_error').text('Please add password');
			return false;
		}else{
			$('.password_gen_error').css('display','none');
			$('.password_gen_error').text('');
		}
		// if(password.length < 6){
		// 	$('.password_gen_error').css('display','block');
		// 	$('.password_gen_error').text('The password must be at least 6 characters.');
		// 	return false;
		// }else{
		// 	$('.password_gen_error').css('display','none');
		// 	$('.password_gen_error').text('');
		// }
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
              		$('#general_login').modal('hide');
              		$('#ask_quote').modal('show');
              		$('#ask_quote').find('.static_ques_4').find('.mobl_phn').val('');
              		$('#ask_quote').find('.static_ques_4').find('.mobl_phn').val(data.phone);
              	}
              	if(data.success == '3'){
              		$('#general_login').modal('hide');
              		$('#work_description').modal('show');
                  	$('#work_description').find('.describe_work').css('display','none');
                  	$('#work_description').find('.img_vid_popup').css('display','block');
                  	$('#work_description').find('.mobile_phone_pop').find('.mobl_phn').val('');
                  	$('#work_description').find('.mobile_phone_pop').find('.mobl_phn').val(data.phone);
              	}

              	/*****login from single question******/
              	if(data.success == '4'){
              		$('#general_login').modal('hide');
              		$('#ask_question').modal('show');
                  	$('#ask_question').find('.descrptn_qus').css('display','none');
					$('#ask_question').find('.similar_result_qus').css('display','none');
					$('#ask_question').find('.mobile_phn_pop').css('display','block');
					$('#ask_question').find('.mobile_phn_pop').find('.mobl_phn').val('');
					$('#ask_question').find('.mobile_phn_pop').find('.mobl_phn').val(data.phone);
              	}
           	}

        });

	});/******general sign in ends******/

	$('.forgot_pass').click(function(){
		$('#general_login').modal('hide');
		$('#user_forgot_password').modal('show');
	});

	/*******empty fields of forget password modal on hide******/
	$("#user_forgot_password").on("hidden.bs.modal", function(){
	    $(".forget_email").val("");
	    $('#user_forgot_password .bu_error').html('');
	});

	/******empty fields of sign in modal on hide*****/
	$("#general_login").on("hidden.bs.modal", function(){
	    $("#sign_in_general").find('.email_gen').val("");
	    $("#sign_in_general").find('.password_gen').val("");
	    $('#sign_in_general .gen_error').html('');
	    $('#sign_in_general .email_gen_error').html('');
	    $('#sign_in_general .password_gen_error').html('');
	});

	$('#user_forgot_password #submit').click(function(){
		var email = $('#user_forgot_password .email_bu').val();

		if(validateEmail(email) == false){
			$('#user_forgot_password .bu_error').css('display','inline-block');
			$('#user_forgot_password .bu_error').html('Please add a valid email.');
			return false;
		}else if(email == ""){
			$('#user_forgot_password .bu_error').css('display','inline-block');
			$('#user_forgot_password .bu_error').html('Please enter any email id.');
			return false;
		}else{
			$('#user_forgot_password .bu_error').html('');
		}

		var token = $("input[name=_token]").val();
		var home_url = $('.website_url_b').val();
		jQuery('.pre_loader').css('display','block');
		$.ajax({
			url: home_url+'/general_user/check_user_email_exists',
			type: 'POST',
			data:{email:email,"_token":token},
			success:function(response){ 
				jQuery('.pre_loader').css('display','none');
				if(response == 'true'){
					$('#user_forgot_password .bu_error').css('display','inline-block');
					$('#user_forgot_password .bu_error').html('Email doest not exists.');
				}else{
					jQuery('.pre_loader').css('display','block');
					$.ajax({
						url: home_url+'/general_user/forgot_password_submit',
						type: 'POST',
						data:{email:email,"_token":token},
						success:function(response){
							jQuery('.pre_loader').css('display','none');
							if(response == 'sent'){
								$('#user_forgot_password .bu_error').css('display','inline-block');
								$('#user_forgot_password .bu_error').html('A link is sent to your registered email id.');
							}
						}
					});
					
					//$('#forgot_password_admin').submit();
				}
			}
		});
	});

	/*******on change radius - dashboard page**********/
	$('.general_radius').on('change', function (e) {
		e.preventDefault();
		var optionSelected = $("option:selected", this);
    	var valueSelected = this.value;

    	var home_url = $('#home_url').val();

    	$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
    	$.ajax({
			url: home_url+'general_user/getlist_businessusers',
			type: 'POST',
			data:{option:valueSelected},
			success:function(response){
				if(response == 'sent'){
					$('#user_forgot_password .bu_error').show();
					$('#user_forgot_password .bu_error').html('A link is sent to your registered email id.');
				}
			}
		});/***ajax ends here***/
		
	});/****change fn ends here****/

//Loading more categories
$(document).on('click', '.yep_section_bg .product_detail .more', function(){
	var skip = $(this).parent('.product_detail').attr('data-skip');
	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	/*****ajax starts*****/
	$.ajax({
		url: home_url+'/more-super-catogries',
		method:'POST',
		data:{'skip':skip},
		context:this,
		success:function(response){
			var json = JSON.parse(response);
			console.log(json);
			if(typeof(json[0]) != 'undefined'){
				$(this).parents('.product_detail').find('.finance').show();
				$(this).parents('.product_detail').find('.finance').find('.catagory_name').html(json[0].category_name);
				$(this).parents('.product_detail').find('.finance').attr('data-id',json[0].id);
				$(this).parents('.product_detail').find('.finance').find('a').attr('href','javascript:;');
				$(this).parents('.product_detail').find('.finance').find('a').attr('title',json[0].category_name);
				$(this).parents('.product_detail').find('.finance').find('a').attr('data-original-title',json[0].category_name);
			}else{
				$(this).parents('.product_detail').find('.finance').hide();
			}
			if(typeof(json[1]) != 'undefined'){
				$(this).parents('.product_detail').find('.energy').show();
				$(this).parents('.product_detail').find('.energy').find('.energy_name').html(json[1].category_name);
				$(this).parents('.product_detail').find('.energy').attr('data-id',json[1].id);
				$(this).parents('.product_detail').find('.energy').find('a').attr('href','javascript:;');
				$(this).parents('.product_detail').find('.energy').find('a').attr('title',json[1].category_name);
				$(this).parents('.product_detail').find('.energy').find('a').attr('data-original-title',json[1].category_name);
			}else{
				$(this).parents('.product_detail').find('.energy').hide();
			}
			if(typeof(json[2]) != 'undefined'){
				$(this).parents('.product_detail').find('.travel').show();
				$(this).parents('.product_detail').find('.travel').find('.travel_name').html(json[2].category_name);
				$(this).parents('.product_detail').find('.travel').attr('data-id',json[2].id);
				$(this).parents('.product_detail').find('.travel').find('a').attr('href','javascript:;');
				$(this).parents('.product_detail').find('.travel').find('a').attr('title',json[2].category_name);
				$(this).parents('.product_detail').find('.travel').find('a').attr('data-original-title',json[2].category_name);
			}else{
				$(this).parents('.product_detail').find('.travel').hide();
			}
			if(typeof(json[3]) != 'undefined'){
				$(this).parents('.product_detail').find('.telco').show();
				$(this).parents('.product_detail').find('.telco').find('.telco_name').html(json[3].category_name);
				$(this).parents('.product_detail').find('.telco').attr('data-id',json[3].id);
				$(this).parents('.product_detail').find('.telco').find('a').attr('href','javascript:;');
				$(this).parents('.product_detail').find('.telco').find('a').attr('title',json[3].category_name);
				$(this).parents('.product_detail').find('.telco').find('a').attr('data-original-title',json[3].category_name);
			}else{
				$(this).parents('.product_detail').find('.telco').hide();
			}
			if(typeof(json[4]) != 'undefined'){
				$(this).parents('.product_detail').find('.eNews').show();
				$(this).parents('.product_detail').find('.eNews').find('.eNews_name').html(json[4].category_name);
				$(this).parents('.product_detail').find('.eNews').attr('data-id',json[4].id);
				$(this).parents('.product_detail').find('.eNews').find('a').attr('href','javascript:;');
				$(this).parents('.product_detail').find('.eNews').find('a').attr('title',json[4].category_name);
				$(this).parents('.product_detail').find('.eNews').find('a').attr('data-original-title',json[4].category_name);
			}else{
				$(this).parents('.product_detail').find('.eNews').hide();
			}
			if(typeof(json[5]) != 'undefined'){
				$(this).parents('.product_detail').find('.entertainment').show();
				$(this).parents('.product_detail').find('.entertainment').find('.entertainment_name').html(json[5].category_name);
				$(this).parents('.product_detail').find('.entertainment').attr('data-id',json[5].id);
				$(this).parents('.product_detail').find('.entertainment').find('a').attr('href','javascript:;');
				$(this).parents('.product_detail').find('.entertainment').find('a').attr('title',json[5].category_name);
				$(this).parents('.product_detail').find('.entertainment').find('a').attr('data-original-title',json[5].category_name);
			}else{
				$(this).parents('.product_detail').find('.entertainment').hide();
			}
			if(typeof(json[6]) != 'undefined'){
				$(this).parents('.product_detail').find('.category').show();
				$(this).parents('.product_detail').find('.category').find('.category_name').html(json[6].category_name);
				$(this).parents('.product_detail').find('.category').attr('data-id',json[6].id);
				$(this).parents('.product_detail').find('.category').find('a').attr('href','javascript:;');
				$(this).parents('.product_detail').find('.category').find('a').attr('title',json[6].category_name);
				$(this).parents('.product_detail').find('.category').find('a').attr('data-original-title',json[6].category_name);
			}else{
				$(this).parents('.product_detail').find('.category').hide();
			}
			$(this).parent('.product_detail').attr('data-skip',parseInt(skip)+7);
			if(parseInt(json.next) == 0){
				$(this).parents('.product_detail').find('.more').find('.more_name').html('Back');
				$(this).parent('.product_detail').attr('data-skip',0);
				//$(this).parents('.product_detail').find('.more').addClass('back');
			}else{
				$(this).parents('.product_detail').find('.more').find('.more_name').html('More');
			}
			//alert(typeof(response));
			//$(this).parents('.product_detail').html(response);
		}
	});

});

$(document).on('click', '.yep_section_bg .product_detail .cat_more', function(){
	//var super_id = url.split("/").pop();
	var super_id = $(this).parents('.product_detail').attr('data-super-id');
	var skip = $(this).parent('.product_detail').attr('data-skip');
	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});

	/*****ajax starts*****/
	$.ajax({
		url: home_url+'/more-catogries',
		method:'POST',
		data:{'skip':skip,'super_id':super_id},
		context:this,
		success:function(response){
			var json = JSON.parse(response);
			console.log(json);
			if(typeof(json[0]) != 'undefined'){
				$(this).parents('.product_detail').find('.finance').show();
				$(this).parents('.product_detail').find('.finance').find('.catagory_name').html(json[0].category_name);
				$(this).parents('.product_detail').find('.finance').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[0].id);
				$(this).parents('.product_detail').find('.finance').find('a').attr('title',json[0].category_name);
				$(this).parents('.product_detail').find('.finance').find('a').attr('data-original-title',json[0].category_name);
			}else{
				$(this).parents('.product_detail').find('.finance').hide();
			}
			if(typeof(json[1]) != 'undefined'){
				$(this).parents('.product_detail').find('.energy').show();
				$(this).parents('.product_detail').find('.energy').find('.energy_name').html(json[1].category_name);
				$(this).parents('.product_detail').find('.energy').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[1].id);
				$(this).parents('.product_detail').find('.energy').find('a').attr('title',json[1].category_name);
				$(this).parents('.product_detail').find('.energy').find('a').attr('data-original-title',json[1].category_name);
			}else{
				$(this).parents('.product_detail').find('.energy').hide();
			}
			if(typeof(json[2]) != 'undefined'){
				$(this).parents('.product_detail').find('.travel').show();
				$(this).parents('.product_detail').find('.travel').find('.travel_name').html(json[2].category_name);
				$(this).parents('.product_detail').find('.travel').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[2].id);
				$(this).parents('.product_detail').find('.travel').find('a').attr('title',json[2].category_name);
				$(this).parents('.product_detail').find('.travel').find('a').attr('data-original-title',json[2].category_name);
			}else{
				$(this).parents('.product_detail').find('.travel').hide();
			}
			if(typeof(json[3]) != 'undefined'){
				$(this).parents('.product_detail').find('.telco').show();
				$(this).parents('.product_detail').find('.telco').find('.telco_name').html(json[3].category_name);
				$(this).parents('.product_detail').find('.telco').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[3].id);
				$(this).parents('.product_detail').find('.telco').find('a').attr('title',json[3].category_name);
				$(this).parents('.product_detail').find('.telco').find('a').attr('data-original-title',json[3].category_name);
			}else{
				$(this).parents('.product_detail').find('.telco').hide();
			}
			if(typeof(json[4]) != 'undefined'){
				$(this).parents('.product_detail').find('.eNews').show();
				$(this).parents('.product_detail').find('.eNews').find('.eNews_name').html(json[4].category_name);
				$(this).parents('.product_detail').find('.eNews').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[4].id);
				$(this).parents('.product_detail').find('.eNews').find('a').attr('title',json[4].category_name);
				$(this).parents('.product_detail').find('.eNews').find('a').attr('data-original-title',json[4].category_name);
			}else{
				$(this).parents('.product_detail').find('.eNews').hide();
			}
			if(typeof(json[5]) != 'undefined'){
				$(this).parents('.product_detail').find('.entertainment').show();
				$(this).parents('.product_detail').find('.entertainment').find('.entertainment_name').html(json[5].category_name);
				$(this).parents('.product_detail').find('.entertainment').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[5].id);
				$(this).parents('.product_detail').find('.entertainment').find('a').attr('title',json[5].category_name);
				$(this).parents('.product_detail').find('.entertainment').find('a').attr('data-original-title',json[5].category_name);
			}else{
				$(this).parents('.product_detail').find('.entertainment').hide();
			}
			if(typeof(json[6]) != 'undefined'){
				$(this).parents('.product_detail').find('.category').show();
				$(this).parents('.product_detail').find('.category').find('.category_name').html(json[6].category_name);
				$(this).parents('.product_detail').find('.category').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[6].id);
				$(this).parents('.product_detail').find('.category').find('a').attr('title',json[6].category_name);
				$(this).parents('.product_detail').find('.category').find('a').attr('data-original-title',json[6].category_name);
			}else{
				$(this).parents('.product_detail').find('.category').hide();
			}
			$(this).parent('.product_detail').attr('data-skip',parseInt(skip)+7);
			if(parseInt(json.next) == 0){
				$(this).parents('.product_detail').find('.cat_more').find('.more_name').html('Back');
				$(this).parent('.product_detail').attr('data-skip',0);
				//$(this).parents('.product_detail').find('.more').addClass('back');
			}else{
				$(this).parents('.product_detail').find('.cat_more').find('.more_name').html('More');
			}
			//alert(typeof(response));
			//$(this).parents('.product_detail').html(response);
		}
		});

	});


	$(document).on('click', '.yep_section_bg .product_detail .super_cat_icon', function(){
		var super_id = $(this).attr('data-id');

		//alert(super_id); return false;
		var skip = 0;
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});

		/*****ajax starts*****/
		$.ajax({
			url: home_url+'/more-catogries',
			method:'POST',
			data:{'skip':skip,'super_id':super_id},
			context:this,
			success:function(response){
				window.scrollBy(0, 10);
				window.scrollBy(0, -10);
				$('.categories_ajax').show();
				$('.categories_ajax').attr('data-super-id',super_id);
				$(this).parents('.product_detail').hide();
				$('.back_to_super').css('display','inline-block');
				var json = JSON.parse(response);
				console.log(json);
				if(typeof(json[0]) != 'undefined'){
					$('.categories_ajax').find('.finance').show();
					$('.categories_ajax').find('.finance').css('visibility','visible');
					$('.categories_ajax').find('.finance').find('.catagory_name').html(json[0].category_name);
					$('.categories_ajax').find('.finance').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[0].id);
					$('.categories_ajax').find('.finance').find('a').attr('title',json[0].category_name);
					$('.categories_ajax').find('.finance').find('a').attr('data-original-title',json[0].category_name);
				}else{
					$('.categories_ajax').find('.finance').hide();
				}
				if(typeof(json[1]) != 'undefined'){
					$('.categories_ajax').find('.energy').show();
					$('.categories_ajax').find('.energy').find('.energy_name').html(json[1].category_name);
					$('.categories_ajax').find('.energy').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[1].id);
					$('.categories_ajax').find('.energy').find('a').attr('title',json[1].category_name);
					$('.categories_ajax').find('.energy').find('a').attr('data-original-title',json[1].category_name);
				}else{
					$('.categories_ajax').find('.energy').hide();
				}
				if(typeof(json[2]) != 'undefined'){
					$('.categories_ajax').find('.travel').show();
					$('.categories_ajax').find('.travel').css('visibility','visible');
					$('.categories_ajax').find('.travel').find('.travel_name').html(json[2].category_name);
					$('.categories_ajax').find('.travel').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[2].id);
					$('.categories_ajax').find('.travel').find('a').attr('title',json[2].category_name);
					$('.categories_ajax').find('.travel').find('a').attr('data-original-title',json[2].category_name);
				}else{
					$('.categories_ajax').find('.travel').hide();
				}
				if(typeof(json[3]) != 'undefined'){
					$('.categories_ajax').find('.telco').show();
					$('.categories_ajax').find('.telco').find('.telco_name').html(json[3].category_name);
					$('.categories_ajax').find('.telco').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[3].id);
					$('.categories_ajax').find('.telco').find('a').attr('title',json[3].category_name);
					$('.categories_ajax').find('.telco').find('a').attr('data-original-title',json[3].category_name);
				}else{
					$('.categories_ajax').find('.telco').hide();
				}
				if(typeof(json[4]) != 'undefined'){
					$('.categories_ajax').find('.eNews').show();
					$('.categories_ajax').find('.eNews').find('.eNews_name').html(json[4].category_name);
					$('.categories_ajax').find('.eNews').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[4].id);
					$('.categories_ajax').find('.eNews').find('a').attr('title',json[4].category_name);
					$('.categories_ajax').find('.eNews').find('a').attr('data-original-title',json[4].category_name);
				}else{
					$('.categories_ajax').find('.eNews').hide();
				}
				if(typeof(json[5]) != 'undefined'){
					$('.categories_ajax').find('.entertainment').show();
					$('.categories_ajax').find('.entertainment').css('visibility','visible');
					$('.categories_ajax').find('.entertainment').find('.entertainment_name').html(json[5].category_name);
					$('.categories_ajax').find('.entertainment').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[5].id);
					$('.categories_ajax').find('.entertainment').find('a').attr('title',json[5].category_name);
					$('.categories_ajax').find('.entertainment').find('a').attr('data-original-title',json[5].category_name);
				}else{
					$('.categories_ajax').find('.entertainment').hide();
				}
				if(typeof(json[6]) != 'undefined'){
					$('.categories_ajax').find('.category').show();
					$('.categories_ajax').find('.category').find('.category_name').html(json[6].category_name);
					$('.categories_ajax').find('.category').find('a').attr('href',home_url+'/general_user/dashboard/catid/'+json[6].id);
					$('.categories_ajax').find('.category').find('a').attr('title',json[6].category_name);
					$('.categories_ajax').find('.category').find('a').attr('data-original-title',json[6].category_name);
				}else{
					$('.categories_ajax').find('.category').hide();
				}
				$(this).parent('.product_detail').attr('data-skip',parseInt(skip)+7);
				if(parseInt(json.next) > 0){
					$('.categories_ajax').find('.cat_more').show();
					$('.categories_ajax').find('.cat_more').css('visibility','visible');
					$('.categories_ajax').find('.cat_more').find('.more_name').html('More');
				}else{
					$('.categories_ajax').find('.cat_more').hide();
				}
				//alert(typeof(response));
				//$(this).parents('.product_detail').html(response);
			}
			});

		});

		$(document).on('click', '.yep_section_bg .back_to_super', function(){
			$('.categories_ajax').hide();
			$(this).next('.product_detail').show();
			$(this).hide();
			//$('.product_detail').show();
		});

});/*****document ready*****/


/******function to remove error messages on type*******/
function remove_errormsg(data){
	var value_field = $(data).val();
	var current_id = $(data).attr('id');

	if(current_id == "email"){
		if(validateEmail(value_field) == false){
			$(data).next('.fill_fields').css('display','block');
			$(data).next('.fill_fields').text('Please add a valid email');
			$(data).addClass('error_border');
		}else if(value_field == ""){
			$(data).next('.fill_fields').css('display','block');
			$(data).addClass('error_border');
		}else{
			$(data).next('.fill_fields').css('display','none');
			$(data).removeClass('error_border');
		}
	}else if(current_id == "phone_number"){
		if((value_field).length < 9 || (value_field).length > 15){
			$(data).next('.fill_fields').css('display','block');
			$(data).next('.fill_fields').text('Phone number must be between 9 and 15 digits');
			$(data).addClass('error_border');
		}else{
			$(data).next('.fill_fields').css('display','none');
			$(data).removeClass('error_border');
		}
	}else if(value_field == ""){
		$(data).next('.fill_fields').css('display','block');
		$(data).addClass('error_border');
	}else{
		$(data).next('.fill_fields').css('display','none');
		$(data).removeClass('error_border');
	}

}

/***fn to check email***/
function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( email );
}

/*******fn for cat page to display business according to long lat******/
function showPosition(position) {
	
	var current_loc_latitude = position.coords.latitude;
	var current_loc_longitude = position.coords.longitude;

	var current_url = window.location.href;
	var cat_id = current_url.substring(current_url.lastIndexOf('/') + 1);

	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	jQuery('.pre_loader').css('display','block');
	/*****ajax starts*****/
	$.ajax({
		url: home_url+'general_user/dashboard/catid/'+cat_id,
		type: 'GET',
		data:{latitude:current_loc_latitude,longitude:current_loc_longitude},
		dataType:'html',
		success:function(response){
			jQuery('.pre_loader').css('display','none');
			$('.content').html(response);

			// if(response.success == '2'){
			// 	alert('hmm');
			// }

			/******on select of business users ->change color and give limit******/
			var listItems = $(".all_bus_by_cat li");

			listItems.each(function(idx, li) {
			    var product = $(li);

			    $(li).find('.select_this').find('#hmm_'+idx).click(function() {
			    	
			        if($(this).is(':checked')){
			            $(li).addClass('border_color');
			        } else{
			            $(li).removeClass('border_color');
			        }

			        var countCheckedCheckboxes = listItems.find('.check_bus').filter(':checked').length;
			    	if(countCheckedCheckboxes > 5){
			    		alert('You can not select more than 5 business !');
			    		$(li).removeClass('border_color');
			    		return false;
			    	}
			    });

			    // and the rest of your code
			});/*****business list code ends here****/


			/*****code to bind map with multiple long lat*****/
			var mymap = new GMaps({
		      el: '#mapDiv',
		      lat: current_loc_latitude,
		      lng: current_loc_longitude,
		      zoom:12
		    });

		     // var contentString = '<div id="content">'+
       //      '<div id="siteNotice">'+
       //      '</div>'+
       //      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
       //      '<div id="bodyContent">'+
       //      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
       //      'sandstone rock formation in the southern part of the '+
       //      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
       //      'south west of the nearest large town, Alice Springs; 450&#160;km '+
       //      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
       //      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
       //      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
       //      'Aboriginal people of the area. It has many springs, waterholes, '+
       //      'rock caves and ancient paintings. Uluru is listed as a World '+
       //      'Heritage Site.</p>'+
       //      '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
       //      'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
       //      '(last visited June 22, 2009).</p>'+
       //      '</div>'+
       //      '</div>';
            var contentString = '';

	        


      		$('.all_bus_by_cat li').each(function(i){
			   	var longitude = $(this).find('.hidden_longitude').val();
			   	var latitude = $(this).find('.hidden_latitude').val();
			   	var address = $(this).find('.hidden_address').val();
			    var business_name = $(this).find('.hidden_buname').val();
			   	mymap.addMarker({
                  	lat: latitude,
                  	lng: longitude,
                  	title: address,
                  	click: function(e) {
                  		var contentString = '<div id="content">'+
				            '<div id="siteNotice">'+
				            '</div>'+
				            '<h1 id="firstHeading" class="firstHeading"></h1>'+
				            '<div id="bodyContent">'+
				            '<p><b>'+address+'</b>, '+business_name+' </p>'+
				            '</div>'+
				            '</div>';
			            var infowindow = new google.maps.InfoWindow({
				          content: contentString
				        });
                    	//alert('Addreshhs : '+address+'.\n Business Name : '+ business_name);
                    	infowindow.open(mymap, this);
                  	}
                });
			});
			/*****code to bind map with multiple long lat*****/

			/*****more option code*****/
			$('.more-option').on("click",function(e) {
			 	e.preventDefault();
			    $('.more_options_data').toggle();
			});
			/*****more option code******/

			/******fn to display more items on load more*****/
			var list = $(".all_bus_by_cat li");
			var numToShow = 5;
			var button = $(".load_more");
			var numInList = list.length;
			list.hide();
			if (numInList > numToShow) {
				button.show();
			}else{
				button.hide();
			}
			list.slice(0, numToShow).show();

			button.click(function(){
				var showing = list.filter(':visible').length;
				list.slice(showing - 1, showing + numToShow).fadeIn();
				var nowShowing = list.filter(':visible').length;
				if (nowShowing >= numInList) {
					button.hide();
				}
			});

			/******fn to display more items on load more ends*****/

			$(document).on('change','#dashboard_radious_general',function(){
		        var selected_radious = $(this).val(); 

		        /*****ajax starts*****/
	            $.ajax({
	              url: home_url+'general_user/dashboard/catid/'+cat_id,
	              type: 'GET',
	              data:{latitude:current_loc_latitude,longitude:current_loc_longitude,selected_radious:selected_radious},
	              dataType:'html',
	              success:function(response){
	              
	                $('.content').html(response);


	                var longi = $('.user_dashbord_cat').find('.hidden_default_longitude').val();
	                var lati = $('.user_dashbord_cat').find('.hidden_default_latitude').val();
	                // if(response.success == '2'){
	                //  alert('hmm');
	                // }
	                
	                /******on select of business users ->change color and give limit******/
	                var listItems = $(".all_bus_by_cat li");

	                listItems.each(function(idx, li) {
	                    var product = $(li);

	                    $(li).find('.select_this').find('#hmm_'+idx).click(function() {
	                      
	                        if($(this).is(':checked')){
	                            $(li).addClass('border_color');
	                        } else{
	                            $(li).removeClass('border_color');
	                        }

	                        var countCheckedCheckboxes = listItems.find('.check_bus').filter(':checked').length;
	                      if(countCheckedCheckboxes > 5){
	                        alert('You can not select more than 5 business !');
	                        $(li).removeClass('border_color');
	                        return false;
	                      }
	                    });

	                    // and the rest of your code
	                });/*****business list code ends here****/


	                /*****code to bind map with multiple long lat*****/
	                var mymap = new GMaps({
	                    el: '#mapDiv',
	                    lat: lati,
	                    lng: longi,
	                    zoom:12
	                  });

	                  $('.all_bus_by_cat li').each(function(i){
	                   var longitude = $(this).find('.hidden_longitude').val();
	                   var latitude = $(this).find('.hidden_latitude').val();
	                   var address = $(this).find('.hidden_address').val();
	                   var business_name = $(this).find('.hidden_buname').val();
	                   mymap.addMarker({
	                            lat: latitude,
	                            lng: longitude,
	                            title: address,
	                            click: function(e) {
	                            	var contentString = '<div id="content">'+
							            '<div id="siteNotice">'+
							            '</div>'+
							            '<h1 id="firstHeading" class="firstHeading"></h1>'+
							            '<div id="bodyContent">'+
							            '<p><b>'+address+'</b>, '+business_name+' </p>'+
							            '</div>'+
							            '</div>';
						            var infowindow = new google.maps.InfoWindow({
							          content: contentString
							        });
			                    	//alert('Addreshhs : '+address+'.\n Business Name : '+ business_name);
			                    	infowindow.open(mymap, this);
	                            }
	                          });
	                });
	                /*****code to bind map with multiple long lat*****/

	                /*****more option code*****/
	                $('.more-option').on("click",function(e) {
	                  e.preventDefault();
	                    $('.more_options_data').toggle();
	                });
	                /*****more option code******/

	                /******fn to display more items on load more*****/
	                var list = $(".all_bus_by_cat li");
	                var numToShow = 5;
	                var button = $(".load_more");
	                var numInList = list.length;
	                list.hide();
	                if (numInList > numToShow) {
	                  button.show();
	                }else{
	                  button.hide();
	                }
	                list.slice(0, numToShow).show();

	                button.click(function(){
	                  var showing = list.filter(':visible').length;
	                  list.slice(showing - 1, showing + numToShow).fadeIn();
	                  var nowShowing = list.filter(':visible').length;
	                  if (nowShowing >= numInList) {
	                    button.hide();
	                  }
	                });

	                /******fn to display more items on load more ends*****/

	                /****code to filetr data with radiou***/
	                $(document).on('change','#dashboard_radious_general',function(){
	                    var selected_radious = $(this).val();
	                });
	                /****end radious code here*****/
	            
	              }
	            });/***ajax ends here***/   
		    });
	
		}
	});/***ajax ends here***/


}/*****fn show position ends here*****/


/********dropzone files*********/

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var home_url = $('#home_url').val();
var page_name = $('#dropzone_form').attr('data-page');

var myDropzone = new Dropzone("div#drag_div", { 

	addRemoveLinks: true,
	removedfile: function(file) {
	   // var name = file.name;  
	   /*******code to get name of image that is created to save in folder*******/      
	    var name = file.previewElement.id; 
	    var img_name = name.split(".");
	    $('#dropzone_form').find('.hidden_new_image'+img_name[0]).remove();
	    
	    $.ajax({
	        type: 'POST',
	        url: home_url+"/general_user/removeimg_"+page_name,
	        data: "id="+name,
	        dataType: 'html'
	    });

	    
	 	// $('#dropzone_form').append('<input type="hidden" id="'+response+'" name="dropzone_file[]" value="" >');
		// $( ".dz-error-mark svg:last-child" ).attr('data-id',response);

		var _ref;
		return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
	},
	url: home_url+"/general_user/uploadmultiple_"+page_name,
	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	acceptedFiles: "image/*",
	success: function(file, response){
		if(response != "false"){

			/*******code to get name of image that is created to save in folder*******/
			file.previewElement.id = response;
			var img_name = response.split(".");

			//$('#dropzone_form').find('.drag_drop_text').text('');
			
			$('#dropzone_form').append('<input type="hidden" class="hidden_new_image'+img_name[0]+'" id="'+response+'" name="dropzone_file[]" value="'+response+'" >');
			$( ".dz-error-mark svg:last-child" ).attr('data-id',response);

			setTimeout(function(){
				$('#dropzone_form').find('.dz-preview').each(function(){
					$(this).find('.dz-remove').text('');
					$(this).find('.dz-remove').text('x');
				});
			}, 1000);
			return true;

		}
		$('.registrationform .upload_file_section .drag_file a').hide();
	},
	async: false

});

myDropzone.on("addedfile", function(file) {
    var fileType = file.type;

    if(fileType.indexOf('video') !== -1){
    	$( "#drag_div div.dz-preview:last .dz-image img").attr('src',home_url+'img/vedio_thumb.png');
    }

});
/********dropzone code ends********/

/****close modal on single profile page***/
function closestaticmodal(){
	$('#work_description').modal('hide');

	var current_url = window.location.href;
	var new_url = current_url.slice(0, current_url.lastIndexOf('/'));
	window.location.href = new_url;
}

function show_error(){
	alert('errorrr');
}

/****code for search on the category dashboard page****/
function searchFilter() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("keyword");
    filter = input.value.toUpperCase();
    ul = document.getElementById("all_busBy_cat");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h1")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }

    var visible_ul = $('.all_bus_by_cat > li:visible').length;
    
    if(visible_ul == 0) { // Checking if list is empty
	    $('#no_data_found').css('display', 'block'); // Display the Not Found message
	} else {
	    $('#no_data_found').css('display', 'none'); // Hide the Not Found message
	}

}
/****search functionality code ends here****/

