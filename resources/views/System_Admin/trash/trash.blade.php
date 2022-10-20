@extends('App.layout.admin_layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
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
                                <a href="#" onClick="return false;">Trash List</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Your content goes here  -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="profile-tab-box">
                            <div class="p-l-20">
                                <ul class="nav ">
                                    <li class="nav-item tab-all">
                                        <a class="nav-link active show" href="#patient" data-toggle="tab">Patients List</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#doctor" data-toggle="tab">Doctors List</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#appointment" data-toggle="tab">Appointments List</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="patient" aria-expanded="true">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <div class="body">
                                                <h2>Patient</h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover js-basic-example contact_list">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">ID</th>
                                                                <th class="center">Image</th>
                                                                <th class="center">First Name</th>
                                                                <th class="center">Last Name</th>
                                                                <th class="center">DOB</th>
                                                                <th class="center">Username</th>
                                                                <th class="center">Phone</th>
                                                                <th class="center">Email</th>
                                                                <th class="center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($patient as $data)
                                                                <tr>
                                                                    <td class="text-center"> {{ $data->id }} </td>
                                                                    <td class="table-img center">
                                                                        <img src="{{ asset($data->photo) }}" width="50"
                                                                            alt="">
                                                                    </td>
                                                                    <td class="center">{{ $data->firstname }}</td>
                                                                    <td class="center">{{ $data->lastname }}</td>
                                                                    <td class="center">{{ date('d-M-Y', strtotime($data->dob)) }}</td>
                                                                    <td class="center">{{ $data->username }}</td>
                                                                    <td class="center">{{ $data->phone }}</td>
                                                                    <td class="center">{{ $data->email }}</td>
                                                                    <td class="center">
                                                                        <a href="{{ route('restore.patient', ['id' => $data->id]) }}"
                                                                            onclick="deleteMsg('Are You Sure to Restore Patient?')">
                                                                            <button class="btn tblActnBtn"
                                                                                data-toggle="modal"
                                                                                data-target="#edit-form{{ $data->id }}">>
                                                                                <i class="material-icons">restore</i>
                                                                            </button>
                                                                        </a>

                                                                        <a href="{{ route('destroy.patient', ['id' => $data->id]) }}"
                                                                            onclick="deleteMsg('Are You Sure To Delete Patient?')">
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
                        </div>

                        <div role="tabpanel" class="tab-pane active" id="doctor" aria-expanded="true">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <div class="body">
                                                <h2>Doctor</h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover js-basic-example contact_list">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">ID</th>
                                                                <th class="center">Image</th>
                                                                <th class="center">First Name</th>
                                                                <th class="center">Last Name</th>
                                                                <th class="center">Degree</th>
                                                                <th class="center">DOB</th>
                                                                <th class="center">Username</th>
                                                                <th class="center">Phone</th>
                                                                <th class="center">Email</th>
                                                                <th class="center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($doctor as $data)
                                                                <tr>
                                                                    <td class="text-center"> {{ $data->id }} </td>
                                                                    <td class="table-img center">
                                                                        <img src="{{ asset($data->photo) }}"
                                                                            width="50" alt="">
                                                                    </td>
                                                                    <td class="center">{{ $data->firstname }}</td>
                                                                    <td class="center">{{ $data->lastname }}</td>
                                                                    <td class="center">{{ $data->degree }}</td>
                                                                    <td class="center">{{ date('d-M-Y', strtotime($data->dob)) }}</td>
                                                                    <td class="center">{{ $data->username }}</td>
                                                                    <td class="center">{{ $data->phone }}</td>
                                                                    <td class="center">{{ $data->email }}</td>
                                                                    <td class="center">
                                                                        <a href="{{ route('restore.doctor', ['id' => $data->id]) }}"
                                                                            onclick="deleteMsg('Are You Sure to Restore Doctor?')">
                                                                            <button class="btn tblActnBtn"
                                                                                data-toggle="modal"
                                                                                data-target="#edit-form{{ $data->id }}">>
                                                                                <i class="material-icons">restore</i>
                                                                            </button>
                                                                        </a>

                                                                        <a href="{{ route('destroy.doctor', ['id' => $data->id]) }}"
                                                                            onclick="deleteMsg('Are You Sure To Fully Delete Doctor?')">
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
                        </div>

                        <div role="tabpanel" class="tab-pane active" id="appointment" aria-expanded="false">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <div class="body">
                                                <h2>Appointment</h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover js-basic-example contact_list">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">#</th>
                                                                <th class="center">Image</th>
                                                                <th class="center">Doctor Name</th>
                                                                <th class="center">Start Time</th>
                                                                <th class="center">End Time</th>
                                                                <th class="center">No_Patients</th>
                                                                <th class="center">Created</th>
                                                                <th class="center">Updated</th>
                                                                <th class="center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($appointment as $data)
                                                                <tr>
                                                                    <td class="text-center"> {{ $data->id }} </td>
                                                                    <td class="table-img center">
                                                                        <img src="{{ asset($data->photo) }}"
                                                                            width="50" alt="">
                                                                    </td>
                                                                    <td class="center">
                                                                    {{ $data->firstname . ' ' . $data->lastname }}</td>
                                                                    <td class="center">{{ date('h:i a', strtotime($data->start_time)) }}</td>
                                                                    <td class="center">{{ date('h:i a', strtotime($data->end_time))}}</td>
                                                                    <td class="center">{{ $data->number_patient }}</td>
                                                                    <td class="center">{{ date('d-M-Y', strtotime($data->created)) }}</td>
                                                                    <td class="center">{{ date('d-M-Y', strtotime($data->updated)) }}</td>
                                                                    <td class="center">
                                                                        <a href="{{ route('restore.appointment', ['id' => $data->id]) }}"
                                                                            onclick="deleteMsg('Are You Sure to Restore Appointment?')">
                                                                            <button class="btn tblActnBtn"
                                                                                data-toggle="modal"
                                                                                data-target="#edit-form{{ $data->id }}">>
                                                                                <i class="material-icons">restore</i>
                                                                            </button>
                                                                        </a>

                                                                        <a href="{{ route('destroy.appointment', ['id' => $data->id]) }}"
                                                                            onclick="deleteMsg('Are You Sure To Fully Delete Appointment?')">
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
                        </div>
                    </div>
    </section>
@endsection
