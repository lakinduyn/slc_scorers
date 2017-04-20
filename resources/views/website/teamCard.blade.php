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
				<h2>{{$name->name}} {{ $name->abbrevation}} </h2>
				<div class="row">
               @php ($i = 0)
   @foreach ($tp as $tp)	
	<!-- Team Column -->@php ($i++)
					<div class="col-lg-3 col-sm-4 col-xs-6 r-full-width">
						<div class="team-column">
							<img src="../../public/front_end/images/team/img-01.jpg" alt=""  height="386" width="286">
							<span class="player-number">{{$i}}</span>
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
                     @endforeach 
				
							</div>
			</div>
		</div>
		<!-- Team Width Sidebar -->

	</main>
	<!-- Main Content-->
    @endsection
@section('page_specific_scripts')
<!-- Java Script -->


@endsection()