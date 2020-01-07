<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
    	$this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $mama = $contact->save();

        Toastr::success('Your Message Is Successfully Sent , Wait For Our Reply Please....', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
