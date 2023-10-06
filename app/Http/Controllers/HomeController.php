<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function chk()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->user_type;
            
            // dd($usertype);
    
            if ($usertype == 'user') {
                return view('home');
            } else if ($usertype == 'admin') {
            //    redirect()-> return route('show');
            $users = User::where('user_type', 'admin')->pluck('name');
            
            // Pass the $users variable to the 'show' route
            return redirect()->route('show', compact('users'));
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $ed = User::where('user_type',"user")->get();
        $data = compact('ed');
        return view('admindashboard')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editcust = User::find($id);
       
        $data = compact(['editcust']);
        
       return view('editcustomer')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $data->name   = $request['name'];
        $data->email = $request['email'];
        $data->save();
        return redirect()->route('show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deluser = User::find($id);
        $deluser->delete();
        return redirect()->route('show');
    }
}
