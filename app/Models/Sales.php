<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $primaryKey = 'invoice';
    protected $fillable = [
        'invoice',
        'Total_Amount',
        'Created_by',
        'Status',
        'Reviewed_by',
        'Ccode',
        'user_id',
        'CoCode',
    ];
}
