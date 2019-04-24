$(document).ready(function(e){
	$('.select_product_img').change(function(e){
		e.preventDefault();
		var images = e.target.files;
		$('.products_img_msg').text('');
		$.each( images, function( key, value ) {
		  	$('.products_img_msg').append(value.name+', ');
		});

    });


    /*** on change category select on add product***/
    $('#allcategorylistprodct').change(function(e){
    	e.preventDefault();
    	$(this).removeClass('error_border');
    	$(this).next('.fill_fields').css('display','none');
    });

    /*** on change category select on add product***/
    $('.product_price_per').change(function(e){
    	e.preventDefault();
    	$(this).removeClass('error_border');

    	var price_from 	= $('.addProductform').find('.range_pricefield').find('.product_price_from').val(); 
		var price_to 	= $('.addProductform').find('.range_pricefield').find('.product_price_to').val(); 
		var price_per 	= $('.addProductform').find('.range_pricefield').find('.product_price_per').children("option:selected").val(); 

		if(price_from != '' && price_to !='' && price_per !='' ){
			$('.addProductform').find('.range_pricefield').find('.product_price_fromerror').css('display','none');
			$('.addProductform').find('.range_pricefield').find('.product_price_fromerror').text('');
		}
    });

    

});/***document ready ends here***/

/*****function to open products popup****/
function openAddProducts(abc){
	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	jQuery('.pre_loader').css('display','block');
	$.ajax({
		type: 'GET',
		url: home_url+'business_user/get_categories',
		success:function(data){
			jQuery('.pre_loader').css('display','none');
			
			if(data.success == '1'){
				 
				$('#topad').find('.allCategoryList').html('');
				$('#topad').find('.allCategoryList').html(data.cat_html);
				$('#topad').modal({backdrop: 'static', keyboard: false});
				$('#topad').modal('show');
			}

			if(data.success == '2'){
				$('#topad').find('.allCategoryList').html('');
				$('#topad').find('.allCategoryList').html(data.message);
				$('#topad').modal({backdrop: 'static', keyboard: false});
				$('#topad').modal('show');
			}

		},/***success ends here**/
	});/***ajax ends here**/
}/***openAddProducts fn ends here***/

