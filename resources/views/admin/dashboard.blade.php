
@section('title','Dashboard - eReport Hub')

@extends('layout.main')

@section('css')
.menu__{font-size:35px;margin:auto;}

@endsection

@section('content')

	<div style="padding-bottom: 40px;">

<h4 class="subscribe-title " style="font-weight: 400;text-align:center;padding-top: 30px;font-weight: 700;" >Dashboard</h4>
<br />
<p style="text-align: center;">
<strong>Subscription Due Date:</strong> <span style="color:green">{{ date('d F Y',strtotime($due_date))	}}</span> | <strong>Sms Credit:</strong> <span style="color:red">{{$data_sms}}</span>
</p><br />
<div class="row">
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/report/new" style="text-decoration: none;"><span class="fa fa-pencil menu__"></span><br/><h7><b>New Report</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/report" style="text-decoration: none;"><span class="fa fa-list menu__"></span><br /><h7><b>Report List</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/report/search" style="text-decoration: none;"><span class="fa fa-search menu__"></span><br><h7><b>Search Report</b></h7></a>
</div>
</div>

<br><hr class="divdr"><br>
<div class="row">
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/bills/create" style="text-decoration: none;"><span class="fa fa-money menu__"></span><br><h7><b>Add Bill</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/bills" style="text-decoration: none;"><span class="fa fa-list menu__"></span><br><h7><b>Bill List</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/reportprofiles" style="text-decoration: none;"><span class="fa fa-cog menu__"></span><br><h7><b>Report Profile</b></h7></a>
</div>
</div>

<br><hr class="divdr"><br>
<div class="row">
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/subscription/buy" style="text-decoration: none;"><span class="fa fa-plus-circle menu__"></span><br><h7><b>Buy Subscription</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/subscription" style="text-decoration: none;"><span class="fa fa-list menu__"></span><br><h7><b>Subscription History</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/lab/ProfileEdit" style="text-decoration: none;"><span class="fa fa-user menu__"></span><br><h7><b>Edit Profile</b></h7></a>
</div>

</div>

<br><hr class="divdr"><br>
<div class="row">
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/SMS/buy" style="text-decoration: none;"><span class="fa fa-inbox menu__"></span><br><h7><b>Add SMS Credit</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/SMS/CreditHistory" style="text-decoration: none;"><span class="fa fa-database menu__"></span><br><h7><b>Credit History</b></h7></a>
</div>
<div class="col-md-4 col-sm-4 col-4 text-center">
<a href="/dashboard/ContactSupport" style="text-decoration: none;"><span class="fa fa-home menu__"></span><br><h7><b>Contact Support</b></h7></a>
</div>
</div>
</div>

</div>
@endsection