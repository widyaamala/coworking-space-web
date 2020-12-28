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
				<div class="step-wrapper col" style="color:green">
			  <span class="fa-stack fa-lg">
				<i class="far fa-circle fa-stack-2x"></i>
				<i class="fas fa-check fa-stack-1x"></i>
			  </span>
					<div class="step-title">Complete</div>
				</div>
		</div>
		
		<div class="pricing-header px-3 py-4 mx-auto text-center">
			<h1 class="font-weight-bold">Thank You</h1>
		</div>
		
		<div class="row">
		  <div class="col-md-12 order-md-1">
			<div class="card p-3">
			  <div class="ml-5">
			  <p>Your payment receipt has been successfully uploaded and is now being checked by our Admin. This will take within 24 hours. </p>
			  
			<hr class="mb-4">
                <div class="text-center">
				  <a class="button btn" href="{{ route('home') }}">Back To Home</a>
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