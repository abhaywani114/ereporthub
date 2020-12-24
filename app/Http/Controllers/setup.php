<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\labs;
use App\sms;
use Illuminate\Support\Facades\Auth;
use App\subscriptions as subs;
use Carbon\Carbon;

class setup extends Controller
{
    //
        public function __construct()
    {
        $this->middleware('auth');
    }


    	public function setup1() {
			return view('admin.setup.profilesetup');
    	}


    	public function update_setup1(Request $request) {


    		       $r =  $request->validate([
				            "address" => ["required"],
				            "PO" => ["required"],
				            "phone_no" =>["required"],
				            "country" => ["required"],
				            "regd_id" => ["required"],
			       ]);

                    if($request->hasfile('logo')) 
                    { 
                      $file = $request->file('logo');
                      $extension = $file->getClientOriginalExtension(); // getting image extension
                      $filename =time().'.'.$extension;
                      $file->move('uploads/logos/', $filename);
                      $r['logo'] = $filename;
                    } else {
                        $r['logo'] = 'default.png';
                    }

			       $r['username'] = Auth::user()->username;

			       labs::create($r);
			       return redirect('/dashboard/Setup2');

    	}


    	    	public function setup2() {
    	    		   if (subs::where(['username'=>Auth::user()->username,'subscription'=>'Trial 30 Days'])->get()->count() > 0) {
					         return redirect('/dashboard');
					     }

			return view('admin.setup.trial');
    	}


    	public function update_setup2(Request $request) {

    				if ($request->start_trial) {
    						if (subs::where('username',Auth::user()->username)->get()->count() > 0) {
    							 return redirect('/notification/Error');
    				}

    						subs::create([
    							"username"=> Auth::user()->username,
    							"subscription" => "Trial 30 Days",
    							"tx_no" => md5(Auth::user()->username),
    							"due_date" => carbon::now()->addRealMonth(), 
    						]);

                                        sms::create([
                                "username"=>Auth::user()->username,
                                "plane_name"=>"Trial 10",
                                "sms_credit"=>"10",
                                "balance"=>"10",
                                "tx_no" => md5(Auth::user()->username),
                            ]);

    				}
			       return redirect('/dashboard');

    	}
}
