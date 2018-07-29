@extends('client.clientlayout')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card card-topline-aqua">
                <div class="card-head">
                    <header></header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                <div class="table-scrollable">
                    <table id="example1" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                    <th>ID</th>
                                    <th>Passport</th>
                            </tr>
                        </thead>
                        <tbody>
                   
                       

                                @foreach($forms as $f)
                                <tr>
                                <td>{{$f->id}}</td>
                                <td class="center"><a style="color:white;" onclick="smalWindow(this); return false;" href="{{URL::asset('/uploads')}}/{{$f->passportFileName}}"><i class="material-icons">attachment</i> &nbsp; {{$f->passportFileName}}</a></td>
                                </tr>
                    @endforeach


                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            function smalWindow(link){
                var x = screen.width/2 - 700/2;
        var y = screen.height/2 - 450/2;
                window.open(link.href,'targetWindow', "toolbar=no,location=no,position=center,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600px,height=400px,left="+x+",top="+y+"");
    
               
            }
        </script>
@endsection