@extends('layouts.frontend')
@section('template_title')
    {!! trans('Event Starter') !!}
@endsection
@section('content')

<div class="container">


  <form class="needs-validation mb-5" action="{{ route('eventStarters.update', ['evenStarter' => $evenStarter->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-12 order-md-1">
        <div class="card p-3">
          <h4 class="card-title mb-3">Re-schedule Your Event</h4>
          <div class="form-group row">
			<div class="col-md-6 mb-3">
				  <label for="organizer" class="col-4 col-form-label">Organizer Name</label>
				<div class="col-8">
				<input type="hidden" name="user_id" value="{{(Auth()->user()->id)}}">
					<input type="text" name="organizer" id="organizer" class="form-control" disabled value="{{$eventStarter->organizer}}"/>
				</div>
              </div>
              <div class="col-md-6 mb-3">
				  <label for="schedule_plan" class="col-4 col-form-label">Schedule Plan</label>
				  <div class="col-8">
					<input class ="form-control" type="datetime-local" name="schedule_plan" value="{{ date('Y-m-d\TH:i') }}" min="2020-01-01" max="2022-01-01">
				  </div>
              </div>
          </div>
		  <div class="form-group row">
              <div class="col-md-12 mb-3">
				  <label for="event_name" class="col-4 col-form-label">Event Name</label>
				  <div class="col-8">
					<input type="text" name="event_name" id="event_name" class="form-control" disabled value="{{$eventStarter->event_name}}"/>
				  </div>
              </div>
          </div>
		  <div class="form-group row">
              <div class="col-md-12 mb-3">
				  <label for="description" class="col-4 col-form-label">Event Description</label>
				  <div class="col-12">
				<textarea type="textarea" name="description" id="description" class="form-control" disabled value="{{$eventStarter->description}}"></textarea>
				</div>
              </div>
          </div>
		  <div class="form-group row">
              <div class="col-md-12 mb-3">
				  <label for="rundown" class="col-4 col-form-label">Rundown Plan</label>
				<div class="col-12">
				<textarea type="textarea" name="rundown" id="rundown" class="form-control" disabled value="{{$eventStarter->rundown}}"></textarea>
				</div>
              </div>
          </div>
		  <div class="form-group row">
              <div class="col-md-6 mb-3">
				  <label for="event_type" class="col-4 col-form-label">Event Type</label>
				<div class="col-8">
				<input type="text" name="event_type" id="event_type" class="form-control" disabled value="{{$eventStarter->event_type}}"/>
				</div>
              </div>
              <div class="col-md-6 mb-3">
				  <label for="event_category" class="col-4 col-form-label">Event Category</label>
					<div class="col-8">
					<input type="text" name="event_category" id="event_category" class="form-control" disabled value="{{$eventStarter->event_category}}"/>
					</div>
              </div>
          </div>
		  <div class="form-group row">
              <div class="col-md-6 mb-3">
				  <label for="min_participant" class="col-4 col-form-label">Minimum Participant</label>
				  <div class="col-8">
					<input class="form-control" type="number" value="{{$eventStarter->min_participant}}" name="min_participant">
				  </div>
              </div>
              <div class="col-md-6 mb-3">
				  <label for="images" class="col-6 col-form-label">Poster Event / Logo Organizer</label>
				  
				<div class="col-8">
					<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" required>
					<label class="custom-file-label" for="image">Choose file...</label>
					</div>
				  </div>
              </div>
          </div>

              <div class="col-12 mb-3">

                <hr class="mb-4">
                <div class="text-center">
                  <button class="btn btn-success btn-lg submit-button" type="submit">Submit</button>
                </div>
              </div>

        </div>
      </div>
    </div>
  </form>

</div>
@endsection

@section('footer_scripts')
	<script type="text/javascript">
		$(document).ready(function() {
      $('.navbar').removeClass('fixed-top');
			$('.navbar').addClass('active');
		});
  </script>
@endsection
