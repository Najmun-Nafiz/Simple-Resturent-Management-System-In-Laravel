<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation\Reservation;
use Brian2694\Toastr\Facades\Toastr;

use App\Notifications\ReservationConfirmed;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request,$id)
    {
        

        $reserve = Reservation::find($id);
        $reserve->status = true;
        $reserve->save();


        // Notification::route('mail', $reserve->email )
        //     ->notify(new ReservationConfirmed());

        Notification::route('mail',$reserve->email)
            ->notify(new ReservationConfirmed());

        // Toastr::success('Reservation Is Confirmed.....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Reservation Is Confirmed....');
    }


    public function not_confirm(Request $request,$id)
    {
        $reserve = Reservation::find($id)->WHERE('id',$id)->update(['status'=>0]);
        

        Toastr::success('Reservation Is Not-Confirmed....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('successMsg','Reservation Is Not Confirmed....');
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id)->delete();
        Toastr::success('Reservation request seccessfully sent , We will confirm to you soon.', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
