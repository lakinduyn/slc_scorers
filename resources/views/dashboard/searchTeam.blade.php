@extends('layout_admin')

@section('content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Team
        <small></small>
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>-->
    </section>
    
    <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <!--<h3 class="box-title">Schedule Match</h3>-->
            </div>
    <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 95px;">Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 126px;">Abbreviation</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 116px;">Institute</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">Age Category</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 57px;">Dvision</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 57px;">Edit</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($team as $tm) : ?>
                 <tr>

                  <td><?= $tm->name ?> </td>
                
                  <td><?= $tm->abbrevation ?></td>
                  
                  <td><?= $tm->institute_id ?></td>
                    
                  <td><?= $tm->ageCat?></td>

                  <td><?= $tm->div?></td>

                  <td>
                    <a class="btn btn-sm" href='editteamteam/{{$tm->id }}'><i class="fa fa-edit"></i> </a> 
                  </td>
              
                </tr>

                <?php endforeach; ?>
                </tbody>
              </table>
              </div>
              </div>
            </div>
    </div>

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

<script type="text/javascript" charset="utf-8">
                    function deleteConfirm()
                    {
                        if(confirm("! Warning you are about to remove a team from the system. Are you sure do you want to remove the team?"))
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
</script>

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Team Registration
        <small>Register the Teams</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

                <div class="col-md-12">
                <div class="box box-primary">
                 <div class="box-header with-border">

                <label>View Team Details</label><br><br>
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Team Name</th>
                  <th>Abbrevztion</th>
                  <th>Division</th>
                  <th>Institute Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($team as $teamData) : ?>
                 <tr>

                  <td><?= $teamData->name ?> </td>

                 
                  <td><?= $teamData->abbrevation ?></td>

                  
                  <td><?= $teamData->div ?></td>

                    
                  <td><?= $teamData->getInstitute->name?></td>

                  <td> <button type="button" class="btn btn-block btn-primary"><a href = '/editteamteam/{{$teamData->id }}'>Edit</a></button></td>
                  <td><button type="button" class="btn btn-block btn-danger"><a href = 'deleteteam/{{ $teamData->id }}' onclick="return deleteConfirm()">Delete</a></button></td>
              
                 </tr>

                <?php endforeach; ?>

                </tbody>
              </table>
                </div>
                  </div>
                  </div>
                  </div>
                  </div>
                 
              </div>
        
              <!-- /.bo
            
   

    </section>
    <!-- /.content -->
</div>

@endsection()