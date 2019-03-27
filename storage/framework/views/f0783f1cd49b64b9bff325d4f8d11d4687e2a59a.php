<?php $__env->startSection('content'); ?>
<style>
  #locationField, #controls {
    position: relative;
    width: 480px;
  }
  #autocomplete {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 99%;
  }
  .label {
    text-align: right;
    font-weight: bold;
    width: 100px;
    color: #303030;
  }
  #address {
    border: 1px solid #000090;
    background-color: #f0f0ff;
    width: 480px;
    padding-right: 2px;
  }
  #address td {
    font-size: 10pt;
  }
  .field {
    width: 99%;
  }
  .slimField {
    width: 80px;
  }
  .wideField {
    width: 200px;
  }
  #locationField {
    height: 20px;
    margin-bottom: 2px;
  }
</style>

<section class="register_step_1">
      <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span><?php echo e(__('Registration')); ?></span></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="registration_main">
              <h1><?php echo e(__('Registration')); ?></h1>

              <div class="registration_filed_user">
                 <form method="POST" role="form" id="general_user_reg" action="<?php echo e(route('general_user.register.submit')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                <div class="upload_section">
                 <div class="preview">
                   <img src="<?php echo e(asset('img/upload_img_placeholder.png')); ?>" id="blah"/>
                   <span class=""></span>
                 </div>
                <div class="upload_image_profile">
                  <div class="upload_image">
                     <input type="file" name="file" class="form-control-file" id="imgInp" accept="image/*" value="<?php echo e(old('file')); ?>">
                     <button><?php echo e(__('Upload image profile')); ?></button>
                  </div>
                </div>
              </div>

                <div class="registrationform user_registration_form">

                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="first_name"><?php echo e(__('First name')); ?> <span class="mandatery_star">*</span></label>
                            <input id="first_name" type="text" class="form-control<?php echo e($errors->has('first_name') ? ' error_border' : ''); ?>" name="first_name" value="<?php echo e(old('first_name')); ?>" onkeyup="remove_errormsg(this)" autofocus>

                            <?php if($errors->has('first_name')): ?>
                                <span class="fill_fields" role="alert">
                                    <?php echo e($errors->first('first_name')); ?>

                                </span>
                            <?php endif; ?>

                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="last_name"><?php echo e(__('Last name')); ?> <span class="mandatery_star">*</span></label>
                            <input id="last_name" type="text" class="form-control<?php echo e($errors->has('last_name') ? ' error_border' : ''); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" onkeyup="remove_errormsg(this)" autofocus>

                            <?php if($errors->has('last_name')): ?>
                                <span class="fill_fields" role="alert">
                                    <?php echo e($errors->first('last_name')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="city"><?php echo e(__('City')); ?> <span class="mandatery_star">*</span></label>
                            <input id="autocomplete" onFocus="geolocate()" type="text" class="form-control<?php echo e($errors->has('city') ? ' error_border' : ''); ?>" name="city" value="<?php echo e(old('city')); ?>" onkeyup="remove_errormsg(this)" autofocus>

                            <?php if($errors->has('city')): ?>
                                <span class="fill_fields" role="alert">
                                    <?php echo e($errors->first('city')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="email"><?php echo e(__('Email address')); ?> <span class="mandatery_star">*</span></label>
                            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' error_border' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" onkeyup="remove_errormsg(this)" autofocus>

                            <?php if($errors->has('email')): ?>
                                <span class="fill_fields" role="alert">
                                    <?php echo e($errors->first('email')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="password"><?php echo e(__('Password')); ?> <span class="mandatery_star">*</span>
                            </label>
                            <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' error_border' : ''); ?>" name="password" value="<?php echo e(old('password')); ?>" onkeyup="remove_errormsg(this)" autofocus>

                            <?php if($errors->has('password')): ?>
                                <span class="fill_fields" role="alert">
                                    <?php echo e($errors->first('password')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="password_confirmation"><?php echo e(__('Confirm Password')); ?> <span class="mandatery_star">*</span>
                            </label>
                            <input id="password_confirmation" type="password" class="form-control<?php echo e($errors->has('password') ? ' error_border' : ''); ?>" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="inputPassword4"><?php echo e(__('Phone number')); ?> <span class="mandatery_star">*</span></label>
                            <input id="phone_number" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control<?php echo e($errors->has('phone_number') ? ' error_border' : ''); ?>" name="phone_number" value="<?php echo e(old('phone_number')); ?>" onkeyup="remove_errormsg(this)" autofocus>

                            <?php if($errors->has('phone_number')): ?>
                                <span class="fill_fields" role="alert">
                                    <?php echo e($errors->first('phone_number')); ?>

                                </span>
                            <?php endif; ?>
                            <span class="notall_business"> <?php echo e(__('Not all businesses will send quotes to users without phone number')); ?></span>
                        </div>
                    </div>

                    <div class="agree">
                        <div class="terms_agree">
                            <div class="formcheck forcheckbox">
                                <label>
                                    <input type="checkbox" id="option" class="radio-inline" name="checkbox" value="1" <?php echo e((old('checkbox') == "1") ? 'checked': ''); ?>>
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>I agree to <a href="#">Service terms</a> and <a href="#">Privacy policy </a></p>

                                </label>
                            </div>
                        </div>
                        <?php if($errors->has('checkbox')): ?>
                            <span class="fill_fields option_accept check-center" role="alert" style="text-align:center;">
                                <?php echo e($errors->first('checkbox')); ?>

                            </span>
                        <?php endif; ?>

                    </div>
                </div>
            <div class="general_user_register"><button>Register</button></div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</section>
<script>
  // This example displays an address form, using the autocomplete feature
  // of the Google Places API to help users fill in the information.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  var placeSearch, autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };

  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type  {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
      document.getElementById(component).value = '';
      document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
      }
    }
  }

  // Bias the autocomplete object to the user's geographical location,
  // as supplied by the browser's 'navigator.geolocation' object.
  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
      });
    }
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlzdmRasNAVLVYfUb26BiOjkSvny4YHQ&libraries=places&callback=initAutocomplete"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.reg_general', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>