@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Dashboard </a>/<span class="q_breadcrumb">Profile and settings</span></div>
</section>
<section>

<div class="quote_req_main">
<h1>Profile and settings</h1>
<form method="POST" class="dropzone profilesetting_form" data-page="profilesetting" id="dropzone_form" action="{{ url('/business_user/profile_setting') }}" enctype="multipart/form-data">
@csrf
<div class="profile_section_main">
  <div class="part1">
    <h1 class="part_heading">Part 1</h1>
    <div class="registrationform">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="business_name">{{ __('Business name') }}</label>
            <input type="text" class="form-control{{ $errors->has('business_name') ? ' error_border' : '' }}" id="business_name" value="@if(!empty($user_details)){{$user_details['business_name']}}@else{{old('business_name')}}@endif" name="business_name" onkeyup="remove_errmsg(this)" autofocus>
            @if ($errors->has('business_name'))
              <span class="fill_fields" role="alert">
                  {{ $errors->first('business_name') }}
              </span>
            @endif
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="first_name">{{ __('First name') }}</label>
            <input type="text" class="form-control{{ $errors->has('first_name') ? ' error_border' : '' }}" id="first_name" name="first_name"  value="@if(!empty($user_details)){{$user_details['first_name']}}@else{{old('first_name')}}@endif" onkeyup="remove_errmsg(this)" autofocus>
            @if ($errors->has('first_name'))
              <span class="fill_fields" role="alert">
                  {{ $errors->first('first_name') }}
              </span>
          @endif
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="last_name">{{ __('Last name') }}</label>
            <input type="text" class="form-control{{ $errors->has('last_name') ? ' error_border' : '' }}" id="last_name" name="last_name" value="@if(!empty($user_details)){{$user_details['last_name']}}@else{{old('last_name')}}@endif" onkeyup="remove_errmsg(this)" autofocus>
            @if ($errors->has('last_name'))
                <span class="fill_fields" role="alert">
                    {{ $errors->first('last_name') }}
                </span>
            @endif
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="mobile_phone">{{ __('Mobile phone') }}</label>
            <input type="text" class="form-control{{ $errors->has('mobile_phone') ? ' error_border' : '' }}" id="mobile_phone" name="mobile_phone" value="@if(!empty($user_details)){{$user_details['phone_number']}}@else{{old('mobile_phone')}}@endif" onkeyup="remove_errmsg(this)" autofocus>
            @if ($errors->has('mobile_phone'))
              <span class="fill_fields" role="alert">
                  {{ $errors->first('mobile_phone') }}
              </span>
          @endif

          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="@if(!empty($user_details)){{$user_details['email']}}@else{{old('email')}}@endif" onkeyup="remove_errmsg(this)" autofocus>
            @if ($errors->has('email'))
                <span class="fill_fields" role="alert">
                    {{ $errors->first('email') }}
                </span>
            @endif
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="full_address">{{ __('Full address') }}</label>
            <input type="text" class="form-control{{ $errors->has('full_address') ? ' error_border' : '' }}" id="full_address" name="full_address" value="@if(!empty($user_details)){{$user_details['full_address']}}@else{{old('full_address')}}@endif" onkeyup="remove_errmsg(this)" autofocus>
            @if ($errors->has('full_address'))
                <span class="fill_fields" role="alert">
                    {{ $errors->first('full_address') }}
                </span>
            @endif
          </div>
        </div>
    </div>
  </div>


  <div class="part2">
    <h1 class="part_heading">Part 2</h1>
    <div class="registrationform">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="url">{{ __('URL') }}</label>
            <input type="text" class="form-control{{ $errors->has('url') ? ' error_border' : '' }}" id="url" name="url" value="@if(!empty($user_details)) @if(!empty($user_details['bu_details'])){{$user_details['bu_details'][0]['website_url']}}@else{{old('url')}}@endif @endif" autofocus>
             @if ($errors->has('url'))
                <span class="fill_fields" role="alert">
                    {{ $errors->first('url') }}
                </span>
            @endif

          </div>
          <div class="form-group col-md-6 col-12">
            <label for="fb_url">{{ __('Facebook group URL') }}</label>
            <input type="text" class="form-control" id="fb_url" name="fb_url"" value="@if(!empty($user_details)) @if(!empty($user_details['bu_details'])){{$user_details['bu_details'][0]['facebook_url']}}@else{{old('fb_url')}}@endif @endif">

            @if ($errors->has('fb_url'))
                <span class="fill_fields" role="alert">
                    {{ $errors->first('fb_url') }}
                </span>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <div class="connect_facebook"><a href="javascript:;">Connect facebook profile</a></div>
          </div>
        </div>

        <div class="upload_profile_pic">


          <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" onchange="readURLprofile(this);" >
          @if(!empty($user_details))
          @if(!empty($user_details['image_name']))
          <img id="blah" src="{{url('/images/business_profile/'.$user_details['business_userid'].'/'.$user_details['image_name'])}}" alt="your image" style="height:50px;width:50px;"/>
          @else
          <img id="blah" src="{{ asset('img/user_placeholder.png') }}" alt="your image" />
          @endif
          @endif
          
        </div>
    </div>
  </div>

  <div class="part3">
    <h1 class="part_heading" id="part_heading_three">Part 3</h1>
    <div class="registrationform">
      <div class="category_secton">
        <div class="category_list_heading">
          <p>Categories</p>
          <div class="category_list category_list_dynamic">
            <div class="search_category">
              <input type="text" placeholder="Search..." class="category_search">
            </div>
            <ul>
              <li><a href="javascript:;">Category</a>
              <ul>
              @foreach($categories as $key=>$value)
                          <li><a href="javascript:;" id="{{$value['category_id']}}" onclick="categories_select(this)" data-cat="parent" class="categories">{{$value['category_name']}}</a>
                          @if(!empty($value['sub_category']))  
                            <ul class="subcategories">
                              @foreach($value['sub_category'] as $key1=>$value1)
                              <li><a href="javascript:;" id="{{$value1['sub_category_id']}}" data-cat="sub" onclick="categories_select(this)">{{$value1['sub_category_name']}}</a><span class="checked_category"><img src="{{ asset('img/category_check.png') }}"/></span></li>
                              @endforeach
                            </ul>
                          @else
                          <span class="checked_category_active"><img src="{{ asset('img/category_check.png') }}"/></span>
                          @endif
                          </li>
                          @endforeach
            </ul>
          </div>
        </div>
        <div class="arrow_cat"><img src="{{ asset('img/arrow.png') }}" class="img-fluid"></div>
        <div class="added_category_list_heading">
          <p class="forerror addcategory">Added categories (up to 10)</p>
          <div class="added_category_list error">
            <div class="added_category category_list">
                          
                            @if(!empty($business_categories))
                            <ul class="added_category_ul">
                                @foreach($business_categories as $parent_category)
                                      <li>
                                        <a href="javascript:;" id="{{$parent_category['cat_id']}}" data-cat="parent" class="categories">{{$parent_category['name']}}</a>
                                        <span class="cross_category">
                                          <img src="{{ asset('img/category_cancel.png')}}" class="img-fluid">
                                        </span>
                                        <ul class="subcategories">
                                          @foreach($parent_category['values'] as $sub_category)
                                          <li>
                                            <a href="javascript:;" id="{{$sub_category->sub_cat_id}}" data-cat="sub">{{$sub_category->sub_category_name}}</a>
                                            <span class="cross_category">
                                            <img src="{{ asset('img/category_cancel.png')}}" class="img-fluid">
                                            </span>
                                          </li>
                                          @endforeach
                                        </ul>
                                      </li>
                                    
                                @endforeach
                                </ul>
                          @else
                          <p id="no_categories">No Categories Added</p>
                          <ul class="added_category_ul">
                                                   
                          </ul>
                          @endif
                        </div>
          </div>
          <span class="fill_fields disp_none" id="cat_fill">Fill this field</span>
        </div>
      </div>
    </div>
  </div>

  <div class="part4">
  <h1 class="part_heading">Part 4</h1>
    <div class="registrationform">
    <p class="part4p">Where do you want to get quote requests from ?</p>
      <div class="geographic_setting">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <div class="formcheck">
              
              <label>
                <?php  $checked = ''; ?>
                    @if(!empty($user_details))
                      @if($user_details['bu_details'][0]['distance_all'] == 1)
                      <?php  $checked = 'checked'; ?>                                  
                      @endif
                    @endif
              <input type="radio" class="radio-inline" name="country" value="all" {{$checked}}>
              <span class="outside"><span class="inside"></span></span><p>All country</p>
              </label>
            </div>
          </div>
          <div class="form-group col-md-6 col-12">
            <div class="formcheck">
              <label>
                <?php  $checked1 = ''; ?>
                    @if(!empty($user_details))
                      @if($user_details['bu_details'][0]['distance_all'] == 0)
                        <?php  $checked1 = 'checked'; ?>
                      @endif
                    @endif
              <input type="radio" class="radio-inline" name="country" value="distance" {{$checked1}}>
              <span class="outside"><span class="inside"></span></span><p>Distance from your address</p>
              </label>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="form-group col-md-6 col-12">
        </div>
        <div class="form-group custom_errow col-md-6 col-12">
          <label for="businessradius">Radius (km)</label>
          @if(!empty($user_details))
          @if(isset($user_details['bu_details'][0]['distance_kms']))
            <?php  $distance_kms = $user_details['bu_details'][0]['distance_kms']; ?>
            @else
            <?php  $distance_kms = "1";?>
            @endif
            @endif
            <select class="form-control " name="radius" id="exampleSelect1">
              <?php for($i=10;$i<=100;$i++){
                if($i % 10 == 0){
                if($i == $distance_kms){?>
                  <option value="{{$i}}" selected="selected">{{$i}}</option>
              <?php }else{ ?>
                  <option value="{{$i}}">{{$i}}</option>
              <?php } } } ?>
            </select>
          <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="part5">
    <h1 class="part_heading">Part 5</h1>
    <div class="registrationform">
      <div class="description_optional row">
      <div class="form-group col-md-12 col-12">
      <label for="inputEmail4">Description (optional)</label>
      <textarea name="descripton">@if(!empty($user_details)){{$user_details['bu_details'][0]['business_profile']}}@endif</textarea>
      </div>
      </div>
      <div class="add_photo_video">
      <p>Add photos / Videos (optional)</p>
        <div class="upload_file_section">
          <div class="drag_file" id="drag_div">
            <div class="fallback">
              <input name="file" class="disp_none" type="file" multiple style="width:1px;border:0px" /></div>
            <a href="javascript:;" class="drag_drop_text">Drag and drop files here to upload</a>
          </div>
          <span>OR</span>
          <div class="file_to_upload">
            <div class="upload-btn-wrapper">
              <button class="btn">Select files to upload</button>
              <input type="file" name="myfile[]" multiple class="select_verify_img" accept="image/x-png,image/gif,image/jpeg"/>

                <span id="msg"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="photo_video_list">
    <ul>
      @if(!empty($user_details))
      <?php
      $uploads = json_decode($user_details['bu_details'][0]['pic_vid'],true);
      ?>
      @if(!empty($uploads))
      @foreach($uploads['pic'] as $img)

      <?php $img_name = explode( '.', $img );?>
        <li class="imguploaded" id="img_{{$img_name[0]}}">
        <div class="image"><img src="{{url('/images/profile/'.$user_details['business_userid'].'/'.$img)}}"></div>
        <div class="input_des"><textarea placeholder="Input description"></textarea></div>
        <a href="javascript:;" data-img="{{$img}}" class="profile_imgcross"><img src="{{ asset('img/line_cross.png') }}"></a>
        </li>
        @endforeach
        @endif
      @endif
      <!-- <li>
      <div class="image"><img src="{{ asset('img/img1.png') }}"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"></a>
      </li>
      <li class="diff_bg_color">
      <div class="image"><img src="{{ asset('img/img1.png') }}"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"></a>
      </li>
      <li>
      <div class="image"><img src="{{ asset('img/img1.png') }}"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"></a>
      </li>
      <li class="diff_bg_color">
      <div class="image"><img src="{{ asset('img/img1.png') }}"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"></a>
      </li>
      <li>
      <div class="image"><img src="{{ asset('img/img1.png') }}"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"></a>
      </li>
      <li class="diff_bg_color">
      <div class="image"><img src="{{ asset('img/img1.png') }}"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"></a>
      </li> -->
    </ul>
  </div>


  <div class="ques_ans pt-4">
    <div class="row">
      <div class="form-group col-md-6 col-12">
        <div class="formcheck forcheckbox">
          <label>
            <?php
            if(!empty($user_details)){
             if(isset($user_details['bu_details'][0]['send_question']) && $user_details['bu_details'][0]['send_question'] == 1){ 
                  $checked = 'checked';
              }else{
                  $checked = '';
              }
            }
              ?>
          <input type="checkbox" class="radio-inline" name="send_question" value="" {{$checked}} >
          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Send me questions to answer<span class="info"><img src="{{ asset('img/info.png') }}" title="Check this checkbox if you want to send question."></span>      </p>
          </label>
        </div>
      </div>
      <div class="form-group col-md-6 col-12">
        <div class="formcheck forcheckbox">
          <label>
            <?php
            if(!empty($user_details)){
             if(isset($user_details['bu_details'][0]['send_schedule']) && $user_details['bu_details'][0]['send_schedule'] == 1){ 
                  $checked = 'checked';
              }else{
                  $checked = '';
              }
            }
          ?>
          <input type="checkbox" class="radio-inline" name="send_schedule" value="" {{$checked}}>
          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p> Send me schedule requests   <span class="info"><img src="{{ asset('img/info.png') }}" title="Check this checkbox if you want to send schedule requests."></span> </p>
          </label>
        </div>
      </div>
    </div>
  </div>
