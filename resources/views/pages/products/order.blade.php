<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
	

	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js"></script>
	
  
    <title>Checkout</title>
	
	
  </head>
  <body class="bg-light">

    <div class="container">
	  <div class="row mt-4 mb-4">
		<ul class="list-inline">
			<li class="list-inline-item"><h4>Checkout ></h4></li>
			<li class="list-inline-item"><h5 class="text-muted">Payment Confirmation<h5></li>
		</ul>
	   </div>
	   
	   <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Detail Order</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Package name</h6>
				</div>
              <span class="text-muted">IDR Price</span>
            </li>
			<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0" name="plan_id">{{$order->plan_name}}</h6>
				<ol class="ml-0">
					<li style="list-style-type: none;"><small class="text-muted" name="plan_id">{!!$order->description!!}</small></li>
				</ol>
			   </div>
              <span class="text-muted" name="plan_id">{{$order->price}}</span>
            </li>
			<li class="list-group-item d-flex justify-content-between">
              <span>Sub Total</span>
              <strong>-</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <strong>TOTAL</strong>
              <strong>-</strong>
            </li>
			<hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">Make an Order</button>
		</div>
		
		<div class="col-md-8 order-md-1">
          <h4 class="mb-3">Personal Information</h4>
          <form class="md-form needs-validation" novalidate>
			<div class="md-form my-0">
            <div class="row">
			 <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="Name" placeholder="Name" aria-label="Name" name="user_id"  value="{{(Auth()->user()->name)}}" required>
              </div>
			  <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="Email" placeholder="Email" aria-label="Email" name="user_id" value="{{(Auth()->user()->email)}}" required>
              </div>
			</div>
			<div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="Instansi" placeholder="Instansi" aria-label="Instansi" name="" value="">
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="Phone" placeholder="Phone" aria-label="Phone" name="" value="">
              </div>
            </div>
			
			<hr class="mb-4">
            <h4 class="mb-3">Payment Method</h4>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="transferbank-tab" data-toggle="tab" href="#transferbank" role="tab"
					aria-selected="true">Transfer Bank</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="creditcard-tab" data-toggle="tab" href="#creditcard" role="tab" 
					aria-selected="false">Credit Card</a>
				</li>
			</ul>

			<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="transferbank" role="tabpanel">
								<div class="custom-control custom-checkbox mr-sm-2 mb-3 ml-3">
								  <input type="checkbox" class="custom-control-input" id="TransferBank"  name="TransferBank">
								  <label class="custom-control-label" for="TransferBank">Transfer Bank</label>
								</div>
							  <div class="row">
								  <div class="col-sm-4">
									<h6>Bank xxx</h6>
								  </div>
								  <div class="col-sm-4">
									<h6>Nomor Rekening: xxxx-xxxx-xxxx</h6>
								  </div>
								  <div class="col-sm-4">
									<h6>A/N: xxxx-xxxx-xxxx</h6>
								  </div>
							  </div>
							  <!--<div class="custom-control custom-radio mb-3">
								  <input type="radio" id="Cash" class="custom-control-input" name="Cash">
								  <label class="custom-control-label" for="Cash">Cash</label>
							  </div>-->
						  </div>
						  <div class="tab-pane fade" id="creditcard" role="tabpanel">
							<div class="row">
							<div class="col-md-6 mb-3">
								<input type="text" class="form-control" id="cc-name" placeholder="Name on card" aria-label="Name on card" required>
								<small class="text-muted">Full name as displayed on card</small>
								<div class="invalid-feedback">
								  Name on card is required
								</div>
							  </div>
							  <div class="col-md-6 mb-3">
								<input type="text" class="form-control" id="cc-number" placeholder="Credit card number" aria-label="Credit card number" required>
								<div class="invalid-feedback">
								  Credit card number is required
								</div>
							  </div>
							</div>
							<div class="row">
							  <div class="col-md-3 mb-3">
								<input type="text" class="form-control" id="cc-expiration" placeholder="Expiration" aria-label="Expiration" required>
								<div class="invalid-feedback">
								  Expiration date required
								</div>
							  </div>
							  <div class="col-md-3 mb-3">
								<input type="text" class="form-control" id="cc-cvv" placeholder="CVV" aria-label="CVV" required>
								<div class="invalid-feedback">
								  Security code required
								</div>
							  </div>
							</div>
						  </div>
						</div>
            
            <hr class="mb-4">
			<div class="mt-4 text-center align-items-center ">
			<a href="#">Back to Package</a>
			</div>
			</div>
          </form>
        </div>
      </div>
		
	
	<!--<section id="card-step">
	  <div class="container">
		<div class="row no-gutters">
			<div class="col-md-6 col-sm-6 col-xs-12 no-gutters">
				<div class="leftside">
					<h6 class="text-uppercase font-weight-bold" style="padding-top: 3em;">Personal Information</h6>
					<div class="row">
					  <div class="col-md-6 col-sm-6 col-xs-12 pri_table_list">
						<form class="form-inline">
						  <div class="md-form my-0">
							<input class="form-control ml-sm-3" type="text" placeholder="Name" aria-label="Name" name="user_id"  value="{{(Auth()->user()->name)}}">
						  </div>
						</form>
						<form class="form-inline">
						  <div class="md-form my-0">
							<input class="form-control ml-sm-3" type="text" placeholder="Company" aria-label="Company" name="user_id" value="{{(Auth()->user()->instansi)}}">
						  </div>
						</form>
						<form class="form-inline">
						  <div class="md-form my-0">
							<input class="form-control ml-sm-3" type="text" placeholder="Phone Number" aria-label="Phone Number" name="user_id" value="{{(Auth()->user()->phone)}}">
						  </div>
						</form>
					  </div>
					</div>
					<h6 class="text-uppercase font-weight-bold" style="padding-top: 3em;">Payment Methods</h6>
					<div class="row" >
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
							  aria-selected="true">Transfer Bank</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
							  aria-selected="false">OVO</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
							  aria-selected="false">Go-Pay</a>
						  </li>
						</ul>
						<div class="tab-content pri_table_list" id="myTabContent">
						  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							  <div class="font-weight-bold">
								<div class="form-check">
								  <input type="radio" class="form-check-input" id="materialChecked" name="materialExample2" checked>
								  <label class="form-check-label" for="materialChecked">Bank BRI</label>
								</div>
							  </div>
							  <div class="row">
								  <div class="col-sm-6">
									<p>Nomor Rekening: xxxx-xxxx-xxxx</p>
								  </div>
								  <div class="col-sm-6">
									<p>A/N: xxxx-xxxx-xxxx</p>
								  </div>
							  </div>
							  <div class="font-weight-bold" style="align: left">Bank Mandiri</div>
							  <div class="row">
								  <p class="col-sm-6">Nomor Rekening: xxxx-xxxx-xxxx</p>
								  <p class="col-sm-6">A/N: xxxx-xxxx-xxxx</p>
							  </div>
							  <div class="font-weight-bold" style="align: left">Bank BCA</div>
							  <div class="row">
								  <p class="col-sm-6">Nomor Rekening: xxxx-xxxx-xxxx</p>
								  <p class="col-sm-6">A/N: xxxx-xxxx-xxxx</p>
							  </div>
						  </div>
						  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							  <p class="col-sm-6">Nomor Rekening: xxxx-xxxx-xxxx</p>
							  <p class="col-sm-6">Nama Rekening: xxxx-xxxx-xxxx</p></br>
						  </div>
						  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							  <p class="col-sm-6">Nomor Rekening: xxxx-xxxx-xxxx</p>
							  <p class="col-sm-6">Nama Rekening: xxxx-xxxx-xxxx</p></br>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 no-gutters">
				<div class="rightside">
				<h6 class="text-uppercase font-weight-bold" style="padding-top: 3em;">Detail Products</h6>
				  <div class="pri_table_list">
					<form class="form-inline">
					  <div class="md-form my-0">
						<input class="form-control ml-sm-3" type="text" placeholder="Package Name" aria-label="Name" name="plan_id"  value="{{$order->plan_name}}">
					  </div>
					</form>
					<form class="form-inline">
					  <div class="md-form my-0">
						<input class="form-control ml-sm-3" type="text" placeholder="Price" aria-label="price" name="plan_id"  value="{{$order->price}}">
					  </div>
					</form>
				  </div>
				</div>
			</div>
		</div>	
	  </div>
	</section>-->
  
  
<footer>
<!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<!-- JavaScript Libraries -->
	<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
  
  <!-- calendar -->
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="http://momentjs.com/downloads/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.min.js"></script>
	
  

    </body>
</html>