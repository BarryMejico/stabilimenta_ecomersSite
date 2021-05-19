<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingDetails extends Model
{
    protected $fillable = [
        'Icode',
        'R_Qty',
        'UnitCost',
        'ReceivingCode', 
        'PO',
    ];
}
