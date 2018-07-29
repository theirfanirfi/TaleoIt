@extends('client.clientlayout')
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-1">
        <a href="{{route('docsubmitted')}}" style="color:white;">
        <i class="material-icons" style="font-size:120px;">folder</i>
        <p style="margin-left:24px;">Submitted</p>
        </a>
    </div>
<div class="col-md-1"></div>
    <div class="col-md-1">
            <a href="{{route('docspre')}}" style="color:white;">
            <i class="material-icons" style="font-size:120px;">folder</i>
            <p style="margin-left:14px;">Pre-Screening</p>
            </a>
        </div>

<div class="col-md-1"></div>
<div class="col-md-1">
<a href="{{route('docscreened')}}" style="color:white;">
        <i class="material-icons" style="font-size:120px;">folder</i>
        <p style="margin-left:24px;">Screened</p>
        </a>
    </div>

    <div class="col-md-1"></div>
    <div class="col-md-1">
            <a href="{{route('docsfinal')}}" style="color:white;">
            <i class="material-icons" style="font-size:120px;">folder</i>
            <p style="margin-left:24px;">Final Interview</p>
            </a>
        </div>  
    
        <div class="col-md-1"></div>
        <div class="col-md-1">
                <a href="{{route('docshired')}}" style="color:white;">
                <i class="material-icons" style="font-size:120px;">folder</i>
                <p style="margin-left:24px;">Hired</p>
                </a>
            </div>
</div>


<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-1">
                <a href="{{route('docsrejected')}}" style="color:white;">
                <i class="material-icons" style="font-size:120px;">folder</i>
                <p style="margin-left:24px;">Rejected</p>
                </a>
            </div>
</div>

<div class="container">
<div class="row">

        <div class="col-xl-3 col-md-6 col-12">
                <a style="color:white;" href="{{route('allPassports')}}">
                <div class="info-box bg-b-yellow">
                  <span class="info-box-icon push-bottom"><i class="material-icons">folder</i></span>
                  <div class="info-box-content" style="padding:30px;">
                    <span class="info-box-text">All Passports</span>
                
                  </div>
                  <!-- /.info-box-content -->
                </div>
            </a>
                <!-- /.info-box -->
              </div>



              <div class="col-xl-3 col-md-6 col-12">
                    <a style="color:white;" href="{{route('allCvs')}}">
                    <div class="info-box bg-b-pink">
                      <span class="info-box-icon push-bottom"><i class="material-icons">folder</i></span>
                      <div class="info-box-content" style="padding:30px;">
                        <span class="info-box-text">All C.Vs</span>
                    
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                </a>
                    <!-- /.info-box -->
                  </div>


                  <div class="col-xl-3 col-md-6 col-12">
                        <a style="color:white;" href="{{route('allToeicScoreCards')}}">
                        <div class="info-box bg-b-green">
                          <span class="info-box-icon push-bottom"><i class="material-icons">folder</i></span>
                          <div class="info-box-content" style="padding:30px;">
                            <span class="info-box-text">TOEIC Score Cards</span>
                        
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                    </a>
                        <!-- /.info-box -->
                      </div>
</div>
</div>
@endsection