@extends('layouts.app')
@section('template_title')
    {!! trans('Create New Event') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Create New Event
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('events') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
  		@csrf
  		<div class="form-group row">
  			<label for="user_name" class="col-sm-2 col-form-label">User Name</label>
  			<div class="col-sm-10">
  				<select id="user_id" name="user_id" class="form-control">
  				@foreach ($users as $user)
  					<option value="{{$user->id}}">{{$user->name}}</option>
  				@endforeach
  				</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="room_name" class="col-sm-2 col-form-label">Room Name</label>
  			<div class="col-sm-10">
  				<select id="room_id" name="room_id" class="form-control">
		        @foreach ($rooms as $room)
  					<option value="{{$room->id}}">{{$room->name}}</option>
			      @endforeach
  				</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="date" class="col-sm-2 col-form-label">Date</label>
  			<div class="col-sm-10">
  				<input class ="form-control" type="date" name="date" value="2020-11-21" min="2020-01-01" max="2022-01-01">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="time" class="col-sm-2 col-form-label">Time</label>
  			<div class="col-sm-10">
  				<input class="form-control" type="time" name="time" value="22:00">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="duration" class="col-sm-2 col-form-label">Duration</label>
  			<div class="col-sm-10">
  				<input class="form-control" type="number" value="" id="duration" name="duration">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="event_name" class="col-sm-2 col-form-label">Event Name</label>
  			<div class="col-sm-10">
  				<input type="text" name="event_name" id="event_name" class="form-control" placeholder="Event Name">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="description" class="col-sm-2 col-form-label">Description</label>
  			<div class="col-sm-10">
  				<textarea type="textarea" name="description" id="description" class="form-control" placeholder="Description"></textarea>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="event_type" class="col-sm-2 col-form-label">Event Type</label>
  			<div class="col-sm-10">
  				<select class="form-control" id="event_type" name="event_type">
  			  <option>Private</option>
  			  <option>Public</option>
  			</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="total_seats" class="col-sm-2 col-form-label">Total Seat</label>
  			<div class="col-sm-10">
  				<input class="form-control" type="number" value="" id="total_seats" name="total_seats">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="layout_seat" class="col-sm-2 col-form-label">Layout</label>
  			<div class="col-sm-10">
  				<select class="form-control" id="layout_seat" name="layout_seat">
  					  <option>o</option>
  					  <option>u</option>
  				</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="facilities" class="col-sm-2 col-form-label">Facilities</label>
  			<div class="col-sm-10">
  				<select class="form-control" id="facilities" name="facilities">
  			  <option>Speaker</option>
  			  <option>LCD</option>
  			</select>
  			</div>
  		</div>
  		<div class="form-group row">
        <label class="col-sm-2 col-form-label" for="image">Image</label>
        <div class="col-sm-10">
			     <input type="file" class="form-control" id="image" name="image" required>
         </div>
      </div>
  		<div class="form-group row">
  			<label for="payment_method" class="col-sm-2 col-form-label">Payment</label>
  			<div class="col-sm-10">
  				<select id="payment_method" name="payment_method" class="form-control">
            <option value="Cash">Cash</option>
  					<option value="Transfer Bank">Transfer Bank</option>
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
