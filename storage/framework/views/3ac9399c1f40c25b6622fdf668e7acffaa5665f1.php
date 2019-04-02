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
    <link href="<?php echo e(URL::asset('css/dashboard.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/developer.css')); ?>" rel="stylesheet">
   <!--  <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/animate.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/root_size.css')); ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/swiper.css')); ?>" type="text/css">
   <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
 -->
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
        </ul>
    </div>

    <section class="second_tabbar">
        <div class="second_header">
            <div class="menu_search">
                <div class="second_menu">
                    <a href="javascript:;" onclick="openNav()"><img src="<?php echo e(asset('img/menu.png')); ?>" / class="img-fluid"></a>
                </div>
                <div class="search-input1">
                    <input type="search" placeholder="Search...">
                    <span>in Tel Aviv</span>
                    <img src="<?php echo e(asset('img/search.png')); ?>" class="img-fluid">
                </div>
            </div>
            <div class="second_header_logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.png')); ?>" class="img-fluid" /></a></div>
            <div class="second_header_links">
                <div class="username_list">
                    <div class="notification_sec">
                        <a href="javascript:;"><img src="<?php echo e(asset('img/notifications.png')); ?>"/>
                        <!-- <span>3</span> -->
                        </a>
                    </div>
                    <div class="messsage_sec">
                        <a href="javascript:;"><img src="<?php echo e(asset('img/messages_list.png')); ?>"/>
                        <!-- <span>7</span> -->
                        </a>
                    </div>
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

                            <p><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></p>
                            <?php else: ?>
                            <p>Firstname Lastname</p>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<input type="hidden" id="home_url" value="<?php echo e(URL::asset('')); ?>">
<input type="hidden" id="business_user_id" value="<?php echo e(Auth::guard('business_user')->user()->business_userid); ?>">
    <div class="content">
    <?php echo $__env->yieldContent('content'); ?>
    </div>
    <section class="yes_please_footer footer_for_dash">
        <div class="footer_logo for_dashboard_footer"><img src="<?php echo e(asset('img/footer_logo.pn')); ?>g" class="img-fluid" /></div>
        <div class="footer_link footer_dash_ul">
            <ul>
                <li><a href="javascript:;">Yes please</a></li>
                <li><a href="javascript:;"> Terms</a></li>
                <li><a href="javascript:;">Privacy policy</a></li>
                <li><a href="javascript:;">Contact us</a></li>
                <li><a href="javascript:;">Help</a></li>
            </ul>
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
                        <a href="javascript:;" class="fblogin"><img src="img/icon_F.png" class="img-fluid"/> Login with <b>Facebook</b></a>
                        <a href="javascript:;" class="googlelogin"><img src="img/google_plus.png" class="img-fluid"/> Login with <b>Google+</b></a>
                      </div>
                      <div class="login_fields">
                        <!-- <form id="sign_in_adm" method="POST" action="<?php echo e(route('business_user.login.submit')); ?>"> -->
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

    <!------Modal to display success message on profile setting page------>
    <div id="showsuccessmessage" class="modal fade" role="dialog">
        <input type="hidden" class="showmsg" data-show="<?php if(Session::has('message')) { ?> 1 <?php }?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                 <!-- <div class="modal-header">
                    <button type="button" class="close <?php if(Session::has('message')) { echo Session::get('alert-type', 'alert-info'); }?>" data-dismiss="modal">&times;</button>
                </div> -->
                <div class="modal-body">
                    <?php if(Session::has('message')): ?>
                    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary <?php if(Session::has('message')) { echo Session::get('alert-type', 'alert-info'); }?>">Redirect to..</button>
                </div>
            </div>
        </div>
    </div>

    <!------Modal to display popup to add template title----->

    <div class="modal fade" id="showtemplatetitle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="login_body_main">
                    <h1 class="template_title">Please enter template title</h1>
                    <div class="login_section">
                      
                      <div class="login_fields">
                        

                             
                            <div class="form-group col-md-12 col-12 padding_none">
                              
                              <input type="text" name="temp_title" class="form-control temp_title" maxlength="25" value="">

                              <span class="fill_fields email_business_error" role="alert" style="display:none;">
                              </span>
                            </div>
                            <div class="form-group col-md-12 col-12">
                            <div class="login_btn"><a><input type="submit" class="btn btn-primary templattitle_submit" value="Submit"></a></div>
                            </div>
                           
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
    

    <!------Modal to display all templates here----->
    

     <div class="modal fade" id="showalltemplates" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="template_table">
                    <table style="width:100%" id="all_quote_templates">
                        <tr class="template_head_tr">
                            <th>S.no</th>
                            <th>Template Title</th>
                            <th>Template Text</th>
                            <th>Action</th>
                        </tr>

                        <tr>
                            <td>S.no</td>
                            <td>Template Title</td>
                            <td>Template Text</td>
                            <td>Action</td>
                        </tr>

                        <tr>
                            <td>S.no</td>
                            <td>Template Title</td>
                            <td>Template Text</td>
                            <td>Action</td>
                        </tr>

                        <tr>
                            <td>S.no</td>
                            <td>Template Title</td>
                            <td>Template Text</td>
                            <td>Action</td>
                        </tr>
                    </table>
                  </div>
                </div>

            </div>
        </div>
    </div>

    <!---modal to open big image --->
    <div class="modal fade" id="showBigImageModalBusiness" role="dialog">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>  -->
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> 
    <script type="text/javascript" src="<?php echo e(URL::asset('js/wow.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/dropzone.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/business/business_user.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/business/business_quotes.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/swiper.js')); ?>" type="text/javascript"></script>

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

            var attr = $('.showmsg').attr('data-show');

            // For some browsers, `attr` is undefined; for others,
            // `attr` is false.  Check for both.
            if (typeof attr !== typeof undefined && attr !== false && attr !== '') {
                 $('#showsuccessmessage').modal('show');
            }

            $('#datetimepicker2').datetimepicker({
                locale: 'ru'
            });
        });

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

        function readURLprofile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $("#button").click(function() {
            $('html, body').animate({
                scrollTop: $(".second_tabbar").offset().top
            }, 800);
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</body>

</html>
