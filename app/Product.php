<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = 'products';
    protected $fillable = [
        'name', 'description', 'price', 'qty', 'isBlock', 'photo', 'newprice', 'metaDataDescription', 'metaDataTitle'
    ];
}
