
@section('title','Start Trial - eReportHub')

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
@endsection

@php
$main  = \App\labs::where('username',Auth::user()->username)->get();
@endphp


@section('content')
<div class="cointainer col-lg-7" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Start Trial</h1><br/>
          @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="gform_body">
				<img class="responsive" src="{{ asset('img/login.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
				<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                          


                            <form method="POST" action="/dashboard/Setup2">
                        				@csrf

                 <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="">
                    <input type="checkbox" name="start_trial" id="start_trial"/>

                                    <label class="" for="start_trial">
                                        {{ __('I accept terms and conditions') }}
                                    </label>
                                </div>
                            </div>
                        </div>       


                  <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Start Trial" tabindex="13" style="margin-top: 10px; ">
                    
            </div></form></ul>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection