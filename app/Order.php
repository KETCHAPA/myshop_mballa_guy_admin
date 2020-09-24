<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'paymentDate', 'Pay_id', 'Car_id', 'code', 'deliveredMode', 'status'
    ];
    protected $table = 'orders';
    public $timestamps = 'false';
}
