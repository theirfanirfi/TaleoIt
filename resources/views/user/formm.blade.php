<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="{{ URL::asset('bower_components/jquery/jquery.min.js') }}"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.1/build/css/themes/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>
  <div class="container">
    <div class="row" style="margin-top:24px;">
<div class="col-md-4">
  <p> <strong>Application Status: </strong>
    @if($form->count() > 0)
    <span class="label 
    <?php switch($form->first()->app_status){
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
    } ?>">
    {{$form->first()->application_status}}
</span>
    @else
    <span class="label label-default">{{"Not Submitted"}}</span>
    @endif
    </p>

    <br/>



    <div class="row">
      <div class="col-md-12">
          @if($form->count() > 0)
          <p><strong>Application ID: </strong> {{$form->first()->id}} </p>
          @endif
      </div>
    </div>
</div>

<div class="col-md-4">
    <img style="height:40px;" src="{{URL::asset('img/taleo/taleo.png') }}" class="img-responsive" />
</div>

<div class="col-md-4">
    <div class="dropdown" style="margin-bottom:4px;float:right;">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          {{$user->name}}
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

        <li><a href="{{route('sq')}}">Security Question</a></li>
        <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
      </div>
      @if($form->count() > 0 && $form->first()->isWithDrawn == 0)
      <a style="float:left; text-decoration: none;" class="btn-lg btn-danger" onclick="cnfrm(this); return false;" href="{{route('withDrawApp')}}">WITHDRAW APPLICATION</a>
     @endif
</div>
</div>



  </div>

  @if($form->count() == 0)
<form id="regForm" action="{{route('submitForm')}}" method="POST" enctype="multipart/form-data">


  <!-- One "tab" for each step in the form: -->
  <div class="tab">
      <label>Name:</label>
    <p><input  oninput="this.className = ''" @if(Session('firstname')) value="{{Session('firstname')}}" @endif id="firstname" name="firstname" placeholder="First Name"></p>
    <p><input  oninput="this.className = ''" id="lastname" @if(Session('lastname')) value="{{Session('lastname')}}" @endif name="lastname" placeholder="Last Name"></p>
    
    <label>Street Address:</label>
    <p><input  oninput="this.className = ''" name="streetAddress" @if(Session('streetAddress')) value="{{Session('streetAddress')}}" @endif id="address" placeholder="Street Address"></p>
    
    <label>City:</label>
    <p><input  oninput="this.className = ''" @if(Session('city')) value="{{Session('city')}}" @endif id="city" name="city" placeholder="City"></p>
    

    <label>State/Region:</label>
    <p><input  oninput="this.className = ''" id="state" @if(Session('state')) value="{{Session('state')}}" @endif name="stateRegion" placeholder="State/Region"></p>
    
    <label>ZIP:</label>
    <p><input oninput="this.className = ''" id="zip" @if(Session('zip')) value="{{Session('zip')}}" @endif name="zip" placeholder="ZIP"></p>
    
    <label>Country:</label>
    <p><input  oninput="this.className = ''" id="country" @if(Session('country')) value="{{Session('country')}}" @endif name="country" placeholder="Country"></p>
    
    <label>Contact Phone:</label>
    <p><input  oninput="this.className = ''" id="phone" name="contactPhone" @if(Session('phone')) value="{{Session('phone')}}" @endif placeholder="Contact Phone"></p>
    
    <label>Age:</label>
    <p><input  oninput="this.className = ''" name="age" id="age" @if(Session('age')) value="{{Session('age')}}" @endif placeholder="Age"></p>
    <label>Gender:</label>
    <p>
            <select name="gender" style="padding:8px;" id="gender">
                    <option @if(Session('gender') == "Male") {{"selected"}} @endif value="Male">Male</option>
                    <option @if(Session('gender') == "Female") {{"selected"}} @endif value="Female">Female</option>
                </select>
    </p>
    
    <label>Email:</label>
    <p><input class="input" type="email" oninput="this.className = ''" @if(Session('email')) value="{{Session('email')}}" @endif id="email" name="email" placeholder="Email"></p>
    
    <label>Height:</label>
    <p><input class="input" type="text" oninput="this.className = ''" @if(Session('height')) value="{{Session('height')}}" @endif id="height" name="height" placeholder="Please Enter Height in CM. Example: 167"></p>
    
    <label>Weight:</label>
    <p><input  class="input" type="text" oninput="this.className = ''" id="weight" @if(Session('weight')) value="{{Session('weight')}}" @endif name="weight" placeholder="Please Enter Weight in Kg only. Example: 61.4"></p>
    
