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
                                <a href="">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Request</a>
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
                                        <h5 class="modal-title" id="formModal">Add New Request</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="patient-form" action="{{ route('patient.store.request') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <label for="subject">Doctor List</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="doctor" class="form-control" id="">
                                                        @foreach ($doctors as $d)
                                                            <option value="{{ $d->id }}">
                                                                {{ $d->firstname . ' ' . $d->lastname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <label for="subject">Subject:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="subject" name="subject" class="form-control"
                                                        placeholder="Enter your Subject">
                                                </div>
                                            </div>

                                            <label for="message">Message:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea name="message" class="form-control" id="message" cols="10" rows="5"></textarea>
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
                                            <th class="center">D_Name</th>
                                            <th class="center">Subject</th>
                                            <th class="center" style="width: 25%;">Request</th>
                                            <th class="center"style="width: 25%;">Response</th>
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
                                                <td class="center">{{ $data->firstname . ' ' . $data->lastname }}</td>
                                                <td class="center">{{ $data->subject }}</td>
                                                <td class="center">{{ $data->message }}</td>
                                                <td class="center">{{ $data->response }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->created)) }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->updated)) }}</td>
                                                <td class="center noprint">
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
                                                                    <h5 class="modal-title" id="formModal">Edit Request
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <form method="POST"
                                                                        id="patient-form{{ $data->id }}"
                                                                        action="{{ route('patient.update.request', ['id' => $data->id]) }}"
                                                                        enctype="multipart/form-data"
                                                                        onsubmit="return validatePatient({{ $data->id }})">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <label for="subject">Doctor List</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <select name="doctor"
                                                                                    class="form-control" id="">
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

                                                                        <label for="subject">Subject:</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="subject"
                                                                                    name="subject"
                                                                                    value="{{ $data->subject }}"
                                                                                    class="form-control"
                                                                                    placeholder="Enter your Subject">
                                                                            </div>
                                                                        </div>

                                                                        <label for="message">Message:</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <textarea name="message" class="form-control" id="message" cols="10" rows="5">{{ $data->message }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        form="patient-form{{ $data->id }}"
                                                                        class="btn btn-info waves-effect">Save</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger waves-effect"
                                                                        data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('patient.destroy.request', ['id' => $data->id]) }}"
                                                        onclick="deleteMsg('Are You Sure To Delete Request?')">
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
