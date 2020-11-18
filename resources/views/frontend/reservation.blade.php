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

<div id="services" class="service spacer p-t-30 p-b-30">
  <div class="container">
  <form class="mb-5" action="{{ route('checkout', $room->id) }}" method="POST">
  @csrf
    <div class="row">
      <div class="col-md-6 order-md-1 mb-4">
		<div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                <!-- slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active"> <img src="https://i.imgur.com/weXVL8M.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://i.imgur.com/Rpxx6wU.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://i.imgur.com/83fandJ.jpg" alt="Hills"> </div>
                    <div class="carousel-item"> <img src="https://i.imgur.com/JiQ9Ppv.jpg" alt="Hills"> </div>
                </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                <ol class="carousel-indicators list-inline">
                    <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="https://i.imgur.com/weXVL8M.jpg" class="img-fluid"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="https://i.imgur.com/Rpxx6wU.jpg" class="img-fluid"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="https://i.imgur.com/83fandJ.jpg" class="img-fluid"> </a> </li>
                    <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel"> <img src="https://i.imgur.com/JiQ9Ppv.jpg" class="img-fluid"> </a> </li>
                </ol>
        </div>
      </div>
      <div class="col-md-6 order-md-2">
          <h4 class="mb-3">Event Hall</h4>
		  <div class="form-group row">
			  <label for="date" class="col-4 col-form-label">Date and time</label>
			  <div class="col-8">
              <input type="hidden" name="user_id" value="{{(Auth()->user()->id)}}">			  
              <input type="hidden" name="room_id" value="{{$room->id}}">
				<input class="form-control" type="datetime-local" value="2020-18-11T13:45:00" id="date" name="date">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="event_name" class="col-4 col-form-label">Event Name</label>
			  <div class="col-8">
				<input class="form-control" type="text" value="" id="event_name" name="event_name">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="duration" class="col-4 col-form-label">Duration</label>
			  <div class="col-8">
				<input class="form-control" type="number" value="" id="duration" name="duration">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="room_name" class="col-4 col-form-label">Room Name</label>
			  <div class="col-8">
              <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room Name" aria-label="Room Name" value="{{$room->room_name}}" readonly>
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="total_seat" class="col-4 col-form-label">Total Seat</label>
			  <div class="col-8">
				<input class="form-control" type="number" value="" id="total_seat" name="total_seat">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="total_snacks" class="col-4 col-form-label">Total Snacks</label>
			  <div class="col-8">
				<input class="form-control" type="number" value="" id="total_snacks" name="total_snacks">
			  </div>
		  </div>
		  <div class="form-group row">
			  <label for="snack_choices" class="col-4 col-form-label">Snacks</label>
			  <label><input type="checkbox" name="snack_choices[]" value="Laravel"> Laravel</label>
              <label><input type="checkbox" name="snack_choices[]" value="JQuery"> JQuery</label>
              <label><input type="checkbox" name="snack_choices[]" value="Bootstrap"> Bootstrap</label>
              <label><input type="checkbox" name="snack_choices[]" value="Codeigniter"> Codeigniter</label>
		  </div>
		  <div class="form-group row">
			<label for="layout_seat" class="col-4 col-form-label">Layout Seat</label>
			<div class="col-8">
			<select class="form-control" id="layout_seat" name="layout_seat">
			  <option>1</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="note">Event Description</label>
			<textarea class="form-control" id="note" name ="note" rows="5"></textarea>
		  </div>
		  <div class="form-group row">
			<label for="status" class="col-4 col-form-label">Event Type</label>
			<div class="col-8">
			<select class="form-control" id="status" name="status">
			  <option>Private</option>
			  <option>Public</option>
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
      $('.navbar').removeClass('fixed-top');
			$('.navbar').addClass('active');
		});
  </script>
@endsection