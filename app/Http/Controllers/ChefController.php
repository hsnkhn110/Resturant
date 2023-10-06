<?php

namespace App\Http\Controllers;

use App\Models\ChefModel;
use App\Models\User;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chefform');
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
            "email" => "required",
            "password" => "required",
            "gender" => "required",
            "img" => "required",
            "city" => "required",
            "speciality" => "required"
           ]);
           $imagename = time() . "img1." . $request->file('img')->getClientOriginalExtension();
        $request->file('img')->move(public_path('uploads'), $imagename);
           $data = new ChefModel();
           $data->name = $request['name'];
           $data->email = $request['email'];
           $data->password = $request['password'];
           $data->gender = $request['gender'];
           $data->image = $imagename;
           $data->city = $request['city'];
           $data->Speciality = $request['speciality'];
           $data->save();
          return redirect()->route('chef_dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $ed = ChefModel::all();
        $data = compact('ed');
        return view('chefdash')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editcust = ChefModel::find($id);
       
        $data = compact(['editcust']);
        
       return view('Chefcustomer')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $imagename = time() . "img1." . $request->file('img')->getClientOriginalExtension();
        // $request->file('img')->move(public_path('uploads'), $imagename);
        $data = ChefModel::find($id);
           $data->name = $request['name'];
           $data->email = $request['email'];
           $data->password = $request['password'];
           $data->gender = $request['gender'];
        //    $data->image = $imagename;
           $data->city = $request['city'];
           $data->Speciality = $request['speciality'];
           $data->save();
          return redirect()->route('chef_dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deluser = ChefModel::find($id);
        $deluser->delete();
        return redirect()->route('chef_dashboard');
    }
}
