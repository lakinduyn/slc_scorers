@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Registration of institute
        <small>(Club/School/University/Mercantile)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
            <div class="box box-info">
            
              <div class="box-header with-border">
      <!--h3 class="box-title"> Institute Registration</h3-->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
             <div class="box-body">
               <div class="row">
              <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              
              <label>General Details</label><br><br>
               <div class="form-group">
                  <label for="instituteName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="instituteName" placeholder="">
                  </div>
                  </div>
               
                <div class="form-group">
                <label for="type" class="col-sm-2 control-label">Type</label>
               <div class="col-sm-10">
                <select class="form-control" style="width: 100%;" id="instituteType">
                  <option selected="selected">Club</option>
                  <option>School</option>
                  <option>University</option>
                  <option>Mercantile</option>
                </select>

                </div>
                </div>
                <div class="form-group">
                  <label for="inputPicture" class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-10">
                 <input type="file" id="logoImage">
                 </div>
                </div>
                </div>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="box box-primary">
            <div class="box-header with-border">
                <label>Contact Details</label><br><br>
              
                 <div class="form-group">
                  <label for="inputContact" class="col-sm-2 control-label">Contact No</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ContactNumber" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputemail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="">
                  </div>
                  </div>
              
               <div class="form-group">
                  <label for="inputAddress" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Address" placeholder="">
                  </div>
                  </div>
                  </div>
                </div>
                </div>
                </div>
                  <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Register</button>
                </div>
                
                </form>
              </div>
              </div>
              <!-- /.bo
            
   

    </section>
    <!-- /.content -->
</div>
@endsection()