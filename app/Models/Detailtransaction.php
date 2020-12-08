<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detailtransaction extends Model
{
    protected $fillable = [
        'transaction_id', 
        'pizza_id', 
        'quantity'
    ];
}
