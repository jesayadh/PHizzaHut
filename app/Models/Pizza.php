<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'price', 
        'description', 
        'image',
        'slug'
    ];

    public function transactions()
    {
        return $this->belongsToMany('App\Models\Transaction','detailtransactions');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\Models\User','carts');
    }

}
