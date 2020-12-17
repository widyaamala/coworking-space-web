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
                 <div class="sticky sticky-event">
					<div class="pt-lg-3">
						<h4 class="mb-4">Event Starter</h4>
						<p>Create Your Own Event </p>
					</div>
				</div>            
			</div>
			<div class="col-lg-9 pl-lg-5">
                <form method="GET" action="https://www.dicoding.com/events/list" accept-charset="UTF-8" role="form" class="js-listing-form">
				<div class="input-group mb-3 shadow">
                     <input name="criteria" type="hidden" value="name">
                     <input type="text" class="form-control js-entity-filter" name="q" value="" placeholder="Cari Event" aria-label="Cari Event" aria-describedby="button-addon2">
                     <div class="input-group-append">
                          <button class="btn btn-secondary" type="submit" id="button-addon2"><i class="fas fa-search text-green"></i></button>
                     </div>
                </div>

                <hr>

                <div class="d-flex justify-content-end align-items-center">
                     <small class="mr-2 text-muted">Urut berdasarkan: </small>
                     <select class="js-order-by form-control" style="width:fit-content;" name="order_by"><option value="newest" selected="selected">Event Terbaru</option><option value="updated">Update Terbaru</option><option value="endsoon">Segera Berakhir</option></select>
                 </div>
                 </form>

                    <!-- DAFTAR EVENT -->
                    <div class="my-5">
					@foreach ($eventStarters as $eventStarter)
                        <div class="row row-eq-height mb-3">
                            <div class="col-sm-6">
								<div class="card white-bg shadow  mb-3 ">
									<a href="{{ route('detail-event', $eventStarter->id) }}"  class="position-relative">
										<div class="rounded-top js-balanced-height-img"><img src="{{ url('/receipt/'.$eventStarter->image) }}" class="img-fluid" alt="" width="100%" />
											<noscript>
												<img src="{{ url('/uploads/'.$eventStarter->image) }}" class='noscript noscript-img img-fluid' alt='' />
											</noscript>
										</div>
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
                                        <div class="mt-1 mb-3 text-09">
											<p>{{$eventStarter->description}}</p>
										</div>
										</div>
									</div>
									<a href="{{ route('detail-event', $eventStarter->id) }}" class="remove-style-link" >
									<div class="card-footer">
									<div class="row">
										<div class="col-12 col-lg text-center text-lg-left">
                                            <small>Sisa Kuota: <span></span></small>
                                        </div>

                                        <div class="col-12 col-lg-auto text-center text-lg-right">
											<small><span></span> Hari Lagi</small>
										</div>
                                    </div>
									</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
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
