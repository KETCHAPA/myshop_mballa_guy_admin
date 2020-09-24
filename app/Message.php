<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;
    protected $table = 'messages';
    protected $fillable = [
        'sender', 'receiver', 'title', 'content', 'date', 'isRead'
    ];
}
