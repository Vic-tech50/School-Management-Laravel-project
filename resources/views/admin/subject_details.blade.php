@extends('layouts.admin')
@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title"></div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    View Result
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
   <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4" style="text-transform: capitalize;"> {{$subject}} Result For {{$class}}</h4>
                </div>
                <div class="pb-20">
                 
                  
                    
                        <div class="table-responsive">
                            <table
                                class="table table-bordered hover multiple-select-row data-table-export nowrap"
                            >
                                <thead>
                                    <tr style="text-transform: uppercase;">
                                        <th>#</th>
                                        <th>Registration Number</th>
                                        <th>Name</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                        <th>Term</th>
                                        <th>Date</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $student->reg_number }}</td>
                                        <td style="text-transform: capitalize;">{{ $student->name }} {{ $student->last_name }}</td>
                                     

                                      
                                        <td>{{ $student->assignment }}</td>
                                        <td>{{ $student->first_ca }}</td>
                                        <td>{{ $student->second_ca }}</td>
                                        <td>{{ $student->exam }}</td>
                                        <td>{{ $student->total }}</td>
                                        <td>{{ $student->term }}</td>
                                        <td>{{ \Carbon\Carbon::parse($student->created_at)->format('D, F jS, Y') }}</td>
                                    <!--   <td>
											<button class="btn btn-info" ><i class="fa fa-pencil"></i> Seen</button>

										


										</td> -->
									</tr>

			
                                   
                                    </tr>

                                  

                      
                                    @endforeach
                                    
                                </tbody>
                            </table>

                              

                        </div>
                 
                    
                    
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>
    </div>
</div>


<script>
    function calculateTotal(regNumber) {
        var assignment = document.querySelector(`input[name="assignment"`).value;
        var first_ca = document.querySelector(`input[name="first_ca"`).value;
        var second_ca = document.querySelector(`input[name="second_ca"`).value;
        var exam = document.querySelector(`input[name="exam"`).value;

        var total = (parseFloat(assignment) || 0) + (parseFloat(first_ca) || 0) + (parseFloat(second_ca) || 0) + (parseFloat(exam) || 0);

        document.getElementById(`total`).value = total;
    }
</script>

@endsection