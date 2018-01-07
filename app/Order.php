<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'items' => 'array'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'user_id','id');
    }
}
