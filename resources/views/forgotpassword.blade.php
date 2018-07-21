<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Forgot Password</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{URL::asset('ts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{URL::asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">
    <!-- bootstrap -->
	<link href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/pages/extra_pages.css') }}">
       <!-- The fav icon -->
       <link rel="shortcut icon" href="{{URL::asset('img/taleo/taleo.png') }}">


    <link href="{{ URL::asset('css/jquery.noty.css') }}" rel='stylesheet'>
    <link href="{{ URL::asset('css/noty_theme_default.css') }}" rel='stylesheet'>


</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{route('credentialsAnswered')}}" method="post">
				<!--	<span class="login100-form-logo">
						<img alt="" src="../assets/img/logo-2.png">
					</span> -->
					<!-- <span class="login100-form-title  p-t-27">
						Forgot Your Password?
					</span> -->
					<p class="text-center txt-small-heading">
                        Forgot Your Password? Let Us Help You. <br/>
                        Enter the Required Credentials to reset your password.
					</p>
					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="email" name="email" placeholder="Enter Your Email Address">
				
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "">
                            <select name="security" class="" style="padding:12px 1px;">
                                    <option value="">Select a question from the following options.</option>
                                    <option value="1">Who's your daddy?</option>
                                    <option value="2">What is your favorite color?</option>
                                    <option value="3">What is your mother's favorite aunt's favorite color?</option>
                                    <option value="4">Where does the rain in Spain mainly fall?</option>
                                    <option value="5">If Mary had three apples, would you steal them?</option>
                                    <option value="6">What brand of food did your first pet eat?</option>
                                 </select>
                    </div>

                    @csrf
					<div class="wrap-input100 validate-input" data-validate = "Enter Answer">
                            <input type="password" class="input100" name="answer" placeholder="Enter Your Answer">
                           
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Reset
						</button>
					</div>
					<div class="text-center p-t-27">
                    <a class="txt1" href="{{route('login')}}">
							Login?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- start js include path -->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
    <!-- bootstrap -->
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ URL::asset('assets/js/pages/extra-pages/pages.js') }}" ></script>
    <!-- end js include path -->
    <script src="{{URL::asset('js/jquery.noty.js') }}"></script>
    @if(Session('error'))
<script>
    
noty({"text":"{{Session('error')}}","layout":"center","type":"error"});

    </script>
@endif
</body>
</html>
