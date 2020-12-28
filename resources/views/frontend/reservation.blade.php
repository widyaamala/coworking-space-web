@extends('layouts.frontend')
@section('template_title')
    {!! trans('Event Hall') !!}
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
          <div class="carousel-background"><img src="/img/event.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>We are professional</h2>
              <p>We are open to global trends, and have a corporate, elitist and altruistic mindset, as well as participating in major events, branding and public relations.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="/img/room1.jpeg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>We fulfill the accessibility of the lone eagle</h2>
              <p>We fulfill the accessibility of membership and lone eagles (intellectual workers, freelancers, etc.) in establishing relationships with agencies, start-ups, and communities and are able to become a third place that brings together individuals in the events we provide.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="/img/room2.jpeg" alt=""></div>
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

<div id="services" class="service spacer p-t-30 p-b-30">
  <div class="container">
  <form class="mb-5" action="{{ route('post-event') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-6 order-md-1 mb-4">
		<div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                <!-- slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active"> <img src="/img/event2.jpg"  alt="Hills"> </div>
                    <div class="carousel-item"> <img src="/img/events.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="/img/paket3.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="/img/event1.jpg" alt="Hills"> </div>
                </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                <ol class="carousel-indicators list-inline">
                    <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="/img/event2.jpg" class="img-fluid"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="/img/events.jpg" class="img-fluid"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="/img/paket3.jpg" class="img-fluid"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel"> <img src="/img/event1.jpg" class="img-fluid"> </a> </li>
                </ol>
        </div>
      </div>
      <div class="col-md-6 order-md-2">
          <h4 class="mb-3">Event Hall</h4>
		  <div class="form-group row">
			  <label for="organiser" class="col-4 col-form-label">Company/Organization </label>
			  <div class="col-8">
              <input type="hidden" name="user_id" value="{{(Auth()->user()->id)}}">	<input type="hidden" name="product_id" value="{{$product->id}}">
				<input class="form-control" type="text" value="" id="organizer" name="organizer">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="start_time" class="col-4 col-form-label">Start Time</label>
			  <div class="col-8">
				<input class ="form-control" type="datetime-local" id="start_time" name="start_time" value="{{ date('Y-m-d\TH:i') }}" min="2020-01-01">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="end_time" class="col-4 col-form-label">End Time</label>
			  <div class="col-8">
				<input class ="form-control" type="datetime-local" id="end_time" name="end_time" value="{{ date('Y-m-d\TH:i') }}" min="2020-01-01">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="event_name" class="col-4 col-form-label">Event Name</label>
			  <div class="col-8">
				<input class="form-control" type="text" value="" id="event_name" name="event_name">
			  </div>
		  </div>
		  <div class="form-group row">
			<label for="description" class="col-4 col-form-label">Event Description</label>
			<textarea class="form-control" id="description" name ="description" rows="5" placeholder="Description"></textarea>
		  </div>
		  <div class="form-group row">
			<label for="rundown" class="col-4 col-form-label">Rundown</label>
			<textarea class="form-control" id="rundown" name ="rundown" rows="5" placeholder="Rundown"></textarea>
		  </div>
		  <div class="form-group row">
			<label for="event_type" class="col-4 col-form-label">Event Type</label>
			<div class="col-8">
			<select class="form-control" id="event_type" name="event_type">
			  <option>Private</option>
			  <option>Public</option>
			</select>
			</div>
		  </div>
		  <div class="form-group row">
			<label for="event_category" class="col-4 col-form-label">Event Category</label>
			<div class="col-8">
			<select class="form-control" id="event_category" name="event_category">
			  <option>Seminar</option>
			  <option>Workshop</option>
			  <option>Meeting</option>
			  <option>Collaboration</option>
			</select>
			</div>
		  </div>
		  <div class="form-group row">
			  <label for="total_seats" class="col-4 col-form-label">Total Seat</label>
			  <div class="col-8">
				<input class="form-control" type="number" value="" id="total_seats" name="total_seats">
			  </div>
		  </div>
		  <div class="form-group row">
			<label for="layout_seat" class="col-4 col-form-label">Layout Seat</label>
			<div class="col-8">
			<select class="form-control" id="layout_seat" name="layout_seat">
			  <option>Classroom Layout</option>
			  <option>O-Layout</option>
			  <option>U-Layout</option>
			  <option>Group Layout</option>
			  <option>Theater Layout</option>
			  <option>Square Layout</option>
			</select>
			</div>
		  </div>
		  <div class="form-group row">
			  <label for="facilities" class="col-4 col-form-label">Facilities</label>
			  <div class="col-6">
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Screen">
				  <label class="form-check-label" for "facilities[]">Screen</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Microphone">
				  <label class="form-check-label" for "facilities[]">Microphone</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Sound System">
				  <label class="form-check-label" for "facilities[]">Sound System</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Whiteboard & Marker">
				  <label class="form-check-label" for "facilities[]">Whiteboard & Marker</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Additional Microphone">
				  <label class="form-check-label" for "facilities[]">Additional Screen (Extra Charge 50k)</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Whiteboard & Marker">
				  <label class="form-check-label" for "facilities[]">Additional Microphone (Extra Charge 20k)</label>
			  </div>
			  </div>
		  </div>
		  <div class="form-group row ">
			  <label class="col-6 col-form-label">Poster Event / Logo Institute</label>
			  <div class="custom-file">
				<input type="file" class="custom-file-input" id="image" name="image" required>
				<label class="custom-file-label" for="image">Choose file...</label>
			  </div>
		  </div>
		  <div class="form-group row">
			<label for="payment_method" class="col-4 col-form-label">DP Payment Method</label>
			<div class="col-8">
			<select class="form-control" id="payment_method" name="payment_method">
			  <option>Transfer Bank</option>
			  <option>Paypal</option>
			</select>
			</div>
		  </div>
		  
		  <hr class="mb-4">
                <div class="text-center">
                  <button class="btn btn-success btn-lg submit-button" type="submit">Submit Reservation</button>
                </div>
      </div>
    </div>
  </form>
  </div>
  </div>
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