<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessUserHashtags extends Model
{
	protected $fillable = [
       'tag_id','business_userid','status'
    ];
   	public $timestamps = false;
}
