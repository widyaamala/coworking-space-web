@extends('layouts.app')
@section('template_title')
    {!! trans('Edit Membership') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Edit Membership
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('memberships') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="user_id" class="col-sm-2 col-form-label">User</label>
			<div class="col-sm-10">
				<select id="user_id" name="user_id" class="form-control">
				@foreach ($users as $user)
					<option value="{{$user->id}}" {{($membership->user_id === $user->id) ? 'selected' : ''}}>{{$user->name}}</option>
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="plan_id" class="col-sm-2 col-form-label">Plan Name</label>
			<div class="col-sm-10">
				<select id="plan_id" name="plan_id" class="form-control">
				@foreach ($plans as $plan)
					<option value="{{$plan->id}}" {{($membership->plan_id === $plan->id) ? 'selected' : ''}}>{{$plan->plan_name}} - {{$plan->price}}
				@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="plan_id" class="col-sm-2 col-form-label">Invoice Id</label>
			<div class="col-sm-10">
				<select id="invoice_id" name="invoice_id" class="form-control">
				@foreach ($invoices as $invoice)
					<option value="{{$invoice->id}}" {{($membership->invoice_id === $invoice->id) ? 'selected' : ''}}>{{$invoice->id}}</option>
				@endforeach
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
