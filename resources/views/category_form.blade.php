@extends('layouts.admin_dashboard')
@section('content')       
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Create New form</strong>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class="card my-5">
                                        <h5 class="mb-4">Select Type of Field</h5>
                                        <div class="button_group">
                                            <button class="btn btn-block btn-light mb-3" onclick="addNewField(1)" type="button">Text Box</button>

                                            <button class="btn btn-block btn-light mb-3" onclick="addNewField(2)" type="button">Text Area</button>

                                            <button class="btn btn-block btn-light mb-3" onclick="addNewField(6)" type="button">Number</button>


                                            <button class="btn btn-block btn-light mb-3" onclick="addNewField(3)" type="button">Datepicker</button>


                                            <button class="btn btn-block btn-light mb-3" onclick="addNewField(4)" type="button">Timepicker</button>

                                             <button class="btn btn-block btn-light mb-3" onclick="addNewField(5)" type="button">Radio Select</button>
                                            
                                            
                                            <button class="btn btn-block btn-light  mb-3" onclick="addNewField(7)" type="button">Checkbox</button>
                                            
                                            <button class="btn btn-block btn-light  mb-3" onclick="addNewField(8)" type="button">Dropdown select</button>

                                            @if(isset($data) && !empty($data) && count($data)>0)
                                            <button class="btn btn-block btn-primary" id="add_form" type="button">Update Form</button>
                                            @else
                                            <button class="btn btn-block btn-primary" id="add_form" type="button">Add Form</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <div class="card my-5">
                                        
                                        <form class="dynamic_form sortable ui-sortable" data-cat={{$id}}>
                                            @if(isset($data) && !empty($data))
                                                @foreach($data as $quesData)
                                                    @if($quesData['type']=='checkbox')
                                                    <div class="for_checkbox field_group text-row ui-sortable-handle" id="{{$quesData['qid']}}" data-type="checkbox">
                                                        <h5 class="mb-3">Checkbox</h5>
                                                        <div class="form-group">
                                                            <label>What will be title of Checkbox Field?</label>
                                                            <input class="form-control title checkbox_name" name="checkbox_name" type="textbox" @if(isset($quesData['title']) && !empty($quesData['title'])) value="{{$quesData['title']}}" @endif>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>What will be options of checkbox?</label>
                                                            <div class="multi-field-wrapper">
                                                            @if(isset($quesData['options']) && !empty($quesData['options'])) 
                                                            @php $options = json_decode($quesData['options']);@endphp
                                                                @foreach($options as $k=>$option) 
                                                                <div class="multi-fields">
                                                                    <div class="multi-field">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <input name="option_name[]" class="form-control option_name" placeholder="Label" type="text"  value="{{$option->option_name}}">
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <input name="option_value[]" class="form-control option_value" placeholder="Value" type="text"  value="{{$option->option_value}}">
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    @if($k==0)
                                                                                    <button type="button" class="btn btn-success add-field" onclick="addMoreOptions(this);" data-label="option_name" data-value="option_value">Add Option</button>
                                                                                    @else
                                                                                     <button type="button" class="btn btn-success add-field" data-label="option_name" data-value="option_value" onclick="removeOptions(this);">Remove Option</button>
                                                                                     @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 @endforeach  
                                                            @endif   
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                            <div class="form-check">
                                                                <input class="form-check-input is_required" value="" id="defaultCheckchkq_{{$quesData['qid']}}" type="checkbox" @if(isset($quesData['required']) && !empty($quesData['required']) && $quesData['required']==1) checked @endif>
                                                                <label class="form-check-label " for="defaultCheckchkq_{{$quesData['qid']}}">Is This Field Required</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input is_filter" value="" id="defaultCheckradiofilterq_{{$quesData['qid']}}" type="checkbox" @if(isset($quesData['filter']) && !empty($quesData['filter']) && $quesData['filter']==1) checked @endif>
                                                                <label class="form-check-label" for="defaultCheckradiofilterq_{{$quesData['qid']}}">Is Filter</label>
                                                            </div>
                                                            
                                                        </div>
                                                        <button type="button" class="btn btn-danger remove-div" onclick="removeOptionsdiv(this);">Remove Div</button>
                                                    </div>
                                                    @elseif($quesData['type']=='radio')
                                                    <div class="for_radio field_group text-row ui-sortable-handle" id="{{$quesData['qid']}}" data-type="radio"><h5 class="mb-3">Radio Select</h5>
                                                        <div class="form-group">
                                                            <label>What will be title of Radiobox Field?</label><input class="form-control title radiobox_name" name="radiobox_name" type="textbox" value="{{$quesData['title']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>What will be options of radiobox?</label>
                                                            <div class="multi-field-wrapper">
                                                                @if(isset($quesData['options']) && !empty($quesData['options'])) 
                                                            @php $options = json_decode($quesData['options']);@endphp
                                                                @foreach($options as $k=>$option)
                                                                <div class="multi-fields">
                                                                    <div class="multi-field">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <input name="radio_name[]" class="form-control radio_name" placeholder="Label" type="text" value="{{$option->option_name}}">
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <input name="radio_value[]" class="form-control radio_value" placeholder="Value" type="text" value="{{$option->option_value}}">
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    @if($k==0)
                                                                                    <button type="button" class="btn btn-success add-field" onclick="addMoreOptions(this);" data-label="radio_name" data-value="radio_value">Add Option</button>
                                                                                    @else
                                                                                    <button type="button" class="btn btn-success add-field" data-label="radio_name" data-value="radio_value" onclick="removeOptions(this);">Remove Option</button>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                            <div class="form-check">
                                                                <input class="form-check-input is_required" value="" id="defaultCheckradio{{$quesData['qid']}}" type="checkbox" @if(isset($quesData['required']) && !empty($quesData['required']) && $quesData['required']==1) checked @endif>
                                                                <label class="form-check-label" for="defaultCheckradio{{$quesData['qid']}}">Is This Field Required</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input is_filter" value="" id="defaultCheckradiofilterq_{{$quesData['qid']}}" type="checkbox" @if(isset($quesData['filter']) && !empty($quesData['filter']) && $quesData['filter']==1) checked @endif>
                                                                <label class="form-check-label" for="defaultCheckradiofilterq_{{$quesData['qid']}}">Is Filter</label>
                                                            </div>
                                                          
                                                            <div class="form-check logic_jump_container">
                                                                <input class="form-check-input is_cond" onclick="addLogicJumpContainer(this);" name="condition" value="" id="defaultCheckradioreq{{$quesData['qid']}}" type="checkbox" @if(isset($quesData['jumps']) && !empty($quesData['jumps'][0]) && count($quesData['jumps'][0])>0) checked @endif>
                                                                <label class="form-check-label" for="defaultCheckradioreq{{$quesData['qid']}}">Add Logic Jump</label>
                                                                @if(isset($quesData['jumps']) && !empty($quesData['jumps'][0]) && count($quesData['jumps'][0])>0)
                                                                @foreach($quesData['jumps'][0] as $l=>$logicjump)
                                                                <div class="form-group logic_jump_div">
                                                                    <div class="logic_jump">
                                                                        <label>If Value</label>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <select class="form-control operator">

                                                                                    <option value="0" @if($logicjump['operator']==0) selected @endif >Make a selection</option>
                                                                                    <option value="1" @if($logicjump['operator']==1) selected @endif >=</option><option value="2" @if($logicjump['operator']==2) selected @endif >!=</option>
                                                                                    <option value="3" @if($logicjump['operator']==3) selected @endif >&gt;</option>
                                                                                    <option value="4" @if($logicjump['operator']==4) selected @endif >&lt;</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-2">
                                                                                <input class="form-control condvalue"  type="text" value="{{$logicjump['value']}}">
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <select class="form-control finalchoice" onchange="showqueslist(this);">
                                                                                    <option value="0">Make a selection</option>
                                                                                    <option value="1" @if($logicjump['jump_to']!='' && $logicjump['jump_to']!="0") selected @endif>GO TO</option>
                                                                                    <option value="2">Finish</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="action_button">
                                                                                @if($l==0)
                                                                                <button type="button" class="add-field btn btn-info btn-success" onclick="addMoreCondition(this);">+</button>
                                                                                @else
                                                                                <button type="button" class="add-field btn btn-info btn-success" onclick="removeCondition(this);">-</button>
                                                                                @endif
                                                                            </div>
                                                                                @if($logicjump['jump_to']!=''  && $logicjump['jump_to']!='0')
                                                                                <div class="col-3 queslistcontainer">
                                                                                    <select class="form-control queslist">
                                                                                        <option value="0">Make a selection</option>
                                                                                        @foreach($data as $quesData)
                                                                                        <option value="{{$quesData['qid']}}" 

                                                                                        @if($logicjump['jump_to']==$quesData['qid']) selected @endif >{{$quesData['title']}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-danger remove-div" onclick="removeOptionsdiv(this);">Remove Div</button>
                                                    </div>
                                                    @elseif($quesData['type']=='textbox')
                                                    <div class="for_textbox field_group text-row ui-sortable-handle" id="{{$quesData['qid']}}" data-type="textbox">
                                                        <h5 class="mb-3">Textbox</h5>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control textbox_name title" name="textbox_name" type="textbox" value="{{$quesData['title']}}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Description (Optional)</label>
                                                        <input class="form-control textbox_desc description" name="textbox_desc" type="textbox" @if(isset($quesData['description']) && !empty($quesData['description'])) value="{{$quesData['description']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Placeholder (Optional)</label>
                                                        <input class="form-control textbox_plc placeholder" name="textbox_plc" type="textbox" @if(isset($quesData['placeholder']) && !empty($quesData['placeholder'])) value="{{$quesData['placeholder']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Minimum Length (Optional)</label>
                                                        <input class="form-control textbox_min minlen" name="textbox_min" type="textbox" @if(isset($quesData['min']) && !empty($quesData['min'])) value="{{$quesData['min']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Max Length (Optional)</label>
                                                        <input class="form-control textbox_max maxlen" name="textbox_max" type="textbox" @if(isset($quesData['max']) && !empty($quesData['max'])) value="{{$quesData['max']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input is_required" name="isrequired" value="" id="defaultCheck{{$quesData['qid']}}" type="checkbox"   @if(isset($quesData['required']) && !empty($quesData['required'])) checked @endif>
                                                            <label class="form-check-label " for="defaultCheck{{$quesData['qid']}}">Is This Field Required
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button>
                                                </div>
                                                @elseif($quesData['type']=='datepicker')
                                                    <div class="for_datepicker field_group text-row ui-sortable-handle" id="{{$quesData['qid']}}" data-type="datepicker">
                                                        <h5 class="mb-3">Datepicker</h5>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control textbox_name title" name="textbox_name" type="textbox" value="{{$quesData['title']}}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Description (Optional)</label>
                                                        <input class="form-control textbox_desc description" name="textbox_desc" type="textbox" @if(isset($quesData['description']) && !empty($quesData['description'])) value="{{$quesData['description']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input is_required" name="isrequired" value="" id="defaultCheck{{$quesData['qid']}}" type="checkbox"   @if(isset($quesData['required']) && !empty($quesData['required'])) checked @endif>
                                                            <label class="form-check-label " for="defaultCheck{{$quesData['qid']}}">Is This Field Required
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button>
                                                </div>
                                                @elseif($quesData['type']=='timepicker')
                                                    <div class="for_timepicker field_group text-row ui-sortable-handle" id="{{$quesData['qid']}}" data-type="timepicker">
                                                        <h5 class="mb-3">Timepicker</h5>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control textbox_name title" name="textbox_name" type="textbox" value="{{$quesData['title']}}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Description (Optional)</label>
                                                        <input class="form-control textbox_desc description" name="textbox_desc" type="textbox" @if(isset($quesData['description']) && !empty($quesData['description'])) value="{{$quesData['description']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input is_required" name="isrequired" value="" id="defaultCheck{{$quesData['qid']}}" type="checkbox"   @if(isset($quesData['required']) && !empty($quesData['required'])) checked @endif>
                                                            <label class="form-check-label " for="defaultCheck{{$quesData['qid']}}">Is This Field Required
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button>
                                                </div>
                                                @elseif($quesData['type']=='textarea')
                                                    <div class="for_textarea field_group text-row ui-sortable-handle" id="{{$quesData['qid']}}" data-type="textbox">
                                                        <h5 class="mb-3">Text Area</h5>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control textbox_name title" name="textbox_name" type="textbox" value="{{$quesData['title']}}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Description (Optional)</label>
                                                        <input class="form-control textbox_desc description" name="textbox_desc" type="textbox" @if(isset($quesData['description']) && !empty($quesData['description'])) value="{{$quesData['description']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Placeholder (Optional)</label>
                                                        <input class="form-control textbox_plc placeholder" name="textbox_plc" type="textbox" @if(isset($quesData['placeholder']) && !empty($quesData['placeholder'])) value="{{$quesData['placeholder']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Minimum Length (Optional)</label>
                                                        <input class="form-control textbox_min minlen" name="textbox_min" type="textbox" @if(isset($quesData['min']) && !empty($quesData['min'])) value="{{$quesData['min']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Max Length (Optional)</label>
                                                        <input class="form-control textbox_max maxlen" name="textbox_max" type="textbox" @if(isset($quesData['max']) && !empty($quesData['max'])) value="{{$quesData['max']}}" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input is_required" name="isrequired" value="" id="defaultCheck{{$quesData['qid']}}" type="checkbox"   @if(isset($quesData['required']) && !empty($quesData['required'])) checked @endif>
                                                            <label class="form-check-label " for="defaultCheck{{$quesData['qid']}}">Is This Field Required
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-danger remove-field" onclick="removeOptionsdiv(this);">Remove Div</button>
                                                </div>
                                                    @elseif($quesData['type']=='dropdown')
                                                    <div class="for_dropdown field_group text-row ui-sortable-handle" id="{{$quesData['qid']}}" data-type="dropdown">
                                                        <h5 class="mb-3">Dropdown</h5>
                                                        <div class="form-group">
                                                            <label>What will be title of dropdown?</label>
                                                            <input class="form-control title dropdown_name" name="dropdown_name" type="textbox" value="{{$quesData['title']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>What will be options of dropdown?</label>
                                                            <div class="multi-field-wrapper">
                                                                 @if(isset($quesData['options']) && !empty($quesData['options'])) 
                                                            @php $options = json_decode($quesData['options']);@endphp
                                                                @foreach($options as $k=>$option) 
                                                                <div class="multi-fields">
                                                                    <div class="multi-field">
                                                                        <div class="form-group">
                                                                            <div class="row"><div class="col-4"><input name="dropdown_name[]" class="form-control dropdown_name" placeholder="Label" type="text" value="{{$option->option_name}}">
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <input name="dropdown_value[]" class="form-control dropdown_value" placeholder="Value" type="text" value="{{$option->option_value}}">
                                                                            </div>
                                                                            <div class="col-4">
                                                                                @if($k==0)
                                                                                <button type="button" class="btn btn-success add-field" onclick="addMoreOptions(this);" data-label="dropdown_name" data-value="dropdown_value">Add Option</button>
                                                                                @else
                                                                                <button type="button" class="btn btn-success add-field" data-label="dropdown_name" data-value="dropdown_value" onclick="removeOptions(this);">Remove Option</button>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input is_required" value="" id="defaultCheckdrp{{$quesData['qid']}}" type="checkbox" @if(isset($quesData['required']) && !empty($quesData['required']) && $quesData['required']==1) checked @endif>
                                                            <label class="form-check-label " for="defaultCheckdrp{{$quesData['qid']}}">Is This Field Required</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input is_filter" value="" id="defaultCheckradiofilterq_{{$quesData['qid']}}" type="checkbox" @if(isset($quesData['filter']) && !empty($quesData['filter']) && $quesData['filter']==1) checked @endif>
                                                            <label class="form-check-label" for="defaultCheckradiofilterq_{{$quesData['qid']}}">Is Filter</label></div>
                                                        </div>
                                                        <button type="button" class="btn btn-danger remove-div" onclick="removeOptionsdiv(this);">Remove Div</button>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>


 @endsection  
      