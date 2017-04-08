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
    
    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
                <i class="	fa fa-newspaper-o"></i>
                <h3 class="box-title">Match Details</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <!--Match Summary-->
              <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="	fa fa-newspaper-o"></i>
                    <h3 class="box-title">Match Summary</h3>
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
              </div><!--End of Match Summary-->
            </div>
          </div>
          <form id="frmMatchResult" name="frmMatchResult" method="POST" action="/matchResult/{{$match->id}}/basicDetails">
          {{csrf_field()}}
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
                        <label class="radio-inline"><input  type="radio" value={{$match->team1->id}}  name="toss">{{$match->team1->abbrevation}}</label>
                      </div>
                      <div class="col-xs-6">
                        <label class="radio-inline"><input  type="radio" value={{$match->team2->id}} name="toss">{{$match->team2->abbrevation}}</label>
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
                        <label class="radio-inline"><input type="radio"  value="bat" name="elect">Bat</label>
                      </div>
                      <div class="col-xs-6">
                        <label class="radio-inline"><input type="radio" value="field"  name="elect">Field</label>
                      </div>
                    </div>
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
                      <select name="umpire1" class="form-control">
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
                      <select name="umpire2" class="form-control">
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
                      <select name="scorer" class="form-control">
                        <option value="0" >--Select Scorer--</option>
                        @foreach($scorers as $scorer)
                          <option value={{$scorer->id}}>{{$scorer->getFullName()}}</option>
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
                    <ul class="todo-list">
                      @foreach($tou_team_1 as $player)
                        <li>
                          
                          <!-- checkbox -->
                          <input type="checkbox" value={{$player->id}} class="team1Players" name="team1Players[]">
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
                          <select name="team1_cap" class="form-control">
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
                          <select name="team1_wk" class="form-control">
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
                          <select name="team1_12thMan" class="form-control">
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
                    <ul class="todo-list">
                      @foreach($tou_team_2 as $player)
                        <li>
                          
                          <!-- checkbox -->
                          <input type="checkbox" value={{$player->id}} class="team2Players" name="team2Players[]">
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
                          <select name="team2_cap" class="form-control">
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
                          <select name="team2_wk" class="form-control">
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
                          <select name="team2_12thMan" class="form-control">
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
          <div class="row">
          <button id="frmSubmit" type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
        
              
        
      </div>   
    </section>
    
</div>
@endsection()

@section('page_specific_scripts')
<script> //team1 script
  $(document).ready(function(){
    $('.team1Players').click(function() {
      if ($(this).is(':checked')) {                
        var len = $(".team1Players:checked").length;
        if(len>11){
          $(this).attr('checked',false);
          alert("Already selected 11 Palyers");
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
          alert("Already selected 11 Palyers");
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
  });
</script>

@endsection()
