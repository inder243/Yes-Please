@extends('layouts.ypapp_inner')

@section('content')
<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span>Registration</span></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="registration_main">
          <h1>Registration</h1>
          <div class="registration_steps">
            <ul>
              <li><span class="completed">1</span></li>
              <li><span class="completed">2</span></li>
              <li><span class="completed">3</span></li>
              <li><span class="activespan">4</span></li>
              <li><span>5</span></li>
              <li><span>6</span></li>
              <li><span>7</span></li>
            </ul>
          </div>
          <form method="POST" id="step4_bu_reg" action="{{ url('/business_user/register_four/'.$id) }}">      @csrf     
            <div class="registration_filed">
              <h1>Geographic settings</h1>
              <p>Where do you want to get clients from?</p>
              <div class="registrationform">
                <div class="geographic_setting">
                  <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <div class="formcheck">
                                <label>
                                  <?php  $checked = ''; ?>
                                  @if(!empty($grapic_details))
                                    @if($grapic_details[0]['distance_all'] == 1)
                                    <?php  $checked = 'checked'; ?>                                  
                                    @endif
                                  @endif
                                  <input type="radio" class="radio-inline" name="country" value="all" {{$checked}}>
                                  <span class="outside"><span class="inside"></span></span><p>All country</p>
                                </label>
                          </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <div class="formcheck">
                            <label>
                              <?php  $checked1 = ''; ?>
                              @if(!empty($grapic_details))
                                @if($grapic_details[0]['distance_all'] == 0)
                                  <?php  $checked1 = 'checked'; ?>
                                @endif
                              @endif
                              <input type="radio" class="radio-inline" name="country" value="distance" {{$checked1}}>
                              <span class="outside"><span class="inside"></span></span><p>Distance from your address</p>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                            <div class="form-group col-md-6 col-12">

                            </div>
                            <div class="form-group custom_errow col-md-6 col-12">
                                <label for="inputPassword4">Radius (km)</label>
                                @if(isset($grapic_details[0]['distance_kms']))
                                <?php  $distance_kms = $grapic_details[0]['distance_kms']; ?>
                                @else
                                <?php  $distance_kms = "1";?>
                                @endif
                                <select class="form-control " name="radius" id="exampleSelect1">
                                  <?php for($i=10;$i<=100;$i++){
                                    if($i % 10 == 0){
                                    if($i == $distance_kms){?>
                                      <option value="{{$i}}" selected="selected">{{$i}}</option>
                                  <?php }else{ ?>
                                      <option value="{{$i}}">{{$i}}</option>
                                  <?php } } } ?>
                                </select>
                                <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"/></span>
                            </div>
                          </div>
                </div>
                              <div class="next_back_button">
                <div class="back"><a href="{{ url('/business_user/register_three/'.$id) }}">< Back</a></div>
                <div class="next"><input type="submit" id="next_submit" value="Next >"></div>
              </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    

@endsection

