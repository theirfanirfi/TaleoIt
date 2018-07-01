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
    <ul class="breadcrumb">
    <!-- <li>
        <a href="#">Submitted Forms</a>
    </li> -->
    </ul>
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

            <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div>
            
            
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>
                <th>Username</th>
                <th>Date registered</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Rizwan Habib</td>
                <td class="center">2012/01/21</td>
                <td class="center">Staff</td>
                <td class="center">
                    <span class="label-success label label-default">Active</span>
                </td>
                <td class="center">
                    <a class="btn btn-success" href="#">
                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                        View
                    </a>
                    <a class="btn btn-info" href="#">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                    </a>
                    <a class="btn btn-danger" href="#">
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