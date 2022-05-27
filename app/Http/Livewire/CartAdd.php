<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Cart;

class CartAdd extends Component
{
    public $menus;


    public function mount(){
        $this->menus = Menu::all();
    }

    public function getAddToCart($id){
        $menu = Menu::find($id);
        $oldcart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($menu, $menu->id);

        session()->put('cart', $cart);
        session()->save();

        $this->emit('cart_updated');
        $this->emit('saved');
    }



    public function render()
    {

        return view('livewire.cart-add');

    }
}
