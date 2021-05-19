<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poDetails extends Model
{
    protected $fillable = [
        'Icode',
        'Qty',
        'UnitCost',
        'PO'      
    ];
}
