<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $primaryKey = 'permCode';
    protected $fillable = [
         'permCode',
         'Description',
    ];
}
