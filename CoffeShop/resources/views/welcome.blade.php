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
	          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Contact</a></li>
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

    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontEndCoffe/images/bg_1.jpg')}});">
            <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
  
              <div class="col-md-8 col-sm-12 text-center ftco-animate">
                  <span class="subheading">Welcome</span>
                <h1 class="mb-4">The Best Coffee Testing Experience</h1>
                <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
              </div>
  
            </div>
          </div>
        </div>
  
        <div class="slider-item" style="background-image: url({{ asset('frontEndCoffe/images/bg_2.jpg')}});">
            <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
  
              <div class="col-md-8 col-sm-12 text-center ftco-animate">
                  <span class="subheading">Welcome</span>
                <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
                <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
              </div>
  
            </div>
          </div>
        </div>
  
        <div class="slider-item" style="background-image: url({{ asset('frontEndCoffe/images/bg_3.jpg')}});">
            <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
  
              <div class="col-md-8 col-sm-12 text-center ftco-animate">
                  <span class="subheading">Welcome</span>
                <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
                <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
              </div>
  
            </div>
          </div>
        </div>
      </section>

    <section class="ftco-section" id="menu">
    	<div class="container">
        <div class="row">
        	<div class="col-md-12 mb-5 pb-3">
                
                @foreach($categories as $category)
                    <h3 class="mb-5 heading-pricing ftco-animate">{{ $category->name_category}}</h3>
                        @foreach($plats as $plat)
                            @if( $plat->name_category == $category->name_category)
                                <div class="pricing-entry d-flex ftco-animate">
                                    <div class="img" style="background-image: url({{ asset($plat->img) }});"></div>
                                    <div class="desc pl-3">
                                        <div class="d-flex text align-items-center">
                                            <h3><span>{{ $plat->name}}</span></h3>
                                            <span class="price">${{ $plat->price}}</span>
                                        </div>
                                        <div class="d-block">
                                            <p>{{ $plat->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            {{-- @else
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img" style="background-image: url({{ asset('img/logo.png') }});"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>null</span></h3>
                                        <span class="price">$00.00</span>
                                    </div>
                                    <div class="d-block">
                                        <p>null</p>
                                    </div>
                                </div>
                            </div> --}}
                            @endif
                        @endforeach
                @endforeach

    </section>

    

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{asset('frontEndCoffe/images/image_1.jpg')}});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{asset('frontEndCoffe/images/image_2.jpg')}});"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->


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