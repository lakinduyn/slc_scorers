@extends('layout_admin')
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
                  <th>Age Category</th>
                  <th>Division</th>
                  <th>Institute</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($team as $teamData) : ?>
                 <tr>

                  <td><?= $teamData->name ?> </td>

                 
                  <td><?= $teamData->ageCat ?></td>

                  
                  <td><?= $teamData->div ?></td>

                    
                  <td><?= $teamData->institute_id ?></td>

                  <td> <button type="button" class="btn btn-block btn-primary"><a href = 'editteamteam/{{$teamData->id }}'>Edit</a></button></td>
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