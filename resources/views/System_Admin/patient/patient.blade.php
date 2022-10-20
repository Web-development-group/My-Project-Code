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
                                <a href="#" onClick="return false;">Patient List</a>
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
                                        <h5 class="modal-title" id="formModal">Add New Patient</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="patient-form" action="{{ route('store.patient') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="firstname">First Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="firstname" name="firstname"
                                                        class="form-control" placeholder="Enter your First Name">
                                                </div>
                                            </div>

                                            <label for="lastname">Last Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="lastname" name="lastname"
                                                        class="form-control" placeholder="Enter your Last Name">
                                                </div>
                                            </div>

                                            <label for="dob">Date Of Birth</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" id="dob" name="dob" class="form-control"
                                                        placeholder="Enter your Date Of Birth">
                                                </div>
                                            </div>

                                            <label for="username">User Name</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="username" name="username"
                                                        class="form-control" placeholder="Enter your User Name">
                                                </div>
                                            </div>

                                            <label for="phone">Phone Number</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" id="phone" name="phone" class="form-control"
                                                        placeholder="Enter your Phone Number">
                                                </div>
                                            </div>

                                            <label for="email">Email</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" id="email" name="email" class="form-control"
                                                        placeholder="Enter your Email">
                                                </div>
                                            </div>

                                            <label for="password">Password</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="password" name="password"
                                                        class="form-control" placeholder="Enter your Password">
                                                </div>
                                            </div>

                                            <label for="photo">Photo</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" id="photo" name="photo"
                                                        class="form-control" placeholder="Enter your Photo">
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
                                            <th class="center">DOB</th>
                                            <th class="center">Username</th>
                                            <th class="center">Phone</th>
                                            <th class="center">Email</th>
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
                                                <td class="center">{{ date('d-M-Y', strtotime($data->dob)) }}</td>
                                                <td class="center">{{ $data->username }}</td>
                                                <td class="center">{{ $data->phone }}</td>
                                                <td class="center">{{ $data->email }}</td>
                                                <td class="center noprint">
                                                    <button class="btn tblActnBtn" data-toggle="modal" data-target="#edit-form{{$data->id}}">>
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                    <div class="modal fade" id="edit-form{{$data->id}}" tabindex="-1"
                                                        role="dialog" aria-labelledby="formModal" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="formModal">Edit Patient
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <form method="POST" id="patient-form{{$data->id}}"
                                                                        action="{{ route('update.patient',['id'=>$data->id]) }}"
                                                                        enctype="multipart/form-data"
                                                                        onsubmit="return validatePatient({{$data->id}})"
                                                                        >
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <label for="firstname">First Name</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="firstname{{$data->id}}"
                                                                                    name="firstname" class="form-control"
                                                                                    value="{{$data->firstname}}"
                                                                                    placeholder="Enter your First Name">
                                                                            </div>
                                                                            <div class="text-danger" id="fmsg{{ $data->id }}"></div>
                                                                        </div>

                                                                        <label for="lastname">Last Name</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="lastname{{$data->id}}"
                                                                                    name="lastname" class="form-control"
                                                                                    value="{{$data->lastname}}"
                                                                                    placeholder="Enter your Last Name">
                                                                            </div>
                                                                            <div class="text-danger" id="lmsg{{ $data->id }}"></div>
                                                                        </div>

                                                                        <label for="dob">Date Of Birth</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="date" id="dob{{$data->id}}"
                                                                                    name="dob" class="form-control"
                                                                                    value="{{$data->dob}}"
                                                                                    placeholder="Enter your Date Of Birth">
                                                                            </div>
                                                                            <div class="text-danger" id="dmsg{{ $data->id }}"></div>
                                                                        </div>

                                                                        <label for="username">User Name</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="username{{$data->id}}"
                                                                                    name="username" class="form-control"
                                                                                    value="{{$data->username}}"
                                                                                    placeholder="Enter your User Name">
                                                                            </div>
                                                                            <div class="text-danger" id="umsg{{ $data->id }}"></div>
                                                                        </div>

                                                                        <label for="phone">Phone Number</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="number" id="phone{{$data->id}}"
                                                                                    name="phone" class="form-control"
                                                                                    value="{{$data->phone}}"
                                                                                    placeholder="Enter your Phone Number">
                                                                            </div>
                                                                            <div class="text-danger" id="pmsg{{ $data->id }}"></div>
                                                                        </div>

                                                                        <label for="email">Email</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="email" id="email{{$data->id}}"
                                                                                    name="email" class="form-control"
                                                                                    value="{{$data->email}}"
                                                                                    placeholder="Enter your Email">
                                                                            </div>
                                                                            <div class="text-danger" id="emsg{{ $data->id }}"></div>
                                                                        </div>
                                                                        <label for="password">Password</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="password" id="password{{$data->id}}"
                                                                                    name="password" class="form-control"
                                                                                    placeholder="Enter your Password">
                                                                            </div>
                                                                        </div>
                                                                        <label for="confirm_password">Confirm Password</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="password" id="confirm_password{{$data->id}}"
                                                                                    name="confirm_password" class="form-control"
                                                                                    placeholder="Enter your Confirm Password">
                                                                                    <div class="text-danger" id="cmsg{{$data->id}}"></div>
                                                                            </div>
                                                                        </div>
                                                                        <label for="photo">Photo</label>
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="file" id="photo"
                                                                                    name="photo" class="form-control"

                                                                                    placeholder="Enter your Photo">
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" form="patient-form{{$data->id}}"
                                                                        class="btn btn-info waves-effect">Save</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger waves-effect"
                                                                        data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
