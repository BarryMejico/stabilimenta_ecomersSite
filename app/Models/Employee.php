<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'Employee',
        'Ecode',
        'CoCode',
        'id',
        'Position',
    ];
}
