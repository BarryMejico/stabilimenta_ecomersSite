<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    protected $fillable = [
        'Icode',
        'Qty',
        'UnitCost',
        'invoice',
        'Remarks',
        'description',
        'DeviceStatus',
        'RepairedbyCode',
        
    ];
}
