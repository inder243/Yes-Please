<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpGeneralUsersQuotes extends Authenticatable
{
    use Notifiable;
    protected $table = 'yp_general_users_quotes';
    protected $guard = 'general_user';

    protected $fillable = [
        'quote_id','general_id','filter_data','dynamic_formdata','quote_count','work_description','uploaded_files','phone_number','cat_id','cat_name'
    ];


    public function bus_quotes(){
    	return $this->hasMany('App\Models\YpBusinessUsersQuotes', 'id','quote_id');
    }

}
