@extends('layouts.app')
@section('template_title')
    {!! trans('All Rooms') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Rooms</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('rooms.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New Room</span></a>
        </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
              <th>No</th>
              <th>Room Name</th>
              <th class="hidden-xs">Description</th>
              <th>Price</th>
              <th width="">Action</th>
          </tr>
          @php
              $i = 0;
          @endphp
          @foreach ($rooms as $room)
              <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $room->room_name }}</td>
                  <td class="hidden-xs">{!! $room->description !!}</td>
                  <td>{{ $room->price }}</td>
                  <td>
                      <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">
                          <a class="btn btn-sm btn-primary" href="{{ route('rooms.edit',$room->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
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
