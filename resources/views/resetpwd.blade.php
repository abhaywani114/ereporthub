
@section('title','Forget Password - eReport Hub')

@extends('layout.main')
@section('css')
     

     @media only screen and (min-width: 674px) {
 	.pad_30{padding:30px};
  
    }

	@media only screen and (max-width: 673px) {
		.pad_30{padding-top:30px;}
    }

    .invalid-feedback {color:red;}
    .alert-success{color:green}
@endsection


@section('content')
    

       @if ($reset_init == true) 
                

                <div class="cointainer col-lg-7" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">{{ __('Reset Password') }}</h1><br/>
        <div class="gform_body">
                <img class="responsive" src="{{ asset('img/login.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
                <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                          
                    @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                      
                    <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('E-Mail Address') }}</label>
                         @error('email')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="email" type="email" name="email"  class="medium" value="{{ old('email') }}">
                        </div>
                    </li>                

            





                  <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="{{ __('Send Password Reset Link') }}" tabindex="13" style="margin-top: 10px; ">
                    
            </div></form></ul>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>

        @else 
                    <div class="cointainer col-lg-7" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">{{ __('Reset Password') }}</h1><br/>
        <div class="gform_body">
                <img class="responsive" src="{{ asset('img/login.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
                <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                          
                    @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                            <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                                 <input type="hidden" name="token" value="{{ $token }}">

                    <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('E-Mail Address') }}</label>
                         @error('email')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                    <input id="email" type="email" name="email"  class="medium" value="{{ $email ?? old('email') }}">
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
                    <input id="password" type="password" name="password"  class="medium" required autocomplete="new-password">
                        </div>
                    </li>       

                             <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Confirm Password') }}</label>
                    <div class="ginput_container ginput_container_text">
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"  class="medium">
                        </div>
                    </li>           



                         

            





                  <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="{{ __('Reset Password') }}" tabindex="13" style="margin-top: 10px; ">
                    
            </div></form></ul>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>

    @endif
@endsection