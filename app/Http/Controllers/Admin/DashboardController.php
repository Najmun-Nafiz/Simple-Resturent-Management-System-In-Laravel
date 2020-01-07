<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Admin\Slider;
use\App\Admin\Category;
use\App\Admin\Item;
use App\Admin\Contact;
use\App\Reservation\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
    	$sliders = Slider::count();
    	$categories = Category::count();
    	$items = Item::count();
    	$contacts = Contact::all();
    	$reservations = Reservation::where('status',false)->get();
    	return view('admin.dashboard',compact('sliders','categories','items','reservations','contacts'));
    }
}
