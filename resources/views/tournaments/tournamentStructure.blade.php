@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Set Tournament
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <!--Start of add rounds-->
    <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Rounds</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/tournamentRounds">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                  <label for="tournamentName">Tournament</label>
                    <select class="form-control" name="tournamentName1" id="tournamentName1" data-parsley-required="true">
                    <option value="">Select a tournament</option>
                    @foreach ($tournaments as $tr) 
                    {
                        <option value="{{ $tr->name }}">{{ $tr->name }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                  <label for="round">Round</label>
                  <input type="text" class="form-control" id="roundName" name="roundName" placeholder="1">
                  </div>
                  </div>
                  <div class="col-md-2">
                <div class="form-group">
                    <label for="league">League</label>
                  <div class="radio">
                      <input type="radio" name="isKnockout" id="league" value="league" checked="">
                  </div>
                </div>
                  </div>
                <div class="col-md-2">
                 <div class="form-group">
                     <label for="knockout">Knockout</label>
                        <div class="radio">
                            <input type="radio" name="isKnockout" id="knockout" value="knockout">
                        </div>
                </div>
                </div>
                </div>        
              </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Add Round</button>
                </div>   
              </div>
            </form>
            </div>
          </section>
           <!--End of add rounds-->

          <!--Add Pools-->
          <section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Pools</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/roundPools">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                  <label for="tournamentName">Tournament</label>
                    <select class="form-control" name="tournamentName2" id="tournamentName2" data-parsley-required="true">
                    <option value="">Select a tournament</option>
                    @foreach ($tournaments as $tr) 
                    {
                        <option value="{{ $tr->id }}">{{ $tr->name }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                  <label for="round">Round</label>
                    <select name="round" class="form-control">
                    <option value="">Select a round</option>
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                  <label for="pool">Pool</label>
                  <input type="text" class="form-control" id="poolName" name="poolName" placeholder="A">
                </div>
                </div>        
              </div>

               <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Add Pool</button>
                </div>   
              </div>
            </div></form>
          </div>
          </section> 
          <!--End of add pools-->

              <!--Add Teams-->
              <section class="content">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Teams</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="/poolTeams">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                      <label for="tournamentName">Tournament</label>
                        <select class="form-control" name="tournamentName3" id="tournamentName3" data-parsley-required="true">
                        <option value="">Select a tournament</option>
                        @foreach ($tournaments as $tr) 
                        {
                            <option value="{{ $tr->id }}">{{ $tr->name }}</option>
                        }
                        @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                      <label for="round">Round</label>
                    <select name="round2" class="form-control">
                      <option value="">Select a round</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                      <label for="round">Pool</label>
                      <select name="pool" class="form-control">
                        <option value="">Select a pool</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label for="teams">Teams</label>
                      <ul class="todo-list">  
                            @foreach ($teams as $team) 
                            <li>                      
                              <!-- checkbox -->
                              <input type="checkbox" value="{{ $team->name }}" class="" name="teamName[]">
                              <!-- todo text -->
                              <span class="text">{{ $team->name }}</span>
                            </li>
                            @endforeach
                    </div>
                    </div>        
                  </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Add Teams</button>
                </div>   
              </div>
            </div></form>
          </div>
          </section>
           <!--End of add teams-->

</div>

@endsection()

@section('page_specific_scripts')
<!--Round drop down in Add Pools-->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="tournamentName2"]').on('change', function() {
            var tournamentID = $(this).val();
            if(tournamentID) {
                $.ajax({
                    url: '/roundsDropDown/'+tournamentID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="round"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="round"]').append('<option value="'+ value.name +'">'+ value.name +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="round"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Round drop down in Add Teams
        $('select[name="tournamentName3"]').on('change', function() {
            var tournamentID = $(this).val();
            if(tournamentID) {
                $.ajax({
                    url: '/roundsDropDown/'+tournamentID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="round2"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="round2"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="round2"]').empty();
            }
        });

        // Pool drop down in Add Teams
        $('select[name="round2"]').on('change', function() {
            var roundID = $(this).val();
            if(roundID) {
                $.ajax({
                    url: '/poolsDropDown/'+roundID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="pool"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="pool"]').append('<option value="'+ value.name +'">'+ value.name +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="pool"]').empty();
            }
        });

    });
</script>
@endsection()