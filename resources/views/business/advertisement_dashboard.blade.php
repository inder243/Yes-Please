@extends('layouts.dashboard_business')

@section('content')

<div class="maindivForSections">
  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
      <div><a href="{{ url('/business_user/business_dashboard') }}">Dashboard </a>/<span class="q_breadcrumb">Advertisement</span></div>
      <div class="edit_budgets">
      <h1> @if(isset($monthlyBudget['updated_wallet_amount'])){{$monthlyBudget['updated_wallet_amount']}}@endif NIS left</h1>
      <a href="javascript:;">Edit budget</a>
      </div>
    </div>
  </section>
  <section class="dashboard_grid">
    <div class="container-fluid">
      <div class="dashboard_section">
        <h1>Advertisement</h1>
        <div class="month_view">
          <div class="month_main">
            @php $dateObj   = DateTime::createFromFormat('!m', $monthlyBudget['m']);@endphp
            @php $currentMonth = $dateObj->format('F');@endphp
            @php $year = $monthlyBudget['y']; @endphp
            @php $fulldate = $monthlyBudget['y'].'-'.$monthlyBudget['m']; @endphp
            @php $nextMonthTs = strtotime($fulldate.' +1 month');@endphp
            @php $prevMonthTs = strtotime($fulldate.' -1 month');@endphp
            @php $nextMonth = date('m', $nextMonthTs);@endphp
            @php $prevMonth = date('m', $prevMonthTs);@endphp
            @php $nextYear = date('Y', $nextMonthTs);@endphp
            @php $prevYear = date('Y', $prevMonthTs);@endphp
            <a href="javascript:;" onclick="getOtherMonthData('{{$prevMonth}}','{{$prevYear}}')"><img src="{{ asset('img/arrow-left.png') }}"/></a>
              <h1>
                {{ $currentMonth }} {{ $year }}
            </h1>
            <a href="javascript:;" onclick="getOtherMonthData('{{$nextMonth}}','{{$nextYear}}')"><img src="{{ asset('img/arrow-right.png') }}"/></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-6 padding_rt">
              <div class="dashboard_box">
                
                <a href="{{ url('/business_user/quotes_questions?month='.$monthlyBudget['month'].'&type=1') }}" class="quote_requestbg">
                  <div class="box_heading">
                    <h2>Quotes requests</h2>
                    <h1>Quotes requests</h1>
                    <p>with phone</p>
                  </div>
                  <div class="total_number">
                    <h1>@if(isset($monthlyBudget['countOfBidWithPh'])){{$monthlyBudget['countOfBidWithPh']}}@endif</h1>
                  </div>
                  <div class="Qlink-nis"><p>@if(isset($monthlyBudget['sumOfbidWithPh'])){{$monthlyBudget['sumOfbidWithPh']}}@endif NIS</p></div>
                  <div class="quote_req_img"><img src="{{ asset('img/quote_req.png') }}"/></div>
               </a>
              </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
              <a href="{{ url('/business_user/quotes_questions?month='.$monthlyBudget['month'].'&type=2') }}" class="question_waiting_bg">
                <div class="box_heading">
                  <h2>Quotes requests</h2>
                  <h1>Quotes requests</h1>
                  <p>without phone</p>
                </div>
                <div class="total_number">
                  <h1>@if(isset($monthlyBudget['countOfBidWithoutPh'])){{$monthlyBudget['countOfBidWithoutPh']}}@endif</h1>
                </div>
                <div class="Qlink-nis"><p>@if(isset($monthlyBudget['sumOfbidWithoutPh'])){{$monthlyBudget['sumOfbidWithoutPh']}}@endif NIS</p></div>
                <div class="quote_req_img"><img src="{{ asset('img/question_waiting.png') }}"/></div>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-6 padding_rt">
          <div class="dashboard_box">
            <a href="javascript:;" class="budget_left_bg">
              <div class="box_heading">
                <h2>Phone calls</h2>
                <h1>Phone calls</h1>
              </div>
              <div class="total_number">
                <h1>5</h1>
              </div>
              <div class="Qlink-nis"><p>21 NIS</p></div>
              <div class="quote_req_img"><img src="{{ asset('img/phone-icon.png') }}"/></div>
            </a>
          </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
                <a href="{{url('/business_user/advertisement_top_ads')}}" class="interactions_today_bg">
                  <div class="box_heading">
                    <h2>Clicks on top ad</h2>
                    <h1>Clicks on top ad</h1>
                  </div>
                  <div class="total_number">
                    <h1>@if(isset($monthlyBudget['countOfTopAd'])){{$monthlyBudget['countOfTopAd']}}@endif</h1>
                  </div>
                    <div class="Qlink-nis"><p>@if(isset($monthlyBudget['sumOfTopAd'])){{$monthlyBudget['sumOfTopAd']}}@endif NIS</p>
                      <span>Start campaign</span>
                    </div>
                  <div class="quote_req_img"><img src="{{ asset('img/tap-addicon.png') }}"/></div>
                </a>
            </div>
          </div>
      </div>
      <div class="row second_row">
        <div class="col-md-3 col-6 padding_rt">
          <div class="dashboard_box">
            <a href="javascript:;" class="member_bg">
              <div class="box_heading">
                <h2>Clicks on products</h2>
                <h1>Clicks on products</h1>
              </div>
              <div class="total_number">
                <h1>28</h1>
              </div>
              <div class="Qlink-nis"><p>28 NIS</p>
                <span>Promote product</span>
              </div>
              <div class="quote_req_img sec_row_img"><img src="{{ asset('img/tap-addicon.png') }}"/></div>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="t-detail">
            <h1>In {{ $currentMonth }} {{ $year }} you spent <span>@if(isset($monthlyBudget['totalSpent'])){{$monthlyBudget['totalSpent']}}@endif NIS</span> and closed <span>@if(isset($monthlyBudget['closedDeals'])){{$monthlyBudget['closedDeals']}}@endif deals.</span></h1>
            <p>Keep up the good work!</p>
          </div>
        </div>
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
</div>
@endsection