@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add player to Tournament Team
        <!--<small>Optional description</small>-->
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>
    <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <!--<h3 class="box-title">Tournament Details</h3>-->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <form class="form-horizontal" method="POST" action="/tournamentTeamPlayer" files="true" enctype="multipart/form-data">             {{csrf_field() }}
            {{csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                 <div class="form-group">
                  <label for="teamId" class="col-sm-3 control-label">Tournament Name</label>
                  <div class="col-sm-9">
                  <select class="form-control" style="width: 100%;" id="tournamentID" name="tournamentID" onChange="gettournamentName(this)";>
                  <option selected="selected" value="">Select team</option>
                 <?php foreach ($tm as $tournament) : ?>
                 
                  <option value="<?= $tournament->id ?>"><?= $tournament->name ?></option>
                   <?php endforeach; ?>
                </select><br>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                 <div class="form-group">
                  <label for="teamId" class="col-sm-3 control-label">Team Name</label>
                  <div class="col-sm-9">
                  <select class="form-control" style="width: 100%;" id="teamID" name="teamID" onChange="getteamName(this)";>
                  <option selected="selected" value="">Select team</option>
                 <?php foreach ($teams as $team) : ?>
                 
                  <option value="<?= $team->id ?>"><?= $team->name ?></option>
                   <?php endforeach; ?>
                </select><br>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                  <button type="submit" class="btn btn-info pull-right">Register</button>
                </div>
                </div>
                </div>
                </div>

                 <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 95px;">Registration No.</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 126px;">First Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 116px;">Last Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">NIC</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 57px;">Playing Role</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 57px;">Add</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($ply as $pl) : ?>
                 <tr>

                  <td><?= $pl->regId ?> </td>
                
                  <td><?= $pl->firstName ?></td>
                  
                  <td><?= $pl->lastName ?></td>
                    
                  <td><?= $pl->nic ?></td>

                  <td><?= $pl->playingRole ?></td>

                  <td>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="add" name="add[]" value="{{$pl ->id}}"> ADD
                      </label>
                    </div>
                  </td>
              
                </tr>

                <?php endforeach; ?>
                </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
         </form>
    </div>
    </section>
  </div>
                 
@endsection()

@section('page_specific_scripts')

    <!-- DataTables -->
    <script src="bower_components/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="bower_components/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
  <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

@endsection()