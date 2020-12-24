<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title', 'eReport Hub')</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="eReportHub is India's first robustic medical repoting and dilvering potal with the easy interface and useful features.Hurry up and grab eReportHub's trial for your medical laboratory and increase your speed of reporting. Kudos!">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>


  <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}" />

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->


  <link rel="stylesheet" href="{{ asset('/assets/css/font-icons.css')}}" />
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}" />

    <link rel="stylesheet" href="{{ asset('/assets/css/font-awsome/css/font-awesome.min.css')}}" />

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="shortcut icon" href=" {{asset('img/fav.png')}}">
  <link rel="apple-touch-icon" href="{{asset('img/fav.png')}}">


  <!-- Lazyload (must be placed in head in order to work) -->
  <script src="js/lazysizes.min.js"></script>



  <style>
  	@media only screen and (min-width: 674px){
	.nav-icon-toggle {
	    display: none !important;
	}
	}
	@media only screen and (max-width: 673px) {
	.mob_hide {
	    display: none !important;
	}
	.nav__holder > .relative {margin-top: 15px;}
	}

  .nav--sticky {
    height: 48px;
}
.nav__holder {
    background-color: #fff;
    -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.nav__holder {width: 100%}

    .pagination {
    display: -ms-flexbox;
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: .25rem;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #dee2e6;
}
.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: .25rem;
    border-bottom-left-radius: .25rem;
}
.page-link:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.page-link {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.active > .page-link {background: #007bff;color: #fff;}

  @yield('css')


@if(!isset($ani))
  #link_move canvas {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 0;
}

 #link_move{ position: relative; width: 100%; height: 100%;} 

.top_url {
    height: 500px;
    height: 60vh;
    min-height: 450px;
    max-height: 460px;
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
   
   }
   @endif
  </style>
</head>

<body class="bg-light style-default style-rounded">

  <!-- 
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>
  --->

 <!-- Bg Overlay --><!-- 
  <div class="content-overlay"></div>
 -->

  <!-- Sidenav -->    
  <header class="sidenav" id="sidenav" style="z-index: 1000">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>
    
    <!-- Nav -->
    <nav class="sidenav__menu-container">
      <ul class="sidenav__menu" role="menubar">
        <li>
                  <a href="/" class="sidenav__menu-url">Home</a>
                </li>

				<li>
                  <a href="/getreport" class="sidenav__menu-url">Get Report</a>
                </li>

				<li>
                  <a href="/company/pricing" class="sidenav__menu-url">Pricing</a>
                </li>


				<li>
                  <a href="/company/AboutUs" class="sidenav__menu-url">About Us</a>
                </li>

                 <li>
                  <a href="/company/ContactUs" class="sidenav__menu-url">Contact US</a>
                </li>


                  @guest
                   <li>    <a href="/login" class="sidenav__menu-url">Login</a></li>
                   <li>    <a href="/register" class="sidenav__menu-url">Sign Up</a></li>
          @else
                 <li>  <a href="/dashboard" class="sidenav__menu-url">{{ Auth::user()->name }}</a></li>
                 <li>  <a href="/dashboard/lab/ProfileEdit" class="sidenav__menu-url">Edit Profile</a></li>
  
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="sidenav__menu-url">Logout</a></li>

         @endguest
 
      </ul>
    </nav>

    <div class="socials sidenav__socials"> 
      <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
        <i class="ui-twitter"></i>
      </a>
      <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
        <i class="ui-google"></i>
      </a>
      <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
        <i class="ui-youtube"></i>
      </a>
      <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end sidenav -->

  <main class="main oh" id="main">

    <!-- Top Bar -->
    <div class="top-bar d-none d-lg-block" style="z-index: 100;position: relative;">
      <div class="container">
        <div class="row">

          <!-- Top menu -->
          <div class="col-lg-6">
            <ul class="top-menu">
              <li><a href="/company/investor">Investor</a></li>
              <li><a href="#">Support Us</a></li>
            </ul>
          </div>
          
          <!-- Socials -->
          <div class="col-lg-6">
            <div class="socials nav__socials socials--nobase socials--white justify-content-end"> 
              <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
                <i class="ui-facebook"></i>
              </a>
              <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
                <i class="ui-twitter"></i>
              </a>
              <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
                <i class="ui-google"></i>
              </a>
              <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
                <i class="ui-youtube"></i>
              </a>
              <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
                <i class="ui-instagram"></i>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div> <!-- end top bar -->        

    <!-- Navigation -->
    <header class="nav">

      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <!-- Side Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> 

            <!-- Logo -->
            <a href="/" class="logo" style="width: 220px;">
              <img class="logo__img" src="{{asset('img/logo.png')}}" alt="logo">
            </a>

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
              <ul class="nav__menu">

              	<li>
                  <a href="/">Home</a>
                </li>

				<li>
                  <a href="/getreport">Get Report</a>
                </li>

				<li>
                  <a href="/company/pricing">Pricing</a>
                </li>
				<li>
                  <a href="/company/AboutUs">About Us</a>
                </li>

                 <li>
                  <a href="/company/ContactUs">Contact US</a>
                </li>


              </ul> <!-- end menu -->
            </nav> <!-- end nav-wrap -->
            <ul class="nav__right">
  @guest
                   <div class="nav__right-item nav__search mob_hide">    <a href="/login" class="sidenav__menu-url">Login</a></div>
                   <div class="nav__right-item nav__search mob_hide">    <a href="/register" class="sidenav__menu-url">Sign Up</a></div>
          @else
    <!--         <div class="nav__right-item nav__search mob_hide">   
            <a href="/dashboard" class="sidenav__menu-url">{{ Auth::user()->name }}</a>
            </div> -->


            <li class="nav__dropdown mob_hide" style="position: relative;">
                  <a href="/dashboard" class="sidenav__menu-url">{{ Auth::user()->name }}</a>
                  <ul class="nav__dropdown-menu" style="box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);">
                  <li><a href="/dashboard/lab/ProfileEdit" class="sidenav__menu-url">Edit Profile</a></li>
                   <li><a href="/dashboard/reportprofiles" class="sidenav__menu-url">Report Profiles</a></li>
                </ul>
            </li>


              <div class="nav__right-item nav__search mob_hide"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="sidenav__menu-url">Logout</a></div>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
  @endguest
   

            </ul>       
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->
    @if(!isset($ani)) <div  class="top_url m_cap" id="link_move">  @endif

<div @if (!isset($style)) class="container " style=" background: #fff;min-height: 70vh;margin: 25px auto !important ; position: relative;z-index: 2;" @endif>
  @yield('content')
</div>
    @if(!isset($ani)) </div> @endif

    <style type="text/css">
      
      .b_foot, .term_menu {
    background-color: #042957;
}
.term_menu {
    border-top: 1px solid #08346c;
}
 footer, .section_div {
    display: block;
    position: relative;
    width: 100%;
    height: auto;
    padding: 0;
    margin: 0;
}

.term_menu ul {
    list-style-type: none;
    text-align: center;
    margin: 10px 0;
    padding: 0;
}
.term_menu ul li {
    width: auto;
    position: relative;
    display: inline-block;
    padding: 25px;
    margin: 0 auto;
}
.term_menu ul li a {
    color: #fff;
    font-size: 14px;
}
.term_menu ul li a:hover  {
    text-decoration: none;
    -webkit-transition: all .25s ease-out;
    -ms-transition: all .25s ease-out;
    transition: all .25s ease-out;
}

.foot_bottom {
    /*margin: 25px auto;*/
    background: #fff;
    font-size: 14px;
    height: 50px;
    line-height: 50px;
}

.foot_bottom .left {
    text-align: left;
    text-transform: lowercase;
}
.foot_bottom .center {
    text-align: center;
}
.foot_bottom img {
    margin-bottom: 3px;
}
.foot_bottom .right {
    text-align: right;
}
@media only screen and (max-width: 800px){
.foot_bottom .left, .foot_bottom .center, .foot_bottom .right {
    text-align: center;
    padding: 15px;
}
.term_menu ul li {
    width: 100%;
    padding: 5px;
}
.term_menu ul {
    margin: 25px 0;
}
.foot_bottom {height: unset;}
}
    </style>

<footer>
<div class="section_div term_menu">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<ul>
<li><a href="/company/terms">Terms</a></li>
<li><a href="/company/privacy">Privacy</a></li>
<li><a href="/company/investor">Investor</a></li>
<li><a href="#">Team</a></li>
<li><a href="#">Support Us</a></li>
</ul>
</div>
</div>
</div>
</div>
<div style="padding: 25px;background: #fff;">
<div class="section_div foot_bottom">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-4 left">
© {{date("Y")}} eReportHub</div>
<div class="col-xs-12 col-sm-12 col-md-4 center">
<a href="#" target="_blank" rel="nofollow"><img src="{{asset('img/fb.svg')}}" alt="facebook"></a>
<a href="https://twitter.com/" target="_blank" rel="nofollow"><img src="{{asset('img/twitter.svg')}}" alt="twitter"></a>
<a href="https://www.instagram.com/" target="_blank" rel="nofollow"><img src="{{asset('img/instagram.svg')}}" alt="instagram"></a>

</div>
<div class="col-xs-12 col-sm-12 col-md-4 right">
Made with <img src="{{asset('img/heart.svg')}}" alt="made with heart"> in Kashmir</div>
</div>
</div>
</div>
</div>
</footer>

    <div id="back-to-top">
      <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>


  </main> <!-- end main-wrapper -->

  
  <!-- jQuery Scripts -->
  <script src="{{ asset('/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/assets/js/easing.min.js')}}"></script>
  <script src="{{ asset('/assets/js/owl-carousel.min.js')}}"></script>
  <script src="{{ asset('/assets/js/flickity.pkgd.min.js')}}"></script>
  <script src="{{ asset('/assets/js/twitterFetcher_min.js')}}"></script>
  <script src="{{ asset('/assets/js/jquery.newsTicker.min.js')}}"></script>  
  <script src="{{ asset('/assets/js/modernizr.min.js')}}"></script>
  <script src="{{ asset('/assets/js/scripts.js')}}"></script> 
  <script src="{{ asset('/assets/js/particles.min.js')}}"></script>

 @yield('js','')
 @if(!isset($ani))
 <script>
 particlesJS("link_move", {
  "particles": {
    "number": {
      "value": 70,
      "density": {
        "enable": true,
        "value_area": 400
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
 @endif
</body>
</html>