</div>


  <div class="tab">
        <label>Have you previously applied for a Cabin Attendant position with ANA? </label>
      <p>  <input style="width:16px;" type="radio" value="A" @if(Session('applied_for_ana') == "A") {{"checked"}} @endif class="applied_for_ana" name="applied_for_ana"> <span><strong>A: </strong> No, First time Applicant</span> </p>
        <p><input style="width:16px;" type="radio" value="B" @if(Session('applied_for_ana') == "B") {{"checked"}} @endif class="applied_for_ana" name="applied_for_ana"> <strong>B: </strong> Yes, I have previously sent Application, but not been to pre-scanning: Group session and English Test.</p>
        <p><input style="width:16px;" type="radio" value="C" @if(Session('applied_for_ana') == "C") {{"checked"}} @endif class="applied_for_ana" name="applied_for_ana"> <strong>C: </strong> Yes, I have previously Attendend pre-scanning, but not been to Final Interview</p>
        <p><input style="width:16px;" type="radio" value="D" @if(Session('applied_for_ana') == "D") {{"checked"}} @endif class="applied_for_ana" name="applied_for_ana"> <strong>D: </strong> Yes, I have been to Final Interview</p>
        <p style="font-size:11px;color:red;font-style:italic;">If you answered C or D, Please enter the last screening year you have Attendend. Example: 2016</p>
        <select id="applied_for_ana_last_screening_year_txt" name="applied_for_ana_last_screening_year_txt" style="width:30%;padding:12px;">
          <option value="">Select Year</option>
          @for($i = 1980; $i <= date('Y'); $i++)
        <option value="{{$i}}">{{$i}}</option>
          @endfor
        </select>
        
        <p class="error" style="display:none;color:red;font-style:italic;">Screening Year is Required.</p>
        
      </div>


  <div class="tab">
    <h3>Work Experience: </h3>
        <label for="work_experience">Describe your previous work Experience: </label>
         <br/>
        <p><input style="width:16px;" type="radio" value="A" @if(Session('work_experience') == "A") {{"checked"}} @endif class="work_experience" name="work_experience"> <strong>A: </strong> I have cabin Attendant experience, but less than 3 years. </p>
        <p><input style="width:16px;" type="radio" value="B" @if(Session('work_experience') == "B") {{"checked"}} @endif  class="work_experience" name="work_experience"> <strong>B: </strong> I have cabin Attendant experience more than 3 years. </p>
        <p><input style="width:16px;" type="radio" value="C" @if(Session('work_experience') == "C") {{"checked"}} @endif class="work_experience" name="work_experience"> <strong>C: </strong> I don't have cabin Attendant experience but I have more than 1 year work experience after graduating.</p>
        <p><input style="width:16px;" type="radio" value="D" @if(Session('work_experience') == "D") {{"checked"}} @endif class="work_experience" name="work_experience"> <strong>D: </strong> I don't have cabin Attendant experience and I have less than 1 year work experience after graduating.</p>
    <br/>
    <br/>
        <label>If you are/was working for an Airline, please enter most recent Airline served. Airline name and Position.</label> <br/>
        <p>Airline Name: </p>
        <p><input type="text" id="airline" name="airline" @if(Session('airline')) value="{{Session('airline')}}" @endif class="form-control" placeholder="Airline Name" /> </p> 

        <br/>

       <p>Position:</p>
        <p><input type="text" id="airlinePosition" name="airlinePosition" @if(Session('airlinePosition')) value="{{Session('airlinePosition')}}" @endif class="form-control" placeholder="Airline Position" />  </p>

  </div>


  <div class="tab">
    <h3>Japanese Culture: </h3>
        <label>Describe your Japanese Culture experience </label> <br/>
       <p> <input style="width:16px;"  type="radio" @if(Session('japanese_lang') == "A") {{"checked"}} @endif value="A" class="japanese_lang" name="japanese_lang"> <strong>A: </strong> No previous experience</p>
        <p><input  style="width:16px;" type="radio" @if(Session('japanese_lang') == "B") {{"checked"}} @endif value="B" class="japanese_lang" name="japanese_lang"> <strong>B: </strong> I have interest in and am familiar with some Japanese culture. </p>
        <p><input  style="width:16px;" type="radio" @if(Session('japanese_lang') == "C") {{"checked"}} @endif value="C" class="japanese_lang" name="japanese_lang"> <strong>C: </strong> I have studied or studies Japanese culture. </p>
       <p> <input style="width:16px;"  type="radio" @if(Session('japanese_lang') == "D") {{"checked"}} @endif value="D" class="japanese_lang" name="japanese_lang"> <strong>D: </strong> I have studied in Japan or worked for Japanese management company. </p>
        <p style="font-size:11px;color:red;font-style:italic;">If you answered D, please enter most recent school or employer name you have studied or worked for.</p>
        <p><input type="text" name="school_name" class="form-control" @if(Session('school_name')) value="{{Session('school_name')}}" @endif id="school_name" placeholder="School Name" /> </p>
        <p class="error" style="display:none;color:Red;font-size:12px;">School Name is Required.</p>  
        <label>School Year:</label>
        <p><input type="date"  name="school_year" class="form-control" @if(Session('school_year')) value="{{Session('school_year')}}" @endif  id="school_year" placeholder="School Year"/> </p>
        <p  class="error" style="display:none;color:Red;font-size:12px;">School Year is Required.</p>  
        
        <h3>OR</h3>
        <br/>
        <label>Employer Name: </label>
        <P><input type="text" name="employer_name" class="form-control" @if(Session('employer_name')) value="{{Session('employer_name')}}" @endif id="employer_name" placeholder="Employer Name" /> </p>
        <p  class="error" style="display:none;color:Red;font-size:12px;">Employer Name is Required.</p>   
        <br/>
        <label>Employement Year: </label>
        <p><input type="date" name="employer_year" class="form-control" @if(Session('employer_year')) value="{{Session('employer_year')}}" @endif id="employer_year"/> </p>
        <p  class="error" style="display:none;color:Red;font-size:12px;">Employement Year is Required.</p>   
          
           
  </div>

  

  <div class="tab">
    <h3>Japanese Language skill: </h3>
        <label>Describe your current Japanese skills</label> <br/>
        <p><input style="width:16px;"  type="radio" value="A" @if(Session('japanese_culture') == "A") {{"checked"}} @endif  class="japanese_culture" name="japanese_culture"> <strong>A: </strong> None</p>
        <p><input style="width:16px;" type="radio" value="B" @if(Session('japanese_culture') == "B") {{"checked"}} @endif  class="japanese_culture" name="japanese_culture"> <strong>B: </strong> Basic: N5 Level </v>
        <p><input style="width:16px;" type="radio" value="C"  @if(Session('japanese_culture') == "C") {{"checked"}} @endif class="japanese_culture" name="japanese_culture"> <strong>C: </strong> Advance N4, N3 Level </v>
        <p><input style="width:16px;" type="radio" value="D"  @if(Session('japanese_culture') == "D") {{"checked"}} @endif class="japanese_culture" name="japanese_culture"> <strong>D: </strong> Fluent N2, N1 Level </v>

  </div>

  <div class="tab">
    <h3>International Experience: </h3>
        <label>Describe your international experience</label> <br/>
        <p><input style="width:16px;" type="radio" value="A" class="internation_experience" @if(Session('internation_experience') == "A") {{"checked"}} @endif name="internation_experience"> <strong>A: </strong> No previous experience</p>
        <p><input style="width:16px;" type="radio" value="B" class="internation_experience" @if(Session('internation_experience') == "B") {{"checked"}} @endif name="internation_experience"> <strong>B: </strong> I have studied or worked in an international environment. </p>
        <p><input style="width:16px;" type="radio" value="C" class="internation_experience" @if(Session('internation_experience') == "C") {{"checked"}} @endif name="internation_experience"> <strong>C: </strong> I have studied abroad. </p>
        <p><input style="width:16px;" type="radio" value="D" class="internation_experience" @if(Session('internation_experience') == "D") {{"checked"}} @endif name="internation_experience"> <strong>D: </strong> I have worked abroad. </p>
       
  </div>

  <div class="tab">
        <h3>Passport Details</h3>
        <label><strong>Passport: </strong> upload clear copy of your passport.</label> <p style="color:red;">Only Thai passport is acceptable.</p>
       <p> <input type="file" name="passport_file" id="passportFile" class="fi form-control" onchange="checkformat(this);" /> </p>
       <p class="error" style="display:none;font-size:11px;color:red;">Invalid File Format. Supported files are .jpg, .jpeg and .png</p>
       <label>Passport Number: </label> <br/>
    <p><input type="text" name="passport_number" @if(Session('passportNumber')) value="{{Session('passportNumber')}}" @endif id="passportNumber" class="ssf form-control" placeholder="Passport Number" /></p>
        <p class="error" style="display:none;font-size:11px;color:red;">Field is Required.</p>
        <label>Passport Expiry: </label>
        <p><input type="date" @if(Session('passportExpiry')) value="{{Session('passportExpiry')}}" @endif name="passport_expiry" id="passport_expiry" class="ssf form-control" /></p>
        <p class="error" style="display:none;font-size:11px;color:red;">Field is Required.</p>
  </div>


  <div class="tab">
        <h3>TOEIC Score Details:</h3>
       <label>TOEIC Score - Upload: Please upload copy of your recent TOEIC Score Card here</label>
       <br/>
       <p class="error2" style="display:none;font-size:11px;color:red;">Invalid File Format. Supported files are .jpg, .jpeg and .png</p>
      
       <p><input type="file" id="score_file" name="toeic_score_card" class="fi form-control" onchange="checkformat(this);" /></p>
       <p class="error" style="display:none;font-size:11px;color:red;">Field is Required.</p>
      
       <br/>
       <label>TOEIC Score</label>
       <p><input type="number" @if(Session('toeic_score')) value="{{Session('toeic_score')}}" @endif id="toeic_score" name="toeic_score" class="ssf form-control" placeholder="English TOEIC Score. Example 784" /></p>
       <p class="error" style="display:none;font-size:11px;color:red;">Field is Required.</p>
       
  </div>


  <div class="tab">
        <h3>Education:</h3>
        <label>Education History: Please enter university/institute name which grant bachelor's degree</label><br/>
        <p><input type="text" @if(Session('uni_name')) value="{{Session('uni_name')}}" @endif name="uni_name" id="uni_name" placeholder="University/Institute Name" class="ssf form-control" /></p>
        <p class="error" style="display:none;font-size:11px;color:red;">Field is Required.</p>
        
        <br/>
  </div>
