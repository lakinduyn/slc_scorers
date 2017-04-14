@extends('layout_admin')


@section('page_specific_css')

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/adminlte/plugins/datatables/dataTables.bootstrap.css">

@endsection

@section('content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Players
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
              <table id="playersDataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Registration number</th>
                  <th>NIC</th>
                  <th>First Name</th>
                  <th>Playing Role</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ply as $plyData) : ?>
                 <tr>

                  <td><?= $plyData->regId ?> </td>

                 
                  <td><?= $plyData->nic?></td>

                  
                  <td><?= $plyData->firstName ?></td>

                    
                  <td><?= $plyData->playingRole?></td>
                  <td>
                    <a class="btn btn-sm" href="/players/{{$plyData ->id}}/edit"><i class="fa fa-edit"></i> </a>
                      {{ Form::open(['method' => 'DELETE', 'route' => ['player.destroy', $plyData->id]]) }}
                    {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-sm']) }}
                    {{ Form::close() }}
                    
                  </td>
              
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
        </section>
        

      </div>
      <!-- /.row -->
    

@endsection()

@section('page_specific_scripts')

    <!-- DataTables -->
    <script src="bower_components/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="bower_components/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- DataTables -->
    
   
 <script>
  $(function () {
    $("#playersDataTable").DataTable();

  });
</script>
@endsection()