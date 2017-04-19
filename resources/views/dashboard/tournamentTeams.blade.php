@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Teams to Tournament
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
              <h3 class="box-title">TournamentDetails</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <form class="form-horizontal" method="POST" action="/tournamentTeam" files="true" 
         enctype="multipart/form-data" onSubmit="validate()";>             
            {{csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
               
                 
                  <div class="form-group">
                  <label for="teamId" class="col-sm-3 control-label">Tournament Name</label>
                  <div class="col-sm-9">
                  <select class="form-control" style="width: 100%;" id="tournamentName" name="tournamentID" onChange="gettournamentName(this)";>
                  <option selected="selected" value="0">Select Tournament</option>
                 <?php foreach ($tm as $tournaments) : ?>
                 
                  <option value="<?= $tournaments->id ?>"><?= $tournaments->name ?></option>
                   <?php endforeach; ?>
                </select><br>
                  </div>
                  </div>
                  </div>
                <div class="col-md-3">
                  <div class="form-group">
                  <button type="submit" class="btn btn-info pull-right" ;>Register</button>
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
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 95px;">Team ID</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 126px;">Team Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 116px;">Age Category</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">Division</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 57px;"></th></tr>
                </thead>
                <tbody>
                  <?php foreach ($teams as $tm) : ?>
                 <tr>

                  <td><?= $tm->id ?> </td>
                
                  <td><?= $tm->name ?></td>
                 
                  <td><?= $tm->ageCat ?></td>
                    
                  <td><?= $tm->div ?></td>

                  <td>
                    <div class="checkbox">
                  <label>
                    <input type="checkbox" id="add" name="add[]" value="{{ $tm->id}}"> ADD
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