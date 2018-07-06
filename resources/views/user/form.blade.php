<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        Author: Irfan Ullah
        Email: TheIrfanIrfi@gmail.com

    -->
    <meta charset="utf-8">
    <title>TaleoIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TaleoIt">
    <meta name="au
    thor" content="Irfan Ullah">
<script src="{{ URL::asset('bower_components/jquery/jquery.min.js') }}"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <!-- The fav icon -->
 <link rel="shortcut icon" href="{{URL::asset('img/taleo/taleo.png') }}">
<style type="text/css">
    .wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}
.step1 .row {
    margin-bottom:10px;
}
.step_21 {
    border :1px solid #eee;
    border-radius:5px;
    padding:10px;
}
.step33 {
    border:1px solid #ccc;
    border-radius:5px;
    padding-left:10px;
    margin-bottom:10px;
}
.dropselectsec {
    width: 68%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.dropselectsec1 {
    width: 74%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.mar_ned {
    margin-bottom:10px;
}
.wdth {
    width:25%;
}
.birthdrop {
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    width: 16%;
    outline: 0;
    font-weight: normal;
}


/* according menu */
#accordion-container {
    font-size:13px
}
.accordion-header {
    font-size:13px;
	background:#ebebeb;
	margin:5px 0 0;
	padding:7px 20px;
	cursor:pointer;
	color:#fff;
	font-weight:400;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px
}
.unselect_img{
	width:18px;
	-webkit-user-select: none;  
	-moz-user-select: none;     
	-ms-user-select: none;      
	user-select: none; 
}
.active-header {
	-moz-border-radius:5px 5px 0 0;
	-webkit-border-radius:5px 5px 0 0;
	border-radius:5px 5px 0 0;
	background:#F53B27;
}
.active-header:after {
	content:"\f068";
	font-family:'FontAwesome';
	float:right;
	margin:5px;
	font-weight:400
}
.inactive-header {
	background:#333;
}
.inactive-header:after {
	content:"\f067";
	font-family:'FontAwesome';
	float:right;
	margin:4px 5px;
	font-weight:400
}
.accordion-content {
	display:none;
	padding:20px;
	background:#fff;
	border:1px solid #ccc;
	border-top:0;
	-moz-border-radius:0 0 5px 5px;
	-webkit-border-radius:0 0 5px 5px;
	border-radius:0 0 5px 5px
}
.accordion-content a{
	text-decoration:none;
	color:#333;
}
.accordion-content td{
	border-bottom:1px solid #dcdcdc;
}



@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
</style>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container">

    <div class="row" style="margin-top:12px;">
        <div class="col-md-4">
            <p> <strong>Application Status: </strong>
            @if($form->count() > 0)
            {{$form->first()->application_status}}
            @else
            {{"not submitted"}}
            @endif
            </p>
        </div>
        <div class="col-md-6">
            <img style="height:80px;" src="{{URL::asset('img/taleo/taleo.png') }}" class="img-responsive" />
        </div>
        <div class="col-md-2">
                <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          {{$user->name}}
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{route('logout')}}">Logout</a></li>
                         <!-- <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Separated link</a></li> -->
                        </ul>
                      </div>
        </div>
    </div>

    <div class="row">
    	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                            </div>
                            <div class="col-md-4">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="col-md-4">
                                <label for="address">Street Address</label>
                                <input type="text" class="form-control" name="streetAddress" id="address" placeholder="Email">
                            </div>
                        </div>


                        <div class="row">
                           
                            <div class="col-md-4">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Email">
                            </div>

                            <div class="col-md-4">
                                <label for="state">State/Region</label>
                                <input type="text" class="form-control" id="state" name="stateRegion" placeholder="Email">
                            </div>
                            <div class="col-md-4">
                                <label for="zip">ZIP</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Email">
                            </div>
                        </div>

                        <div class="row">
                            
                          
                            <div class="col-md-4">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="Email">
                            </div>

                            <div class="col-md-4">
                                <label for="phone">Contact Phone</label>
                                <input type="text" class="form-control" id="phone" name="contactPhone" placeholder="Email">
                            </div>
                            <div class="col-md-4">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" name="age" id="age" placeholder="Age">
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                          
                            <div class="col-md-6">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="height">Height</label>
                                <input type="number" class="form-control" id="height" name="height" placeholder="Please Enter Height in CM. Example: 167">
                            </div>

                            
                            <div class="col-md-6">
                                <label for="weight">Weight</label>
                                <input type="number" class="form-control" id="weight" name="weight" placeholder="Please Enter Weight in Kg only. Example: 61.4">
                            </div>
                        </div>


                        </div>
                        <ul class="list-inline pull-right">


                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
                            <div class="row">
                                <div class="col-md-6">
                                <label for="applied_for_ana">Have you previously applied for a cabin Attendant Position with ANA? </label>
                                <br/>
                                <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>A: </strong> No, First time Applicant <br/>
                                <input type="radio" value="B" id="applied_for_ana" name="applied_for_ana"> <strong>B: </strong> Yes, I have previously sent Application, but not been to pre-scanning: Group session and English Test.</br>
                                <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>C: </strong> Yes, I have previously Attendend pre-scanning, but not been to Final Interview</br>
                                <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>D: </strong> Yes, I have been to Final Interview</br>
                                <p style="font-size:11px;color:red;font-style:italic;">If you answered C & D, Please enter the last screening year you have Attendend. Example: 2016</p>
                                <input type="text" name="last_screening_year" class="form-control" style="width:60%;" />
                            </div>

                                <div class="col-md-6">
                                        <label for="applied_for_ana">Work Experience: Describe your previous work Experience </label>
                                        <br/>
                                        <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>A: </strong> I have cabin Attendant experience, but less than 3 years. <br/>
                                        <input type="radio" value="B" id="applied_for_ana" name="applied_for_ana"> <strong>B: </strong> I have cabin Attendant experience more than 3 years. </br>
                                        <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>C: </strong> I don't have cabin Attendant experience but I have more than 1 year work experience after graduating.</br>
                                        <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>D: </strong> I don't have cabin Attendant experience and I have less than 1 year work experience after graduating.</br>
                                </div>

                            </div>

                            <div class="row" style="margin-top:16px;">
                                <div class="col-md-6">
                                    <label>If you are/was working for an Airline, please enter most recent Airline served. Airline name and Position.</label> <br/>
                                    <input type="text" name="airline" class="form-control" placeholder="Airline Name and Position" />  

                                </div>
                                <div class="col-md-6">
                                        <label>Japanese Culture: Describe your Japanese Culture experience </label> <br/>
                                        <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>A: </strong> None<br/>
                                        <input type="radio" value="B" id="applied_for_ana" name="applied_for_ana"> <strong>B: </strong> Basic: N5 Level </br>
                                        <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>C: </strong> Advance N4, N3 Level </br>
                                        <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>D: </strong> Fluent N2, N1 Level </br>
                               
    
                                    </div>
      
                            </div>

                            <div class="row" style="margin-top:16px;">
                                    

                                        <div class="col-md-6">
                                                <label>Japanese Language skill: Describe your current Japanese skills</label> <br/>
                                                <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>A: </strong> No Previous experience<br/>
                                                <input type="radio" value="B" id="applied_for_ana" name="applied_for_ana"> <strong>B: </strong> I have interest in and am familiar with some Japanese culture. </br>
                                                <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>C: </strong> I have studied or studies Japanese culture. </br>
                                                <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>D: </strong> I have studied in Japan or worked for Japanese management company. </br>
                                                <p style="font-size:11px;color:red;font-style:italic;">If you answered D, please enter most recent school or employer name you have studied or worked for.</p>
                                           <div class="row">
                                               <div class="col-md-6">
                                                <input type="text" name="school_name" class="form-control" id="school_name" placeholder="School Name" /> 
                                               </div>
                                               <div class="col-md-6">
                                            <input type="date" name="school_year" class="form-control" id="school_year" placeholder="School Year"/> 
                                               </div>
                                           </div>

                                           <div class="row" style="margin-top:4px;">
                                                <div class="col-md-6">
                                                 <input type="text" name="employer_name" class="form-control" id="employer_name" placeholder="Employer Name" /> 
                                                </div>
                                                <div class="col-md-6">
                                             <input type="date" name="employer_year" class="form-control" id="employer_year"/> 
                                                </div>
                                            </div>

                                            </div>

                                            
                                            <div class="col-md-6">
                                                    <label>Internation Experience: Describe your Internation experience</label> <br/>
                                                    <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>A: </strong> No Previous experience<br/>
                                                    <input type="radio" value="B" id="applied_for_ana" name="applied_for_ana"> <strong>B: </strong> I have studied or worked in Internation environment. </br>
                                                    <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>C: </strong> I have studied abroad. </br>
                                                    <input type="radio" value="A" id="applied_for_ana" name="applied_for_ana"> <strong>D: </strong> I have worked abroad. </br>
                                                   
                                            </div>


                            </div>

                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step33">
                            <div class="row mar_ned" style="margin-top:12px;">
                                <div class="col-md-4">
                                    <label><strong>Passport: </strong> upload clear copy of your passport.</label> <p style="color:red;">Only Thai passport is acceptable.</p> <br/>
                                    <input type="file" name="passport_file" class="form-control" /> <br/>
                                    <label>Passport Number: </label> <br/>
                                    <input type="text" name="passport_number" class="form-control" placeholder="Passport Number" /> <br/>
                                    <label>Passport Expiry: </label>
                                    <input type="date" name="passport_expiry" class="form-control" /> <br/>
                                </div>

                                <div class="col-md-4">
                                    <label><strong>Thai ID Card: </strong> Please Upload clear copy of your Thai ID Card.</label></br>
                                    <input type="file" name="thai_id_card" class="form-control" />
                                </br>
                                <label>TOEIC Score - Upload: Please upload copy of your recent TOEIC Score Card here</label>
                                <br/>
                                <input type="file" name="toeic_score_card" class="form-control" />
                                <br/>
                                <label>TOEIC Score</label>
                                <input type="number" name="toeic_score" class="form-control" placeholder="English TOEIC Score. Example 784" />
                                </div>

                                <div class="col-md-4">
                                    <label>Education History: Please enter university/institute name which grant bachelor's degree</label><br/>
                                    <input type="text" name="uni_name" id="uni_name" placeholder="University/Institute Name" class="form-control" /> <br/>
                                    <br/>

                         
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>CV: Please upload CV (Resume) here Head-shot Photo must be placed on the top of CV.</label><br/>
                                    <input type="file" name="cv_file" class="form-control" /><br/>
                                    <p>You can use this text area to support or complement your application. Maximum capacity of 500pts. </p>
                                    <textarea class="form-control" name="cv_additional_text" style="height:300px;" maxlength="500"></textarea>
                                </div>
                            </div>

                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-10">
                            <label>Online Questions</label>
                            <br/>
                            <p>Tattoo: Do you have visible Tattoo? <strong>Yes</strong> <input type="radio" name="tatoo_yes" value="yes" /> <strong>No</strong> <input type="radio" name="tatoo_yes" value="Not" /> </p>
                        <p>Glasses: Can you Work without Glasses? (Contact lenses are acceptable) <strong>Yes</strong> <input type="radio" name="tatoo_yes" value="yes" /> <strong>No</strong> <input type="radio" name="tatoo_yes" value="Not" /> </p>
                        <p>Japanese: Do you agree that you have to study Japanese if hired for further carrier in this job? <strong>Yes</strong> <input type="radio" name="tatoo_yes" value="yes" /> <strong>No</strong> <input type="radio" name="tatoo_yes" value="Not" /> </p>
                        <p>Confirm: Have you submitted and uploaded all documents correctly? Otherwise you application will be disqualified. <strong>Yes</strong> <input type="radio" name="tatoo_yes" value="yes" /> <strong>No</strong> <input type="radio" name="tatoo_yes" value="Not" /> </p>
                              
                    
                    </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>

<script>
    $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


//according menu

$(document).ready(function()
{
    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');
	
	//Set The Accordion Content Width
	var contentwidth = $('.accordion-header').width();
	$('.accordion-content').css({});
	
	//Open The First Accordion Section When Page Loads
	$('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
	$('.accordion-content').first().slideDown().toggleClass('open-content');
	
	// The Accordion Effect
	$('.accordion-header').click(function () {
		if($(this).is('.inactive-header')) {
			$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
		
		else {
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
	});
	
	return false;
});
    </script>
</body>
</html>