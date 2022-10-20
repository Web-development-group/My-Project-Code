@extends('App.layout.website_layout')
@section('content')
    <!-- Start Slide show -->
    <section class="container-fluit" id="slide-show">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ asset('website/images/slides/main-slide.jpg') }}" alt="Main Slide">
                </div>
                <div class="item">
                    <img src="{{ asset('website/images/slides/slide1.jpg') }}" alt="Slide1">
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
        </div>
    </section>
    <!-- End Slide show -->

    <!-- Start boxes -->
    <section class="boxes">
        <div class="container ">
            <div class="row ">
                @foreach ($appointment as $app)
                    <div class="col-md-4 col-sm-12 box-col ">
                        <div class="box working-hours">
                            <div class="box-icon"><span>
                                    <img class="img img-circle" src="{{ asset($app->photo)}}" width="50" alt="">
                                </span>
                            </div>
                            <div class="box-title">{{ $app->firstname.' '.$app->lastname}}</div>
                            <div class="working-hours-list box-text">
                                <table id="time">
                                    <tr>
                                        <td>Start Time</td>
                                        <td>{{ $app->start_time}}</td>
                                    </tr>
                                    <tr>
                                        <td>End Time</td>
                                        <td>{{ $app->end_time}}</td>
                                    </tr>
                                    <tr>
                                        <td>Available Seat</td>
                                        <td>{{ $app->number_patient}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- start abouts -->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-7 ">
                    <div class="about-content">
                        <div class="section-title">
                            <h2>A great medical team to help your needs</h2>
                        </div>
                        <div class="about-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        <div class="button about-button">
                            <a href="" data-toggle="modal" data-target="#about-readmore">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="">
                        <img src="{{ asset('website/images/doctors/about.png')}}" class="img img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end abouts  -->

    <!-- Start Departments -->
    <div class="departments">
        <div class="departments_background parallax-window"
            style="background-image: url({{ asset('website/images/department/departments.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title section-title-light">
                            <h2 class="txt-light">Our Medical Departments</h2>
                        </div>
                    </div>
                </div>
                <div class="row departments-row ">
                    <!-- Department 1 -->
                    <div class="col-md-3 col-md-6 dept-col">
                        <div class="dept">
                            <div class="dept-image">
                                <img class="img img-responsive" src="{{ asset('website/images/department/dept_1.jpg')}}">
                            </div>
                            <div class="dept-content text-center">
                                <div class="dept-title">Plastic Surgery</div>
                                <div class="dept-subtitle">Dr. Muhammad Essa</div>
                            </div>
                        </div>
                    </div>

                    <!-- Department 2 -->
                    <div class="col-md-3 col-md-6 dept-col">
                        <div class="dept">
                            <div class="dept-image">
                                <img class="img img-responsive" src="{{ asset('website/images/department/dept_2.jpg')}}">
                            </div>
                            <div class="dept-content text-center">
                                <div class="dept-title">Gasteroen Terology</div>
                                <div class="dept-subtitle ">Drs. Muhammadi</div>
                            </div>
                        </div>
                    </div>

                    <!-- Department 3 -->
                    <div class="col-md-3 col-md-6 dept-col">
                        <div class="dept">
                            <div class="dept-image">
                                <img class="img img-responsive" src="{{ asset('website/images/department/dept_3.jpg')}}">
                            </div>
                            <div class="dept-content text-center">
                                <div class="dept-title">Dentistry</div>
                                <div class="dept-subtitle">Dr. Jamela Karimi</div>
                            </div>
                        </div>
                    </div>

                    <!-- Department 4 -->
                    <div class="col-md-3 col-md-6 dept-col">
                        <div class="dept">
                            <div class="dept-text">
                                <h2 class="txt-light">Responsiblity</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit</p>
                            </div>
                            <br><br><br><br><br>
                            <div class="btn-heigh button dept-button">
                                <a href="#" style="color: #222;">Read More...</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Start Services -->
    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Our Featured Services</h2>
                    </div>
                </div>
            </div>
            <div class="row services-row">

                <!-- Part 1 -->
                <div class="col-lg-4 col-md-6 service-col">
                    <a href="#">
                        <div class="service text-center trans_200">
                            <div class="service-icon">
                                <img src="{{ asset('website/images/icons/service_1.svg')}}">
                            </div>
                            <div class="service-title trans_200">Free Checkups </div>
                            <div class="service-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Part 2 -->
                <div class="col-lg-4 col-md-6 service-col">
                    <a href="#">
                        <div class="service text-center trans_200">
                            <div class="service-icon">
                                <img src="{{ asset('website/images/icons/service_2.svg')}}">
                            </div>
                            <div class="service-title trans_200">Screen Exam </div>
                            <div class="service-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Part 3 -->
                <div class="col-lg-4 col-md-6 service-col">
                    <a href="#">
                        <div class="service text-center trans_200">
                            <div class="service-icon">
                                <img src="{{ asset('website/images/icons/service_3.svg')}}">
                            </div>
                            <div class="service-title trans_200">Free Checkups </div>
                            <div class="service-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Part 4 -->
                <div class="col-lg-4 col-md-6 service-col">
                    <a href="#">
                        <div class="service text-center trans_200">
                            <div class="service-icon">
                                <img src="{{ asset('website/images/icons/service_4.svg')}}">
                            </div>
                            <div class="service-title trans_200">RMI Services </div>
                            <div class="service-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Part 5 -->
                <div class="col-lg-4 col-md-6  service-col">
                    <a href="#">
                        <div class="service text-center trans_200">
                            <div class="service-icon">
                                <img src="{{ asset('website/images/icons/service_5.svg')}}">
                            </div>
                            <div class="service-title  trans_200">Dentistry </div>
                            <div class="service-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Part 6 -->
                <div class="col-lg-4 col-md-6 service-col">
                    <a href="#">
                        <div class="service text-centertrans_200">
                            <div class="service-icon">
                                <img src="{{ asset('website/images/icons/service_6.svg')}}">
                            </div>
                            <div class="service-title text-center trans_200">Neonatology </div>
                            <div class="service-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Start CTA -->
    <div class="cta">
        <div class="cta-background" style="background-image: url({{ asset('website/images/cta/cta.jpg')}});">
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cta-content text-center">
                        <h2>Need A personal Health Plan?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        </p>
                        <div class="button cat-button">
                            <a href="" data-toggle="modal" data-target="#request-plan">Request a Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