@csrf

  <div class="tab">
        <label>CV: Please upload CV (Resume) here Head-shot Photo must be placed on the top of CV. <span style="color:Red;">CV File format must be PDF</span></label><br/>
        <p class="error2" style="color:red;display:none;">Invalid File Format. Only PDF file format is supported.</p>
        <p><input type="file" id="cv_file" name="cv_file" class="form-control" onchange="checkCVformat(this);" /></p>
        <p class="error" style="color:red;display:none;">Field is Required.</p>
    
        <p>You can use this text area to support or complement your application. Maximum capacity of 500pts. </p>
        <textarea id="optionalText" class="form-control fi" name="cv_additional_text" style="height:300px;width:100%;" maxlength="500"></textarea>
    
        <br/>
  </div>

  <div class="tab">
      <label>Online Questions</label>
      <br/>
  <p>Do you have visible Tattoos? <strong>Yes</strong> <input style="width:16px;" type="radio" class="online_ques" name="tatoo" value="yes" /> <strong>No</strong> <input style="width:16px;" class="online_ques" type="radio" name="tatoo" value="No" /> </p>
  <p>Can you work without Glasses? (Contact lenses are acceptable) <strong>Yes</strong> <input style="width:16px;"  class="online_ques" type="radio" name="glasses" value="yes" /> <strong>No</strong> <input class="online_ques" style="width:16px;" type="radio" name="glasses" value="No" /> </p>
  <p>Are you willing to study Japanese if hired? <strong>Yes</strong> <input style="width:16px;"  type="radio" class="online_ques" name="study_japanese_if_hired" value="yes" /> <strong>No</strong> <input style="width:16px;" class="online_ques" type="radio" name="study_japanese_if_hired" value="No" /> </p>
  <p>Have you submitted and uploaded all documents correctly? Otherwise you application will be disqualified. <strong>Yes</strong> <input  style="width:16px;" type="radio" class="online_ques" name="confirm_form" value="yes" /> <strong>No</strong> <input style="width:16px;" type="radio" class="online_ques" name="confirm_form" value="No" /> </p>
     
      <br/>
  </div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
