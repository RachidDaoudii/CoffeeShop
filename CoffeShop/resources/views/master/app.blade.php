<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Coffee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/aos.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/jquery.timepicker.css')}}">    
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontEndCoffe/css/style.css')}}">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ url('/') }}">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
              @if (Route::has('login'))
                @auth
                    <li class="nav-item"><a href="{{ url('users') }}" class="nav-link">Dashboard</a></li>  
                @else
                    <li class="nav-item"><a href="{{ url('login') }}" class="nav-link">Login</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ url('register') }}" class="nav-link">Register</a></li>
                    @endif
                @endauth
              @endif
	          <li class="nav-item cart"><a href="" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

        @yield('content')
    
  
    <script src="{{ asset('frontEndCoffe/js/jquery.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/aos.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('frontEndCoffe/js/google-map.js')}}"></script>
    <script src="{{ asset('frontEndCoffe/js/main.js')}}"></script>
      
  </body>
</html>