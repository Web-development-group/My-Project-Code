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
                                <a href="#" onClick="return false;">Appointment List</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div>
                        <button class="btn-hover color-7" type="button" data-toggle="modal" data-target="#patients-form">
                            Add New &nbsp;<span class="fa fa-plus"></span>
                        </button>
                        <div class="modal fade" id="patients-form" tabindex="-1" role="dialog" aria-labelledby="formModal"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formModal">Add New Appointment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="patient-form" action="{{ route('store.appointment') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="doctor">Doctor</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="doctor" id="" class="form-control">
                                                        @foreach ($doctors as $d)
                                                            <option value="{{ $d->id }}">
                                                                {{ $d->firstname . ' ' . $d->lastname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="start_time">Start Time</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="time" id="start_time" name="start_time"
                                                        class="form-control" placeholder="Enter your Start Time">
                                                </div>
                                            </div>

                                            <label for="end_time">End Time</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="time" id="end_time" name="end_time"
                                                        class="form-control" placeholder="Enter your End Time">
                                                </div>
                                            </div>

                                            <label for="no_patient">No Of Patients</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" id="no_patient" name="no_patient"
                                                        class="form-control" placeholder="Enter you Number Of Patients">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" form="patient-form"
                                            class="btn btn-info waves-effect">Save</button>
                                        <button type="button" class="btn btn-danger waves-effect"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
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
                                            <th class="center">Patients</th>
                                            <th class="center">Created</th>
                                            <th class="center">Updated</th>
                                            <th class="center">Actions</th>
                                            <th class="center">Patients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $data)
                                            <tr>
                                                <td class="text-center"> {{ $data->id }} </td>
                                                <td class="table-img center">
                                                    <img src="{{ asset($data->photo) }}" width="50" alt="">
                                                </td>
                                                <td class="center">{{ $data->firstname . ' ' . $data->lastname }}</td>
                                                <td class="center">{{ date('h:i a', strtotime($data->start_time)) }}</td>
                                                <td class="center">{{ date('h:i a', strtotime($data->end_time)) }}</td>
                                                <td class="center">{{ $data->number_patient }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->created)) }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->updated)) }}</td>
                                                <td class="center">
                                                    <button class="btn tblActnBtn" data-toggle="modal"
                                                        data-target="#edit-form{{ $data->id }}">>
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <div class="modal fade" id="edit-form{{ $data->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="formModal"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="formModal">Edit
                                                                        Appointment
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <form method="POST"
                                                                        id="appointment-form{{ $data->id }}"
                                                                        action="{{ route('update.appointment', ['id' => $data->id]) }}"
                                                                        enctype="multipart/form-data"
                                                                        onsubmit="return validateAppointment({{ $data->id }})">
                                                                        @method('PUT')
                                                                        @csrf

                                                                        <label for="doctor">Doctor</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <select name="doctor" id="doctor"
                                                                                    class="form-control">
                                                                                    @foreach ($doctors as $d)
                                                                                        <option
                                                                                            @if ($data->doctor_id == $d->id) {{ 'selected' }} @endif
                                                                                            value="{{ $d->id }}">
                                                                                            {{ $d->firstname . ' ' . $d->lastname }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <label for="start_time">Start Time</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="time" id="start_time"
                                                                                    value="{{ $data->start_time }}"
                                                                                    name="start_time" class="form-control"
                                                                                    placeholder="Enter your Start Time">
                                                                            </div>
                                                                        </div>

                                                                        <label for="end_time">End Time</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="time" id="end_time"
                                                                                    value="{{ $data->end_time }}"
                                                                                    name="end_time" class="form-control"
                                                                                    placeholder="Enter your End Time">
                                                                            </div>
                                                                        </div>

                                                                        <label for="no_patient">No Of Patients</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="number" id="no_patient"
                                                                                    value="{{ $data->number_patient }}"
                                                                                    name="no_patient" class="form-control"
                                                                                    placeholder="Enter you Number Of Patients">
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        form="appointment-form{{ $data->id }}"
                                                                        class="btn btn-info waves-effect">Save</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger waves-effect"
                                                                        data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('trash.appointment',['id' => $data->id])}}" onclick="deleteMsg('Are You Sure To Delete Doctor?')">
                                                        <button class="btn tblActnBtn">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </a>
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('show.appointment.patient', ['id' => $data->id]) }}">
                                                        <button class="btn tblActnBtn">
                                                            <i class="fa fa-users"></i>
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
