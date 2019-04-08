<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>Yes Please!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/gerneral_user_style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/animate.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/developer.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/swiper.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/glyphicon-datetimepicker.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datetimepicker.min.css')); ?>" type="text/css">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
    
    
</head>

<body>

  <div class="pre_loader pre_loader_new" style="display:none;">
        <div class="pre_loader_inner">
        <img id="loading-image" src="<?php echo e(asset('img/pre_loader.svg')); ?>"/>
        </div>
    </div>
    
            <nav class="side_bar_menu">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="<?php echo e(asset('img/menu-red.png')); ?>" class="img-fluid" /></a>
                    <ul class="custom_sidebar_menu">

                      <?php if(Auth::guard('general_user')->check()): ?>
                        <li>
                            <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/home.png')); ?>" />Home</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/general_user/quote_questions')); ?>"><img src="<?php echo e(asset('img/quotes.png')); ?>" />Quotes</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/general_user/quote_questions?tab=ques')); ?>"><img src="<?php echo e(asset('img/question.png')); ?>" />Questions</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/messages.png')); ?>" />Messages <span class="total_message">12</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/ratings.png')); ?>" />Ratings</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/share.png')); ?>" />Share</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/profile.png')); ?>" />Profile and Settings</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/profile.png')); ?>" />Favorite businesses</a>
                        </li>
                        <li>
                          <a href="<?php echo e(route('general_user.logout')); ?>" class="logout"><img src="<?php echo e(asset('img/logout.png')); ?>" />Logout</a>
                        </li>
                        <?php elseif(Auth::guard('business_user')->check()): ?>
                        <li>
                            <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/home.png')); ?>" />Home</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/business_user/business_dashboard')); ?>"><img src="<?php echo e(asset('img/dashboard.png')); ?>" />Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/business_user/quotes_questions')); ?>"><img src="<?php echo e(asset('img/quotes.png')); ?>" />Quotes</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/question.png')); ?>" />Questions</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/messages.png')); ?>" />Messages <span class="total_message">12</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/ratings.png')); ?>" />Ratings</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/share.png')); ?>" />Share</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('business_user.profile_setting')); ?>"><img src="<?php echo e(asset('img/profile.png')); ?>" />Profile and Settings</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('business_user.logout')); ?>" class="logout"><img src="<?php echo e(asset('img/logout.png')); ?>" />Logout</a>
                        </li>
                        <?php else: ?>
                        <li>
                          <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/home.png')); ?>" />Home</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#general_login" data-backdrop="static" data-keyboard="false"><img src="<?php echo e(asset('img/question.png')); ?>" />I'm a User</a>
                          </li>
                          <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#login_business" data-backdrop="static" data-keyboard="false"><img src="<?php echo e(asset('img/profile.png')); ?>" />I'm a Business! </a>
                          </li>
                          <li>
                            <a href="#"><img src="<?php echo e(asset('img/profile.png')); ?>" />  About Yes, please</a>
                          </li>

                          <li>
                            <a href="#"><img src="<?php echo e(asset('img/messages.png')); ?>" />Contact </a>
                          </li>
                        <?php endif; ?>
                    </ul>
                </div>

    <section class="second_tabbar category_barht ">
         <div class="second_header category_bar">
            <div class="menu_search category_bar1">
               <div class="second_menu">
                  <a href="javascript:;" onclick="openNav()"><img src="<?php echo e(asset('img/menu.png')); ?>" / class="img-fluid"></a>
               </div>
               <div class="search-input1 cat-input1">
                  <input type="search" placeholder="Search...">
                  <span>in Tel Aviv</span>
                  <img src="<?php echo e(asset('img/search.png')); ?>" class="img-fluid">
               </div>
            </div>
            <div class="second_header_logo category_bar2"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.png')); ?>" class="img-fluid" /></a></div>
            <div class="second_header_links category_bar3">
               <div class="username_list">
                  <div class="notification_sec">
                     <a href="javascript:;"><img src="<?php echo e(asset('img/notifications.png')); ?>">
                     <!-- <span>3</span> -->
                     </a>
                  </div>
                  <div class="messsage_sec">
                     <a href="javascript:;"><img src="<?php echo e(asset('img/messages_list.png')); ?>">
                     <!-- <span>7</span> -->
                     </a>
                  </div>
                  <?php if(Auth::guard('general_user')->check()): ?>
                  <div class="user_profile">
                     <a href="javascript:;">
                        
                        
                        <?php 
                        $gen_user_id = Auth::guard('general_user')->user()->user_id;
                        $img_url = Auth::guard('general_user')->user()->image_url;
                        ?>
                        <?php if($img_url): ?>
                        <img src="<?php echo e(url('/images/users/'.$gen_user_id.'/'.$img_url)); ?>">
                        <?php else: ?>
                        <img src="<?php echo e(asset('img/user_placeholder.png')); ?>">
                        <?php endif; ?>
                        <p><?php echo e(Auth::guard('general_user')->user()->first_name); ?> <?php echo e(Auth::guard('general_user')->user()->last_name); ?></p>
                        
                     </a>
                  </div>
                  <?php elseif(Auth::guard('business_user')->check()): ?>
                  <div class="user_profile">
                      <a href="javascript:;">
                          <?php if(Auth::guard('business_user')->check()): ?>
                          <?php
                          $bus_user_id = Auth::guard('business_user')->user()->business_userid;
                          $img_url = Auth::guard('business_user')->user()->image_name;
                          ?>

                          <?php if($img_url): ?>
                          <img src="<?php echo e(url('/images/business_profile/'.$bus_user_id.'/'.$img_url)); ?>">
                          <?php else: ?>
                          <img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/>
                          <?php endif; ?>

                          <p><?php echo e(Auth::guard('business_user')->user()->first_name); ?> <?php echo e(Auth::guard('business_user')->user()->last_name); ?></p>
                          <?php else: ?>
                          <p>Firstname Lastname</p>
                          <?php endif; ?>
                      </a>
                  </div>
                  <?php else: ?>
                  <div class="second_header_links">
                      <a href="<?php echo e(route('general_user.register')); ?>" class="regidter_tab">Register</a>
                      <a href="javascript:;" class="signin_tab" data-toggle="modal" data-target="#general_login" data-backdrop="static" data-keyboard="false">Sign in</a>
                     
                  </div>
                  <?php endif; ?>

               </div>
            </div>
         </div>
      </section>

      <input type="hidden" id="home_url" value="<?php echo e(URL::asset('')); ?>">
      <div id="site_url" style="display:none"><?php echo e(url('/')); ?></div>

    <div class="content">
    <?php echo $__env->yieldContent('content'); ?>
    </div>
    <section class="yes_please_footer">
        <div class=" position-relative">
          <div class="row">
            <div class="col-md-6 col-lg-3 col-12">
              <div class="general_user_logo">
                <span><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/footer_logo.png')); ?>"/></a></span>
                <div class="store_icons">
                  <a href="javascript:;" class="google_play"/><img src="<?php echo e(asset('img/google_play.png')); ?>"/></a>
                  <a href="javascript:;" class="app_store"/><img src="<?php echo e(asset('img/apple_store.png')); ?>"/></a>
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
          <div class="general_user_fb_icon"><a href="javascript:;"><img src="<?php echo e(asset('img/general_user_footer_facebook.png')); ?>"/></a></div>
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
                        <a href="javascript:;" class="fblogin"><img src="<?php echo e(asset('img/icon_F.png')); ?>" class="img-fluid"/> Login with <b>Facebook</b></a>
                        <a href="javascript:;" class="googlelogin"><img src="<?php echo e(asset('img/google_plus.png')); ?>" class="img-fluid"/> Login with <b>Google+</b></a>
                      </div>
                      <div class="login_fields">
                         <form id="sign_in_business" method="POST" action="">
                            <?php echo e(csrf_field()); ?>

                            <span class="fill_fields bu_error" role="alert" style="display:none;">
                              </span> 
                            <input type="hidden" class="action_business" value="<?php echo e(route('business_user.login.submit')); ?>">
                              <input type="hidden" class="website_url_b" value="<?php echo e(url('')); ?>">
                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="email">Email</label>
                              <input type="email" class="form-control email_bu" name="email" placeholder="Email Address" value="<?php echo e(old('email')); ?>" required autofocus>
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
                            <div class="register_page"><a href="<?php echo e(route('business_user.register')); ?>">Register</a></div>
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
                        <?php echo e(csrf_field()); ?>

                        

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
                        <?php echo e(csrf_field()); ?>                       

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
                        <p><img src="<?php echo e(asset('img/info.png')); ?>">Choose how many quotes you want to receive.</p>
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
      <form method="POST" class="dropzone" id="dropzone_form" data-page="askquote" action="<?php echo e($action_url); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <!-------- work description Modal ------->
      <div class="modal fade" id="work_description" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header quote_header">
                  <button type="button" class="close close_single_quote" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body quote_body">
                <input type="hidden" class="hidden_catname" name="hidden_catname" value="<?php if(isset($cat_name)): ?><?php echo e($cat_name); ?><?php endif; ?>">
                <input type="hidden" class="hidden_catid" name="hidden_catid" value="<?php if(isset($cat_id)): ?><?php echo e($cat_id); ?><?php endif; ?>">
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
                              <p><img src="<?php echo e(asset('img/info.png')); ?>">Add your work descrition.</p>
                           </div>
                           <div class="describe_work_btn mb-5">
                              <!-- <div class="ele_pre"><a href="javascript:;">&lt; Previous</a></div> -->
                              <div class="ele_next"><a href="javascript:;" id="descr_single_quote" class="desc_work_modal">Next &gt;</a></div>
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
                              
                              <div class="file_to_upload gen_single_quote_upload">
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
                              
                              <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="mobile_phone" class="form-control mobl_phn" id="mobile_phone" value="<?php if(Auth::guard('general_user')->check() && !empty(Auth::guard('general_user')->user()->phone_number)): ?><?php echo e(Auth::guard('general_user')->user()->phone_number); ?><?php endif; ?>" onkeyup="remove_errmsg(this)">
                              <span class="fill_fields" role="alert"></span>
                           </div>
                           <div class="all_business_ph">
                              <div class="ele_pre"><input type="submit" name="validate" value="Validate" class="mobile_validate_submit mobileValidateSubmit"></div>
                              <div class="ele_next"><input type="submit" name="dont_want" class="mobile_dont_want" value="Don’t want"></div>
                           </div>
                           <div class="t_detail mb-4">
                              <p><img src="<?php echo e(asset('img/info.png')); ?>">Add phone number.</p>
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
                              <div class="ele_pre" ><a href="<?php echo e(url('general_user/quote_questions')); ?>">See quotes</a></div>
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
                    <button type="button" class="close close_popup close_single_questions" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="login_body_main">
                    <h1>Login or register</h1>
                    <div class="login_section">
                      <div class="login_with_social">
                        <a href="javascript:;" class="phonelogin"><img src="<?php echo e(asset('img/icon_ph.png')); ?>" class="img-fluid"/> Login with <b>Phone number</b></a>
                        <a href="<?php echo e(url('general_user/redirectfb')); ?>" class="fblogin"><img src="<?php echo e(asset('img/icon_F.pn')); ?>g" class="img-fluid"/> Login with <b>Facebook</b></a>
                        <a href="<?php echo e(url('general_user/redirect')); ?>" class="googlelogin"><img src="<?php echo e(asset('img/google_plus.png')); ?>" class="img-fluid"/> Login with <b>Google+</b></a>
                      </div>
                      <div class="login_fields">
                        <!-- <form id="sign_in_general" method="POST" action="<?php echo e(route('general_user.login.submit')); ?>"> -->
                          <form id="sign_in_general" method="POST" action="">
                            <?php echo e(csrf_field()); ?>


                              <span class="fill_fields gen_error" role="alert" style="display:none;">
                              </span> 

                             <input type="hidden" class="action_general" value="<?php echo e(route('general_user.login.submit')); ?>">
                              <input type="hidden" class="website_url" value="<?php echo e(url('')); ?>">

                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="email">Email</label>
                              <input type="email" class="form-control email_gen" name="email" placeholder="Email Address" value="<?php echo e(old('email')); ?>" required autofocus>
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
                            <div class="register_page"><a href="<?php echo e(route('general_user.register')); ?>" target="_blank">Register</a></div>
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

  <!-- ask question Modal -->
  <div class="modal fade" id="ask_question" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <?php
      if(!empty($b_id)){
        $ask_ques_url = url('/general_user/questionsend/'.$b_id);
      }else{
        $ask_ques_url = url('/general_user/questionsend');
      }

      ?>
      <input type="hidden" class="ask_qus_url" value="<?php echo e($ask_ques_url); ?>">
      <input type="hidden" class="hidden_cat_name" name="hidden_catname" value="<?php if(isset($cat_name)): ?><?php echo e($cat_name); ?><?php endif; ?>">
      <input type="hidden" class="hidden_cat_id" name="hidden_catid" value="<?php if(isset($cat_id)): ?><?php echo e($cat_id); ?><?php endif; ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header question_header">
          <button type="button" class="close close_single_questions" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body question_body">
          <div class="ask_question_main">
            <div class="how_to_ask">
              <h1>How to ask a question</h1>
              <div class="how_to_ask_steps">
                <ul>
                  <li>
                    <span>1.</span>Use questions to ask specific business or
                      all businesses question about your needs.
                  </li>
                  <li>
                    <span>2.</span>Questions are not meant to get prices or
                      to contact the businesses.
                  </li>
                  <li>
                    <span>3.</span>To get the best results please write clearly
                      a title for your question and describe in
                      details your question.
                  </li>
                </ul>
                <div class="for_next_btn">
                  <a href="javascript:;" class="how_ask_qus">Next ></a>
                </div>
              </div>
            </div>
            <div class="describe_question descrptn_qus" style="display:none;">
              <h1>Describe your question</h1>
              <p>(0/2000 letters)</p>
              <div class="descibe_question_steps">
                <div class="title_des">
                  <div class="form-group des_ques col-12">
                <label for="inputPassword4">Title</label>
                <input type="text" class="form-control question_title" id="single_ques_title" onkeyup="removeErrmsgs(this)">
                <span class="fill_fields" role="alert" style="display:none;"></span>
                  </div>
                  <div class="form-group des_ques col-12">
                    <label for="inputPassword4">Description</label>
                    <textarea class="question_description" id="single_ques_desc" onkeyup="removeErrmsgs(this)"></textarea>
                    <span class="fill_fields" role="alert" style="display:none;"></span>
                  </div>
                </div>
                <div class="for_next_btn">
                  <!-- <a href="javascript:;" class="descr_ques" data-toggle="modal" data-target="#similiar_result"> -->
                  <a href="javascript:;" class="descr_ques">Next ></a>
                </div>
              </div>
            </div>

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
                        <div class="file_to_upload gen_single_quote_upload">
                          <div class="upload-btn-wrapper">
                            <button class="btn">Select files to upload</button>
                            <input type="file" id="single_ques_imgs" name="myfile[]" multiple class="select_single_ques_img" accept="image/x-png,image/gif,image/jpeg"/>
                            <span id="msg"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="P_N_btn">
                <a href="javascript:;" class="btn_for_skip skip_btn_imgs">Skip</a>
              </div>
            </div>
            <!-----------upload image video popup ends----------->

            <div class="similar_result_section similar_result_qus" style="display:none;">
              <h1>We found similar results</h1>
              <p>Try to found answer to your question</p>
              <div class="questin_total_ans">
                <ul>
                  <li>
                    <div class="Question_main_div">
                      <h1>How long it takes to design paper for office?</h1>
                      <p>(5 answers)</p>
                    </div>
                  </li>
                  <li>
                    <div class="Question_main_div">
                      <h1>How long is A4 Page?</h1>
                      <p>(2 answers)</p>
                    </div>
                  </li>
                  <li>
                    <div class="Question_main_div">
                      <h1>Curabitur sit amet justo vel est dictum tincidunt. Maecenas egestas, libero vitae iaculis
                          mollis, erat risus tempus est, non vehicula mauris nibh ac magna?</h1>
                      <p>(17 answers)</p>
                    </div>
                  </li>
                  <li>
                    <div class="Question_main_div">
                      <h1>Nullam rhoncus vel ipsum non consectetur?</h1>
                      <p>(3 answers)</p>
                    </div>
                  </li>
                  <li>
                    <div class="Question_main_div">
                      <h1>Donec at ultricies est, a varius leo?</h1>
                      <p>(14 answers)</p>
                    </div>
                  </li>
                  <li>
                    <div class="Question_main_div">
                      <h1>Vestibulum vel sagittis mi, non aliquam enim. Curabitur sed tellus aliquet, rhoncus nibh id, gravida nulla?</h1>
                      <p>(3 answers)</p>
                    </div>
                  </li>
                </ul>
                <div class="send_to_business">
                  <!-- <a href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter_login"> -->

                    <a href="javascript:;" class="no_send_ques">No, send question to businesses</a>
                </div>
              </div>
            </div>


            <!----------popup for mobile phone------------>
            <div class="not_all_business mobile_phn_pop" style="display:none;">
              <h1>Not all businesses reply to quote requests
              without phone. Enter your phone number
              to get more offers.
              </h1>
              <div class="ph_detail">
                <div class="form-group ">
                  <label for="inputEmail4">Phone number</label>
                  <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="mobile_phone" class="form-control mobl_phn" id="mobile_phone" value="<?php if(Auth::guard('general_user')->check() && !empty(Auth::guard('general_user')->user()->phone_number)): ?><?php echo e(Auth::guard('general_user')->user()->phone_number); ?><?php endif; ?>" onkeyup="remove_errmsg(this)">
                  <span class="fill_fields" role="alert"></span>

                  <div id="example2"></div>
                   <div id="recaptcha" value="" hidden="hidden"></div>
                  <span class="fill_fields recaptcha_error" role="alert" style="display:none;"></span>

                </div>

                <div class="all_business_ph">
                  <div class="ele_pre"><input type="submit" name="validate" value="Validate" class="mobile_validate_submit SubmitSingleQues"></div>
                  <div class="ele_next"><input type="submit" name="dont_want" class="mobile_dont_want SubmitSingleQues" value="Don’t want"></div>
                </div>
                <div class="t_detail mb-4">
                  <p><img src="<?php echo e(asset('img/info.png')); ?>">Add phone number.</p>
                </div>
              </div>
            </div>
            <!---------Mobile phone popup ends----------->

            <div class="describe_question Question_sent" style="display:none;">
              <h1>Question sent</h1>
              <div class="descibe_question_steps">
                <div class="question_sent_mail">
                  <h1>Your question was sent to relevant business. Whenever business wil reply to your question you’ll receive a notification. You can go to questions page to view your questions.</h1>
                  <h1>You can go to questions page to view your questions.</h1>
                </div>
                <div class="for_next_btn seequestion_close">
                  <a href="<?php echo e(url('general_user/quote_questions?tab=ques')); ?>" >See questions</a>
                  <a href="javascript:;" class="close_single_questions">Close</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- ask question Modal end-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo e(URL::asset('js/swiper.js')); ?>" type="text/javascript"></script>

   <!--  <script type="text/javascript" src="<?php echo e(URL::asset('js/wow.min.js')); ?>"></script> -->
    <script type="text/javascript" src="<?php echo e(URL::asset('js/dropzone.min.js')); ?>"></script>
    <?php if(Auth::guard('general_user')->check()): ?>

    <?php else: ?>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/business/business_user.js')); ?>"></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/general/general_user.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/general/general_quotes.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/general/general_questions.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/general/formbuilder.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    
    <!--autocomplete address-->
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
                   slidesPerView: 3,
                   spaceBetween: 20,
               },
               320: {
                   slidesPerView: 2,
                   spaceBetween: 30,
               }
           }

        });
        /*****code to hide next prev arrows from swiper slider*****/
        var swiper__slidecount = swiper.slides.length - 2;
        if (swiper__slidecount < 2) {
            $('.swiper-container').find('.swiper-button-prev,.swiper-button-next').remove();
        }
      </script>

      <script>
            var swiper2 = new Swiper('.swiper2', {
                slidesPerView: 8,
                spaceBetween: 10,
                //slidesPerGroup:8,

                pagination: {
                  el: '.swiper21',
                  clickable: true,
                  // renderBullet: function (index, className) {
                  //   return '<span class="' + className + '">' + (index + 1) + '</span>';
                  // },
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
            });

            /*****code to hide next prev arrows from swiper slider*****/
            var swiper__slidecount1 = swiper2.slides.length - 2;
            if (swiper__slidecount1 < 2) {
                $('.swiper2').find('.swiper-button-prev,.swiper-button-next').remove();
            }


        </script>

    <script>
      $(document).ready(function(){
         
          $('.tpicker').datetimepicker({
            format: 'HH:mm'
          });
         $('.dpicker').datepicker();
           
        });

          // var isLoop = true;
          // if($('.swiper-slide').length < 8) {
          //     isLoop = false;
          // }


          // var swiper1 = new Swiper('.swiper2', {
          //   slidesPerView: 8,
          //   spaceBetween: 10,
          //   slidesPerGroup:8,
          //   loop: isLoop,
          //  //loopFillGroupWithBlank: true,
          //   pagination: {
          //     el: '.swiper21',
          //     clickable: true,
          //     renderBullet: function (index, className) {
          //       return '<span class="' + className + '">' + (index + 1) + '</span>';
          //     },
          //   },
          //   breakpoints: {
          //       1199: {
          //           slidesPerView: 5,
          //           spaceBetween: 20,
          //       },
          //       992: {
          //           slidesPerView: 5,
          //           spaceBetween: 45,
          //       },
          //       767: {
          //           slidesPerView: 3,
          //           spaceBetween: 30,
          //       },

          //       640: {
          //           slidesPerView: 3,
          //           spaceBetween: 30,
          //       },
          //       420: {
          //           slidesPerView: 2,
          //           spaceBetween: 30,
          //       },
          //       320: {
          //           slidesPerView: 2,
          //           spaceBetween: 30,
          //       }
          //   }
          // });

          // /*****code to hide next prev arrows from swiper slider*****/
          // var swiper__slidecount1 = swiper1.slides.length - 2;
          // if (swiper__slidecount1 < 2) {
          //   $('.swiper2').find('.swiper-button-prev,.swiper-button-next').remove();
          // }


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

  var verifyCallback = function(response) {
    $("#recaptcha").html(response);
  };

  var widgetId2;
  var onloadCallback = function() {

  
    widgetId2 = grecaptcha.render(document.getElementById('example2'), {
        'sitekey': '6Ld0TZsUAAAAAODQp0M1xRBK2M8jrKw0mZ4efGXB',
        'callback': verifyCallback,
    });

  };

    </script>




</body>

</html>