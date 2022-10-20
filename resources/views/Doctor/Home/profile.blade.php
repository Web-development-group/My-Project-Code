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
                                <a href="{{ route('doctor.home') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">MyAccount</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Your content goes here  -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="m-b-20">
                            <div class="contact-grid">
                                <div class="profile-header bg-dark">
                                    <div class="user-name">{{ $doctor->firstname }}</div>
                                    <div class="name-center">{{ $doctor->lastname }}</div>
                                </div>
                                <img src="{{ asset($doctor->photo) }}" width="100" height="100" class="user-img"
                                    alt="">
                                <p>
                                    {{ $doctor->degree }}
                                </p>
                                <div>
                                    <span class="phone">
                                        <i class="material-icons" style="color: blue;">phone</i>
                                        {{ $doctor->phone }}
                                    </span>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-4">
                                        <h5>564</h5>
                                        <small>Following</small>
                                    </div>
                                    <div class="col-4">
                                        <h5>18k</h5>
                                        <small>Followers</small>
                                    </div>
                                    <div class="col-4">
                                        <h5>565</h5>
                                        <small>Post</small>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="profile-tab-box">
                            <div class="p-l-20">
                                <ul class="nav ">
                                    <li class="nav-item tab-all">
                                        <a class="nav-link active show" href="#project" data-toggle="tab">About Me</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20">
                                        <a class="nav-link" href="#usersettings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2>About</h2>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col-md-3 col-6 b-r">
                                                    <h5>First Name</h5>
                                                    <br>
                                                    <p class="text-muted">{{ $doctor->firstname }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r">
                                                    <h5>Last Name</h5>
                                                    <br>
                                                    <p class="text-muted">{{ $doctor->lastname }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r">
                                                    <h5>User Name</h5>
                                                    <br>
                                                    <p class="text-muted">{{ $doctor->username }}</p>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <h5>Email</h5>
                                                    <br>
                                                    <p style="color: blue;">{{ $doctor->email }}</p>
                                                </div>
                                            </div>
                                            {{-- <p class="m-t-30">Completed my graduation in Arts from the well known and
                                                renowned institution
                                                of India – SARDAR PATEL ARTS COLLEGE, BARODA in 2000-01, which was
                                                affiliated
                                                to M.S. University. I ranker in University exams from the same
                                                university
                                                from 1996-01.</p>
                                            <p>Worked as Professor and Head of the department at Sarda Collage, Rajkot,
                                                Gujarat
                                                from 2003-2015 </p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem
                                                Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                when
                                                an unknown printer took a galley of type and scrambled it to make a
                                                type
                                                specimen book. It has survived not only five centuries, but also the
                                                leap
                                                into electronic typesetting, remaining essentially unchanged.</p>
                                            <br> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="timeline" aria-expanded="false">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="usersettings" aria-expanded="false">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        <strong>Profile</strong> Settings
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="{{ route('update.doctor.account', ['id' => $doctor->id]) }}" method="POST" enctype="multipart/form-data"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <input type="text" name="firstname" value="{{ $doctor->firstname }}"
                                                class="form-control" placeholder="Firstname">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lastname" value="{{ $doctor->lastname }}"
                                                class="form-control" placeholder="Lastname">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" value="{{ $doctor->username }}"
                                                class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" value="{{ $doctor->email }}"
                                                class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="degree" value="{{ $doctor->degree }}"
                                                class="form-control" placeholder="Degree">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="phone" value="{{ $doctor->phone }}"
                                                class="form-control" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="current_password" class="form-control"
                                                placeholder="Current Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" class="form-control"
                                                placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="photo" class="form-control"
                                                placeholder="Photo">
                                        </div>
                                        <button type="submit" class="btn btn-info btn-round">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
