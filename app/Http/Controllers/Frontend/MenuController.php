<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Cart;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
         $menus = Menu::all();

         return view('menus.index', compact('menus'));
    }

    public function getAddToCart(Request $request, $id){
        $menu = Menu::find($id);
        $oldcart = session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($menu, $menu->id);

        $request->session()->put('cart', $cart);
        session()->save();
        return redirect()->route('menus.index');
    }

    public function getCart() {
        if (!session()->has('cart')){
            return view('menus.shopping-cart');
        }
        $oldcart = session()->get('cart');
        $cart = new Cart($oldcart);
        return view('menus.shopping-cart', ['menus' => $cart->items, 'total_price' => $cart->total_price, 'total_quantity' => $cart->total_quantity]);
    }

    public function getCheckout() {
        if (!session()->has('cart')){
            return view('menus.shopping-cart');
        }
        $oldcart = session()->get('cart');
        $cart = new Cart($oldcart);
        return view('menus.checkout', ['menus' => $cart->items, 'total_price' => $cart->total_price, 'total_quantity' => $cart->total_quantity]);
    }
}
