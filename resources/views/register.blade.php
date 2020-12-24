
@section('title','Login - eReport Hub')

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
        <h1 class="hdg hdg_1 hdg_title">{{ __('Register') }}</h1><br/>
        <div class="gform_body">
				<img class="responsive" src="{{ asset('img/login.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
				<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                          
              

                            <form method="POST" action="{{ route('register') }}">
                        				@csrf


            <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Username') }}</label>
                         @error('username')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="username" type="text" name="username"  class="medium" value="{{ old('username') }}" required>
                    </div>
                    </li> 

                        <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Lab Name') }}</label>
                         @error('name')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="name" type="text" name="name"  class="medium" value="{{ old('name') }}" required>
                    </div>
                    </li> 


                        <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('E-Mail Address') }}</label>
                         @error('email')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="email" type="email" name="email"  class="medium" value="{{ old('email') }}" required>
                    </div>
                    </li>    

                	<li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Password') }}</label>
                         @error('password')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                	<input id="password" type="password" name="password"  class="medium" autocomplete="new-password" required autocomplete="email>
                    </div>
                    </li>                

      

        <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Confirm Password') }}</label>

                    <div class="ginput_container ginput_container_text">
                    <input id="password_confirmation" type="password" name="password_confirmation"  class="medium" required>
                    </div>
                    </li>   




                  <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="  {{ __('Register') }}" tabindex="13" style="margin-top: 10px; ">
                    
            </div></form></ul>
        </div>
        <div class="clearfix"></div>
        <br />
     <a href="login">Login?</a>
            <!-- <a href='/signup.php' style="float:right">New to Next News Source? Register</a> -->
    </div>

  </div>
@endsection