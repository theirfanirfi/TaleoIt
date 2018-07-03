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
                <h2><i class="glyphicon glyphicon-user"></i>Submitted Forms</h2>
        
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
                <th>Gender</th>
                <th>Age</th>
                <th>State Region</th>
                <th>Country</th>
                <th>Passport</th>
                <th>ID Card</th>
                <th>Short list</th>
                <th>Waiting list</th>
                <th>Reject</th>
                <th>Profile</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Irfan Ullah</td>
                <td class="center">Male</td>
                <td class="center">21</td>
                <td class="center">
                  kp
                </td>
                <td class="center">
                  Pakistan
                </td>
                <td>example text</td>
                <td>example text</td>
                <td>                     <a class="btn-sm btn-info" href="#">
                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                        Push
                    </a></td>
                <td>
                        <a class="btn-sm btn-primary" href="#">
                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                Push
                            </a>
                </td>
                <td>
                        <a class="btn-sm btn-danger" href="#">
                                <i class="glyphicon glyphicon-cancel icon-white"></i>
                                Reject
                            </a>
                </td>
                <td>                    <a class="btn-sm btn-success" href="#">
                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                        View
                    </a></td>

                    <td>
                            <a class="btn-sm btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                    </td>

            </tr>

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