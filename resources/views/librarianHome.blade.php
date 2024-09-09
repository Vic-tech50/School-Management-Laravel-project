 
@extends('layouts.librarian')
@section('content')


        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="title pb-20">
                    <h2 class="h3 mb-0">Welcome <span class="w3-text-blue" style="text-transform: capitalize;">Librarian {{Auth::user()->name}}</span></h2>
                </div>

                <div class="row pb-10">
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$book}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                        Total Books
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
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$book_lend}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                       Books On Lease
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

                     <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$book-$book_lend}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                       Books Available
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b">
                                        <span class="icon-copy fa fa-book"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>






        


@endsection