<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class po_list extends Model
{
    protected $fillable = [
        'PO',
        'Total_Amount',
        'Created_by',
        'Status',
        'Reviewed_by',
        'Vendor',
        'Ship_to',
        'user_id',
        'CoCode',
    ];
}
