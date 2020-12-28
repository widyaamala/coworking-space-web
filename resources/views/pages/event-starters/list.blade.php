@extends('layouts.app')
@section('template_title')
    {!! trans('All Event Starters') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Event Starters</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('events.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New</span></a>
        </div>
    </div>
    <div class="card-body">
	@if(isset($eventStarters))
      <table class="table table-bordered table-responsive">
          <tr>
              <th>No</th>
              <th>User</th>
              <th>Organizer</th>
              <th class="hidden-xs">Schedule Plan</th>
              <th>Event Name</th>
	            <th>Event Type</th>
              <th>Event Category</th>
	            <th>Minimum Participant</th>
              <th width="1%">Image</th>
	            <th>Status</th>
	            <th>Action</th>
          </tr>
          @php
              $i = 0;
          @endphp
          @foreach ($eventStarters as $eventStarter)
          <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $eventStarter->user->name }}</td>
			  <td>{{ $eventStarter->organizer }}</td>
              <td class="hidden-xs">{{ date('Y-m-d H:i:s', strtotime($eventStarter->schedule_plan)) }}</td>
    				  <td>{{ $eventStarter->event_name }}</td>
    				  <td>{{ $eventStarter->event_type }}</td>
					  <td>{{ $eventStarter->event_category }}</td>
    				  <td>{{ $eventStarter->min_participant }}</td>

    				  <td><img width="150px" src="{{ url('/uploads/'.$eventStarter->image) }}"></td>
    				  <td>{{ $eventStarter->status }}</td>
              <td>
                  <form action="{{ route('eventStarters.destroy',$eventStarter->id) }}" method="POST">
					<a class="btn btn-sm btn-info" href="{{ route('eventStarters.show',$eventStarter->id) }}">Show</a>
                      <a class="btn btn-sm btn-primary mt-1" href="{{ route('eventStarters.edit',$eventStarter->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger  mt-1"><i class="fa fa-trash"></i><span class="hidden-xs"> Delete</span></button>
                  </form>
              </td>
          </tr>
          @endforeach
      </table>
	  {!! $eventStarters->links() !!}@endif
    </div>
  </div>
</div>
@endsection
