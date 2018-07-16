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
@endsection