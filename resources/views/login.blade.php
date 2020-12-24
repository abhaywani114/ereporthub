
@section('title','Login - eReport Hub')

@extends('layout.main')
@section('css')
     

     @media only screen and (min-width: 674px) {
 	.pad_30{padding:30px};
  
    }

	@media only screen and (max-width: 673px) {
		.pad_30{padding-top:30px;}
    }

    .invalid-feedback {color:red;display:block}
@endsection


@section('content')
<div class="cointainer col-lg-7" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">{{ __('Login') }}</h1><br/>
        <div class="gform_body">
				<img class="responsive" src="{{ asset('img/login.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
                          @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
				<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                          
              

                            <form method="POST" action="{{ route('login') }}">
                        				@csrf

                	<li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_uname">{{ __('Username Or E-Mail Address') }}</label>
                         @error('email')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    <div class="ginput_container ginput_container_text">
                	<input id="email" type="text" name="email"  class="medium" value="{{ old('email') }}">
                        </div>
                    </li>                

                    <li class="gfield field_sublabel_below field_description_below">
                    <label class="gfield_label" for="input_pwd">Password</label>
                            @error('password')
                                 <br/>   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <div class="ginput_container ginput_container_text">
                	<input id="password" type="password" name="password" class="medium" tabindex="10" autocomplete="current-password"/>
                        </div>
                    </li>


                          <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>



                  <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Login" tabindex="13" style="margin-top: 10px; ">
                    
            </div></form></ul>
        </div>
        <div class="clearfix"></div>
        <br />
            @if (Route::has('password.request')) <a href="{{ route('password.request') }}">Forget Password?</a>@endif
            <!-- <a href='/signup.php' style="float:right">New to Next News Source? Register</a> -->
    </div>

  </div>
@endsection