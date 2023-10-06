<?php

namespace App\Http\Controllers;

use App\Models\FoodModel;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('foodform');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "category" => "required",
            "img" => "required"
           ]);
           $imagename = time() . "img1." . $request->file('img')->getClientOriginalExtension();
        $request->file('img')->move(public_path('uploads'), $imagename);
           $data = new FoodModel();
           $data->name = $request['name'];
           $data->Description = $request['description'];
           $data->Price = $request['price'];
           $data->category = $request['category'];
           $data->image = $imagename;
           $data->save();
          return redirect()->route('fooddashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $ed = FoodModel::all();
        $data = compact('ed');
        return view('foodsdashboard')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editcust = FoodModel::find($id);
       
        $data = compact(['editcust']);
        
       return view('foodedit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = FoodModel::find($id);
        $data->name = $request['name'];
        $data->Description = $request['description'];
        $data->Price = $request['price'];
        $data->category = $request['category'];
        $data->save();
       return redirect()->route('fooddashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deluser = FoodModel::find($id);
        $deluser->delete();
        return redirect()->back();
    }
}
