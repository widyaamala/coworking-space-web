@extends('layouts.app')
@section('template_title')
    {!! trans('Edit Event Starter') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Edit Event Starter
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('eventStarters') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('eventStarters.update', $eventStarter->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="user_id" class="col-sm-2 col-form-label">User</label>
			<div class="col-sm-10">
				<input type="text" name="user_id" id="note" class="form-control" disabled value="{{$eventStarter->user->name}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="organizer" class="col-sm-2 col-form-label">Organizer</label>
			<div class="col-sm-10">
				<input type="text" name="organizer" id="organizer" class="form-control" disabled value="{{$eventStarter->organizer}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="schedule_plan" class="col-sm-2 col-form-label">Schedule Plan</label>
			<div class="col-sm-10">
				<input type="datetime" name="schedule_plan" id="schedule_plan" class="form-control" disabled value="{{$eventStarter->schedule_plan}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="event_name" class="col-sm-2 col-form-label">Event Name</label>
			<div class="col-sm-10">
				<input type="text" name="event_name" id="event_name" class="form-control" disabled value="{{$eventStarter->event_name}}"/>
			</div>
		</div>
		<div class="form-group row">
  			<label for="description" class="col-sm-2 col-form-label">Description</label>
  			<div class="col-sm-10">
  				<textarea type="textarea" name="description" id="description" class="form-control" disabled value="{{$eventStarter->description}}"></textarea>
  			</div>
  		</div>
		<div class="form-group row">
  			<label for="rundown" class="col-sm-2 col-form-label">Rundown</label>
  			<div class="col-sm-10">
  				<textarea type="textarea" name="rundown" id="rundown" class="form-control" disabled value="{{$eventStarter->rundown}}"></textarea>
  			</div>
  		</div>
		<div class="form-group row">
			<label for="event_type" class="col-sm-2 col-form-label">Event Type</label>
			<div class="col-sm-10">
				<input type="text" name="event_type" id="event_type" class="form-control" disabled value="{{$eventStarter->event_type}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="event_category" class="col-sm-2 col-form-label">Event Category</label>
			<div class="col-sm-10">
				<input type="text" name="event_category" id="event_category" class="form-control" disabled value="{{$eventStarter->event_category}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="min_participant" class="col-sm-2 col-form-label">Minimum Participant</label>
			<div class="col-sm-10">
				<input type="text" name="min_participant" id="min_participant" class="form-control" disabled value="{{$eventStarter->min_participant}}"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="status" class="col-sm-2 col-form-label">Status</label>
			<div class="col-sm-10">
				<select id="status" name="status" class="form-control">
					<option value="Confirmed" {{($eventStarter->status === 'Confirmed') ? 'selected' : ''}}>Confirmed</option>
          <option value="Declined" {{($eventStarter->status === 'Declined') ? 'selected' : ''}}>Declined</option>
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
