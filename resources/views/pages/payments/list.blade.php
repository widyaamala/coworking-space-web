@extends('layouts.app')
@section('template_title')
    {!! trans('All Payments') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Payments</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('payments.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New</span></a>
        </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
              <th>Payment</th>
              <th>User</th>
			  <th>Invoice</th>
			  <th width="1%">Image</th>
			  <th>From Bank</th>
              <th>Account Name</th>
              <th>Account Number</th>
              <th>To Bank</th>
			  <th class="hidden-xs">Total</th>
			  <th class="hidden-xs">Date</th>
			  <th>Status</th>
              <th>Action</th>
          </tr>
          @foreach ($payments as $payment)
              <tr>
                  <td>{{ $payment->id }}</td>
                  <td>{{ $payment->user_id }}</td>
				  <td>{{ $payment->invoice_id }}</td>
				  <td><img width="150px" src="{{ url('/receipt/'.$payment->image) }}"></td>
				  <td>{{ $payment->from_bank }}</td>
				  <td>{{ $payment->acc_name }}</td>
				  <td>{{ $payment->acc_number }}</td>
				  <td>{{ $payment->to_bank }}</td>
                  <td class="hidden-xs">{{ $payment->total }}</td>
				  <td class="hidden-xs">{{ date('Y-m-d H:i:s', strtotime($payment->date)) }}</td>
				  <td>{{ $payment->status }}</td>
                  <td>
                      <form action="{{ route('payments.destroy',$payment->id) }}" method="POST">
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
