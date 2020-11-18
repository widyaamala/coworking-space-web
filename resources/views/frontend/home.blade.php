@extends('layouts.frontend')
@section('template_title')
    {!! trans('Home') !!}
@endsection
@section('content')

<!-- #intro -->
	<section id="intro" class="clearfix">
		<div class="container d-flex h-100">
		  <div class="content row justify-content-center align-self-center">
			<div class="col-md-6 intro-info order-md-first order-last">
			  <h1 class="title">EZO</h1>
			  <h1 class="subtitle">Co-Working Space</h1>
			  <h1 class="subsub"><strong>everytime.</strong> coffee</h1>
			  <div>
				<p class="quote">everything we do <br>all need refreshing by drinking coffee</p>
			  </div>
			</div>
		   
			<div class="col-md-6 intro-img order-md-last order-first">
			  <img src="img/img-ill.png" alt="" class="img-fluid">
			</div>
		  </div>

		</div>
	</section> <!-- #intro -->
	
	<!-- Ezo section -->
<div id="services" class="service spacer p-t-30 p-b-30">
	<div class="container">
        <header class="section-header">
          <h3>Ezo Coworking Space</h3>
        </header>
		<div class="row">
			<div class="col-lg-8">
				<div class="slider1">
					<div id="slider-featured" class="carousel slide bs-slider carousel-fade control-round indicators-line my-3" data-ride="carousel" data-pause="hover" data-interval="8000">
						<ol class="carousel-indicators">
							<li data-target="#slider-featured" data-slide-to="0" class=""></li>
							<li data-target="#slider-featured" data-slide-to="1" class="active"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item">
								<img src="img/img2.jpg" alt="slide1" width="90%" height="345">
							</div>
							<div class="carousel-item active">
								<img src="img/img3.jpg" alt="slide2" width="90%" height="345">
							</div>
							<a class="left carousel-control-prev text-white font-14" href="#slider-featured" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Sebelumnya</span>
							</a>
							<a class="right carousel-control-next text-white font-14" href="#slider-featured" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Selanjutnya</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="information col-lg-4">
				<p>Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit. Odio dolorum exercitationem est error omnis repudiandae ad dolorum sit.</p>
				<p>
					Explicabo repellendus quia labore. Non optio quo ea ut ratione et quaerat. Porro facilis deleniti porro consequatur
					et temporibus. Labore est odio.

					Odio omnis saepe qui. Veniam eaque ipsum. Ea quia voluptatum quis explicabo sed nihil repellat..
				</p>
			</div>
		</div>
	</div>
</div>

<!-- Services -->
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
  
   <section id="services" class="service spacer p-t-30 p-b-30">
      <div class="container">
        <div class="room row">
          <div class="col-lg-6">
            <div class="room-img">
              <img src="img/personal.jpg" alt="" class="img-fluid" width="80%">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="space-content">
				  <div class="room-tagline">Meet New Creative <br>People Everyday</div>
				  <div class="room-title">Coworking Space</div>
				  <div class="room-info">
					<p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
					<p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
				  </div>
				<a class="button btn" href="{{ route('homepage') }}">See More</a>          
            </div>

          </div>

        </div>
		<div class="room row">
			
          <div class="col-lg-6">
            <div class="space-content">
				  <div class="room-tagline">Enjoy Event or <br>Workshop</div>
				  <div class="room-title">Event Space</div>
				  <div class="room-info">
					<p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
					<p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
				  </div>
				<a class="button btn" href="{{ route('homepage') }}">See More</a>
				
            </div>

          </div>
          <div class="col-lg-6">
            <div class="room-img">
              <img src="img/personal.jpg" alt="" class="img-fluid" width="80%">
            </div>
          </div>
        </div>
		<div class="room row">
          <div class="col-lg-6">
            <div class="room-img">
              <img src="img/personal.jpg" alt="" class="img-fluid" width="80%">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="space-content">
				  <div class="room-tagline">Discuss Everything in <br>Meeting Room</div>
				  <div class="room-title">Meeting Room</div>
				  <div class="room-info">
					<p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
					<p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
				  </div>
				<a class="button btn" href="{{ route('room') }}">See More</a>          
            </div>

          </div>

        </div>
		</div>
	</section>
	<!-- #services -->
	
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
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Feature One</h6>
						<hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
						  consectetur
						  adipisicing elit.
						</p>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Feature Two</h6>
						<hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
						  consectetur
						  adipisicing elit.
						</p>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Feature Three</h6>
						<hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
						  consectetur
						  adipisicing elit.
						</p>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Feature Four</h6>
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