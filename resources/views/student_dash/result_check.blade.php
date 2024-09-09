@extends('layouts.student')
@section('content')



    <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                       <div class="no-print">
                                     <button class="btn btn-primary" onclick="window.print()">Print Result</button>
                                 </div>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                
                            </div>
                        </div>
                    </div>
                    <div class="invoice-wrap">
                        <div class="invoice-box col-sm-12 col-lg-12" >
                            <div class="invoice-header">
                                <div class="logo text-center">
                                   <img
                                        src="{{ asset('uploads/students')}}/{{Auth::user()->passport}}" 
                                        alt=""
                                        class="avatar-photo"
                                        style = "height: 150px; width: 150px;"
                                    />
                                </div>
                            </div>
                            <!-- <h4 class="text-center mb-30 weight-600">INVOICE</h4> -->
                            <div  class="table-responsive">
                                <table class="container w3-table w3-border w3-bordered mb-20">
                                    <tbody>
                                        <center>
                                    <tr class="w3-center">
                                        <td class="w3-center">Student Name</td>
                                        <td class="w3-center"><b>{{Auth::user()->name}} {{Auth::user()->last_name}}</b></td>
                                    </tr>

                                     <tr>
                                        <td class="w3-center">Reg Number</td>
                                        <td class="w3-center" style="text-transform: uppercase;"><b>{{Auth::user()->reg_number}}</b></td>
                                    </tr>

                                     <tr>
                                        <td class="w3-center">Current Class</td>
                                        <td class="w3-center"><b>{{Auth::user()->class}}</b></td>
                                    </tr>
                                    </center>
                                </tbody>
                                </table>
                     
                        </div>
                            <div class="invoice-desc pb-30">
                               <div class="table-responsive">
                                <center><p style="font-size: 20px; text-transform: uppercase; color: black;"><b>Result For {{$term}}</b></p></center>
                            <table class="table table-bordered">
                                <thead>
                            

                                    <tr style="text-transform: uppercase;">
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                        <th>Grade</th>
                                        <th>Remark</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($result as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->subject }}</td>
                                        <td>{{ $student->assignment }}</td>
                                        <td>{{ $student->first_ca }}</td>
                                        <td>{{ $student->second_ca }}</td>
                                        <td>{{ $student->exam }}</td>
                                        <td>{{ $student->total }}</td>
                                        <td>{{ $student->grade }}</td>
                                        <td>{{ $student->remark }}</td>
                                    
                                    </tr>

                                    @endforeach
                                    
                                </tbody>
                            </table>
                                <div class="invoice-desc-footer">
                                    <div class="invoice-desc-head clearfix">
                                        <div class="invoice-sub">Bank Info</div>
                                        <div class="invoice-rate">Due By</div>
                                        <div class="invoice-subtotal">Total Due</div>
                                    </div>
                                    <div class="invoice-desc-body">
                                        <ul>
                                            <li class="clearfix">
                                                <div class="invoice-sub">
                                                    <p class="font-14 mb-5">
                                                        Account No:
                                                        <strong class="weight-600">123 456 789</strong>
                                                    </p>
                                                    <p class="font-14 mb-5">
                                                        Code: <strong class="weight-600">4556</strong>
                                                    </p>
                                                </div>
                                                <div class="invoice-rate font-20 weight-600">
                                                    10 Jan 2018
                                                </div>
                                                <div class="invoice-subtotal">
                                                    <span class="weight-600 font-24 text-danger"
                                                        >$8000</span
                                                    >
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center pb-20">Thank You!!</h4>
                        </div>
                    </div>
                </div>





@endsection