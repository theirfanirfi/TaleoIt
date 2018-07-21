@extends('client.clientlayout')
@section('content')
<div class="row">

  @if(Session('Access') == 1)
      <div class="col-xl-3 col-md-6 col-12">
            <a style="color:white;" href="{{route('forms')}}">
                <div class="info-box bg-b-yellow">
                  <span class="info-box-icon push-bottom"><i class="material-icons">folder_shared</i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Applicants</span>
                  <span class="info-box-number">{{$submitted}}</span>
                  <!--  <div class="progress">
                      <div class="progress-bar" style="width: 45%"></div>
                    </div>
                    <span class="progress-description">
                          45% Increase in 28 Days
                        </span> -->
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </a>
                <!-- /.info-box -->

              </div>


              <div class="col-xl-3 col-md-6 col-12">
                    <a style="color:white;" href="{{route('finalinterview')}}">
                    <div class="info-box bg-b-green">
                      <span class="info-box-icon push-bottom"><i class="material-icons">person_add</i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Final Interview</span>
                      <span class="info-box-number">{{$final}}</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                </a>
                    <!-- /.info-box -->
                  </div>


            
                  <div class="col-xl-3 col-md-6 col-12">
                    <a style="color:white;" href="{{route('hired')}}">
                        <div class="info-box bg-b-blue">
                          <span class="info-box-icon push-bottom"><i class="material-icons">mood</i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Hired</span>
                          <span class="info-box-number">{{$hired}}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </a>
                        </div>
                        <!-- /.info-box -->
                      </div>

                
              <div class="col-xl-3 col-md-6 col-12">
                    <a style="color:white;" href="{{route('prescreening')}}">
                    <div class="info-box bg-b-pink">
                      <span class="info-box-icon push-bottom"><i class="material-icons">star</i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Pre-Screening</span>
                      <span class="info-box-number">{{$pre}}</span>
                      </div>
                      <!-- /.info-box-content -->
                    </a>
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="col-xl-3 col-md-6 col-12">
                    <a style="color:white;" href="{{route('screened')}}">
                        <div class="info-box bg-b-blue">
                          <span class="info-box-icon push-bottom"><i class="material-icons">cloud_done</i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Screened</span>
                          <span class="info-box-number">{{$screened}}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </a>
                        </div>
                        <!-- /.info-box -->
                      </div>

                      <div class="col-xl-3 col-md-6 col-12">
                           <a style="color:white;" href="{{route('rejected')}}">
                            <div class="info-box bg-b-pink">
                              <span class="info-box-icon push-bottom"><i class="material-icons">mood_bad</i></span>
                              <div class="info-box-content">
                                <span class="info-box-text">Rejected</span>
                              <span class="info-box-number">{{$rejected}}</span>
                              </div>
                              <!-- /.info-box-content -->
                            </a>
                            </div>
                            <!-- /.info-box -->
                          </div>

                          <div class="col-xl-3 col-md-6 col-12">
                               <a style="color:white;" href="{{route('wdApps')}}">
                                <div class="info-box bg-b-yellow">
                                  <span class="info-box-icon push-bottom"><i class="material-icons">blur_on</i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text">Withdrawn</span>
                                  <span class="info-box-number">{{$rejected}}</span>
                                  </div>
                                  <!-- /.info-box-content -->
                                </a>
                                </div>
                                <!-- /.info-box -->
                              </div>
@endif

                        
                              <div class="col-xl-3 col-md-6 col-12">
                                   <a style="color:white;" href="{{route('documents')}}">
                                    <div class="info-box bg-b-green">
                                      <span class="info-box-icon push-bottom"><i class="material-icons">cloud</i></span>
                                      <div class="info-box-content">
                                        <span class="info-box-text">Documents</span>
                                      <span class="info-box-number">Click to View</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </a>
                                    </div>
                                    <!-- /.info-box -->
                                  </div>

                                
                                  @if(Session('Access') == 1)
                                                        
                              <div class="col-xl-3 col-md-6 col-12">
                                    <a style="color:white;" href="{{route('recruiters')}}">
                                    <div class="info-box bg-b-pink">
                                      <span class="info-box-icon push-bottom"><i class="material-icons">people</i></span>
                                      <div class="info-box-content">
                                        <span class="info-box-text">Recruiters</span>
                                      <span class="info-box-number">{{0}}</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </a>
                                    </div>
                                    <!-- /.info-box -->
                                  </div>

                                  @endif
                  
</div>
@endsection