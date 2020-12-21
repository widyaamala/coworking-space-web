@extends('layouts.app')
@section('template_title')
    {!! trans('All Events') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Events</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('events.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New</span></a>
        </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-responsive">
          <tr>
              <th>No</th>
              <th>User</th>
              <th>Room</th>
			  <th>Organizer</th>
              <th class="hidden-xs">Date</th>
              <th class="hidden-xs">Start Time</th>
			  <th class="hidden-xs">End Time</th>
              <th>Event Name</th>
              <th>Event Type</th>
              <th>Event Category</th>
	            <th>Total Seats</th>
              <th>Layout Seat</th>
	            <th>Facilities</th>
              <th width="1%">Image</th>
	            <th>Status</th>
	            <th>Action</th>
          </tr>
          @php
              $i = 0;
          @endphp
          @foreach ($events as $event)
          <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $event->user->name }}</td>
              <td>{{ $event->invoice->product->name }}</td>
			  <td>{{ $event->organizer }}</td>
              <td class="hidden-xs">{{ date('d M Y', strtotime($event->date)) }}</td>
              <td class="hidden-xs">{{ $event->start_time }}</td>
			  <td class="hidden-xs">{{ $event->end_time }}</td>
    				  <td>{{ $event->event_name }}</td>
    				  <td>{{ $event->event_type }}</td>
    				  <td>{{ $event->event_category }}</td>
    				  <td>{{ $event->total_seats }}</td>
    				  <td>{{ $event->layout_seat }}</td>
    				  <td>{{ $event->facilities?implode(', ', $event->facilities):'' }}</td>

    				  <td><img width="150px" src="{{ url('/receipt/'.$event->image) }}"></td>
    				  <td>{{ $event->status }}</td>
              <td>
                  <form action="{{ route('events.destroy',$event->id) }}" method="POST">
					<a class="btn btn-sm btn-info" href="{{ route('events.show',$event->id) }}">Show</a>
                      <a class="btn btn-sm btn-primary" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i><span class="hidden-xs"> Delete</span></button>
                  </form>
              </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
