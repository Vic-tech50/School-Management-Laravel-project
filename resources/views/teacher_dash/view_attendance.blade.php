@extends('layouts.teacher')
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
							<div class="pb-20">
							
								<div class="table-responsive">
										@foreach($students as $class => $classy)
							
               <h2 class="px-4">{{ $class }}</h2>
    <hr>
    				@foreach($classy as $date => $items)
							
               <h5 class="px-4"><b>{{ $date }}</b></h5>
    <hr>
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Registration Number</th>
											<th>Student Name</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($items as $item)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td style="text-transform: uppercase;">{{$item->student_regnum}} </td>
											<td style="text-transform: capitalize;">{{$item->student_name}} {{$item->student_lastname}}</td>
											<td style="text-transform: capitalize;">
												@if($item->status == 'absent')

												<span class="badge badge-danger"> {{$item->status}} </span>
												@else
												<span class="badge badge-success"> {{$item->status}} </span>
												@endif

											</td>
											 
	
										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 @endforeach
								 @endforeach
							</div>
						</div>
						</div>
						<!-- Export Datatable End -->
					</div>


@endsection