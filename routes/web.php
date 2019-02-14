<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forgot_password', 'ForgotpasswordController@forgot_password_admin')->name('forgot_password');
Route::post('/check_email', 'ForgotpasswordController@check_email_admin')->name('check_email');
Route::get('/reset_password/{id}', 'ForgotpasswordController@reset_password')->name('reset_password');
Route::post('/update_password', 'ForgotpasswordController@update_password')->name('update_password');

Route::prefix('admin')->group(function() {
   Route::get('/login',
   'Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
   Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
   Route::get('/register', 'Auth\RegisterAdminController@showAdminRegisterForm')->name('admin.register');
   Route::post('/register', 'Auth\RegisterAdminController@create')->name('admin.register.submit');
   Route::get('/category', 'Auth\AdminController@category')->name('admin.category');
   Route::post('/add_category', 'Auth\AdminController@add_category')->name('admin.add_category');
   Route::get('/sub_category', 'Auth\AdminController@sub_category')->name('admin.sub_category');
   Route::post('/add_subcategory', 'Auth\AdminController@add_subcategory')->name('admin.add_subcategory');
   Route::post('/edit_category', 'Auth\AdminController@edit_category')->name('admin.edit_category');
   Route::post('/edit_subcategory', 'Auth\AdminController@edit_subcategory')->name('admin.edit_subcategory');
   Route::post('/delete_category', 'Auth\AdminController@delete_category')->name('admin.delete_category');
   Route::post('/delete_subcategory', 'Auth\AdminController@delete_subcategory')->name('admin.delete_subcategory');
   Route::get('/hashtag', 'Auth\AdminController@hashtag')->name('admin.hashtag');
   Route::post('/add_hashtag', 'Auth\AdminController@add_hashtag')->name('admin.add_hashtag');
   Route::post('/edit_hashtag', 'Auth\AdminController@edit_hashtag')->name('admin.edit_hashtag');
   Route::post('/delete_hashtag', 'Auth\AdminController@delete_hashtag')->name('admin.delete_hashtag');
   Route::get('/business_user', 'Auth\AdminController@business_user')->name('admin.business_user');
   Route::get('/general_user', 'Auth\AdminController@general_user')->name('admin.general_user');
   Route::post('/enable_user', 'Auth\AdminController@enable_user')->name('admin.enable_user');
   Route::post('/disable_user', 'Auth\AdminController@disable_user')->name('admin.disable_user');

   /*********admin verify business users*********/
   Route::get('/verify_bu', 'Auth\AdminController@showVerifyBu')->name('admin.verigybu');
   Route::post('/change_status', 'Auth\AdminController@changeStatus')->name('admin.changestatus');
  });

Route::prefix('business_user')->group(function() {
   Route::get('/login',
   'Auth\BusinessUserLoginController@showLoginForm')->name('business_user.login');
   Route::post('/login', 'Auth\BusinessUserLoginController@login')->name('business_user.login.submit');
   Route::get('logout/', 'Auth\BusinessUserLoginController@logout')->name('business_user.logout');
   Route::get('/', 'Auth\BusinessUserLoginController@beforeLogin')->name('business_user.beforelogin');
   Route::get('/business_dashboard', 'business_user\BusinessUserController@index')->name('business_user.dashboard');
   /****Step one****/
   Route::get('/register/{id?}', 'Auth\RegisterBusinessUserController@showBusinessRegisterForm')->name('business_user.register');
   Route::post('/register/{id?}', 'Auth\RegisterBusinessUserController@create')->name('business_user.register.submit');
   /****step two***/
   Route::get('/register_two/{id}', 'Auth\RegisterBusinessUserController@showBusinessRegisterForm_two')->name('business_user.register_two');
   Route::post('/register_two/{id}', 'Auth\RegisterBusinessUserController@create_two')->name('business_user.register_two.submit');
   /****step three***/
   Route::get('/register_three/{id}', 'Auth\RegisterBusinessUserController@showBusinessRegisterForm_three')->name('business_user.register_three');
   Route::post('/register_three/{id}', 'Auth\RegisterBusinessUserController@create_three')->name('business_user.register_three.submit');
   
  /****step four***/
   Route::get('/register_four/{id}', 'Auth\RegisterBusinessUserController@showBusinessRegisterForm_four');
   Route::post('/register_four/{id}', 'Auth\RegisterBusinessUserController@create_four');

   /****step five***/
   Route::get('/register_five/{id}', 'Auth\RegisterBusinessUserController@showBusinessRegisterForm_five');
   Route::post('/register_five/{id}', 'Auth\RegisterBusinessUserController@create_five');


   Route::post('/add_business_user_category', 'Auth\RegisterBusinessUserController@addBusinessUserCategory');
   
   Route::post('/remove_business_user_category', 'Auth\RegisterBusinessUserController@removeBusinessUserCategory');

   Route::post('/upload_user_multiple_files/{id}', 'Auth\RegisterBusinessUserController@uploadUserMultipleFiles');

   Route::get('/register_six/{id}', 'Auth\RegisterBusinessUserController@showBusinessRegisterForm_six');
    Route::post('/register_six/{id}', 'Auth\RegisterBusinessUserController@create_six');
    
    Route::get('/register_seven/{id}', 'Auth\RegisterBusinessUserController@showBusinessRegisterForm_seven');
    Route::post('/register_seven/{id}', 'Auth\RegisterBusinessUserController@create_seven');

    Route::post('/category_search/{id}', 'Auth\RegisterBusinessUserController@category_search');

    Route::get('/forgot-password', 'Auth\RegisterBusinessUserController@forgotPassword')->name('business_user.forgot-password');
    Route::post('/forgot_password_submit', 'Auth\RegisterBusinessUserController@forgotPasswordSubmit')->name('business_user.forgot_password_submit');

    Route::post('/check_admin_email_exists', 'Auth\RegisterBusinessUserController@check_admin_email_exists');

    Route::get('/recover_password/{id}/{token}', 'Auth\RegisterBusinessUserController@recoverPassword');

    Route::post('/recover_password/{id}/{token}', 'Auth\RegisterBusinessUserController@recoverPassword');

    Route::post('/removeimgreg', 'Auth\RegisterBusinessUserController@removeImagesRegistration')->name('business_user.remove');

    Route::get('/test', 'Auth\RegisterBusinessUserController@test');

    /***business user verification***/
    Route::get('/verify',
   'business_user\BusinessUserController@showVerifyForm')->name('business_user.verify');
    Route::post('/verify', 'business_user\BusinessUserController@verifyUser')->name('business_user.verify.submit');
    Route::post('/uploadmultiple_verifyuser', 'business_user\BusinessUserController@uploadUserMultipleFiles')->name('business_user.verify.submit');
    Route::post('/uploadmultiple_profilesetting', 'business_user\BusinessUserController@uploadUserMultipleFilesProfile')->name('business_user.verify.submit');
    Route::post('/removeimg', 'business_user\BusinessUserController@removeImages')->name('business_user.remove');

    /*****profile setting page***/
    Route::get('/profile_setting',
   'business_user\BusinessUserController@showProfileSeting')->name('business_user.profile_setting');
    Route::post('/profile_setting', 'business_user\BusinessUserController@profileSettingSubmit')->name('business_user.profile_setting.submit');
    Route::post('/add_businessuser_category', 'business_user\BusinessUserController@addBusinessUserCategory');
    Route::post('/remove_businessuser_category', 'business_user\BusinessUserController@removeBusinessUserCategory');
    Route::post('/categorysearch/{id}', 'business_user\BusinessUserController@category_search');
    Route::post('/removeprofileimg', 'business_user\BusinessUserController@removeProfileImages')->name('business_user.remove');

  });

Route::prefix('general_user')->group(function() {
   Route::get('/login',
   'Auth\GeneralUserLoginController@showLoginForm')->name('general_user.login');
   Route::post('/login', 'Auth\GeneralUserLoginController@login')->name('general_user.login.submit');
   Route::get('logout/', 'Auth\GeneralUserLoginController@logout')->name('general_user.logout');
   Route::get('/user/{id?}', 'Auth\GeneralUserLoginController@beforeLogin')->name('general_user.beforelogin');
   
   Route::get('/dashboard', 'general_user\GeneralUserController@index')->name('user.dashboard');
   Route::get('/register', 'Auth\RegisterGeneralUserController@showUserRegisterForm')->name('general_user.register');
   Route::post('/register', 'Auth\RegisterGeneralUserController@create')->name('general_user.register.submit');
   Route::post('/check_user_email_exists', 'Auth\RegisterGeneralUserController@check_user_email_exists');
   Route::post('/forgot_password_submit', 'Auth\RegisterGeneralUserController@forgotPasswordSubmit');
   
   Route::get('/recover_password/{id}/{token}', 'Auth\RegisterGeneralUserController@recoverPassword');

    Route::post('/recover_password/{id}/{token}', 'Auth\RegisterGeneralUserController@recoverPassword');
    /*****to get business users on category page******/
    Route::post('/getlist_businessusers', 'general_user\GeneralUserController@getlist_business');
   /***login with google****/
    Route::get('/redirect', 'Auth\GeneralUserLoginController@redirectToProvider');
    Route::get('/callback', 'Auth\GeneralUserLoginController@handleProviderCallback');
    /***login with facebook***/
    Route::get('/redirectfb', 'Auth\GeneralUserLoginController@redirectfb');
    Route::get('/callbackfb', 'Auth\GeneralUserLoginController@callbackfb');

    /********public profile page*******/
    Route::get('/public_profile/{id}',
   'general_user\GeneralUserController@showPublicProfile')->name('business_user.public_profile');
  });

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
