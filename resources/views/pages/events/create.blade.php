@extends('layouts.app')
@section('template_title')
    {!! trans('Create New Membership') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Create New Membership
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('memberships') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('memberships.store') }}" method="POST">
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
			<label for="product_id" class="col-sm-2 col-form-label">Plan Name</label>
			<div class="col-sm-10">
				<select id="product_id" name="product_id" class="form-control">
				@foreach ($plans as $plan)
					<option value="{{$plan->id}}">{{$plan->name}} - {{$plan->price}}</option>
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
