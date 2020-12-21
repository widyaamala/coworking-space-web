@extends('layouts.app')
@section('template_title')
    {!! trans('Edit Event Starter') !!}
@endsection
@section('content')



<!-- Info section -->
<div id="services" class="service spacer p-t-30 p-b-30">
  <div class="container">
    <div class="row">
		<div class="col-lg-9">
			<div class="row ">
				<div class="room-img col-lg-6 col-sm-5 col-md-4 mb-sm-7">
					<img src="{{ url('/uploads/'.$event->image) }}" class="img-fluid" alt="" width="100%">
				 </div>
				  <div class="info col-lg-6 col-sm-7 col-md-8 pt-3 pl-xl-4 pl-lg-5 pl-sm-4">
					<span class="badge badge-secondary">{{$event->event_category}}</span>
					<h2>{{$event->event_name}}</h2>
					<small class="text-muted d-block mb-3">Diselenggarakan oleh: <span class="text-muted">{{$event->organizer}}</span></small>
           </div>
			</div>
		</div>
		<div class="col-lg-3 pt-5">
									<span class="text-muted d-block mb-2">Date</span>
									<b>{{$event->date}}</b></br>
									<span class="text-muted d-block mb-2">Start Time</span>
									<b>{{$event->start_time}}</b></br>
									<span class="text-muted d-block mb-2">End Time</span>
									<b>{{$event->end_time}}</b></br>
									
									<span class="text-muted d-block mb-2">Total Seats</span>
									<b>{{$event->total_seats}}</b></br>

                  
		</div>

      </div>
  <!-- Tabs navs -->
<ul class="nav nav-tabs mb-3 mt-5" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="ex1-tab-1"
      data-toggle="tab"
      href="#ex1-tabs-1"
      role="tab"
      aria-controls="ex1-tabs-1"
      aria-selected="true"
      > Description
	  </a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex1-tab-2"
      data-toggle="tab"
      href="#ex1-tabs-2"
      role="tab"
      aria-controls="ex1-tabs-2"
      aria-selected="false"
      >Rundown</a
    >
  </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex1-content">
  <div
    class="tab-pane fade show active"
    id="ex1-tabs-1"
    role="tabpanel"
    aria-labelledby="ex1-tab-1"
  >
    <h5 style = "text-transform:capitalize;">Description</h5>
	  <p>{{$event->description}}</p>
	  
	  <hr>
	  <h5 style = "text-transform:capitalize;">Facilities</h5>
	  <p>{{ $event->facilities?implode(', ', $event->facilities):'' }}</p>
	  
  </div>
  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
    <h5 style = "text-transform:capitalize;">Rundown</h5>
	  <p>{{$event->rundown}}</p>
  </div>
</div>
<!-- Tabs content -->
	</div>
</div>
<!-- #info -->

@endsection
