@extends('layouts.app')
@section('template_title')
    {!! trans('All Invoices') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Invoices</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('invoices.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New</span></a>
        </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
              <th>Invoice</th>
              <th>User</th>
              <th class="hidden-xs">Plan</th>
              <th class="hidden-xs">Total</th>
	            <th>Payment Method</th>
              <th class="hidden-xs">Note</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
          </tr>
          @foreach ($invoices as $invoice)
              <tr>
                  <td>{{ $invoice->id }}</td>
                  <td>{{ $invoice->user->name }}</td>
                  <td class="hidden-xs">{{ $invoice->product->name }}</td>
                  <td class="hidden-xs">{{ $invoice->total }}</td>
				  <td>{{ $invoice->payment_method }}</td>
                  <td class="hidden-xs">{{ $invoice->note }}</td>
                  <td>{{ $invoice->status }}</td>
                  <td>{{ $invoice->created_at }}</td>
                  <td>
                      <form action="{{ route('invoices.destroy',$invoice->id) }}" method="POST">
                          <a class="btn btn-sm btn-primary" href="{{ route('invoices.edit',$invoice->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
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
