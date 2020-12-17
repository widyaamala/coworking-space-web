<!doctype html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v4.0.1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('template_title')@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>

    {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{-- Fonts --}}
    @yield('template_linked_fonts')

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

  {{-- Styles --}}
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/personal.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

  @yield('template_linked_css')

  <style>
    body {
      background-color: #f0f8ff;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .step-wrapper:first-child:before {
      content:none
    }
    .step-wrapper:last-child:after {
      content:none
    }
    .step-wrapper {
      position: relative;
      transition: none;
      color: #c7cccf;
      font-weight: bold;
    }
    .step-wrapper:before, .step-wrapper:after {
      content: '';
      display: block;
      width: calc(50% - 29px);
      height: 0;
      border-bottom: 2px solid #c7cccf;
      position: absolute;
      left: 0;
      top: 21px;
    }
    .step-wrapper:after {
      left: auto;
      right: 0;
    }
    span[class*="svg"] {
      border-radius: 50%;
      border: 2px solid #c7cccf;
      text-align: center;
      padding: 12px 10px;
    }
    .step-title {
      margin-top:10px;
    }

    .card {
      overflow: hidden;
      border: none;
      border-radius: 8px;
      box-shadow: 0 7px 10px rgba(77,88,114,.1);
      -webkit-transition: .25s box-shadow;
      transition: .25s box-shadow;
    }

    .card:focus,
    .card:hover {
      box-shadow: 0 5px 11px 0 rgba(77,88,114,.1), 0 4px 15px 0 rgba(77,88,114,.1);
    }
  </style>
  </head>
  <body>
    <div id="apps">
      <!--<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="#">Features</a>
          <a class="p-2 text-dark" href="#">Enterprise</a>
          <a class="p-2 text-dark" href="#">Support</a>
          <a class="p-2 text-dark" href="#">Pricing</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
      </div>-->

  	<header class="header">
      <nav class="navbar navbar-expand-lg fixed-top py-3">
          <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">EZO SPACE</a>
              <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

              <div id="navbarSupportedContent" class="collapse navbar-collapse">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item active"><a href="#intro" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                      <li class="nav-item"><a href="#prices" class="nav-link text-uppercase font-weight-bold">Services</a></li>
                      <li class="nav-item"><a href="#seats" class="nav-link text-uppercase font-weight-bold">Events</a></li>
                      <li class="nav-item"><a href="#about" class="nav-link text-uppercase font-weight-bold">About</a></li>
                      <li class="nav-item"><a href="#contacts" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                  </ul>
              </div>
          </div>
      </nav>
  	</header>

  	@yield('content')

  	<!-- Footer -->
    <footer id="contacts" class="page-footer font-small unique-color-dark">

      <div style="background-color: #107f35;">
        <div class="container">

          <!-- Grid row-->
          <div class="row py-4 d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
              <h6 class="mb-0">Get connected with us on social networks!</h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-7 text-center text-md-right">

              <!-- Facebook -->
              <a class="fb-ic">
                <i class="fab fa-facebook-f white-text mr-4"> </i>
              </a>
              <!-- Twitter -->
              <a class="tw-ic">
                <i class="fab fa-twitter white-text mr-4"> </i>
              </a>
              <!-- Google +-->
              <a class="gplus-ic">
                <i class="fab fa-google-plus-g white-text mr-4"> </i>
              </a>
              <!--Linkedin -->
              <a class="li-ic">
                <i class="fab fa-linkedin-in white-text mr-4"> </i>
              </a>
              <!--Instagram-->
              <a class="ins-ic">
                <i class="fab fa-instagram white-text"> </i>
              </a>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row-->

        </div>
      </div>

      <!-- Footer Links -->
      <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mb-4">

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold">EZO SPACE</h6>
            <hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
              consectetur
              adipisicing elit.
    		</p>

    		<!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Contact</h6>
            <hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <i class="fas fa-home mr-3"></i> Jl. Dewandaru68 Malang Jawa Timur</p>
            <p>
              <i class="fas fa-envelope mr-3"></i> info@ezospace.co</p>
            <p>
              <i class="fas fa-phone mr-3"></i> 082341600020</p>

          </div>
          <!-- Grid column -->

    	  <!-- Grid column -->
          <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mb-4">

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold">Contact Us</h6>
            <hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            

    		<!-- Form -->
            <form action="" method="post" role="form" class="contactForm">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      <div class="validation"></div>

                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                      <div class="validation"></div>
                    </div>
    <!--
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
     -->
                    <div class="text-center"><button class="btn btn-success" type="submit" title="Send Message">Send Message</button></div>
                  </form>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->

    {{-- Scripts --}}
  	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
  	<!-- Bootstrap tooltips -->
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  	<!-- Bootstrap core JavaScript -->
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<!-- MDB core JavaScript -->
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}" defer></script>

    @yield('footer_scripts')
    </div>
  </body>
</html>
