<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'totalprice'
    ];

    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza','detailtransactions')->withPivot('quantity')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
