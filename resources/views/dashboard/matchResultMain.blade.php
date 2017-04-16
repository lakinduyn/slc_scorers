@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Match Results Main
        <!--small>Optional description</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin </a></li>
        <li class="active">Match Results Main</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                    <i class="	fa fa-newspaper-o"></i>
                    <h3 class="box-title">Match Details</h3>
            </div>
            <div class="box-body">
                <div class="text-center">
                        <h4>{{$match->tournament->name}} | {{$match->name}} | {{$match->format}} Match</h4>            
                        </div>

                        <div class="box box-solid" style="background-color:#00c0ef; color:#fff;" >
                        <div class="box-body">
                            <div class="col-xs-6 text-right" style="border-right-style: solid; border-right-color: #fff;">
                                <h3>{{$match->team1->institute->name}}</h3>
                                <h4>{{$match->team1->name}}</h4>
                            </div>
                            <div class="col-xs-6">
                            <h3>{{$match->team2->institute->name}}</h3>
                            <h4>{{$match->team2->name}}</h4>
                            </div>
                        </div>
                        </div>
                        

                        <div class="text-center">
                            <i class="fa fa-calendar"></i>
                            {{$match->matchStartDate}}
                            @if($match->format=="Test")
                                - {{$match->matchEndDate}}
                            @endif
                            <br/>
                            <i class="fa fa-map-marker"></i>
                            {{$match->venue}}        
                        </div>
            
            </div>
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                    <i class="	fa fa-newspaper-o"></i>
                    <h3 class="box-title">Match Basic Details</h3>
            </div>
            <div class="box-body">
                @if($match->matchresult==null)
                    <div class="callout callout-warning">
                    <p>Please Update Match Basic Details</p>
                    </div>
                @else
                <div class="callout callout-info">                   
                    <p>{{$match->matchresult->tossWinningTeam->name }} Won the Toss and Elected to 
                    @if($match->matchresult->tossDecision=="field")
                        Field
                    @else
                        Bat
                    @endif
                    </p>
                </div>
                @endif
                <form>
                
                <button  type="submit" class="btn btn-primary" formmethod="GET" formaction="/matchResults/{{$match->id}}" > Update Basic Details</button>
                
                </form>
            </div>
        </div>
        @if($match->matchresult!=null)
        <div class="box box-info">
            <div class="box-header with-border">
                    <i class="	fa fa-newspaper-o"></i>
                    <h3 class="box-title">Innings Details</h3>
            </div>
            <div class="box-body">  
                <div class="box-group" id="accordion">
                    <!--Inning1-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                                Inning #1
                            </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="box-body">
                                @if($match->inning1==null)             
                                Batting Team 
                                <form>
                                {{csrf_field()}}
                                <select id="batTeam1" name="batTeam" class="form-control">
                                    <option value="0">--Not Played--</option>
                                    
                                    <option value="{{$match->team1->id}}"> 
                                    {{$match->team1->abbrevation}} 
                                    @if($match->format=="Test")
                                        (1st Innings)
                                    @endif
                                    </option> 
                                    <option value="{{$match->team2->id}}"> 
                                    {{$match->team2->abbrevation}} 
                                    @if($match->format=="Test")
                                        (1st Innings)
                                    @endif
                                    </option> 
                                </select>
                                <br />
                                    <div id="inning1error" class="callout callout-danger">
                                        <p>Please Select Bating Team</p>
                                    </div>
                                    <input type="hidden" name="inningNo" value="1" />
                                    <button id="btnAddInning1"  type="submit" class="btn btn-primary" formmethod="POST" formaction="/updateInnings/new/{{$match->id}}" > Add Scoresheet</button>
                                    
                                </form>
                                @else
                                <form>
                                {{csrf_field()}}
                                    <center>
                                    <h3> {{$match->inning1->battingTeam->institute->name}} - {{$match->inning1->battingTeam->name}}
                                    @if($match->format=="Test")
                                        (1st Innings)
                                    @endif
                                    
                                    </h3>
                                    <font size="18">
                                        <span class="label label-primary"> {{$match->inning1->total}}/{{$match->inning1->wicketsFallen}} </span>
                                    </font>
                                    <br /> <br />
                                    <span class="label label-default"> ({{$match->inning1->oversPlayed}}/{{$match->inning1->maxOvers}} Overs) </span>
                                    <br /><br />
                                    <button  type="submit" class="btn btn-warning" formmethod="GET" formaction="/updateInnings/{{$match->inning1->id}}" > Update Scoresheet</button>
                                    <button  type="submit" class="btn btn-danger" formmethod="POST" formaction="/updateInnings/reset/{{$match->inning1->id}}" > Reset Scoresheet</button>
                                    </center>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Inning2-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" class="collapsed">
                                Inning #2
                            </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="box-body">
                                @if($match->inning2==null)             
                                Batting Team 
                                <form>
                                {{csrf_field()}}
                                <select id="batTeam2" name="batTeam" class="form-control">
                                    <option value="0">--Not Played--</option>
                                    
                                    <option value="{{$match->team1->id}}"> 
                                    {{$match->team1->abbrevation}} 
                                    @if($match->format=="Test")
                                        (1st Innings)
                                    @endif
                                    </option> 
                                    <option value="{{$match->team2->id}}"> 
                                    {{$match->team2->abbrevation}} 
                                    @if($match->format=="Test")
                                        (1st Innings)
                                    @endif
                                    </option> 
                                </select>
                                <br />
                                    <div id="inning2error" class="callout callout-danger">
                                        <p>Please Select Bating Team</p>
                                    </div>
                                    <input type="hidden" name="inningNo" value="2" />
                                    <button id="btnAddInning2"   type="submit" class="btn btn-primary" formmethod="POST" formaction="/updateInnings/new/{{$match->id}}" > Add Scoresheet</button>
                                    
                                </form>
                                @else
                                <form>
                                {{csrf_field()}}
                                    <center>
                                    <h3> {{$match->inning2->battingTeam->institute->name}} - {{$match->inning2->battingTeam->name}}
                                    @if($match->format=="Test")
                                        (1st Innings)
                                    @endif
                                    
                                    </h3>
                                    <font size="18">
                                        <span class="label label-primary"> {{$match->inning2->total}}/{{$match->inning2->wicketsFallen}} </span>
                                    </font>
                                    <br /> <br />
                                    <span class="label label-default"> ({{$match->inning2->oversPlayed}}/{{$match->inning2->maxOvers}} Overs) </span>
                                    <br /><br />
                                    <button  type="submit" class="btn btn-warning" formmethod="GET" formaction="/updateInnings/{{$match->inning2->id}}" > Update Scoresheet</button>
                                    <button  type="submit" class="btn btn-danger" formmethod="POST" formaction="/updateInnings/reset/{{$match->inning2->id}}" > Reset Scoresheet</button>
                                    </center>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($match->format=="Test")
                    <!--Inning3-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" class="collapsed">
                                Inning #3
                            </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="box-body">
                                @if($match->inning3==null)             
                                Batting Team 
                                <form>
                                {{csrf_field()}}
                                <select id="batTeam3" name="batTeam" class="form-control">
                                    <option value="0">--Not Played--</option>
                                    
                                    <option value="{{$match->team1->id}}"> 
                                    {{$match->team1->abbrevation}} 
                                    @if($match->format=="Test")
                                        (2nd Innings)
                                    @endif
                                    </option> 
                                    <option value="{{$match->team2->id}}"> 
                                    {{$match->team2->abbrevation}} 
                                    @if($match->format=="Test")
                                        (2nd Innings)
                                    @endif
                                    </option> 
                                </select>
                                <br />
                                    <div id="inning3error" class="callout callout-danger">
                                        <p>Please Select Bating Team</p>
                                    </div>
                                    <input type="hidden" name="inningNo" value="3" />
                                    <button id="btnAddInning3"   type="submit" class="btn btn-primary" formmethod="POST" formaction="/updateInnings/new/{{$match->id}}" > Add Scoresheet</button>
                                    
                                </form>
                                @else
                                <form>
                                {{csrf_field()}}
                                    <center>
                                    <h3> {{$match->inning3->battingTeam->institute->name}} - {{$match->inning3->battingTeam->name}}
                                    @if($match->format=="Test")
                                        (2nd Innings)
                                    @endif
                                    
                                    </h3>
                                    <font size="18">
                                        <span class="label label-primary"> {{$match->inning3->total}}/{{$match->inning3->wicketsFallen}} </span>
                                    </font>
                                    <br /> <br />
                                    <span class="label label-default"> ({{$match->inning3->oversPlayed}}/{{$match->inning3->maxOvers}} Overs) </span>
                                    <br /><br />
                                    <button  type="submit" class="btn btn-warning" formmethod="GET" formaction="/updateInnings/{{$match->inning3->id}}" > Update Scoresheet</button>
                                    <button  type="submit" class="btn btn-danger" formmethod="POST" formaction="/updateInnings/reset/{{$match->inning3->id}}" > Reset Scoresheet</button>
                                    </center>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Inning4-->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" class="collapsed">
                                Inning #4
                            </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="box-body">
                                @if($match->inning4==null)             
                                Batting Team 
                                <form>
                                {{csrf_field()}}
                                <select id="batTeam4" name="batTeam" class="form-control">
                                    <option value="0">--Not Played--</option>
                                    
                                    <option value="{{$match->team1->id}}"> 
                                    {{$match->team1->abbrevation}} 
                                    @if($match->format=="Test")
                                        (2nd Innings)
                                    @endif
                                    </option> 
                                    <option value="{{$match->team2->id}}"> 
                                    {{$match->team2->abbrevation}} 
                                    @if($match->format=="Test")
                                        (2nd Innings)
                                    @endif
                                    </option> 
                                </select>
                                <br />
                                    <div id="inning4error" class="callout callout-danger">
                                        <p>Please Select Bating Team</p>
                                    </div>
                                    <input type="hidden" name="inningNo" value="4" />
                                    <button id="btnAddInning4"   type="submit" class="btn btn-primary" formmethod="POST" formaction="/updateInnings/new/{{$match->id}}" > Add Scoresheet</button>
                                    
                                </form>
                                @else
                                <form>
                                {{csrf_field()}}
                                    <center>
                                    <h3> {{$match->inning4->battingTeam->institute->name}} - {{$match->inning4->battingTeam->name}}
                                    @if($match->format=="Test")
                                        (2nd Innings)
                                    @endif
                                    
                                    </h3>
                                    <font size="18">
                                        <span class="label label-primary"> {{$match->inning4->total}}/{{$match->inning4->wicketsFallen}} </span>
                                    </font>
                                    <br /> <br />
                                    <span class="label label-default"> ({{$match->inning4->oversPlayed}}/{{$match->inning4->maxOvers}} Overs) </span>
                                    <br /><br />
                                    <button  type="submit" class="btn btn-warning" formmethod="GET" formaction="/updateInnings/{{$match->inning4->id}}" > Update Scoresheet</button>
                                    <button  type="submit" class="btn btn-danger" formmethod="POST" formaction="/updateInnings/reset/{{$match->inning4->id}}" > Reset Scoresheet</button>
                                    </center>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="box box-info">
            <div class="box-header with-border">
                    <i class="	fa fa-newspaper-o"></i>
                    <h3 class="box-title">Final Result</h3>
            </div>
            <form>
            {{csrf_field()}}
            <div class="box-body">
                <input type="hidden" id="matchResult" value="{{$match->matchResult}}" />
                <div class="row">
                    <div class="col-lg-3">
                      <label for="wonType" class="control-label">Win Type </label>
                      <select id="wonType" name="wonType" class="form-control">
                                    <option value="0">--Win Type--</option>
                                    <option value="runs">Runs</option>
                                    <option value="wickets">Wickets</option>
                                    @if($match->format=="Test")
                                    <option value="innings">Innings & Runs</option>
                                    <option value="drawn">Drawn</option>
                                    @else
                                    <option value="noresult">No Result</option>   
                                    @endif
                                    <option value="tie">Tie</option>
                                                                     
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="wonby" class="control-label">Won by </label>
                        <select id="wonby" name="wonby" class="form-control">
                                    <option value="0">--Select Team--</option>
                                    
                                    <option value="{{$match->team1->id}}"> 
                                    {{$match->team1->abbrevation}} </option>
                                    <option value="{{$match->team2->id}}"> 
                                    {{$match->team2->abbrevation}} </option>
                        </select>
                    </div>
                    
                    <div class="col-lg-3">
                      <label for="winMargin" class="control-label">Runs/Wickets</label>
                      <input class="form-control"  type="number" min="0"  name="winMargin" id="winMargin" value="0" />
                    </div>
                    @if($match->format!="Test")
                    <div class="col-lg-3">                   
                      <label for="isDuck" class="control-label">Duckworth Lewis </label>
                      <select id="isDuck" name="isDuck" class="form-control">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                        </select>
                    </div>
                    @endif
                </div>
                <br />
                <div id="matchFinalResultError" class="callout callout-danger">
                    <p id="matchFinalResultErrorMsg" ></p>
                </div>
            </div>
            <div class="box-footer">
                <button id="btnUpdateFinalResult" type="submit" class="btn btn-primary" formmethod="POST" formaction="/matchResult/{{$match->id}}/finalResult" > Update Final Result</button>
            </div>
            </form>
        </div>
        @endif
        <form>
        <button formmethod="GET" formaction="/admin" type="submit" class="btn btn-default">Back</button>
        </form>
    </section>
