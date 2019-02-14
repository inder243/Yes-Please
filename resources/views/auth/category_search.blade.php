<?php $arr = json_decode($categories); ?>
@if(!empty($arr))
    @foreach($categories as $key=>$value)
        <li><a href="javascript:;" id="{{$value['category_id']}}" onclick="categories_select(this)" data-cat="parent" class="categories">{{$value['category_name']}}</a>
        @if(!empty($value['sub_category']))  
        <ul class="subcategories">
          @foreach($value['sub_category'] as $key1=>$value1)
          <li><a href="javascript:;" id="{{$value1['sub_category_id']}}" data-cat="sub" onclick="categories_select(this)">{{$value1['sub_category_name']}}</a><span class="checked_category"><img src="{{ asset('img/category_check.png') }}"/></span></li>
          @endforeach
        </ul>
        @else
        <span class="checked_category_active"><img src="{{ asset('img/category_check.png') }}"/></span>
        @endif
        </li>
    @endforeach
@else
    <li>No category found.</li>
@endif