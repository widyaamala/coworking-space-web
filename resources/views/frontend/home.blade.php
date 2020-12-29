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
			  <h2>Ezo Co-working<br><span>Space</span></h2>
			  <span style="line-height: 2.5em;">
				  <span class="subtitle">Rangsang</span><span class="subsub"><strong> Kreatatifitas</strong></span>
				  <span class="subtitle">Perluas</span><span class="subsub"><strong> Networking</strong></span>
			  </span>
			  <div class="quote">Co-Working Space terlengkap hanya untuk kamu</br>Didesain sesuai kebutuhanmu
			  </div>
			  <div>
				<a href="{{ route('login') }}" class="btn-get-started scrollto">Get Started</a>
			  </div>
			</div>

			<div class="col-md-6 intro-img order-md-last order-first">
			  <img src="img/img-ill.png" alt="" class="img-fluid">
			</div>
		  </div>

		</div>
	</section> <!-- #intro -->

<!-- Home -->
<div id="home" class="service spacer p-t-30 p-b-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="section-header">
				  <h3>Ezo Coworking Space</h3>
				</div>
			</div>
		</div>
		<div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="img/ezo.jpeg" alt="" width="100%" height="325">
								</a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <p>
                Ezo Coworking Space adalah tempat berkumpul talenta kreatif sehingga dapat memicu inspirasi dan kreatifitas. Semua fasilitas Ezo Coworking Space didesain sesuai kebutuhan kamu. Nggak masalah kamu baru memulai Start-Up atau freelancer yang sedang cari inspirasi. Di Ezo aja!
              </p>
              <ul>
                <li>
                  <i class="fa fa-check"></i> Group Events
                </li>
                <li>
                  <i class="fa fa-check"></i> Office Supplies
                </li>
                <li>
                  <i class="fa fa-check"></i> Coffee Shops
                </li>
                <li>
                  <i class="fa fa-check"></i> Modern Design
                </li>
                <li>
                  <i class="fa fa-check"></i> Fast Internet
                </li>
				<li>
                  <i class="fa fa-check"></i> Free Parking
                </li>
				<li>
                  <i class="fa fa-check"></i> Relax Room
                </li>
				<li>
                  <i class="fa fa-check"></i> Conference Room
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
	</div>
</div>

<section id="parallax">
      <div class="container">
		<center>
			  <h3 style="color: #413e66;">Why Choose Us</h3>
			  <p>Karena Ezo Coworking Space adalah tempat kerja yang mengusung konsep “bekerja bersama” yang didesain tanpa batas, vibes yang dihasilkan dari bekerja di Coworking Space sangat berbeda daripada kantor pada umumnya.</p>

		</center>
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1000+</span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Visitors</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
          </div>

        </div>

	</div>