<span class="fill_fields text-center" role="alert"></span>
  <div class="part6">
    <h1 class="part_heading">Part 6</h1>
    <div class="registrationform">
      <p class="part6p">Select relevant hashtags about you business</p>
      <div class="relevent_hastag pt-3 pb-4">
        <div class="row">

          @if(!empty($hashtags))
          @foreach($hashtags as $key=>$hashtag)
          @if(!empty($user_details))
          @if(isset($user_details['hash_tags']))
          
            <?php if(array_search($hashtag['id'], array_column($user_details['hash_tags'], 'tag_id')) > -1){
                $checked = 'checked'; 
            }else{
              $checked = '';
            } ?>
            @else
            <?php $checked = '';?>
            @endif
            @endif
            <div class="col-md-3 col-6">
              <div class="formcheck forcheckbox">
                    <label>
                      <input data-id="{{$hashtag['id']}}" type="checkbox" class="radio-inline" name="hashtag[]" value="{{$hashtag['id']}}" {{$checked}}>
                      <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#{{$hashtag['hashtag_name']}} </p>
                    </label>
              </div>
            </div>
          @endforeach
          @endif 

<!-- 
          
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#24hours </p>
              </label>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#acceptCC </p>
              </label>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#acceptcash </p>
              </label>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#7daysaweek</p>
              </label>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>


  <div class="part7">
    <h1 class="part_heading">Part 7</h1>
    <div class="registrationform" id="register_schedule">
      <p class="part6p">Schedule</p>
      <span class="bu_error bu_error_hours" style="margin: 0px;display: block;"></span>
      <div class="available_time">
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="formcheck forcheckbox">
              @if(!empty($user_details))
              @if(isset($user_details['bu_details'][0]['schedule']))
              <?php $userSchedule = json_decode($user_details['bu_details'][0]['schedule']);?>
              @if(isset($userSchedule->available))
              <?php $checked = 'checked';?>
              @else
              <?php $checked = '';?>
              @endif
              @endif
              @endif
              <label>
                <input type="checkbox" id="available" class="radio-inline" name="available" value="" {{$checked}}>
                <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>available 24 hours 7 days a week</p>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="total_weekdays">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Sunday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->sunday_from)){ 
                      $value = $userSchedule->sunday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="sunday_from" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>

              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time" >
                  <?php if(isset($userSchedule->sunday_to)){ 
                      $value = $userSchedule->sunday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="sunday_to" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Monday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->monday_from)){ 
                      $value = $userSchedule->monday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="monday_from" value="{{$value}}" value="{{$value}}" />
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->monday_to)){ 
                      $value = $userSchedule->monday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="monday_to" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Tuesday</label>
                  <div class="input-group date" >
                  <?php if(isset($userSchedule->tuesday_from)){ 
                        $value = $userSchedule->tuesday_from;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="tuesday_from" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group">
                  <?php if(isset($userSchedule->tuesday_to)){ 
                        $value = $userSchedule->tuesday_to;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker-input datetimepicker" name="tuesday_to" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Wednesday</label>
                   <div class="input-group date">
                    <?php if(isset($userSchedule->wednesday_from)){ 
                          $value = $userSchedule->wednesday_from;}else{$value = '';}
                      ?>
                    <input type="text" class="form-control datetimepicker" name="wednesday_from" value="{{$value}}"/>
                    <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                    </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->wednesday_to)){ 
                        $value = $userSchedule->wednesday_to;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="wednesday_to" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Thursday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->thursday_from)){ 
                      $value = $userSchedule->thursday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="thursday_from" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->thursday_to)){ 
                      $value = $userSchedule->thursday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="thursday_to" value="{{$value}}"/>
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Friday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->friday_from)){ 
                      $value = $userSchedule->friday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="friday_from"  value="{{$value}}" />
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->friday_to)){ 
                      $value = $userSchedule->friday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="friday_to" value="{{$value}}" />
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Saturday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->saturday_from)){ 
                        $value = $userSchedule->saturday_from;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="saturday_from" value="{{$value}}" />
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->saturday_to)){ 
                        $value = $userSchedule->saturday_to;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="saturday_to" value="{{$value}}" />
                  <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="agree">
    <div class="terms_agree">
      <div class="formcheck forcheckbox">
        <label>
          <input type="checkbox" class="radio-inline" id="agree" name="agree" value="">
          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>I agree to <a href="#" class="text_term">terms</a> </p>
        </label>
        <span class="bu_error bu_error_terms" style="margin: 0px;display: block;"></span>
      </div>
    </div>
  </div>
  <div class="save_agree"><a href="javascript:;"><input type="submit" id="profile_submit" name="profile_submit" value="Save"></a></div>
</form>
</section>

@endsection