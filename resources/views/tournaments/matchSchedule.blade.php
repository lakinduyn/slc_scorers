@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Schedule Matches
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
              <h3 class="box-title">Schedule Match</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/setMatch">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                  <label for="tournamentName">Tournament</label>
                    <select class="form-control" name="tournamentName1" id="tournamentName1" data-parsley-required="true">
                    <option value="">Select a tournament</option>
                    
                    </select>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                    <label for="league">Pool</label>
                  <select class="form-control" name="tournamentName1" id="tournamentName1" data-parsley-required="true">
                    <option value="">Select a pool</option>
                    
                    </select>
                </div>
                  </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label for="round">Name</label>
                  <input type="text" class="form-control" id="roundName" name="roundName" placeholder="First ODI">
                  </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                    <label for="league">Venue</label>
                  <input type="text" class="form-control" id="roundName" name="roundName" placeholder="Ragama Cricket Ground">
                </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                    <label for="league">Team 1</label>
                  <select class="form-control" name="tournamentName1" id="tournamentName1" data-parsley-required="true">
                    <option value="">Select a team</option>
                    
                    </select>
                </div>
                  </div>
                  
                  <div class="col-md-3">
                <div class="form-group">
                    <label for="league">Team 2</label>
                  <select class="form-control" name="tournamentName1" id="tournamentName1" data-parsley-required="true">
                    <option value="">Select a team</option>
                    
                    </select>
                </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                <label>Start Date</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker1">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                 <div class="col-md-3">
                <div class="form-group">
                <label>End Date</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker2">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                </div>        
              </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Set Match</button>
                </div>   
              </div>
            </form>
            </div>
          </section>
           <!--End of add rounds-->

</div>
@endsection()

@section('page_specific_scripts')
<script src="bower_components/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
  $(function () {
    // //Initialize Select2 Elements
    // $(".select2").select2();

    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    });
    $('#datepicker2').datepicker({
      autoclose: true
    });
  });
</script>  
@endsection()