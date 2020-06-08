@extends('layouts.frontend')
@section('template_title')
    {!! trans('Homepage') !!}
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
          <div class="carousel-background"><img src="img/event.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>We are professional</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/personal.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>At vero eos et accusamus</h2>
              <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/img4.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Temporibus autem quibusdam</h2>
              <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/img2.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Nam libero tempore</h2>
              <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>

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
        <h4>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h4>
        <p>Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit. Odio dolorum exercitationem est error omnis repudiandae ad dolorum sit.</p>
        <p>
          Explicabo repellendus quia labore. Non optio quo ea ut ratione et quaerat. Porro facilis deleniti porro consequatur
          et temporibus. Labore est odio.

          Odio omnis saepe qui. Veniam eaque ipsum. Ea quia voluptatum quis explicabo sed nihil repellat..
        </p>
      </div>
    </div>
  </div>
</div><!-- #info -->

  <div class="service">
<div class="container">
  <header class="section-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3>Pricing</h3>
    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
  </header>
  <div class="row">
    @foreach ($plans as $plan)
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="pri_table_list">
        <h3 class="my-0">{{$plan->plan_name}}<br/> <span>{{$plan->price}}</span></h3>
        <ol>
        <li>{!!$plan->description!!}</li>
        </ol>
        <a class="btn btn-primary" href="{{ route('checkout', $plan->id) }}">Book now</button></a>
      </div>
    </div>
    @endforeach
  </div>
  </div>
</div>

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

<!-- about us-->
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
</section>
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
