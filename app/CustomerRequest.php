<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRequest extends Model
{
    protected $table = ' customer_redact ';
   
    protected $fillable = [
        'id','shop_id', 'shop_domain','customer_id','customer_email','customer_phone',

    ];
}
