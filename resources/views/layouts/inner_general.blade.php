<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>Yes Please!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/gerneral_user_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/developer.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/glyphicon-datetimepicker.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}" type="text/css">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
    
    
</head>

<body>

  <div class="pre_loader pre_loader_new" style="display:none;">
        <div class="pre_loader_inner">
        <img id="loading-image" src="{{ asset('img/pre_loader.svg') }}"/>
        </div>
    </div>
            <nav class="side_bar_menu">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="{{ asset('img/menu-red.png') }}" class="img-fluid" /></a>
                    <ul class="custom_sidebar_menu">

                      @if (Auth::guard('general_user')->check())
                        <li>
                            <a href="{{ url('/') }}"><img src="{{ asset('img/home.png') }}" />Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/general_user/general_dashboard') }}"><img src="{{ asset('img/dashboard.png') }}" />Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/general_user/quote_questions') }}"><img src="{{ asset('img/quotes.png') }}" />Quotes</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/question.png') }}" />Questions</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/messages.png') }}" />Messages <span class="total_message">12</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/ratings.png') }}" />Ratings</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/share.png') }}" />Share</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/profile.png') }}" />Profile and Settings</a>
                        </li>
                        <li>
                          <a href="{{ route('general_user.logout') }}" class="logout"><img src="{{ asset('img/logout.png') }}" />Logout</a>
                        </li>
                        @else
                        <li>
                          <a href="{{ url('/') }}"><img src="{{ asset('img/home.png') }}" />Home</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#general_login" data-backdrop="static" data-keyboard="false"><img src="{{ asset('img/question.png') }}" />I'm a User</a>
                          </li>
                          <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#login_business" data-backdrop="static" data-keyboard="false"><img src="{{ asset('img/profile.png') }}" />I'm a Business! </a>
                          </li>
                          <li>
                            <a href="#"><img src="{{ asset('img/profile.png') }}" />  About Yes, please</a>
                          </li>

                          <li>
                            <a href="#"><img src="{{ asset('img/messages.png') }}" />Contact </a>
                          </li>
                        <li>
                          <a href="{{ route('general_user.logout') }}" class="logout"><img src="{{ asset('img/logout.png') }}" />Logout</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <section class="second_tabbar category_barht ">
                  <div class="second_header category_bar">
                    <div class="menu_search category_bar1">
                      <div class="second_menu">
                        <a href="javascript:;" onclick="openNav()"><img src="{{ asset('img/menu.png') }}" / class="img-fluid"></a>
                      </div>
                      <div class="search-input1 cat-input1">
                        <input type="search" placeholder="Search...">
                        <span>in Tel Aviv</span>
                        <img src="{{ asset('img/search.png') }}" class="img-fluid">
                      </div>
                    </div>
                    <div class="second_header_logo category_bar2"><a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" class="img-fluid" /></a></div>
                      <div class="second_header_links category_bar3">
                        <div class="username_list">
                          <div class="notification_sec">
                            <a href="javascript:;"><img src="{{ asset('img/notifications.png') }}">
                            <!-- <span>3</span> -->
                            </a>
                          </div>
                          <div class="messsage_sec">
                            <a href="javascript:;"><img src="{{ asset('img/messages_list.png') }}">
                            <!-- <span>7</span> -->
                            </a>
                          </div>
                          @if (Auth::guard('general_user')->check())
                            <div class="user_profile">
                              <a href="javascript:;">
                         
                                <?php 
                                $gen_user_id = Auth::guard('general_user')->user()->user_id;
                                $img_url = Auth::guard('general_user')->user()->image_url;
                                ?>
                                @if($img_url)
                                <img src="{{url('/images/users/'.$gen_user_id.'/'.$img_url)}}">
                                @else
                                <img src="{{ asset('img/user_placeholder.png') }}">
                                @endif
                                <p>{{ Auth::guard('general_user')->user()->first_name }} {{ Auth::guard('general_user')->user()->last_name }}</p>
                          
                              </a>
                            </div>
                        @else
                          <div class="second_header_links">
                            <a href="{{ route('general_user.register') }}" class="regidter_tab">Register</a>
                            <a href="javascript:;" class="signin_tab" data-toggle="modal" data-target="#general_login" data-backdrop="static" data-keyboard="false">Sign in</a>
                          </div>
                        @endif

                      </div>
                    </div>
                  </div>
                </section>

                <input type="hidden" id="home_url" value="{{ URL::asset('') }}">
                <div id="site_url" style="display:none">{{ url('/') }}</div>

                  <div class="content">
                  @yield('content')
                  </div>
                  <section class="yes_please_footer">
                    <div class=" position-relative">
                      <div class="row">
                        <div class="col-md-6 col-lg-3 col-12">
                          <div class="general_user_logo">
                            <span><a href="{{ url('/') }}"><img src="{{ asset('img/footer_logo.png') }}"/></a></span>
                            <div class="store_icons">
                              <a href="javascript:;" class="google_play"/><img src="{{ asset('img/google_play.png') }}"/></a>
                              <a href="javascript:;" class="app_store"/><img src="{{ asset('img/apple_store.png') }}"/></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-12">
                            <div class="menu_section menu_section1">
                            <h1>Menu</h1>
                            <ul>
                              <li><a href="javascript"/>Home</a></li>
                              <li><a href="javascript"/>Pricelist</a></li>
                              <li><a href="javascript"/>Agreement</a></li>
                              <li><a href="javascript"/>About</a></li>
                              <li><a href="javascript"/>Contact</a></li>
                              <li><a href="javascript"/>Register</a></li>
                              <li><a href="javascript"/>Sign in</a></li>
                              <li><a href="javascript"/>Add business</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-6">
                      <div class="menu_section">
                        <h1>Categories</h1>
                        <ul>
                          <li><a href="javascript"/>Professionals</a></li>
                          <li><a href="javascript"/>Autos</a></li>
                          <li><a href="javascript"/>Courses and studies</a></li>
                          <li><a href="javascript"/>Tourism</a></li>
                          <li><a href="javascript"/>Financial</a></li>
                          <li><a href="javascript"/>Home, office and garden</a></li>
                          <li><a href="javascript"/>Computers and electronics</a></li>
                          <li><a href="javascript"/>Health & Beauty</a></li>
                          <li><a href="javascript"/>Various</a></li>
                        </ul>
                      </div>
                    </div>

                  <div class="col-md-6 col-lg-3 col-6">
                    <div class="menu_section">
                      <h1>Popular</h1>
                      <ul>
                        <li><a href="javascript"/>Travel</a></li>
                        <li><a href="javascript"/>Finance</a></li>
                        <li><a href="javascript"/>eNews</a></li>
                        <li><a href="javascript"/>Health & Beauty</a></li>
                        <li><a href="javascript"/>Finance</a></li>
                        <li><a href="javascript"/>Tourism</a></li>
                        <li><a href="javascript"/>Development</a></li>
                        <li><a href="javascript"/>Transport</a></li>
                        <li><a href="javascript"/>Home & office</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="general_user_fb_icon"><a href="javascript:;"><img src="{{ asset('img/general_user_footer_facebook.png') }}"/></a></div>
                </div>
                  </section>

    <!-------- Login Modal for business user------->
 <div class="modal fade" id="login_business" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="login_body_main">
                    <h1>Sign in</h1>
                    <div class="login_section">
                      <div class="login_with_social">
                        <a href="javascript:;" class="fblogin"><img src="{{ asset('img/icon_F.png') }}" class="img-fluid"/> Login with <b>Facebook</b></a>
                        <a href="javascript:;" class="googlelogin"><img src="{{ asset('img/google_plus.png') }}" class="img-fluid"/> Login with <b>Google+</b></a>
                      </div>
                      <div class="login_fields">
                         <form id="sign_in_business" method="POST" action="">
                            {{ csrf_field() }}
                            <span class="fill_fields bu_error" role="alert" style="display:none;">
                              </span> 
                            <input type="hidden" class="action_business" value="{{ route('business_user.login.submit') }}">
                              <input type="hidden" class="website_url_b" value="{{ url('') }}">
                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="email">Email</label>
                              <input type="email" class="form-control email_bu" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                              <span class="fill_fields email_business_error" role="alert" style="display:none;">
                              </span>
                            </div>
                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="password">Password</label>
                              <input type="password" class="form-control password_bu" name="password" placeholder="Password">
                              <span class="fill_fields password_business_error" role="alert" style="display:none;">
                            </div>
                            <p class="forgot_pass_bus"><a href="javascript:;">Forgot your password?</a></p>
                            <div class="login_btn"><a><input type="submit" value="Login"></a></div>
                            <div class="register_page"><a href="{{ route('business_user.register') }}">Register</a></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
