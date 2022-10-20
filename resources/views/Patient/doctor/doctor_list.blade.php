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
                                        <div class="card text-center">
                                            <div class="img">
                                                <img src="{{ asset($data->photo) }}" height="150" width="120"
                                                    alt="">
                                            </div>
                                            <div>
                                                <h5>{{ $data->firstname . ' ' . $data->lastname }}</h5>
                                                <p>
                                                    Dr. {{ $data->lastname }} has graduated in {{ $data->degree }}. and his
                                                    Phone number is {{ $data->phone }} also his email is
                                                    {{ $data->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#request-form{{ $data->id}}"> Request </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="request-form{{ $data->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="formModal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="formModal">Add New Request</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" id="req-form{{ $data->id}}"
                                                        action="{{ route('patient.set.request',['id' => $data->id]) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <label for="subject">Subject:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" id="subject" name="subject"
                                                                    class="form-control"
                                                                    placeholder="Enter your Subject">
                                                            </div>
                                                        </div>
                                                        <label for="message">Message:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <textarea name="message" class="form-control" id="" cols="10" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" form="req-form{{ $data->id}}"
                                                        class="btn btn-info waves-effect">Save</button>
                                                    <button type="button" class="btn btn-danger waves-effect"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
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
