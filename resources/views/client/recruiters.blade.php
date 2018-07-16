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
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                           
                               
                                    @foreach($recruiters as $r)
                                    <tr>
                                    <td>{{$r->name}}</td>
                                        <td>{{$r->email}}</td>
                                    <td>                     <a class="btn-sm btn-info" href="{{route('editRecruiter',['id' => $r->id])}}">
                                                <i class="material-icons">mode_edit</i>
                                                Edit
                                            </a></td>
                                            <td>
                                            <a class="btn-sm btn-danger" href="{{route('deleteRecruiter',['id' => $r->id])}}">
                                                <i class="material-icons">delete</i>
                                        
                                                            Delete
                                                        </a>
                                            </td>
                        
                                    </tr>
                                    @endforeach
        
        
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
@endsection