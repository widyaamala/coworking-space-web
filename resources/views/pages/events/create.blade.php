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
  			<label for="product_name" class="col-sm-2 col-form-label">Room Name</label>
  			<div class="col-sm-10">
  				<select id="product_id" name="product_id" class="form-control">
		        @foreach ($products as $product)
  					<option value="{{$product->id}}">{{$product->name}}</option>
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
			  <option>Classroom Layout</option>
			  <option>O-Layout</option>
			  <option>U-Layout</option>
			  <option>Group Layout</option>
			  <option>Theater Layout</option>
			  <option>Square Layout</option>
			</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="facilities" class="col-sm-2 col-form-label">Facilities</label>
  			<div class="col-sm-10">
  				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Screen">
				  <label class="form-check-label" for "facilities[]">Screen</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Microphone">
				  <label class="form-check-label" for "facilities[]">Microphone</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Sound System">
				  <label class="form-check-label" for "facilities[]">Sound System</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Whiteboard & Marker">
				  <label class="form-check-label" for "facilities[]">Whiteboard & Marker</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Additional Screen">
				  <label class="form-check-label" for "facilities[]">Additional Screen (Extra Charge 50k)</label>
			  </div>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Additional Microphone">
				  <label class="form-check-label" for "facilities[]">Additional Microphone (Extra Charge 20k)</label>
			  </div>
  			</div>
  		</div>
  		<div class="form-group row">
        <label class="col-sm-2 col-form-label" for="image">Poster Event / Logo Institute</label>
        <div class="col-sm-10">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="image" name="image" required>
				<label class="custom-file-label" for="image">Choose file...</label>
			</div>
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
