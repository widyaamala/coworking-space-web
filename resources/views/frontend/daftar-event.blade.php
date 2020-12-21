@extends('layouts.frontend')
@section('template_title')
    {!! trans('Event Space') !!}
@endsection
@section('content')



<!-- CONTENT -->
<div id="services" class="service spacer p-t-30 p-b-30">
   <div class="container">
       <div class="row mb-5 pt-5">
            <div class="col-lg-3 pb-5">
                 <div class="info">
					<div class="single-well pt-lg-3">
						<h4 class="mb-4">Event Starter</h4>
						<p>Create your own event with the categories that you want, and you can discuss with each other before the event can actually be held. The event will only be held if it reaches its participant's goal by your schedule plan </p>
					</div>
				</div>
			</div>
			<div class="col-lg-9 pl-lg-5">
				<div class="d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-outline-success" href="{{ route('event-starter') }}">Create Your Event</a>
				</div>

                <hr>
                 </form>

                    <!-- DAFTAR EVENT -->
                    <div class="my-5">
                        <div class="row row-eq-height mb-3">
					@foreach ($eventStarters as $eventStarter)
                            <div class="col-sm-6 d-flex align-items-stretch">
								<div class="card white-bg shadow  mb-3 ">
									<a href="{{ route('detail-event', $eventStarter->id) }}"  class="position-relative">
										<img src="{{ url('/uploads/'.$eventStarter->image) }}" class="card-img-top img-fluid" alt="" />
									  </a>
									<div class="card-body">
										<div>
											<span class='badge badge-secondary mb-3'>{{$eventStarter->event_category}}</span>
										</div>
										<div data-equal-height="card">

											<h5 class="mb-0">
											<a data-equal-height="title" href="{{ route('detail-event', $eventStarter->id) }}" >
											{{$eventStarter->event_name}}
											</a>
											</h5>
                                        <span class="tipe">oleh: <span class="text-muted">
											{{$eventStarter->organizer}}</span></span>
										</div>
									</div>
									<a href="{{ route('detail-event', $eventStarter->id) }}" class="remove-style-link" >
									<div class="card-footer">
									<div class="row">
										<div class="col-12 col-lg text-center text-lg-left">
                                            <small>Sisa Kuota: <span>{{(count($eventStarter->participants) < $eventStarter->min_participant) ? $eventStarter->min_participant - count($eventStarter->participants): ''}}</span></small>
                                        </div>

                                        <div class="col-12 col-lg-auto text-center text-lg-right">
											<small>{{$eventStarter->schedule_plan}}</small>
										</div>
                                    </div>
									</div>
									</a>
								</div>
							</div>
					@endforeach
						</div>
					</div>
				</div>
			</div>
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
