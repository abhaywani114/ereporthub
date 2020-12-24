
@section('title','eReport Hub')

@extends('layout.main')

@php
$style = true;
$ani = true;
@endphp

@section('css')

.carousel-item {max-height:450px !important;}

.w_a_mian3 {
    padding-top: 75px;
    padding-bottom: 0px;
    bacground:#fff;
}
.offers {
    padding-top: 60px;
    padding-bottom: 0px;
    background:#fff;
}

.section_div {
    display: block;
    position: relative;
    width: 100%;
    height: auto;
    padding: 0;
    margin: 0;
}
.simple-content {
    float: left;
    padding: 15px 0 15px 5%;
    width: 40%;
}

.simple-img {
    float: right;
    width: 60%;
}

.simple-content ul li:before {
    content: '';
    width: 32px;
    height: 32px;
    background: url("assets/img/tick_y.svg") no-repeat center center;
    position: relative;
    float: left;
    margin-right: 5px;
}
.clearfix::after {
    display: block;
    content: "";
    clear: both;
}

@media only screen and (max-width: 800px){
.w_a_mian2, .w_a_mian3 {
    padding-top: 25px;
    padding-bottom: 25px;
}
.con2, .simple-content {
    padding: 0;
}

.simple-content, .simple-img {
    width: 100%;
}
}

.top_url {
    height: 60vh;
    min-height: 450px;
    max-height:  60vh;
    padding: 0;
    margin: 0;
    background-color: #002553;
    width:100%;
}
.m_cap {
    display: table;
    overflow: hidden;
}

.top_url .bg_over {
    position: relative;
    padding-top: 70px;
    z-index: 1;
}
.mid_cap {
    display: table-cell;
    vertical-align: middle;
    overflow-x: hidden;
}

@media only screen and (min-width: 1066px) {
.top_url h1 {
    font-size: 2.6rem;
}
}
.top_url h1 {
    font-weight: 700;
    color: #fff;
    font-size: 2.2rem;
    padding: 0;
    margin: 0;
    text-align: center;
}


@media only screen and (min-width: 1066px){
.top_url h2 {
    letter-spacing: 3px;
}
}
.top_url h2 {
    color: #fff;
    font-size: 1.2rem;
    font-weight: 300;
    letter-spacing: 1px;
    padding: 0;
    margin: 4px 0 35px 0;
    text-align: center;
}

.top_url .url_area {
    position: relative;
    display: inline-block;
    width: 100%;
    letter-spacing: -1px;
}

.top_url input, .newsletter_linkly input[type="email"] {
    float: left;
    width: 100%;
    height: 60px;
    border: 1px solid #d9dadb;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    padding: 0 110px 0 20px;
    -webkit-box-shadow: 0 0 1px 0 rgba(0,0,0,0);
    -moz-box-shadow: 0 0 1px 0 rgba(0,0,0,0);
    box-shadow: 0 0 1px 0 rgba(0,0,0,0);
    -webkit-transition: all .25s ease-out;
    -ms-transition: all .25s ease-out;
    transition: all .25s ease-out;
}
.top_url button, .newsletter_linkly input[type="submit"], input.inp_sub[type="submit"] {
    position: absolute;
    top: 50%;
    margin-top: -42px;
    right: 0;
    width: auto;
    height: 60px;
    font-size: 1em;
    color: #fff;
    text-transform: lowercase;
    cursor: pointer;
    box-shadow: none;
    border: none;
    background: #1076f7;
    -webkit-border-top-right-radius: 8px;
    -webkit-border-bottom-right-radius: 8px;
    -moz-border-radius-topright: 8px;
    -moz-border-radius-bottomright: 8px;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    padding: 0 20px;
    -webkit-transition: all .25s ease-out;
    -ms-transition: all .25s ease-out;
    transition: all .25s ease-out;
}
.notice_all {
    color: #fff;
    font-size: 12px;
    margin: 8px 0 0 0;
    text-align: center;
}
#link_move canvas {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 0;
}
.particles-js-canvas-el {max-height:40em !important}

@endsection

@section('content')

