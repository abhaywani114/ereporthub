<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\reportProfiles;

class ReportProfilesController extends Controller
{
    //
      public function __construct() {
      	  $this->middleware('auth');
        $this->middleware('subscription');
    }

    public function index()
    {
 		$data = reportProfiles::where("username",Auth::user()->username)->orderBy('created_at','DESC')->paginate(15)->onEachSide(1);
    	return view('admin.reportprofile',compact('data'));
    }

    public function store(Request $request) {
  
    		$data = $request->validate([
            "name" => ['required'],
            "unit" => ['required'],
            "min_range" => ['required','integer'],
            "max_range" => ['required','integer'],
            "cost" => ['required','integer']
       		 ]);

    		$data['username'] = Auth::user()->username;

    		reportProfiles::create($data);

    		return back()->with('status',"Report Added");
 
    }

     public function destroy(Request $request)
    {
    	$data = $request->validate([
            "id" => ['required'],
		]);
		$id = $request->id;
		$reportProfile = reportProfiles::where(['id'=>$url,'username'=>Auth::user()->username])->first();
		$reportProfile->delete();
		return  response()->json([ 'status' => 'deleted']);
    }

    public function show($id) {
        $data = reportProfiles::findOrFail($id);
        return response()->json($data);
    }

}
