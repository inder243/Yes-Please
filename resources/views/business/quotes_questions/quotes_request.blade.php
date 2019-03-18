@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="{{ url('/business_user/business_dashboard') }}">Dashboard</a>/<a href="{{ url('/business_user/quotes_questions') }}"> Quotes and questions </a>/<span class="q_breadcrumb"> Home improvement</span></div>
      </section>
      <section>
         <div class="quote_req_main">
            <h1>Quote request</h1>
            
            @if(isset($quote_data[0]['status']))
              @if($quote_data[0]['status'] == '1')
              <div class="improvement_section_new">
              @elseif($quote_data[0]['status'] == '2')
              <div class="improvement_section_new q_quoted1">
              @endif
            @endif

               <div class="user_profile_sec">
                @if(isset($quote_data))
                  <?php $image = $quote_data[0]['get_gen_user']['image_url'];
                        $general_id = $quote_data[0]['get_gen_user']['user_id'];
                  ?>
                  @if($image)
                  <div class="user_img"><img src="{{url('/images/users/'.$general_id.'/'.$image)}}"/></div>
                  @else
                  <div class="user_img"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                  @endif
                @endif
                  <div class="otheruser_detail">
                     @if(isset($quote_data))
                     <h1>{{$quote_data[0]['get_gen_user']['first_name']}} {{$quote_data[0]['get_gen_user']['last_name']}}</h1>
                     <p>{{$quote_data[0]['get_gen_user']['city']}}, {{$quote_data[0]['get_gen_user']['country']}}</p>
                     @else
                     <h1>Moshe</h1>
                     <p>test</p>
                     @endif
                     @if(isset($quote_data))
                    <?php
                      $created_date = $quote_data[0]['get_gen_user']['created_at'];

                      $splitTimeStamp = explode(" ",$created_date);
                      $date = date('M Y',strtotime($splitTimeStamp[0]));
                      $time = date('H:i',strtotime($splitTimeStamp[1]));
                     ?>
                     <span>Member since {{$date}}</span>
                     @endif
                  </div>
                  <div class="contact_user">
                     <a href="tel:{{$quote_data[0]['get_gen_user']['phone_number']}}" class="user_call"><img src="{{ asset('img/call.png') }}"/></a>
                     <a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
                  </div>
                  <div class="review_section">
                     <ul>
                        <?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'user_type'=>'business'])->avg('rating');

                    $get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'user_type'=>'business'])->where('review','!=','')->count('review');
                    
                    $total_rating = round($get_total_rating);
                    ?>
                    @if(isset($total_rating))
                  @if($total_rating == '5')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                  @elseif($total_rating == '4')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @elseif($total_rating == '3')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @elseif($total_rating == '2')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @elseif($total_rating == '1')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @else
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li> 
                  @endif 
                @else
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                @endif
                     </ul>
                     <p class="total_review">{{$get_total_reviews}} reviews</p>
                  </div>
               </div>
               @if(!empty($allquotes))
               <div class="user_quote_second_section">
                  <h1>Quote id : {{ $allquotes['quote_id']}}</h1>
                  <!-- <p>Quotes <span>32</span></p> -->
                  <div class="Q_tag">
                     @if(isset($quote_data[0]['status']))
                       @if($quote_data[0]['status'] == '1')
                       <div class="new_lable">NEW</div>
                       @elseif($quote_data[0]['status'] == '2')
                       <div class="new_lable q_quoted_table">READ</div>
                       @endif
                     @endif

                     <?php $datetime = $allquotes['created_at'];
                          $splitTimeStamp = explode(" ",$datetime);
                          // $date = $splitTimeStamp[0];
                          // $time = $splitTimeStamp[1];
                          $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                          $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>
                     <div class="created_date">{{$date}}</div>
                  </div>
                  <div class="quote_basic_detail">
                     <div class="Q_detail">
                        <span class="Q_detail_heading">Mobile Number:</span>
                        <span>{{ $allquotes['phone_number']}}</span>
                     </div>
                    
                  </div>
                  <div class="Q_description">
                     <p>{{ $allquotes['work_description']}}</p>
                  </div>
                  <div class="uploaded_content">
                     <div class="swiper-container swiper-wrapper_p">
                        <div class="swiper-wrapper ">
                           <?php 
                              $uploads = json_decode($allquotes['uploaded_files'],true);
                            ?>

                          @if(!empty($uploads))
                            @foreach($uploads['pic'] as $img)
                            <?php $img_name = explode( '.', $img );?>
                            <div class="swiper-slide">
                              <div class="uploaded_img" data-image="{{url('/images/general_quotes/'.$general_id.'/'.$img)}}" id="img_{{$img_name[0]}}" onclick="openBigImage(this);return false;">
                                 <img src="{{url('/images/general_quotes/'.$general_id.'/'.$img)}}"/>
                              </div>
                           </div>
                            @endforeach
                            
                          @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next for_next_arrow"></div>
                        <div class="swiper-button-prev for_back_arrow"></div>
                     </div>
                  </div>
               </div>
               @endif
            </div>
            <div class="reply_quote_sec">
            	<form class="dropzone" id="dropzone_form" data-page="quoterequest" method="POST" action="{{ route('business_user.quotes_request.submit')}}" enctype="multipart/form-data">
            	@csrf 

            	<input type="hidden" name="quote_id" value="{{$quote_id}}">	
               <div class="reply_quote_main">
                  <h1>Reply to quote</h1>
                  <p>Provide the user with maximum details about your offer</p>
                  <div class="row  searchf_input">
                     <div class="form-group col-md-6 col-12">
                        <label for="quote_price">Price quote</label>
                        <input type="number" onKeyPress="if(this.value.length==15) return false;"  name="quote_price" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control{{ $errors->has('quote_price') ? ' error_border' : '' }}" id="quote_price" value="{{old('quote_price')}}">

                        @if ($errors->has('quote_price'))
                            <span class="fill_fields" role="alert">
                                {{ $errors->first('quote_price') }}
                            </span>
                        @endif

                     </div>
                     <div class="form-group custom_errow col-md-6 col-12">
                        <label for="inputPassword4">Price type</label>
                        <select class="form-control" id="exampleSelect1" name="quote_price_type">
                           <option value="1">Fix price</option>
                           <option value="2">Hourly</option>
                        </select>
                        <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                     </div>
                  </div>
                  <div class="choose_template">
                     <div class="detail_main_content">
                        <div class="detail_left">
                           <div class="choose_detail">
                              <span>Detail</span>
                              <a href="javascript:;" onclick="choose_temp(this);return false;" class="choose_from_templates">Choose from templates</a>
                           </div>
                           <p class="save_template"><a href="javascript:;">Save as template</a></p>
                        </div>
                        <div class="detail_textarea">
                           <textarea name="quote_details" id="template_text" class="quote_details{{ $errors->has('quote_details') ? ' error_border' : '' }}">{{old('quote_details')}}</textarea>

                           @if ($errors->has('quote_details'))
                            <span class="fill_fields" role="alert">
                                {{ $errors->first('quote_details') }}
                            </span>
                        @endif
                        
                        </div>
                     </div>
                  </div>
                  <div class="registrationform">
			        <div class="description_optional row">
			          
			        </div>
                  <div class="add_photo_video">
                     <p>Add photos / Videos (optional)</p>
                     <div class="upload_file_section">
                        <div class="drag_file" id="drag_div">
                        	<div class="fallback">
              					<input name="file" class="disp_none" type="file" multiple style="width:1px;border:0px" />
              				</div>

                           <a href="javascript:;">Drag and drop files here to upload</a>
                        </div>
                        <span>OR</span>
                        <div class="file_to_upload">
                           <div class="upload-btn-wrapper">
                              <button class="btn">Select files to upload</button>
                              <input type="file" name="myfile[]" multiple class="select_quote_rply_img" accept="image/x-png,image/gif,image/jpeg"/>

                				      <span id="msg" class="BusQuoteRply"></span>
                           </div>
                           <div class="choose_from_pre">
                              <a href="javascript:;">Choose from previous</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
               <div class="send_button_this">
                  <a href="javascript:;"><input type="submit" class="quote_request_submit" value="Send"></a>
               </div>
           		</form>
            </div>
         </div>
      </section>
@endsection