@else 

<!-- summarry -->

<div class="" id="regForm">
<h3 style="color:red;">Congratulations, your application has been submitted.</h3>
<h4>Application summary:</h4>
<?php $form = $form->first(); ?>
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
                                <label> 14. Previous Application: </label> {{$form->applied_for_ana}} @if(!empty($form->applied_for_ana_year)) <label> 15. Screening year: </label> {{$form->applied_for_ana_year}} @endif
                               
                            </div>

                            <div class="col-md-3">
                                    <label> 16. Work Experience: </label> {{$form->work_experience}}

                                </div>   

                                <div class="col-md-6">
                                    @if(!empty($form->airline))
                                        <label> 17. Airline Name: </label> {{$form->airline}}
                                    @endif

                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    @if(!empty($form->airlinePosition))
                                    <label> 18. Airline Position: </label> {{$form->airlinePosition}}
                                @endif
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
                                    <div class="col-md-4">
                                    <a  onclick="smalWindow(this); return false;" href="{{URL::asset('uploads')}}/{{$form->passportFileName}}"><i class="glyphicon glyphicon-file"></i> Passport File</a> 
                                        <br/>    
                                        <br/>    
                                    <label>26. Passport Number: </label> {{$form->passportNumber}} <br/>
                                        <label>27. Passport Expiry: </label> {{$form->passportExpiry}}
                                </div>


                                            
                                    <div class="col-md-4">
                                            <a onclick="smalWindow(this); return false;"  href="{{URL::asset('uploads')}}/{{$form->toeicFileName}}"><i class="glyphicon glyphicon-file"></i> TOEIC Score Card</a> 
                                           <br/>
                                           <label>28. TOEIC Score:</label> {{$form->toeicScore}}

                                                </div>  

                                                <div class="col-md-4">
                                                        <a onclick="smalWindow(this); return false;"  href="http://docs.google.com/viewer?embedded=true&url={{URL::asset('uploads')}}/{{$form->cvFileName}}"><i class="glyphicon glyphicon-file"></i> C.V File</a> 
                                                       <br/>
                                                       <label>29. University Name:</label> {{$form->universityName}}
            
                                                            </div>       
                                        </div>  
    
                                        
                                        <div class="row" style="margin-top:12px; padding:12px;">
                                                <div class="col-md-3">
                                                                <label>30. Cover Letter:</label>   
                                                </div>
                                            </div> 
        
                                            <div class="row" style="margin-top:2px; padding:2px;">
                                                    <div class="col-md-12">
                                                    <p style="text-align: justify;"><?php echo $form->coverLetter; ?></p>
                                                    </div>
                                                </div> 
        
        
        
                                    
                                                <div class="row" style="margin-top:12px;  padding:12px;">
                                                        <div class="col-md-3">
                                                           <h3>Other Questions</h3>
                                                        </div>
                                                    </div> 
        
                                                    <div class="row" style="margin-top:12px;margin-bottom:124px; padding:12px;">
                                                            <div class="col-md-3">
                                                               <label>31. Tatto: </label> {{$form->tatoo}}
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
        
                                                      </div>













