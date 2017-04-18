@extends('layout_website')


@section('content')

<!-- Page Heading & Breadcrumbs  -->
	<div class="page-heading-breadcrumbs">
		<div class="container">
			<h2>Match Detail</h2>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li>Match Detail</li>
			</ul>
		</div>
	</div>
	<!-- Page Heading & Breadcrumbs  -->

	<!-- Page Heading banner -->
	<div class="inner-banner style-2 overlay-dark theme-padding parallax-window" data-appear-top-offset="600" data-parallax="scroll" data-image-src="/front_end/images/inner-banner/img-04.jpg">
		<div class="container">
			<div class="pager-heading match-detail h-white">
				<span class="pull-left"><img src="/front_end/images//match-detail/team-logo-01.png" alt=""></span>
				<div class="match-vs-heading position-center-center">
					<h3>
                    <!--Match Final Result -->
                    {{$match->getMatchResultSentence()}}
                    
                    </h3>
                    
                    
                    <div class="col-xs-5" style="text-align:right">
                    
                        <font size="4px" style="text-align:right; color:white; font-weight: bold;">{{$match->inning1->battingTeam->institute->name}}</font>
                        <p> </p>
                        <h1>
                            <font size="10" > 
                            {{$match->getBatFirstTeamScores()}}
                            </font>
                        </h1>
                        @if($match->format!="Test")
                        <h6> Overs {{$match->inning1->oversPlayed}}/{{$match->inning1->maxOvers}} </h6>
                        @endif
                    </div>

					<div class="col-xs-2"></div>
                    <div class="col-xs-5" style="text-align:left">
                        <font size="4px" style="text-align:right; color:white; font-weight: bold;">{{$match->inning1->bowlingTeam()->institute->name}}</font>
                        <p> </p>
                        <h1>
                            <font size="10" > 
                            {{$match->getBatSecondTeamScores()}}
                            </font>
                        </h1>
                        @if($match->format!="Test")
                        <h6> Overs {{$match->inning2->oversPlayed}}/{{$match->inning2->maxOvers}}  </h6>
                        @endif
                    </div>

					<div style="color:white;">
						<ul>
							<li>
                                <i class="fa fa-calendar"></i> &nbsp;
                                    {{$match->matchStartDate}}
                                    @if($match->format=="Test")
                                         - {{$match->matchEndDate}}
                                    @endif
                            </li>
							<li><i class="fa fa-map-marker"></i> &nbsp; {{$match->venue}}</li>
						</ul>

					</div>
				</div>
				<span class="pull-right"><img src="/front_end/images//match-detail/team-logo-02.png" alt=""></span>
			</div>
		</div>
	</div>
	<!-- Page Heading banner -->

	<!-- Main Content -->
	<main class="main-content">	

		<!-- Match Detail -->
		<div class="theme-padding white-bg">
			
			<!--Innings Navigation-->
			<div class="container">
				<ul class="nav nav-tabs nav-list">
					@if($match->inning1!=null)
					<li 
						@if($match->inning1->id==$inning->id)
						class="active"
						@endif
						>
							<a style ="text-transform: uppercase;" href="/viewInning/{{$match->inning1->id}}">
								1st {{$match->inning1->battingTeam->abbrevation}} 
								{{$match->inning1->getScore()}}
							</a>
						</li>
					@endif
				
					@if($match->inning2!=null)
							<li 
							@if($match->inning2->id==$inning->id)
							class="active"
							@endif
							>
								<a style ="text-transform: uppercase;" href="/viewInning/{{$match->inning2->id}}">
								1st {{$match->inning2->battingTeam->abbrevation}}
								{{$match->inning2->getScore()}}
								</a>
							</li>
						@endif
						@if($match->format=="Test")
							@if($match->inning3!=null)
								<li 
								@if($match->inning3->id==$inning->id)
								class="active"
								@endif
								>
									<a style ="text-transform: uppercase;" href="/viewInning/{{$match->inning3->id}}">
									2nd {{$match->inning3->battingTeam->abbrevation}}
									{{$match->inning3->getScore()}}
									</a>
								</li>
							@endif
							@if($match->inning1!=null)
								<li 
								@if($match->inning4->id==$inning->id)
								class="active"
								@endif
								>
									<a style ="text-transform: uppercase;" href="/viewInning/{{$match->inning4->id}}">
									2nd {{$match->inning4->battingTeam->abbrevation}}
									{{$match->inning4->getScore()}}
									</a>
								</li>
							@endif
						@endif
				</ul>
			</div>

			<br />
			<div class="container">

				<h2> {{$inning->battingTeam->institute->name}}  {{$inning->getScore()}} </h2>

				<h4> {{$inning->battingTeam->abbrevation}} Batting </h4>

				
				<div class="table-responsive">
					<table class="table table-hover">
								<thead>
									<tr>                       
										<th width="50%"></th>
										<th style="text-align:right" width="10%">R</th>
										<th style="text-align:right" width="10%">B</th>
										<th style="text-align:right" width="10%">4s</th>
										<th style="text-align:right" width="10%">6s</th>
										<th style="text-align:right" width="10%" >SR</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($batStats as $bat)
										<tr>
										
										<td>
										
										<span style="font-weight:bold;">{{$bat->batsman->nameWithInits()}}</span>
										
										<br />

											@if($bat->dismissalType=="notout")
												
												<span class="badge">Not Out</span>
												
											@elseif ($bat->dismissalType=="bowled")
												
												<span class="badge">B</span>
												{{$bat->bowler->nameWithInits()}}
												
											@elseif ($bat->dismissalType=="caught")
												@if($bat->dismissalBowler==$bat->dismissalFielder)
													<span class="badge">C & B</span>
													{{$bat->bowler->nameWithInits()}}
												@else
													<span class="badge">C</span>
													{{$bat->fielder->nameWithInits()}}
													&nbsp;
													<span class="badge">B</span>
													{{$bat->bowler->nameWithInits()}}
												@endif
												
											@elseif ($bat->dismissalType=="lbw")
												
												<span class="badge">lbw</span>
												{{$bat->bowler->nameWithInits()}}
												
											@elseif ($bat->dismissalType=="stumped")
												
												<span class="badge">ST</span>
												{{$bat->fielder->nameWithInits()}}
												&nbsp;
												<span class="badge">B</span>
												{{$bat->bowler->nameWithInits()}}
												
											@elseif ($bat->dismissalType=="runout")
												
												<span class="badge">Run Out</span>
												{{$bat->fielder->nameWithInits()}}

											@elseif ($bat->dismissalType=="retired")
												
												<span class="badge">Retired Hurt</span>         
												
											@elseif ($bat->dismissalType=="obstruct")
												
												<span class="badge">Obstructing the Field</span>             
												
											@else
												
											@endif
										</td>
										<td style="text-align:right"><span style="font-weight:bold;">{{$bat->runs}}</span></td>
										<td style="text-align:right">{{$bat->balls}}</td>
										<td style="text-align:right">{{$bat->fours}} </td>
										<td style="text-align:right">{{$bat->sixes}} </td>
										<td style="text-align:right"> 
											{{number_format($bat->strikeRate(), 2) }}                            
										</td>
										</tr>
								@endforeach
								

								<tr>
									<td>
										<span style="font-weight:bold;"> Extras </span>
										<br />
										(
											NB {{$inning->nb}}, WD {{$inning->wide}},
											LB {{$inning->legbyes}}, B {{$inning->byes}},
											PNLT {{$inning->penalties}}
										)
									</td>
									<td style="text-align:right;">
										<span style="font-weight:bold;">
										{{$inning->nb+$inning->wide+$inning->legbyes+$inning->byes+$inning->penalties}}
										</span>
									</td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>

								<tr>
									<td  style="text-align:right;"> 
										<span style="font-weight:bold; font-size:25px;"> Total </span>
										<br />
										(Overs {{$inning->oversPlayed}}/{{$inning->maxOvers}}, 
										{{$inning->wicketsFallen}} wickets)
									</td>
									<td style="text-align:right;"> 
										<span style="font-weight:bold; font-size:25px;">{{$inning->total}}</span>
										<br />
										(RR {{number_format($inning->getRunRate(),2)}})
									</td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
								

								</tbody>

								
							</table>
				</div>

				<div>
				<span style="font-weight:bold;font-size:18px;"> DID NOT BAT </span><br />
				{{$inning->getDnbList()}}
				</div>

				<br /><br />

				<div>
				<span style="font-weight:bold;font-size:18px;"> FALL OF WICKETS</span><br />
				{{$inning->getFallOfWickets()}}
				</div>

				
				<br /><br />



				<h4> {{$inning->bowlingTeam()->abbrevation}} Bowling </h4>

				<div class="table-responsive">
					<table class="table table-hover">
								<thead>
									<tr>                       
										<th width="44%"></th>
										<th style="text-align:right" width="8%">O</th>
										<th style="text-align:right" width="8%">M</th>
										<th style="text-align:right" width="8%">R</th>
										<th style="text-align:right" width="8%">W</th>
										<th style="text-align:right" width="8%" >Econ</th>
										<th style="text-align:right" width="8%" >Wd</th>
										<th style="text-align:right" width="8%" >NB</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($bowlStats as $bowl)
									<tr>
                          				<td> {{$bowl->bowler->nameWithInits()}} </td>
                          				<td style="text-align:right"> {{number_format($bowl->overs,1) }}</td>
                          				<td style="text-align:right"> {{$bowl->maiden}} </td>
                          				<td style="text-align:right"> {{$bowl->runs}} </td>
                          				<td style="text-align:right"> <span class="badge"> {{$bowl->wickets}} </span> </td>
                          				<td style="text-align:right"> {{number_format($bowl->getEcon(),2)}} </td>
										<td style="text-align:right"> {{$bowl->wide}} </td>
                          				<td style="text-align:right"> {{$bowl->nb}} </td>
										  
									</tr>	
								@endforeach

								</tbody>

								
							</table>
				</div>

				<h4>Match Details </h4>
				<br />
				<div>
					<span style="font-weight:bold;font-size:18px;"> MATCH RESULT - </span> 
					<span style="font-size:18px;">{{$match->getMatchResultSentence()}} </span> <br /> <br />
					<span style="font-weight:bold;font-size:18px;"> TOSS - </span> 
					<span style="font-size:18px;">{{$match->getTossSentence()}} </span> <br /> <br />
					<span style="font-weight:bold;font-size:18px;"> UMPIRES - </span> 
					<span style="font-size:18px;">
						{{$match->getUmpire1->firstName}} {{$match->getUmpire1->lastName}}, 
						{{$match->getUmpire2->firstName}} {{$match->getUmpire2->lastName}}
					 </span> <br /> <br />
					 <span style="font-weight:bold;font-size:18px;"> SCORER - </span> 
					<span style="font-size:18px;">
						{{$match->getScorer->firstName}} {{$match->getScorer->lastName}}
					 </span> <br /> <br />
				</div>
				
			</div>
		</div>
		<!-- Match Detail -->

	</main>
	<!-- Main Content -->

    
@endsection