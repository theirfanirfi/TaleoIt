@extends('client.clientlayout')
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-1">
    <a href="{{route('cvs',['status' => $status])}}" style="color:white;">
        <i class="material-icons" style="font-size:120px;">folder</i>
        <p style="margin-left:24px;">CVs</p>
        </a>
    </div>
<div class="col-md-1"></div>
    <div class="col-md-1">
    <a href="{{route('passports',['status' => $status])}}" style="color:white;">
            <i class="material-icons" style="font-size:120px;">folder</i>
            <p style="margin-left:14px;">Passports</p>
            </a>
        </div>

<div class="col-md-1"></div>
<div class="col-md-2">
        <a href="{{route('toeicscorecard',['status' => $status])}}" style="color:white;">
        <i class="material-icons" style="font-size:120px;">folder</i>
        <p style="margin-left:06px;">TOEIC Score Cards</p>
        </a>
    </div>


</div>
@endsection