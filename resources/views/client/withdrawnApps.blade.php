@extends('client.clientlayout')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card card-topline-aqua">
                <div class="card-head">
                    <header></header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                <div class="table-scrollable">
                    <table id="example1" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>State Region</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                  
                                 <!--   <th>Change Status</th> -->
                                    <th>Date</th>
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
                                <td><i class="label 
                                    <?php switch($f->app_status){
                                      case 0:
                                      echo "label-info";
                                      break;
                                      case 1:
                                      echo "label-success";
                                      break;
                                      case 2:
                                      echo "label-warning";
                                      break;
                                      case 3:
                                      echo "label-danger";
                                      break;
                                      case 4: 
                                      echo "label-success";
                                      break;
                                      case 5:
                                      echo "label-primary";
                                      break;
                                    } ?>">{{$f->application_status}}</i></td>
                       
                    
                                <!--  <td>
                                    <select class="form-control changeStatus" form_id="{{$f->id}}">
                                    <option value="0" @if($f->app_status == 0) {{"selected"}} @endif>Submitted</option>
                                            <option value="1" @if($f->app_status == 1) {{"selected"}} @endif >Final Interview</option>
                                            <option value="2" @if($f->app_status == 2) {{"selected"}} @endif >Pre Screening</option>
                                            <option value="3" @if($f->app_status == 3) {{"selected"}} @endif >Rejected</option>
                                            <option value="4" @if($f->app_status == 4) {{"selected"}} @endif >Hired</option>
                                            <option value="5" @if($f->app_status == 5) {{"selected"}} @endif >Screened</option>
                                        </select>
                                    </td> -->
                                    <td><?php echo substr($f->created_at,0,11) ?></td>  
                    
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
        </div>
    </div>

    <script>

    </script>
@endsection