@extends('layouts.app')
@section('template_title')
    {!! trans('Edit Partnership') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Edit Partnership
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('partnerships') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('partnerships.update', $partnership->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="user_id" class="col-sm-2 col-form-label">User</label>
			<div class="col-sm-10">
				<input type="text" name="user_id" id="user_id" class="form-control" disabled value="{{$partnership->user_id}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="company" class="col-sm-2 col-form-label">Company Name</label>
			<div class="col-sm-10">
				<input type="text" name="company" id="company" class="form-control" disabled value="{{$partnership->company}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="partner_type" class="col-sm-2 col-form-label">Partnership Type</label>
			<div class="col-sm-10">
				<input type="text" name="partner_type" id="partner_type" class="form-control" disabled value="{{$partnership->partner_type}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="status" class="col-sm-2 col-form-label">Status</label>
			<div class="col-sm-10">
				<select id="status" name="status" class="form-control">
					<option value="Confirmed" {{($partnership->status === 'Confirmed') ? 'selected' : ''}}>Confirmed</option>
          <option value="On Process" {{($partnership->status === 'On Process') ? 'selected' : ''}}>On Process</option>
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
