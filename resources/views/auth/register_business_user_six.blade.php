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
              <li><span class="activespan">6</span></li>
              <li><span>7</span></li>
            </ul>
          </div>
          <form method="POST" class="dropzone" id="my-awesome-dropzone" action="{{ url('/business_user/register_six/'.$id) }}" enctype="multipart/form-data">
          @csrf 
            <div class="registration_filed">
              <h1>Business features</h1>
              <p>Select relevant hashtags about your business</p>
              <div class="registrationform">
                <div class="relevent_hastag pt-3 pb-4">
                  <div class="row">
                    @if(!empty($hashtags))
                      @foreach($hashtags as $hashtag)
                        <?php if(in_array($hashtag['id'], $YpUserHashtags)){
                            $checked = 'checked'; 
                        }else{
                          $checked = '';
                        } ?>
                        <div class="col-md-3 col-6">
                          <div class="formcheck forcheckbox">
                                <label>
                                  <input data-id="{{$hashtag['id']}}" type="checkbox" class="radio-inline" name="hashtag[]" value="{{$hashtag['id']}}" {{$checked}}>
                                  <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#{{$hashtag['hashtag_name']}} </p>
                                </label>
                          </div>
                        </div>
                      @endforeach
                    @endif                      
                </div>
              </div>
            </div>

              <div class="next_back_button">
                <div class="back"><a href="{{ url('/business_user/register_five/'.$id) }}">< Back</a></div>
                    <div class="next"><input type="submit" id="next_submit" value="Next >"></div>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</section>
    

@endsection

