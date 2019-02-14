<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yphashtag extends Model
{
    protected $table = 'yp_hashtag';
    protected $fillable = [
       'hashtag_id','hashtag_name'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function bu_tags()
    {
        return $this->hasMany('App\Models\YpUserHashtags','id','tag_id');
    }
}
