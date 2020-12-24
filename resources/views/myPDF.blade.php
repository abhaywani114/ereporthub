@php
$lab  = \App\labs::where('username',$report->username)->first();
$user  = \App\User::where('username',$report->username)->first();
$data = json_decode($report->report,true);
@endphp

<!DOCTYPE html>

<html>

<head>

	<title>Report {{$report->name}}.pdf</title>
<link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
<style type="text/css">
	

 * {
      font-family: 'Tajawal', sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }

	.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}
table {
    border-collapse: collapse;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
th {
    text-align: center;
    background: #000865;
    color: #fff;
    font-family: 'Inconsolata', monospace;
}

tr {
  text-align: center;
  font-family: 'Inconsolata', monospace;

}

.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
    .headding{font-weight: 500 !important;margin: 0;padding: 0;line-height: 2}
    .subHeadding {font-weight: 400 !important;margin: 0;padding: 0;line-height: 2;}
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
  }
  .col-md-12 {
    width: 100%;
  }
  .col-md-11 {
    width: 91.66666667%;
  }
  .col-md-10 {
    width: 83.33333333%;
  }
  .col-md-9 {
    width: 75%;
  }
  .col-md-8 {
    width: 66.66666667%;
  }
  .col-md-7 {
    width: 58.33333333%;
  }
  .col-md-6 {
    width: 50%;
  }
  .col-md-5 {
    width: 41.66666667%;
  }
  .col-md-4 {
    width: 33.33333333%;
  }
  .col-md-3 {
    width: 25%;
  }
  .col-md-2 {
    width: 16.66666667%;
  }
  .col-md-1 {
    width: 8.33333333%;
  }
  .col-md-pull-12 {
    right: 100%;
  }
  .col-md-pull-11 {
    right: 91.66666667%;
  }
  .col-md-pull-10 {
    right: 83.33333333%;
  }
  .col-md-pull-9 {
    right: 75%;
  }
  .col-md-pull-8 {
    right: 66.66666667%;
  }
  .col-md-pull-7 {
    right: 58.33333333%;
  }
  .col-md-pull-6 {
    right: 50%;
  }
  .col-md-pull-5 {
    right: 41.66666667%;
  }
  .col-md-pull-4 {
    right: 33.33333333%;
  }
  .col-md-pull-3 {
    right: 25%;
  }
  .col-md-pull-2 {
    right: 16.66666667%;
  }
  .col-md-pull-1 {
    right: 8.33333333%;
  }
  .col-md-pull-0 {
    right: auto;
  }
  .col-md-push-12 {
    left: 100%;
  }
  .col-md-push-11 {
    left: 91.66666667%;
  }
  .col-md-push-10 {
    left: 83.33333333%;
  }
  .col-md-push-9 {
    left: 75%;
  }
  .col-md-push-8 {
    left: 66.66666667%;
  }
  .col-md-push-7 {
    left: 58.33333333%;
  }
  .col-md-push-6 {
    left: 50%;
  }
  .col-md-push-5 {
    left: 41.66666667%;
  }
  .col-md-push-4 {
    left: 33.33333333%;
  }
  .col-md-push-3 {
    left: 25%;
  }
  .col-md-push-2 {
    left: 16.66666667%;
  }
  .col-md-push-1 {
    left: 8.33333333%;
  }
  .col-md-push-0 {
    left: auto;
  }
  .col-md-offset-12 {
    margin-left: 100%;
  }
  .col-md-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-md-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-md-offset-9 {
    margin-left: 75%;
  }
  .col-md-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-md-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-md-offset-6 {
    margin-left: 50%;
  }
  .col-md-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-md-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-md-offset-3 {
    margin-left: 25%;
  }
  .col-md-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-md-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-md-offset-0 {
    margin-left: 0%;
  }
  .visible-xs {
    display: none !important;
  }
  .hidden-xs {
    display: block !important;
  }


  @page {
                margin: 0cm 0cm;
            }

            /**
            * Define the real margins of the content of your PDF
            * Here you will fix the margins of the header and footer
            * Of your background image.
            **/
            body {
                margin-top:    0.5cm;
                margin-bottom: 1cm;
                margin-left:   1cm;
                margin-right:  1cm;
            }

            /** 
            * Define the width, height, margins and position of the watermark.
            **/
            #watermark {
                position: fixed;
                top: 10cm;
                bottom:   0px;
                left:    4cm;
                margin: auto;
                align-items: center;
                /** The width and height may change 
                    according to the dimensions of your letterhead
                **/
                width:    21.8cm;
                height:   28cm;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
                background: #fff !important;
                 opacity: 0.3;
            }

            
            #watermark >img {
              display: fixed;
              top: 20cm !important;
              margin: auto;
            opacity: 0.8;

}


  .bottom {position:absolute;t;bottom:0}
  .heading{font-family: 'Tajawal', sans-serif;}
  .subHeadding,.heading{padding:0;margin:0;line-height: 1;font-family: 'Inconsolata', monospace;}
    .h4_span {font-size: 15px;font-weight: 600;color:#000865;}
  
  .h4_span > span,.h5_span > span {font-size: 10px;font-weight: 500;color:#000;}
  .subHeadding > span {color:#ccc;font-weight: 500}
</style>
</head>

<body>
   <div id="watermark">
            <img src="{{ public_path()}}\uploads\logos\{{$lab->logo}}" height="300px" width="auto" />
        </div>
	  <div class="row" style="padding:0;margin:0">
            <div class="col-md-3" >
	 <img  src="{{ public_path()}}\uploads\logos\{{$lab->logo}}" alt="logo" style="margin: auto  !important;display:block;width: 100%;height: 100%;" height='auto' width='120'/>
	</div>
	<div class="col-md-5" style="float: right;text-align: right;">
	<h1 class="headding" style="margin: 0;padding: 0;line-height: 1;">{{ Auth::user()->name }}</h1>
    <h5 class="subHeadding"><span>Email</span>: {{$user->email}}<br/> <span>Phone</span>: {{$lab->phone_no}}</h5>
    <h5 class="subHeadding"><span>Address</span>: {{$lab->address}}<br/> {{$lab->PO}}  {{$lab->country}}</h5>
</div></div>


<hr style="border: 1px solid #eee;clear:both;" />

	<div>
    <h6 style="padding-bottom: 0;margin-bottom: 0;word-spacing: 6px;font-weight: 500;   font-family: 'Inconsolata', monospace;"><small>Report Name:</small> {{$report->report_name}} | <small>Report Id:</small>  {{$report->report_id}} | <small>Date:</small> {{date('d F Y',strtotime($report->created_at))}}</h6>

    <h4 class="h4_span" style="letter-spacing: 1px;padding-bottom: 0;margin-bottom: 15px;padding-top: 0;margin-top: 10px;font-weight: 600"><span>Patient Name:</span> {{$report->name}} <span>|</span> <span>Patient Age:</span> {{$report->age}} <span>|</span> <span>Gender:</span> {{$report->gender}} <span>|</span> <span>Address:</span> {{$report->addr}} </h4>

</div>

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



     
<div class="bottom">
     @if ($report->footnote != null)<p><strong>Footnote:</strong>{{$report->footnote}}</p>@endif
     <div style="border-top: 1px solid #000;bottom: 0;padding-top: 5px;">
    <h6>Report Generated By: eReport Hub</h6>
  </div>
</div>
</div>

</body>

</html>