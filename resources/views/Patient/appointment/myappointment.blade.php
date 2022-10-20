@extends('App.layout.patient_layout')
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
                                <a href="#" onClick="return false;">Patient List</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#" onClick="doPrint('patients')">Print</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Excel</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">PDF</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive" id="patients">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center">ID</th>
                                            <th class="center">Image</th>
                                            <th class="center">First Name</th>
                                            <th class="center">Last Name</th>
                                            <th class="center">Phone</th>
                                            <th class="center">Start Time</th>
                                            <th class="center">End Time</th>
                                            <th class="center">Registed Date</th>
                                            <th class="center noprint">Actions</th>
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
                                                <td class="center">{{ $data->start_time }}</td>
                                                <td class="center">{{ $data->end_time }}</td>
                                                <td class="center">{{ $data->phone }}</td>
                                                <td class="center">{{ $data->created }}</td>
                                                <td class="center noprint">

                                                    <a href="{{ route('trash.patient',['id' => $data->id])}}" onclick="deleteMsg('Are You Sure To Delete Patient?')">
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
