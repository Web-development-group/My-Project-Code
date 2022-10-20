@extends('App.layout.doctor_layout')
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
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="center">P_Name</th>
                                            <th class="center">P_Phone</th>
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
                                                <td class="center">{{ $data->firstname.' '.$data->lastname }}</td>
                                                <td class="center">{{ $data->phone }}</td>
                                                <td class="center">{{ $data->subject }}</td>
                                                <td class="center">{{ $data->message }}</td>
                                                <td class="center">{{ $data->response }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->created)) }}</td>
                                                <td class="center">{{ date('d-M-Y', strtotime($data->updated)) }}</td>
                                                <td class="center">
                                                    <button class="btn tblActnBtn" data-toggle="modal"
                                                        data-target="#edit-form{{ $data->id }}">>
                                                        <i class="material-icons">reply</i>
                                                    </button>
                                                    <div class="modal fade" id="edit-form{{ $data->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="formModal"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="formModal">Reply
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <form method="POST"
                                                                        id="request-form{{ $data->id }}"
                                                                        action="{{ route('doctor.store.response', ['id' => $data->id]) }}"
                                                                        enctype="multipart/form-data"
                                                                        onsubmit="return validateRequest({{ $data->id }})">
                                                                        @method('PUT')
                                                                        @csrf

                                                                        <label for="response">Response</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <textarea name="response" class="form-control" cols="30" rows="10">
                                                                                    {{ $data->response}}
                                                                                </textarea>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        form="request-form{{ $data->id }}"
                                                                        class="btn btn-info waves-effect">Save</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger waves-effect"
                                                                        data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
