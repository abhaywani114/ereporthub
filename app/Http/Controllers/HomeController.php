<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard() {
            $due_date = \App\subscriptions::where('username',Auth::user()->username)->orderBy('due_date','DESC')->first()->due_date;
             $data_sms = \App\sms::where("username",Auth::user()->username)->orderBy('created_at','DESC')->first()->balance;

            return view('admin.dashboard',compact(['due_date',['data_sms']]));
    }


    public function ContactSupport()
    {
        return view('admin.ContactSupport');
    }

    public function SendContactSupport(Request $request)
    {
        global $data;
        $data = $request->validate([
                "name"=> ['required'],
                "email" => ['required','email'],
                "subject" => ['required'],
                "message" => ['required'],
        ]);

               Mail::send('email.contact_support',compact('data') , function($message) {
                             global $data;
                            $sub = $data['subject'];
                           $message->from($data['email'],$data['name']);
                           $message->to('abhaywani114@gmail.com','Abrar Ajaz')->subject("$sub | Contact Request");
            });

           return redirect()->back()->with('status','Contact Request Sent!');
    }

    public function faq() {
        return view('admin.faq');
    }

    public function aboutUs() {
        return view('company.aboutus');
    }

        public function contactUs() {
        return view('company.contact');
    }

    public function pricing()
    {
        # code...
        return view('company.pricing');
    }


    public function terms()
    {
        # code...
        return view('company.terms');
    }

    public function privacy()
    {
        # code...
        return view('company.privacy');
    }

    public function investor()
    {
        # code...
        return view('company.investor');
    }


    public function sendContactUs(Request $request) {
                global $data;
                $data = $request->validate([
                "name"=> ['required'],
                "email" => ['required','email'],
                "subject" => ['required'],
                "message" => ['required'],
                ]);
        try {

            Mail::send('email.contact_support',compact('data') , function($message) {
                    global $data;
                    $message->from($data['email'],$data['name']);
                    $sub = $data['subject'];
                    $message->to('abhaywani114@gmail.com','Abrar Ajaz')->subject("$sub | Contact Request");
            });

        } catch (Exception $e) {
            return redirect('/notification/subscription_expi');
        }

           return redirect()->back()->with('status','Contact Request Sent!');
    }

}
