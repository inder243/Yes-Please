@extends('layouts.dashboard_business')
@section('content')
  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
      <div><a href="{{ url('/business_user/business_dashboard') }}">Dashboard</a>/<a href="{{ url('/business_user/advertisement_dashboard') }}">Advertisement Dashboard</a>/<a href="{{ url('/business_user/advertisement_top_ads') }}">Top ads</a> / <span class="q_breadcrumb">@if(isset($campaigns) && !empty($campaigns) && !empty($campaigns[0]['name'])){{$campaigns[0]['name']}}@endif</span></div>
      <div class="setup_things test-campign">
        <a href="JavaScript:;" onclick="startCampaign('{{$campaigns[0]['id']}}')"><img src="{{ asset('img/start.png') }}"/>Start</a>
        <a href="JavaScript:;" onclick="endCampaign('{{$campaigns[0]['id']}}')"><img src="{{ asset('img/find.png') }}"/>End</a>
        <a href="JavaScript:;"  onclick="pauseCampaign('{{$campaigns[0]['id']}}')" class="pause_btn"><img src="{{ asset('img/pause.png') }}"/>Pause</a></div>
      </div>
  </section>
  <section class="advertisment_section">
        <div class="advtisment_main">
          <h1>@if(isset($campaigns) && !empty($campaigns) && !empty($campaigns[0]['name'])){{$campaigns[0]['name']}}@endif</h1>
        </div>
        <div class="container pro-module-feature">
          <div class="row">
            <div class="col-12">
              <div class="campagin_table">
                <table role="table">
                  <thead role="rowgroup">
                    <tr role="row" class="table_heading">
                      <th role="columnheader">Status</th>
                      <th role="columnheader">Budget spent</th>
                      <th role="columnheader">Impressions</th>
                      <th role="columnheader">Clicks </th>
                      <th role="columnheader">Start date</th>
                      <th role="columnheader">End date </th>
                      <th role="columnheader">PPC bid</th>
                      <th role="columnheader">Daily budget</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    @if(isset($campaigns) && !empty($campaigns) && !empty($campaigns[0]))
                    <tr role="row">
                      @if($campaigns[0]['status']==1)
                      @php $sts = "running"; @endphp 
                      @elseif($campaigns[0]['status']==2)
                      @php $sts = "paused"; @endphp 
                      @else 
                      @php $sts = "ended"; @endphp 
                      @endif
                      @php $time = $campaigns[0]['created_at']->format('Y-m-d'); @endphp
                      <td data-Name="Status" role="cell">{{$sts}}</td>
                      <td data-Name="Budget spent" role="cell">{{$campaigns[0]['trans_count']}}</td>
                      <td data-Name="Impressions" role="cell">{{$campaigns[0]['impressions_count']}}</td>
                      <td data-Name="Clicks" role="cell">{{$campaigns[0]['clicks_count']}}</td>
                      <td data-Name="Start date" role="cell">{{$time}}</td>
                      <td data-Name="End date" >{{$campaigns[0]['end_date']}}</td>
                      <td data-Name="PPC bid">{{$campaigns[0]['pay_per_click']}}</td>
                      <td data-Name="Daily budget" >{{$campaigns[0]['daily_budget']}}</td>
                    </tr>
                    @endif
                  </tbody>
                  </table>
              </div>
              <div class="capaign_analysis">

              </div>
              <div class="month-clicks">
                <h1>Clicks</h1>

                    <div class="campagin_table time-month">
                      <table role="table" id="single_click_table">
                        <thead role="rowgroup">
                          <tr role="row" class="table_heading">
                            <th role="columnheader">Time</th>
                            <th role="columnheader"> Campaign name</th>
                            <th role="columnheader">Category</th>
                            <th role="columnheader"> Search term (if available) </th>
                            <th role="columnheader">Cost</th>
                          </tr>
                        </thead>
                         @php $sumofcost = 0; @endphp
                        @if(isset($clicks) && (!empty($clicks)) && (count($clicks)>0))
                        <tbody role="rowgroup">
                          @foreach($clicks as $click)
                          @php $sumofcost = $sumofcost+$click['amount']; @endphp
                          <tr role="row">
                            @php $time = $click['created_at']->format('H:i'); @endphp
                            <td data-Name="Time" role="cell">{{$time}}</td>
                            <td data-Name="Campaign name" role="cell">{{$click['camp_det_click']['name']}}</td>
                            <td data-Name="Category" role="cell">{{$click['cat_det_click']['category_name']}}</td>
                            <td data-Name="Search term " role="cell">----</td>
                            <td data-Name="Cost" >{{$click['amount']}} NIS</td>
                          </tr>
                          @endforeach
                        </tbody>
                        @endif
                        </table>
                    </div>

                <div class="clicks_ins">
                <h1>{{count($clicks)}} clicks </h1>
                <h1>{{$sumofcost}} NIS</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        <!-- Modal -->
<div class="modal fade" id="topad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ad_header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{url('business_user/save_campaign')}}" id="form_add_topad">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-body ad-header-body">
            <div class="alert alert-success" role="alert" style="display:none">
            
            </div>
            <div class="alert alert-danger" role="alert" style="display:none">
            
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="inputEmail4">Name</label>
                  <input type="text" class="form-control" id="inputEmail4" required="" name="campname">
                </div>
            </div>
            <div class="categories-list">

              <label for="inputEmail4">Categories</label>
              @if(isset($selectedcats) && !empty($selectedcats))
              <ul class="categorylist" id="catlist">
                @foreach($selectedcats as $selectedcat)
                <li>
                  <div class="formcheck forcheckbox langcheck">
                      <label>
                         <input type="checkbox" class="radio-inline" name="selected_cats[]" value="{{$selectedcat['category_id']}}">
                          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                          <p>{{$selectedcat['buser_cat']['category_name']}}</p>
                      </label>
                  </div>
                </li>
                @endforeach
              </ul>
              @endif
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="payperclick">Pay per click bid (NIS)</label>
                  <input type="number" class="form-control" id="payperclick" required="" name="payperclick">
                  <span>Suggested bid - 1.3 NIS</span>
                </div>
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="dbudget">Daily budget</label>
                  <input type="number" class="form-control" id="dbudget" required="" name="dbudget">
                  <span>Minimum - 10 NIS</span>
                </div>
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="edate">End date</label>
                  <input type="text" class="form-control" id="edate" required="" name="enddate">
                  
                </div>
            </div>
            <div class="start-btn"><input type="submit" value="Start" id="form_add_topad_submit"></div>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal -->
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