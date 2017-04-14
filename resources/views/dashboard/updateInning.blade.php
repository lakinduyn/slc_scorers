@extends('layout_admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Innings
        <!--small>Optional description</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin </a></li>
        <li class="active">Update Innings</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
                <i class="	fa fa-newspaper-o"></i>
                <h3 class="box-title">Update Innings</h3>
        </div>
        <form name="generalInningDetails" id="generalInningDetails" method="POST" action="/updateInnings/{{$inning->id}}/basic" >
          {{csrf_field()}}
        <div class="box-body">
          
          <div class="row">
            <div class="col-md-6">
              <!--GEneral info--> 
              
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="	fa fa-newspaper-o"></i>
                  <h3 class="box-title">General Details</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="maxovers" class="control-label">Maximum Overs </label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" step="0.1" class="form-control" id="maxovers" name="maxovers" value={{$inning->maxOvers}}>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="playedovers" class="control-label">Overs Played</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" step="0.1" class="form-control" id="playedovers" name="playedovers" value={{$inning->oversPlayed}}>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="total" class="control-label">Total</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" class="form-control" id="total" name="total" value={{$inning->total}}>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="wicketsfallen" class="control-label">Wickets Fallen</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" max="10" class="form-control" id="wicketsfallen" name="wicketsfallen" value={{$inning->wicketsFallen}}>
                        </div>
                    </div>
                  </div>
                </div>

              </div> <!--End of general Info-->
            </div>
            <div class="col-md-6">
              <!--extra info--> 
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="	fa fa-newspaper-o"></i>
                  <h3 class="box-title">Innings Extras</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="noballs" class="control-label">No Balls</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" class="form-control" id="noballs" name="noballs" value={{$inning->nb}}>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="wides" class="control-label">Wides</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" class="form-control" id="wides" name="wides" value={{$inning->wide}}>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="legbyes" class="control-label">Leg Byes</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" class="form-control" id="legbyes" name="legbyes" value={{$inning->legbyes}}>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="byes" class="control-label">Byes</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" class="form-control" id="byes" name="byes" value={{$inning->byes}}>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="form-group">
                        <div class="col-sm-6">                       
                        <label for="penalties" class="control-label">Penalties</label>         
                        </div>
                        <div class="col-sm-6">
                                <input type="number" min="0" class="form-control" id="penalties" name="penalties" value={{$inning->penalties}}>
                        </div>
                    </div>
                  </div>
                </div>

              </div> <!--End of extras Info-->
            </div>
            
          </div>
            
        </div> 
        <div class="box-footer">
            <button id="frmSubmit" type="submit" class="btn btn-primary">Update</button>          
        </div>
        </form>  
      </div>
          
      <div class="box box-info">
          <div class="box-header with-border">
                  <i class="	fa fa-newspaper-o"></i>
                  <h3 class="box-title">Batting Details</h3>
                  <button id="btn-add-batsman" name="btn-add-batsman" class="btn btn-primary btn-xs btn-new-batsman">New Batsman</button>
                </div>
                <div class="box-body">    
                <form name="frmBattingInfo" id="frmBattingInfo" method="POST" action="/updateInnings/{{$inning->id}}/batting" >
                {{csrf_field()}}
                  <input type="hidden" name="batStatId" id="batStatId" value="0" />
                  <div class="row">
                    <div class="col-lg-2">
                      <label for="batsman" class="control-label">Batsman </label>
                      <select class="form-control"  name="batsman" id="batsman">
                        <option value="0"> Select Batsman </option>
                        @foreach ($battingTeam as $batsman)
                          <option value="{{$batsman->id}}"> {{$batsman->nameWithInits()}} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="inat" class="control-label">In At </label>
                      <input class="form-control" type="number"  min="0" max="11" name="inat" id="inat" value="0" />
                    </div>
                    <div class="col-lg-2">
                      <label for="runs" class="control-label">Runs </label>
                      <input class="form-control"  type="number"  min="0" name="runs" id="runs" value="0" />
                    </div>
                    <div class="col-lg-2">
                      <label for="balls" class="control-label">Balls </label>
                      <input class="form-control"  type="number" min="0" name="balls" id="balls" value="0" />
                    </div>
                    <div class="col-lg-2">
                      <label for="fours" class="control-label">Fours </label>
                      <input class="form-control"  type="number" min="0" name="fours" id="fours" value="0" />
                    </div>
                    <div class="col-lg-2">
                      <label for="sixes" class="control-label">Sixes </label>
                      <input class="form-control"  type="number" min="0" name="sixes" id="sixes" value="0" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2">
                      <label for="dis_type" class="control-label">Dismissal Type</label>
                      <select class="form-control"  name="dis_type" id="dis_type">
                        <option value="notout"> Not Out </option>
                        <option value="bowled"> Bowled </option>
                        <option value="caught"> Caught </option>
                        <option value="lbw"> LBW </option>
                        <option value="stumped"> Stumped </option>
                        <option value="runout"> Run Out</option>
                        <option value="retired"> Retired Hurt</option>
                        <option value="obstruct"> Obstructing </option>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="dis_bowler" class="control-label">Bowler</label>
                      <select class="form-control"  name="dis_bowler" id="dis_bowler">
                        <option value="0"> Select Bowler </option>
                        @foreach ($bowlingTeam as $bowler)
                          <option value="{{$bowler->id}}"> {{$bowler->nameWithInits()}} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="dis_fielder" class="control-label">Fielder</label>
                      <select class="form-control"  name="dis_fielder" id="dis_fielder">
                        <option value="0"> Select Fielder </option>
                        @foreach ($bowlingTeam as $bowler)
                          <option value="{{$bowler->id}}"> {{$bowler->nameWithInits()}} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="dis_no" class="control-label">Wicket No </label>
                      <input class="form-control"  type="number" min="0" max="10" name="dis_no" id="dis_no" value="0" />
                    </div>
                    <div class="col-lg-2">
                      <label for="dis_at_runs" class="control-label">At (Runs) </label>
                      <input class="form-control"  type="number" min="0" name="dis_at_runs" id="dis_at_runs" value="0" />
                    </div>
                    <div class="col-lg-2">
                      <label for="dis_at_over" class="control-label">At (Over) </label>
                      <input class="form-control"  type="number" min="0" step="0.1" name="dis_at_over" id="dis_at_over" value="0" />
                    </div>
                  </div>
                   <br />
                   <div id="battingError" class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <p id="battingErrorMsg"> </p>
                  </div> 
                  <button id="btnAddBatsman" type="submit" class="btn btn-primary btnAddUpdateBatsman">Add Batsman</button>
                  <button id="btnUpdateBatsman" type="submit" class="btn btn-warning btnAddUpdateBatsman">Update Batsman</button>
                  <button id="btnDeleteBatsman" formmethod="POST" formaction="/updateInnings/batting/delete" type="submit" class="btn btn-danger">Delete Batsman</button>
                  <input type="button" id="btnCancelBatsman" value="Cancel" class="btn btn-new-batsman" />
                  
                  <br />
                </form>
                  <table class="table table-condensed">
                        <tbody><tr>
                          <th style="width: 50px">#</th>
                          <th style="width: 200px">Batsman</th>
                          <th style="width: 200px" >Dismissal</th>
                          <th style="width: 300px" ></th>
                          <th style="width: 50px">Runs</th>
                          <th style="width: 50px">Balls</th>
                          <th style="width: 50px">4s</th>
                          <th style="width: 50px">6s</th>
                          <th>Actions</th>
                        </tr>
                        @foreach ($batStats as $bat)
                        <tr  id="bat_{{$bat->id}}">
                          <input type="hidden" id="batStatDetails_{{$bat->id}}" value="{{$bat}}" />
                          <td>{{$bat->btOrderNo}}</td>
                          <td>{{$bat->batsman->nameWithInits()}} </td>
                          
                            @if($bat->dismissalType=="notout")
                                <td>
                                <span class="badge bg-green">Not Out</span>
                                </td>
                                <td> </td>
                            @elseif ($bat->dismissalType=="bowled")
                                <td>
                                <span class="badge bg-blue">B</span>
                                <span class="badge bg-grey">{{$bat->bowler->nameWithInits()}}</span>
                                </td>
                                <td> </td>
                            @elseif ($bat->dismissalType=="caught")
                                <td>
                                <span class="badge bg-blue">C</span>
                                <span class="badge bg-grey">{{$bat->fielder->nameWithInits()}}</span>
                                </td>
                                <td>
                                <span class="badge bg-blue">B</span>
                                <span class="badge bg-grey">{{$bat->bowler->nameWithInits()}}</span>
                                </td>
                            @elseif ($bat->dismissalType=="lbw")
                                <td>
                                <span class="badge bg-blue">lbw</span>
                                <span class="badge bg-grey">{{$bat->bowler->nameWithInits()}}</span>
                                </td>
                                <td></td>
                            @elseif ($bat->dismissalType=="stumped")
                                <td>
                                <span class="badge bg-blue">St</span>
                                <span class="badge bg-grey">{{$bat->fielder->nameWithInits()}}</span>
                                </td>
                                <td>
                                <span class="badge bg-blue">B</span>
                                <span class="badge bg-grey">{{$bat->bowler->nameWithInits()}}</span>
                                </td>   
                             @elseif ($bat->dismissalType=="runout")
                                <td>
                                <span class="badge bg-blue">Run Out</span>
                                <span class="badge bg-grey">{{$bat->fielder->nameWithInits()}}</span>
                                </td>
                                <td>
                                </td>
                            @elseif ($bat->dismissalType=="retired")
                                <td>
                                <span class="badge bg-blue">Retired Hurt</span>         
                                </td>
                                <td>
                                </td> 
                            @elseif ($bat->dismissalType=="obstruct")
                                <td>
                                <span class="badge bg-blue">Obstructing the Field</span>             
                                </td>
                                <td>
                                </td> 
                             @else
                                  <td> </td>
                                  <td> </td>
                            @endif
                          
                          <td><span class="badge bg-blue">{{$bat->runs}}</span></td>
                          <td><span class="badge bg-grey">{{$bat->balls}}</span></td>
                          <td>{{$bat->fours}} </td>
                          <td>{{$bat->sixes}} </td>
                          <td> 
                            <button class="btn btn-warning btn-xs btn-detail batEdit" value="{{$bat->id}}">Edit</button>
                            
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
          </div>

      </div>

      <div class="box box-info">
          <div class="box-header with-border">
                  <i class="	fa fa-newspaper-o"></i>
                  <h3 class="box-title">Bowling Details</h3>
                  <button id="btn-add-bowler" name="btn-add-bowler" class="btn btn-primary btn-xs btn-new-bowler">New Bowler</button>
          </div>
          <div class="box-body">
              <form name="frmBowlingInfo" id="frmBowlingInfo" method="POST" action="/updateInnings/{{$inning->id}}/bowling" >
                {{csrf_field()}}
                  <input type="hidden" name="bowlStatId" id="bowlStatId" value="0" />

                  <div class="row">
                    <div class="col-lg-3">
                      <label for="bowler" class="control-label">Bowler </label>
                      <select class="form-control"  name="bowler" id="bowler">
                        <option value="0"> Select Bowler </option>
                        @foreach ($bowlingTeam as $bowler)
                          <option value="{{$bowler->id}}"> {{$bowler->nameWithInits()}} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-lg-3">
                      <label for="bowlat" class="control-label">Bowl Order </label>
                      <input class="form-control" type="number"  min="0" max="11" name="bowlat" id="bowlat" value="0" />
                    </div>
                    <div class="col-lg-3">
                      <label for="bowl_wide" class="control-label">Wides </label>
                      <input class="form-control"  type="number"  min="0" name="bowl_wide" id="bowl_wide" value="0" />
                    </div>
                    <div class="col-lg-3">
                      <label for="bowl_no" class="control-label">No Balls </label>
                      <input class="form-control"  type="number" min="0" name="bowl_no" id="bowl_no" value="0" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3">
                      <label for="bowl_overs" class="control-label">Overs</label>
                      <input class="form-control" type="number" step="0.1" min="0" name="bowl_overs" id="bowl_overs" value="0" />
                    </div>
                    <div class="col-lg-3">
                      <label for="bowl_maidens" class="control-label">Maidens </label>
                      <input class="form-control" type="number"  min="0" name="bowl_maidens" id="bowl_maidens" value="0" />
                    </div>
                    <div class="col-lg-3">
                      <label for="bowl_runs" class="control-label">Runs </label>
                      <input class="form-control"  type="number"  min="0" name="bowl_runs" id="bowl_runs" value="0" />
                    </div>
                    <div class="col-lg-3">
                      <label for="bowl_wickets" class="control-label">Wickets </label>
                      <input class="form-control"  type="number" min="0" name="bowl_wickets" id="bowl_wickets" value="0" />
                    </div>
                  </div>
                  <br />
                  <div id="bowlingError" class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <p id="bowlingErrorMsg"> </p>
                  </div>
                  <button id="btnAddBowler" type="submit" class="btn btn-primary btnAddUpdateBowler">Add Bowler</button>
                  <button id="btnUpdateBowler" type="submit" class="btn btn-warning btnAddUpdateBowler" >Update Bowler</button>
                  <button id="btnDeleteBowler" formmethod="POST" formaction="/updateInnings/bowling/delete" type="submit" class="btn btn-danger">Delete Bowler</button>
                  <input type="button" id="btnCancelBowler" value="Cancel" class="btn btn-new-bowler" />
                  <br />
              </form>
              <table class="table table-condensed">
                        <tbody><tr>
                          <th style="width: 50px">#</th>
                          <th style="width: 200px">Bowler</th>
                          <th style="width: 50px">Overs</th>
                          <th style="width: 50px">Maidens</th>
                          <th style="width: 50px">Runs</th>
                          <th style="width: 50px">Wickets</th>
                          <th style="width: 50px">Wd</th>
                          <th style="width: 50px">Nb</th>
                          <th>Actions</th>
                        </tr>
                        @foreach ($bowlStats as $bowl)
                        <tr>
                          <input type="hidden" id="bowlStatDetails_{{$bowl->id}}" value="{{$bowl}}" />
                          <td> {{$bowl->bwOrderNo}} </td>
                          <td> {{$bowl->bowler->nameWithInits()}} </td>
                          <td> {{$bowl->overs}} </td>
                          <td> {{$bowl->maiden}} </td>
                          <td> {{$bowl->runs}} </td>
                          <td> <span class="badge bg-blue"> {{$bowl->wickets}} </span> </td>
                          <td> {{$bowl->wide}} </td>
                          <td> {{$bowl->nb}} </td>
                          <td> <button class="btn btn-warning btn-xs btn-detail bowlEdit" value="{{$bowl->id}}">Edit</button> </td>
                        </tr>
                        @endforeach

              </table>
          </div>
      </div>
          
          
             
         
    </section>
    
</div>
@endsection()
@section('page_specific_scripts')
<script> 
  $(document).ready(function(){ 
      $('#btnAddBatsman').show();
      $('#btnUpdateBatsman').hide();
      $('#btnDeleteBatsman').hide();
      $('#btnCancelBatsman').hide();

      $('#btnAddBowler').show();
      $('#btnUpdateBowler').hide();
      $('#btnDeleteBowler').hide();
      $('#btnCancelBowler').hide();

      $('#battingError').hide();
      $('#bowlingError').hide();

      function disType(){
        var disType = $('#dis_type').val();
          if(disType=="notout"||disType=="dnb"||disType=="retired"||disType=="obstruct"){
            $('#dis_bowler').prop("disabled",true);
            $('#dis_fielder').prop("disabled",true);
            $('#dis_bowler').val("0");
            $('#dis_fielder').val("0");
          }
          else if(disType=="bowled"||disType=="lbw"){
            $('#dis_bowler').prop("disabled",false);
            $('#dis_fielder').prop("disabled",true);
           // $('#dis_bowler').val("0");
            $('#dis_fielder').val("0");
          }
          else if(disType=="caught"||disType=="stumped"){
            $('#dis_bowler').prop("disabled",false);
            $('#dis_fielder').prop("disabled",false);
          }
          else if(disType=="runout"){
            $('#dis_bowler').prop("disabled",true);
            $('#dis_fielder').prop("disabled",false);
            $('#dis_bowler').val("0")
          }
      }

      disType();

      $('.batEdit').click(function() {
          var batStatID=$(this).val();
          
          var batStatArray = $.parseJSON($('#batStatDetails_'+batStatID).val());

          $('#batStatId').val(batStatID);
          $('#batsman').val(batStatArray["player_id"]);
          $('#inat').val(batStatArray["btOrderNo"]);
          $('#runs').val(batStatArray["runs"]);
          $('#balls').val(batStatArray["balls"]);
          $('#fours').val(batStatArray["fours"]);
          $('#sixes').val(batStatArray["sixes"]);
          $('#dis_type').val(batStatArray["dismissalType"]);
          $('#dis_bowler').val(batStatArray["dismissalBowler"]);
          $('#dis_fielder').val(batStatArray["dismissalFielder"]);
          $('#dis_no').val(batStatArray["dismissalNo"]);
          $('#dis_at_runs').val(batStatArray["dismissalAtRuns"]);
          $('#dis_at_over').val(batStatArray["dismissalAtOver"]);

          $('#btnAddBatsman').hide();
          $('#btnUpdateBatsman').show();
          $('#btnDeleteBatsman').show();
          $('#btnCancelBatsman').show();
          $('#battingError').hide();
          disType();

      });
      $('.btn-new-batsman').click(function() {
          $('#batStatId').val("0");
          $('#batsman').val("0");
          $('#inat').val(0);
          $('#runs').val(0);
          $('#balls').val(0);
          $('#fours').val(0);
          $('#sixes').val(0);
          $('#dis_type').val("notout");
          $('#dis_bowler').val("0");
          $('#dis_fielder').val("0");
          $('#dis_no').val(0);
          $('#dis_at_runs').val(0);
          $('#dis_at_over').val(0);

          $('#btnAddBatsman').show();
          $('#btnUpdateBatsman').hide();
          $('#btnDeleteBatsman').hide();
          $('#btnCancelBatsman').hide();
          $('#battingError').hide();
          disType();

      });

      $('.bowlEdit').click(function() {
          var bowlStatID=$(this).val();
          
          var bowlStatArray = $.parseJSON($('#bowlStatDetails_'+bowlStatID).val());

          $('#bowlStatId').val(bowlStatID);
          $('#bowler').val(bowlStatArray["player_id"]);
          $('#bowlat').val(bowlStatArray["bwOrderNo"]);
          $('#bowl_wide').val(bowlStatArray["wide"]);
          $('#bowl_no').val(bowlStatArray["nb"]);
          $('#bowl_overs').val(bowlStatArray["overs"]);
          $('#bowl_maidens').val(bowlStatArray["maiden"]);
          $('#bowl_runs').val(bowlStatArray["runs"]);
          $('#bowl_wickets').val(bowlStatArray["wickets"]);
         

          $('#btnAddBowler').hide();
          $('#btnUpdateBowler').show();
          $('#btnDeleteBowler').show();
          $('#btnCancelBowler').show();
          $('#bowlingError').hide();

      });
      $('.btn-new-bowler').click(function() {
          $('#bowlStatId').val("0");
          $('#bowler').val("0");
          $('#bowlat').val(0);
          $('#bowl_wide').val(0);
          $('#bowl_no').val(0);
          $('#bowl_overs').val(0);
          $('#bowl_maidens').val(0);
          $('#bowl_runs').val(0);
          $('#bowl_wickets').val(0);

          $('#btnAddBowler').show();
          $('#btnUpdateBowler').hide();
          $('#btnDeleteBowler').hide();
          $('#btnCancelBowler').hide();
          $('#bowlingError').hide();
      });
      $('#dis_type').change(function() {
          disType();
      });
      //check Batting
      $('.btnAddUpdateBatsman').click(function() {
            var disType = $('#dis_type').val();
          if($('#batsman').val()=="0"){
            $('#battingError').show();
            $('#battingErrorMsg').text("Please Select a Batsman");
            return false;
          }            
          else if(disType=="notout"||disType=="dnb"||disType=="retired"||disType=="obstruct"){

          }
          else if(disType=="bowled"||disType=="lbw"){
            if($('#dis_bowler').val()=="0"){
                $('#battingError').show();
                $('#battingErrorMsg').text("Please Select a Bowler");
                return false;
            }
          }
          else if(disType=="caught"||disType=="stumped"){
            if($('#dis_bowler').val()=="0"){
                $('#battingError').show();
                $('#battingErrorMsg').text("Please Select a Bowler");
                return false;
            }
            else if($('#dis_fielder').val()=="0"){
                $('#battingError').show();
                $('#battingErrorMsg').text("Please Select a Fielder");
                return false;
            }
          }
          else if(disType=="runout"){
            if($('#dis_fielder').val()=="0"){
                $('#battingError').show();
                $('#battingErrorMsg').text("Please Select a Fielder");
                return false;
            }
          }
          
      });
      $('.btnAddUpdateBowler').click(function() {
          if($('#bowler').val()=="0"){
            $('#bowlingError').show();
            $('#bowlingErrorMsg').text("Please Select a Bowler");
            return false;
          } 
      });
  });

  


</script>
@endsection
