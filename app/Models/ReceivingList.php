<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingList extends Model
{
    protected $primaryKey = 'ReceivingCode';
    protected $fillable = [
        'ReceivingCode',
        'PO',
        'Total_Amount',
        'Created_by',
        'Status',
        'Reviewed_by',
        'user_id',
        'CoCode',
    ];
}
