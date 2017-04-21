@extends('layout_admin')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Schedule Matches
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!--Start of add rounds-->
    <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Schedule Match</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/setMatch">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                  <label for="tournamentName">Tournament</label>
                    <select class="form-control" name="tournamentID" id="tournamentID" data-parsley-required="true">
                    <option value="">Select a tournament</option>
                    @foreach ($tournaments as $tr) 
                    {
                        <option value="{{ $tr->id }}">{{ $tr->name }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                </div>
                 <div class="col-md-2">
                <div class="form-group">
                  <label for="pool">Format</label>
                    <select class="form-control" name="format" id="format" data-parsley-required="true">
                    <option value="">Select format</option>
                    @foreach ($tournaments as $tr) 
                    {
                        <option value="{{ $tr->format }}">{{ $tr->format }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                  <label for="pool">Pool</label>
                    <select class="form-control" name="poolID" id="poolID" data-parsley-required="true">
                    <option value="">Select a pool</option>
                    @foreach ($pools as $pl) 
                    {
                        <option value="{{ $pl->id }}">{{ $pl->name }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
                  <label for="matchName">Name</label>
                  <input type="text" class="form-control" id="matchName" name="matchName" placeholder="First ODI">
                  </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                    <label for="venue">Venue</label>
                  <input type="text" class="form-control" id="venue" name="venue" placeholder="Ragama Cricket Ground">
                </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                    <label for="team1">Team 1</label>
                  <select class="form-control" name="team1" id="team1" data-parsley-required="true">
                    <option value="">Select a team</option>
                    @foreach ($teams as $tm) 
                    {
                        <option value="{{ $tm->id }}">{{ $tm->name }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                  </div>
                  
                  <div class="col-md-3">
                <div class="form-group">
                    <label for="team2">Team 2</label>
                  <select class="form-control" name="team2" id="team2" data-parsley-required="true">
                    <option value="">Select a team</option>
                    @foreach ($teams as $tm) 
                    {
                        <option value="{{ $tm->id }}">{{ $tm->name }}</option>
                    }
                    @endforeach
                    </select>
                </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                <label>Start Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="startDate" id="startDate">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                 <div class="col-md-3">
                <div class="form-group">
                <label>End Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="endDate" id="endDate">
                </div>
                <!-- /.input group -->
              </div>
                  </div>
                </div>        
              </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Set Match</button>
                </div>   
              </div>
            </form>
            </div>
          </section>
           <!--End of add rounds-->

           <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Matches</h3>
            </div>
    <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 95px;">Tournament</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 126px;">Match</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 116px;">Format</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">Team 1</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">Team 2</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">Venue</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 57px;"></th></tr>
                </thead>
                <tbody>
                  @foreach ($matches as $match)
                  
                 <tr>

                  <td>{{ $match->tournament_id }} </td>
                
                  <td>{{ $match->name }}</td>
                 
                  <td>{{ $match->format }}</td>
                    
                  <td>{{ $match->team1_id }}</td>

                  <td>{{ $match->team2_id }}</td>

                  <td>{{ $match->venue }}</td>
                  <td>
                    <a class="btn btn-app bg-olive" href="/matchResultsMain/{{$match->id}}">
                        <i class="fa fa-edit"></i> Score
                    </a>   
                  </td>
              
                </tr>
                @endforeach
                </tbody>
              </table>
              </div>
              </div>
            </div>
    </div>

    </div>
    </section>
    <!--<div>
      <label>{{$matches}}</label>
      </div>-->

</div>
@endsection()

@section('page_specific_scripts')
<script src="bower_components/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>

<!--<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="tournamentName"]').on('change', function() {
            var tournamentID = $(this).val();
            // alert(tournamentID);
            if(tournamentID) {
                $.ajax({
                    url: '/matchSchedulePoolsDropDown/'+tournamentID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="pool"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="pool"]').append('<option value="'+ value.name +'">'+ value.name +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="pool"]').empty();
            }
        });
    });
</script>-->

<script>
  $(function () {

    //Date picker
    $('#startDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $('#endDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
  });
</script>  

<!-- DataTables -->
    <script src="bower_components/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="bower_components/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
  <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection()