<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpQuesJumps extends Model
{
    protected $table = 'yp_ques_jumps';
    protected $fillable = [
       'q_id','operator','value','jump_to'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function questions()
    {
        return $this->belongsTo('App\Models\YpFormQuestions');
    }
    
}
