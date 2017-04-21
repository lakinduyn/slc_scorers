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
            <form class="form-horizontal" method="POST" action="/players" files="true" enctype="multipart/form-data">
            {{csrf_field() }}
              <div class="box-body">
               <div class="row">
              <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              <label>General Details</label><br><br>
              <div class="form-group">
                  <label for="regNoe" class="col-sm-3 control-label">Registration No</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required id="registrationNo" name="registrationNo" placeholder="Reg123">
              </div>
              </div>
              <div class="form-group">
                  <label for="inputLastName" class="col-sm-3 control-label">NIC</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required id="nic" name="nic" placeholder="123456789v">
              </div>
              </div>
               <div class="form-group">
                  <label for="inputLastName" class="col-sm-3 control-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required id="lastName" name="lastName" placeholder="Last Name">
              </div>
              </div>
              <div class="form-group">
                  <label for="inputLastName" class="col-sm-3 control-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" required id="firstName" name="firstName" placeholder="firstName">
              </div>
              </div>
                  <div class="form-group">
                  <label for="inputotherName" class="col-sm-3 control-label">Use Names</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="useName" name="useName" placeholder="useName">
                  </div></div>
                  <div class="form-group">
                <label for="inputLastName" class="col-sm-3 control-label">Date of Birth</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="dob" name="dob">
                  </div>
                  </div>

                
                 <div class="form-group">
                  <label for="inputContact" class="col-sm-3 control-label">Contact No</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="ContactNumber" >
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputContact" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                 <input type="email" class="form-control"  id="Email" placeholder="Email address">
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
                  <label for="image" class="col-sm-3 control-label">Image</label>
                   <div class="col-sm-9">
                 <input type="file" id="image" name="image" value="image" accept="image/*">
                 <img id="image" style="width:70px;height:70px"; />
                 

                 </div>
                 </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Height</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="height" name="height" placeholder="height">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Weight</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="weight" name="weight" placeholder="weight">
                  </div>
                  </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Player Role</label>
                <div class="col-sm-9">
                <select class="form-control" style="width: 100%;" id="playerRole" name="playerRole">
                  <option value="Batsman" selected="selected">Batsman</option>
                  <option value="Bowler">Bowler</option>
                  <option value="All Rounder">All Rounder</option>
                </select>
              </div>
              </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Batting Style</label>
                  <div class="col-sm-9">
                <select class="form-control" style="width: 100%;" id="battingStyle" name="battingStyle">
                  <option selected="selected">Right Hand</option>
                  <option>Left hand</option>
                  
                </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Bowling Style</label>
                  <div class="col-sm-9">
                 <select class="form-control" style="width: 100%;" id="bowlingStyle" name="bowlingStyle">
                  <option selected="selected">Fast Bowler</option>
                  <option>Spinner</option>
                 </select>
                  </div>
                  </div>
                </div>
              </div>
             
              </div>
            </div><!-- /.box -->
          </div<!-- /.col -->
          
          
        </div><!-- /.row -->
                  <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Register</button>
                </form>
              </div>
              </div>
              <!-- /.bo -->
            
   

    </section>
    <!-- /.content -->
</div>


@endsection()
@section('page_specific_scripts')
<script>
document.getElementById("image").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
   function getteamName(selectObject)
            {
                document.getElementById("teamId").value=selectObject.value;
            };
          
</script>
<script type="text/javascript">
         
        </script>
@endsection()
