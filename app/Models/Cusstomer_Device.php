<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cusstomer_Device extends Model
{
    protected $fillable = [
        'Code',
        'DeciveName',
        'Model',
        'Ccode'  
    ];
}
