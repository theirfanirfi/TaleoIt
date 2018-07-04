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
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="{{URL::asset('img/taleo/taleo.png') }}" class="hidden-md"/>
                <span>ToleoIt</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{Auth::user()->name}}</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{route('profile')}}">Profile</a></li>
                    <li class="divider"></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->


            
            <!-- Notification dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-bell blue"></i><span class="hidden-sm hidden-xs"></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="glyphicon glyphicon-bullhorn green"></i>  Form Submitted</a></li>
                    <li class="divider"></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
               <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button> -->
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->
<!--
            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul> -->

        </div>
    </div>
    <!-- topbar ends -->