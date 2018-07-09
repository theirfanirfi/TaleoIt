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
</ul>
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