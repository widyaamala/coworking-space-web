@extends('layouts.app')
@section('template_title')
    {!! trans('Create New Payment') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Create New Payment
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('payments') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="user_name" class="col-sm-2 col-form-label">User Name</label>
			<div class="col-sm-10">
				<select id="user_id" name="user_id" class="form-control">
				@foreach ($users as $user)
					<option value="{{$user->id}}" {{(Auth::user()->id === $user->id) ? 'selected' : ''}}>{{$user->name}}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="product_id" class="col-sm-2 col-form-label">Product Name</label>
			<div class="col-sm-10">
				<select id="product_id" name="product_id" class="form-control">
				@foreach ($products as $product)
					<option value="{{$product->id}}">{{$product->name}} - {{$product->price}}
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="invoice_id" class="col-sm-2 col-form-label">Invoice</label>
			<div class="col-sm-10">
				<select id="invoice_id" name="invoice_id" class="form-control">
				@foreach ($invoices as $invoice)
					<option value="{{$invoice->id}}">{{$invoice->id}}
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="payment_method" class="col-sm-2 col-form-label">Receipt</label>
			<div class="col-sm-10">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" required>
					<label class="custom-file-label" for="image">Choose file...</label>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="from_bank" class="col-sm-2 col-form-label">Transfer From Bank</label>
			<div class="col-sm-10">
					<select id="from_bank" name="from_bank" class="form-control">
						<option value="Bank BCA">Bank BCA</option>
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank BRI">Bank BRI</option>
						<option value="Bank BTPN">Bank BTPN</option>
					</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="acc_name" class="col-sm-2 col-form-label">Account Name</label>
			<div class="col-sm-10">
				<input type="text" name="acc_name" id="acc_name" class="form-control" placeholder="Account Name">
			</div>
		</div>
		<div class="form-group row">
			<label for="acc_number" class="col-sm-2 col-form-label">Account Number</label>
			<div class="col-sm-10">
				<input type="text" name="acc_number" id="acc_number" class="form-control" placeholder="Account Number">
			</div>
		</div>
		<div class="form-group row">
			<label for="to_bank" class="col-sm-2 col-form-label">Transfer To Bank</label>
			<div class="col-sm-10">
					<select id="to_bank" name="to_bank" class="form-control">
						<option value="Bank BCA">Bank BCA</option>
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank BRI">Bank BRI</option>
						<option value="Bank BTPN">Bank BTPN</option>
					</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
	    </div>
	  </form>
    </div>
  </div>
</div>
</div>
@endsection
