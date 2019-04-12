<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpGeneralUsersQuestions extends Model
{
    protected $fillable = [
       'question_id','general_id','q_title','q_description','cat_id','cat_name','uploaded_files','phone_number'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function ques_answers(){
    	return $this->hasMany('App\Models\YpBusinessUsersQuestions','question_id','id');
    }

    public function avgAnswer(){
        return $this->ques_answers()
          ->selectRaw('count(business_answer) as total_answer, question_id')
          ->groupBy('question_id');
    }
}
