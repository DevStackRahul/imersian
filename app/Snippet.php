<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    protected $table = 'snippet_toggle';
   
    protected $fillable = [
        'id','user_id', 'status','shopify_scripttag_id','script_added_text','created_at',
    ];
}
