<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Reservation;

class ProfileController extends Controller
{
    public function index() {
        $orders = auth()->user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('profile.index', ['orders' => $orders]);
    }

    public function user_reservations() {
        $reservations = auth()->user()->reservations;

        return view('profile.reservations', compact('reservations'));
    }

    public function delete_reservation($id)
    {
        $reservation = Reservation::where('id', $id)->firstOrFail();
        $reservation->delete();

        return back()->with('danger', 'Reservation deleted successfully');

    }

    public function destroy($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $order->delete();

        return back()->with('danger', 'Order deleted successfully');

    }
}