</section>
<!-- #home -->

   <section id="services" class="service spacer p-t-30 p-b-30">
      <div class="container">
		<div class="section-header">
			<h3>Our Services</h3>
		</div>
        <div class="room row">
          <div class="col-lg-6">
            <div class="room-img">
              <img src="img/individu.png" alt="" class="img-fluid" width="100%">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="space-content">
				  <div class="room-tagline">Meet New Creative <br>People Everyday</div>
				  <div class="room-title">Coworking Space</div>
				  <div class="room-info">
					<p>Rangsang kreativitas dan perluas networking dengan bekerja di open space dan bertemu dengan pekerja kreatif setiap hari.</p>
					<p>Meja dan kursi (tidak dapat dipindahkan)</br>Wi-Fi</br>Stop kontak</p>
				  </div>
				<a class="btn-room" href="{{ route('homepage') }}">See More</a>
            </div>

          </div>

        </div>
		<div class="room row">

          <div class="col-lg-6">
            <div class="space-content">
				  <div class="room-tagline">Enjoy Event or <br>Workshop</div>
				  <div class="room-title">Event Space</div>
				  <div class="room-info">
					<p>Nikmati berbagai event menarik yang bisa kamu inisiasi sendiri sesuai ide kreatifmu.</p>
					<p>Layar (Screen)</br>Papan Tulis dan Spidol</br>Sound System</br>1 (satu) Microphone</p>
				  </div>
				<a class="btn-room" href="{{ route('room') }}">See More</a>

            </div>

          </div>
          <div class="col-lg-6">
            <div class="room-img">
              <img src="img/event.png" alt="" class="img-fluid" width="100%">
            </div>
          </div>
        </div>
		<div class="room row">
          <div class="col-lg-6">
            <div class="room-img">
              <img src="img/private.png" alt="" class="img-fluid" width="100%">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="space-content">
				  <div class="room-tagline">Own Your <br>Virtual Office</div>
				  <div class="room-title">Private Office</div>
				  <div class="room-info">
					<p>Jika kamu adalah pekerja nomaden, miliki kantor virtualmu dan kamu bisa bereja dengan kenyamanan yang menginspirasi.</p>
					<p>Meja dan kursi (tidak dapat dipindahkan)></br>Self Service (Air Mineral, Tea)</br>Wi-Fi dan Stop kontak</br>Free Seminar apapun 1x (Sebulan)</p>
				  </div>
				<a class="btn-room" href="{{ route('office') }}">See More</a>
            </div>

          </div>

        </div>
		<div class="room row">

          <div class="col-lg-6">
            <div class="space-content">
				  <div class="room-tagline">Creat Your Own <br>Event</div>
				  <div class="room-title">Event Starter</div>
				  <div class="room-info">
					<p>Our latest innovation, we can bring together creative workers or freelancers and nomadic workers, or even students in an event or collaboration that you have initiated yourself. If you are looking for a collaboration partner or if you want to hold an event but you don't have access to find as many participants as possible, We Have You Covered!</p>
					
				  </div>
				<a class="btn-room" href="{{ route('daftar-event') }}">See More</a>

            </div>

          </div>
          <div class="col-lg-6">
            <div class="room-img">
              <img src="img/eventstarter.png" alt="" class="img-fluid" width="100%">
            </div>
          </div>
        </div>
		</div>
	</section>
	<!-- #services -->

	<!-- #events -->
	<section id="events" class="service spacer">
      <div class="container">
		<div class="section-header">
			<h3>Events</h3>
			<center>
			<span class="subtitle">Temukan</span><span class="subsub"><strong> event</strong></span><span class="subtitle"> menarik atau buat</span><span class="subsub"><strong> event impianmu!</strong></span>
			</center>
		</div>
		
		<div class="row pt-5">
			<center><div class="col-sm-8 col-lg-8">
			<div id='calendar'></div>
			</div></center>
		</div>

      <div class="row pt-5">
	  @if(isset($events))
        <div class="col-12">
                        <div class="row row-eq-height">

	  @foreach ($events as $event)
                            <div class="col-md-4 d-flex align-items-stretch mb-3">
                                <div class="card">
                                    <img class="card-img-top img-fluid" alt="" src="{{ url('/receipt/'.$event->image) }}">
                                    <div class="card-body">
										<div data-equal-height="card">
                                        <h4 data-equal-height="title">{{ $event->event_name }}
										</h4>
										<span class="tipe">oleh: <span class="text-muted">
											{{ $event->organizer }}</span></span>
											
										</div>

                                    </div>
									<div class="card-footer">
									<div class="row">

                                        <div class="col-12 col-lg-auto text-center text-lg-right">
											<i class="fas fa-calendar-alt"></i> {{ date('d M Y H:i', strtotime($event->start_time)) }} - {{ date('H:i', strtotime($event->end_time)) }} 
										</div>
                                    </div>
									</div>

                                </div>
                            </div>


		@endforeach
                        </div>
                    </div>
		{!! $events->links() !!}@endif
      </div>

		

	  </div>
	</section>

	<!-- about us-->
	<section id="about" class="service spacer p-t-30 p-b-30">
		<div class="container">
			<div class="section-header">
			  <h3>About Us</h3>
			  <div class="aboutus-tagline">Partners</div>
					<div id="clients" class="carousel slide pt-1" data-ride="carousel" align="center">
					<!-- slides -->
					<div class="carousel-inner">
					  <div class="carousel-item active">
						<div class="row">
							<div class="col-md-3 mb-3"><img src="img/clients/client-1.png" alt=""></div>
							<div class="col-md-3 mb-3"><img src="img/clients/client-2.png" alt=""></div>
							<div class="col-md-3 mb-3"><img src="img/clients/client-3.png" alt=""></div>
							<div class="col-md-3 mb-3"><img src="img/clients/client-4.png" alt=""></div>
						</div>
					  </div>
					  <div class="carousel-item">
						<div class="row">
							<div class="col-md-3 mb-3"><img src="img/clients/client-5.png" alt=""></div>
							<div class="col-md-3 mb-3"><img src="img/clients/client-6.png" alt=""></div>
							<div class="col-md-3 mb-3"><img src="img/clients/client-7.png" alt=""></div>
							<div class="col-md-3 mb-3"><img src="img/clients/client-8.png" alt=""></div>
						</div>
					  </div>
					</div>
					<!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
					</div>

			  <div class="aboutus-tagline">Our Benefits</div>
				<div class="row">
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Affordable Prices</h6>
						<hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<p>Get the best experience with affordable prices.
						</p>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Best Services</h6>
						<hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<p>Best service to stimulate your productivity. We will give you a comfortable room with the best facilities
						</p>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Wider Networking</h6>
						<hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<p>Get wider networking with our engaged community in the city.
						</p>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase font-weight-bold">Event Starter</h6>
						<hr class="cyan accent-4 accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<p>Create your own event from scratch and get new participants and collaboration partners.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="partnership">
      <div class="container">
		<center>
			  <h3 style="color: #413e66;">Join Our Community</h3>
			  <span class="subtitle">Gabung</span><span class="subsub"><strong> Ezo Coworking Space</strong></span><span class="subtitle"> Dengan Menjadi Partner Kami</span></br>
			  <span class="subtitle"> Dapatkan</span><span class="subsub"><strong> Penawaran Menarik</strong></span><span class="subtitle"> Dari Kami</span></br>
			  <div style="padding-top: 1.3em;">
			  <a class="btn btn-outline-primary" href="{{ route('partnership') }}">Send Your Proposal</a>
			  </div>

		</center>

	</div>
</section>

	@endsection

@section('footer_scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(window).on('scroll', function () {
			if ( $(window).scrollTop() > 10 ) {
				$('.navbar').addClass('active');
			} else {
				$('.navbar').removeClass('active');
			}
		});
    $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'

		   },
		   navLinks: true,
      // put your options and callbacks here
      events : [
        @foreach($events as $event)
        {
          title : '{{ $event->event_name }}',
          start : '{{ $event->start_time }}',
		  end : '{{ $event->end_time }}',
          //url : '{{ route('events.edit', $event->id) }}'
        },
        @endforeach
      ]
    })
	});
</script>
@endsection
