<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessUserQuoteTemplates extends Model
{
    protected $table = 'yp_business_user_quote_templates';
    protected $fillable = [
       'business_id','template_title','template_text'
    ];
    protected $hidden = [];
       
}
