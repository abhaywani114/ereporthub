
@section('title','Profile Setting - eReportHub')

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
        <h1 class="hdg hdg_1 hdg_title"> Profile Setting</h1><br/>
          @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="gform_body">
<img class="responsive" src="{{ asset('/uploads/logos')}}/{{App\labs::where('username',Auth::User()->username)->first()->logo}}" alt="login" style="margin:auto;display:block;width: 200px;height: auto;" height='100' width='120'/>
				<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                          


                            <form method="POST" action="/dashboard/lab/ProfileEdit" enctype="multipart/form-data">
                        				@csrf

                	<li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Lab Regestration Id') }}</label>
                         @error('regd_id')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                	<input id="reg" type="text" name="regd_id"  class="medium" value="{{$errors->count() ? old('reg'):$main[0]->regd_id}}">
                        </div>
                    </li>          


                    <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Your Address') }}</label>
                         @error('address')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="address" type="text" name="address"  class="medium" value="{{$errors->count() ? old('address') : $main[0]->address}}">
                        </div>
                    </li>       

                         <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Pincode') }}</label>
                         @error('PO')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="PO" type="text" name="PO"  class="medium" value="{{$errors->count() ? old('PO'):$main[0]->PO}}">
                        </div>
                    </li>       

                               <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Phone Number') }}</label>
                         @error('phone_no')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="phone" type="text" name="phone_no"  class="medium" value="{{$errors->count() ? old('phone_no'):$main[0]->phone_no}}">
                        </div>
                    </li> 

                    <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Country') }}</label>
                         @error('country')
                        <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="country" type="text" name="country"  class="medium" value="{{$errors->count() ? old('country'):$main[0]->country}}">
                        </div>
                    </li> 

                    <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Logo') }}</label>
                         @error('logo')
                        <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="logo" type="file" name="logo"  class="medium"/>
                        </div>
                    </li> 



                            <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="">
                    <input type="checkbox" name="change_pwd" id="change_pwd"/>

                                    <label class="" for="change_pwd">
                                        {{ __('Change Password') }}
                                    </label>
                                </div>
                            </div>
                        </div>
    

                         <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Password') }}</label>
                        @error('password')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="password" type="password" name="password"  class="medium"  autocomplete="new-password">
                        </div>
                    </li>       

                             <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Confirm Password') }}</label>
                    <div class="ginput_container ginput_container_text">
                    <input id="password-confirm" type="password" name="password_confirmation"  autocomplete="new-password"  class="medium">
                        </div>
                    </li> 



                  <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Update" tabindex="13" style="margin-top: 10px; ">
                    
            </div></form></ul>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection