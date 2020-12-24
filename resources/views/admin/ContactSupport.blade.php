
@section('title','Contact Support - eReportHub')

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
   .contact-name, .contact-email, .contact-subject {
    width:100%;
	max-width: unset;
	}
@endsection



@section('content')
<div class="cointainer col-lg-7" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Contact Support</h1><br/>
          @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="gform_body">
	<img class="responsive" src="{{ asset('img/email.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
		<br/>	
	
			<form  method="post" action="/dashboard/ContactSupport">
				@csrf
              <div class="contact-name">
                <label for="name">Name <abbr title="required" class="required">*</abbr></label>
                     @error('name')
		               			<br/>
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
							  </span>
                        @enderror
                <input name="name" id="name" type="text">
              </div>
              <div class="contact-email">
                <label for="email">Email <abbr title="required" class="required">*</abbr></label>
                                         @error('email')
                                   <br/> <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                <input name="email" id="email" type="email">
              </div>
              <div class="contact-subject">
                <label for="email">Subject</label>
                   @error('subject')
		               			<br/>
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
							  </span>
                        @enderror
                <input name="subject" id="subject" type="text">
              </div>
              <div class="contact-message">
                <label for="message">Message <abbr title="required" class="required">*</abbr></label>
                   @error('message')
		               			<br/>
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
							  </span>
                        @enderror
                <textarea id="message" name="message" rows="7" required="required"></textarea>
              </div>

              <input type="submit" class="btn btn-lg btn-color btn-button" name="submit" value="Send Message">
		</form>
        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection