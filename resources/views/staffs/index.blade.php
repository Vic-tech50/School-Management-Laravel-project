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
											staffs
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Staffs Details</h4>

							<div class="pull-right">
								<a
									href="{{route('staffs.create')}}"
									class="btn btn-primary btn-sm"
									
									><i class="fa fa-plus"></i> Add Staff</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										
										<th>#</th>
										<th>Passport</th>
										<th>Name</th>
										<th>Role</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Gender</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($staff as $staff)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>
												@if($staff->image == null)
											<img src="{{ asset ('src/images/person.svg') }}" alt="img" style="height:50px ;" />
											@else
											<img src="{{ asset ('uploads/staffs') }}/{{$staff->image}}" alt="img" style="height:90px ;"  class="w3-card-4" />
											@endif</td>
										<td>{{$staff->name}}</td>
									<td>@if($staff->type == 'admin')
										<span class="badge badge-success">Admin</span>
										@elseif($staff->type == 'medical')
										<span class="badge badge-primary">Medical</span>
										@elseif($staff->type == 'librarian')
										<span class="badge badge-info">Librarian</span>
										@else
										<span class="badge badge-secondary">Cleaner</span>
										@endif
									</td>
										<td>{{$staff->phone}}</td>
										<td>{{$staff->email}}</td>
										<td>{{$staff->gender}}</td>
										
										<td><a class="btn btn-info w3-card-4" href="{{ route('staffs.edit', $staff->id) }}"><i class = "fa fa-pencil"></i> Edit</a>
										<a class="btn btn-danger w3-card-4" href="{{route('staffs.destroy', $staff->id)}}" data-confirm-delete = "true"><i class = "fa fa-trash"></i> Trash</a>

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