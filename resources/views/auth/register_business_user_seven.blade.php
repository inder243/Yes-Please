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
              <li><span class="completed">4</span></li>
              <li><span class="completed">5</span></li>
              <li><span class="completed">6</span></li>
              <li><span class="activespan">7</span></li>
            </ul>
          </div>
          <form method="POST" id="register_schedule" action="{{ url('/business_user/register_seven/'.$id) }}">
          @csrf
          <div class="registration_filed">
                    <h1>Schedule</h1>
                    <p>Tell us about your opening hours</p>
                    <span class="bu_error bu_error_hours" style="margin: 0px;display: block;"></span>
                    <div class="registrationform">
                      <div class="available_time">
                      <div class="row">
                        <div class="col-md-12 col-12">
                              <div class="formcheck forcheckbox">
                                    <label>
                                      <?php if(isset($userSchedule->available)){ 
                                          $checked = 'checked';}else{$checked = '';}
                                      ?>
                                      <input type="checkbox" id="available" class="radio-inline" name="available" value="" {{$checked}}>
                                      <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>available 24 hours 7 days a week</p>
                                    </label>
                              </div>
                        </div>
                      </div>
                    </div>
                    <div class="total_weekdays">
                      <div class="row">
                        <div class="col-md-6 col-12">
                          <div class="week-section">
                            <div class="day">
                              <div class="form-group">
                                <label for="inputPassword4">Sunday</label>
                                <div class="input-group date">
                                <?php if(isset($userSchedule->sunday_from)){ 
                                    $value = $userSchedule->sunday_from;}else{$value = '';}
                                ?>
                                <input type="text" class="form-control datetimepicker" name="sunday_from" value="{{$value}}"/>
                                <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                </div>
                               </div>

                            </div>
                            <span class="divider">-</span>
                            <div class="day">
                              <div class="form-group">
                                <label for="inputPassword4"></label>
                                <div class="input-group date second_time" >
                                <?php if(isset($userSchedule->sunday_to)){ 
                                    $value = $userSchedule->sunday_to;}else{$value = '';}
                                ?>
                                <input type="text" class="form-control datetimepicker" name="sunday_to" value="{{$value}}"/>
                                <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                </div>
                               </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="week-section">
                            <div class="day">
                              <div class="form-group">
                                <label for="inputPassword4">Monday</label>
                                <div class="input-group date">
                                <?php if(isset($userSchedule->monday_from)){ 
                                    $value = $userSchedule->monday_from;}else{$value = '';}
                                ?>
                                <input type="text" class="form-control datetimepicker" name="monday_from" value="{{$value}}" value="{{$value}}" />
                                <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                </div>
                               </div>

                            </div>
                            <span class="divider">-</span>
                            <div class="day">
                              <div class="form-group">
                                <label for="inputPassword4"></label>
                                <div class="input-group date second_time">
                                <?php if(isset($userSchedule->monday_to)){ 
                                    $value = $userSchedule->monday_to;}else{$value = '';}
                                ?>
                                <input type="text" class="form-control datetimepicker" name="monday_to" value="{{$value}}"/>
                                <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                </div>
                               </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="week-section">
                          <div class="day">
                            <div class="form-group">
                              <label for="inputPassword4">Tuesday</label>
                              <div class="input-group date" >
                              <?php if(isset($userSchedule->tuesday_from)){ 
                                    $value = $userSchedule->tuesday_from;}else{$value = '';}
                                ?>
                              <input type="text" class="form-control datetimepicker" name="tuesday_from" value="{{$value}}"/>
                              <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                              </div>
                             </div>

                          </div>
                          <span class="divider">-</span>
                          <div class="day">
                            <div class="form-group">
                              <label for="inputPassword4"></label>
                              <div class="input-group">
                              <?php if(isset($userSchedule->tuesday_to)){ 
                                    $value = $userSchedule->tuesday_to;}else{$value = '';}
                                ?>
                              <input type="text" class="form-control datetimepicker-input datetimepicker" name="tuesday_to" value="{{$value}}"/>
                              <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                              </div>
                             </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="week-section">
                          <div class="day">
                            <div class="form-group">
                              <label for="inputPassword4">Wednesday</label>
                              <div class="input-group date">
                              <?php if(isset($userSchedule->wednesday_from)){ 
                                    $value = $userSchedule->wednesday_from;}else{$value = '';}
                                ?>
                              <input type="text" class="form-control datetimepicker" name="wednesday_from" value="{{$value}}"/>
                              <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                              </div>
                             </div>

                          </div>
                          <span class="divider">-</span>
                          <div class="day">
                            <div class="form-group">
                              <label for="inputPassword4"></label>
                              <div class="input-group date second_time">
                              <?php if(isset($userSchedule->wednesday_to)){ 
                                    $value = $userSchedule->wednesday_to;}else{$value = '';}
                                ?>
                              <input type="text" class="form-control datetimepicker" name="wednesday_to" value="{{$value}}"/>
                              <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                              </div>
                             </div>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="week-section">
                        <div class="day">
                          <div class="form-group">
                            <label for="inputPassword4">Thursday</label>
                            <div class="input-group date">
                            <?php if(isset($userSchedule->thursday_from)){ 
                                $value = $userSchedule->thursday_from;}else{$value = '';}
                            ?>
                            <input type="text" class="form-control datetimepicker" name="thursday_from" value="{{$value}}"/>
                            <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                            </div>
                           </div>
                        </div>
                        <span class="divider">-</span>
                        <div class="day">
                          <div class="form-group">
                            <label for="inputPassword4"></label>
                            <div class="input-group date second_time">
                            <?php if(isset($userSchedule->thursday_to)){ 
                                $value = $userSchedule->thursday_to;}else{$value = '';}
                            ?>
                            <input type="text" class="form-control datetimepicker" name="thursday_to" value="{{$value}}"/>
                            <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                            </div>
                           </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="week-section">
                        <div class="day">
                          <div class="form-group">
                            <label for="inputPassword4">Friday</label>
                            <div class="input-group date">
                            <?php if(isset($userSchedule->friday_from)){ 
                                $value = $userSchedule->friday_from;}else{$value = '';}
                            ?>
                            <input type="text" class="form-control datetimepicker" name="friday_from"  value="{{$value}}" />
                            <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                            </div>
                           </div>

                        </div>
                        <span class="divider">-</span>
                        <div class="day">
                          <div class="form-group">
                            <label for="inputPassword4"></label>
                            <div class="input-group date second_time">
                            <?php if(isset($userSchedule->friday_to)){ 
                                $value = $userSchedule->friday_to;}else{$value = '';}
                            ?>
                            <input type="text" class="form-control datetimepicker" name="friday_to" value="{{$value}}" />
                            <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                            </div>
                           </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="week-section">
                      <div class="day">
                        <div class="form-group">
                          <label for="inputPassword4">Saturday</label>
                          <div class="input-group date">
                          <?php if(isset($userSchedule->saturday_from)){ 
                                $value = $userSchedule->saturday_from;}else{$value = '';}
                            ?>
                          <input type="text" class="form-control datetimepicker" name="saturday_from" value="{{$value}}" />
                          <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                          </div>
                         </div>
                      </div>
                      <span class="divider">-</span>
                      <div class="day">
                        <div class="form-group">
                          <label for="inputPassword4"></label>
                          <div class="input-group date second_time">
                          <?php if(isset($userSchedule->saturday_to)){ 
                                $value = $userSchedule->saturday_to;}else{$value = '';}
                            ?>
                          <input type="text" class="form-control datetimepicker" name="saturday_to" value="{{$value}}" />
                          <span class="select_arrow for_timer"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                          </div>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="agree">
                <div class="terms_agree">
                  <div class="formcheck forcheckbox">
                      <label>
                        <input type="checkbox" class="radio-inline" id="agree" name="agree">
                        <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>I agree to <a href="JavaScript:void(0)">terms</a> </p>
                      </label>
                      <span class="bu_error bu_error_terms" style="margin: 0px;display: block;"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="next_back_button">
              <div class="back"><a href="{{ url('/business_user/register_six/'.$id) }}">< Back</a></div>
              <div class="next"><input type="button" class="reg_step7_submit" id="next_submit" value="Register >"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</section>



@endsection

