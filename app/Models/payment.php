<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'invoice',
        'payment',
        'Balance'
    ];
}
