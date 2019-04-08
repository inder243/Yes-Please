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

Route::get('/', 'FrontController@index')->name('front');
Route::get('/category-classifcation/{id}', 'FrontController@getCategories')->name('cat-home');
Route::post('more-catogries', 'FrontController@moreCatogries')->name('more-cateogries');
Route::post('more-super-catogries', 'FrontController@moreSuperCatogries')->name('more-cateogries');

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
  # Route::post('/create_new_form', 'Auth\AdminController@createNewForm');
   Route::get('/create_new_form/{id}', 'Auth\AdminController@createNewForm')->name('admin.create_new_form');
   Route::post('/save_dynamic_form', 'Auth\AdminController@saveDynamicForm');


   /* code did by Parvinder */

   Route::post('/add_Super_category', 'Auth\AdminController@add_Super_category')->name('admin.add_Super_category');

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


   Route::post('/getFormsData/{id}', 'Auth\RegisterBusinessUserController@getFormsData')->name('business_user.getFormsData'); /* get forms data on register screen using category id*/
   


   
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
    Route::post('/removeimg_verifyuser', 'business_user\BusinessUserController@removeImagesVerify')->name('business_user.remove_verify');
    Route::post('/removeimg_profilesetting', 'business_user\BusinessUserController@removeImagesProfile')->name('business_user.remove_profile');

    /*****profile setting page***/
    Route::get('/profile_setting',
   'business_user\BusinessUserController@showProfileSeting')->name('business_user.profile_setting');
    Route::post('/profile_setting', 'business_user\BusinessUserController@profileSettingSubmit')->name('business_user.profile_setting.submit');
    Route::post('/add_businessuser_category', 'business_user\BusinessUserController@addBusinessUserCategory');
    Route::post('/remove_businessuser_category', 'business_user\BusinessUserController@removeBusinessUserCategory');
    Route::post('/categorysearch/{id}', 'business_user\BusinessUserController@category_search');
    Route::post('/removeprofileimg', 'business_user\BusinessUserController@removeProfileImages')->name('business_user.remove');
    //add categories
    Route::post('/add_business_user_category_auth', 'business_user\BusinessUserController@addBusinessUserCategory');
    //Remove categories
    Route::post('/remove_business_user_category_auth', 'business_user\BusinessUserController@removeBusinessUserCategory');
    /* get forms data on register screen using category id*/
    Route::post('/get_forms_data_auth/{id}', 'business_user\BusinessUserController@getFormsData')->name('business_user.getFormsData');
    //Adding services from categories
    Route::post('/add_selected_service_auth', 'business_user\BusinessUserController@addSelectedService')->name('business_user.add_selected_service'); 

    /**********Quotes*********/
    
    Route::get('/quotes_questions/{status?}/{keyword?}',
   'business_user\BusinessQuotesController@showQuotesQuestions')->name('business_user.quotes');
    Route::get('/quotes_request/{quote_id?}',
   'business_user\BusinessQuotesController@showQuotesRequest')->name('business_user.quotes_request');
    Route::post('/quotes_request_submit', 'business_user\BusinessQuotesController@quotesRequestSubmit')->name('business_user.quotes_request.submit');
    Route::post('/uploadmultiple_quoterequest', 'business_user\BusinessQuotesController@uploadUserMultipleFilesQuotes')->name('business_user.quote_request.submit');
    Route::post('/removeimg_quoterequest', 'business_user\BusinessQuotesController@removeImagesQuote')->name('business_user.remove_quotes');
    Route::get('/quoted_accepted/{quote_id?}/{quote_status?}', 'business_user\BusinessQuotesController@showQuoteAccepted')->name('business_user.quote_accepted');
    Route::get('/user_quotereviews/{quote_id?}', 'business_user\BusinessQuotesController@showUserQuoteReview')->name('business_user.quote_review');
    Route::post('/user_quotereviews', 'business_user\BusinessQuotesController@submitUserQuoteReview')->name('business_user.quote_review_submit');
    Route::post('/get_all_templates', 'business_user\BusinessQuotesController@getAllQuoteTemplates')->name('business_user.get_all_templates');
    Route::post('/quote_template', 'business_user\BusinessQuotesController@submitQuoteTemplates')->name('business_user.quote_template');
    Route::post('/quote_template_delete', 'business_user\BusinessQuotesController@deleteQuoteTemplates')->name('business_user.deletequote_template');
    Route::post('/add_selected_service', 'Auth\RegisterBusinessUserController@addSelectedService')->name('business_user.add_selected_service');

    /**********************Advertisement******************/
    Route::get('/advertisement_dashboard', 'business_user\AdvertisementController@index');
    Route::post('/advertisement_dashboard', 'business_user\AdvertisementController@index');
    Route::get('/advertisement_pro_mode', 'business_user\AdvertisementController@proMode');
    Route::post('/save_pro_mode_settings', 'business_user\AdvertisementController@saveProModeSettings')->name('business_user.saveProModeSettings');
    Route::post('/testPayment', 'business_user\AdvertisementController@testPayment');
    Route::get('/advertisement_top_ads', 'business_user\AdvertisementController@showTopads')->name('business_user.showTopads');
    Route::post('/advertisement_top_ads', 'business_user\AdvertisementController@showTopads')->name('business_user.showTopads');
    Route::post('/save_campaign', 'business_user\AdvertisementController@saveCampaign')->name('business_user.save_campaign');
    Route::post('/edit_budget', 'business_user\AdvertisementController@editBudget')->name('business_user.editBudget');
     Route::get('/edit_budget', 'business_user\AdvertisementController@editBudget')->name('business_user.editBudget');
    

    /**********Questions**********/
    Route::get('/question_detail/{question_id}',
   'business_user\BusinessQuestionsController@showQuestionDetail')->name('business_user.question_detail');
    Route::post('/question_ans_submit', 'business_user\BusinessQuestionsController@questionAnswerSubmit')->name('business_user.quotes_ans_submit');

  });

