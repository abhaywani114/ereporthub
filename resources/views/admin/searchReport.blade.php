
@section('title','Search - eReportHub')

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

@section('js')
<script type="text/javascript">
    
    function search() {
        var q = $("#q").val();
        var s_date = $('#s_date').val() != '' ? $('#s_date').val():0;
        var e_date = $('#e_date').val() != '' ? $('#e_date').val():0;
        document.location = "/dashboard/report/search/"+ q+ '/'+s_date+'/'+e_date;
    }
</script>
@endsection

@section('content')
<div class="cointainer col-lg-9" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Search Report</h1><br/>
        <div class="gform_body">
		<img class="responsive" src="{{ asset('/uploads/logos')}}/{{App\labs::where('username',Auth::User()->username)->first()->logo}}" alt="login" style="margin:auto;display:block;width: 200px;height: auto;" height='100' width='120'/>
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

                       @if (session('search'))
                    <br/>
                        <div class="alert alert-primary" role="alert">
                            {{ session('search') }}
                        </div>
                    @endif

         
                        

                        <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Search') }}</label>
                         @error('q')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="q" type="text" name="q"  class="medium" value="{{$errors->count() ? old('q'):null}}">
                        </div>
                    </li> 



                     <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="">
                    <input type="checkbox" name="if_date" id="if_date"/>

                                    <label class="" for="if_date">
                                        {{ __('Between Date') }}
                                    </label>
                                </div>
                            </div>
                        </div>
    

                         <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Starting Date') }}</label>
                        @error('password')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="s_date" type="date" name="s_date"  class="medium" >
                        </div>
                    </li>       

                             <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Ending Date') }}</label>
                    <div class="ginput_container ginput_container_text">
                    <input id="e_date" type="date" name="e_date"  class="medium">
                        </div>
                    </li> 


                     <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Search" tabindex="13" style="margin-top: 10px; " onclick="search()">



            

	
        </div>
        <div class="clearfix"></div>
        <br />
    </div>
</div>

  </div>
@endsection