</div>
@endsection

@section('page_specific_scripts')
<script> 
  $(document).ready(function(){ 
      $('#inning1error').hide();
      $('#inning2error').hide();
      $('#inning3error').hide();
      $('#inning4error').hide();
      $('#matchFinalResultError').hide();

      $('#btnAddInning1').click(function(){
          if($('#batTeam1').val()=="0"){
                $('#inning1error').show();
                return false;
          }           
      });
      $('#btnAddInning2').click(function(){
          if($('#batTeam2').val()=="0"){
                $('#inning2error').show();
                return false;
          }           
      });
      $('#btnAddInning3').click(function(){
          if($('#batTeam3').val()=="0"){
                $('#inning3error').show();
                return false;
          }           
      });
      $('#btnAddInning4').click(function(){
          if($('#batTeam4').val()=="0"){
                $('#inning4error').show();
                return false;
          }           
      });
      $('#btnUpdateFinalResult').click(function(){
            
            if($('#wonType').val()=="0"){
                $('#matchFinalResultError').show();
                $('#matchFinalResultErrorMsg').text("Please Select Win Type");
                return false;
            }
            else if($('#wonType').val()=="runs"||$('#wonType').val()=="wickets"||$('#wonType').val()=="innings"){
                if($('#wonby').val()=="0"){
                    $('#matchFinalResultError').show();
                    $('#matchFinalResultErrorMsg').text("Please Select Winning Team");
                    return false;
                }
                else if ($('#winMargin').val()=="0"){
                    $('#matchFinalResultError').show();
                    $('#matchFinalResultErrorMsg').text("Please Select Winning Margin");
                    return false;
                }            
            }

      });
      function winType(){
            var wonType = $('#wonType').val();
          if(wonType=="drawn"||wonType=="noresult"){
                $('#wonby').prop("disabled",true);
                $('#winMargin').prop("disabled",true);
                $('#isDuck').prop("disabled",true);
                $('#wonby').val("0");
                $('#winMargin').val(0);
                $('#isDuck').val("no");
          }
          else if(wonType=="tie"){
                $('#wonby').prop("disabled",true);
                $('#winMargin').prop("disabled",true);
                $('#isDuck').prop("disabled",false);
                $('#wonby').val("0");
                $('#winMargin').val(0);
          }
          else if(wonType=="0"){
                $('#wonby').prop("disabled",true);
                $('#winMargin').prop("disabled",true);
                $('#isDuck').prop("disabled",true);
                $('#wonby').val("0");
                $('#winMargin').val(0);
                $('#isDuck').val("no");
          }
          else{
              $('#wonby').prop("disabled",false);
                $('#winMargin').prop("disabled",false);
                $('#isDuck').prop("disabled",false);
          }
      }
      $('#wonType').change(function() {
          winType();
      });
     var matchResult = $.parseJSON($('#matchResult').val());
    
    if(matchResult!=null)
    {
        $('#wonType').val(matchResult["wintype"]);
        $('#wonby').val(matchResult["winTeam"]);
        $('#winMargin').val(matchResult["winMargin"]);
        $('#isDuck').val(matchResult["dlMethod"]);
    }
    winType();


    
  });
  
</script>
@endsection
