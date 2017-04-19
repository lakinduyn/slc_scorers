@extends('layout_website')
@section('content')
<div class="page-heading-breadcrumbs">
		<div class="container">
			<h2>Club Tournaments</h2>
			<ul class="breadcrumbs">
				<li><a href="/">Home</a></li>
				<li>Club Tournaments</li>
			</ul>
		</div>
	</div>
  <div class="overlay-dark theme-padding parallax-window" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/inner-banner/img-01.jpg">
	</div>
  <main class="main-content">	

		<!-- Team Width Sidebar -->
		<div class="team-width-sidebar theme-padding white-bg">
			<div class="container">
			  
				<div class="row">
        <!-- Match Result Contenet -->
 
					<div class="col-lg-9 col-sm-8">
					   <?php foreach ($tm as $tm) : ?>		
						<!-- Matches Result Shedule -->
						<div class="matches-dates-shedule style-2">
						
            <h1><label>  {{$tm->name}} </label></h1>
							<div class="result-top-bar">
								<span class="pull-left">Match Results</span>
								<span class="pull-right">Recently played</span>
							</div>
							<ul><?php $match=$tm->matches?>
								<?php foreach ($match as $match) : ?>
								<li>
									<span class="pull-left"><img src="images/matches-logo/img-01.png" alt="">{{$match->getTeam1->abbrevation}}</span>
									<span class="pull-right"><img src="images/matches-logo/img-02.png" alt="">{{$match->getTeam2->abbrevation}}</span>
									<div class="detail">
									  	<span class="result-vs"><h3>
                    <!--Match Final Result -->
					 @if($match->venue!="asd")
                      <a href="/viewMatchResult/{{$match->id}}"> {{$match->getMatchResultSentence()}}</a>
					   @else
					   Did not Play yet
					    @endif
                    </h3></span>
										<div class="location-marker">
											<ul>
												<li><i class="fa fa-clock-o"></i> {{$match->matchStartDate}}</li>
												<li><i class="fa fa-map-marker"></i>{{$match->venue}}</li>
											</ul>
										</div>
									</div>
								</li>
								
								  <?php endforeach; ?>
								
							</ul>
							<?php endforeach; ?>
						</div>
						<!-- Matches Result Shedule -->
	
					</div>
					</div>
				
					<!-- Match Result Contenet -->
					<!-- Team List Content -->

					<!-- Aside -->
					<div class="col-lg-3 col-sm-4 pull-right team-s-pull">

						<!-- Add Product -->
						<div class="add-product">
							<img src="images/add-shirt.jpg" alt="">
							<p>Free name and number Printing on away shirts at ground soccer.com</p>
							<a href="#" class="btn red-btn"><i class="fa fa-angle-right"></i>Click here</a>
						</div>
						<!-- Add Product -->

						<!-- Aside Widget -->
						<div class="aside-widget">
							<h3><span>Popular News</span></h3>
							<div class="Popular-news">
								<ul>
									<li>
										<img src="images/popular-news/img-01.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
									<li>
										<img src="images/popular-news/img-02.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
									<li>
										<img src="images/popular-news/img-03.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
									<li>
										<img src="images/popular-news/img-04.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
								</ul>
							</div>
						</div>
						<!-- Aside Widget -->

						<!-- Aside Widget -->
						<div class="aside-widget">
							<div class="aside-post">

								<!-- Post Img -->
								<div class="large-post-img vdie-post overlay-dark">
									<img src="images/aside-post.jpg" alt="">
									<a class="position-center-center" href="#"><i class="fa fa-play-circle-o"></i></a>
								</div>
								<!-- Post Img -->

								<!-- Post Detail -->
								<div class="large-post-detail">
									<h2><a href="#">Somehow there wa enough distaste presumption of it) to</a></h2>
									<span class="red-color">22 Feb, 2016</span>
								</div>
								<!-- Post Detail -->

							</div>
						</div>
						<!-- Aside Widget -->

						<!-- Aside Widget -->
						<div class="aside-widget">
							<h3><span>instgram</span></h3>
							<div class="instgram-writer">
								<img src="images/instgram-imgs/instgram-writer.jpg" alt="">
								<p>@domainnamein spiration from all over the world</p>
							</div>
							<div class="instgram-imgs">
								<ul>
									<li><a href="#"><img src="images/instgram-imgs/img-01.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/instgram-imgs/img-02.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/instgram-imgs/img-03.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/instgram-imgs/img-04.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/instgram-imgs/img-05.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/instgram-imgs/img-06.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/instgram-imgs/img-07.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/instgram-imgs/img-08.jpg" alt=""></a></li>
								</ul>
							</div>
						</div>
						<!-- Aside Widget -->

					</div>
					<!-- Aside -->

				</div>
			</div>
		</div>
		<!-- Team Width Sidebar -->

	</main>
  
 

@endsection
@section('page_specific_scripts')
<script src="/front_end/js/vendor/jquery.js"></script>        
<script src="/front_end/js/vendor/bootstrap.min.js"></script> 
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/front_end/js/gmap3.min.js"></script>				
<script src="/front_end/js/bigslide.js"></script>		
<script src="/front_end/js/slick.js"></script>	
<script src="/front_end/js/waterwheelCarousel.js"></script>
<script src="/front_end/js/contact-form.js"></script>	
<script src="/front_end/js/countTo.js"></script>		
<script src="/front_end/js/datepicker.js"></script>		
<script src="/front_end/js/rating-star.js"></script>							
<script src="/front_end/js/range-slider.js"></script>				
<script src="/front_end/js/spinner.js"></script>			
<script src="/front_end/js/parallax.js"></script>			   	 
<script src="/front_end/js/countdown.js"></script>	
<script src="/front_end/js/appear.js"></script>		 		
<script src="/front_end/js/prettyPhoto.js"></script>			
<script src="/front_end/js/wow-min.js"></script>						
<script src="/front_end/js/main.js"></script>	
@endsection()