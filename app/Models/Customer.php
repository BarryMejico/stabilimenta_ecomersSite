<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $primaryKey = 'Ccode';
    protected $fillable = [
        'Customer',
        'Number',
        'Address',
        'Ccode',
        'user_id',
        'CoCode',
        
    ];
}
