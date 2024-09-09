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
											<li class="breadcrumb-item">
												<a href="/home">Home</a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">
												attendance
											</li>
										</ol>
									</nav>
								</div>
							
							</div>
						</div>
					
					
						
						<!-- Export Datatable start -->
						<div class="card-box mb-30">
							<div class="pd-20">
								<h4 class="text-blue h4">Attendance</h4>

								
							</div>
							<div class="pb-20 container">
					
								<div class="table-responsive">
								<table 	class="table table-bordered hover">
									<thead>
										<tr style="text-transform: uppercase;">
											
											
											<th>Date</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($students as $student)
										<tr>
											
											<td style="text-transform: capitalize;">{{ \Carbon\Carbon::parse($student->created_at)->format('D, F jS, Y') }}</td>
											<td style="text-transform: capitalize;">
												@if($student->status == 'present')
												<span class="badge badge-success"> {{$student->status}}</span>
												@else
												<span class="badge badge-danger"> {{$student->status}}</span>
												@endif
											</td>
		

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