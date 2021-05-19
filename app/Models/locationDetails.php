<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locationDetails extends Model
{
    protected $fillable = [
        'parent',
        'itemCode' 
    ];
}
