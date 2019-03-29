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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/developer.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/glyphicon-datetimepicker.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" /> -->

    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

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

                        @if(Auth::guard('business_user')->check())

                        <li>
                            <a href="{{ url('/') }}"><img src="{{ asset('img/home.png') }}" />Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/business_user/business_dashboard') }}"><img src="{{ asset('img/dashboard.png') }}" />Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/business_user/quotes_questions') }}"><img src="{{ asset('img/quotes.png') }}" />Quotes</a>
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
                            <a href="{{ route('business_user.profile_setting') }}"><img src="{{ asset('img/profile.png') }}" />Profile and Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('business_user.logout') }}" class="logout"><img src="{{ asset('img/logout.png') }}" />Logout</a>
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
                        
                        @endif

                        
                    </ul>
                </div>

            <section class="second_tabbar">
                <div class="second_header">
                    <div class="menu_search">
                        <div class="second_menu">
                            <a href="javascript:;" onclick="openNav()"><img src="{{ asset('img/menu.png') }}" / class="img-fluid"></a>
                        </div>
                        <div class="search-input1">
                            <input type="search" placeholder="Search...">
                            <span>in Tel Aviv</span>
                            <img src="{{ asset('img/search.png') }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="second_header_logo"><a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" class="img-fluid" /></a></div>
                    <div class="second_header_links">
                        <a href="{{ route('business_user.register') }}" class="regidter_tab">Register</a>
                        <a href="javascript:;" class="signin_tab" data-toggle="modal" data-target="#login_business">Sign in</a>
                        <a href="javascript:;" class="add_budiness">Add business</a>
                    </div>
                </div>
            </section>

    <div class="content">
    <input type="hidden" id="home_url" value="{{ URL::asset('') }}">
    @yield('content')
    </div>
    <section class="yes_please_footer">
        <div class="footer_logo"><a href="{{ url('/') }}"><img src="{{ asset('img/footer_logo.png') }}" class="img-fluid" /></a></div>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> 

    
    <script type="text/javascript" src="{{ URL::asset('js/business/bu_registration.js') }}"></script>
    @if (Auth::guard('business_user')->check())
    <script type="text/javascript" src="{{ URL::asset('js/business/business_user.js') }}"></script>
    @endif
    <script>
        $(document).ready(function(){
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        // document.getElementById('moar').onclick = function() {
        //     var section = document.createElement('section');
        //     section.className = 'section--purple wow fadeInDown';
        //     this.parentNode.insertBefore(section, this);
        // };
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
