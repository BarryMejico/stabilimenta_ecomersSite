<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'Name',
        'Unit',
        'Code',
        'status',
        'user_id',
        'CoCode',       
    ];
}
