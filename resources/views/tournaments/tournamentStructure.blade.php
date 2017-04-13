@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tournament Structure
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
              <h3 class="box-title">Add Rounds and Pools</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/tournamentRounds">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                  <label for="tournamentName">Tournament</label>
                    <select class="form-control" name="tournamentName" id="tournamentName" data-parsley-required="true">
                    @foreach ($tournaments as $tr) 
                    {
                        <option value="{{ $tr->name }}">{{ $tr->name }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                  <label for="round">Round</label>
                  <input type="text" class="form-control" id="roundName" name="roundName" placeholder="1">
                </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                  <label for="pool">Pool</label>
                  <input type="text" class="form-control" id="poolName" name="poolName" placeholder="A">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="teams">Teams</label>
                  <ul class="todo-list">  
                        @foreach ($teams as $team) 
                        <li>                      
                          <!-- checkbox -->
                          <input type="checkbox" value="{{ $team->name }}" class="" name="teamName[]">
                          <!-- todo text -->
                          <span class="text">{{ $team->name }}</span>
                        </li>
                        @endforeach
                        <!--<input type="checkbox" value="{{ $team->name }}" class="" name="teamName"> {{ $team->name }}-->
                </div>
                </div>
                  
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Add Round</button>
                </div>
                <div class="col-md-4">
                <button type="submit" formmethod="POST" formaction="/roundPools" class="btn btn-primary">Add Pool</button>
                </div>
                <div class="col-md-4">
                <button type="submit" formmethod="POST" formaction="/poolTeams" class="btn btn-primary">Add Teams</button>
                </div>
              </div>
            </div></form>
          </div>
          </section>
   
</div>
@endsection()

<!--@section('page_specific_scripts')
<script>
document.getElementById("tournamentLogo").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
@endsection()-->