@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Scorer
        <small>Optional description</small>
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
            <form class="form-horizontal" method="POST" action="/scorers">

            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
            {{csrf_field() }}

             <div class="box-body">
               <div class="row">
              <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              
              <label>General Details</label><br><br>
               <div class="form-group">
                  <label for="ScorerName" class="col-sm-2 control-label" >Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="">
                  </div>
               </div>
                <div class="form-group">
                  <label for="ScorerName" class="col-sm-2 control-label" >Other Names</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="ScorerName" class="col-sm-2 control-label" >NIC</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nic" name="nic" placeholder="">
                  </div>
                  </div>
                <div class="form-group">
                  <label for="inputPicture" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                 <input type="file" id="scorerImage" name="scorerImage">
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
                    <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputemail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="instituteEmail" name="email" placeholder="">
                  </div>
                  </div>
              
               <div class="form-group">
                  <label for="inputAddress" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="instituteAddress" name="address" placeholder="">
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