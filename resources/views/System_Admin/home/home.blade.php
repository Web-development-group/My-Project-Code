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
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="col-lg-4">
                                <select name="type" class="form-control" id=""
                                    onchange="showChart(this.value);">
                                    <option value="column">Column</option>
                                    <option value="bar">Bar</option>
                                    <option value="pie">Pie</option>
                                    <option value="pyramid">Pyramid</option>
                                </select>
                            </div>
                        </div>
                        <div class="body">
                            <script>
                                function showChart(charType) {
                                    var chart = new CanvasJS.Chart("chartContainer", {
                                        animationEnabled: true,
                                        exportEnabled: true,
                                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                                        title: {
                                            text: "Patients In Each Month"
                                        },
                                        axisY: {
                                            includeZero: true
                                        },
                                        data: [{
                                            type: charType, //change type to bar, line, area, pie, etc
                                            //indexLabel: "{y}", //Shows y value on all Data Points
                                            indexLabelFontColor: "#5A5757",
                                            indexLabelFontSize: 16,
                                            indexLabelPlacement: "outside",
                                            dataPoints: [
                                                { label: 'Jan' , y:{{ $jan[0]->jan }} },
                                                { label: 'Feb' , y:{{ $feb[0]->feb }} },
                                                { label: 'Mar' , y:{{ $mar[0]->mar }} },
                                                { label: 'Apr' , y:{{ $apr[0]->apr }} },
                                                { label: 'May' , y:{{ $may[0]->may }} },
                                                { label: 'Jun' , y:{{ $jun[0]->jun }} },
                                                { label: 'Jul' , y:{{ $jul[0]->jul }} },
                                                { label: 'Aug' , y:{{ $aug[0]->aug }} },
                                                { label: 'Sep' , y:{{ $sep[0]->sep }} },
                                                { label: 'Oct' , y:{{ $oct[0]->oct }} },
                                                { label: 'Nov' , y:{{ $nov[0]->nov }} },
                                                { label: 'Dec' , y:{{ $dece[0]->dece }} },
                                            ]
                                        }]
                                    });
                                    chart.render();
                                }
                                window.onload = function() {
                                    showChart('column');
                                }
                            </script>
                            <div id="chartContainer" style="height: 420px; width: 100%;"></div>
                            <script src="{{ asset('assets/js/canvasjs.min.js') }}"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
