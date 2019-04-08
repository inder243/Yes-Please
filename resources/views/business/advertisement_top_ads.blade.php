@extends('layouts.dashboard_business')
@section('content')
  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
    <div><a href="{{ url('/business_user/business_dashboard') }}">Dashboard</a>/<a href="{{ url('/business_user/advertisement_dashboard') }}">Advertisement Dashboard</a>/<span class="q_breadcrumb">Top ads</span></div>
    <div class="setup_things adv-add"><a href="javascript:;" data-toggle="modal" data-target="#topad">Add</a></p></div>
    </div>
  </section>
  <section class="advertisment_section">
    <div class="advtisment_main">
      <h1>Click on top ad</h1>
      <h2>Campaigns</h2>
    </div>
    <div class="container pro-module-feature">
      <div class="row">
        <div class="col-12">
          @if(count($campaigns)<=0))
          <div class="no-data">
            <h2>You don't have any Campaigns yet, please add Campaign</h2>
            <div class="add_c_btn adv-add">
             <a href="javascript:;" data-toggle="modal" data-target="#topad">Add</a>
            </div>
          </div>
          @endif
          @if(isset($campaigns) && (!empty($campaigns)) && (count($campaigns)>0))
          <div class="campagin_table">

            <table role="table" id="comp_table">
              <thead role="rowgroup">
                <tr role="row" class="table_heading">
                  <th role="columnheader">Name</th>
                  <th role="columnheader">Budget spent</th>
                  <th role="columnheader">Impressions</th>
                  <th role="columnheader">Clicks </th>
                  <th role="columnheader">Status</th>
                  <th role="columnheader">Actions</th>
                </tr>
              </thead>
              @php $sumofspent = 0; @endphp
              @if(isset($campaigns) && (!empty($campaigns)))
              <tbody role="rowgroup">

                @foreach($campaigns as $campaign)

                  @php $sumofspent = $sumofspent+$campaign['trans_count']; @endphp
                <tr role="row">
                  <td role="cell">{{$campaign['name']}}</td>
                  <td data-Name="Budget spent" role="cell">{{$campaign['trans_count']}}</td>
                  <td data-Name="Impressions" role="cell">{{$campaign['impressions_count']}}</td>
                  <td data-Name="Clicks" role="cell">{{$campaign['clicks_count']}}</td>
                  @if($campaign['status']==1) 
                  @php $status="running"; @endphp
                  @elseif($campaign['status']==2) 
                  @php $status="paused"; @endphp
                  @elseif($campaign['status']==3) 
                  @php $status="ended"; @endphp
                  @endif
                  <td data-Name="Status" role="cell" class="{{$status}}"><a href="javascript:;">{{$status}}</a></td>
                  @if($campaign['status']==1 || $campaign['status']==2) 
                  <td data-Name="Actions" class="edit"><a href="javascript:;">Edit</a></td>
                  @elseif($campaign['status']==3) 
                  <td data-Name="Actions" class="ended-red"><a href="javascript:;">Ended</a></td>
                  @endif
                  
                </tr>
                @endforeach
              </tbody>
              @endif
              </table>
          </div>
          <div class="capaign_analysis">
            <div class="total-campaign">
              <h1>{{count($campaigns)}} campaigns </h1>
            </div>
            <div class="total-ins">
              <h1>{{$sumofspent}} NIS</h1>
            </div>
          </div>
          @endif
          <div class="month-clicks">
            <h1>Clicks</h1>
            <div class="month_view">
              
              <div class="month_main">
                @php $dateObj   = DateTime::createFromFormat('!m', $currentMonth);@endphp
                @php $currentMonth = $dateObj->format('F');@endphp
                @php $nextfulldate = date('Y-m-d', strtotime('+1 day', strtotime($fulldate))) @endphp
                @php $prevfulldate = date('Y-m-d', strtotime('-1 day', strtotime($fulldate))) @endphp
               
                <a href="javascript:;" onclick="getOtherMonthClicks('{{$prevfulldate}}')"><img src="{{ asset('img/arrow-left.png') }}"/></a>
                <h1>
                  {{ $currentMonth }} {{$currentDay}}, {{ $currentYear }}
                </h1>
                <a href="javascript:;" onclick="getOtherMonthClicks('{{$nextfulldate}}')"><img src="{{ asset('img/arrow-right.png') }}"/></a>
              </div>
            </div>
            @if((count($clicks)<=0))
            <div class="no-data_month">
                  <h2>No Clicks on this day.</h2>
            </div>
            @endif
                @if(isset($clicks) && (!empty($clicks)) && (count($clicks)>0))
                <div class="campagin_table time-month">
                  <table role="table" id="clicks_table">
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
                    @if(isset($clicks) && (!empty($clicks)))
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
               @endif
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