@extends('layouts.frontend')
@section('template_title')
    {!! trans('Personal') !!}
@endsection
@section('content')

<!--==========================
  Intro Section
============================-->
<section id="intro">
  <div class="intro-container">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
          <div class="carousel-background"><img src="img/img3.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>We are professional</h2>
              <p>We are open to global trends, and have a corporate, elitist and altruistic mindset, as well as participating in major events, branding and public relations.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/personal.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>We fulfill the accessibility of the lone eagle</h2>
              <p>We fulfill the accessibility of membership and lone eagles (intellectual workers, freelancers, etc.) in establishing relationships with agencies, start-ups, and communities and are able to become a third place that brings together individuals in the events we provide.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/paket3.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>We have flexibility space and hybridization of a Coworking Space</h2>
              <p>We fulfill workspace flexibility which includes the quality of facilities and infrastructure that support workers, as well as additional functions that are managed as a separate unit in the form of a coffee shop that can fulfill the hybridization of a coworking space.</p>

            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>
</section><!-- #intro -->

<!-- Info section -->
<div id="services" class="service spacer p-t-30 p-b-30">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="img/cowork.jpg" class="img-fluid" alt="" width="100%">
      </div>
      <div class="info col-lg-6">
        <center><h4>No Coworking Space Benefits? We Have You Covered!</h4></center>
        <p>We provide open space that is designed according to your needs with comfort that can stimulate creativity and provide various insights. We are able to become a third place that can expand your networking by bringing together creative workers in our space so that they can forge social relationships between individuals into a community that can spill their creative ideas synergistically.</p>
        <p>
          We provide best facilities, best services, and flexibility space at an affordable price. Join our membership plan and get our best services for the time period you want. By offering the plan directly to you, we remove the cost and hassle of a middleman. We keep it simple, pass the savings to you, and focus on your works.
        </p>
      </div>
    </div>
  </div>
</div><!-- #info -->

<!-- Services-->
  <section class="page-section section-bg" id="services">
    <div class="container">
      <div class="icon-sec row text-center">
        <div class="col-md-6 col-lg-3">
          <i class="fa fa-wifi fa-3x"></i>
          <p class="text-muted">Full Fast Internet 50 MBPS</p>
		</div>
        <div class="col-md-6 col-lg-3">
          <i class="fas fa-video fa-3x"></i>
          <p class="text-muted">LCD Projector</p>
		</div>
        <div class="col-md-6 col-lg-3">
          <i class="fas fa-chalkboard-teacher fa-3x"></i>
          <p class="text-muted">Screen Projector</p>
		</div>
		<div class="col-md-6 col-lg-3">
          <i class="fas fa-microphone fa-3x"></i>
          <p class="text-muted">Microphone</p>
		</div>
      </div></br>
	  <div class="icon-sec row text-center">	  
		<div class="col-md-3">
          <i class="fas fa-tv fa-3x"></i>
          <p class="text-muted">Smart TV</p>
		</div>
		<div class="col-md-3">
          <i class="fas fa-chalkboard fa-3x"></i>
          <p class="text-muted">Whiteboard</p>
		</div>
		<div class="col-md-3">
          <i class="fas fa-volume-up fa-3x"></i>
          <p class="text-muted">Sound System</p>
		</div>
		<div class="col-md-3">
          <i class="fas fa-utensils fa-3x"></i>
          <p class="text-muted">Available Catering for Request</p>
		</div>
	  </div>
    </div>
  </section>

  <div id="prices" class="service">
<div class="container">
  <header class="section-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3>Pricing</h3>
    <p class="lead">Join our membership plans and get the best services at minimum prices.</p>
  </header>
  <div class="row">
    @foreach ($products as $product)
		<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="card h-100 mb-4 text-center border-success  align-items-center">
          <div class="card-header  ml-0 text-success bg-transparent">
            <h3 class="my-0">{{$product->name}}<br/> <span>{{$product->price}}</span></h3>
          </div>
          <div class="card-body ml-0 ">
            <div class="row">
              <ol>
				<li style="list-style-type: none;">{!!$product->description!!}</li>
			  </ol>
            </div>
          </div>
			<div class="card-footer bg-transparent">
				<a class="button btn" href="{{ route('checkout', $product->id) }}">Book now</a>
			</div>
        </div>
		</div>
		@endforeach
      </div>

  </div>
  </div>
</div>

<!-- layout
<section id="seats" class="service">
  <div class="container">
    <header class="section-header">
      <h3>Seat Layouts</h3>
    </header>
    <div class="row" style="padding-top: 1em;">
      <div class="card-deck">
        <div class="card" >
        <img class="card-img-top" width="100%" height="180" src="img/Group 14.png">
          <h5 class="card-title name-box">Classroom Layout</h5>
        </div>
      <div class="card" >
        <img class="card-img-top" width="100%" height="180" src="img/Group 15.png">
          <h5 class="card-title name-box">O-Layout</h5>
        </div>
      <div class="card" >
        <img class="card-img-top" width="100%" height="180" src="img/Group 13.png">
          <h5 class="card-title name-box">U-Layout</h5>
        </div>
        <div class="card" >
        <img class="card-img-top" width="100%" height="180" src="img/Group 12.png">
          <h5 class="card-title name-box">Group Layout</h5>
        </div>
        <div class="card" >
        <img class="card-img-top" width="100%" height="180" src="img/Group 11.png">
          <h5 class="card-title name-box">Theater Layout </h5>
        </div>
        <div class="card" >
        <img class="card-img-top" width="100%" height="180" src="img/Group 9.png">
          <h5 class="card-title name-box">Square Layout</h5>
        </div>
    </div>
    </div>
  </div>
</section>

<!-- about us
<section id="about" class="service spacer p-t-30 p-b-30">
  <div class="container">
    <div class="section-header">
      <h3>About Us</h3>
      <div class="aboutus-tagline">Partners</div>
        <div id="clients" class="owl-carousel clients-carousel">
          <img src="img/clients/client-1.png" alt="">
          <img src="img/clients/client-2.png" alt="">
          <img src="img/clients/client-3.png" alt="">
          <img src="img/clients/client-4.png" alt="">
          <img src="img/clients/client-5.png" alt="">
          <img src="img/clients/client-6.png" alt="">
          <img src="img/clients/client-7.png" alt="">
          <img src="img/clients/client-8.png" alt="">
        </div>

      <div class="aboutus-tagline">Our Benefits</div>
      <div class="row">
        <div class="col-md-4">
          <h6 class="text-uppercase font-weight-bold">Feature One</h6>
          <hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
            consectetur
            adipisicing elit.
          </p>
        </div>
        <div class="col-md-4">
          <h6 class="text-uppercase font-weight-bold">Feature Two</h6>
          <hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
            consectetur
            adipisicing elit.
          </p>
        </div>
        <div class="col-md-4">
          <h6 class="text-uppercase font-weight-bold">Feature Three</h6>
          <hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
            consectetur
            adipisicing elit.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>-->
@endsection

@section('footer_scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$(window).on('scroll', function () {
				if ( $(window).scrollTop() > 10 ) {
					$('.navbar').addClass('active');
				} else {
					$('.navbar').removeClass('active');
				}
			});
		});
  </script>
@endsection
