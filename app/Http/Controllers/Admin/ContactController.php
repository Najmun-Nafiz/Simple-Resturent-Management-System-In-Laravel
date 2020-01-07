<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.message.index',compact('contacts'));
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
    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'name' => 'required',
    //         'email' => 'required',
    //         'subject' => 'required',
    //         'message' => 'required',
    //     ]);
    //     $contact = new Contact();
    //     $contact->name = $request->name;
    //     $contact->email = $request->email;
    //     $contact->subject = $request->subject;
    //     $contact->message = $request->message;
    //     $mama = $contact->save();

    //      Toastr::success('Your Message Is Successfully Sent , Wait For Our Reply Please..***???..', 'Success', ["positionClass" => "toast-top-right"]);
    //     return redirect()->back();
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.message.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request,$id)
    {
        $contact = Contact::find($id);
        return view('admin.message.reply',compact('contact'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request,$id)
    {
        $this->validate($request,[
            'reply_message' => 'required',
        ]);
        $contact = new Contact();
        $contact->message = $request->reply_message;
        $mama = $contact->save();

        Notification::route('mail', $contact->email )
            ->notify(new ReservationConfirmed());

        Toastr::success('Your Reply-Message Is Successfully Sent..', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect('admin.message.index')->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
       Toastr::success('Your Message Is Successfully Sent , Wait For Our Reply Please..***???..', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
