@extends('App.layout.admin_layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div>
                    @include('App.message.success')
                    @include('App.message.error')
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('admin.home')}}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="{{ route('appointment.list')}}" onClick="return true;">Appointment List</a>
                            </li>
                            <li class="breadcrumb-item active">Patient List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center">Image</th>
                                            <th class="center">Firstname</th>
                                            <th class="center">Lastname</th>
                                            <th class="center">Created</th>
                                            <th class="center">Updated</th>
                                            <th class="center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $data)
                                            <tr>
                                                <td class="text-center"> {{ $data->id }} </td>
                                                <td class="table-img center">
                                                    <img src="{{ asset($data->photo) }}" width="50" alt="">
                                                </td>
                                                <td class="center">{{ $data->firstname }}</td>
                                                <td class="center">{{ $data->lastname }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->created)) }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->updated)) }}</td>
                                                <td class="center">

                                                    <a href="{{ route('trash.appointment',['id' => $data->id])}}" onclick="deleteMsg('Are You Sure To Delete Doctor?')">
                                                        <button class="btn tblActnBtn">
                                                            <i class="material-icons">delete</i>
                                                        </button>
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
        </div>
    </section>
@endsection
