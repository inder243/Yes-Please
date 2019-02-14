@extends('layouts.dashboard_business')

@section('content')

<section class="register_step_1">
    <div class="breadcrumb register_breadcrumb"><span>Dashboard</span></div>
    </section>
    <section class="dashboard_grid">
      <div class="container-fluid">
      <div class="dashboard_section">
        <h1>Dashboard</h1>
        <div class="row">
          <div class="col-md-3 col-6 padding_rt">
            <div class="dashboard_box">
              <a href="javascript:;" class="quote_requestbg">
                <div class="box_heading">
                  <h2>Quotes requests</h2>
                  <h1>Quotes requests</h1>
                </div>
                <div class="total_number">
                  <h1>1</h1>
                </div>
                <div class="Qlink"><p>Quote</p></div>
                <div class="quote_req_img"><img src="{{ asset('img/quote_req.png') }}"/></div>
              </a>
            </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
              <a href="javascript:;" class="question_waiting_bg">
                <div class="box_heading">
                  <h2>Questions waiting</h2>
                  <h1>Questions waiting</h1>
                </div>
                <div class="total_number">
                  <h1>3</h1>
                </div>
                <div class="Qlink"><p>Reply</p></div>
                <div class="quote_req_img"><img src="{{ asset('img/question_waiting.png') }}"/></div>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-6 padding_rt">
            <div class="dashboard_box">
              <a href="javascript:;" class="budget_left_bg">
                <div class="box_heading">
                  <h2>Budget left</h2>
                  <h1>Budget left</h1>
                </div>
                <div class="total_number">
                  <h1>$95</h1>
                </div>
                <div class="Qlink"><p>Manage</p></div>
                <div class="quote_req_img"><img src="{{ asset('img/budget_left.png') }}"/></div>
              </a>
            </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
              <a href="javascript:;" class="interactions_today_bg">
                <div class="box_heading">
                  <h2>Interactions today</h2>
                  <h1>Interactions today</h1>
                </div>
                <div class="total_number">
                  <h1>28</h1>
                </div>
                <div class="Qlink"><p>View</p></div>
                <div class="quote_req_img"><img src="{{ asset('img/interaction.png') }}"/></div>
              </a>
            </div>
          </div>
        </div>
        <div class="row second_row">
          <div class="col-md-3 col-6 padding_rt">
            <div class="dashboard_box">
              <a href="javascript:;" class="member_bg">
                <div class="box_heading">
                  <h2>Members</h2>
                  <h1>Members</h1>
                </div>
                <div class="total_number">
                  <h1>963</h1>
                </div>
                <div class="Qlink"><p>Manage</p></div>
                <div class="quote_req_img sec_row_img"><img src="{{ asset('img/member.png') }}"/></div>
              </a>
            </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
              <a href="javascript:;" class="Events_bg">
                <div class="box_heading">
                  <h2>Events</h2>
                  <h1>Events</h1>
                </div>
                <div class="total_number">
                  <h1>52</h1>
                </div>
                <div class="Qlink"><p>Schedule</p></div>
                <div class="quote_req_img sec_row_img"><img src="{{ asset('img/events.png') }}"/></div>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-6 padding_rt">
            <div class="dashboard_box">
              <a href="javascript:;" class="New_messages_bg">
                <div class="box_heading">
                  <h2>New messages</h2>
                  <h1>New messages</h1>
                </div>
                <div class="total_number">
                  <h1>4</h1>
                </div>
                <div class="Qlink"><p>View</p></div>
                <div class="quote_req_img sec_row_img"><img src="{{ asset('img/new_message.png') }}"/></div>
              </a>
            </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
              <a href="javascript:;" class="your_business_bg">
                <div class="box_heading">
                  <h2>Your business is not verified</h2>
                  <h1>Your business is not verified</h1>
                </div>
                <div class="total_number">
                  <h1>i</h1>
                </div>
                <div class="Qlink"><p>Click to verify</p></div>
                <div class="quote_req_img sec_row_img"><img src="{{ asset('img/your_businees.png') }}"/></div>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="dashboard_buttons">
              <div class="profile_setting"><a href="javascript:;">Profile and Settings</a></div>
              <div class="Pricelist"><a href="javascript:;">Pricelist</a></div>
              <div class="Products"><a href="javascript:;">Products</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
@endsection