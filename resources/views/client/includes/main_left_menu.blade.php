<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                    <li><a class="ajax-link" href="{{route('client')}}"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                    </li>

                    <li>
                    <a class="ajax-link" href="{{route('forms')}}"><i class="glyphicon glyphicon-user"></i><span> Submitted Forms</span></a>
                    </li>

                    <li>
                            <a class="ajax-link" href="{{route('finalinterview')}}"><i class="glyphicon glyphicon-user green"></i><span> Final Interview</span></a>
                    </li>

                    <li>
                            <a class="ajax-link" href="{{route('prescreening')}}"><i class="glyphicon glyphicon-user yellow"></i><span> Pre Screening </span></a>
                    </li>

                    <li>
                            <a class="ajax-link" href="{{route('rejected')}}"><i class="glyphicon glyphicon-user red"></i><span> Rejected</span></a>
                    </li>

                    <li>
                            <a class="ajax-link" href="{{route('hired')}}"><i class="glyphicon glyphicon-user red"></i><span> Hired</span></a>
                    </li>

                    <li>
                            <a class="ajax-link" href="{{route('screened')}}"><i class="glyphicon glyphicon-user red"></i><span> Screened </span></a>
                            <a class="ajax-link" href="{{route('wdApps')}}"><i class="glyphicon glyphicon-user red"></i><span> Widthdrawn Applications </span></a>
                    </li>
                    
                    <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Recruiters </span></a>
                            <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{route('addRecruiter')}}">Add Recuriter</a></li>
                            <li><a href="{{route('recruiters')}}">Recruiters</a></li>
                            </ul>
                        </li>
                      
                    </ul>
                  <!--  <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox" style="display:none;"></label>
                -->
            </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->
