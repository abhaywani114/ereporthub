
@section('title','Get Report - eReportHub')

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

@endphp


@section('content')
<div class="cointainer col-lg-9" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Get Report</h1><br/>
        <div class="gform_body">
		<img class="responsive" src="{{ asset('img/medical_reportdownload.jpg')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
		<br/>
      @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if ( session('not_found'))
                    <br/>
                        <div class="alert alert-danger" role="alert">
                            {{session('not_found') }}
                        </div>
                    @endif

                <form  method="post" action="/getreport">
                        @csrf

                        <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Report Id') }}</label>
                         @error('r_id')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="r_id" type="text" name="r_id"  class="medium" value="{{$errors->count() ? old('r_id'):null}}">
                        </div>
                    </li> 



                     <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Get Report" tabindex="13" style="margin-top: 10px; ">



                 </form>

	
        </div>
        <div class="clearfix"></div>
        <br />
    </div>
</div>

  </div>
@endsection