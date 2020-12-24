<?php

namespace App\Http\Controllers;


use Lubusin\Mojo\Mojo;
use Illuminate\Support\Facades\Auth;
use \App\sms;
use \App\subscriptions;
use \App\mojo_payment_details as Mojo_details;
use Illuminate\Http\Request;

class payment extends Controller
{
    //

    public function pay($type,$plan)
    {

    		if ($type == 'sms') {
    			if ($plan == 'basic') {
    				$amount = 100;
    				$key = "$plan@$type";
    			} else if ($plan == 'PREMIUM') {
					$amount = 500;
    				$key = "$plan@$type";
    			} else {
    				return back()->with('Invalid Plan');
    			}


    		} else if ($type == 'subscription') {
    				if ($plan == 'basic') {
    				$amount = 50;
    				$key = "$plan@$type";
    			} else if ($plan == 'BI_ANUALLY') {
					$amount = 300;
    				$key = "$plan@$type";
    			} else {
    				 return back()->with('Invalid Plan');
    			}
    		} else {
    			return back()->with('Invalid Plan');
    		}

            $user = Auth::user();

            $phone = \App\labs::where('username',$user->username)->first()->phone_no;
    	
    		$instamojoFormUrl = Mojo::giveMeFormUrl($user,$amount,$key,$phone);
			return redirect($instamojoFormUrl);
    }

    public function process() {

    	$details = Mojo::giveMePaymentDetails();

    	if ($details->payment->status == 'Credit') {
    		$purpose = $details->purpose;
    		$payment_id  = $details->payment->payment_id;
    		$purpose = explode("@", $purpose);

    		$type = $purpose[1];
    		$plan = $purpose[0];
   			$user = $details->buyer_name;
            $user_id = \App\User::where('username',$user)->first()->id;

   			if (!\App\User::where('username',$user)->first()) {
                $note = "user_invalid";
   				return view('notification',compact('note'));
   			}



    		if ($type == 'sms') {
    			$sms_data = sms::where("username",$user)->orderBy('created_at','DESC')->first();
                
                if (sms::where('tx_no',$payment_id)->first()) {
                $note = "linkExpire";
                $pay_id = $payment_id;
                return view('notification',compact(['note','pay_id']));
                }


    			$left = $sms_data->balance;
    			$sms_data->balance = 0;
    			$sms_data->update();


    			if ($plan == 'basic') {
    				$sms_cr = 200;
    				$new_bal = $left + $sms_cr;
    			} elseif ($plan == 'PREMIUM') {
    				$sms_cr = 1000;
    				$new_bal = $left + $sms_cr;
    			}


                    Mojo_details::create([
                        "user_id"=> $user_id,
                        "buyer_name"=> $details->buyer_name,
                        "buyer_email"=> $details->email,
                        "buyer_phone"=> $details->phone,
                        "currency"=> $details->payment->currency,
                        "amount"=> $details->amount,
                        "fees"=>$details->payment->fees,
                        "longurl"=> $details->longurl,
                        "payment_id"=> $details->payment->payment_id,
                        "payment_request_id"=> $details->payment->payment_request,
                        "purpose"=> $details->purpose,
                        "shorturl"=> $details->shorturl,
                        "request_status"=> $details->status,
                        "payment_status"=> $details->status,
                    ]);
               
 
    			    sms::create([
    					"username"=>$user,
    					"plane_name"=>"$plan",
    					"sms_credit"=>"$sms_cr",
                        "tx_no"=>$payment_id,
    					"balance"=>"$new_bal"
    				]);



                $note = "smsCreditAdded";
                return view('notification',compact('note'));


    		} else if ($type == 'subscription') {

                 if (subscriptions::where('tx_no',$payment_id)->first()) {
                $note = "linkExpire";
                $pay_id = $payment_id;
                return view('notification',compact(['note','pay_id']));
                }
    
    $due_Date = subscriptions::where('username',Auth::user()->username)->orderBy('due_date','DESC')->first()->due_date;


    				if ($plan == 'basic') {
    				$new_due_date = \Carbon\carbon::create($due_Date)->addMonths(1);
    			} elseif ($plan == 'BI_ANUALLY') {
    				$new_due_date = \Carbon\carbon::create($due_Date)->addMonths(6);
    			}

                Mojo_details::create([
                        "user_id"=> $user_id,
                        "buyer_name"=> $details->buyer_name,
                        "buyer_email"=> $details->email,
                        "buyer_phone"=> $details->phone,
                        "currency"=> $details->payment->currency,
                        "amount"=> $details->amount,
                        "longurl"=> $details->longurl,
                        "payment_id"=> $details->payment->payment_id,
                        "payment_request_id"=> $details->payment->payment_request,
                        "purpose"=> $details->purpose,
                        "shorturl"=> $details->shorturl,
                        "fees"=>$details->payment->fees,
                        "request_status"=> $details->status,
                        "payment_status"=> $details->status,
                    ]);

    			    subscriptions::create([
    					"username"=>$user,
    					"subscription"=>"$plan",
    					"tx_no"=>$payment_id,
    					"due_date"=>$new_due_date,
    				]);

                $note = "subscriptionDone";
                return view('notification',compact('note'));
    		}
    		}

    }


}
