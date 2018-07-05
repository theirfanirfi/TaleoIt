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
                        <h2><i class="glyphicon glyphicon-edit"></i> Update {{$user->name}} Account </h2>
        
                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                    <form role="form" method="POST" action="{{route('updateRecruiter')}}">

                                <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" class="form-control" value="{{$user->name}}" id="fullname" placeholder="Enter your full name" required>
                                    </div>
                               @csrf
                                <input type="hidden" name="id" value="{{$user->id}}" />
                            <div class="form-group">
                                <label for="Email1">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" id="Email1" placeholder="Enter email" required>
                            </div>

                            <div class="form-group">
                                    <label for="password">Password</label>
                            <input type="password" name="password" value="" class="form-control" id="password" placeholder="Enter Password, If you want to change or Leave it empty.">
                                </div>
                       
                            <button type="submit" class="btn btn-default">Update Account</button>
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