@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Dashboard </a>/<a href="JavaScript:;"> Quotes and questions</a>/<span class="q_breadcrumb"> Home improvement</span></div>
      </section>
        <section>
          <div class="quote_req_main">
            @if(isset($quote_data[0]['status']))
              @if($quote_data[0]['status'] == '4')
              <h1>Quote accepted by user</h1>
              @elseif($quote_data[0]['status'] == '3')
              <h1>Quote quoted by user</h1>
              @endif
            @endif
              
            <div class="improvement_section_new accepted-quote">
              <div class="user_profile_sec">
                <div class="user_img"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                <div class="otheruser_detail">
                  @if(isset($quote_data))
                  <h1>{{$quote_data[0]['get_gen_user']['first_name']}} {{$quote_data[0]['get_gen_user']['last_name']}}</h1>
                  <p>{{$quote_data[0]['get_gen_user']['city']}}, {{$quote_data[0]['get_gen_user']['country']}}</p>
                  @else
                  <h1>Moshe</h1>
                  <p>test</p>
                  @endif
                  <span>Member since Aug 2016</span>
                </div>
                <div class="contact_user">
                  <a href="JavaScript:;" class="user_call"><img src="{{ asset('img/call.png') }}"/></a>
                  <a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
                </div>
                <div class="review_section">
                  <ul>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  </ul>
                  <p class="total_review">306 reviews</p>
                </div>
              </div>
              <div class="user_quote_second_section">
                <h1>Home improvement quote</h1>
                <p>Quotes <span>32</span></p>
                <div class="Q_tag">
                  @if(isset($quote_data[0]['status']))
                    @if($quote_data[0]['status'] == '4')
                    <div class="new_lable q_accepted_table">ACCEPTED</div>
                    @elseif($quote_data[0]['status'] == '3')
                    <div class="new_lable q_quoted_table">QUOTED</div>
                    @endif
                  @endif
                    <div class="created_date">14/07/2018</div>
                </div>
                <div class="quote_basic_detail">
                   <div class="Q_detail">
                      <span class="Q_detail_heading">House type:</span>
                      <span>Private land</span>
                  </div>
                  <div class="Q_detail">
                   <span class="Q_detail_heading">Required task:</span>
                    <span>Design house</span>
                  </div>
                <div class="Q_detail">
                    <span class="Q_detail_heading">Design type: </span>
                      <span>Modern</span>
                 </div>
                </div>
                <div class="Q_description">
                  <p>Hello my name is Moshe and i'm looking for design of a new house. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec nunc sed ex accumsan imperdiet. In volutpat magna sed libero accumsan, ut varius nulla molestie. Proin eget metus sit amet urna egestas euismod. Aenean vestibulum elit eget mi consectetur varius. Morbi tempor gravida nulla ut imperdiet. Duis dictum ipsum cursus arcu lacinia, quis vulputate diam interdum.</p>
                  </div>
                <div class="uploaded_content">
                    <div class="swiper-container swiper-wrapper_p">
                       <div class="swiper-wrapper ">
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                          <div class="swiper-slide">
                             <div class="uploaded_img">
                                <img src="{{ asset('img/p_image.png') }}"/>
                             </div>
                          </div>
                       </div>

                       <div class="swiper-button-next for_next_arrow"></div>
                       <div class="swiper-button-prev for_back_arrow"></div>
                    </div>
                  </div>
              </div>
            </div>

          </div>
          <div class="container-fluid">
            <div class="your_quote">
              <h1>Your quote</h1>
              <div class="doller_hr"><h1>$ @if(isset($quote_data[0]['quote_reply'])){{$quote_data[0]['quote_reply']['price_quotes']}} @else 100 @endif </h1><p>/hour</p></div>
              <p class="your_quote_des">@if(isset($quote_data[0]['quote_reply'])) {{$quote_data[0]['quote_reply']['details']}} @endif
              </p>
              <div class="total_pics">
                <div class="swiper-container swiper-wrapper_p swiper2">
                       <div class="swiper-wrapper">
                        @if(isset($quote_data[0]['quote_reply']))
                        <?php
                        $uploads = json_decode($quote_data[0]['quote_reply']['uploaded_files'],true);
                         ?>

                        @if(!empty($uploads))
                          @foreach($uploads['pic'] as $img)
                          <?php $img_name = explode( '.', $img );?>
                          <div class="swiper-slide total_pics_img" id="img_{{$img_name[0]}}"><img src="{{url('/images/quotes_request/'.$business_userid.'/'.$img)}}"/></div>
                          @endforeach
                          
                        @endif

                        @endif
                       </div>
                       <!-- Add Pagination -->
                       <div class="swiper-pagination1 swiper21"></div>
                       <!-- Add Arrows -->
                       <div class="swiper-button-next swiper2next"></div>
                       <div class="swiper-button-prev swiper2pre"></div>
                    </div>
              </div>
            </div>
            <div class="finish_job">
              <a href="javascript:;" data-quoteid="{{$quote_data[0]['quote_id']}}" class="finish_job_quotes">Finish job</a>
            </div>
    </div>
  </section>

@endsection