Route::prefix('general_user')->group(function() {
   Route::get('/login',
   'Auth\GeneralUserLoginController@showLoginForm')->name('general_user.login');
   Route::post('/login', 'Auth\GeneralUserLoginController@login')->name('general_user.login.submit');
   Route::get('logout/', 'Auth\GeneralUserLoginController@logout')->name('general_user.logout');
   Route::get('/user/{id?}', 'Auth\GeneralUserLoginController@beforeLogin')->name('general_user.beforelogin');
   //Route::get('/general_dashboard', 'general_user\GeneralUserController@dashboard')->name('general_user.dashboard');
    Route::get('/dashboard/catid/{catid}/{location?}', 'Auth\GeneralUserLoginController@index')->name('user.dashboard');
   // Route::post('/dashboard/catid/{catid}', 'general_user\GeneralUserController@categoryBusiness')->name('user.dashboardabc');
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

    /**********quotes**********/
    Route::get('/quote_questions/{status?}/{keyword?}/{tab?}', 'general_user\GeneralQuotesController@showQuoteQuestions');
    Route::get('/quotesrply/{quote_id}', 'general_user\GeneralQuotesController@quoteReplies');
    Route::get('/quoteaccepted/{quote_id}', 'general_user\GeneralQuotesController@quoteAccepted');
    Route::get('/quotecompleted/{quote_id}', 'general_user\GeneralQuotesController@quoteCompleted');
    Route::get('/quotesrequest/{quote_id}/{business_id}', 'general_user\GeneralQuotesController@showQuoteRequest');
    Route::get('/quotesreqcompleted/{quote_id}/{business_id}', 'general_user\GeneralQuotesController@showQuoteRequestCompleted');
    Route::post('/quote_accept', 'general_user\GeneralQuotesController@quoteRequestAccept');
    Route::post('/quote_ignore', 'general_user\GeneralQuotesController@quoteRequestIgnore');
    Route::get('/user_quotereviews/{quote_id}/{business_id}', 'general_user\GeneralQuotesController@showUserQuotesReview')->name('general_user.quote_review');
    Route::post('/user_quotereviews', 'general_user\GeneralQuotesController@submitUserQuotesReview')->name('general_user.quote_review_submit');
    Route::post('/quotesend/{b_id?}', 'general_user\GeneralQuotesController@sendQuotes')->name('general_user.askquote_remove');
    Route::post('/check_login', 'Auth\GetNextQuestionController@checkLogin')->name('general_user.login_check');
    /******dropzone links*****/
    Route::post('/uploadmultiple_askquote', 'general_user\GeneralUserController@uploadUserMultipleFilesQuotes')->name('general_user.askquote.submit');
    Route::post('/removeimg_askquote', 'general_user\GeneralUserController@removeImagesQuotes')->name('general_user.askquote_remove');

    /********public profile page*******/
    /*Route::get('/public_profile/{id}/{status?}',
   'general_user\GeneralUserController@showPublicProfile')->name('business_user.public_profile');*/

    /******public profile page with/without login******/
    Route::get('/public_profile/{id}/{catId}/{status?}',
   'Auth\GeneralUserLoginController@showPublicProfile')->name('business_user.public_profile');

    //get question for dynamic form builder
    Route::post('/getdata', 'Auth\GetNextQuestionController@getdata');
    //get answers for dynamic form builder
    Route::post('/savedynamicdata', 'general_user\GetNextQuestionController@saveDynamicData');
    Route::post('/savequotedata', 'Auth\GetNextQuestionController@saveQuoteData');


    /*******questions********/
    Route::post('/questionsend/{b_id?}', 'general_user\GeneralQuestionsController@sendQuestions')->name('general_user.send_questions');
    Route::get('/qusreply/{question_id}', 'general_user\GeneralQuestionsController@questionReplies');
    Route::post('/markanswered', 'general_user\GeneralQuestionsController@markAnswered')->name('general_user.mark_answered');
    /*******question ends********/
    
  });

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
