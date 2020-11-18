@extends('layouts.frontend')
@section('template_title')
    {!! trans('Complete Order') !!}
@endsection
@section('content')
    <div class="container my-5">
		<div class="text-center row mt-4">
			<div class="step-wrapper col">
			  <span class="fa-stack fa-lg">
				<i class="far fa-circle fa-stack-2x"></i>
				<i class="fas fa-shopping-cart fa-stack-1x"></i>
			  </span>
					<div class="step-title">Cart</div>
				</div>
				<div class="step-wrapper col">
			  <span class="fa-stack fa-lg">
				<i class="far fa-circle fa-stack-2x"></i>
				<i class="fas fa-lock fa-stack-1x"></i>
			  </span>
					<div class="step-title">Payment</div>
				</div>
				<div class="step-wrapper col"  style="color:green">
			  <span class="fa-stack fa-lg">
				<i class="far fa-circle fa-stack-2x"></i>
				<i class="fas fa-check fa-stack-1x"></i>
			  </span>
					<div class="step-title">Complete</div>
				</div>
		</div>
		
		<div class="pricing-header px-3 py-4 mx-auto text-center">
			<h1 class="font-weight-bold">Complete Order</h1>
			<h2>Invoice {{$invoice->id}}</h2>
			<p class="lead"></p>
		</div>
		
		<div class="row">
		  <div class="col-md-12 order-md-1">
			<div class="card p-3">
			  <div class="ml-5">
			  <h4 class="card-title mb-3 mt-3">Waiting for Payment</h4>
			  <div class="row">
				  <div class="col-sm-3">
					<p class="font-weight-bold">Amount</p>
				  </div>
				  <div class="col-sm-8 text-left"><strong>Rp. {{$invoice->total}}</strong></div>
				  <div class="col-sm-1 text-right"></div>
             </div>
			 <div class="row">
				  <div class="col-sm-3">
					<p class="font-weight-bold">Before</p>
				  </div>
				  <div class="col-sm-8 text-left"><strong>{{ date('d M Y H:i:s', strtotime("+1 day", strtotime($invoice->created_at))) }} </strong></div>
				  <div class="col-sm-1 text-right"></div>
             </div>
			 <hr>
			 <h4 class="card-title mb-3">Transfer To Bank Account</h4>
			  <p>Please transfer the total amount to the following bank account!</p>
			  <div class="row">
				  <div class="col-sm-3">
					<p class="font-weight-bold">Account Number</p>
				  </div>
				  <div class="col-sm-8 text-left"><strong>xxx xxx xxx</strong></div>
				  <div class="col-sm-1 text-left"></div>
             </div>
			 <div class="row">
				  <div class="col-sm-3">
					<p class="font-weight-bold">Account Name</p>
				  </div>
				  <div class="col-sm-8 text-left"><strong>xxx xxx xxx</strong></div>
				  <div class="col-sm-1 text-right"></div>
             </div>
			 <span class="font-weight-bold text-danger">*Please transfer and confirm with expire time! Otherwise this order will be canceled automatically.</span>
			 <hr>
			 </br>
			 <h4 class="card-title mb-3">Bank Transfer Instruction</h4>
			 <ol>
				<li>Use Internet Banking or ATM to transfer the payment amount to the Bank Account.</li>
				<li>Please take a photo or screenshot of the receipt.</li>
				<li>Upload the photo and fill in the transfer information so your payment can be confirmed.</li>
			</ol>
			</br>
			<hr class="mb-4">
                <div class="text-center">
                  <button class="btn btn-success submit-button" type="submit">Next: Confirm Information</button>
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
      $('.navbar').removeClass('fixed-top');
			$('.navbar').addClass('active');
		});
  </script>
@endsection  