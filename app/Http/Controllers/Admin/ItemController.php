<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use\Carbon\Carbon;
use App\Http\Controllers\Controller;
use\App\Admin\Item;
use\App\Admin\Category;
use Redirect;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/item')) {
                mkdir('uploads/item',0777,true);
            }
            $image->move('uploads/item',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $items = new Item();
        $items->name = $request->name;
        $items->category_id = $request->category_id;
        $items->description = $request->description;
        $items->price = $request->price;
        $items->image = $imagename;
        $items->save();

        return redirect()->back()->with('successMsg','Category Added Successfully.....');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit',compact('item','categories'));
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
         $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $items = Item::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'
            .$image->getClientOriginalExtension();

            if (!file_exists('uploads/item')) {
                mkdir('uploads/item',0777,true);
            }
            unlink('uploads/item/'.$items->image);
            $image->move('uploads/item',$imagename);
        }
        else{
            $imagename = $items->image;
        }

        
        $items->name = $request->name;
        $items->category_id = $request->category_id;
        $items->description = $request->description;
        $items->price = $request->price;
        $items->image = $imagename;
        $mama = $items->update();

        if($mama){
            return redirect()->route('admin.item.index')->with('successMsg','Item Updated Successfully....');
        }
        else{
            return redirect()->back()->with('errorMsg','There have error....!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        unlink('uploads/item/'.$item->image);
        $item->delete();
        return redirect()->back()->with('successMsg','Slider Deleted Successfully Wuth Directory Image....');
    }
}
