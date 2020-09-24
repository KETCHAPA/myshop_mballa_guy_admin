<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $timestamps = false;
    protected $table = 'promotions';
    protected $fillable = [
        'name', 'code', 'price', 'pro_id', 'beginDate', 'expirationDate', 'isBlock'
    ];
}
