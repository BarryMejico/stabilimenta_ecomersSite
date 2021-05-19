<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    protected $fillable = [
        'invite_to',
        'invite_from',
        'CoCode',
        'invite_Status',
    ];
}
