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

<div id="regForm">


  <div class="tab">
<a href="{{route('apply')}}">Back to Application</a>

<h3>Security Question</h3>
<p>In case you forget your password, You will be able to reset your password by answering the Security Question set by you.
    Please set the security Question, If you haven't.
</p>
<form role="form" method="POST" action="{{route('squestion')}}">

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
</div>
  </div>


</form>
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
