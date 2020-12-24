
@section('title','Pricing - eReportHub')
@php

@endphp
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









                        .pricingTable{
                            background-color: #fff;
                            font-family: 'Krub', sans-serif;
                            text-align: center;
                            padding: 0 0 10px;
                            margin: 0 30px;
                            border: 5px solid #11bfbf;
                            position: relative;
                            z-index: 1;
                            transition:all 0.3s;
                        }
                        .pricingTable .pricingTable-header{
                            color: #fff;
                            background-color: #11bfbf;
                            padding: 15px 0 50px;
                            margin: 0 0 35px;
                            position: relative;
                            z-index: 1;
                            transition: all 0.3s;
                        }
                        .pricingTable:hover .pricingTable-header{ text-shadow: 0 0 5px #000; }
                        .pricingTable .pricingTable-header:after{
                            content: '';
                            background-color: #11bfbf;
                            height: 50px;
                            width: 50px;
                            transform: translateX(-50%) rotate(45deg);
                            position: absolute;
                            left: 50%;
                            bottom: -25px;
                        }
                        .pricingTable .title{
                            font-size: 35px;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            margin: 0 0 15px;
                            color:#fff;
                        }
                        .pricingTable .currency{
                            font-size: 30px;
                            vertical-align: top;
                            display: inline-block;
                        }
                        .pricingTable .amount{
                            font-size: 60px;
                            font-weight: 600;
                            line-height: 60px;
                            display: inline-block;
                        }
                        .pricingTable .month{
                            font-size: 18px;
                            margin-left: -5px;
                            display: block;
                        }
                        .pricingTable .pricing-content{
                            color: #505050;
                            text-align: center;
                            padding: 0;
                            margin:0 auto 20px;
                            list-style: none;
                            display: inline-block;
                        }
                        .pricingTable .pricing-content li{
                            font-size: 18px;
                            font-weight: 600;
                            line-height: 45px;
                            text-transform: capitalize;
                            letter-spacing: 1px;
                            padding: 10px 20px 10px;
                            border-bottom: 2px solid #11bfbf;
                            position: relative;
                        }
                        .pricingTable .pricing-content li:last-child{ border-bottom: none; }
                        .pricingTable .pricing-content li:after{
                            content: "\f00c";
                            color: #fff;
                            background-color: #11bfbf;
                            font-family: "Font Awesome 5 Free";
                            font-size: 12px;
                            font-weight: 900;
                            line-height: 18px;
                            height: 18px;
                            width: 18px;
                            border-radius: 50%;
                            transform: translateX(-50%);
                            position: absolute;
                            left: 50%;
                            bottom: -10px;
                        }
                        .pricingTable .pricing-content li:last-child:after{ display: none; }
                        .pricingTable .pricingTable-signup{
                            color: #fff;
                            background-color: #11bfbf;
                            font-size: 15px;
                            font-weight: 600;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                            text-align: center;
                            width: 80%;
                            padding: 15px 25px;
                            margin: 0 auto;
                            border: 3px solid #fff;
                            display: inline-block;
                            position: relative;
                            transition: all 0.3s;
                        }
                        .pricingTable .pricingTable-signup:hover{
                            box-shadow: 0 0 10px #000;
                            text-shadow: 0 0 5px #000;
                        }
                        .pricingTable.pink,
                        .pricingTable.pink .pricing-content li{ border-color: #e84393; }
                        .pricingTable.pink .pricingTable-header,
                        .pricingTable.pink .pricingTable-header:after,
                        .pricingTable.pink .pricing-content li:after,
                        .pricingTable.pink .pricingTable-signup{ background-color: #e84393; }
                        .pricingTable.purple,
                        .pricingTable.purple .pricing-content li{ border-color: #6c5ce7; }
                        .pricingTable.purple .pricingTable-header,
                        .pricingTable.purple .pricingTable-header:after,
                        .pricingTable.purple .pricing-content li:after,
                        .pricingTable.purple .pricingTable-signup{ background-color: #6c5ce7; }
                        @media only screen and (max-width: 1200px){
                            .pricingTable{ margin: 0 0 30px; }
                        }
                        @media only screen and (max-width: 990px){
                            .pricingTable{ margin: 0 30px 30px; }
                        }
                        @media only screen and (max-width: 359px){
                            .pricingTable{ margin: 0 0 30px; }
                        }
@endsection



@section('content')
<div class="cointainer " style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">SMS Pricing</h1><br/>
          @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br/>
                        <div class="alert alert-success" role="alert">
                        The Monthly Subscription Charge is fixed @ 50 INR. Apart form that the pricing for SMS criedits are as under.
                        </div>
        <div class="gform_body">


   <div class="demo">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12" style="margin: auto;">
                                        <div class="pricingTable">
                                            <div class="pricingTable-header">
                                                <h3 class="title">Basic</h3>
                                                <div class="price-value">
                                                    <span class="currency">₹</span>
                                                    <span class="amount">100</span>
                                                    <span class="month">Lifetime Validity</span>
                                                </div>
                                            </div>
                                            <ul class="pricing-content">
                                                <li>200 sms credit</li>
                                                <li>Local</li>

                                            </ul>
                                            <a href="#" class="pricingTable-signup">Sign Up</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12" style="margin: auto;">
                                        <div class="pricingTable pink">
                                            <div class="pricingTable-header">
                                                <h3 class="title">Premium</h3>
                                                <div class="price-value">
                                                     <span class="currency">₹</span>
                                                    <span class="amount">500</span>
                                                    <span class="month">Lifetime Validity</span>
                                                </div>
                                            </div>
                                            <ul class="pricing-content">
                                               <li>1000 sms credit</li>
                                                <li>Local</li>
                                            </ul>
                                            <a href="#" class="pricingTable-signup">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    </div>

  </div>
</div>
@endsection