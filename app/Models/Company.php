<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'CoCode';
    protected $fillable = [
        'CoCode',
        'CompanyName',
        'CompanyAddress',
        'CompanyOwner'  
    ];
}
