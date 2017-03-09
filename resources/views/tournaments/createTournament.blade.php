@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Tournament
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
              <h3 class="box-title">Basic Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/tournaments">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="tournamentName">Name</label>
                  <input type="text" class="form-control" id="tournamentName" name="tournamentName" placeholder="Enter tournament name">
                </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label>Format</label>
                  <select class="form-control">
                    <option>5 Days</option>
                    <option>3 Days</option>
                    <option>50 Overs</option>
                    <option>Twenty20</option>
                    <option>option 5</option>
                  </select>
                </div>
                </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label>Level</label>
                  <select class="form-control">
                    <option>Under 19</option>
                    <option>Club</option>
                    <option>Mercantile</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label>Division</label>
                  <select class="form-control">
                    <option>Division 1</option>
                    <option>Division 2</option>
                    <option>Division 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                </div>
                  
                <div class="col-md-4">
  <div class="form-group">
                  <label for="exampleInputFile">Tournament Logo</label>
                  <input type="file" id="exampleInputFile">

                  <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>
</div>
                <!--<div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>-->
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div></form>
          </div>
          </section>
   
</div>
@endsection()