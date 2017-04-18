<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0;
      width: 100%;
  }
  .affix + .container-fluid {
      padding-top: 180px;
  }
  </style>
</head>
<body>



<nav class="navbar navbar-inverse" data-spy="affix">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
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
</nav>

<div class="container-fluid" style="height:1000px">
    <h1> <span class="label label-default"> {{$inning->battingTeam->institute->name}}  {{$inning->getScore()}} </span></h1>
                   
    <br />
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Batting</h3></div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
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
                        <tr  id="bat_{{$bat->id}}">
                          <input type="hidden" id="batStatDetails_{{$bat->id}}" value="{{$bat}}" />
                          
                          <td>
                          
                          <span style="font-weight:bold;">{{$bat->batsman->nameWithInits()}}</span>
                          
                          <br />

                            @if($bat->dismissalType=="notout")
                                
                                <span class="badge bg-green">Not Out</span>
                                
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
                   
                </tbody>
			</table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Bowling</h3></div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
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
                        <tr  id="bat_{{$bat->id}}">
                          <input type="hidden" id="batStatDetails_{{$bat->id}}" value="{{$bat}}" />
                          
                          <td>
                          
                          <span style="font-weight:bold;">{{$bat->batsman->nameWithInits()}}</span>
                          
                          <br />

                            @if($bat->dismissalType=="notout")
                                
                                <span class="badge bg-green">Not Out</span>
                                
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
                   
                </tbody>
			</table>
        </div>
    </div>
</div>

</body>
</html>
