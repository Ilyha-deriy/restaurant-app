<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    use HasFactory;

    public $items = null;
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->total_quantity = $oldCart->total_quantity;
            $this->total_price = $oldCart->total_price;
        }
    }

    public function add ($item, $id) {
        $stored_item = ['quantity' => 0, 'price' => $item->price, 'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $stored_item = $this->items[$id];
            }
        }
        $stored_item['quantity']++;
        $stored_item['price'] = $item->price * $stored_item['quantity'];
        $this->items[$id] = $stored_item;
        $this->total_quantity++;
        $this->total_price += $item->price;
    }
}