<!-- -->
<section class="top_url m_cap" id="link_move">

<div class="mid_cap bg_over">
<div class="container z-i1">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<h1>Get Report</h1>
<h2>View, Print, and Download your medical report.</h2>
                        @if ( session('not_found'))
            
                        <div class="alert alert-danger" role="alert">
                            {{session('not_found') }}
                        </div>
                    @endif
<div id="orig" class="url_area">
    <form  method="post" action="/getreport">
                        @csrf
<input id="r_id" type="text" placeholder="Enter medical report id" name="r_id" value="">
<button class="button shortenit_b"><span class="fa fa-download" style="margin-right: 10px;"></span> Download</button>
</form>
</div>
<input type="hidden" id="tmp">
<p class="notice_all">By using our service you accept the <a href="/company/terms">Terms</a> and <a href="/company/privacy">Privacy</a>.</p>
</div>
</div>
</div>

</div><!-- 
<canvas class="particles-js-canvas-el" width="1356" height="450" style="width: 100%; height: 100%;"> -->
</section>
<style type="text/css">
  .top_url .bg_over {height: 35em;}
</style>
<section class="offers w_a_mian3">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="simple-content">
<h3><span>Easy Medical Report</span><br/>Management Platform</h3>
<p>eReportHub is India's first robustic medical repoting and dilvering potal with the easy interface and useful features.</p>
<ul>
<li class="clearfix">Online platform , needs no installaton</li>
<li class="clearfix">Signup and Work instantly</li>
<li class="clearfix">Free for first month with 30 SMS credits</li>
<li class="clearfix">Latest and 100% secure technology used.</li>
<li class="clearfix">Dilver report anytime to anywhere online.</li>
<li class="clearfix">Email notification.</li>
<li class="clearfix">SMS notifications.</li>
<li class="clearfix">Customer Care Support.</li>
<li class="clearfix">Cheap and reliable.</li>
</ul>
<p>Hurry up and grab eReportHub's trial for your medical laboratory and increase your speed of reporting. Kudos!</p>

</div>
<div class="simple-img" style="text-align: center;">
<img src="{{ asset('img/screenshot.jpg')}}" alt="eReportHub SMS screenshot" style="width: auto;height: 470px;margin: 50px auto;">
</div>
</div>
</div>
</div>
</section>

<style type="text/css">
  .b_foot h2 {
    color: #1076f7;
    font-size: 16px;
    font-weight: 500;
}
.b_foot {
    padding: 75px 0;
    text-align: center;
}
.social p, .b_foot h2 {
    padding: 15px;
    background: #fff;
    max-width: 380px;
    margin: 40px auto 0 auto;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    position: relative;
}

.social p:before, .b_foot h2:before {
    content: '';
    position: absolute;
    top: -20px;
    left: 50%;
    margin-left: -10px;
    width: 0;
    height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-bottom: 20px solid #fff;
}

</style>
<section class="b_foot">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<img src="{{asset('img/logo_white.png')}}" alt="White Logo eReportHub">
<h2><a href="#">Sign Up Now & Get Trial.!</a></h2>
</div>
</div>
</div>
</section>
@endsection

@section('js')
<script type="text/javascript">
	 particlesJS("link_move", {
  "particles": {
    "number": {
      "value": 70,
      "density": {
        "enable": true,
        "value_area": 300
      }
    },
    "color": {
      "value": ["#4e729a"]
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#fff"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/a.svg",
        "width": 100,
        "height": 1000
      }
    },
    "opacity": {
      "value": 1,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 1,
        "opacity_min": 1,
        "sync": true
      }
    },
    "size": {
      "value": 10,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 2,
        "size_min": 3,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 120,
      "color": "#10335e",
      "opacity": 1,
      "width": 2
    },
    "move": {
      "enable": true,
      "speed": 10,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 600
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "bubble"
      },
      "onclick": {
        "enable": false,
        "mode": "repulse"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 250,
        "size": 0,
        "duration": 2,
        "opacity": 0,
        "speed": 10
      },
      "repulse": {
        "distance": 400,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
})
</script>
@endsection