@endif
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
var f = 0;
showTab(currentTab); // Display the crurrent tab
var t = 0;
function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  if(f == 9 || f == 10)
  {
//     alert(x);
// $(x).append("<h1>Please wait, your application is being submitted.</h1>");

  }

if(n == 1 && t == 0 )
{
  t = n;
}
else 
{
  t++;
}

  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm(currentTab)){ return false; } else { if(t == 1) {make("{{route('stepone')}}");} else if(t == 2){} }
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  f++;

  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function make(url)
{
  var firstname = $('#firstname').val();
var lastname = $('#lastname').val();
var streetAddress = $('#address').val();
var city = $('#city').val();
var state = $('#state').val();
var zip = $('#zip').val();
var country = $('#country').val();
var phone = $('#phone').val();
var age = $('#age').val();
var gender = $('#gender').val();
var email = $('#email').val();
var height = $('#height').val();
var weight = $('#weight').val();

   var arr = [firstname,lastname,streetAddress,city,state,
zip,country,phone,age,gender,email,height,weight];

$.get(url,{data: arr},function(data){
if(data.error == false)
{
return true;
}
else 
{
  
   return false;
}
},'json');
}


function validateForm(t) {
  // This function deals with validation of the form fields
  var x, y, i, r = 0, inp = 0, ronline = 0 , valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  //alert($("input[type=radio]").length);

if(t == 10){
      $('.online_ques').each(function(index,element){
        if(!$(element).is(":checked"))
        {
          ronline++;
        }
      });
console.log(ronline);
}
else 
{
  ronline = 0;
}

  for(j = 0; j < y.length; j++)
  {
    if(y[j].type== "radio" && !$(y[j]).is(":checked") && $(y[j]).attr('class') != "online_ques")
    {

      if($(y[j]).attr('class') == "online_ques")
      {
        console.log("inside if");
        console.log(r + " : "+ ronline);
        continue;
      }

    r++;
    console.log($(y[j]).attr('class'));
    }

    else if((y[j].type == "radio" && $(y[j]).is(":checked") && y[j].name == "applied_for_ana") && (($(y[j]).val() == "C" || $(y[j]).val() == "D") && $('#applied_for_ana_last_screening_year_txt').val() == ""))
    {
      r++;
      alertify.set('notifier','position', 'top-center');
      alertify.warning("Please select Year.");
  
    }

     else if(y[j].type == "radio" && $(y[j]).is(":checked") && y[j].name == "work_experience" && (($(y[j]).val() == "A" || $(y[j]).val() == "B") && ($('#airline').val() == "" || $('#airlinePosition').val() == "")))
    {
      r++;
      alertify.set('notifier','position', 'top-center');
      alertify.warning("As You have selected option "+ $(y[j]).val() +",Please Enter Airline Name and Position.");
      
    }

     else if(((y[j].type == "radio" && $(y[j]).is(":checked") && $(y[j]).val() == "D" && y[j].name == "japanese_lang")) &&
      (($('#school_name').val() == "" && $('#school_year').val() == "") && ($('#employer_name').val() == "" && $('#employer_year').val() == "")))
    {
      r++;
      alertify.set('notifier','position', 'top-center');
      alertify.warning("As You have selected option "+ $(y[j]).val() +",Please Enter School Name and Year OR Employer Name and Employement Year");
      
   }

     else if(y[j].type == "radio" && !$(y[j]).is(":checked") && y[j].name == "japanese_culture")
    {
      r++;
      alertify.set('notifier','position', 'top-center');
      alertify.warning("Please Select any option of the following.");
      
    }


  }

 

  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    
  if(y[i].name == "airline" || y[i].name == "airlinePosition" || y[i].name == "school_name" || y[i].name == "school_year" || y[i].name == "employer_name" || y[i].name == "employer_year")
  {
    continue;
  }

    if (y[i].value == "" || r > 3 || ronline > 4) {
      // add an "invalid" class to the field:
      if(y[i].type != "radio"){
      y[i].className += " invalid";
      }


      inp++;
      // and set the current valid status to false
      valid = false;
    }
  }
  if(r > 3 || inp > 0 || ronline > 4)
  {
    alertify.set('notifier','position', 'top-center');
    alertify.error("You have left the questions unattended. Please attend the questions and proceed.");
  }

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function checkformat(inputFile)
{
    var file = $(inputFile).val();
    var allowed_extensions = new Array("jpg","png","jpeg");
    var file_extension = file.split('.').pop().toLowerCase();

    if(allowed_extensions.includes(file_extension))
    {
       $(inputFile).next('.error').hide('slow');
  return true;

    }
    else 
    {
       $(inputFile).next('.error').show('slow');
       $(inputFile).val("");
       alertify.set('notifier','position', 'top-center');
    alertify.error("Invalid File Format. Supported Files are .JPG, .JPECG and .PNG ");
      
        return false;
    }
   
}

function checkCVformat(cvFile)
{
    var file = $(cvFile).val();
    var allowed_extensions = new Array("pdf");
    var file_extension = file.split('.').pop().toLowerCase();

    if(allowed_extensions.includes(file_extension))
    {
       $(cvFile).prev('.error2').hide('slow');
        return true;

    }
    else 
    {
       $(cvFile).prev('.error2').show('slow');
       $(cvFile).val("");
        return false;
    }
}

function cnfrm(link)
{
    alertify.confirm('Withdraw Application', 'Are you sure to widthdraw the Application?', function(){ location.href = link.href;
     }
                , function(){ alertify.error('Action Cancelled.')});
    return false;
}

        function smalWindow(link){
            var x = screen.width/2 - 700/2;
    var y = screen.height/2 - 450/2;
            window.open(link.href,'targetWindow', "toolbar=no,location=no,position=center,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600px,height=400px,left="+x+",top="+y+"");

           
        }
</script>

</body>
</html>
