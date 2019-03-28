<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveries extends Model
{
    protected $fillable = [
        'id',
        'sale_id',
        'recipient',
        'address',
        'expected_arrival',
        'actual_arrival',
        'status',
        'description'
    ];
}
