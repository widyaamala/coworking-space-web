@extends('layouts.frontend')
@section('template_title')
    {!! trans('Checkout') !!}
@endsection
@section('content')

<div class="container">

  <div class="pricing-header px-3 py-4 mx-auto text-center">
    <h1 class="font-weight-bold">Create Your Own Event</h1>
    <p class="lead"></p>
  </div>

  <form class="needs-validation mb-5" action="{{ route('post-event') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-12 order-md-1">
        <div class="card p-3">
          <h4 class="card-title mb-3">Tell Us bout Your Event</h4>
          <div class="row">
              <div class="form-group col-md-8 mb-3">
				  <label for="date" class="col-4 col-form-label">Schedule Plan</label>
				  <div class="col-8">
					<input class="form-control" type="date" name="date" value="2020-11-21" min="2020-01-01" max="2022-01-01">
				  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
				  <label for="time" class="col-4 col-form-label">Start Time</label>
				  <div class="col-8">
					<input class="form-control" type="time" name="time" value="22:00">
				  </div>
              </div>
              <div class="col-md-6 mb-3">
				  <label for="end_time" class="col-4 col-form-label">End Time</label>
				  <div class="col-8">
					<input class="form-control" type="time" value="22:00" id="end_time" name="end_time">
				  </div>
              </div>
          </div>
		  <div class="row">
              <div class="col-md-12 mb-3">
				  <label for="event_name" class="col-4 col-form-label">Event Name</label>
				  <div class="col-8">
					<input class="form-control" type="text" value="" id="event_name" name="event_name">
				  </div>
              </div>
          </div>
		  <div class="row">
              <div class="col-md-12 mb-3">
				  <label for="description" class="col-4 col-form-label">Event Description</label>
				  <div class="col-12">
				<textarea class="form-control" id="description" name ="description" rows="5" placeholder="Description"></textarea>
				</div>
              </div>
          </div>
		  <div class="row">
              <div class="col-md-12 mb-3">
				  <label for="rundown" class="col-4 col-form-label">Rundown Plan</label>
				<div class="col-12">
				<textarea class="form-control" id="rundown" name ="rundown" rows="8" placeholder="Rundown Plan"></textarea>
				</div>
              </div>
          </div>
		  <div class="row">
              <div class="col-md-6 mb-3">
				  <label for="event_type" class="col-4 col-form-label">Event Type</label>
				<div class="col-8">
				<select class="form-control" id="event_type" name="event_type">
				  <option>Private</option>
				  <option>Public</option>
				</select>
				</div>
              </div>
              <div class="col-md-6 mb-3">
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
          </div>
		  <div class="row">
              <div class="col-md-6 mb-3">
				  <label for="total_seats" class="col-4 col-form-label">Minimum Participant</label>
				  <div class="col-8">
					<input class="form-control" type="number" value="" id="total_seats" name="total_seats">
				  </div>
              </div>
              <div class="col-md-6 mb-3">
				  <label for="images" class="col-6 col-form-label">Poster Event / Logo Institute</label>
				  
				<div class="col-8">
					<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" required>
					<label class="custom-file-label" for="image">Choose file...</label>
					</div>
				  </div>
              </div>
          </div>

          <h4 class="mt-5">Payment Method</h4>
          <div class="payment-processors">
            <div class="btn-group d-flex btn-group-justified mb-3" data-toggle="buttons">
  	            <label class="btn btn-primary col-6 active" role="button" data-toggle="collapse" data-target="#bank" aria-expanded="true" aria-controls="bank">
  	            	<div class="method visa"><i class="fa fa-credit-card"></i> Bank Transfer</div>
  	                <input type="radio" name="payment_method" value="Bank Transfer" class="d-none" checked>
  	            </label>
  	            <label class="btn btn-info col-6" role="button" data-toggle="collapse" data-target="#paypal" aria-expanded="true" aria-controls="paypal">
  	            	<div class="method visa"><i class="fab fa-paypal"></i> Paypal</div>
  	                <input type="radio" name="payment_method" value="paypal" class="d-none">
  	            </label>
  	        </div>

            <div class="row collapse show" id="bank" data-parent=".payment-processors">
              <div class="col-12 mb-3">
                <div class="row">
                  <div class="col-sm-6">
                    <h6>Nomor Rekening: xxxx-xxxx-xxxx</h6>
                  </div>
                  <div class="col-sm-6">
                    <h6>A/N: xxxx-xxxx-xxxx</h6>
                  </div>
                </div>

                <hr class="mb-4">
                <div class="text-center">
                  <button class="btn btn-success btn-lg submit-button" type="submit">Submit Payment</button>
                </div>
              </div>
            </div>
            <div class="row collapse" id="paypal" data-parent=".payment-processors">
              <div class="col-12 mb-3 text-center">
                  <a href="" class=''><img src="https://i0.wp.com/eloiahealingarts.com/wp-content/uploads/2013/11/paypal-checkout-button3.png?resize=258%2C110&ssl=1"/></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </form>

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
