@extends('layouts.frontend')
@section('template_title')
    {!! trans('Event Space') !!}
@endsection
@section('content')


<!-- #intro -->
	<section id="intro" class="clearfix">
		<div class="container d-flex h-100">
		  <div class="content row justify-content-center align-self-center">
			<div class="col-md-6 intro-info mt-6">
			  <h5>Company Name</h5>
			  <span style="line-height: 2.5em;">
				  <span class="subtitle">Belajar Membuat Service Pertama di Aplikasi Android</span>
			  </span>
			</div>
		   
			<div class="col-md-6 intro-img order-md-last order-first">
			  <img src="img/img-ill.png" alt="" class="img-fluid">
			</div>
		  </div>

		</div>
	</section> <!-- #intro -->

<!-- Info section -->
<div id="services" class="service spacer p-t-30 p-b-30">
  <div class="container">
    <div class="row">
		<div class="col-lg-9">
			<div class="row">
				<div class="room-img col-lg-6 col-sm-5 col-md-4 mb-sm-7">
					<img src="img/cowork.jpg" class="img-fluid" alt="" width="100%">
				  </div>
				  <div class="info col-lg-6 col-sm-7 col-md-8 pt-3 pl-xl-4 pl-lg-5 pl-sm-4">
					<span class="badge badge-secondary">Seminar</span>
										<h2>Dicoding Developer Coaching #15: Android | Belajar Membuat Service Pertamamu di Aplikasi Android</h2>
										<small class="text-muted d-block mb-3">Diselenggarakan oleh: Dicoding Event</small>
										<a class="btn btn-small btn-outline-success btn-block" href="">Share This Event</a>
										
															
				   </div>
			</div>
		</div>
		<div class="col-lg-3 pt-5">
			<b>10</b>
										<span class="text-muted d-block mb-2">Days to go</span>
									
									<b>1865 peserta</b>
									<span class="text-muted d-block mb-2">Participants to go</span>
									
									<p class="mt-3">This event will only be held if it reaches its participant's goal by </p>
									<a class="btn btn-small btn-outline-success" href="">Go</a>
									<a class="btn btn-small btn-outline-success" href="">Cancel</a>
									<a class="btn btn-small btn-outline-success" href="">Re-schedule</a>
		</div>
      
      </div>
	  <div class="row">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
			<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Discussion</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
		</div>
    </div>
	</div>
</div>
<!-- #info -->
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