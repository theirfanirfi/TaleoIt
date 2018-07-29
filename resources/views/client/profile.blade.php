@extends('client.clientlayout')
@section('content')

<div class="row">
        <div class="col-md-12 col-sm-12">
                <div class="panel tab-border card-box">
                   <header class="panel-heading panel-heading-gray custom-tab">
                       <ul class="nav nav-tabs">
                           <li class="nav-item">
                               <a href="#home-2" data-toggle="tab"> <i class="fa fa-lock"></i>
                                Security Question
                               </a>
                           </li>
                           <li class="nav-item" >
                               <a href="#about-2" data-toggle="tab" class="active">
                                   <i class="fa fa-user"></i> Personal
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#contact-2" data-toggle="tab">
                                   <i class="fa fa-unlock"></i> Change Password
                               </a>
                           </li>
                       </ul>
                   </header>
                   <div class="panel-body">
                       <div class="tab-content">
                           <div class="tab-pane " id="home-2">
                                <h2>Security Question</h2>
                                <p>In case you forget your password, You will be able to reset your password by answering the Security Question set by you.
                                    Please set the security Question, If you haven't.
                                </p>
                                <form role="form" method="POST" action="{{route('securityQuestion')}}">

                                        <div class="form-group">
                                                <label>Select Security Question</label>
                                                <br/>
                                                <select class="security" name="security" class="form-control" style="padding:12px;">
                                                        <option value="">Select a question from the following options.</option>
                                         
                                                        <option value="1">What is your favorite color?</option>
                                                        <option value="2">What is your mother's favorite aunt's favorite color?</option>
                                                        <option value="3">Where does the rain in Spain mainly fall?</option>
                                                        <option value="4">If Mary had three apples, would you steal them?</option>
                                                        <option value="5">What brand of food did your first pet eat?</option>
                                                     </select>
                                       </div>
                                       @csrf
                                    <div class="form-group">
                                        <label>Answer</label>
                                    <input type="password" name="answer" class="form-control" id="answer" placeholder="Answer">
                                    </div>
                               
                                    <button type="submit" class="btn btn-warning">Set Security Question</button>
                                </form>

                           </div>
                           <div class="tab-pane active" id="about-2">
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
                               
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form> 
                        </div>
                           <div class="tab-pane " id="contact-2">
                                <form role="form" method="POST" action="{{route('changePassword')}}">
    
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
               </div>
           </div>

</div>    

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

<!--
    <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2>Security Question</h2>
                        <p>In case you forget your password, You will be able to reset your password by answering the Security Question set by you.
                            Please set the security Question, If you haven't.
                        </p>
                    </div>
                    <div class="box-content">
                    <form role="form" method="POST" action="">

                                <div class="form-group">
                                        <label>Select Security Question</label>
                                        <br/>
                                        <select class="security" name="security" class="form-control" style="padding:12px;">
                                                <option value="">Select a question from the following options.</option>
                                                <option value="1">Who's your daddy?</option>
                                                <option value="2">What is your favorite color?</option>
                                                <option value="3">What is your mother's favorite aunt's favorite color?</option>
                                                <option value="4">Where does the rain in Spain mainly fall?</option>
                                                <option value="5">If Mary had three apples, would you steal them?</option>
                                                <option value="6">What brand of food did your first pet eat?</option>
                                             </select>
                               </div>

                            <div class="form-group">
                                <label>Answer</label>
                            <input type="password" name="answer" class="form-control" id="answer" placeholder="Answer">
                            </div>
                       
                            <button type="submit" class="btn btn-warning">Set Security Question</button>
                        </form>
        
                    </div>
                </div>
            </div>

        
        </div> row-->
    <!--
    <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2></h2>
                    </div>
                    <div class="box-content">
                    <form role="form" method="POST" action="{{route('updateProfile')}}">

                                <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" value="{{$user->name}}" class="form-control" id="fullname" placeholder="Enter your full name">
                                    </div>

                            <div class="form-group">
                                <label for="Email1">Email address</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control" id="Email1" placeholder="Enter email">
                            </div>
                       
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
        
                    </div>
                </div>
            </div>

        
        </div> row -->
        
    
<!-- 

        <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2>Change Password</h2>
                        </div>
                        <div class="box-content">
                        <form role="form" method="POST" action="{{route('changePassword')}}">
    
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

            
            </div> row -->
            

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->
    
    
    <hr>
@endsection