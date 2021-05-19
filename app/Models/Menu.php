<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //protected $primaryKey = 'menuCode';
    protected $fillable = [
        //'menuCode',
        'menuParent',
        'Description',
        'icon',
        'route',
    ];

}
