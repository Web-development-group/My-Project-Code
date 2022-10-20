@extends('App.layout.patient_layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Blank</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="../../index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Extra</a>
                            </li>
                            <li class="breadcrumb-item active">Blank</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                @foreach ($result as $data)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="img">
                                                <img src="{{ asset($data->photo) }}" height="150" width="120"
                                                    alt="">
                                            </div>
                                            <div>
                                                <h5 class=" text-lift">{{ $data->firstname . ' ' . $data->lastname }}</h5>
                                            </div>
                                            <div class="table table-hover">
                                                <table>
                                                    <tr>
                                                        <th>Phone No</th>
                                                        <td>{{$data->phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Start Time</th>
                                                        <td>{{$data->start_time}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>End Time</th>
                                                        <td>{{$data->end_time}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Available seat</th>
                                                        <td>{{$data->number_patient}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created</th>
                                                        <td>{{$data->created}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div>
                                                <a href="{{ route('patient.set.appointment',['id'=>$data->id])}}" class="btn btn-primary"> Set Appointment </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
