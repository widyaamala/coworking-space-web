@extends('layouts.frontend')
@section('template_title')
    {!! trans('Confirm Payment') !!}
@endsection
@section('content')

<div class="container">

  <div class="pricing-header px-3 py-4 mx-auto text-center">
    <h1 class="font-weight-bold">Confirm Payment</h1>
    <p class="lead"></p>
  </div>

  <form class="needs-validation mb-5" action="{{ route('post-confirmation') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <div class="card mb-4">
          <div class="card-header">
            Order Summary
          </div>
          <div class="card-body">
            <div class="form-group row">
              <div class="col-sm-6">
                <p class="media-heading">Invoice Number</p>
              </div>
              <div class="col-sm-5 text-right">
				<input type="hidden" name="user_id" value="{{(Auth()->user()->id)}}">
				<input type="hidden" name="product_id" value="{{$invoice->product->id}}">
				<input type="text" class="form-control-plaintext" name="invoice_id" value="{{$invoice->id}}" readonly>
			  </div>
              <div class="col-sm-1 text-right"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-6">
                <p class="font-weight-bold">Total</p>
              </div>
              <div class="col-sm-5 text-right">
				<input type="text" class="form-control-plaintext" value="Rp. {{ number_format($invoice->total, 2) }}" readonly>
			  </div>
              <div class="col-sm-1 text-right"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 order-md-1">
        <div class="card p-3">

          <h4 class="card-title mb-3">Upload Receipt</h4>
		  <div class="form-group custom-file">
			<input type="file" class="custom-file-input" id="image" name="image" required>
			<label class="custom-file-label" for="image">Choose file...</label>
		  </div>

          <h4 class="mt-5">Payment Information</h4>
		  <div class="row">
			  <div class="form-group col-md-12">
					<label for="from_bank">Transfer From Bank</label>
					<select id="from_bank" name="from_bank" class="form-control">
						<option value="Bank BCA">Bank BCA</option>
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank BRI">Bank BRI</option>
						<option value="Bank BTPN">Bank BTPN</option>
					</select>
			  </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
              <input type="text" class="form-control" id="acc_name" name="acc_name" placeholder="Account Name" aria-label="Account Name" value="">
              </div>
              <div class="col-md-6">
              <input type="text" class="form-control" id="acc_number" name="acc_number" placeholder="Account Number" aria-label="Account Number" value="">
              </div>
          </div>
		  <div class="row">
			  <div class="form-group col-md-12">
				<label for="to_bank">Transfer To Bank</label>
					<select id="to_bank" name="to_bank" class="form-control">
						<option value="Bank BCA">Bank BCA</option>
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank BRI">Bank BRI</option>
						<option value="Bank BTPN">Bank BTPN</option>
					</select>
				<input type="hidden" name="total" value="{{$invoice->total}}">
			  </div>
		  </div>

		  <hr class="mb-4">
            <div class="text-center">
                  <button class="btn btn-success submit-button" type="submit">Submit</button>
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
