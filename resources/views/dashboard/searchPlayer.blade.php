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
            <label>Search  : <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Reg No.."></label>
              <table id="playersDataTable" class="table table-bordered table-striped" pagesize="25">
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
   <script src="code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <!-- DataTables -->
    
   
 <script>
  $(function () {
    $('#playersDataTable').DataTable();

  });
  
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("playersDataTable");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
$(document).ready(function() {
    $('#playersDataTable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>

@endsection()