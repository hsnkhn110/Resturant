<?php

namespace App\Http\Controllers;

use App\Models\TblModel;
use Illuminate\Http\Request;

class TblController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
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
            "phone" => "required",
            "number-guests" => "required",
            "date" => "required",
            "time" => "required",
            "message" => "required"
       ]);

       $reservation = new TblModel();
       $reservation->name = $request['name'];
       $reservation->email = $request['email'];
       $reservation->phone_number = $request['phone'];
       $reservation->total_guest = $request['number-guests'];
       $reservation->day = $request['date'];
       $reservation->time = $request['time'];
       $reservation->meassage = $request['message'];
       $reservation->save();
        return redirect()->route('tbldash');
    }
    
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $ed = TblModel::all();
        $data = compact('ed');
        return view('tbldashboard')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $editcust = TblModel::find($id);
       
        $data = compact(['editcust']);
        
       return view('reservationedit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation = TblModel::find($id);
       $reservation->name = $request['name'];
       $reservation->email = $request['email'];
       $reservation->phone_number = $request['phone_number'];
       $reservation->total_guest = $request['total_guest'];
       $reservation->day = $request['day'];
       $reservation->time = $request['time'];
       $reservation->meassage = $request['message'];
       $reservation->save();
        return redirect()->route('tbldash');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deluser = TblModel::find($id);
        $deluser->delete();
        return redirect()->back();
    }
}
