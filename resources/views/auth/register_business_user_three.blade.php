@extends('layouts.ypapp_inner')

@section('content')

<section class="register_step_1">
    <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span>{{ __('Registration') }}</span></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="registration_main">
                    <h1>{{ __('Registration') }}</h1>
                        <div class="registration_steps">
                            <ul>
                                <li><span class="completed">1</span></li>
                                <li><span class="completed">2</span></li>
                                <li><span class="activespan">3</span></li>
                                <li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                                <li><span>7</span></li>
                            </ul>
                        </div>
                    <form method="POST" id="stepthree_bu_reg" action="{{ url('/business_user/register_three/'.$id) }}">
                        @csrf
                        <div class="registration_filed">
                <h1>Categories</h1>
                <p>Choose up to 10 categories relevant for your business</p>
                <div class="registrationform">
                  <div class="category_secton">
                      <div class="category_list_heading">
                        <p>Categories</p>
                        <div class="category_list category_list_dynamic">
                        <div class="search_category">
                          <input type="text" placeholder="Search..." class="category_search"/>
                        </div>
                        <ul>

                          @foreach($categories as $key=>$value)
                          <li><a href="javascript:;" id="{{$value['category_id']}}" onclick="categoriesselect(this)" data-cat="parent" class="categories">{{$value['category_name']}}</a>
                          @if(!empty($value['sub_category']))  
                            <ul class="subcategories">
                              @foreach($value['sub_category'] as $key1=>$value1)
                              <li><a href="javascript:;" id="{{$value1['sub_category_id']}}" data-cat="sub" onclick="categoriesselect(this)">{{$value1['sub_category_name']}}</a><span class="checked_category"><img src="{{ asset('img/category_check.png') }}"/></span></li>
                              @endforeach
                            </ul>
                          @else
                          <span class="checked_category_active"><img src="{{ asset('img/category_check.png') }}"/></span>
                          @endif
                          </li>
                          @endforeach
                          
                        </ul>
                      </div>
                    </div>
                      <div class="arrow_cat"><img src="{{ asset('img/arrow.png') }}" class="img-fluid"/></div>
                      <div class="added_category_list_heading">
                        <p class="forerror addcategory">Add categories (up to 10)</p>
                        <div class="added_category_list">
                        <div class="added_category category_list add_cat_list">
                          
                            @if(!empty($business_categories))
                                @foreach($business_categories as $parent_category)
                                    <ul class="added_category_ul">
                                      <li>
                                        <a href="javascript:;" id="{{$parent_category['cat_id']}}" data-cat="parent" class="categories">{{$parent_category['name']}}</a>
                                        <span class="cross_category_reg">
                                          <img src="{{ asset('img/category_cancel.png')}}" class="img-fluid">
                                        </span>
                                        <ul class="subcategories">
                                          @foreach($parent_category['values'] as $sub_category)
                                          <li>
                                            <a href="javascript:;" id="{{$sub_category->sub_cat_id}}" data-cat="sub">{{$sub_category->sub_category_name}}</a>
                                            <span class="cross_category_reg">
                                            <img src="{{ asset('img/category_cancel.png')}}" class="img-fluid">
                                            </span>
                                          </li>
                                          @endforeach
                                        </ul>
                                      </li>
                                    </ul>
                                @endforeach
                          @else
                          <p id="no_categories">No Categories Added</p>
                          <ul class="added_category_ul">
                                                   
                          </ul>
                          @endif
                        </div>

                      </div>

                        <span class="fill_fields disp_none">Fill this field</span>
                    </div>
                  </div>
                </div>
                <div class="next_back_button">
                  <div class="back"><a href="{{ url('/business_user/register_two/'.$id) }}">< Back</a></div>
                  <div class="next"><input type="button" class="reg_step3_submit" id="next_submit" value="Next >"></div>
                </div>
              </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

