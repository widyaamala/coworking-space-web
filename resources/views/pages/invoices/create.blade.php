@extends('layouts.app')
@section('template_title')
    {!! trans('Create New Invoice') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Create New Invoice
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('invoices') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('invoices.store') }}" method="POST">
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
			<label for="plan_name" class="col-sm-2 col-form-label">Plan Name</label>
			<div class="col-sm-10">
				<select id="product_id" name="product_id" class="form-control">
				@foreach ($products as $product)
					<option value="{{$product->id}}">{{$product->name}} - {{$product->price}}
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
			<div class="col-sm-10">
				<select id="payment_method" name="payment_method" class="form-control">
					<option value="Transfer Bank">Transfer Bank</option>
					<option value="Cash">Cash</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="note" class="col-sm-2 col-form-label">Note</label>
			<div class="col-sm-10">
				<textarea type="textarea" name="note" id="note" class="form-control" placeholder="Note"></textarea>
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
