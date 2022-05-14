<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Category;
use Carbon\Carbon;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request){
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservations.step-one', compact('reservation', 'min_date', 'max_date'));
   }

   public function storeStepOne(Request $request){
       $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'phone_number' => ['required'],
            'guest_number' => ['required'],
       ]);

       if(empty($request->session()->get('reservation'))){
           $reservation = new Reservation();
           $reservation->fill($validated);
           $request->session()->put('reservation', $reservation);
       }else{
           $reservation = $request->session()->get('reservation');
           $reservation->fill($validated);
           $request->session()->put('reservation', $reservation);
       }

       return to_route('reservations.step.two');
   }

   public function stepTwo(Request $request){
    $reservation = $request->session()->get('reservation');
    $res_table = Reservation::orderBy('res_date')->get()->filter(function($value) use($reservation){
        return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d');
    })->pluck('table_id');
    $tables = Table::where('status', TableStatus::Available)
    ->where('guest_number', '>=', $reservation->guest_number)
    ->whereNotIn('id', $res_table)->get();
    return view('reservations.step-two', compact('reservation', 'tables'));
}
    public function storeStepTwo(Request $request){
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        if (auth()->check()) {
            $reservation->user_id = auth()->user()->id;
        }
        $reservation->save();
        $request->session()->forget('reservation');

        return redirect('/')->with('success', 'Thank you for your reservation!');

    }
}
