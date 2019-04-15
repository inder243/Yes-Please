<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpBusinessUsers extends Authenticatable
{
    use Notifiable;
    protected $table = 'yp_business_users';
    protected $guard = 'business_user';

    protected $fillable = [
        'business_userid','business_name','first_name','last_name', 'email', 'password','phone_number','full_address','logitude','latitude','image_name','remember_token','completed_steps','advertise_mode','points'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verify_user()
    {
    	//b_id = verify_idFacades
    	//id = current
        return $this->hasMany('App\Models\YpVerificationBusinessUsers','id','b_id');
    }

    public function bu_details()
    {
        return $this->hasMany('App\Models\YpBusinessDetails','b_id','id');
    }

    public function hash_tags()
    {
        return $this->hasMany('App\Models\YpUserHashtags','business_userid','id');
    }

    public function bu_cat()
    {
        return $this->belongsTo('App\Models\YpBusinessUsercategories','business_userid','id');
    }

    public function business_quotes(){
        return $this->hasMany('App\Models\YpBusinessUsersQuotes','business_userid','id');
    }

    public function quotes(){
        return $this->hasMany('App\Models\YpBusinessUsersQuotes','business_userid','business_id');
    }

    public function get_review(){
        return $this->hasMany('App\Models\YpUserReviews','id','business_id');
    }

    public function get_reviewss(){
        return $this->hasMany('App\Models\YpUserReviews','business_id','id');
    }

    public function avgRating(){
        return $this->get_reviewss()
          ->selectRaw('avg(rating) as avg_rating,count(review) as tot_review, business_id')
          ->groupBy('business_id')->where('user_type','general');
    }
    
}
