<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>TaleoIt - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TaleoIt">
    <meta name="author" content="Irfan Ullah">

        <!-- The styles -->
        <link id="bs-css" href="{{URL::asset('css/bootstrap-cerulean.min.css') }}" rel="stylesheet">
        <link href="{{URL::asset('css/bootstrap-cerulean.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('css/charisma-app.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.print.css') }}" rel='stylesheet' media='print'>
        <link href="{{ URL::asset('bower_components/chosen/chosen.min.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('bower_components/colorbox/example3/colorbox.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('bower_components/responsive-tables/responsive-tables.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('css/jquery.noty.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('css/noty_theme_default.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('css/elfinder.min.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('css/elfinder.theme.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('css/jquery.iphone.toggle.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('css/uploadify.css') }}" rel='stylesheet'>
        <link href="{{ URL::asset('css/animate.min.css') }}" rel='stylesheet'>
    
        <!-- jQuery -->
        <script src="{{ URL::asset('bower_components/jquery/jquery.min.js') }}"></script>
    
        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    
        <!-- The fav icon -->
        <link rel="shortcut icon" href="{{URL::asset('img/taleo/taleo.png') }}">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to TaleoIt</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                    <p>Register with TaleoIt</p>
            </div>
        <form class="form-horizontal" action="{{route('registerClient')}}" method="post" id="register">
                <fieldset>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user green"></i></span>
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="clearfix"></div><br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-email green">@</i></span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    @csrf
                    <div class="clearfix"></div><br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock green"></i></span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit"  class="btn btn-primary">Register</button>
                    <a href="{{route('login')}}" class="btn btn-secondary">Login</a>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->



<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- library for cookie management -->
<script src="{{URL::asset('js/jquery.cookie.js') }}"></script>
<!-- calender plugin -->
<script src="{{URL::asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{URL::asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<!-- data table plugin -->
<script src="{{URL::asset('js/jquery.dataTables.min.js') }}"></script>

<!-- select or dropdown enhancer -->
<script src="{{URL::asset('bower_components/chosen/chosen.jquery.min.js') }}"></script>
<!-- plugin for gallery image view -->
<script src="{{URL::asset('bower_components/colorbox/jquery.colorbox-min.js') }}"></script>
<!-- notification plugin -->
<script src="{{URL::asset('js/jquery.noty.js') }}"></script>
<!-- library for making tables responsive -->
<script src="{{URL::asset('bower_components/responsive-tables/responsive-tables.js') }}"></script>
<!-- tour plugin -->
<script src="{{URL::asset('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>
<!-- star rating plugin -->
<script src="{{URL::asset('js/jquery.raty.min.js') }}"></script>
<!-- for iOS style toggle switch -->
<script src="{{URL::asset('js/jquery.iphone.toggle.js') }}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{URL::asset('js/jquery.autogrow-textarea.js') }}"></script>
<!-- multiple file upload plugin -->
<script src="{{URL::asset('js/jquery.uploadify-3.1.min.js') }}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{URL::asset('js/jquery.history.js') }}"></script>
<!-- application script for Charisma demo -->
<script src="{{URL::asset('js/charisma.js') }}"></script>
<script src="{{URL::asset('js/script.js') }}"></script>
@if(Session('error'))
<script>
    
noty({"text":"{{Session('error')}}","layout":"center","type":"error"});

    </script>
@endif
</body>
</html>
