@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Match Results
        <!--small>Optional description</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin </a></li>
        <li class="active">Match Results</li>
      </ol>
    </section>
    <input type="hidden" id="matchResultsDetails" value="{{$matchResult}}" />
    <input type="hidden" id="matchDetails" value="{{$match}}" />
    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
                <i class="	fa fa-newspaper-o"></i>
                <h3 class="box-title">Match Details</h3>
        </div>
        <form id="frmMatchResult" name="frmMatchResult" method="POST" action="/matchResult/{{$match->id}}/basicDetails">
          {{csrf_field()}}
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <!--Toss info--> 
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="	fa fa-newspaper-o"></i>
                  <h3 class="box-title">Toss Details</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-6">
                      Won By             
                    </div>
                    <div class="col-sm-6">
                      <div class="col-xs-6">
                        <label class="radio-inline"><input id="tossTeam1" type="radio" value={{$match->team1->id}}  name="toss">{{$match->team1->abbrevation}}</label>
                      </div>
                      <div class="col-xs-6">
                        <label class="radio-inline"><input id="tossTeam2" type="radio" value={{$match->team2->id}} name="toss">{{$match->team2->abbrevation}}</label>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-6">
                      Elected To           
                    </div>
                    <div class="col-sm-6">
                      <div class="col-xs-6">
                        <label class="radio-inline"><input id="electBat" type="radio"  value="bat" name="elect">Bat</label>
                      </div>
                      <div class="col-xs-6">
                        <label class="radio-inline"><input id="electField" type="radio" value="field"  name="elect">Field</label>
                      </div>
                    </div>
                  </div>
                  <div class="alert alert-warning" id="toss-alert">
                      <i class="icon fa fa-warning"></i> <span>Please Select Toss Decision</span>                          
                  </div>
                </div>
              </div> <!--End of Toss Info-->
            </div>
            <div class="col-md-6">
              <!--Official info--> 
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="	fa fa-newspaper-o"></i>
                  <h3 class="box-title">Match Officials</h3>
                </div>
                <div class="box-body">
                  <div class="row form-group">
                    <div class="col-sm-6">
                      Umpire 1     
                    </div>
                    <div class="col-sm-6">
                      <select id="umpire1" name="umpire1" class="form-control">
                        <option value="0">--Select Umpire--</option>
                        @foreach($umpires as $umpire)
                          <option value={{$umpire->id}}>{{$umpire->getFullName()}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-sm-6">
                      Umpire 2     
                    </div>
                    <div class="col-sm-6">
                      <select id="umpire2" name="umpire2" class="form-control">
                        <option value="0" >--Select Umpire--</option>
                        @foreach($umpires as $umpire)
                          <option value={{$umpire->id}}>{{$umpire->getFullName()}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-sm-6">
                      Scorer    
                    </div>
                    <div class="col-sm-6">
                      <select id="scorer" name="scorer" class="form-control">
                        <option value="0" >--Select Scorer--</option>
                        @foreach($scorers as $scorer)
                          <option value="{{$scorer->id}}">{{$scorer->getFullName()}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br />                 
                </div>
              </div> <!--End of official Info-->
            </div>
          </div>
          <div class="row">
              <div class="col-md-6"><!--Team1-->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">{{$match->team1->name}}</h3>
                  </div>
                  <div class="box-body">
                    <div class="alert alert-warning" id="team1-alert">
                      <i class="icon fa fa-warning"></i> <span>Please Select 11 More Players </span>
                          
                    </div>
                    <input type="hidden" name="team1Selected" id="team1Selected" value="" />
                    <input type="hidden" id="team1AlreadySelected"  value="{{$selected_team_1}}" />
                    <ul class="todo-list">
                    
                      @foreach($tou_team_1 as $player)
                        <li>
                          
                          <!-- checkbox -->
                          <input type="checkbox" id="team1_{{$player->id}}" value={{$player->id}} class="team1Players" name="team1Players[]">
                          <!-- todo text -->
                          <span class="text">{{$player->nameWithInits()}}</span>
                          
                        </li>
                      @endforeach
                      </ul>
                    <br />
                    <div class="row form-group">
                      <div class="col-sm-6"> 
                        Captain
                      </div> 
                      <div class="col-sm-6">
                          <select id="team1_cap" name="team1_cap" class="form-control">
                            <option value="0">--Select Player--</option> 
                            @foreach ($tou_team_1 as $player)
                              <option value={{$player->id}}>{{$player->nameWithInits()}}</option> 
                            @endforeach
                          </select>
                      </div>    
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-6"> 
                        Wicket Keeper
                      </div> 
                      <div class="col-sm-6">
                          <select id="team1_wk" name="team1_wk" class="form-control">
                            <option value="0">--Select Player--</option>
                            @foreach ($tou_team_1 as $player)
                              <option value={{$player->id}}>{{$player->nameWithInits()}}</option> 
                            @endforeach 
                          </select>
                      </div>    
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-6"> 
                        12th Man
                      </div> 
                      <div class="col-sm-6">
                          <select id="team1_12thMan" name="team1_12thMan" class="form-control">
                            <option value="0">--Select Player--</option>
                            @foreach ($tou_team_1 as $player)
                              <option value={{$player->id}}>{{$player->nameWithInits()}}</option> 
                            @endforeach
                          </select>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6"> <!--Team2-->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">{{$match->team2->name}}</h3>
                  </div>
                  <div class="box-body">
                    <div class="alert alert-warning" id="team2-alert">
                      <i class="icon fa fa-warning"></i> <span>Please Select 11 More Players </span>
                          
                    </div>
                    <input type="hidden" name="team2Selected" id="team2Selected" value="" />
                    <input type="hidden" id="team2AlreadySelected"  value="{{$selected_team_2}}" />
                    <ul class="todo-list">
                      @foreach($tou_team_2 as $player)
                        <li>
                          
                          <!-- checkbox -->
                          <input type="checkbox" id="team2_{{$player->id}}" value={{$player->id}} class="team2Players" name="team2Players[]">
                          <!-- todo text -->
                          <span class="text">{{$player->nameWithInits()}}</span>
                          
                        </li>
                      @endforeach
                      </ul>
                    <br />
                    <div class="row form-group">
                      <div class="col-sm-6"> 
                        Captain
                      </div> 
                      <div class="col-sm-6">
                          <select id="team2_cap" name="team2_cap" class="form-control">
                            <option value="0">--Select Player--</option> 
                            @foreach ($tou_team_2 as $player)
                              <option value={{$player->id}}>{{$player->nameWithInits()}}</option> 
                            @endforeach
                          </select>
                      </div>    
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-6"> 
                        Wicket Keeper
                      </div> 
                      <div class="col-sm-6">
                          <select id="team2_wk" name="team2_wk" class="form-control">
                            <option value="0">--Select Player--</option>
                            @foreach ($tou_team_2 as $player)
                              <option value={{$player->id}}>{{$player->nameWithInits()}}</option> 
                            @endforeach 
                          </select>
                      </div>    
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-6"> 
                        12th Man
                      </div> 
                      <div class="col-sm-6">
                          <select id="team2_12thMan" name="team2_12thMan" class="form-control">
                            <option value="0">--Select Player--</option>
                            @foreach ($tou_team_2 as $player)
                              <option value={{$player->id}}>{{$player->nameWithInits()}}</option> 
                            @endforeach
                          </select>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>
          </div>          
        </div>
        
        
        
        <div class="box-footer">
          <div class="alert alert-danger" id="errors">
            <i class="icon fa fa-warning"></i> Errors <br />
            <ul id="errorsList">
            </ul>                         
          </div>
          <br />
          <button id="frmSubmit" type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>   
      </div>
    </section>
    
</div>
@endsection()

@section('page_specific_scripts')
<script> //team1 script
  $(document).ready(function(){
    $("#toss-alert").hide();
    $("#errors").hide();
    $('.team1Players').click(function() {
      if ($(this).is(':checked')) {                
        var len = $(".team1Players:checked").length;
        if(len>11){
          $(this).attr('checked',false);
          //alert("Already selected 11 Palyers");
        }
        else{
          $(this).parent().css({"background-color":"#d2d6de"});
        }
      }
      else{
        $(this).parent().css({"background-color":"#f4f4f4"});
      }
      $.fn.updateTeam1Counter();
    });
    $.fn.updateTeam1Counter=function () {
          var len = $(".team1Players:checked").length;
          if(len==11)
          {
            $("#team1-alert span").text("Already Selected");
            $("#team1-alert").attr("class", "alert alert-success");
          }
          else if(len==10)
          {
            $("#team1-alert span").text("Please Select 1 More Player");
            $("#team1-alert").attr("class", "alert alert-warning");
          }
          else{
            $("#team1-alert span").text("Please Select "+(11-len)+" More Players");
            $("#team1-alert").attr("class", "alert alert-warning");
          }
    } 
  });
</script>
<script>//team2 script
  $(document).ready(function(){
    $('.team2Players').click(function() {
      if ($(this).is(':checked')) {                
        var len = $(".team2Players:checked").length;
        if(len>11){
          $(this).attr('checked',false);
         // alert("Already selected 11 Palyers");
        }
        else{
          $(this).parent().css({"background-color":"#d2d6de"});
        }
      }
      else{
        $(this).parent().css({"background-color":"#f4f4f4"});
      }
      $.fn.updateTeam2Counter();
    });
    $.fn.updateTeam2Counter=function () {
          var len = $(".team2Players:checked").length;
          if(len==11)
          {
            $("#team2-alert span").text("Already Selected");
            $("#team2-alert").attr("class", "alert alert-success");
          }
          else if(len==10)
          {
            $("#team2-alert span").text("Please Select 1 More Player");
            $("#team2-alert").attr("class", "alert alert-warning");
          }
          else{
            $("#team2-alert span").text("Please Select "+(11-len)+" More Players");
            $("#team2-alert").attr("class", "alert alert-warning");
          }
    } 
    $.fn.updateTeam2Counter();
  });
</script>
<script>
  $(document).ready(function(){
    var matchResult = $.parseJSON($('#matchResultsDetails').val());
    var match = $.parseJSON($('#matchDetails').val());
    var team1AlreadySelected =$.parseJSON($('#team1AlreadySelected').val());  
    var team2AlreadySelected =$.parseJSON($('#team2AlreadySelected').val()); 
    
          
                   
          $('#umpire1').val((match["umpire1"]==null)? 0 : match["umpire1"]);
          
          $('#umpire2').val((match["umpire2"]==null)? 0 : match["umpire2"]);
          $('#scorer').val((match["scorer_id"]==null)? 0 : match["scorer_id"]);
          
          var tossTeam = matchResult["tossTeam"];
          if(match["team1_id"]==tossTeam){
            $("#tossTeam1").prop("checked", true);
          }
          else if(match["team2_id"]==tossTeam){
            $("#tossTeam2").prop("checked", true);
          }

          var tossDec = matchResult["tossDecision"];
          if(tossDec=="bat"){
            $("#electBat").prop("checked", true);
          }
          else if(tossDec=="field"){
            $("#electField").prop("checked", true);
          }

          for (i = 0; i < team1AlreadySelected.length; i++) { 

            $("#team1_"+team1AlreadySelected[i]["player_id"]).prop("checked", true);

            if(team1AlreadySelected[i]["isCaptain"]=="1"){
                $("#team1_cap").val(team1AlreadySelected[i]["player_id"]);                         
            }
            if(team1AlreadySelected[i]["isWK"]=="1"){
                $("#team1_wk").val(team1AlreadySelected[i]["player_id"]);                         
            }
            if(team1AlreadySelected[i]["is12thMan"]=="1"){
                $("#team1_12thMan").val(team1AlreadySelected[i]["player_id"]);
                $("#team1_"+team1AlreadySelected[i]["player_id"]).prop("checked", false);                         
            }
          }

          for (i = 0; i < team2AlreadySelected.length; i++) { 
            $("#team2_"+team2AlreadySelected[i]["player_id"]).prop("checked", true);

            if(team2AlreadySelected[i]["isCaptain"]=="1"){
                $("#team2_cap").val(team2AlreadySelected[i]["player_id"]);                         
            }
            if(team2AlreadySelected[i]["isWK"]=="1"){
                $("#team2_wk").val(team2AlreadySelected[i]["player_id"]);                         
            }
            if(team2AlreadySelected[i]["is12thMan"]=="1"){
                $("#team2_12thMan").val(team2AlreadySelected[i]["player_id"]);
                $("#team2_"+team2AlreadySelected[i]["player_id"]).prop("checked", false);                          
            }
          }
          
          $('#frmSubmit').click(function() {
            $("#errorsList").empty();
            var len1 = $(".team1Players:checked").length;
            var len2 = $(".team2Players:checked").length;
            
            var isValid=true;
            if(!$('#tossTeam1').is(':checked')&&!$('#tossTeam2').is(':checked')){
                //$("#toss-alert").show();
                $("#errorsList").append("<li>Select toss decision</li>");
                $("#errors").show();
                isValid=false;
            }
            else if (!$('#electBat').is(':checked')&&!$('#electField').is(':checked')){
                //$("#toss-alert").show();
                $("#errorsList").append("<li>Select toss decision</li>");
                $("#errors").show();
                isValid=false;               
            }
            if(len1!=11){
               isValid=false;
               $("#errorsList").append("<li>Select playing 11 of Team 1</li>");
                $("#errors").show();
            }
            if(len2!=11){
              isValid=false;
               $("#errorsList").append("<li>Select playing 11 of Team 2</li>");
                $("#errors").show();
            }
            var team1Cap=$("#team1_cap").val();
            var team2Cap=$("#team2_cap").val();
            if(team1Cap!="0"){
                if(!$('#team1_'+team1Cap).is(':checked')){
                  $("#errorsList").append("<li>Team 1 captain should be amoung selected 11 players</li>");
                  $("#errors").show();
                  isValid=false;
                }
            }
            if(team2Cap!="0"){
                if(!$('#team2_'+team2Cap).is(':checked')){
                  $("#errorsList").append("<li>Team 2 captain should be amoung selected 11 players</li>");
                  $("#errors").show();
                  isValid=false;
                }
            }

            var team1WK=$("#team1_wk").val();
            var team2WK=$("#team2_wk").val();
            if(team1WK!="0"){
                if(!$('#team1_'+team1WK).is(':checked')){
                  $("#errorsList").append("<li>Team 1 wicket keeper should be amoung selected 11 players</li>");
                  $("#errors").show();
                  isValid=false;
                }
            }
            if(team2WK!="0"){
                if(!$('#team2_'+team2WK).is(':checked')){
                  $("#errorsList").append("<li>Team 2 wicket keeper should be amoung selected 11 players</li>");
                  $("#errors").show();
                  isValid=false;
                }
            }

            var team1_12=$("#team1_12thMan").val();
            var team2_12=$("#team2_12thMan").val();
            if(team1_12!="0"){
                if($('#team1_'+team1_12).is(':checked')){
                  $("#errorsList").append("<li>Team 1 Twelfth Man should not be amoung selected 11 players</li>");
                  $("#errors").show();
                  isValid=false;
                }
            }
            if(team2_12!="0"){
                if($('#team2_'+team2_12).is(':checked')){
                  $("#errorsList").append("<li>Team 2 Twelfth Man should not be amoung selected 11 players</li>");
                  $("#errors").show();
                  isValid=false;
                }
            }
            return isValid;
          });
          function updateTeam1Count(){
            var len = $(".team1Players:checked").length;
            if(len==11)
            {
              $("#team1-alert span").text("Already Selected");
              $("#team1-alert").attr("class", "alert alert-success");
            }
            else if(len==10)
            {
              $("#team1-alert span").text("Please Select 1 More Player");
              $("#team1-alert").attr("class", "alert alert-warning");
            }
            else{
              $("#team1-alert span").text("Please Select "+(11-len)+" More Players");
              $("#team1-alert").attr("class", "alert alert-warning");
            }
          }
          function updateTeam2Count(){
            var len = $(".team2Players:checked").length;
            if(len==11)
            {
              $("#team2-alert span").text("Already Selected");
              $("#team2-alert").attr("class", "alert alert-success");
            }
            else if(len==10)
            {
              $("#team2-alert span").text("Please Select 1 More Player");
              $("#team2-alert").attr("class", "alert alert-warning");
            }
            else{
              $("#team2-alert span").text("Please Select "+(11-len)+" More Players");
              $("#team2-alert").attr("class", "alert alert-warning");
            }
          }
          updateTeam1Count();
          updateTeam2Count();
          
  });
</script>
@endsection()
