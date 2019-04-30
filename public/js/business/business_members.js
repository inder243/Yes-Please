/****save member****/
function saveMembers(data){

	var modal_type = $(data).attr('data-modal_type');

	var name = $('#'+modal_type).find('.member_name').val();

	if(name != ''){
		if(name.length < 3 || name.lenth > 20){
			$('#'+modal_type).find('.member_name').next().css('display','block');
			$('#'+modal_type).find('.member_name').next().text('');
			$('#'+modal_type).find('.member_name').next().text('Please add member name between 3 to 20 letters.');
			return false;
		}
	}

	var phone = $('#'+modal_type).find('.member_phone').val();

	if(phone == ''){

		$('#'+modal_type).find('.member_phone').next().css('display','block');
		$('#'+modal_type).find('.member_phone').next().text('');
		$('#'+modal_type).find('.member_phone').next().text('Please add phone number.');
		return false;

	}else if(phone.length < 9 || phone.length > 15){

		$('#'+modal_type).find('.member_phone').next().css('display','block');
		$('#'+modal_type).find('.member_phone').next().text('');
		$('#'+modal_type).find('.member_phone').next().text('Please add phone number between 9 tp 15 letters.');
		return false;

	}

	var email = $('#'+modal_type).find('.member_email').val();

	if(email == ''){
		$('#'+modal_type).find('.member_email').next().css('display','block');
		$('#'+modal_type).find('.member_email').next().text('');
		$('#'+modal_type).find('.member_email').next().text('Please add email.');
		return false;
	}else if(validateEmail(email) == false){
		$('#'+modal_type).find('.member_email').next().css('display','block');
		$('#'+modal_type).find('.member_email').next().text('');
		$('#'+modal_type).find('.member_email').next().text('Please add a valid email.');
		return false;
	}

	var notes = $('#'+modal_type).find('.member_notes').val();

	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	if(modal_type == 'add_memberModal'){
		jQuery('.pre_loader').css('display','block');
		$.ajax({
			type: 'POST',
			url: home_url+'business_user/save_members',
			data:{name:name,phone:phone,email:email,notes:notes},
			success:function(data){
				jQuery('.pre_loader').css('display','none');
				
				if(data.success == '1'){
					 
					alert(data.message);
					location.reload(true);
				}

			},/***success ends here**/
			error:function(){ jQuery('.pre_loader').css('display','none');}
		});/***ajax ends here**/
	}else if(modal_type == 'edit_memberModal'){
		var membrId = $(data).attr('data-member_id');
		jQuery('.pre_loader').css('display','block');
		$.ajax({
			type: 'POST',
			url: home_url+'business_user/save_members',
			data:{membrId:membrId,name:name,phone:phone,email:email,notes:notes},
			success:function(data){
				jQuery('.pre_loader').css('display','none');
				
				if(data.success == '1'){
					 
					alert(data.message);
					location.reload(true);
				}

			},/***success ends here**/
			error:function(){ jQuery('.pre_loader').css('display','none');}
		});/***ajax ends here**/
	}

}

/*****edit member modal****/
function openEditMember(data){
	var member_id = $(data).attr('data-member_id');

	var home_url = $('#home_url').val();

	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	jQuery('.pre_loader').css('display','block');
	$.ajax({
		type: 'POST',
		url: home_url+'business_user/get_edit_members',
		data:{member_id:member_id},
		success:function(data){
			jQuery('.pre_loader').css('display','none');
			
			if(data.success == '1'){
				$('#edit_memberModal').find('.member_name').val('');
				$('#edit_memberModal').find('.member_name').val(data.name);
				$('#edit_memberModal').find('.member_phone').val('');
				$('#edit_memberModal').find('.member_phone').val(data.phone);
				$('#edit_memberModal').find('.member_email').val('');
				$('#edit_memberModal').find('.member_email').val(data.email);
				$('#edit_memberModal').find('.member_notes').val('');
				$('#edit_memberModal').find('.member_notes').val(data.notes);
				$('#edit_memberModal').find('.member_submit').attr('data-member_id','');
				$('#edit_memberModal').find('.member_submit').attr('data-member_id',member_id);
				$('#edit_memberModal').modal({backdrop: 'static', keyboard: false});
				$('#edit_memberModal').modal('show');
			}

		},/***success ends here**/
		error:function(){ jQuery('.pre_loader').css('display','none');}
	});/***ajax ends here**/
}

/***fn to check email***/
function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( email );
}