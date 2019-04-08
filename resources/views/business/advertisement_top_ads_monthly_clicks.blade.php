
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


