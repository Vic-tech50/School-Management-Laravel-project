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
											assignment
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Assignment</h4>

							
						</div>
						<div class="pb-20">
				
							<div class="table-responsive">
							<table
								class="table table-bordered hover multiple-select-row data-table-export nowrap "
							>
								<thead>
									<tr style="text-transform: uppercase;">
										
									
										<th>Date Created</th>
										<th>Status</th>
										<th>Title</th>
										<th>Deadline</th>
										<th>Description</th>
										<th>Action</th>

										
									</tr>
								</thead>
								<tbody>
									@foreach($assignment as $assignment)
									<tr style="text-transform: capitalize;">
										
										<td style="width: 150px;">{{ \Carbon\Carbon::parse($assignment->created_at)->format('D, F jS, Y ') }} <br>
											{{ \Carbon\Carbon::parse($assignment->created_at)->format('h:i:s A') }}
										</td>
										<td>@if($assignment->status == 0)
											<span class="badge badge-success">Active</span>
											@else
											<span class="badge badge-danger">Expired</span>
											@endif
											</td>
										<td>{{$assignment->title}}</td>
										<td>{{ \Carbon\Carbon::parse($assignment->end_date)->format('D, F jS, Y ') }} <br> {{ \Carbon\Carbon::parse($assignment->end_time)->format('h:i:s A') }}</td>
										<td>@if($assignment->description != null)
											{{$assignment->description}}
											@else
											<button class="btn btn-secondary">View PDF</button>
											@endif

										</td>
											<td>
												@if($assignment->status == 0)
											<button class="btn btn-info"><i class="fa fa-pencil"></i> Take Test</button>
									
											@else
											<span class="badge badge-danger">Assignment Undone</span>
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