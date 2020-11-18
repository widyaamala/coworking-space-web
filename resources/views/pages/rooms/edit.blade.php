@extends('layouts.app')
@section('template_title')
    {!! trans('Edit Room') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Edit Room
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('rooms') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('rooms.update', $room->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="room_name" class="col-sm-2 col-form-label">Room Name</label>
			<div class="col-sm-10">
				<input type="text" name="room_name" id="room_name" class="form-control" value="{{ $room->room_name }}" placeholder="Room Name">
			</div>
		</div>
		<div class="form-group row">
			<label for="description" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<textarea type="textarea" name="description" id="description" class="form-control" placeholder="Description">{{ $room->description }}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-10">
				<input type="number" name="price" id="price" class="form-control" value="{{ $room->price }}" placeholder="Price">
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
