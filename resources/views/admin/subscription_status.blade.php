
@section('title','Subscription History - eReportHub')

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
<div class="cointainer col-lg-7" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Subscription History</h1><br/>
          @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="gform_body">
		<img class="responsive" src="{{ asset('img/subscription.jpg')}}" alt="login" style="margin:auto;display:block" height='200' width='200'/>
		<br/><br/>
			<table class="table">
				<thead>
					<tr>
					<th>Subscription</th>
					<th>Date</th>
					<th>Due Date</th>
				</tr>
				</thead>
				<tbody>
					@foreach ($data as $p)
					<tr>
					<td>{{$p->subscription}}</td>
					<td>{{ date('d F Y',strtotime($p->created_at))	}}</td>
					<td>{{date('d F Y',strtotime($p->due_date))}}</td>
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