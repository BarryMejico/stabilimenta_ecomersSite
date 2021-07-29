<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission_detail extends Model
{
    protected $primaryKey = 'permCode';
    protected $fillable = [
         'permCode',
         'id',
         'CoCode',
    ];
}
