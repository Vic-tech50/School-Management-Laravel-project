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
											Grade Score
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
				
					<!-- Bordered table  start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Grade Scores</h4>
								
							</div>
							<div class="pull-right">
								<a
									href="{{route('subject.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									data-backdrop="static"
									data-toggle="modal"
									data-target="#login-modal"
									><i class="fa fa-plus"></i> Add Grade</a
								>
							</div>
						</div>
						<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Score range</th>
									<th scope="col">Grade</th>
									<th scope="col">Action</th>
									
								</tr>
							</thead>
							<tbody>
							@foreach($grade as $grade)
							<tr>
								
								<th>{{$loop->iteration}}</th>
								<th>{{$grade->from}} - {{$grade->to}} </th>
								<th>@if($grade->grade == 'Fail' || $grade->grade == 'Poor')
									<span class="text-danger">{{$grade->grade}}</span> 
									@else
									<span class="text-success">{{$grade->grade}}</span> 
									@endif
								</th>
								<td><button class="btn btn-info w3-card-4"  data-toggle="modal" data-target="#login-modal{{ $grade->id }}" data-backdrop="static"><i class="fa fa-pencil"></i> Edit</button>
										<button class="btn btn-danger w3-card-4"><i class="fa fa-trash"></i> Trash</button>

									</td>
							</tr>


					<!-- Lmodal -->
						<div class="">
							<div class="">
								
								<div
									class="modal fade w3-animate-zoom"
									id="login-modal{{ $grade->id }}"
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
													class="close text-danger"
													data-dismiss="modal"
													aria-hidden="true"
												>
													×
												</button>
											</div>
											<div class="bg-white box-shadow border-radius-10 w3-round-xlarge w3-card-16" style = "padding: 20px; ">
												<div class="login-title">
													<h2 class="text-center text-primary">
														<b>Edit Grade</b>
													</h2>
												</div>
														   <form method="POST" action="{{ route('grade.update', ['grade' => $grade->id]) }}">
                        @csrf
                        @method('PUT')
													<div class="input-group custom">
														<input
															type="number"
															class="form-control form-control-lg"
															placeholder="First Score"
															name ="from"
															value = "{{$grade->from}}"

														/>
														
													</div>
													<div class="input-group custom"> 
														<input
															type="number"
															class="form-control form-control-lg"
															placeholder="Last Score"
															name = "to"
															value = "{{$grade->to}}"
														/>
														
													</div>


													<div class="input-group custom">
															<select class="custom-select col-12" name="grade">
										<option selected="{{$grade->grade}}">{{$grade->grade}}</option>
									<option value="Excellence">Excellence</option>
									<option value="Credit">Credit</option>
									<option value="Poor">Poor</option>
									<option value="Fail">Fail</option>
									
									</select>
														
													</div>


											
													
													<div class="row">
														<div class="col-sm-12">
															<div class="input-group mb-0">
															 	
																
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Edit">
															 
																
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
					
					</div>
					<!-- Bordered table End -->


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
														Add Grade
													</h2>
												</div>
												<form action="{{route('grade.store')}}" method="post">
													@csrf
													<div class="input-group custom">
														<input
															type="number"
															class="form-control form-control-lg"
															placeholder="First Score"
															name ="from"

														/>
														
													</div>
													<div class="input-group custom">
														<input
															type="number"
															class="form-control form-control-lg"
															placeholder="Last Score"
															name = "to"
														/>
														
													</div>


													<div class="input-group custom">
															<select class="custom-select col-12" name="grade">
										<option selected="">Choose Grade</option>
									<option value="Excellence">Excellence</option>
									<option value="Credit">Credit</option>
									<option value="Poor">Poor</option>
									<option value="Fail">Fail</option>
									
									</select>
														
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


@endsection