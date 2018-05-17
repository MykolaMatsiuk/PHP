<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = ['total'];
    protected $dates = ['created_at'];

    public function items()
    {
        return $this->belongsToMany('App\Item', 'item_order');
    }
}
