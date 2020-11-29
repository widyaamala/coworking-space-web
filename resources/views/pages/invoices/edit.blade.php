@extends('layouts.app')
@section('template_title')
    {!! trans('Edit Invoice') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Edit Invoice
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('invoices') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="user_id" class="col-sm-2 col-form-label">User</label>
			<div class="col-sm-10">
				<input type="text" name="user_id" id="note" class="form-control" disabled value="{{$invoice->user->name}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="product_id" class="col-sm-2 col-form-label">Plan Name</label>
			<div class="col-sm-10">
				<input type="text" name="product_id" id="note" class="form-control" disabled value="{{$invoice->product->name}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="status" class="col-sm-2 col-form-label">Status</label>
			<div class="col-sm-10">
				<select id="status" name="status" class="form-control">
					<option value="Confirmed" {{($invoice->status === 'Confirmed') ? 'selected' : ''}}>Confirmed</option>
          <option value="On Process" {{($invoice->status === 'On Process') ? 'selected' : ''}}>On Process</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
			<div class="col-sm-10">
				<input type="text" name="payment_method" id="note" class="form-control" disabled value="{{$invoice->payment_method}}"/>
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
