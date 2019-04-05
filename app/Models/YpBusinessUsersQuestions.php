<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessUsersQuestions extends Model
{
    protected $fillable = [
       'business_id','general_id','question_id','business_answer','status'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    /****get question details****/
    public function get_ques(){
    	return $this->belongsTo('App\Models\YpGeneralUsersQuestions','question_id','id');
    }

    /********get general user*******/
    public function get_gen_user(){
        return $this->belongsTo('App\Models\YpGeneralUsers','general_id','id');
    }

    /********get business user*******/
    public function get_bus_user(){
        return $this->belongsTo('App\Models\YpBusinessUsers','business_id','id');
    }

}
