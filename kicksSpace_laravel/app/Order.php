<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public static function createOrder()
    {
        $user = Auth::user();
        $order = $user->orders()->create();
        // $items = $request->get('items');
        //place order and insert data to orders_products
        // $items = [{id: 1, price: 24, chosenSize: 23}];
        // foreach ($items as $item) {
        //     $order->items()->attach($item->id, [
        //         'size' => $item->chosenSize,
        //         'price' => $item->price
        //     ]);
        // }
    }
}
