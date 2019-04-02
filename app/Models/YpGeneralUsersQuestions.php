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
}
