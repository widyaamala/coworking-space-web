@extends('layouts.frontend')
@section('template_title')
    {!! trans('Checkout') !!}
@endsection
@section('content')

<div class="container">
  <div class="text-center row mt-4">
    <div class="step-wrapper col">
      <span class="fa-stack fa-lg">
        <i class="far fa-circle fa-stack-2x"></i>
        <i class="fas fa-shopping-cart fa-stack-1x"></i>
      </span>
			<div class="step-title">Cart</div>
		</div>
		<div class="step-wrapper col" style="color:green">
      <span class="fa-stack fa-lg">
        <i class="far fa-circle fa-stack-2x"></i>
        <i class="fas fa-lock fa-stack-1x"></i>
      </span>
			<div class="step-title">Payment</div>
		</div>
		<div class="step-wrapper col">
      <span class="fa-stack fa-lg">
        <i class="far fa-circle fa-stack-2x"></i>
        <i class="fas fa-check fa-stack-1x"></i>
      </span>
			<div class="step-title">Complete</div>
		</div>
  </div>

  <div class="pricing-header px-3 py-4 mx-auto text-center">
    <h1 class="font-weight-bold">Pay & Activate</h1>
    <p class="lead"></p>
  </div>

  <form class="needs-validation mb-5" action="{{ route('post-invoice') }}" method="POST">
  @csrf
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <div class="card mb-4">
          <div class="card-header">
            Order Summary
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <p class="media-heading">{{$order->plan_name}}</p>
              </div>
              <div class="col-sm-5 text-right"><strong>Rp. {{ number_format($order->price, 2) }}</strong></div>
              <div class="col-sm-1 text-right"></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="font-weight-bold">Total</p>
              </div>
              <div class="col-sm-5 text-right"><strong>Rp. {{ number_format($order->price, 2) }}</strong></div>
              <div class="col-sm-1 text-right"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 order-md-1">
        <div class="card p-3">
          <h4 class="card-title mb-3">Personal Information</h4>
          <div class="row">
              <div class="form-group col-md-6 mb-3">
              <input type="hidden" class="form-control" id="user_name" placeholder="User Name" aria-label="User Name" name="user_id" value="{{(Auth()->user()->id)}}">
              <input type="text" class="form-control" id="user_name" placeholder="User Name" aria-label="User Name" value="{{(Auth()->user()->name)}}" readonly>
              </div>
              <div class="col-md-6 mb-3">
              <input type="text" class="form-control" id="user_email" placeholder="Email" aria-label="Email" value="{{(Auth()->user()->email)}}">
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
              <input type="text" class="form-control" id="Instansi" placeholder="Instansi" aria-label="Instansi" value="">
              </div>
              <div class="col-md-6 mb-3">
              <input type="text" class="form-control" id="Phone" placeholder="Phone" aria-label="Phone" value="">
              </div>
          </div>

          <h4 class="mt-5">Payment Method</h4>
          <div class="payment-processors">
            <div class="btn-group d-flex btn-group-justified mb-3" data-toggle="buttons">
  	            <label class="btn btn-primary col-6 active" role="button" data-toggle="collapse" data-target="#bank" aria-expanded="true" aria-controls="bank">
  	            	<div class="method visa"><i class="fa fa-credit-card"></i> Bank Transfer</div>
  	                <input type="radio" name="payment_method" value="bank" class="d-none" checked>
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
