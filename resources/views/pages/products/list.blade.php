@extends('layouts.app')
@section('template_title')
    {!! trans('All products') !!}
@endsection
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            <h3>All Packages</h3>
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"><i class="fa fa-plus"></i><span class="hidden-xs"> Create New</span></a>
        </div>
    </div>
    <div class="card-body">
	@if(isset($products))
      <table class="table table-bordered table-responsive">
          <tr>
              <th>No</th>
              <th>Product Name</th>
              <th class="hidden-xs">Description</th>
              <th>Category</th>
              <th>Type</th>
              <th>Price</th>
              <th width="">Action</th>
          </tr>
          @php
              $i = 0;
          @endphp
          @foreach ($products as $product)
              <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $product->name }}</td>
                  <td class="hidden-xs">{!! $product->description !!}</td>
                  <td>{{ $product->category }}</td>
                  <td>{{ $product->type }}</td>
                  <td>{{ $product->price }}</td>
                  <td>
                      <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                          <a class="btn btn-sm btn-primary" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pencil"></i><span class="hidden-xs"> Edit</span></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger  mt-1"><i class="fa fa-trash"></i><span class="hidden-xs"> Delete</span></button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </table>
	  {!! $products->links() !!}@endif
    </div>
  </div>
</div>
@endsection
