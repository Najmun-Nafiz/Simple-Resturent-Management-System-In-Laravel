<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation\Reservation;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
    	$this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'date_and_time' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->date_and_time;
        $reservation->message = $request->message;
        $reservation->status = false;
        $mama = $reservation->save();

        Toastr::success('Reservation request seccessfully sent , We will confirm to you soon.', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
        
    }
}