<!-------- Login Modal end ----->

<!-- Forgot Password Popup --> 
    <div class="modal fade" id="business_forgot_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="login_body_main">
                    <h1>Forgot Password</h1>
                  </div>
                  <form id="forgot_password_business" method="POST" action="">
                        {{ csrf_field() }}
                        

                           <input type="hidden" class="action_business" value="https://yesplease.iapptechnologies.com/business_user/login">
                          <input type="hidden" class="website_url_b" value="https://yesplease.iapptechnologies.com">
                        <div class="form-group col-md-12 col-12 padding_none">
                          <label for="email">Email</label>
                          <input type="email" class="form-control email_bu forget_email" name="email" placeholder="Email Address" value="" required="" autofocus="">
                          <span class="fill_fields email_business_error" role="alert" style="display:none;">
                          </span>
                          <span class="fill_fields bu_error" role="alert" style="display:none;">
                            hello
                        </span> 
                        </div>                        
                        <div class="login_btn">
                            <a><input type="button" id="submit" value="Submit"></a>
                        </div>                       
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Forgot Password Popup business user--> 
    <div class="modal fade" id="user_forgot_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="login_body_main">
                    <h1>Forgot Password</h1>
                  </div>
                  <form id="forgot_password_business" method="POST" action="">
                        {{ csrf_field() }}                       

                           <input type="hidden" class="action_business" value="https://yesplease.iapptechnologies.com/business_user/login">
                          <input type="hidden" class="website_url_b" value="https://yesplease.iapptechnologies.com">
                        <div class="form-group col-md-12 col-12 padding_none">
                          <label for="email">Email</label>
                          <input type="email" class="form-control email_bu forget_email" name="email" placeholder="Email Address" value="" required="" autofocus="">
                          <span class="fill_fields email_business_error" role="alert" style="display:none;">
                          </span>
                          <span class="fill_fields bu_error" role="alert" style="display:none; width:100%;">
                            hello
                        </span> 
                        </div>                        
                        <div class="login_btn">
                            <a><input type="button" id="submit" value="Submit"></a>
                        </div>                       
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ask quote Modal -->
          <div class="modal fade" id="ask_quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header question_header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body question_body">
                  <div class="quote_recieve">
                  <h1>How many quotes you want to receive?</h1>
                  <div class="total_quote">
                     <ul>
                        <li>
                           <div class="formcheck">
                              <label>
                                 <input type="radio" class="radio-inline" name="radios" value="1">
                                 <span class="outside"><span class="inside"></span></span>
                                 <p>1</p>
                              </label>
                           </div>
                        </li>
                        <li>
                           <div class="formcheck">
                              <label>
                                 <input type="radio" class="radio-inline" name="radios" value="2">
                                 <span class="outside"><span class="inside"></span></span>
                                 <p>2</p>
                              </label>
                           </div>
                        </li>
                        <li>
                           <div class="formcheck">
                              <label>
                                 <input type="radio" class="radio-inline" name="radios" value="3">
                                 <span class="outside"><span class="inside"></span></span>
                                 <p>3</p>
                              </label>
                           </div>
                        </li>
                        <li>
                           <div class="formcheck">
                              <label>
                                 <input type="radio" class="radio-inline" name="radios" value="4">
                                 <span class="outside"><span class="inside"></span></span>
                                 <p>4</p>
                              </label>
                           </div>
                        </li>
                        <li>
                           <div class="formcheck">
                              <label>
                                 <input type="radio" class="radio-inline" name="radios" value="5">
                                 <span class="outside"><span class="inside"></span></span>
                                 <p>5</p>
                              </label>
                           </div>
                        </li>
                     </ul>
                     <div class="t_detail">
                        <p><img src="{{ asset('img/info.png') }}">Choose how many quotes you want to receive.</p>
                     </div>
                     <div class="q_nex_btns">
                        <div class="ele_pre"><a href="javascript:;">&lt; Previous</a></div>
                        <div class="ele_next"><a href="javascript:;" class="radio_next quotes_radio_next" data-toggle="modal" data-target="#work_description"  data-backdrop="static" data-keyboard="false">Next &gt;</a></div>
                     </div>
                  </div>
               </div>

              </div>
            </div>
          </div>
        </div>

      <!-- ask quote Modal end-->
      <?php
      if(!empty($b_id)){
        $action_url = url('/general_user/quotesend/'.$b_id);
      }else{
        $action_url = url('/general_user/quotesend');
      }

      ?>
      <form method="POST" class="dropzone" id="dropzone_form" data-page="askquote" action="{{ $action_url }}" enctype="multipart/form-data">
      @csrf
      <!-------- work description Modal ------->
      <div class="modal fade" id="work_description" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header quote_header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body quote_body">
                <!---------work description popup starts--------->
                  <div class="describe_work">
                        <h1>Describe your work</h1>
                        <p>(0/2000 letters minimum 100)</p>
                        <div class="describe_work_sec">
                           <div class="des_area">
                              <textarea cols="30" class="work_description_modal" name="work_description_text" id="description" placeholder="Input description" onkeyup="remove_errmsg(this)"></textarea>
                              <span class="fill_fields" role="alert"></span>
                           </div>
                           <div class="t_detail">
                              <p><img src="{{ asset('img/info.png') }}">Add your work descrition.</p>
                           </div>
                           <div class="describe_work_btn mb-5">
                              <!-- <div class="ele_pre"><a href="javascript:;">&lt; Previous</a></div> -->
                              <div class="ele_next"><a href="javascript:;" class="desc_work_modal" >Next &gt;</a></div>
                           </div>
                        </div>
                     </div>
                     <!-------------work description popup ends-------------->
                     <!--------popup for image video------->
                     <div class="img_vid_popup" style="display:none;">
                     <div class="registrationform">
                    <div class="description_optional row">
                      
                    </div>
                    <div class="D_main">
                     <h1>Add photos, videos or documents that can help the business understand your needs.</h1>
                     

                     <div class="drag_option_main">
                        <div class="select_upload">
                           <div class="upload_file_section">
                              <div class="drag_file" id="drag_div">
                                 <div class="fallback">
                                  <input name="file" class="disp_none" type="file" multiple style="width:1px;border:0px" /></div>
                                <a href="javascript:;">Drag and drop files here to upload</a>
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
                </div>
                <div class="P_N_btn">
                     <a href="javascript:;" class="btn_for_previous prev_pic_vid">< Previous</a>
                     <a href="javascript:;" class="btn_for_skip skip_pic_vid">Skip</a>
                  </div>
                </div>
                <!-----------upload image video popup ends----------->
                <!----------popup for mobile phone------------>
                <div class="not_all_business mobile_phone_pop" style="display:none;">
                        <h1>Not all businesses reply to quote requests
                           without phone. Enter your phone number
                           to get more offers.
                        </h1>
                        <div class="ph_detail">
                           <div class="form-group ">
                              <label for="inputEmail4">Phone number</label>
                              <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="mobile_phone" class="form-control mobl_phn" id="mobile_phone" value="" onkeyup="remove_errmsg(this)">
                              <span class="fill_fields" role="alert"></span>
                           </div>
                           <div class="all_business_ph">
                              <div class="ele_pre"><input type="submit" value="Validate" class="mobile_validate_submit"></div>
                              <div class="ele_next"><input type="submit" class="mobile_dont_want mobile_validate_submit" value="Don’t want"></div>
                           </div>
                           <div class="t_detail mb-4">
                              <p><img src="{{ asset('img/info.png') }}">Add phone number.</p>
                           </div>
                        </div>
                     </div>
                     <!---------Mobile phone popup ends----------->

                     <!------Thanku popup------->
                      <div class="not_all_business final_ques_thanks static_ques" style="display:none;">
                        <h1>Your quote request was sent</h1>
                        <div class="ph_detail">
                           <div class="requ_quote_sent">
                              <h1>Your request was sent to relevant business. Whenever business wil reply to your quote request you’ll receive a notification.</h1>
                              <h1>You can go to quotes page to view your quotes.</h1>
                           </div>
                           <div class="all_business_ph">
                              <div class="ele_pre" ><a href="{{url('general_user/quote_questions')}}">See quotes</a></div>
                              <div class="ele_next" onclick="closestaticmodal();"><a href="javascript:;">Close</a></div>
                           </div>
                        </div>
                      </div>
                     <!------Thanku popup------->
               </div>
            </div>
         </div>
      </div>
      <!-------- work description Modal end ----->
    </form>


    <!-------- Login Modal for general user------->
    <div class="modal fade" id="general_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="login_body_main">
                    <h1>Login or register</h1>
                    <div class="login_section">
                      <div class="login_with_social">
                        <a href="javascript:;" class="phonelogin"><img src="{{ asset('img/icon_ph.png') }}" class="img-fluid"/> Login with <b>Phone number</b></a>
                        <a href="{{url('general_user/redirectfb')}}" class="fblogin"><img src="{{ asset('img/icon_F.pn') }}g" class="img-fluid"/> Login with <b>Facebook</b></a>
                        <a href="{{url('general_user/redirect')}}" class="googlelogin"><img src="{{ asset('img/google_plus.png') }}" class="img-fluid"/> Login with <b>Google+</b></a>
                      </div>
                      <div class="login_fields">
                        <!-- <form id="sign_in_general" method="POST" action="{{ route('general_user.login.submit') }}"> -->
                          <form id="sign_in_general" method="POST" action="">
                            {{ csrf_field() }}

                              <span class="fill_fields gen_error" role="alert" style="display:none;">
                              </span> 

                             <input type="hidden" class="action_general" value="{{ route('general_user.login.submit') }}">
                              <input type="hidden" class="website_url" value="{{ url('') }}">

                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="email">Email</label>
                              <input type="email" class="form-control email_gen" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                              <span class="fill_fields email_gen_error" role="alert" style="display:none;">
                              </span>
                            </div>
                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="password">Password</label>
                              <input type="password" class="form-control password_gen" name="password" placeholder="Password">
                              <span class="fill_fields password_gen_error" role="alert" style="display:none;">
                              </span>
                            </div>
                            <p class="forgot_pass"><a href="javascript:;">Forgot your password?</a></p>
                            <div class="login_btn"><a><input type="submit" value="Login"></a></div>
                            <div class="register_page"><a href="{{ route('general_user.register') }}" target="_blank">Register</a></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>

    </div>
    <!-------- Login Modal end ----->

    <!---modal to open big image --->
    <div class="modal fade" id="showBigImageModalUser" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                     </div>
                    
                    <div class="modal-body">
                     <img style="width:100%" src=""/>
                    </div>
                    
            </div>
        </div>
    </div>  
    <!---modal to open big image endshere --->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/swiper.js') }}" type="text/javascript"></script>

   <!--  <script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}"></script> -->
    <script type="text/javascript" src="{{ URL::asset('js/dropzone.min.js') }}"></script>
    @if (Auth::guard('general_user')->check())

    @else
    <script type="text/javascript" src="{{ URL::asset('js/business_user.js') }}"></script>
    @endif
    <script type="text/javascript" src="{{ URL::asset('js/general_user.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/general_quotes.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/formbuilder.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    
    <!-----autocomplete address----->
    <script>
    var placeSearch, autocomplete;
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };

    function initAutocomplete_dash() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')),{types: ['geocode']});

      

      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      autocomplete.addListener('place_changed', fillInAddress_hash);

    }

    function fillInAddress_hash() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();
      var address = place.formatted_address;
     
      //if(address == 'undefined'){
      /*if(address == "" && typeof address == typeof undefined){
        alert('no');
        return false;
      }*/
      console.log(place.formatted_address);
      console.log(place);

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var current_url = window.location.href;
      var cat_id = current_url.substring(current_url.lastIndexOf('/') + 1);

      var home_url = $('#home_url').val();

      /*****ajax starts*****/
      $.ajax({
        url: home_url+'general_user/dashboard/catid/'+cat_id+"/location",
        type: 'GET',
        data:{address:address},
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
                        alert('Address : '+address+'.\n Business Name : '+ business_name);
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
              /*****ajax starts*****/
                $.ajax({
                  url: home_url+'general_user/dashboard/catid/'+cat_id+"/location",
                  type: 'GET',
                  data:{address:address,selected_radious:selected_radious},
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
                                  alert('Address : '+address+'.\n Business Name : '+ business_name);
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

                    /****code to filetr data with radiou***/
                   /* $(document).on('change','#dashboard_radious_general',function(){
                        var selected_radious = $(this).val();
                    });*/
                    /****end radious code here*****/
                
                  }
                });/***ajax ends here***/

          });
          /****end radious code here*****/
      
        }
      });/***ajax ends here***/


    }

    function geolocate_dash() {
//alert($('.autocomplete_dash').val());
      
       var initialCall = true;
         if(initialCall){
          initAutocomplete_dash();
          initialCall = false;
          
        }
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlzdmRasNAVLVYfUb26BiOjkSvny4YHQ&libraries=places&callback=initAutocomplete_dash"></script>
    <!-----autocomplete address ends----->

    <script>
         /*var swiper = new Swiper('.swiper-container', {
           
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
            navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
           },

           breakpoints: {
                1199: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 45,
                },
                767: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },

                640: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                420: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                }
            }


        });*/
      </script>

      <script>
         var swiper = new Swiper('.swiper-container', {
           slidesPerView: 5,
           spaceBetween: 6,
           slidesPerGroup:5,
           loop: true,
           loopFillGroupWithBlank: true,
           nextButton: '.swiper-button-next',
           prevButton: '.swiper-button-prev',
           pagination: {
             el: '.swiper-pagination',
             clickable: true,
           },
           navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
           },
           breakpoints: {
               1199: {
                   slidesPerView: 5,
                   spaceBetween: 20,
               },
               992: {
                   slidesPerView: 5,
                   spaceBetween: 45,
               },
               767: {
                   slidesPerView: 3,
                   spaceBetween: 30,
               },

               640: {
                   slidesPerView: 3,
                   spaceBetween: 30,
               },
               420: {
                   slidesPerView: 3,
                   spaceBetween: 20,
               },
               320: {
                   slidesPerView: 2,
                   spaceBetween: 30,
               }
           }
         });
      </script>

    <script>
      $(document).ready(function(){
         
          $('.tpicker').datetimepicker({
            format: 'HH:mm'
          });
         $('.dpicker').datepicker();
           
        });

          var isLoop = true;
          if($('.swiper-slide').length < 8) {
              isLoop = false;
          }


          var swiper = new Swiper('.swiper2', {
            slidesPerView: 8,
            spaceBetween: 10,
            slidesPerGroup:8,
            loop: isLoop,
           //loopFillGroupWithBlank: true,
            pagination: {
              el: '.swiper21',
              clickable: true,
              renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
              },
            },
            breakpoints: {
                1199: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 45,
                },
                767: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },

                640: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                420: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                }
            }
          });


        </script>
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 100,
            callback: function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();
        document.getElementById('moar').onclick = function() {
            var section = document.createElement('section');
            section.className = 'section--purple wow fadeInDown';
            this.parentNode.insertBefore(section, this);
        };
    </script>
    <script>
        function openNav() {
            $("#mySidenav").css({
                "margin-left": "0px"
            });
            $(".header_menu_toggle").css({
                "opacity": "0"
            });
        }

        function closeNav() {
            $("#mySidenav").css({
                "margin-left": "-260px"
            });
            $(".header_menu_toggle").css({
                "opacity": "1"
            });
        }
    </script>
    <script>
        $("#button").click(function() {
            $('html, body').animate({
                scrollTop: $(".second_tabbar").offset().top
            }, 800);
        });
    </script>
    <script>
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

  $("#imgInp").change(function() {
    readURL(this);
  });

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });
    </script>




</body>

</html>