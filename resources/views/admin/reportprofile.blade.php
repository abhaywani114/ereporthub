
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
<style type="text/css">.invalid-feedback{display: block !important}.del{color:blue;cursor: pointer}</style>

@section('content')
<div class="cointainer col-lg-10" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Report Profile</h1><br/>
        <div class="gform_body">
<img class="responsive" src="{{ asset('/uploads/logos')}}/{{App\labs::where('username',Auth::User()->username)->first()->logo}}" alt="login" style="margin:auto;display:block;width: 200px;height: auto;" height='100' width='120'/>
		
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

                     @error('cost')
                         <span class="alert invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
  @error('name')
                          <span class="alert invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                          @error('min_range')
                         <span class="alert invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                              @error('max_range')
                         <span class="alert invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror


        <form action="{{route('reportprofiles.store')}}" method="post" autocomplete="off">
            <div class="row" style="    box-shadow: -1px 1px 2px 1px rgba(0, 0, 0, 0.1);padding-top: 21px;">
                
                <div class="col-md-12">
                    <h4>Add New Profile</h4>
                </div>
                    <div class="col-md-4">
                                      
                        <input type="text" name="name" placeholder="Report Name" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                      
                                  <input type="number" name="min_range" placeholder="Min Range" class="form-control" />
                            </div>
                            <div class="col-md-6">
                            
                                  <input type="number" name="max_range" placeholder="Max Range" class="form-control" />
                            </div>
                        </div>
                      
                    </div>
                     <div class="col-md-2">
                        <input type="text" name="unit" placeholder="Unit" class="form-control" />
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="cost" placeholder="Cost" class="form-control" />
                    </div>
                    @csrf
                 <div class="col-md-6" style="margin: auto">
         <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" name="submit" value="Save" tabindex="13" style="line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .375rem .75rem;">
                    </div>
            </div>
        </form>

        <br/>
			<table class="table">
				<thead>
					<tr>
					<th>Report Name</th>
                    <th>Report Cost</th>
                    <th>Normal Min</th>
                    <th>Normal Max</th>
                    <th>Delete</th>
				</tr>
				</thead>
				<tbody>
					@foreach ($data as $p)
					<tr id="{{$p->id}}">
					<td>{{$p->name}}</td>
                    <td>Rs {{$p->cost}}</td>
                    <td>{{$p->min_range}}</td>
                    <td>{{$p->max_range}}</td>
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
    url: "/dashboard/reportprofiles/" + id,
    data: "id="+id,
    success: function(msg){
        $("#"+id).remove();
    }
    });
    }
//      dashboard/reportprofiles/{reportprofile}
  </script>
  @endsection