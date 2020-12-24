
@section('title','Report - eReportHub')

@extends('layout.main')
@section('css')
     

     @media only screen and (min-width: 674px) {
 	.pad_30{padding:30px};
  
    }

	@media only screen and (max-width: 673px) {
		.pad_30{padding-top:30px;}
    }
    .invalid-feedback{color:red}
    .alert-success{color:green}
    .hdg {text-align:center}

    .headding{font-weight: 500 !important;}
    .subHeadding {font-weight: 400 !important;}

    @media print {

  .bottom {position:absolute;t;bottom:0}
  .hidden{display:none;}
}

        @CHARSET "UTF-8";
        .page-break {
            page-break-after: always;
            page-break-inside: avoid;
            clear:both;
        }
        .page-break-before {
            page-break-before: always;
            page-break-inside: avoid;
            clear:both;
        }
            .alert-success{color:green}
@endsection

@php
$lab  = \App\labs::where('username',$report->username)->first();
$user  = \App\User::where('username',$report->username)->first();
$data = json_decode($report->report,true);


@endphp

@section('js')
<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>
@endsection

@section('content')
<style type="text/css">
    #link_move > div {background: #fff0 !important;}
    #print > div.pad_30 {background: #fff !important}
</style>
<div class="cointainer col-lg-9" style="margin: 8vh auto;;">
    <div id="print">
        <div class="text-center hidden nav_top_rep" style="background: #000865;color: #fff;"><span><a href="/report/download/{{$report->report_url}}" ><strong>Download Report</strong></a> | <a href="#" onclick="printDiv('print')"><strong>Print Report</strong></a> @if ($report->username == (Auth::User() ? Auth::User()->username:null)) | <a href="/report/resend/{{$report->report_url}}" ><strong>Resend SMS</strong></a> | <a href="/report/delete/{{$report->report_url}}" ><strong>Delete</strong></a> @endif </span>
                @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                        </div>
                    @endif
        </div>
    <div class="pad_30">
        <div class="row">
            <div class="col-md-3">
        <img class="responsive" src="{{ asset('/uploads/logos')}}/{{App\labs::where('username',$lab->username)->first()->logo}}" alt="login" style="margin:auto;display:block;height: 100%;width: 100%;" height='auto' width='120'/>
    </div>


            <div class="col-md-9">
                <h1 class="headding">{{ Auth::user()->name }}<span style='font-size: 15px;    float: right;'>Redg No: {{$lab->regd_id}}</span></h1>
                <h4 class="subHeadding">Email: {{$user->email}} | Phone: {{$lab->phone_no}}</h4>
                <h4 class="subHeadding">{{$lab->address}} - {{$lab->PO}} | {{$lab->country}}</h4>
            </div>
            
    </div>
  
    <hr style="clear:both;margin-top:0; " />
    <style type="text/css">.faded{color:#aaa;}.nav_top_rep>span>a{color:#fff; margin: 0px 30px;}</style>
<div>
        <h6 style="word-spacing: 6px;font-size: 14px;font-weight: 400;"><small>Report Name:</small> {{$report->report_name}} <span class="faded">|</span> <small>Report Id:</small>  {{$report->report_id}} <span class="faded">|</span> <small>Date:</small> {{date('d F Y',strtotime($report->created_at))}}</h6>

    <h4 style="letter-spacing: 1.2px;font-size: 17px;clear:both;"><small>Patient Name:</small> {{$report->name}} <span class="faded">|</span> <small>Patient Age:</small> {{$report->age}} <span class="faded">|</span> <small>Gender:</small> {{$report->gender}} <span class="faded">|</span>  <small>Address:</small> {{$report->addr}}</h4>
</div>
<div style="min-height:50vh">
    <br/>
    <table class="table">
                <thead>
                    <tr>
                    <th>Property</th>
                    <th>Result</th>
                    <th>Unitis</th>
                    <th>Flag</th>
                    <th>Refference</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                    <tr>
                        <td>{{$p['name']}}</td>
                        <td>{{$p['result']}}</td>
                        <td>{{$p['unit']}}</td>
                        <td>{{$p['flag']}}</td>
                        <td>{{$p['ref']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>    

</div>
<div class="bottom" >
   @if ($report->footnote != null)<p><strong>Footnote:</strong>{{$report->footnote}}</p>@endif
     <div style="border-top: 1px solid #000;bottom: 0;padding-top:5px ">
    <h6 >Report Generated By: eReport Hub</h6>
    <h7 class='hidden'>Thanks for using it!</h7><br/>
</div>
</div>
</div>
</div>
  </div>
@endsection