 
@extends('layouts.medical')
@section('content')


        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="title pb-20">
                    <h2 class="h3 mb-0">Welcome <span class="w3-text-blue" style="text-transform: capitalize;">Dr {{Auth::user()->name}}</span></h2>
                </div>

                <div class="row pb-10">
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$on_medication}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                        Patient On Medication
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <i class="icon-copy fa fa-stethoscope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$discharged}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                        Discharged Patients
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b">
                                        <span class="icon-copy ti-book"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

                        <div class="row pb-10">
                    <div class="col-md-8 mb-20">
                        <div class="card-box height-100-p pd-20">
                            <div
                                class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3"
                            >
                                <div class="h5 mb-md-0">Hospital Activities</div>
                                <div class="form-group mb-md-0">
                                    <select class="form-control form-control-sm selectpicker">
                                        <option value="">Last Week</option>
                                        <option value="">Last Month</option>
                                        <option value="">Last 6 Month</option>
                                        <option value="">Last 1 year</option>
                                    </select>
                                </div>
                            </div>
                            <div id="activities-chart"></div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-20">
                        <div
                            class="card-box min-height-200px pd-20 mb-20"
                            data-bgcolor="#455a64"
                        >
                            <div class="d-flex justify-content-between pb-20 text-white">
                                <div class="icon h1 text-white">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
                                </div>
                                <div class="font-14 text-right">
                                    <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                                    <div class="font-12">Since last month</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text-white">
                                    <div class="font-14">Appointment</div>
                                    <div class="font-24 weight-500">1865</div>
                                </div>
                                <div class="max-width-150">
                                    <div id="appointment-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                            <div class="d-flex justify-content-between pb-20 text-white">
                                <div class="icon h1 text-white">
                                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                                </div>
                                <div class="font-14 text-right">
                                    <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                                    <div class="font-12">Since last month</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="text-white">
                                    <div class="font-14">Surgery</div>
                                    <div class="font-24 weight-500">250</div>
                                </div>
                                <div class="max-width-150">
                                    <div id="surgery-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





        


@endsection