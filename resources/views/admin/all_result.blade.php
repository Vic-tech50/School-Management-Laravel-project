@extends('layouts.admin')
@section('content')

<style>
    /* Style for the horizontal rule */
    hr {
        border: none; /* Remove the default border */
        height: 2px; /* Set the height of the line */
        background-color: ; /* Set the background color */
        margin: 20px 0; /* Add some spacing above and below */
    }
</style>


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
										<li class="breadcrumb-item">
											<a href="/home">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Report
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Report</h4>

							
						</div>
						<div class="pb-20 ">
							<div class="table-responsive">
								
						

								<center><p style="font-size: 20px; color: black;"><b>Result for {{$term}}</b></p></center>
							<table class="w3-table  hover multiple-select-row data-table-export nowrap" >
								   <thead>
                                    <tr style="text-transform: uppercase;">
                                       
                                        <th>Subject</th>
                                        <th>Name</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                        <th>Grade</th>
                                        <th>Remark</th>
                              
                                    </tr>
                                </thead>
								<tbody style="text-align: center;">
									@foreach($result as $result)
									<tr style="text-transform: capitalize;">
									
										<td>{{$result->subject}}</td>
										<td>{{$result->name}}</td>
										<td>{{$result->assignment}}</td>
										<td>{{$result->first_ca}}</td>
										<td>{{$result->second_ca}}</td>
										<td>{{$result->exam}}</td>
										<td>{{$result->total}}</td>
										  <td>{{ $result->grade }}</td>
                                        <td>{{ $result->remark }}</td>
									</tr>
									@endforeach

					
    
								
									
									
									
								</tbody>
							</table>
						
						</div>
					</div>
					</div>
					<!-- Export Datatable End -->
				</div>


@endsection