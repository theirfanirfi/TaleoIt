      <!-- start page container -->
      <div class="page-container">
        <!-- start sidebar menu -->
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
               <div id="remove-scroll" class="left-sidemenu">
                   <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                       <li class="sidebar-toggler-wrapper hide">
                           <div class="sidebar-toggler">
                               <span></span>
                           </div>
                       </li>
                       <li class="sidebar-user-panel">
                           <div class="user-panel">
                               <div class="pull-left image">
                                   <img src="{{ URL::asset('assets/img/dp.jpg') }}" class="img-circle user-img-circle" alt="User Image" />
                               </div>
                               <div class="pull-left info">
                               <p>{{Auth::user()->name}}</p>
                                   <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
                               </div>
                           </div>
                       </li>


                       <li class="nav-item start ">
                       <a href="{{route('client')}}" class="nav-link">
                               <i class="material-icons">dashboard</i>
                               <span class="title">Dashboard</span>
                            
                           </a>
                       </li>

                       @if(Session('Access') == 1)
                       <li class="nav-item start ">
                            <a href="{{route('forms')}}" class="nav-link">
                                    <i class="material-icons">folder_shared</i>
                                    <span class="title">Total Applications</span>
                                 
                                </a>
                            </li>

                       <li class="nav-item">
                            <a href="{{route('prescreening')}}" class="nav-link">
                                    <i class="material-icons">star</i>
                                    <span class="title">Pre-Screening</span>
                                 
                                </a>
                            </li>

                    
                            <li class="nav-item">
                                    <a href="{{route('screened')}}" class="nav-link">
                                            <i class="material-icons">cloud_done</i>
                                            <span class="title">Screened</span>
                                         
                                        </a>
                                    </li>

                       <li class="nav-item">
                            <a href="{{route('finalinterview')}}" class="nav-link">
                                    <i class="material-icons">person_add</i>
                                    <span class="title">Final Interview</span>
                                 
                                </a>
                            </li>

                            <li class="nav-item">
                                    <a href="{{route('hired')}}" class="nav-link">
                                            <i class="material-icons">mood</i>
                                            <span class="title">Hired</span>
                                         
                                        </a>
                                    </li>


                        
                                    <li class="nav-item">
                                            <a href="{{route('rejected')}}" class="nav-link">
                                                    <i class="material-icons">mood_bad</i>
                                                    <span class="title">Rejected</span>
                                                 
                                                </a>
                                            </li>


                                            <li class="nav-item">
                                                    <a href="{{route('wdApps')}}" class="nav-link">
                                                            <i class="material-icons">blur_on</i>
                                                            <span class="title">Withdrawn Applications</span>
                                                         
                                                        </a>
                                                    </li>

                                                    @endif
                                                    <li class="nav-item">
                                                            <a href="{{route('documents')}}" class="nav-link">
                                                                    <i class="material-icons">cloud</i>
                                                                    <span class="title">Documents</span>
                                                                 
                                                                </a>
                                                            </li>
                                                        
                                                            @if(Session('Access') == 1)
                                            <li class="nav-item">
                                                    <a href="#" class="nav-link nav-toggle">
                                                            <i class="material-icons">people</i>
                                                            <span class="title">Recruiters</span>
                                                            <span class="arrow"></span>
                                                         
                                                        </a>

                                                        <ul class="sub-menu">
                                                                <li class="nav-item">

                                                                <a href="{{route('addRecruiter')}}" class="nav-link "> <span class="title">
                                                                    
                                                                    Add Recruiter</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                <a href="{{route('recruiters')}}" class="nav-link "> <span class="title">Recruiters</span>
                                                                    </a>
                                                                </li>
                                                        </ul>
                                                    </li>
                                        @endif


                   </ul>
               </div>
           </div>
       </div>
        <!-- end sidebar menu -->