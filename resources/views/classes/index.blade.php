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
											Class Details
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Class Details</h4>

							<div class="pull-right">
								<a
									href="{{route('teachers.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									data-backdrop="static"
									data-toggle="modal"
									data-target="#login-modal"
									
									><i class="fa fa-plus"></i> Add Class</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table   hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										
										<th>#</th>
										<th>Class Room</th>
										<th>Number Of Students</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($classes as $classes)
									<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$classes->class_name}}</td>
									<td>{{$classes->numbers_of_student}}</td>
									<td><button class="btn btn-info w3-card-4"  data-toggle="modal" data-target="#login-modal{{ $classes->id }}" data-backdrop="static"><i class="fa fa-edit"></i> Edit</button>
										<a href="{{ route('classes.destroy', $classes->id) }}" data-confirm-delete="true" class="btn btn-danger w3-card-4"><i class="fa fa-trash"></i> Trash</a>

									</td>
									</tr>	


										<div class="">
							<div class="">
								
								<div
									class="modal fade"
									id="login-modal{{ $classes->id }}"
									tabindex="-1"
									role="dialog"
									aria-labelledby="myLargeModalLabel"
									aria-hidden="true"

								>
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
												<div class="modal-header">
												<h4 class="modal-title" id="myLargeModalLabel">
													
												</h4>
												<button
													type="button"
													class="close"
													data-dismiss="modal"
													aria-hidden="true"
												>
													×
												</button>
											</div>
										<div class="bg-white box-shadow border-radius-10 w3-round-xlarge w3-card-16" style = "padding: 20px;" >
												<div class="login-title">
													<h2 class="text-center text-primary">
														<b>Edit Class</b>
													</h2>
												</div>
												   <form method="POST" action="{{ route('classes.update', ['class' => $classes->id]) }}" >
                        @csrf
                        @method('PUT')
													<div class="input-group custom">
														<input
															type="text"
															class="form-control form-control-lg"
															placeholder="Class name"
															name ="class_name"
															value = "{{$classes->class_name}}"

														/>
														
													</div>
													<div class="input-group custom">
														<input
															type="number"
															class="form-control form-control-lg"
															placeholder="Numbers Of Student"
															name = "numbers_of_student"
															value = "{{$classes->numbers_of_student}}"
														/>
														
													</div>
													
													<div class="row">
														<div class="col-sm-12">
															<div class="input-group mb-0">
															 	
																
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Add">
															 
																
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

									@endforeach

									
									
								</tbody>
							</table>
						</div>



						<!-- Login modal -->
						<div class="">
							<div class="">
								
								<div
									class="modal fade"
									id="login-modal"
									tabindex="-1"
									role="dialog"
									aria-labelledby="myLargeModalLabel"
									aria-hidden="true"
								>
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
												<div class="modal-header">
												<h4 class="modal-title" id="myLargeModalLabel">
													
												</h4>
												<button
													type="button"
													class="close"
													data-dismiss="modal"
													aria-hidden="true"
												>
													×
												</button>
											</div>
											<div
												class="login-box bg-white box-shadow border-radius-10"
											>
												<div class="login-title">
													<h2 class="text-center text-primary">
														Add Class
													</h2>
												</div>
												<form action="{{route('classes.store')}}" method="post">
													@csrf
													<div class="input-group custom">
														<input
															type="text"
															class="form-control form-control-lg"
															placeholder="Class name"
															name ="class_name"

														/>
														
													</div>
													<div class="input-group custom">
														<input
															type="number"
															class="form-control form-control-lg"
															placeholder="Numbers Of Student"
															name = "numbers_of_student"
														/>
														
													</div>
													
													<div class="row">
														<div class="col-sm-12">
															<div class="input-group mb-0">
															 	
																
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Add">
															 
																
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>




					</div>
					</div>
					<!-- Export Datatable End -->
				</div>


@endsection