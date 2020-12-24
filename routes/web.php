<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Lubusin\Mojo\Mojo;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('index');
});
// use \App\Service\textlocal;

Route::get('/home',function() {
	$sms = app('textLocal');
	dd($sms->_sendRequest('balance'));
	
	return redirect('/');
});


Route::get('/dashboard','HomeController@dashboard')->middleware('auth')->middleware('newUser')->middleware('subscription');

Route::get('/notification/{note}',function($note){
	return view('notification',compact('note'));
});

//setup Routes
//basic informatiom
Route::get('/dashboard/Setup1',"setup@setup1")->middleware('auth')->middleware('oldUser');
Route::post('/dashboard/Setup1',"setup@update_setup1")->middleware('auth');

Route::get('/dashboard/Setup2',"setup@setup2")->middleware('auth');//->middleware('subscription');
Route::post('/dashboard/Setup2',"setup@update_setup2")->middleware('auth');


//Lab Routes
Route::get("dashboard/lab","labController@index")->middleware('auth')->middleware('subscription');
Route::get("dashboard/lab/ProfileEdit","labController@edit")->middleware('auth')->middleware('subscription');
Route::post("dashboard/lab/ProfileEdit","labController@update")->middleware('auth')->middleware('subscription');

//Subscription Routes
Route::get("dashboard/subscription","subscription@index")->middleware('auth');
Route::get("dashboard/subscription/buy","subscription@buy")->middleware('auth');

//Contact Support
Route::get("dashboard/ContactSupport","HomeController@ContactSupport")->middleware('auth');
Route::post("dashboard/ContactSupport","HomeController@SendContactSupport")->middleware('auth');

//FAQ
Route::get("dashboard/FAQ","HomeController@faq")->middleware('auth');

//SMS
Route::get("dashboard/SMS/CreditHistory","smsController@history")->middleware('auth')->middleware('subscription');
Route::get("dashboard/SMS/buy","smsController@buy")->middleware('auth')->middleware('subscription');



//company
Route::get('/company/AboutUs','HomeController@aboutUs');
Route::get('/company/ContactUs','HomeController@contactUs');
Route::get('/company/pricing','HomeController@pricing');
Route::post('/company/ContactUs','HomeController@sendContactUs');
Route::get('/company/terms','HomeController@terms');
Route::get('/company/privacy','HomeController@privacy');
Route::get('/company/investor','HomeController@investor');


Auth::routes();
// Route::get('/logout','Auth\LoginController@logout');
// Route::get('/home', 'HomeController@index')->name('home');


//Reports
Route::get('dashboard/report/new',"reportsController@create");
Route::post('dashboard/report/new',"reportsController@store");
Route::get('dashboard/report',"reportsController@index");
Route::get('report/{url}',"reportsController@show");
Route::get('dashboard/report/search',"reportsController@search");
Route::get('getreport',"reportsController@getreport");
Route::post('getreport',"reportsController@process_getreport");
Route::get('report/download/{url}',"reportsController@download");
Route::get('report/resend/{report_url}',"reportsController@resend");
Route::get('report/delete/{report_url}',"reportsController@destroy");
Route::get('report',function(){return redirect('/getreport');});
Route::get('/dashboard/report/search/{q}/{s_d}/{e_d}',"reportsController@search2");
Route::post('dashboard/report/new/p',"reportsController@generate")->name('reportFomBill');

//payment
Route::get('/pay/{type}/{plan}','payment@pay');
Route::get('/view/{payment_id?}/{request_id?}','payment@process');

Route::resource('dashboard/reportprofiles', 'ReportProfilesController');
Route::resource('dashboard/bills', 'BillController');