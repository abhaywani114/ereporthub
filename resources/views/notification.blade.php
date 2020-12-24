
@section('title','Notification - eReport Hub')

@extends('layout.main')


@section('content')

<div id="primary" class="col-sm-12 col-md-8 content-area" style="margin:auto;min-height: 70vh;padding-top:15vh">
			@if ($note == 'profile_update')

			         <h1 class="hdg hdg_1 hdg_title" >Profile Updated</h1>
					 <h3 class="hdg_3" style="color: green;">Your information had been update</h3>

			@elseif ($note == 'StartTrial')

								 <h1 class="hdg hdg_1 hdg_title" >Welcome @if (Auth::user()) {{Auth::user()->name}} @endif</h1>
					 <h3 class="hdg_3" style="color: green;">Let us Start a One Month Tral for you!</h3>
					 <a href="/dashboard/Setup2"><h4 style="color:blue">Click Start Trial Now<h4>

			@elseif ($note == 'subscription_expires')
					 <h1 class="hdg hdg_1 hdg_title" >Your Subscription Has Expired!</h1>
					 <h3 class="hdg_3" style="color: green;">Please buy a subscription to continue!</h3>
					 <a href="/dashboard/Setup2"><h4 style="color:blue">Click to buy now!<h4>
					 	<a tyle="color:blue" href='/dashboard/subscription'>Subscription History</a>
			@elseif ($note == 'user_invalid')

			<img class="responsive" src="{{ asset('img/error.png')}}" alt="login" 
				style="display:block;margin: auto;" height='100' width='100'/>
						 <h1 class="hdg hdg_1 hdg_title" >Invalid User!</h1>
					 <h3 class="hdg_3" style="color: red;">We have found invalid details. Please contact to support.</h3>
			 @elseif ($note == 'linkExpire')

			<img class="responsive" src="{{ asset('img/error.png')}}" alt="login" 
				style="display:block;margin: auto;" height='100' width='100'/>
				 <h1 class="hdg hdg_1 hdg_title" >Payment Link Expired!</h1>
			 <h3 class="hdg_3" style="color: red;">The payment link is expired now!<br/> Payment Id: {{$pay_id}}</h3>
			 @elseif ($note == 'smsCreditAdded')
				 <h1 class="hdg hdg_1 hdg_title" >SMS Credit Added!</h1>
			 <h3 class="hdg_3" style="color: green;">The SMS credit had been added to your account!</h3>
			 @elseif ($note == 'subscriptionDone')
				 <h1 class="hdg hdg_1 hdg_title" >Thank you for Subscribing!</h1>
			 <h3 class="hdg_3" style="color: green;">The subscription had been added to your account!</h3>
			 @elseif ($note == 'ReportNotFound')

				<img class="responsive" src="{{ asset('img/error.png')}}" alt="login" 
					style="display:block;margin: auto;" height='100' width='100'/>
					 <h1 class="hdg hdg_1 hdg_title" >Invalid Report Url</h1>
					 <h3 class="hdg_3" style="color: red;">Please check your url!</h3>
			@else

			<img class="responsive" src="{{ asset('img/error.png')}}" alt="login" 
				style="display:block;margin: auto;" height='100' width='100'/>
					 <h1 class="hdg hdg_1 hdg_title" >Something Happned</h1>
					 <h3 class="hdg_3" style="color: red;">Please report to support!</h3>


			@endif




</div>
@endsection
