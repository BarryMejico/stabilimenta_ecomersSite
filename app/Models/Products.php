<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'ProductCode';
    protected $fillable = [
        'ProductCode',
        'Name',
        'Description',
        'Img',
        'Unit',
        'Price',
        'qty',
        'status',
        'SRP',
    ];
}
