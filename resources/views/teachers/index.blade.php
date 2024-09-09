@extends('layouts.admin')
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
											Teachers
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Teachers Details</h4>

							<div class="pull-right">
								<a
									href="{{route('teachers.create')}}"
									class="btn btn-primary btn-sm w3-card-8 w3-padding"
									
									><i class="fa fa-plus"></i> Add Teacher</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										
										<th>Passport</th>
										<th>Name</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Gender</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($teacher as $teacher)
									<tr>

										<td>
												@if($teacher->image == null)
												<img src="{{ asset ('src/images/person.svg') }}" alt="img" style="height:50px ;" />
												@else
												<img src="{{ asset ('uploads') }}/{{$teacher->image}}" alt="img" style="height:90px ;" class="w3-card-4" />
												@endif
										</td>
										<td>{{$teacher->name}}</td>
										<td>{{$teacher->phone}}</td>
										<td>{{$teacher->email}}</td>
										<td>
											@if($teacher->gender == 'Male')
											<center>
											<i class="icon-copy fi-male text-primary" style="font-size: 40px;"></i></center>

											@else
											<center>
											<i class="icon-copy fi-female text-primary" style="font-size: 40px; "></i></center>
											@endif
										</td>
											<td><a class="btn btn-info w3-card-4" href="{{ route('teachers.edit', $teacher->id) }}"><i class = "fa fa-pencil"></i> Edit</a>
										<a class="btn btn-danger w3-card-4" href="{{route('teachers.destroy', $teacher->id)}}" data-confirm-delete = "true"><i class = "fa fa-trash"></i> Trash</a>

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