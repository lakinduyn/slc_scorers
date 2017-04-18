@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Teams to Tournament
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">TournamentDetails</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <form class="form-horizontal" method="POST" action="/tournamentTeam" files="true" 
         enctype="multipart/form-data" onSubmit="validate()";>             
            {{csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
               
                 
                  <div class="form-group">
                  <label for="teamId" class="col-sm-3 control-label">Tournament Name</label>
                  <div class="col-sm-9">
                  <select class="form-control" style="width: 100%;" id="tournamentName" name="tournamentName" onChange="gettournamentName(this)";>
                  <option selected="selected" value="0">Select team</option>
                 <?php foreach ($tm as $tournaments) : ?>
                 
                  <option value="<?= $tournaments->id ?>"><?= $tournaments->name ?></option>
                   <?php endforeach; ?>
                </select><br>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="teamName" class="col-sm-3 control-label">Tournament ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tournamentId" name="tournamentId" readonly="readonly" > 
                </div>
                </div>
              </div>
                <div class="col-md-3">
                  <div class="form-group">
                  <button type="submit" class="btn btn-info pull-right" ;>Register</button>
                </div>
                </div>
                </div>
                </div>
                 <div class="box-body">
                 <label>Add players</label><br>
               <label>Search  : <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Reg No.."></label>
              <table id="playersDataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Team Id</th>
                  <th>Team Name</th>
                  <th>Age category</th>
                  <th>Division</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($teams as $teamData) : ?>
                 <tr>

                  <td><?= $teamData->id ?> </td>

                 
                  <td><?= $teamData->name ?></td>

                  
                  <td><?= $teamData->ageCat ?></td>

                    
                  <td><?= $teamData->div?></td>
                  <td>
                    <div class="checkbox">
                  <label>
                    <input type="checkbox" id="add" name="add[]" value="{{ $teamData->id}}"> ADD
                  </label>
                </div>
                    
                  </td>
              
                </tr>

                <?php endforeach; ?>
                </tbody>

            </table>
            </div>
            <!-- /.box-body -->
                  
                <!--<div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>-->
              </div>
              
              <!-- /.box-body -->
            </div>
            </form>
          </div>
          </div>
         
          </section>
   

</div>
@endsection()

@section('page_specific_scripts')

<script>
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
document.getElementById("image").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
   function gettournamentName(selectObject)
            {
                document.getElementById("tournamentId").value=selectObject.value;
            };
    function validate()
            {
                if(document.getElementById("tournamentName").value=="0") //|| document.getElementByName["add[]"].length == 0)
                {
                    window.alert("Please check inputs");
                    return false;
                }
           
            };
          
</script>
<script type="text/javascript">
         
        </script>
@endsection()