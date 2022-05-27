<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->firstOrFail();

        $order->cart = unserialize($order->cart);

        return view('admin.orders.show', ['order' => $order]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return to_route('admin.orders.index')->with('danger', 'Order deleted successfully');

    }
}
