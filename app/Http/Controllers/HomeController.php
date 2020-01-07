<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Slider;
use App\Admin\Category;
use App\Admin\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $items = Item::all();
        $categories = Category::all();
        return view('welcome',compact('sliders','categories','items'));
    }

}
