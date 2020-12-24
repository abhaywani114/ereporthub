<?php

namespace App\Http\Controllers;

use App\subscriptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class subscription extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = subscriptions::where("username",Auth::user()->username)->orderBy('due_date','DESC')->paginate(15)->onEachSide(1);
        return view('admin.subscription_status',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(subscriptions $subscriptions)
    {
        //
                 $subscriptions->create([
                                "username"=> Auth::user()->username,
                                "subscription" => "100@One Month",
                                "tx_no" => md5(Auth::user()->username),
                                "due_date" => carbon::now()->addRealMonth(), 
                            ]);
                 return $subscriptions;
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
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function show(subscriptions $subscriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(subscriptions $subscriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscriptions $subscriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscriptions $subscriptions)
    {
        //
    }


    public function buy() {
        return view('admin.buySubscription');
    }
}
