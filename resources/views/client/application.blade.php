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
            <h2><i class="glyphicon glyphicon-user"></i>Candidate Profile </h2>
        
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
            
            <div class="row" style="margin-top:12px; padding:12px;">
                <div class="col-md-3">
                    <label> 1. First Name: </label> {{$form->firstname}}
                </div>

                <div class="col-md-3">
                        <label> 2. Last Name: </label> {{$form->lastname}}
                    </div>

                    <div class="col-md-5">
                            <label> 3. Street Address: </label> {{$form->streetAddress}}
                        </div>    
            </div>


            <div class="row" style="margin-top:12px; padding:12px;">
                    <div class="col-md-3">
                        <label> 4. City: </label> {{$form->city}}
                    </div>
    
                    <div class="col-md-3">
                            <label> 5. State: </label> {{$form->stateRegion}}
                        </div>
    
                        <div class="col-md-4">
                                <label> 6. ZIP: </label> {{$form->zip}}
                            </div>    
                </div>

            
                <div class="row" style="margin-top:12px; padding:12px;">
                        <div class="col-md-3">
                            <label> 7. Country: </label> {{$form->country}}
                        </div>
        
                        <div class="col-md-3">
                                <label> 8. Contact Phone: </label> {{$form->contactPhone}}
                            </div>
        
                            <div class="col-md-4">
                                    <label> 9. Age: </label> {{$form->age}}
                                </div>    
                    </div> 
                    
                    
                    <div class="row" style="margin-top:12px; padding:12px;">
                            <div class="col-md-3">
                                <label> 10. Gender: </label> {{$form->gender}}
                            </div>
            
                            <div class="col-md-3">
                                    <label> 11. Email: </label> {{$form->email}}
                                </div>
            
                                <div class="col-md-3">
                                        <label> 12. Height: </label> {{$form->height}}
                                    </div> 
                                <div class="col-md-3">
                                        <label> 13. Weight: </label> {{$form->weight}}

                                    </div>       
                        </div> 

                    <div class="row" style="margin-top:12px; padding:12px;">
                        <div class="col-md-3">
                                        <h3>Questions</h3>   
                        </div>
                    </div>  
                    
                    
                    <div class="row" style="margin-top:12px; padding:12px;">
                            <div class="col-md-3">
                                <label> 14. Previous Application: </label> {{$form->applied_for_ana}} @if(!empty($form->applied_for_ana_year)) <label> 15. Screening year: </label> {{$form->applied_for_ana_year}} @endif
                               
                            </div>

                            <div class="col-md-3">
                                    <label> 16. Work Experience: </label> {{$form->work_experience}}

                                </div>   

                                <div class="col-md-5">
                                        <label> 17 & 18. Airline Experience and Position: </label> {{$form->airline}}
    
                                    </div>   
                        </div>  

                
                        <div class="row" style="margin-top:12px; padding:12px;">
                                <div class="col-md-3">
                                    <label> 19. Japanese Language Skill: </label> {{$form->japanese_lang}}
                                </div>


                                <div class="col-md-3">
                                        <label> 20. Japanese Culture: </label> {{$form->japanese_culture}}
                                        @if(!empty($form->school_name)) <label>21. School Name: </label> {{$form->school_name}}
                                        <br/>
                                        <label>
                                            22. School Year: {{$form->school_year}}
                                        </label>
                                        @elseif(!empty($employer_name))
                                        <label>23. Employer Name: </label> {{$form->employer_name}}
                                        <br/>
                                        <label>
                                            24. Employement Year: {{$form->employer_year}}
                                        </label>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                            <label> 25. International Experience: </label> {{$form->internation_experience}}
                                        </div>
                        </div>

                        <div class="row" style="margin-top:12px; padding:12px;">
                                <div class="col-md-3">
                                                <h3>Documents</h3>   
                                </div>
                            </div> 

                            <div class="row" style="margin-top:12px; padding:12px;">
                                    <div class="col-md-3">
                                    <a  onclick="smalWindow(this); return false;" href="{{URL::asset('uploads')}}/{{$form->passportFileName}}"><img src="{{URL::asset('img/passport.png')}}" style="width:200px;height:220px;" /></a> 
                                        <br/>    
                                        <br/>    
                                    <label>26. Passport Number: </label> {{$form->passportNumber}} <br/>
                                        <label>27. Passport Expiry: </label> {{$form->passportExpiry}}
                                </div>

                                <div class="col-md-3">
                                <a onclick="smalWindow(this); return false;"  href="{{URL::asset('uploads')}}/{{$form->idCardFileName}}"><img src="{{URL::asset('img/idcard.jpg')}}" style="width:100%;height:220px;" /></a> 
                               
                                    </div>

                                    <div class="col-md-3" style="text-align: center;">
                                        <h2>TOEIC Score Card</h2>
                                    <a onclick="smalWindow(this); return false;"  href="{{URL::asset('uploads')}}/{{$form->toeicFileName}}" style="font-size:64px;" class="glyphicon glyphicon-file"></a>
                                   <br/>
                                    <label>28. TOEIC Score: </label> {{$form->toeicScore}}    
                                    </div>


                                    <div class="col-md-3">
                                    <a onclick="smalWindow(this); return false;"  href="{{URL::asset('uploads')}}/{{$form->cvFileName}}"><img src="{{URL::asset('img/cv.png')}}" style="width:95%;height:220px;" /></a> 
                                   
                                        </div>  
                                </div>     

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
        function smalWindow(link){
            var x = screen.width/2 - 700/2;
    var y = screen.height/2 - 450/2;
            window.open(link.href,'targetWindow', "toolbar=no,location=no,position=center,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600px,height=400px,left="+x+",top="+y+"");

           
        }

    </script>
@endsection