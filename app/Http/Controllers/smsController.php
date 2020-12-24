<?php

namespace App\Http\Controllers;

use App\sms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class smsController extends Controller
{
    //
    public function history()
    {
    	 $data = sms::where("username",Auth::user()->username)->orderBy('created_at','DESC')->paginate(15)->onEachSide(1);

        return view('admin.sms_CreditHistory',compact('data'));
    }

       public function buy() {
        return view('admin.sms_pricing');
    }
}
