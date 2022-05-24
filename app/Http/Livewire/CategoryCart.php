<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Cart;
use Livewire\Component;

class CategoryCart extends Component
{

    public Category $category;

    public function mount($category) {
        $this->category = $category;
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
        return view('livewire.category-cart');
    }
}
