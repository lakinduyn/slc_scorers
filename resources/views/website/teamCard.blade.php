@extends('layout_website')
@section('content')
    <!-- Page Heading & Breadcrumbs  -->
	<div class="page-heading-breadcrumbs">
		<div class="container">
			<h2>Team Card</h2>
			<ul class="breadcrumbs">
				<li><a href="/">Home</a></li>
				<li>Team Card</li>
			</ul>
		</div>
	</div>
	<!-- Page Heading & Breadcrumbs  -->

	<!-- Page Heading banner -->
	<div class="overlay-dark theme-padding parallax-window" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/inner-banner/img-03.jpg">
	</div>
	<!-- Page Heading banner -->

	<!-- Main Content -->
	<main class="main-content">	

		<!-- Team -->
		<div class="team-grid theme-padding white-bg">
			<div class="container">
				<h2><?= $name->name ?>-<?= $name->abbrevation ?></h2>
				<div class="row">
                <?php $i=0?>
<?php foreach ($tp as $tp) : ?>	
	<!-- Team Column --><?php $i++?>
					<div class="col-lg-3 col-sm-4 col-xs-6 r-full-width">
						<div class="team-column">
							<img src="../../public/front_end/images/team/img-01.jpg" alt=""  height="386" width="286">
							<span class="player-number"><?= $i ?></span>
							<div class="team-detail">
								<h5><a href="#">{{$tp->getPlayer->firstName}} {{$tp->getPlayer->lastName}} </a></h5>
								<span class="desination">{{$tp->getPlayer->playingRole}}</span>
								<div class="detail-inner">
									<ul>
										<li>Born</li>
										<li>Role</li>
										<li>Squad number</li>
										<li>Fallow us on</li>
									</ul>
									<ul>
										<li>{{$tp->getPlayer->dob}}</li>
										<li>{{$tp->getPlayer->playingRole}}</li>
										<li>Atletico Nacional</li>
										<li>
											<ul class="social-icons">
												<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
												<li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Team Column -->
                    <?php endforeach; ?> 
				
							</div>
			</div>
		</div>
		<!-- Team Width Sidebar -->

	</main>
	<!-- Main Content
    @endsection
@section('page_specific_scripts')
<!-- Java Script -->
<script src="../../../public/front_end/js/vendor/jquery.js"></script>        
<script src="../../../public/front_end/js/vendor/bootstrap.min.js"></script> 
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="../../../public/front_end/js/gmap3.min.js"></script>				
<script src="../../../public/front_end/js/bigslide.js"></script>		
<script src="../../../public/front_end/js/slick.js"></script>	
<script src="../../../public/front_end/js/waterwheelCarousel.js"></script>
<script src="../../../public/front_end/js/contact-form.js"></script>	
<script src="../../../public/front_end/js/countTo.js"></script>		
<script src="../../../public/front_end/js/datepicker.js"></script>		
<script src="../../../public/front_end/js/rating-star.js"></script>							
<script src="../../../public/front_end/js/range-slider.js"></script>				
<script src="../../../public/front_end/js/spinner.js"></script>			
<script src="../../../public/front_end/js/parallax.js"></script>			   	 
<script src="../../../public/front_end/js/countdown.js"></script>	
<script src="../../../public/front_end/js/appear.js"></script>		 		
<script src="../../../public/front_end/js/prettyPhoto.js"></script>			
<script src="../../../public/front_end/js/wow-min.js"></script>						
<script src="../../../public/front_end/js/main.js"></script>	
<link rel="stylesheet" href="../../../public/front_end/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../../../public/front_end/css/main.css">	
<link rel="stylesheet" href="../../../public/front_end/css/icomoon.css">
<link rel="stylesheet" href="../../../public/front_end/css/animate.css">
<link rel="stylesheet" href="../../../public/front_end/css/transition.css">
<link rel="stylesheet" href="../../../public/front_end/css/font-awesome.min.css">
<link rel="stylesheet" href="../../../public/front_end/style.css">
<link rel="stylesheet" href="../../../public/front_end/css/color.css">
<link rel="stylesheet" href="../../../public/front_end/css/responsive.css">
<!-- FontsOnline -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800|Open+Sans:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<!-- JavaScripts -->
<script src="../../../public/front_end/js/vendor/modernizr.js">

@endsection()