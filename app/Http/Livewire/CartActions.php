<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Cart;


class CartActions extends Component
{


    protected $listeners = ['cart_updated' => 'render'];


    public function reduceByOne($id) {
        $oldcart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart');
        }

        $this->emit('cart_updated');

    }

    public function removeItem($id) {
        $oldcart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart');
        }

        $this->emit('cart_updated');


    }

    public function plusItem($id) {
        $oldcart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->plusOne($id);

        session()->put('cart', $cart);

        $this->emit('cart_updated');


    }

    public function destroyCart() {
        session()->forget('cart');

        $this->emit('cart_updated');
    }

    public function render()
    {
        $oldcart = session()->get('cart');
        $cart = new Cart($oldcart);


        return view('livewire.cart-actions',  ['menus' => $cart->items, 'total_price' => $cart->total_price, 'total_quantity' => $cart->total_quantity]);
    }
}
