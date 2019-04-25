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
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/developer.css') }}" rel="stylesheet">
    <!-- <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/root_size.css') }}" type="text/css">
    <?php  
    if (strpos($_SERVER['REQUEST_URI'], "advertisement_top_ads") !== false)
    {
        $page_type ='top_ads';
    }
    else if (strpos($_SERVER['REQUEST_URI'], "events") !== false)
    {
        $page_type ='events';
    }
    ?>
    @if(!isset($page_type) || (isset($page_type) && $page_type == 'top_ads'))
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.ui.css') }}" type="text/css">
    @endif
    @if(!isset($page_type) || (isset($page_type) && $page_type == 'events'))
    <link rel="stylesheet" href="{{ URL::asset('css/fullcalendar.min.css') }}" type="text/css">
    @endif
  <!--    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}" type="text/css"> -->
    
   
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/dataTables.min.css') }}" type="text/css"> -->
    
   <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
 -->
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
                    <a href="{{ url('/') }}"><img src="{{ asset('img/home.png') }}" />Home</a>
                </li>
                <li>
                    <a href="{{ url('/business_user/business_dashboard') }}"><img src="{{ asset('img/dashboard.png') }}" />Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('/business_user/quotes_questions') }}"><img src="{{ asset('img/quotes.png') }}" />Quotes</a>
                </li>
                <li>
                    <a href="{{ url('/business_user/quotes_questions?tab=ques') }}"><img src="{{ asset('img/question.png') }}" />Questions</a>
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
            </ul>
        </div>

        <section class="second_tabbar second_tabbar-fix_header">
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
                  <div class="username_list">
                    <div class="notification_sec">
                      <a href="javascript:;"><img src="{{ asset('img/notifications.png') }}"/>
                      <!-- <span>3</span> -->
                    </a>
                    </div>
                    <div class="messsage_sec">
                      <a href="javascript:;"><img src="{{ asset('img/messages_list.png') }}"/>
                      <!-- <span>7</span> -->
                    </a>
                    </div>
                    <div class="user_profile">
                      <a href="javascript:;">
                        @if (Auth::guard('business_user')->check())
                        @php
                        $bus_user_id = Auth::guard('business_user')->user()->business_userid;
                        $img_url = Auth::guard('business_user')->user()->image_name;
                        @endphp

                        @if($img_url)
                        <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}">
                        @else
                        <img src="{{ asset('img/user_placeholder.png') }}"/>
                        @endif

                        <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                        @else
                        <p>Firstname Lastname</p>
                        @endif
                    </a>
                    </div>
                  </div>
                </div>
            </div>
        </section>


    <input type="hidden" id="home_url" value="{{ URL::asset('') }}">
    <div class="content content-fix_header">
    @yield('content')
    </div>
    
    <section class="cookies">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <div class="cookies_main"><!-- This website use cookies to provide better service. You can read about it in our <a href="javascript:;"> Privacy policy.</a> <span class="close_cookie"><img src="{{ asset('img/cookie_close.png') }}"/></span> -->@include('cookieConsent::index')</div>
          </div>
        </div>
      </div>
    </section>
    <section class="yes_please_footer footer_for_dash">
        <div class="footer_logo for_dashboard_footer"><img src="{{ asset('img/footer_logo.pn') }}g" class="img-fluid" /></div>
        <div class="footer_link footer_dash_ul">
            <ul>
                <li><a href="javascript:;">Yes please</a></li>
                <li><a href="javascript:;"> Terms</a></li>
                <li><a href="javascript:;">Privacy policy</a></li>
                <li><a href="javascript:;">Contact us</a></li>
                <li><a href="javascript:;">Help</a></li>
            </ul>
        </div>
        <!-- <div class="footer_notification">
            <div class="cross-button">x</div>    
            <h1>Registration is completed and here you can lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
        </div> -->
        <div class="footer_notification_for_mobile">
            <div class="cross-button">x</div> 
            <h1>Registration is completed and here you can lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
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
                        <!-- <form id="sign_in_adm" method="POST" action="{{ route('business_user.login.submit') }}"> -->
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>  -->
    <script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/business/business_user.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/business/bu_advertisement.js') }}"></script>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css"> -->
    <?php  if (strpos($_SERVER['REQUEST_URI'], "advertisement_top_ads") !== false){
        $page_type ='top_ads';
    }
    if (strpos($_SERVER['REQUEST_URI'], "camp_detail") !== false){
        $page_type ='camp_detail';
    }
    if (strpos($_SERVER['REQUEST_URI'], "events") !== false){
        $page_type ='events';
    }
    ?>
    @if(isset($page_type) && ($page_type == 'top_ads' || $page_type == 'camp_detail'))
     <link rel="stylesheet" href="{{ URL::asset('css/dataTables.min.css') }}" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('js/business/dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.ui.js') }}"></script>
   
    <!-- <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script> -->
    @endif
    @if(isset($page_type) && ($page_type == 'events' || $page_type == 'events'))
  
     <script src="{{ URL::asset('js/cal_moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script> 
   
    <script src="{{ URL::asset('js/event.js') }}"></script>
   
    <!-- <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script> -->
    @endif
    
   
    

    <script type="text/javascript">
    $(document).ready(function () {

        if(window.location.href.indexOf("advertisement_top_ads") > -1) {

           $('#comp_table').dataTable({searching: false, paging: false, info: false});
           $('#clicks_table').dataTable({searching: false, paging: false, info: false});
           
        }
        if(window.location.href.indexOf("camp_detail") > -1) {

           
           $('#single_click_table').dataTable({searching: false, paging: false, info: false});
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
</body>

</html>
