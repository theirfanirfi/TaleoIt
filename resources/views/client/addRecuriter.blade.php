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
            <div class="col-md-12">
 
                    <form role="form" method="POST" action="{{route('recruiter')}}">

                 
                                    <div class = "form-group">
                                       <label for = "fullname">Full Name</label>

                                       <input class = "form-control" type = "text"  id="fullname" placeholder="Enter Recruiter's Full name" name="fullname">
                                  </div>
                             
                               @csrf
                            <div class="form-group">
                                <label for="Email1">Email address</label>
                            <input type="email" name="email" class="form-control" id="Email1" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                    <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                </div>
                       
                            <button type="submit" class="btn btn-default">Proceed</button>
                        </form>
        
            </div>
            </div>

@endsection