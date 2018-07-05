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
                <h2><i class="glyphicon glyphicon-user"></i>Recruiters' Accounts</h2>
        
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
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
                <th>Full Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($recruiters as $r)
            <tr>
            <td>{{$r->name}}</td>
                <td>{{$r->email}}</td>
            <td>                     <a class="btn-sm btn-info" href="{{route('editRecruiter',['id' => $r->id])}}">
                        <i class="glyphicon glyphicon-pencil icon-white"></i>
                        Edit
                    </a></td>
                    <td>
                    <a class="btn-sm btn-danger" href="{{route('deleteRecruiter',['id' => $r->id])}}">
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
@endsection