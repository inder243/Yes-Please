<?php $arr = json_decode($categories); ?>
@if(!empty($arr))
    @foreach($categories as $key=>$value)
        <li><a href="javascript:;" inc_id="{{$value['id']}}" id="{{$value['category_id']}}" data-cat="sub" onclick="categoriesselect(this)" data-cat="parent" class="categories">{{$value['category_name']}}</a>


         
        </li>

        
    @endforeach
@else
    <li>No category found.</li>
@endif