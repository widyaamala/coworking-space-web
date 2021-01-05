@extends('layouts.frontend')
@section('template_title')
    {!! trans('Personal') !!}
@endsection
@section('content')

<!--==========================
  Intro Section
============================-->
<section id="intro">
  <div class="intro-container">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
          <div class="carousel-background"><img src="img/img3.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Why partner with us?</h2>
              <p>We help you get acquainted with the best teams and individuals. Your venture for exposure, leads, and meants to reviltalize your business starts here.</p>

            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-background"><img src="img/personal.jpg" alt=""></div>
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Our Partners Range</h2>
              <p>Our partners range from startups to corporates, from non-profit organizations to government entities.</p>

            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </div>
</section><!-- #intro -->

<!-- Info section -->
<div id="services" class="service spacer p-t-30 p-b-30">
  <div class="container">
  <form class="mb-5" action="{{ route('post-partner') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="single-well col-md-6 col-lg-6 pt-1">
        <center><h4>Partnership</h4></center>
        <p>We take collaborative effort to another level with our partnership offers. Our valuable network will pave way for your company to reach its greatest potential. We understand your individual needs by providing a range of exciting partnership offers as well.</p>
        <p>
          Our Partnerships Type
        </p>
		<ul>
                <li>
                  <i class="fa fa-check"></i> Community Partner
                </li>
                <li>
                  <i class="fa fa-check"></i> Event Organizing Partner
                </li>
                <li>
                  <i class="fa fa-check"></i> Canteen and Retail Partner
                </li>
                <li>
                  <i class="fa fa-check"></i> Media Exposure Partner
                </li>
              </ul>
      </div>
	  <div class="col-md-6 col-lg-6 pt-5">
          <p><strong>Upload Your Proposal and Fill this Form to Partner With Us!</strong></p>
		 
		  <div class="form-group row">
			  <label for="company" class="col-4 col-form-label">Your Company Name</label>
			  <div class="col-8">
			  <input type="hidden" name="user_id" value="{{(Auth()->user()->id)}}">
				<input class="form-control" type="text" value="" id="company" name="company">
			  </div>
		  </div>
		  <div class="form-group row">
			<label for="partner_type" class="col-4 col-form-label">Partnership Type</label>
			<div class="col-8">
			<select class="form-control" id="partner_type" name="partner_type">
			  <option>Community Partner</option>
			  <option>Event Organizing Partner</option>
			  <option>Canteen and Retail Partner</option>
			  <option>Media Exposure Partner</option>
			</select>
			</div>
		  </div>
		  <div class="form-group row ">
			  <label class="col-6 col-form-label">Upload Your Proposal</label>
			  <div class="custom-file">
				<input type="file" class="custom-file-input" id="proposal" name="proposal" required>
				<label class="custom-file-label" for="proposal">( PDF/DOC/DOCX file under 15 MB )</label>
			  </div>
		  </div>
		  
		  <hr class="mb-4">
                <div class="text-center">
                  <button class="btn btn-success btn-lg submit-button" type="submit">Submit </button>
                </div>
      </div>
    </div>
	</form>
  </div>
</div><!-- #info -->

@endsection

@section('footer_scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$(window).on('scroll', function () {
				if ( $(window).scrollTop() > 10 ) {
					$('.navbar').addClass('active');
				} else {
					$('.navbar').removeClass('active');
				}
			});
		});
  </script>
@endsection
