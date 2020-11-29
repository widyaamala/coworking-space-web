@extends('layouts.app')
@section('template_title')
    {!! trans('Create New Product') !!}
@endsection
@section('content')
<div class="container">
<div class="col-lg-10 offset-lg-1">
  <div class="card">
    <div class="card-header d-flex">
        <div class="col-lg-9">
            Create New Product
        </div>
        <div class="col-lg-3 text-right">
            <a class="btn btn-light btn-sm" href="{{ route('products') }}"><i class="fa fa-fw fa-reply-all" aria-hidden="true"></i><span class="hidden-xs"> Back</span></a>
        </div>
    </div>
    <div class="card-body">
      <form action="{{ route('products.store') }}" method="POST">
		@csrf
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Product Name</label>
			<div class="col-sm-10">
				<input type="text" name="name" id="name" class="form-control" placeholder="Product Name">
			</div>
		</div>
		<div class="form-group row">
			<label for="description" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-10">
				<textarea type="textarea" name="description" id="description" class="form-control" placeholder="Description"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="price" class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-10">
				<input type="number" name="price" id="price" class="form-control" placeholder="Price">
			</div>
		</div>
		<div class="form-group row">
			<label for="category" class="col-sm-2 col-form-label">Category</label>
			<div class="col-sm-10">
				<input type="text" name="category" id="category" class="form-control" placeholder="Category">
			</div>
		</div>
		<div class="form-group row">
			<label for="type" class="col-sm-2 col-form-label">Type</label>
			<div class="col-sm-10">
				<input type="text" name="type" id="type" class="form-control" placeholder="Type">
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
