@extends('layouts.dashboard_business')

@section('content')


<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
    <div><a href="JavaScript:;">Dashboard</a>/<span class="q_breadcrumb">Advertisement</span></div>
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
        <a href="javascript:;"><img src="{{ asset('img/arrow-left.png') }}"/></a>
          <h1>@php $now = new DateTime('now');@endphp
            @php $currentMonth =$now->format('F'); @endphp
            @php $year = $now->format('Y'); @endphp
            {{ $currentMonth }} {{ $year }}</h1>
        <a href="javascript:;"><img src="{{ asset('img/arrow-right.png') }}"/></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-6 padding_rt">
          <div class="dashboard_box">
            <a href="javascript:;" class="quote_requestbg">
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
          <a href="javascript:;" class="question_waiting_bg">
            <div class="box_heading">
              <h2>Quotes requests</h2>
              <h1>Quotes requests</h1>
              <p>with phone</p>
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
            <a href="javascript:;" class="interactions_today_bg">
              <div class="box_heading">
                <h2>Clicks on top ad</h2>
                <h1>Clicks on top ad</h1>
              </div>
              <div class="total_number">
                <h1>28</h1>
              </div>
                <div class="Qlink-nis"><p>28 NIS</p>
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
        <h1>In {{ $currentMonth }} {{ $year }} you spent <span>@if(isset($monthlyBudget['totalSpent'])){{$monthlyBudget['totalSpent']}}@endif NIS</span> and closed <span>3 deals.</span></h1>
        <p>Keep up the good work!</p>
      </div>
    </div>
  </div>
</div>
</div>
</section>
@endsection