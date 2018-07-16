@extends('client.clientlayout')
@section('content')

    
    <div id="content" class="col-lg-10 col-sm-10">
        <!-- content starts -->
        
    
    <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">

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
                                <div class="form-group">
                                        <p>  <input type="radio" name="control" id="fullcontrol" @if($user->isFullAccess == 1) {{"checked"}} @endif  value="fullcontrol"/>  <label for="fullcontrol">Full Control </label></p>
                                        <p> <input type="radio" id="docs_only" @if($user->isFullAccess == 0) {{"checked"}} @endif name="control" value="docs_only" />  <label for="docs_only">Share Documents only </label> </p>
                                  </div>
                                <br/>
                            <button type="submit" class="btn btn-primary">Update Account</button>
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