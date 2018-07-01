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
                <a data-toggle="tooltip" title="6 new Forms" class="well top-block" href="#">
                    <i class="glyphicon glyphicon-user blue"></i>
        
                    <div>Total Applications</div>
                    <div>507</div>
                    <span class="notification">6</span>
                </a>
            </div>


        
            <div class="col-md-3 col-sm-3 col-xs-6">
                    <a data-toggle="tooltip" title="" class="well top-block" href="#">
                        <i class="glyphicon glyphicon-star green"></i>
            
                        <div>Shortlisted Applicants</div>
                        <div>228</div>
                        <span class="notification green">4</span>
                    </a>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="" class="well top-block" href="#">
                            <i class="glyphicon glyphicon-user red"></i>
                
                            <div>Rejected Applicants</div>
                            <div>25</div>
                            <span class="notification red">12</span>
                        </a>
                    </div>    
                
                
</div>

<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


<hr>
@endsection