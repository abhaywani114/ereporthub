<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Mail;
use \App\reportProfiles;

use \App\Bill;


class BillController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    	$this->middleware('subscription');
    }

    public function create()
    {
        $report = reportProfiles::where('username',Auth::user()->username)->pluck('id','name');   
        return view('admin.createBill',compact('report'));
    }


    public function index()
    {
        $data = Bill::where("username",Auth::user()->username)->orderBy('created_at','DESC')->paginate(15)->onEachSide(1);
        return view("admin.billList",compact('data'));
    }

    public function store(Request $request) {

    	$r = $request->validate([
            "name" => ['required'],
            "addr" => ['required'],
            "phone" => ['required'],
            "gender" => ['required'],
            "eMail" => [],
            "age" => ['required',"numeric","max:255"],
            "report_name" => ['required'],
        ]);

        $bill = null;

        $rname = $request->rname;

		foreach ($rname as $key => $value) {
            $bill[]  = array(
                "name"=>$rname[$key],
                "result"=> '',
                "unit" =>  $request->unit[$key],
                "refMax" => $request->refMax[$key],
                "refMin" => $request->refMin[$key],
                "ref" => $request->refMin[$key]."-".$request->refMin[$key],
                "cost" => $request->cost[$key],
                "flag" =>  '',
            );
        }
		
		$totalCost = array_reduce(array_map(function($e){
			return $e['cost'];
		}, $bill), function($e1,$e2) {
			return $e1 + $e2;
		});

        $r['details']  = json_encode($bill);
        $r['cost'] = $totalCost;
        $r['username'] = Auth::user()->username;

        Bill::create($r);

        return back()->with('status','Bill added');

    }

    public function show($url) {
		
		$report = Bill::where(['id'=>$url,'username'=>Auth::user()->username])->first();

        if ($report == null) {
            $note = 'ReportNotFound';
            return view('notification',compact('note'));
        }

        $pdf = PDF::loadView('invoicepdf', compact('report'));
     	return $pdf->stream();
    }


    public function destroy(Request $request)
    {
    	$data = $request->validate([
            "id" => ['required'],
		]);
		$id = $request->id;
		$bill = Bill::where(['id'=>$id,'username'=>Auth::user()->username])->first();
		$bill->delete();
		return  response()->json([ 'status' => 'deleted']);
    }

}
