<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    protected $fillable = [
        'Vendor',
        'Number',
        'Address',
        'Vcode',
        'user_id',
        'CoCode',
    ];
}
