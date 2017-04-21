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

@endsection()