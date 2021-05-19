<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locaion extends Model
{
    protected $fillable = [
        'code',
        'name',
        'parent'
    ];
}