/***fn to open edit product popup***/
function openEditProductModal(data){
	var product_id = $(data).attr('data-product_id');
	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	jQuery('.pre_loader').css('display','block');
	$.ajax({
		type: 'POST',
		url: home_url+'business_user/get_product_Detail',
		data:{product_id:product_id},
		success:function(data){
			jQuery('.pre_loader').css('display','none');
			
			if(data.success == '1'){
				 
				$('#edittopad').find('.hidden_product_id').val('');
				$('#edittopad').find('.hidden_product_id').val(data.product_id);
				$('#edittopad').find('.allCategoryList').html('');
				$('#edittopad').find('.allCategoryList').html(data.cat_html);
				$('#edittopad').modal({backdrop: 'static', keyboard: false});
				$('#edittopad').modal('show');
				$('#edittopad').find('.product_name').val('');
				$('#edittopad').find('.product_name').val(data.name);
				$('#edittopad').find('.photo_video_list ul').html('');
				$('#edittopad').find('.photo_video_list ul').html(data.selectImgHtml);

				if(data.price_type == 'fix'){
					$('#edittopad').find('.fix_radio').attr('checked', true);
					$('#edittopad').find('.range_pricefield').find('.product_price_from').prop( "disabled", true );
					$('#edittopad').find('.range_pricefield').find('.product_price_to').prop( "disabled", true );
					$('#edittopad').find('.range_pricefield').find('.product_price_per').prop( "disabled", true );
					$('#edittopad').find('.fix_pricefield').find('.product_price').prop( "disabled", false );
					$('#edittopad').find('.product_price').val(data.price);
				}else if(data.price_type == 'range'){
					$('#edittopad').find('.range_radio').attr('checked', true);
					$('#edittopad').find('.fix_pricefield').find('.product_price').prop( "disabled", true );
					$('#edittopad').find('.range_pricefield').find('.product_price_from').prop( "disabled", false );
					$('#edittopad').find('.range_pricefield').find('.product_price_to').prop( "disabled", false );
					$('#edittopad').find('.range_pricefield').find('.product_price_per').prop( "disabled", false );
					$('#edittopad').find('.product_price_from').val(data.price_from);
					$('#edittopad').find('.product_price_to').val(data.price_to);
					$('#edittopad').find('.product_name').val(data.name);
					$('#edittopad').find(".product_price_per option[value="+data.price_per+"]").attr('selected', 'selected');
				}

				$('#edittopad').find('.product_description').val('');
				$('#edittopad').find('.product_description').val(data.product_description);

			}

			if(data.success == '2'){
				$('#edittopad').find('.hidden_product_id').val('');
				$('#edittopad').find('.hidden_product_id').val(data.product_id);
				$('#edittopad').find('.allCategoryList').html('');
				$('#edittopad').find('.allCategoryList').html(data.message);
				$('#edittopad').modal({backdrop: 'static', keyboard: false});
				$('#edittopad').modal('show');
				$('#edittopad').find('.product_name').val('');
				$('#edittopad').find('.product_name').val(data.name);
				$('#edittopad').find('.photo_video_list ul').html('');
				$('#edittopad').find('.photo_video_list ul').html(data.selectImgHtml);

				if(data.price_type == 'fix'){
					$('#edittopad').find('.fix_radio').attr('checked', true);
					$('#edittopad').find('.range_pricefield').find('.product_price_from').prop( "disabled", true );
					$('#edittopad').find('.range_pricefield').find('.product_price_to').prop( "disabled", true );
					$('#edittopad').find('.range_pricefield').find('.product_price_per').prop( "disabled", true );
					$('#edittopad').find('.fix_pricefield').find('.product_price').prop( "disabled", false );
					$('#edittopad').find('.product_price').val(data.price);
				}else if(data.price_type == 'range'){
					$('#edittopad').find('.range_radio').attr('checked', true);
					$('#edittopad').find('.fix_pricefield').find('.product_price').prop( "disabled", true );
					$('#edittopad').find('.range_pricefield').find('.product_price_from').prop( "disabled", false );
					$('#edittopad').find('.range_pricefield').find('.product_price_to').prop( "disabled", false );
					$('#edittopad').find('.range_pricefield').find('.product_price_per').prop( "disabled", false );
					$('#edittopad').find('.product_price_from').val(data.price_from);
					$('#edittopad').find('.product_price_to').val(data.price_to);
					$('#edittopad').find('.product_name').val(data.name);
					$('#edittopad').find(".product_price_per option[value="+data.price_per+"]").attr('selected', 'selected');
				}
				$('#edittopad').find('.product_description').val('');
				$('#edittopad').find('.product_description').val(data.product_description);

			}

		},/***success ends here**/
	});/***ajax ends here**/
}/****edit product ends***/


