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
    <!-- <ul class="breadcrumb">
    <li>
        <a href="#">Home</a>
    </li>
    <li>
        <a href="#">Blank</a>
    </li>
    </ul> -->
    </div>
    
    <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-edit"></i> Update Profile</h2>
        
                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                    <form role="form" method="POST" action="{{route('updateProfile')}}">

                                <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" value="{{$user->name}}" class="form-control" id="fullname" placeholder="Enter your full name">
                                    </div>
                               @csrf
                            <div class="form-group">
                                <label for="Email1">Email address</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control" id="Email1" placeholder="Enter email">
                            </div>
                       
                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
        
                    </div>
                </div>
            </div>
            <!--/span-->
        
        </div><!--/row-->
        
    


        <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-edit"></i> Change Password</h2>
            
                            <div class="box-icon">
                          
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                        <form role="form" method="POST" action="{{route('updateProfile')}}">
    
                                    <div class="form-group">
                                            <label for="currentPassword">Current Password</label>
                                    <input type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Enter your Current Password">
                                        </div>
                                   @csrf
                                <div class="form-group">
                                    <label for="newPassword">New Password</label>
                                <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Enter New Password">
                                </div>
                           
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
            
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