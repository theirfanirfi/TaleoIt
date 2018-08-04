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
                                    <th>CV</th>
                            </tr>
                        </thead>
                        <tbody>
                   
                       

                                @foreach($forms as $f)
                                <tr>
                                <td>{{$f->id}}</td>
                                <td class="center"><a style="color:white;" href="{{URL::to('/file')}}/{{$form->cvFileName}}"><i class="material-icons">attachment</i> &nbsp; {{$f->cvFileName}}</a></td>
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

    </script>
@endsection