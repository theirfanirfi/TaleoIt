@extends('client.clientlayout')
@section('content')
<noscript>
        <div class="alert alert-block col-md-12">
            <h4 class="alert-heading">Warning!</h4>
    
            <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                enabled to use this site.</p>
        </div>
    </noscript>
    
    <div id="content" class="col-lg-10 col-sm-10">
        <!-- content starts -->
        
    
    <div>
     <!--  <ul class="breadcrumb">
  <li>
        <a href="#">Submitted Forms</a>
    </li> 
    </ul>-->
    </div>
    
    
    <div class="row">
            <div class="box col-md-12">
            <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i>Hired Candidates</h2>
        
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
             @if(session('key'))   
            <div class="alert alert-{{Session('key')}}">{{Session('msg')}}</div>
            @endif
            
            <table style="overflow-x: scroll;overflow:x;table-layout: fixed;" class="table table-striped table-bordered bootstrap-datatable datatable ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>State Region</th>
                <th>Country</th>
                <th>Status</th>
                <th>Uni Name</th>
                <th>Change Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($forms as $f)
            <tr>
            <td>{{$f->id}}</td>
            <td><a href="{{route('app',['id' => $f->id])}}">{{$f->firstname. " ".$f->lastname}}</a></td>
            <td class="center">{{$f->gender}}</td>
            <td class="center">{{$f->age}}</td>
                <td class="center">
                 {{$f->stateRegion}}
                </td>
                <td class="center">
                 {{$f->country}}
                </td>
            <td><i class="label label-warning">{{$f->application_status}}</i></td>
            <td>{{$f->universityName}}</td>

                <td>
                <select class="form-control changeStatus" form_id="{{$f->id}}">
                <option value="0" @if($f->app_status == 0) {{"selected"}} @endif>Submitted</option>
                        <option value="1" @if($f->app_status == 1) {{"selected"}} @endif >Final Interview</option>
                        <option value="2" @if($f->app_status == 2) {{"selected"}} @endif >Pre Screening</option>
                        <option value="3" @if($f->app_status == 3) {{"selected"}} @endif >Rejected</option>
                        <option value="4" @if($f->app_status == 4) {{"selected"}} @endif >Hired</option>
                        <option value="5" @if($f->app_status == 5) {{"selected"}} @endif >Screened</option>
                    </select>
                </td>

                    <td>
                    <a class="btn-sm btn-danger" href="{{route('deleteApp',['id'=>$f->id])}}">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                    </td>

            </tr>
@endforeach
            </tbody>
            </table>
            </div>
            </div>
            </div>
            <!--/span-->
        
            </div><!--/row-->
        
    
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->
    
    
    <hr>

    <script>
    $('.changeStatus').change(function(){
        var v = $(this).val();
        var fid = $(this).attr('form_id');
        var url = "{{route('changeAppStatus')}}";
        $.get(url,{status: v, form_id: fid},function(data){
            if(data.error == false)
            {
                
                alert('Application Status Updated.');
                location.reload();
            }
            else
            {
                alert('Error occurred in changing the application status try again.');
            }
        },'json');
    });
    </script>
@endsection