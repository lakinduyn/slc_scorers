@extends('layout_admin')


@section('page_specific_css')

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/adminlte/plugins/datatables/dataTables.bootstrap.forEditInstitutes.css">

@endsection

@section('content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Institutes
        <small>Optional title here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <!--h3 class="box-title">Data Table With Full Features</h3-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="col-xs-12">
              <table id="institutesDataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>ContactNo</th>
                  <th>Email</th>
                  <th>Address</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ins as $insData) : ?>
                 <tr>

                  <td><a class="btn btn-app" href="/editInstitute/{{$insData->id}}/edit/"><i class="fa fa-edit"></i> Edit</a>
                  <?= $insData->name ?> </td>

                 
                  <td><?= $insData->type ?></td>

                  
                  <td><?= $insData->contactNo ?></td>

                    
                  <td><?= $insData->email ?></td>

                  <td><?= $insData->address ?></td>
              
                </tr>

                <?php endforeach; ?>
                </tbody>

            </table>
            </div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->
    </section>

@endsection()

@section('page_specific_scripts')

    <!-- DataTables -->
    <script src="bower_components/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="bower_components/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script> 
        $(document).ready(function(){
        $('#institutesDataTable').DataTable();
});</script>
@endsection()