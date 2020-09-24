<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    protected $table = 'paymentmode';
    public $timestamps = false;
    protected $fillable = [
        'name', 'description'
    ];
}
