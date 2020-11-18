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
            <a class="btn btn-success" href="{{ route('memberships.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New Membership</span></a>
        </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
              <th>No</th>
              <th>User</th>
              <th>Plan</th>
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
                  <td>{{ $membership->user_id }}</td>
                  <td>{{ $membership->plan_id }}</td>
                  <td>{{ $membership->invoice_id }}</td>
                  <td class="hidden-xs">{{ date('d M Y', strtotime($membership->start_date)) }}</td>
                  <td class="hidden-xs">{{ date('d M Y', strtotime($membership->end_date)) }}</td>
                  <td>Active</td>
                  <td>
                      <form action="{{ route('memberships.destroy',$membership->id) }}" method="POST">
                          <a class="btn btn-sm btn-primary" href="{{ route('memberships.edit',$membership->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
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
