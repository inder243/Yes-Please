@extends('layouts.ypapp')

@section('content')
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="yes_please_logo wow swing" data-wow-duration="1.5s">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="search-section">
            <div class="yesplease_search-section">
                <h1 class="wow fadeInUp" data-wow-duration=".5s">הבוט העצהמ ליחתמ לכה</h1>
                <div class="search-input wow fadeInUp" data-wow-duration="1s">
                    <input type="search" placeholder="Search...">
                    <span>in Tel Aviv</span>
                    <img src="{{ asset('img/search.png') }}" class="img-fluid">
                </div>
            </div>

        </div>
        <div class="small_icons wow fadeIn" data-wow-duration="2s"><img src="{{ asset('img/banner_icon.jpg') }}" class="img-fluid"></div>
        <div class="bannerlogo wow zoomIn" data-wow-duration=".5s"><img src="{{ asset('img/banner-logo.png') }}" class="img-fluid"></div>
        <div class="down_errow bounce">
            <a href="javascript:;" id="button"><img src="{{ asset('img/down.png') }}"></a>
        </div>
    </section>

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
            <div class="second_header_logo wow zoomIn" data-wow-duration="1s"><a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" class="img-fluid" /></a></div>
             <div class="second_header_links for_main_page_header_link">

                @if (Auth::guard('general_user')->check())
                <!-- <p>{{ Auth::guard('general_user')->user()->first_name }} {{ Auth::guard('general_user')->user()->last_name }}</p> -->
                @elseif(Auth::guard('business_user')->check())
               <!--  <p>{{ Auth::guard('business_user')->user()->first_name }} {{ Auth::guard('business_user')->user()->last_name }}</p> -->
                @else
                <a href="{{ route('business_user.beforelogin') }}" class="signin_tab for_business_tab for_min_pagebusiness">Business</a>
                <a href="{{ route('general_user.beforelogin') }}" class="add_budiness for_min_user">Users</a>
                @endif
            </div>
        </div>
    </section>
    <section class="yep_section">
        <div class="yep_section_bg">
                        <div class="product_detail">
                            <div class="mian_logo wow zoomInDown" data-wow-duration="1.5s"><img src="{{ asset('img/yep_color.png') }}" /></div>
                            <div class="finance wow flipInX" data-wow-duration="1.5s">
                                <a href="javascript:;" /><span class="fiance_icon"><img src="{{ asset('img/finance.png') }}" class="img-fluid finance_img"/><img src="{{ asset('img/finance_active.png') }}" class="img-fluid finance_active"/> </span><span class="catagory_name">Finance</span></a>
                            </div>
                            <div class="energy">
                                <a href="javascript:;" /><span class="energy_icon"><img src="{{ asset('img/energy.png') }}" class="img-fluid energy_img"/><img src="{{ asset('img/energy_active.png') }}" class="img-fluid energy_active"/> </span><span class="energy_name">Energy</span></a>
                            </div>
                            <div class="travel wow zoomIn" data-wow-duration="1s">
                                <a href="javascript:;" /><span class="travel_icon"><img src="{{ asset('img/travel.png') }}" class="img-fluid travel_img"/><img src="{{ asset('img/travel_active.png') }}" class="img-fluid travel_active"/> </span><span class="travel_name">Travel</span></a>
                            </div>
                            <div class="telco">
                                <a href="javascript:;" /><span class="telco_icon"><img src="{{ asset('img/telco.png') }}" class="img-fluid telco_img"/><img src="{{ asset('img/telco_active.png') }}" class="img-fluid telco_active"/> </span><span class="telco_name">Telco</span></a>
                            </div>
                            <div class="more wow flipInX" data-wow-duration="1.5s">
                                <a href="javascript:;" /><span class="more_icon"><img src="{{ asset('img/more.png') }}" class="img-fluid more_img"/><img src="{{ asset('img/more_active.png') }}" class="img-fluid more_active"/> </span><span class="more_name">More</span></a>
                            </div>
                            <div class="eNews">
                                <a href="javascript:;" /><span class="eNews_icon"><img src="{{ asset('img/enews.png') }}" class="img-fluid eNews_img"/><img src="{{ asset('img/enews_active.png') }}" class="img-fluid eNews_active"/> </span><span class="eNews_name">eNews</span></a>
                            </div>
                            <div class="entertainment wow zoomIn" data-wow-duration="1s">
                                <a href="javascript:;" /><span class="entertainment_icon"><img src="{{ asset('img/entertainment.png') }}" class="img-fluid entertainment_img"/><img src="{{ asset('img/entertainment_active.png') }}" class="img-fluid entertainment_active"/> </span><span class="entertainment_name">Entertain-<br>ment</span></a>
                            </div>
                            <div class="category">
                                <a href="javascript:;" /><span class="category_icon"><img src="{{ asset('img/category.png') }}" class="img-fluid category_img"/><img src="{{ asset('img/category_active.png') }}" class="img-fluid category_active"/> </span><span class="category_name">Category</span></a>
                            </div>
                        </div>
                    </div>
                
    </section>

    <section class="cookies">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <div class="cookies_main"><!-- This website use cookies to provide better service. You can read about it in our <a href="javascript:;"> Privacy policy.</a> <span class="close_cookie"><img src="{{ asset('img/cookie_close.png') }}"/></span> -->@include('cookieConsent::index')</div>
          </div>
        </div>
      </div>
    </section>
@endsection