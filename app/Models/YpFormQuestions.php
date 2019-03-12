<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpFormQuestions extends Model
{
    protected $table = 'yp_form_questions';
    protected $fillable = [
       'formid','cat_id','qid','type','required','options','title','placeholder','description','min','max'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    
}
