
@section('title','FAQ - eReportHub')

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
        <h1 class="hdg hdg_1 hdg_title">FAQ</h1><br/>

        <div class="gform_body">
	<img class="responsive" src="{{ asset('img/login.png')}}" alt="login" style="margin:auto;display:block" height='100' width='100'/>
		<br/>	



        <div class="entry__article">
                
       <p>&nbsp;</p>
<p><strong>How to start publishing on NNS (Next News Source)?</strong><br>You can start writing on NNS with just an email id, sign up by clicking here and start your journey with us.</p>
<p><strong>How can I keep track of the stats of the article?</strong><br>After signing up you will get, sophisticated personalised dashboard, where you can publish new articles, keep track of their stats, request for money redemption.</p>
<p><strong>How do I publish new articles?</strong><br>After Signing up, you will get access to the personalised dashboard, where you can write a new article by clicking on “New” Button on the top of dashboard. After writing your article, hit the Submit button and our editors will review the content, after your content pass our policies your article will be published on NNS (Next News Source) as soon as possible.</p>
<p><strong>How Do I Get Paid?</strong><br>After Successfully publishing your Article on NNS (Next News Source), you can track how your Article is doing on NNS, after that, you will get 1$ for every 1000 reads. If you are an Indian author you will get paid by bank transfer and if you are from another country you will get paid by PayPal. <br>Note: Minimum threshold of payment is $50.</p>
<p><strong>Things to Keep in mind while publishing your Article</strong> <br>While NNS gives you complete freedom to write on your interested topics, though you need to keep some important things in mind to publish your article.</p>
<ol>
<li><span style="font-size: 15pt;">Your article should not be copied from anywhere, your article must be unique and based on the latest topics.</span></li>
<li><span style="font-size: 15pt;">You are free to choose whatever topic interests you but your article must fall into the given categories on NNS.</span></li>
<li><span style="font-size: 15pt;">If you are using </span>copyrighted<span style="font-size: 15pt;"> content/image on your article you must specify the source at the end of your article.</span></li>
</ol>
<p>&nbsp;</p>
<p><strong>What is the chat feature?</strong><br>On NNS you can send real-time messages to any other user on NNS (Next News Source), the message will be only saved for a day, they will automatically be deleted on the next day. Make sure to maintain the reputation of the website.</p>

    </div>




        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection