@extends('layouts.app')
@section('template_title')
    {!! trans('Confirm Payment') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Confirm Payment
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('payments') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('payments.confirm', $payment->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="user_id" class="col-sm-2 col-form-label">User</label>
			<div class="col-sm-6">
				<input type="hidden" class="form-control-plaintext" name="user_id" value="{{(Auth()->user()->id)}}" readonly>
				<input type="hidden" class="form-control-plaintext" name="user_id" value="{{(Auth()->user()->name)}}" readonly>
				<select id="user_id" name="user_id" class="form-control">
				@foreach ($users as $user)
					<option value="{{$user->id}}" {{($invoice->user_id === $user->id) ? 'selected' : ''}}>{{$user->name}}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="plan_id" class="col-sm-2 col-form-label">Plan Name</label>
			<div class="col-sm-10">
				<select id="plan_id" name="plan_id" class="form-control">
				@foreach ($plans as $plan)
					<option value="{{$plan->id}}" {{($invoice->plan_id === $plan->id) ? 'selected' : ''}}>{{$plan->plan_name}} - {{$plan->price}}
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
			<div class="col-sm-10">
				<select id="payment_method" name="payment_method" class="form-control">
					<option value="{{$invoice->payment_method}}" selected disabled>{{$invoice->payment_method}}</option>
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
