<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StocksList extends Model
{
    protected $fillable = [
        'Icode',
        'Qty',
        'UnitCost',
        'Location',
        'user_id',
        'CoCode',
        
    ];
}
