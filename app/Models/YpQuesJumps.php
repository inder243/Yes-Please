<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpQuesJumps extends Model
{
	public $timestamps = false;
    protected $table = 'yp_ques_jumps';
    protected $fillable = [
       'q_id','operator','value','jump_to'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    
}
