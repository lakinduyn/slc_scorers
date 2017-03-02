@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Player Registration
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
      <h3 class="box-title">Player Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/players" >
            {{csrf_field() }}
              <div class="box-body">
               <div class="row">
              <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              <label>General Details</label><br><br>
               <div class="form-group">
                  <label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
              </div>
              </div>
                  <div class="form-group">
                  <label for="inputotherName" class="col-sm-2 control-label">other Names</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="otherNames" name="otherNames" placeholder="other Names">
                  </div></div>

                <div class="form-group">
                <label for="inputLastName" class="col-sm-2 control-label">NIC number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="NICnumber" name="NICnumber" placeholder="NIC number-e.g 123456789v">
                  </div>
                  </div>
                 <div class="form-group">
                  <label for="inputContact" class="col-sm-2 control-label">Contact No</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="ContactNumber" placeholder="ContactNumber">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputContact" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                 <input type="email" class="form-control" id="Email" placeholder="Email address">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPicture" class="col-sm-2 control-label">Image</label>
                   <div class="col-sm-10">
                 <input type="file" id="Inputimage">
                 </div>
                 </div>
                </div>
                </div>
                </div>
                 
              
                <div class="col-md-6">
                <div class="box box-primary">
                 <div class="box-header with-border">

                <label>Player Details</label><br><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Height</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="Height" placeholder="Height">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Weight</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="Weight" placeholder="Weight">
                  </div>
                  </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Player Role</label>
                <div class="col-sm-10">
                <select class="form-control" style="width: 100%;" id="playerRole">
                  <option selected="selected">Batsman</option>
                  <option>Bowler</option>
                  <option>All Rounder</option>
                </select>
              </div>
              </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Batting Style</label>
                  <div class="col-sm-10">
                <select class="form-control" style="width: 100%;" id="battingStyle">
                  <option selected="selected">Right Hand</option>
                  <option>Left hand</option>
                  
                </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bowling Style</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="BowlingStyle" placeholder="Bowling Style">
                  </div>
                  </div>
                </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Register</button>
                </form>
              </div>
              </div>
              <!-- /.bo
            
   

    </section>
    <!-- /.content -->
</div>
@endsection()