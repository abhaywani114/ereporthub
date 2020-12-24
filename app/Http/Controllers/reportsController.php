<?php

namespace App\Http\Controllers;

use App\reports;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;
use Mail;
use \App\reportProfiles;
use \App\Bill;

class reportsController extends Controller
{

        public function __construct() {
            $this->middleware('auth', ['except' => ['process_getreport', 'getreport','show','download']]);
            $this->middleware('subscription', ['except' => ['process_getreport', 'getreport','show','download']]);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $data = reports::where("username",Auth::user()->username)->orderBy('created_at','DESC')->paginate(15)->onEachSide(1);
        return view("admin.reportList",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $report = reportProfiles::where('username',Auth::user()->username)->pluck('id','name');
        $paitent = Bill::where(['username'=>Auth::user()->username,"status"=>'pending'])->get();
   
        return view('admin.createReport',compact('report','paitent'));
    }


    public function generate(Request $request) {
        $r = $request->validate([
            "bill_id" => ['required']
        ]);

          $bill = Bill::where(
            ['id'=>$request->bill_id, 'username'=>Auth::user()->username,"status"=>'pending'])->first();

          if (!$bill) {
            return back()->with('error_custom',"Bill not found.");
          }

           $paitent = Bill::where(['username'=>Auth::user()->username,"status"=>'pending'])->get();
            $report = reportProfiles::where('username',Auth::user()->username)->pluck('id','name');

             return view('admin.createReport',compact(['report','paitent','bill']));

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
        $r = $request->validate([
            "name" => ['required'],
            "addr" => ['required'],
            "phone" => ['required'],
            "gender" => ['required'],
            "eMail" => [],
            "age" => ['required',"numeric","max:255"],
            "report_name" => ['required'],
            "footnote"=>[],
        ]);
        global $pname,$email,$report_name;
        $pname = $request->name;
        $pgender = $request->gender;
        $email  = $request->eMail;
        $report_name = $request->report_name;
        $report = null;
        $rname  = $request->rname;
        $result = $request->result;
        $unit = $request->unit;
        $flag = $request->flag;
        $cost = $request->cost;
        $refMax = $request->refMax;
        $refMin = $request->refMin;
        foreach ($rname as $key => $value) {
            # code...
            $report[]  = array(
                "name"=>$rname[$key],
                "result"=>$result[$key],
                "unit" => $unit[$key],
                "refMax" => $refMax[$key],
                "refMin" => $refMin[$key],
                "ref" => $refMin[$key]."-".$refMin[$key],
                "cost" => $cost[$key],
                "flag" =>  $result[$key] > $refMax[$key] ? "High":$result[$key] < $refMax[$key] ? "Low":"Normal",
            );
        }
                
                    $totalCost = array_reduce(array_map(function($e){
                        return $e['cost'];
                    }, $report), function($e1,$e2) {
                        return $e1 + $e2;
                    });
                    
                    $r['cost'] = $totalCost;
                    $r['username'] = Auth::user()->username;
                    $r['report'] = json_encode($report);
                    $r['report_id'] = strtoupper(uniqid());
                    $r['report_url'] = md5( $r['report_id'] );
                    $url =  env('APP_URL').'/report/'.$r['report_url'];
                    $short_url = app('textLocal')->short_url($url);
                    $report_id = $r['report_id'];
                    $new_r = reports::create($r);


                     if ($request->has('bill')) {
                        $bill_id = $request->bill;
                        $bill  = Bill::find($bill_id);
                        $bill->status = 'done';
                        $bill->save();
                     }


                     $data = \App\sms::where("username",Auth::user()->username)->orderBy('created_at','DESC')->first();
                    if ($data->balance > 0) {
                    $sms = app('textLocal');
                    $numbers = array($r['phone']);
                    $sender = 'TXTLCL';
                    $message = "Report for $report_name of $pname had been generated.\nReport Id: $report_id\nReport Link: $short_url \nTeam eReportHub";
         
         
                         $response =  $sms->sendSms($numbers, $message, $sender);
    
                    if (gettype($response) != 'object') {
                    if  ($response == 192) {
                       $text = "Report Updated but SMS can't be sent as: Messages can only be sent between 9am to 9pm as restricted by TRAI NCCP regulation"; 

                    } elseif ($response == -7) { 
                          $text = "Report Updated but SMS Server had an error. Please report to support!";
                    }  elseif ($response == -4) { 
                          $text = "Report Updated. SMS ERROR:  No recipients specified.";
                    } else  {
                                $text = "Report Updated but SMS Server had an error. Please report to support!";
                    } 

                    } else {
                        if ($response->status == 'success') {
                           $data->balance = $data->balance - 1;
                            $data->update();
                            $new_r->SMS = 1;
                            $new_r->update();
                          $text = "Report Updated and notification sent to paitent";
                        } else {
                            $text = "Report Updated but SMS Server had an error. Please report to support!";
                        }
                    }
               
                    } else {
                        $text = "Report Updated. But can't send sms as your credits exausted";
                    }




                    if ($email) {

                        $d = array("name" => $pname, "url" => $url,'report_name'=>$report_name);

                        Mail::send('email.report',compact('d') , function($message) {
                             global $email,$pname;
                           $message->from('champwani@gmail.com');
                           $message->to($email, $pname)->subject("Medical Report - eReport Hub");
                       });
                    }

                    return redirect('/dashboard/report/new/')->with('status',$text);
       
       

    }

     /**
     * Display the specified resource.
     *
     * @param  \App\reports  $reports
     * @return \Illuminate\Http\Response
     */

    public function resend(reports $reports, $report_url) {
        $report = $reports->where('report_url',$report_url)->first();
        $username = Auth::user()->username;

        if ($report == null) {
            dd('repornotfound');
        } elseif($report->username !=  $username) {
            dd('invalid access');
        }


        $data = \App\sms::where("username",Auth::user()->username)->orderBy('created_at','DESC')->first();

        if ($data->balance > 0) {
                    $sms = app('textLocal');
                    $numbers = array($report->phone);
                    $sender = 'TXTLCL';
                    $report_id = $report->report_id;
                    $report_name = $report->report_name;
                    $pname = $report->name;
                    
                     $url =  env('APP_URL').'/report/'.$report->report_url;
                    $short_url = app('textLocal')->short_url($url);

                    $message = "Report for $report_name of $pname had been generated.\nReport Id: $report_id\nReport Link: $short_url \nTeam eReportHub";
         
         
                         $response =  $sms->sendSms($numbers, $message, $sender);
    
                    if (gettype($response) != 'object') {
                    if  ($response == 192) {
                       $text = "Report Updated but SMS can't be sent as: Messages can only be sent between 9am to 9pm as restricted by TRAI NCCP regulation"; 

                    } elseif ($response == -7) { 
                          $text = "Report Updated but SMS Server had an error. Please report to support!";
                    }  elseif ($response == -4) { 
                          $text = "SMS ERROR:  No recipients specified.";
                    } else  {
                                $text = "SMS Server had an error. Please report to support!";
                    } 

                    } else {
                        if ($response->status == 'success') {
                           $data->balance = $data->balance - 1;
                            $data->update();
                             $report->SMS = 1;
                             $report->update();

                          $text = "Notification sent to paitent";
                        } else {
                            $text = "SMS Server had an error. Please report to support!";
                        }
                    }
               
                    } else {
                        $text = "Can't send sms as your credits exausted";
                    }

                    return redirect()->back()->with('status',$text);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function show(reports $reports,$url)
    {
        //
        $report = $reports->where('report_url',$url)->first();

        if ($report == null) {
            $note = 'ReportNotFound';
            return view('notification',compact('note'));
        }

        return view('admin.view_report',compact('report'));
    }


    public function search (Request $request,reports $reports) {

            if($request->q != null or $request->if_date == 'on') {
                if ($request->if_date == 'on') {
                    $s_date = date("Y-m-d",strtotime($request->input('s_date')));
                    $e_date = date("Y-m-d",strtotime($request->input('e_date')."+1 day"));
                }
if ($request->q != null and $request->if_date == 'on') {
$data = $reports->where('username',Auth::User()->username)->whereLike(['name','addr','phone','report_name','eMail','report_id','created_at'],$request->q)->whereBetween('created_at',[$s_date,$e_date])->paginate(15)->onEachSide(1);
$beta = "Searching for $request->q between $s_date to $request->e_date"; 
 } elseif ($request->q == null and $request->if_date == 'on') {
    
    $data = $reports->where('username',Auth::User()->username)->whereBetween('created_at',[$s_date,$e_date])->paginate(15)->onEachSide(1);
    $beta = "Searching between $s_date to $request->e_date"; 
 } else {
   $data = $reports->where('username',Auth::User()->username)->whereLike(['name','addr','phone','report_name','eMail','report_id','created_at'],$request->q)->paginate(15)->onEachSide(1);
    $beta = "Searching for $request->q"; 
 }

 return view('admin.reportList',compact(['data','beta']))->with('status',"Searching for $request->q");
            }
            return view("admin.searchReport");
    }


        public function getreport() {
            return view("admin.getReport");
        }

        public function process_getreport(Request $request,reports $reports) {

             $request->validate([
                "r_id" => ['required']
            ]);
             $id = $request->r_id;

             $r = $reports->where('report_id',$id)->first();
             if ($r == null) {
                return back()->with('not_found',"Report not found");
             } 

               return redirect("/report/$r->report_url");
        }


        public function download(reports $reports,$url) {


        $report = $reports->where('report_url',$url)->first();

        if ($report == null) {
            $note = 'ReportNotFound';
            return view('notification',compact('note'));
             }

        // return view('admin.view_report',);
        // $data = ['title' => 'Welcome to HDTuto.com'];

        $pdf = PDF::loadView('myPDF', compact('report'));
        //$pdf->set_option('font_dir', storage_path('fonts/'));
     return $pdf->stream();

        return $pdf->download("Report $report->name.pdf");
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(reports $reports,$report_url)
    {
        //

        $report = $reports->where('report_url',$report_url)->first();
        if ($report->username != Auth::User()->username) {
         return   redirect()->back()->with('status','Not able to delete report');
        }
        $report->delete();
        return redirect('/dashboard/report');
    }



    public function search2 (Request $request,reports $reports,$q, $s_d,$e_d) {

            if($q != null or ($s_d !=  0 and $e_d != 0)) {
                if (($s_d !=  0 and $e_d != 0)) {
                    $s_date = date("Y-m-d",strtotime($s_d));
                    $e_date = date("Y-m-d",strtotime($e_d));
                }
if ($request->q != null and ($s_d !=  0 and $e_d != 0)) {
$data = $reports->where('username',Auth::User()->username)->whereLike(['name','addr','phone','report_name','eMail','report_id','created_at'],$request->q)->whereBetween('created_at',[$s_date,$e_date])->paginate(15)->onEachSide(1);
$beta = "Searching for $request->q between $s_date to $e_date"; 
 } elseif ($request->q == null and ($s_d !=  0 and $e_d != 0)) {
    
    $data = $reports->where('username',Auth::User()->username)->whereBetween('created_at',[$s_date,$e_date])->paginate(15)->onEachSide(1);
    $beta = "Searching between $s_date to $e_date"; 
 } else {
   $data = $reports->where('username',Auth::User()->username)->whereLike(['name','addr','phone','report_name','eMail','report_id','created_at'],$request->q)->paginate(15)->onEachSide(1);
    $beta = "Searching for $q"; 
 }

 return view('admin.reportList',compact(['data','beta']))->with('status',"Searching for $q");
            }
            return view("admin.searchReport");
    }
}
