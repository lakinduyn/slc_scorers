@extends('layout_admin')


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
   
            <div class="box box-info">
            <div class="box-header with-border">
      <h3 class="box-title">Team Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/saveteam" >
            {{csrf_field() }}
              <div class="box-body">
               <div class="row">
              <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              <label>General Details</label><br><br>
               <div class="form-group">
                  <label for="inputLastName" class="col-sm-2 control-label">Team Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="teamName" name="teamName" placeholder="Team Name">
              </div>
              </div>
                  <div class="form-group">
                  <label for="inputotherName" class="col-sm-2 control-label">Age Category</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ageCategory" name="ageCategory" placeholder="Age Category">
                  </div></div>

                <div class="form-group">
                <label for="inputLastName" class="col-sm-2 control-label">Division</label>
                  <div class="col-sm-10">
                      <select class="form-control" style="width: 100%;" id="division" name="division">
                  
                  <option selected="selected">0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                </select>
                  </div>
                  </div>
                 <div class="form-group">
                  <label for="inputContact" class="col-sm-2 control-label">Institute</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="institute" name="institute" placeholder="Institute ID">
                  </div>
                  </div>
                 <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Register</button>
                </form>
              </div>
                </div>
                </div>
                </div>
                 
                           
              
                <div class="col-md-6">
                <div class="box box-primary">
                 <div class="box-header with-border">

                <label>View Team Details</label><br><br>
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Team Name</th>
                  <th>Age Category</th>
                  <th>Division</th>
                  <th>Institute</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                           for($i=0;$i<5;$i++)
                           {
                           ?>
                           <tr>
                               
                               <td>hi</td>
                               <td>hi</td>
                               <td>hi</td>
                               <td>hi</td>
                             
                               <td> <button type="button" class="btn btn-block btn-primary">Edit</button></td>
                               <td> <button type="button" class="btn btn-block btn-danger">Delete</button></td>
                           </tr>
                           <?php
                           }
                           ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Team Name</th>
                  <th>Age Category</th>
                  <th>Division</th>
                  <th>Institute</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
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