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
}
