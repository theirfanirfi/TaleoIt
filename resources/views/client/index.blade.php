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
<ul class="breadcrumb">
<li>
    <a href="#">Dashboard</a>
</li>
<li>
   
</li>
</ul>
<div class="dropdown" style="margin-bottom:4px;">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      Export
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="{{route('exportSubmittedXL')}}">Export All Submitted Applications</a></li>
    <li><a href="{{route('exportFinalXL')}}">Export Final Interview</a></li>
      <li><a href="{{route('exportPreXL')}}">Export Pre-Scanning</a></li>
      <li><a href="{{route('exportScanned')}}">Export Screened</a></li>
      <li><a href="{{route('exportHired')}}">Export Hired</a></li>
      <li><a href="{{route('exportRejectedXL')}}">Export Rejected</a></li>
    </ul>
  </div>
</div>

<div class="row">



        <div class="col-md-3 col-sm-3 col-xs-6">
                <a data-toggle="tooltip" title="" class="well top-block" href="{{route('forms')}}">
                    <i class="glyphicon glyphicon-user blue"></i>
        
                    <div>Total Applications</div>
                <div>{{$submitted}}</div>
                  <!--  <span class="notification"></span> -->
                </a>
            </div>


        
            <div class="col-md-3 col-sm-3 col-xs-6">
                    <a data-toggle="tooltip" title="" class="well top-block" href="{{route('finalinterview')}}">
                        <i class="glyphicon glyphicon-star green"></i>
            
                        <div>Final Interview</div>
                    <div>{{$final}}</div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="" class="well top-block" href="{{route('prescreening')}}">
                            <i class="glyphicon glyphicon-user red"></i>
                
                            <div>Pre Screening</div>
                        <div>{{$pre}}</div>
                        </a>
                    </div>   
                    
                    <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="" class="well top-block" href="{{route('screened')}}">
                                <i class="glyphicon glyphicon-user yellow"></i>
                    
                                <div>Screened</div>
                            <div>{{$screened}}</div>
                            </a>
                        </div>   

                        <div class="col-md-3 col-sm-3 col-xs-6">
                                <a data-toggle="tooltip" title="" class="well top-block" href="{{route('hired')}}">
                                    <i class="glyphicon glyphicon-user green"></i>
                        
                                    <div>Hired</div>
                                <div>{{$hired}}</div>
                                </a>
                            </div> 
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                    <a data-toggle="tooltip" title="" class="well top-block" href="{{route('rejected')}}">
                                        <i class="glyphicon glyphicon-user red"></i>
                            
                                        <div>Rejected</div>
                                    <div>{{$rejected}}</div>
                                    </a>
                                </div> 
                
                
</div>

<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


<hr>
@endsection