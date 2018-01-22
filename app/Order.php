<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'items' => 'array',
        'quantities' => 'array',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class,'user_id','id');
    }
}
