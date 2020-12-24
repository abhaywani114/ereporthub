
@section('title','Report List - eReportHub')

@extends('layout.main')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<style type="text/css">.invalid-feedback{display: block !important}.del{color:blue;cursor: pointer}</style>
<div class="cointainer col-lg-10" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Bills List</h1><br/>
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
                    <th>Status</th>
                    <th>Delete</th>
				</tr>
				</thead>
				<tbody>
					@foreach ($data as $p)
				<tr id="{{$p->id}}">
					<td><a href="/dashboard/bills/{{$p->id}}" target="_blank"> {{$p->name}}</a></td>
					<td>{{ $p->addr }}</td>
					<td>{{$p->report_name}}</td>
					<td>{{date('d F Y',strtotime($p->created_at))}}</td>
                    <td>{{$p->status}}</td>
                    <td><span class="del" onclick="delete_rec('{{$p->id}}')">Delete</span></td>
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

  @section('js')
  <script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function delete_rec(id) {
    let conf;
    conf = confirm("Are you sure to delete this record?");

    if (conf !== true) {
        return null;
    }

    $.ajax({
    type: "DELETE",
    url: "/dashboard/bills/" + id,
    data: "id="+id,
    success: function(msg){
        $("#"+id).remove();
    }
    });
    }
//      dashboard/reportprofiles/{reportprofile}
  </script>
  @endsection