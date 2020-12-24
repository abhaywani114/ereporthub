<?php

namespace App\Http\Controllers;

use App\labs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class labController extends Controller
{


    public function __construct() {
        $this->middleware('subscription');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function show(labs $labs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function edit(labs $labs)
    {
        //

        return view('admin.profileEdit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, labs $labs)
    {
        //

                $r =  $request->validate([
                            "address" => ["required"],
                            "PO" => ["required"],
                            "phone_no" =>["required"],
                            "country" => ["required"],
                            "regd_id" => ["required"],
                   ]);

                    if ($request->change_pwd) {
                        $pwd = $request->validate([
                            "password" => ["required","confirmed","min:8"],
                       ]);
                            $password = $request->password;
                            Auth::user()->password = Hash::make($password);
                            Auth::user()->save();
                    }
                    if($request->hasfile('logo')) 
                    { 
                      $file = $request->file('logo');
                      $extension = $file->getClientOriginalExtension(); // getting image extension
                      $filename =time().'.'.$extension;
                      $file->move('uploads/logos/', $filename);
                      $r['logo'] = $filename;
                    }

                   $labs->where('username',Auth::user()->username)->update($r);

              return redirect('/notification/profile_update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\labs  $labs
     * @return \Illuminate\Http\Response
     */
    public function destroy(labs $labs)
    {
        //
    }
}
