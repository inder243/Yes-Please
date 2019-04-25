@extends('layouts.dashboard_business')
@section('content')
  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
      <div>
        <a href="{{ url('/business_user/business_dashboard') }}">Dashboard</a>/<span class="q_breadcrumb">Schedule</span>
      </div>
      <div class="setup_things adv-add">
        <a href="javascript:;" data-toggle="modal" data-target="#topad">Add</a>
      </div>
    </div>
  </section>
  <section class="advertisment_section">
    <div class="advtisment_main">
      <h1>Schedule</h1>
    </div>
    <div class="container pro-module-feature">
      <div class="row">
        <div class="col-12">
          <div class="event_table">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection