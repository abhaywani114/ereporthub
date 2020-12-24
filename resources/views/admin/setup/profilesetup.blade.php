
@section('title','Setting Up Account')

@extends('layout.main')
@section('css')
     

     @media only screen and (min-width: 674px) {
 	.pad_30{padding:30px};
  
    }

	@media only screen and (max-width: 673px) {
		.pad_30{padding-top:30px;}
    }

    .invalid-feedback {color:red;}
@endsection




@section('content')
<div class="cointainer col-lg-7" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Setting Up Account</h1><br/>
        <div class="gform_body">
				<img class="responsive" src="{{ asset('img/login.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
				<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                          


                            <form method="POST" action="/dashboard/Setup1" enctype="multipart/form-data">
                        				@csrf

                	<li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Lab Regestration Id') }}</label>
                         @error('regd_id')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                	<input id="reg" type="text" name="regd_id"  class="medium" value="{{$errors->count() ? old('regd_id'):null}}" placeholder="Regestration Id">
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
                    <input id="address" type="text" name="address"  class="medium" value="{{$errors->count() ? old('address'):null }}" placeholder="Address">
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
                    <input id="PO" type="text" name="PO"  class="medium" value="{{$errors->count() ? old('PO'):null}}" placeholder="Pincode">
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
                    <input id="phone" type="text" name="phone_no"  class="medium" value="{{$errors->count() ? old('phone_no'):null}}" placeholder="Phone Number">
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
                    <input id="country" type="text" name="country"  class="medium" value="{{$errors->count() ? old('country'):null}}">
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




                  <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Update" tabindex="13" style="margin-top: 10px; ">
                    
            </div></form></ul>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection