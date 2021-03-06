@extends('client.clientlayout')
@section('content')
    
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
            </div>
            <div class="box-content">
             @if(session('key'))   
            <div class="alert alert-{{Session('key')}}">{{Session('msg')}}</div>
            @endif
            
            <div class="row" style="margin-top:12px; padding:12px;">
                    <div class="col-md-3">
                      <label>Application Status: </label> <span class="label 
                      <?php switch($form->app_status){
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
                      } ?>">{{$form->application_status}} </span>
                    </div>

                    <div class="col-md-3">
                            <label>Change Status: </label> 
                            <select class="form-control changeStatus" form_id="{{$form->id}}">
                                    <option value="0" @if($form->app_status == 0) {{"selected"}} @endif>Submitted</option>
                                            <option value="1" @if($form->app_status == 1) {{"selected"}} @endif >Final Interview</option>
                                            <option value="2" @if($form->app_status == 2) {{"selected"}} @endif >Pre Screening</option>
                                            <option value="3" @if($form->app_status == 3) {{"selected"}} @endif >Rejected</option>
                                            <option value="4" @if($form->app_status == 4) {{"selected"}} @endif >Hired</option>
                                            <option value="5" @if($form->app_status == 5) {{"selected"}} @endif >Screened</option>
                                        </select>
                          </div>
                </div> 

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
        
                        <div class="col-md-4">
                                <label> 8. Contact Phone: </label> {{$form->contactPhone}}
                            </div>
        
                            <div class="col-md-3">
                                    <label> 9. Age: </label> {{$form->age}}
                                </div>    
                    </div> 
                    
                    
                    <div class="row" style="margin-top:12px; padding:12px;">
                            <div class="col-md-2">
                                <label> 10. Gender: </label> {{$form->gender}}
                            </div>
            
                            <div class="col-md-4">
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
                                <label> 14. Previous Application: </label> {{$form->applied_for_ana}}
                             </div>
                            <div class="col-md-3">
                                
                                <label> 15. Screening year: </label> {{$form->applied_for_ana_year}} 
                               
                            </div>

                            <div class="col-md-3">
                                    <label> 16. Work Experience: </label> {{$form->work_experience}}

                                </div>   

                                <div class="col-md-3">
                                  
                                        <label> 17. Airline Name: </label> {{$form->airline}}
                                </div>
                                <br/>
                    </div>
                    <div class="row" style="margin-top:12px; padding:12px;">

                            <div class="col-md-5">


                                    <label> 18. Airline Position: </label> {{$form->airlinePosition}}
          
                                    </div>   
                        </div>  

                
                        <div class="row" style="margin-top:12px; padding:12px;">
                                <div class="col-md-4">
                                    <label> 19. Japanese Language Skill: </label> {{$form->japanese_lang}}
                                </div>


                                <div class="col-md-4">
                                        <label> 20. Japanese Culture: </label> {{$form->japanese_culture}}
                                </div>

                            <div class="col-md-4">

                                     <label>21. School Name: </label> {{$form->school_name}}
                                        <br/>
                            </div>

                        </div>

                        <div class="row" style="margin-top:12px; padding:12px;">

                            <div class="col-md-4">

                                        <label>
                                            22. Enrollment Year: {{$form->school_year}}
                                        </label>
                            </div>

                            <div class="col-md-4">

                                        <label>23. Employer Name: </label> {{$form->employer_name}}
                                        <br/>
                            </div>


                            <div class="col-md-4">
                                        <label>
                                            24. Employement Year: {{$form->employer_year}}
                                        </label>
                                    </div>

                        </div>
                        <div class="row" style="margin-top:12px; padding:12px;">


                                    <div class="col-md-4">
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
                                    <a  onclick="smalWindow(this); return false;" href="{{URL::to('/file')}}/{{$form->passportFileName}}"><img src="{{URL::asset('uploads')}}/{{$form->passportFileName}}" style="width:200px;height:220px;" /></a> 
                                        <br/>    
                                        <br/>    
                                    <label>26. Passport Number: </label> {{$form->passportNumber}} <br/>
                                        <label>27. Passport Expiry: </label> {{$form->passportExpiry}}
                                </div>



                                    <div class="col-md-3" style="text-align: center;">
                                        <h2>TOEIC Score Card</h2>
                                    <a onclick="smalWindow(this); return false;"  href="{{URL::to('/file')}}/{{$form->toeicFileName}}" style="font-size:64px;"><i class="material-icons" style="font-size:44px;">attachment</i></a>
                                   <br/>
                                    <label>28. TOEIC Score: </label> {{$form->toeicScore}}    
                                    </div>


                                    <div class="col-md-3">
                                    <a onclick="smalWindow(this); return false;"  href="{{URL::to('/file')}}/{{$form->cvFileName}}"><img src="{{URL::asset('img/cv.png')}}" style="width:95%;height:220px;" /></a> 
                                   <br/>
                                   <p style="margin:12px;"><label>29. University Name:</label> {{$form->universityName}}</p>

                                        </div>  
                                </div>  

                                
                                <div class="row" style="margin-top:12px; padding:12px;">
                                        <div class="col-md-3">
                                                        <h5>30. Text Box:</h5>   
                                        </div>
                                    </div> 

                                    <div class="row" style="margin-top:2px; padding:2px;">
                                            <div class="col-md-12">
                                            <p style="text-align: justify;"><?php echo $form->coverLetter; ?></p>
                                            </div>
                                        </div> 



                            
                                        <div class="row" style="margin-top:12px; padding:12px;">
                                                <div class="col-md-3">
                                                   <h3>Other Questions</h3>
                                                </div>
                                            </div> 

                                            <div class="row" style="margin-top:12px; padding:12px;">
                                                    <div class="col-md-3">
                                                       <label>31. Tattoo: </label> {{$form->tatoo}}
                                                    </div>

                                                    <div class="col-md-3">
                                                            <label>32. Glasses: </label> {{$form->glasses}}
                                                         </div>


                                                         <div class="col-md-3">
                                                                <label>33. Japanese: </label> {{$form->japanase}}
                                                             </div>

                                                             <div class="col-md-3">
                                                                    <label>34. Confirm: </label> {{$form->confirm}}
                                                                 </div>
                                                </div> 



                                                <div class="row" style="margin-top:12px; padding:12px;">
                                                        <div class="col-md-3">
                                                           <h3>Notes:</h3>
                                                        </div>
                                                    </div> 


                                                    <div class="row" style="margin-top:12px; padding:12px;">
                                                            <div class="col-md-6">
                                                               <h5>Add Note</h5>
                                                            <form method="POST" action="{{route('addNote')}}">
                                                                   <textarea class="form-control" name="note" style="width:100%;"></textarea>
                                                                   <br/>
                                                                   @csrf
                                                            <input type="hidden" name="form_id" value="{{$form->id}}" />
                                                                   <input type="submit" class="btn btn-primary" value="Add Note" />
                                                               </form>
                                                            </div>
                                                        </div> 
        
                                                    <div class="row" style="margin-top:12px; padding:12px;">
                                                 @foreach($notes as $n)
                                                                    <div class="col-sm-6">
                                                                         <div class="card-box">
                                                                             <div class="card-head">
                                                                             <a href="{{route('deleteNote',['id' => $n->n_id])}}" style="float:right;color:red;"><i class="material-icons">close</i></a>
                                                                             </div>
                                                                            <div class="card-body " style="min-height:40px;text-align:justify;word-wrap: break-word;">{{$n->note}}</div>
                                                                         </div>
                                                                     </div>
                                                @endforeach
                                                  
                                            
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