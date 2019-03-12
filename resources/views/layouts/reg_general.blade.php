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
                        <li>
                            <a href="#"><img src="{{ asset('img/home.png') }}" />Home</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/dashboard.png') }}" />Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/quotes.png') }}" />Quotes</a>
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
                <a href="{{ route('general_user.register') }}" class="regidter_tab">Register</a>
                <a href="javascript:;" class="signin_tab" data-toggle="modal" data-target="#general_login">Sign in</a>
                <a href="javascript:;" class="add_budiness">Add business</a>
            </div>
        </div>
    </section>


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

<!-- Forgot Password Popup --> 
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/general_user.js') }}"></script>
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
    </script>
</body>

</html>