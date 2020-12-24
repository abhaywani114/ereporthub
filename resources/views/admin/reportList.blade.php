
@section('title','Report List - eReportHub')

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

@endsection

@php
$main  = \App\labs::where('username',Auth::user()->username)->get();
@endphp


@section('content')
<div class="cointainer col-lg-10" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Report List</h1><br/>
        <div class="gform_body">
<img class="responsive" src="{{ asset('/uploads/logos')}}/{{App\labs::where('username',Auth::User()->username)->first()->logo}}" alt="login" style="margin:auto;display:block;width: 200px;height: auto;" height='100' width='120'/>
		<br/>
      @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (isset($beta))
                    <br/>
                        <div class="alert alert-primary" role="alert">
                         {{$beta}}
                        </div>
                    @endif

		<br/>
			<table class="table">
				<thead>
					<tr>
					<th>Patient</th>
					<th>Residence</th>
					<th>Report</th>
					<th>Date</th>
                    <th>SMS</th>
                    <th>Cost</th>
				</tr>
				</thead>
				<tbody>
					@foreach ($data as $p)
					<tr>
					<td><a href="/report/{{$p->report_url}}"> {{$p->name}}</a></td>
					<td>{{ $p->addr }}</td>
					<td>{{$p->report_name}}</td>
					<td>{{date('d F Y',strtotime($p->created_at))}}</td>
                    <td>{{$p->SMS == 1 ? 'SMS Sent':'SMS Not Sent'}}</td>
                    <td>Rs {{$p->cost}}</td>
                </tr>
					@endforeach
				</tbody>
			</table>	

            <div align="center" style="margin:auto;background: #fff;padding: 10px">
            {{$data->links()}}
            </div>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection