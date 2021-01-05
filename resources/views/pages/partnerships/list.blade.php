@extends('layouts.app')
@section('template_title')
    {!! trans('All Event Starters') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Partnerships</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('events.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New</span></a>
        </div>
    </div>
    <div class="card-body">
	@if(isset($partnerships))
      <table class="table table-bordered table-responsive">
          <tr>
              <th>No</th>
              <th>User</th>
              <th>Company/Organization</th>
              <th>Partnership Type</th>
              <th>Proposal</th>
	            <th>Status</th>
	            <th>Action</th>
          </tr>
          @php
              $i = 0;
          @endphp
          @foreach ($partnerships as $partnership)
          <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $partnership->user_id }}</td>
			  <td>{{ $partnership->company }}</td>
			  <td>{{ $partnership->partner_type }}</td>
			  <td><a target="_blank" href="{{ url('/uploads/'.$partnership->proposal) }}">View PDF</a></td>

    				  <td>{{ $partnership->status }}</td>
              <td>
                  <form action="{{ route('partnerships.destroy',$partnership->id) }}" method="POST">
                      <a class="btn btn-sm btn-primary mt-1" href="{{ route('partnerships.edit',$partnership->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger  mt-1"><i class="fa fa-trash"></i><span class="hidden-xs"> Delete</span></button>
                  </form>
              </td>
          </tr>
          @endforeach
      </table>
	  {!! $partnerships->links() !!}@endif
    </div>
  </div>
</div>
@endsection