/****add product validations****/
function ProductValidation(data){
	
	var modaltype = $(data).attr('data-modal_type');
	var product_name = $('.'+modaltype).find('.product_name').val();

	if(product_name == ''){
		$('.'+modaltype).find('.product_name').addClass('error_border');
		$('.'+modaltype).find('.product_name').next('.fill_fields').css('display','block');
		$('.'+modaltype).find('.product_name').next('.fill_fields').text('');
		$('.'+modaltype).find('.product_name').next('.fill_fields').text('Please add product name');
		return false;
	}else if(product_name.length < 3 || product_name.length > 20){
		$('.'+modaltype).find('.product_name').addClass('error_border');
		$('.'+modaltype).find('.product_name').next('.fill_fields').css('display','block');
		$('.'+modaltype).find('.product_name').next('.fill_fields').text('');
		$('.'+modaltype).find('.product_name').next('.fill_fields').text('Name must be between 3 to 20 letters');
		return false;
	}

	var product_categpry = $('.'+modaltype).find('.allCategoryList').children("option:selected").val();

	if(product_categpry == '' || product_categpry == 'undefined'){
		$('.'+modaltype).find('.allCategoryList').addClass('error_border');
		$('.'+modaltype).find('.allCategoryList').next('.fill_fields').css('display','block');
		$('.'+modaltype).find('.allCategoryList').next('.fill_fields').text('');
		$('.'+modaltype).find('.allCategoryList').next('.fill_fields').text('Please choose any category');
		return false;
	}

	var price_type = $('.'+modaltype).find("input[name='radios']:checked").val();

	if(price_type == 'fix'){
		
		var product_price = $('.'+modaltype).find('.fix_pricefield').find('.product_price').val();

		if(product_price == ''){
			$('.'+modaltype).find('.fix_pricefield').find('.product_price').addClass('error_border');
			$('.'+modaltype).find('.fix_pricefield').find('.product_price_error').css('display','block');
			$('.'+modaltype).find('.fix_pricefield').find('.product_price_error').text('');
			$('.'+modaltype).find('.fix_pricefield').find('.product_price_error').text('Please add price');
			return false;
		}else if(product_price.length <= 0 || product_price.length > 7){
			$('.'+modaltype).find('.fix_pricefield').find('.product_price').addClass('error_border');
			$('.'+modaltype).find('.fix_pricefield').find('.product_price_error').css('display','block');
			$('.'+modaltype).find('.fix_pricefield').find('.product_price_error').text('');
			$('.'+modaltype).find('.fix_pricefield').find('.product_price_error').text('Please add price between 1 to 7 digits');
			return false;
		}
		
	}else if(price_type == 'range'){
		var price_from 	= $('.'+modaltype).find('.range_pricefield').find('.product_price_from').val(); 
		var price_to 	= $('.'+modaltype).find('.range_pricefield').find('.product_price_to').val(); 
		var price_per 	= $('.'+modaltype).find('.range_pricefield').find('.product_price_per').children("option:selected").val(); 

		if(price_from == '' && price_to == '' && (price_per == '' || price_per == 'undefined')){
			$('.'+modaltype).find('.range_pricefield').find('.product_price_from').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_to').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_per').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').css('display','block');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('Please fill above price fields');
			return false;
		}else if(price_from != '' && price_to == '' && (price_per == '' || price_per == 'undefined')){
			$('.'+modaltype).find('.range_pricefield').find('.product_price_from').removeClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_to').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_per').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').css('display','block');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('Please fill above price fields');
			return false;
		}else if(price_from == '' && price_to != '' && (price_per == '' || price_per == 'undefined')){
			$('.'+modaltype).find('.range_pricefield').find('.product_price_from').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_to').removeClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_per').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').css('display','block');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('Please fill above price fields');
			return false;
		}else if(price_from == '' && price_to != '' && (price_per != '' || price_per != 'undefined')){
			$('.'+modaltype).find('.range_pricefield').find('.product_price_from').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_to').removeClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_per').removeClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').css('display','block');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('Please fill above price fields');
			return false;
		}else if(price_from != '' && price_to != '' && (price_per == '' || price_per == 'undefined')){
			$('.'+modaltype).find('.range_pricefield').find('.product_price_from').removeClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_to').removeClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_per').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').css('display','block');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('Please fill above price fields');
			return false;
		}else if(price_from.length <= 0 || price_from.length > 7 || price_to.length <= 0 || price_to.length > 7){
			$('.'+modaltype).find('.range_pricefield').find('.product_price_from').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_to').addClass('error_border');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').css('display','block');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('');
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').text('Please add price between 1 tp 7 in both fields');
			return false;
		}else{
			$('.'+modaltype).find('.range_pricefield').find('.product_price_fromerror').css('display','none');
		}
	}

	var product_description = $('.'+modaltype).find('.product_description').val();

	if(product_description == ''){
		$('.'+modaltype).find('.product_description').addClass('error_border');
		$('.'+modaltype).find('.product_description').next('.product_descerror').css('display','block');
		$('.'+modaltype).find('.product_description').next('.product_descerror').css('color','red');
		$('.'+modaltype).find('.product_description').next('.product_descerror').text('');
		$('.'+modaltype).find('.product_description').next('.product_descerror').text('Please add product description');
		return false;
	}else if(product_description.length < 100 || product_description > 2000){
		$('.'+modaltype).find('.product_description').addClass('error_border');
		$('.'+modaltype).find('.product_description').next('.product_descerror').css('display','block');
		$('.'+modaltype).find('.product_description').next('.product_descerror').css('color','red');
		$('.'+modaltype).find('.product_description').next('.product_descerror').text('');
		$('.'+modaltype).find('.product_description').next('.product_descerror').text('Please add product description between 100 to 2000 letters');
		return false;
	}
	
	$('.'+modaltype).submit();
}


