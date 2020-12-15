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
      <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
  		@csrf
  		<div class="form-group row">
  			<label for="user_name" class="col-sm-2 col-form-label">User Name</label>
  			<div class="col-sm-10">
  				<input type="text" name="user_id" id="note" class="form-control" disabled value="{{$event->user->name}}"/>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="product_name" class="col-sm-2 col-form-label">Room Name</label>
  			<div class="col-sm-10">
  				<select id="product_id" name="product_id" class="form-control">
		        @foreach ($products as $product)
  					<option value="{{$product->id}}" {{($event->invoice->product->id === $product->id) ? 'selected' : ''}}>{{$product->name}}</option>
			      @endforeach
  				</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="date" class="col-sm-2 col-form-label">Date</label>
  			<div class="col-sm-10">
  				<input class ="form-control" type="date" name="date" value="{{$event->date}}" min="2020-01-01" max="2022-01-01">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="time" class="col-sm-2 col-form-label">Time</label>
  			<div class="col-sm-10">
  				<input class="form-control" type="time" name="time" value="{{$event->time}}">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="duration" class="col-sm-2 col-form-label">Duration</label>
  			<div class="col-sm-10">
  				<input class="form-control" type="number" value="{{$event->duration}}" id="duration" name="duration">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="event_name" class="col-sm-2 col-form-label">Event Name</label>
  			<div class="col-sm-10">
  				<input type="text" name="event_name" id="event_name" class="form-control" value="{{$event->event_name}}">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="description" class="col-sm-2 col-form-label">Description</label>
  			<div class="col-sm-10">
  				<textarea type="textarea" name="description" id="description" class="form-control">{{$event->description}}</textarea>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="event_type" class="col-sm-2 col-form-label">Event Type</label>
  			<div class="col-sm-10">
  				<select class="form-control" id="event_type" name="event_type">
			       <option value="private" {{($event->event_type === 'private') ? 'selected' : ''}}>Private</option>
			        <option value="public" {{($event->event_type === 'public') ? 'selected' : ''}}>Public</option>
  			</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="total_seats" class="col-sm-2 col-form-label">Total Seat</label>
  			<div class="col-sm-10">
  				<input class="form-control" type="number" value="{{$event->total_seats}}" id="total_seats" name="total_seats">
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="layout_seat" class="col-sm-2 col-form-label">Layout</label>
  			<div class="col-sm-10">
  				<select class="form-control" id="layout_seat" name="layout_seat">
  					  <option value="Classroom Layout" {{($event->layout_seat === 'o') ? 'selected' : ''}}>O</option>
  					  <option value="O-Layout" {{($event->layout_seat === 'u') ? 'selected' : ''}}>U</option>
					  <option value="U-Layout" {{($event->layout_seat === 'u') ? 'selected' : ''}}>U</option>
					  <option value="Group Layout" {{($event->layout_seat === 'u') ? 'selected' : ''}}>U</option>
					  <option value="Theater Layout" {{($event->layout_seat === 'u') ? 'selected' : ''}}>U</option>
					  <option value="Square Layout" {{($event->layout_seat === 'u') ? 'selected' : ''}}>U</option>
  				</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="facilities" class="col-sm-2 col-form-label">Facilities</label>
  			<div class="col-sm-10">
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Screen" {{($event->facilities === 'Screen') ? 'selected' : ''}}>
				  <label class="form-check-label" for "facilities[]">Screen</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Microphone" {{($event->facilities === 'Microphone') ? 'selected' : ''}}>
				  <label class="form-check-label" for "facilities[]">Microphone</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Sound System" {{($event->facilities === 'Sound System') ? 'selected' : ''}}>
				  <label class="form-check-label" for "facilities[]">Sound System</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Whiteboard & Marker" {{($event->facilities === 'Whiteboard & Marker') ? 'selected' : ''}}>
				  <label class="form-check-label" for "facilities[]">Whiteboard  Marker</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Additional Screen" {{($event->facilities === 'Additional Screen') ? 'selected' : ''}}>
				  <label class="form-check-label" for "facilities[]">Additional Screen (Extra Charge 50k)</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="facilities[]" name="facilities[]" value="Additional Microphone" {{($event->facilities === 'Additional Microphone') ? 'selected' : ''}}>
				  <label class="form-check-label" for "facilities[]">Additional Microphone (Extra Charge 20k)</label>
				</div>
  			</div>
  		</div>
  		<div class="form-group row">
        <label class="col-sm-2 col-form-label" for="image">Poster Event / Logo</label>
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
  				<select disabled id="payment_method" name="payment_method" class="form-control">
            <option value="Cash" {{($event->payment_method === 'Cash') ? 'selected' : ''}}>Cash</option>
  					<option value="Transfer Bank" {{($event->payment_method === 'Transfer Bank') ? 'selected' : ''}}>Transfer Bank</option>
  				</select>
  			</div>
  		</div>
  		<div class="form-group row">
  			<label for="status" class="col-sm-2 col-form-label">Status</label>
  			<div class="col-sm-10">
  				<select id="status" name="status" class="form-control">
            <option value="Active" {{($event->status === 'Active') ? 'selected' : ''}}>Active</option>
  					<option value="Deactive" {{($event->status === 'Deactive') ? 'selected' : ''}}>Deactive</option>
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
