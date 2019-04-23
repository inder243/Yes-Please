
//function to add a new field
	function addNewField(type) {
		var Qid = 'q_' + Math.floor((Math.random() * 10000) + 100000);
		//if type is 1 then add textbox
		if (type == 1) {

			
			$('.dynamic_form').append('<div class="for_textbox field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="textbox"><h5 class="mb-3">Textbox</h5><div class="form-group"><label>Title</label><input class="form-control textbox_name title" type="textbox" name="textbox_name"></div><div class="form-group"><label>Description (Optional)</label><input class="form-control textbox_desc description" type="textbox" name="textbox_desc"></div><div class="form-group"><label>Placeholder (Optional)</label><input class="form-control textbox_plc placeholder" type="textbox" name="textbox_plc"></div><div class="form-group"><label>Minimum Length (Optional)</label><input class="form-control textbox_min minlen" type="textbox" name="textbox_min"></div><div class="form-group"><label>Max Length (Optional)</label><input class="form-control textbox_max maxlen" type="textbox" name="textbox_max"></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required"  name="isrequired" value="" id="defaultCheck'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheck'+Qid+'">Is This Field Required</label></div></div><button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button></div>');
		} 
		else if (type == 2) {//if type is 2 then add textarea

			
			$('.dynamic_form').append('<div class="for_textarea field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="textarea"><h5 class="mb-3">Text Area</h5><div class="form-group"><label>Title</label><input class="form-control textbox_name title" type="textbox" name="textbox_name"></div><div class="form-group"><label>Description (Optional)</label><input class="form-control textbox_desc description" type="textbox" name="textbox_desc"></div><div class="form-group"><label>Placeholder (Optional)</label><input class="form-control textbox_plc placeholder" type="textbox" name="textbox_plc"></div><div class="form-group"><label>Minimum Length (Optional)</label><input class="form-control textbox_min minlen" type="textbox" name="textbox_min"></div><div class="form-group"><label>Max Length (Optional)</label><input class="form-control textbox_max maxlen" type="textbox" name="textbox_max"></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required" name="isrequired" value="" id="defaultCheck'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheck'+Qid+'">Is This Field Required</label></div></div><button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button></div>');
		} 
		else if(type==3)//if type is 3 then add datepicker
		{
			$('.dynamic_form').append('<div class="for_datepicker field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="datepicker"><h5 class="mb-3">Datepicker</h5><div class="form-group"><label>Title</label><input class="form-control textbox_name title" type="textbox" name="textbox_name"></div><div class="form-group"><label>Description (Optional)</label><input class="form-control textbox_desc description" type="textbox" name="textbox_desc"></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required" name="isrequired" value="" id="defaultCheck'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheck'+Qid+'">Is This Field Required</label></div></div><button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button></div>');

		}
		else if(type==4)//if type is 4 then add timepicker
		{
			$('.dynamic_form').append('<div class="for_timepicker field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="timepicker"><h5 class="mb-3">Timepicker</h5><div class="form-group"><label>Title</label><input class="form-control textbox_name title" type="textbox" name="textbox_name"></div><div class="form-group"><label>Description (Optional)</label><input class="form-control textbox_desc description" type="textbox" name="textbox_desc"></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required" name="isrequired" value="" id="defaultCheck'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheck'+Qid+'">Is This Field Required</label></div></div><button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button></div>');

		}
		else if (type == 5) //if type is 5 then add radio group
		{
			$('.dynamic_form').append('<div class="for_radio field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="radio"><h5 class="mb-3">Radio Select</h5><div class="form-group"><label>What will be title of Radiobox Field?</label><input type="textbox" class="form-control title radiobox_name" name="radiobox_name"></div><div class="form-group"><label>What will be options of radiobox?</label><div class="multi-field-wrapper"><div class="multi-fields"><div class="multi-field"><div class="form-group"><div class="row"><div class="col-4"><input name="radio_name[]" class="form-control radio_name" placeholder="Label" type="text"></div><div class="col-4"><input name="radio_value[]" class="form-control radio_value" placeholder="Value" type="text"></div><div class="col-4"><button type="button" class="btn btn-success add-field" onclick="addMoreOptions(this);" data-label="radio_name" data-value="radio_value">Add Option</button></div></div></div></div></div></div></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required" type="checkbox" value="" id="defaultCheckradio'+Qid+'"><label class="form-check-label" for="defaultCheckradio'+Qid+'">Is This Field Required</label></div><div class="form-check"><input class="form-check-input is_filter" value="" id="defaultCheckradiofilterq_'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheckradiofilterq_'+Qid+'">Is Filter</label></div><div class="form-check logic_jump_container"><input class="form-check-input is_cond" onclick="addLogicJumpContainer(this);" type="checkbox" name="condition" value="" id="defaultCheckradioreq'+Qid+'"><label class="form-check-label" for="defaultCheckradioreq'+Qid+'">Add Logic Jump</label></div></div><button type="button" class="btn btn-danger remove-div" onclick="removeOptionsdiv(this);">Remove Div</button></div>');
		} 
		else if (type == 6) {

			$('.dynamic_form').append('<div class="for_number field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="number"><h5 class="mb-3">Number</h5><div class="form-group"><label>Title</label><input class="form-control textbox_name title" type="textbox" name="textbox_name"></div><div class="form-group"><label>Description (Optional)</label><input class="form-control textbox_desc description" type="textbox" name="textbox_desc"></div><div class="form-group"><label>Placeholder (Optional)</label><input class="form-control textbox_plc placeholder" type="textbox" name="textbox_plc"></div><div class="form-group"><label>Minimum Length (Optional)</label><input class="form-control textbox_min minlen" type="textbox" name="textbox_min"></div><div class="form-group"><label>Max Length (Optional)</label><input class="form-control textbox_max maxlen" type="textbox" name="textbox_max"></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required"  name="isrequired" value="" id="defaultCheck'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheck'+Qid+'">Is This Field Required</label></div></div><button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button></div>');
		} 
		else if (type == 7) //if type is 7 then add chekbox
		{

			$('.dynamic_form').append('<div class="for_checkbox field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="checkbox"><h5 class="mb-3">Checkbox</h5><div class="form-group"><label>What will be title of Checkbox Field?</label><input type="textbox" class="form-control title checkbox_name" name="checkbox_name"></div><div class="form-group"><label>What will be options of checkbox?</label><div class="multi-field-wrapper"><div class="multi-fields"><div class="multi-field"><div class="form-group"><div class="row"><div class="col-4"><input name="option_name[]" class="form-control option_name" placeholder="Label" type="text"></div><div class="col-4"><input name="option_value[]" class="form-control option_value" placeholder="Value" type="text"></div><div class="col-4"><button type="button" class="btn btn-success add-field" onclick="addMoreOptions(this);" data-label="option_name" data-value="option_value">Add Option</button></div></div></div></div></div></div></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required" type="checkbox" value="" id="defaultCheckchk'+Qid+'"><label class="form-check-label" for="defaultCheckchk'+Qid+'">Is This Field Required</label></div><div class="form-check"><input class="form-check-input is_filter" value="" id="defaultCheckradiofilterq_'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheckradiofilterq_'+Qid+'">Is Filter</label></div><div class="form-check logic_jump_container" style="display:none"><input class="form-check-input is_cond" onclick="addLogicJumpContainer(this);" type="checkbox" name="condition" value="" id="defaultCheckchkreq'+Qid+'"><label class="form-check-label" for="defaultCheckchkreq'+Qid+'">Add Logic Jump</label></div></div><button type="button" class="btn btn-danger remove-div" onclick="removeOptionsdiv(this);">Remove Div</button></div>');

		} 
		else if (type == 8) //if type is 8 then add dropdown
		{

			$('.dynamic_form').append('<div class="for_dropdown field_group text-row ui-sortable-handle" id="' + Qid +'" data-type="dropdown"><h5 class="mb-3">Dropdown</h5><div class="form-group"><label>What will be title of dropdown?</label><input type="textbox" class="form-control title dropdown_name" name="dropdown_name"></div><div class="form-group"><label>What will be options of dropdown?</label><div class="multi-field-wrapper"><div class="multi-fields"><div class="multi-field"><div class="form-group"><div class="row"><div class="col-4"><input name="dropdown_name[]" class="form-control dropdown_name" placeholder="Label" type="text"></div><div class="col-4"><input name="dropdown_value[]" class="form-control dropdown_value" placeholder="Value" type="text"></div><div class="col-4"><button type="button" class="btn btn-success add-field" onclick="addMoreOptions(this);" data-label="dropdown_name" data-value="dropdown_value">Add Option</button></div></div></div></div></div></div></div><div class="form-group"><div class="form-check"><input class="form-check-input is_required" type="checkbox" value="" id="defaultCheckdrp'+Qid+'"><label class="form-check-label" for="defaultCheckdrp'+Qid+'">Is This Field Required</label></div><div class="form-check"><input class="form-check-input is_filter" value="" id="defaultCheckradiofilterq_'+Qid+'" type="checkbox"><label class="form-check-label" for="defaultCheckradiofilterq_'+Qid+'">Is Filter</label></div><div class="form-check logic_jump_container" style="display:none"><input class="form-check-input is_cond" onclick="addLogicJumpContainer(this);" type="checkbox" name="condition" value="" id="defaultCheckdrpreq'+Qid+'"><label class="form-check-label" for="defaultCheckdrpreq'+Qid+'">Add Logic Jump</label></div></div><button type="button" class="btn btn-danger remove-div" onclick="removeOptionsdiv(this);">Remove Div</button></div>');

		} 
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	}

	//function to add more options in checkbox group,radio group or in dropdown

	function addMoreOptions(el) {
		var label = $(el).attr("data-label"); //get label of option
		var value = $(el).attr("data-value"); //get value of option

		$(el).parents().eq(5).append('<div class="multi-field"><div class="form-group"><div class="row"><div class="col-4"><input name="' + label + '[]" class="form-control '+label+'" placeholder="Label" type="text"></div><div class="col-4"><input name="' + value + '[]" class="form-control '+value+'" placeholder="Value" type="text"></div><div class="col-4"><button type="button" class="btn btn-success add-field"  data-label="' + label + '" data-value="' + value + '" onclick="removeOptions(this);">Remove Option</button></div></div></div></div>');
		

	}

	//function to remove field or option
	function removeOptions(el) {
		$(el).parents().eq(2).remove();

	}
	function removeOptionsdiv(el) 
	{
		//alert($(el).parent().attr('id'));
		$(el).parent().remove();

	}
	

	//add logic jump container

	function addLogicJumpContainer(el) {
		//check if user has added logic jump for particular question
		var cond = $(el).prop('checked');

		if (cond == "true" || cond == true) {
			var getMainField = $(el).parent().parent();
			var getId = $(el).parent().parent().attr('id');
			var type = $(el).parent().parent().attr('data-type');

			//var getId = $(el).parent('.logic_jump').remove();

			//get all questions of form to show in hide dropdown

			//alert('fdfdfd');
			$(el).parent('.logic_jump_container').append('<div class="form-group logic_jump_div"><div class="logic_jump"><label>If Value</label><div class="row"><div class="col-3"><select class="form-control operator"><option value="0">Make a selection</option><option value="1">=</option><option value="2">!=</option><option value="3">></option><option value="4"><</option></select></div><div class="col-2"><input class="form-control condvalue" value="" type="text"></div><div class="col-3"><select class="form-control finalchoice" onchange="showqueslist(this);"><option value="0">Make a selection</option><option value="1">GO TO</option><option value="2">Finish</option></select></div><div class="action_button"><button type="button" class="add-field btn btn-info btn-success" onclick="addMoreCondition(this);">+</button></div></div></div></div>');

			
		} else {
			$(el).parent('.logic_jump_container').find('.logic_jump_div').remove();
		}

	}

	//function to add more conditions in a question

	function addMoreCondition(el) {

		
		$(el).parents().eq(4).append('<div class="form-group logic_jump_div"><div class="logic_jump"><label>If Value</label><div class="row"><div class="col-3"><select class="form-control operator"><option value="0">Make a selection</option><option value="1">=</option><option value="2">!=</option><option value="3">></option><option value="4"><</option></select></div><div class="col-2"><input class="form-control condvalue" value="" type="text"></div><div class="col-3"><select class="form-control finalchoice" onchange="showqueslist(this);"><option value="0">Make a selection</option><option value="1">GO TO</option><option value="2">Finish</option></select></div><div class="action_button"><button type="button" class="add-field btn btn-info btn-success" onclick="removeCondition(this);">-</button></div></div></div></div>');

		
	}

	//function to remove condition from a question
	function removeCondition(el) {
		$(el).parents().eq(3).remove();
	}

	//function to show queslist
	function showqueslist(el) {

		var showQuesOrNot = $(el).val();

		//if goto option is selected then show all questions
		if (showQuesOrNot == "1" || showQuesOrNot == 1) {
			var html = '';
			html += '<option value="0">Make a selection</option>';
			$('.dynamic_form .field_group').each(function() {
				var qid = $(this).attr('id');
				var title = $(this).find('.title').val();
				html += '<option value=' + qid + '>' + title + '</option>';
			});
			//console.log(html);

			$(el).parent().parent().find('.queslistcontainer').remove();
			
			$(el).parent().parent().append('<div class="col-3 queslistcontainer"><select class="form-control queslist">' + html + '</select></div>');

		} else //if finish option is selected remove questions dropdown
		{
			$(el).parent().parent().find('.queslistcontainer').remove();
		}

	}


	//function to create array that will be saved in db
	$('#add_form').click(function() {

		var noOfFields = $('.dynamic_form .field_group').length;
		if (noOfFields <= 0) {
			alert('Please add atleast one field');
			return false;
		}

		var fields = [];
		var validate = true;
		var numvalidate = true;
		var catId = $('.dynamic_form').attr('data-cat');
		
		//iterate through each field
		$('.dynamic_form .field_group').each(function() {

			var typeOfField = $(this).attr('data-type');
			var Qid = $(this).attr('id');
			var is_cond = $(this).find('.is_cond').is(':checked');
			//check if question is required
			var is_req = $(this).find('.is_required').is(':checked');
			

			//get data for textbox/textarea/number/range
			if (typeOfField == "textbox" || typeOfField == "textarea" || typeOfField == "number" || typeOfField == "range") {
				var field = {};
				//get title of question
				var title = $(this).find('.title').val();
				if (title == '') {
					validate = false;
					$(this).find('.title').css('border', '1px solid #c00');
				} else {
					$(this).find('.title').removeAttr('style');
				}
				//get placeholder
				var placeholder = $(this).find('.placeholder').val();
				//get description
				var description = $(this).find('.description').val();
				//get min value
				var min = $(this).find('.minlen').val();

				//if(min!='' && !($.isNumeric(min)))
				if (min.length > 0 && !($.isNumeric(min))) {
					numvalidate = false;
				}

				//get max value
				var max = $(this).find('.maxlen').val();

				if (max.length > 0 && !($.isNumeric(max))) {
					numvalidate = false;
				}


				
				//create array of filled values
				field['id'] = Qid;
				field['type'] = typeOfField;
				field['title'] = title;
				field['placeholder'] = placeholder;
				field['description'] = description;
				field['min'] = min;
				field['max'] = max;
				field['is_required'] = is_req;
				//push array in field array
				fields.push(field);

			} 
			//get data for datepicker/timepicker
			else if (typeOfField == "datepicker" || typeOfField == "timepicker") {
				var field = {};
				//get title of question
				var title = $(this).find('.title').val();
				if (title == '') {
					validate = false;
					$(this).find('.title').css('border', '1px solid #c00');
				} else {
					$(this).find('.title').removeAttr('style');
				}
				
				//get description
				var description = $(this).find('.description').val();
				
				//create array of filled values
				field['id'] = Qid;
				field['type'] = typeOfField;
				field['title'] = title;
				field['placeholder'] = '';
				field['description'] = description;
				field['min'] = '';
				field['max'] = '';
				field['is_required'] = is_req;
				//push array in field array
				fields.push(field);

			}
			else if (typeOfField == "checkbox") //get data for checkbox
			{
				var is_filter = $(this).find('.is_filter').is(':checked');
				var field = {};
				//get title of question
				var title = $(this).find('.title').val();
				if (title == '') {
					validate = false;
					$(this).find('.title').css('border', '1px solid #c00');
				} else {
					$(this).find('.title').removeAttr('style');
				}
				//check if question is required
				
				//create array of filled values
				field['id'] = Qid;
				field['type'] = 'checkbox';
				field['title'] = title;
				field['placeholder'] = '';
				field['is_required'] = is_req;
				field['is_filter'] = is_filter;

				var alloptions = [];
				field['options'] = {};
				//get options  of checkbox
				$(this).find('.multi-field').each(function() {
					var option = {};
					//get name of each option
					option['option_name'] = $(this).find('.option_name').val();
					if (option['option_name'] == '') {
						validate = false;
						$(this).find('.option_name').css('border', '1px solid #c00');
					} else {
						$(this).find('.option_name').removeAttr('style');
					}
					//get value of each option
					option['option_value'] = $(this).find('.option_value').val();
					if (option['option_value'] == '') {
						validate = false;
						$(this).find('.option_value').css('border', '1px solid #c00');
					} else {
						$(this).find('.option_value').removeAttr('style');
					}
					alloptions.push(option);

				});

				field['options'] = alloptions;
				//push array in field array
				//fields.push(field);

				//get all jumps
				var allconditions = [];
				field['conditions'] = {};
				//get options  of checkbox
				$(this).find('.logic_jump').each(function() {
					var cond = {};
					cond['operator'] = $(this).find('.operator').val();
					cond['condvalue'] = $(this).find('.condvalue').val();
					cond['finalchoice'] = $(this).find('.finalchoice').val();
					cond['queslist'] = $(this).find('.queslist').val();

					if (cond['queslist'] == '0' || cond['queslist'] == 0) {
						validate = false;
						$(this).find('.queslist').css('border', '1px solid #c00');
					} else {
						$(this).find('.queslist').removeAttr('style');
					}


					if (cond['operator'] == '0' || cond['operator'] == 0) {
						validate = false;
						$(this).find('.operator').css('border', '1px solid #c00');
					} else {
						$(this).find('.operator').removeAttr('style');
					}

					if (cond['condvalue'] == '') {
						validate = false;
						$(this).find('.condvalue').css('border', '1px solid #c00');
					} else {
						$(this).find('.condvalue').removeAttr('style');
					}

					if (cond['finalchoice']  == '0' || cond['finalchoice'] == 0) {
						validate = false;
						$(this).find('.finalchoice').css('border', '1px solid #c00');
					} else {
						$(this).find('.finalchoice').removeAttr('style');
					}

					if ($(this).find('.finalchoice').val() == 2) //if finish option is choosen
					{
						cond['queslist'] = "0";
					} else {
						cond['queslist'] = $(this).find('.queslist').val();
					}

					//push all conditions
					allconditions.push(cond);

				});

				field['conditions'] = allconditions;
				fields.push(field);


			} else if (typeOfField == "radio") //get data for radio
			{
				var is_filter = $(this).find('.is_filter').is(':checked');
				var field = {};
				//get title of question
				var title = $(this).find('.title').val();
				if (title == '') {
					validate = false;
					$(this).find('.title').css('border', '1px solid #c00');
				} else {
					$(this).find('.title').removeAttr('style');
				}
				//check if question is required
				
				field['id'] = Qid;
				field['type'] = 'radio';
				field['title'] = title;
				field['placeholder'] = '';
				field['is_required'] = is_req;
				field['is_filter'] = is_filter;

				var alloptions = [];
				field['options'] = {};
				//get options  of radio
				$(this).find('.multi-field').each(function() {
					var option = {};
					//get name of each option
					option['option_name'] = $(this).find('.radio_name').val();
					if (option['option_name'] == '') {
						validate = false;
						$(this).find('.radio_name').css('border', '1px solid #c00');
					} else {
						$(this).find('.radio_name').removeAttr('style');
					}
					//get value of each option
					option['option_value'] = $(this).find('.radio_value').val();
					if (option['option_value'] == '') {
						validate = false;
						$(this).find('.radio_value').css('border', '1px solid #c00');
					} else {
						$(this).find('.radio_value').removeAttr('style');
					}
					alloptions.push(option);

				});
				field['options'] = alloptions;
				//fields.push(field);

				//get all jumps
				var allconditions = [];
				field['conditions'] = {};
				//get options  of checkbox
				$(this).find('.logic_jump').each(function() {
					var cond = {};
					cond['operator'] = $(this).find('.operator').val();
					cond['condvalue'] = $(this).find('.condvalue').val();
					cond['finalchoice'] = $(this).find('.finalchoice').val();
					cond['queslist'] = $(this).find('.queslist').val();

					if (cond['queslist'] == '0' || cond['queslist'] == 0) {
						validate = false;
						$(this).find('.queslist').css('border', '1px solid #c00');
					} else {
						$(this).find('.queslist').removeAttr('style');
					}

					if (cond['operator'] == '0' || cond['operator'] == 0) {
						validate = false;
						$(this).find('.operator').css('border', '1px solid #c00');
					} else {
						$(this).find('.operator').removeAttr('style');
					}

					if (cond['condvalue'] == '') {
						validate = false;
						$(this).find('.condvalue').css('border', '1px solid #c00');
					} else {
						$(this).find('.condvalue').removeAttr('style');
					}

					if (cond['finalchoice']  == '0' || cond['finalchoice'] == 0) {
						validate = false;
						$(this).find('.finalchoice').css('border', '1px solid #c00');
					} else {
						$(this).find('.finalchoice').removeAttr('style');
					}

					if ($(this).find('.finalchoice').val() == 2) //if finish option is choosen
					{
						cond['queslist'] = "0";
					} else {
						cond['queslist'] = $(this).find('.queslist').val();
					}
					//push all conditions
					allconditions.push(cond);

				});

				field['conditions'] = allconditions;
				fields.push(field);

			} else if (typeOfField == "dropdown") //get data for dropdown
			{
				var is_filter = $(this).find('.is_filter').is(':checked');
				var field = {};
				//get title of question
				var title = $(this).find('.title').val();
				if (title == '') {
					validate = false;
					$(this).find('.title').css('border', '1px solid #c00');
				} else {
					$(this).find('.title').removeAttr('style');
				}
				
				field['id'] = Qid;
				field['type'] = 'dropdown';
				field['title'] = title;
				field['placeholder'] = '';
				field['is_required'] = is_req;
				field['is_filter'] = is_filter;

				var alloptions = [];
				field['options'] = {};
				//get options  of dropdown
				$(this).find('.multi-field').each(function() {
					var option = {};
					//get name of each option
					option['option_name'] = $(this).find('.dropdown_name').val();
					if (option['option_name'] == '') {
						validate = false;
						$(this).find('.dropdown_name').css('border', '1px solid #c00');
					} else {
						$(this).find('.dropdown_name').removeAttr('style');
					}
					//get name of value option
					option['option_value'] = $(this).find('.dropdown_value').val();
					if (option['option_value'] == '') {
						validate = false;
						$(this).find('.dropdown_value').css('border', '1px solid #c00');
					} else {
						$(this).find('.dropdown_value').removeAttr('style');
					}
					alloptions.push(option);

				});

				field['options'] = alloptions;
				//fields.push(field);

				//get all jumps
				var allconditions = [];
				field['conditions'] = {};
				//get options  of checkbox
				$(this).find('.logic_jump').each(function() {
					var cond = {};
					cond['operator'] = $(this).find('.operator').val();
					cond['condvalue'] = $(this).find('.condvalue').val();
					cond['finalchoice'] = $(this).find('.finalchoice').val();
					cond['queslist'] = $(this).find('.queslist').val();

					if (cond['queslist'] == '0' || cond['queslist'] == 0) {
						validate = false;
						$(this).find('.queslist').css('border', '1px solid #c00');
					} else {
						$(this).find('.queslist').removeAttr('style');
					}

					if (cond['operator'] == '0' || cond['operator'] == 0) {
						validate = false;
						$(this).find('.operator').css('border', '1px solid #c00');
					} else {
						$(this).find('.operator').removeAttr('style');
					}

					if (cond['condvalue'] == '') {
						validate = false;
						$(this).find('.condvalue').css('border', '1px solid #c00');
					} else {
						$(this).find('.condvalue').removeAttr('style');
					}

					if (cond['finalchoice']  == '0' || cond['finalchoice'] == 0) {
						validate = false;
						$(this).find('.finalchoice').css('border', '1px solid #c00');
					} else {
						$(this).find('.finalchoice').removeAttr('style');
					}

					if ($(this).find('.finalchoice').val() == 2) //if finish option is choosen
					{
						cond['queslist'] = "0";
					} else {
						cond['queslist'] = $(this).find('.queslist').val();
					}
					//push all conditions
					allconditions.push(cond);

				});

				field['conditions'] = allconditions;
				fields.push(field);
			}


		});


		if (!validate) {
			alert('Please fill required fields');
		} else if (!numvalidate) {
			alert('Please provide numeric values');
			return false;
		} 
		else 
		{
			var totalfilter=0;
			$('input.is_filter:checkbox:checked').each(function () {
			    totalfilter++;
			});

			if(totalfilter==0)
			{
				alert('Please make one question as filter');
				return false;
			}
			/*if(totalfilter>1)
			{
				alert('Only one question can be used as filter');
				return false;
			}*/
			console.log(fields);
			var site_url = $('#site_url').text();
			
			$.ajaxSetup({
	          headers: {
	              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });
			
			$.ajax({
	          url: site_url+"/admin/save_dynamic_form",        
	          type:'POST',
	          data: {
					formdata: fields,catId:catId
				},
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



			return false;
		}


	});


$( function() {
	$('.dynamic_form').sortable({
		connectWith: ".sortable"
	}).disableSelection();
} );