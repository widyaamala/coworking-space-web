@extends('layouts.app')
@section('template_title')
    {!! trans('All Memberships') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Memberships</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('memberships.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New</span></a>
        </div>
    </div>
    <div class="card-body">
	@if(isset($memberships))
      <table class="table table-bordered table-responsive">
          <tr>
              <th>No</th>
              <th>User</th>
              <th>Product</th>
              <th>Invoice</th>
              <th class="hidden-xs">Start Date</th>
              <th class="hidden-xs">End Date</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
          @php
              $i = 0;
          @endphp
          @foreach ($memberships as $membership)
              <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $membership->user->name }}</td>
                  <td>{{ $membership->invoice->product->name }}</td>
                  <td>{{ $membership->invoice->id }}</td>
                  <td class="hidden-xs">{{ date('d M Y', strtotime($membership->start_date)) }}</td>
                  <td class="hidden-xs">{{ date('d M Y', strtotime($membership->end_date)) }}</td>
                  <td>{{ $membership->status }}</td>
                  <td>
                      <form action="{{ route('memberships.destroy',$membership->id) }}" method="POST">
                          <a class="btn btn-sm btn-primary" href="{{ route('memberships.edit',$membership->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger  mt-1"><i class="fa fa-trash"></i><span class="hidden-xs"> Delete</span></button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </table>
	  {!! $memberships->links() !!}@endif
    </div>
  </div>
</div>
@endsection