/***fn for radio button on add product***/
function changeRadioPriceType(rval){
	var price_type = $(rval).attr('value');
	var modal_type = $(rval).attr('data-modal_type');
	$(rval).attr('checked', true);
	if(price_type == 'fix'){

		$('.'+modal_type).find('.range_pricefield').find('.product_price_from').val('');
		$('.'+modal_type).find('.range_pricefield').find('.product_price_to').val('');
		$('.'+modal_type).find('.range_pricefield').find('.product_price_per').val('');
		$('.'+modal_type).find('.range_pricefield').find('.product_price_from').prop( "disabled", true );
		$('.'+modal_type).find('.range_pricefield').find('.product_price_to').prop( "disabled", true );
		$('.'+modal_type).find('.range_pricefield').find('.product_price_per').prop( "disabled", true );
		$('.'+modal_type).find('.fix_pricefield').find('.product_price').prop( "disabled", false );
		$('.'+modal_type).find('.range_pricefield').find('.product_price_from').removeClass('error_border');
		$('.'+modal_type).find('.range_pricefield').find('.product_price_to').removeClass('error_border');
		$('.'+modal_type).find('.range_pricefield').find('.product_price_fromerror').css('display','none');
		
	}else if(price_type == 'range'){

		$('.'+modal_type).find('.fix_pricefield').find('.product_price').val('');
		$('.'+modal_type).find('.fix_pricefield').find('.product_price').prop( "disabled", true );
		$('.'+modal_type).find('.range_pricefield').find('.product_price_from').prop( "disabled", false );
		$('.'+modal_type).find('.range_pricefield').find('.product_price_to').prop( "disabled", false );
		$('.'+modal_type).find('.range_pricefield').find('.product_price_per').prop( "disabled", false );
		$('.'+modal_type).find('.fix_pricefield').find('.product_price').removeClass('error_border');
		$('.'+modal_type).find('.fix_pricefield').find('.product_price_error').css('display','none');
		
	}
}


/*****fn to remove error message on add product*****/
function removeErrMessge(data){
	var value_field = $(data).val();
	var current_id = $(data).attr('id');

	$(data).removeClass('error_border');
	$(data).next('.fill_fields').css('display','none');
	
	if(current_id == 'pro_price_from' || current_id == 'pro_price_to'){
		var price_from 	= $('.addProductform').find('.range_pricefield').find('.product_price_from').val(); 
		var price_to 	= $('.addProductform').find('.range_pricefield').find('.product_price_to').val(); 
		var price_per 	= $('.addProductform').find('.range_pricefield').find('.product_price_per').children("option:selected").val(); 

		if(price_from != '' && price_to !='' && price_per !='' ){
			$('.addProductform').find('.range_pricefield').find('.product_price_fromerror').css('display','none');
			$('.addProductform').find('.range_pricefield').find('.product_price_fromerror').text('');
		}
	}
}

/****delete product fn****/
function deleteProduct(data){
	var product_id = $(data).attr('data-product_id');
	var product_num = $(data).attr('data-product_num');

	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	jQuery('.pre_loader').css('display','block');
	$.ajax({
		type: 'POST',
		url: home_url+'business_user/delete_product',
		data:{product_id:product_id},
		success:function(data){
			jQuery('.pre_loader').css('display','none');
			
			if(data.success == '1'){
				 
				$('#product_table').find('.product_'+product_num).remove();
				var rowCount = $('#product_table tbody tr').length;
				if(rowCount == 0){
					$('#product_table tbody').html('');
					$('#product_table tbody').html('<tr><td colspan="5">No product Found!</td></tr>');
				}

			}

			if(data.success == '0'){
				alert(data.message);

			}

		},/***success ends here**/
	});/***ajax ends here**/
}/****delete product ends here****/

/****fn to delete product selected images****/
function deleteProductSelectedImg(dimg){

	var img_name = $(dimg).attr('data-img');
	var product_id = $(dimg).attr('data-product_id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$.ajax({
		url: home_url+'business_user/removeproductimg',
		type: 'POST',
		data:{img_name:img_name,product_id:product_id},
		success:function(response){

			if(response.success == 1){

				var image_name = img_name.split(".");
				$('.photo_video_list ul').find('#img_'+image_name[0]).remove();
			}
			
		}
	});/**ajax ends here**/	
}/****delete selected img fn ends here***/