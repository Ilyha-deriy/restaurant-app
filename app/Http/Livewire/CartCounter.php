<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{

    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cart_count = session()->has('cart') ? session()->get('cart')
        ->total_quantity : '';
        return view('livewire.cart-counter', compact('cart_count'));
    }
}
