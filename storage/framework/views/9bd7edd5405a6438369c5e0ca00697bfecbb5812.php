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
    <link href="<?php echo e(URL::asset('css/developer.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/animate.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/root_size.css')); ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

</head>

<body>
    <div class="pre_loader pre_loader_new" style="display:none;">
        <div class="pre_loader_inner">
        <img id="loading-image" src="<?php echo e(asset('img/pre_loader.svg')); ?>"/>
        </div>
    </div>
    
    <header>
        <div class="yesplease_header">
            <nav class="side_bar_menu">
                <a href="javascript:;" onclick="openNav()" class="header_menu_toggle">
                    <img src="<?php echo e(asset('img/menu.png')); ?>" class="img-fluid" />
                </a>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="<?php echo e(asset('img/menu-red.png')); ?>" class="img-fluid" /></a>
                    <ul class="custom_sidebar_menu">
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/home.png')); ?>" />Home</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/dashboard.png')); ?>" />Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo e(asset('img/quotes.png')); ?>" />Quotes</a>
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
                            <a href="#"><img src="<?php echo e(asset('img/profile.png')); ?>" />Profile and Settings</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('business_user.logout')); ?>" class="logout"><img src="<?php echo e(asset('img/logout.png')); ?>" />Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="header_links">
                <a href="<?php echo e(route('business_user.register')); ?>" class="register">Register</a>
                <a href="javascript:;" class="login" data-toggle="modal" data-target="#login_business" data-backdrop="static" data-keyboard="false">Sign in</a>
            </div>
        </div>
    </header>

    <div class="content">
    <?php echo $__env->yieldContent('content'); ?>
    </div>
    <section class="yes_please_footer">
        <div class="footer_logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/footer_logo.png')); ?>" class="img-fluid" /></a></div>
        <div class="footer_link">
            <ul>
                <li><a href="javascript:;">Yes please</a></li>
                <li><a href="javascript:;"> Terms</a></li>
                <li><a href="javascript:;">Privacy policy</a></li>
                <li><a href="javascript:;">Contact us</a></li>
                <li><a href="javascript:;">Help</a></li>
            </ul>
        </div>
    </section>

    
    <!----- Login Modal for business user -->
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> 
    <script type="text/javascript" src="<?php echo e(URL::asset('js/wow.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/business/business_user.js')); ?>"></script>
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
</body>

</html>
