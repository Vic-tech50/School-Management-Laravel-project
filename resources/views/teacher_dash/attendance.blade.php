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
											students
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				 
					
				
				



					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
							<div class="pd-20 card-box">
								<h5 class="h4 text-blue mb-20">Student Details</h5>
								<div class="tab">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a
												class="nav-link active text-blue"
												data-toggle="tab"
												href="#classone"
												role="tab"
												aria-selected="true"
												>{{Auth::user()->class_one}}</a
											>
										</li>
										@if(Auth::user()->class_two)
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#classtwo"
												role="tab"
												aria-selected="false"
												>{{Auth::user()->class_two}}</a
											>
										</li>
										@endif
										@if(Auth::user()->class_three)
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#classthree"
												role="tab"
												aria-selected="false"
												>{{Auth::user()->class_three}}</a
											>
										</li>
										@endif

											@if(Auth::user()->class_four)
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#classfour"
												role="tab"
												aria-selected="false"
												>{{Auth::user()->class_four}}</a
											>
										</li>
										@endif

											@if(Auth::user()->class_five)
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#classfive"
												role="tab"
												aria-selected="false"
												>{{Auth::user()->class_five}}</a
											>
										</li>
										@endif

											@if(Auth::user()->class_six)
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#classsix"
												role="tab"
												aria-selected="false"
												>{{Auth::user()->class_six}}</a
											>
										</li>
										@endif

											@if(Auth::user()->class_seven)
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#classseven"
												role="tab"
												aria-selected="false"
												>{{Auth::user()->class_seven}}</a
											>
										</li>
										@endif


									</ul>
									<div class="tab-content">
										<div
											class="tab-pane fade show active"
											id="classone"
											role="tabpanel"
										>
											<div class="pd-20">
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{Auth::user()->class_one}} Attendance</h4>

							
						</div>
						<div class="pb-20">
							<div class="table-responsive">
									   <form method="POST" action="{{ route('attendance') }}">
	        @csrf
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Passport</th>
											<th>Registration Number</th>
											<th>Name</th>
											<th>Class</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($students as $student)
										<tr>
											<td>{{$loop->iteration}}</td>

												<td>@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif</td>
											<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
											<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}}

											 </td>
											 <td style="text-transform: capitalize;">{{$student->class}}</td>
							


											  	 <td>

	                        <select name="attendance[{{ $student->id }}]" class="custom-select col-4">
	                            <option value="present">Present</option>
	                            <option value="absent">Absent</option>
	                           
	                        </select>
	                        
	                    </td>
	              
											

										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
							</div>
						</form>
						</div>
					</div>
					</div>
											</div>
										</div>


<!-- class two ------------------------------------------------------------------------->
           @if(Auth::user()->class_two)
										<div class="tab-pane fade" id="classtwo" role="tabpanel">
													<div class="pd-20">
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{Auth::user()->class_two}} Attendance</h4>

						
						</div>
						<div class="pb-20">
							<div class="table-responsive">
											   <form method="POST" action="{{ route('attendance2') }}">
	        @csrf
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Passport</th>
											<th>Registration Number</th>
											<th>Name</th>
											<th>Class</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($student_two as $student)
										<tr>
											<td>{{$loop->iteration}}</td>
											
												<td>@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif</td>
											<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
											<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}}

											 </td>
											 <td style="text-transform: capitalize;">{{$student->class}}</td>
							


											  	 <td>

	                        <select name="attendance[{{ $student->id }}]" class="custom-select col-4">
	                            <option value="present">Present</option>
	                            <option value="absent">Absent</option>
	                           
	                        </select>
	                        
	                    </td>
	              
											

										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
							</div>
						</form>
						</div>
					</div>
					</div>
											</div>
										</div>

				@endif

<!-- class two ------------------------------------------------------------------------->

<!-- class three ------------------------------------------------------------------------->
   @if(Auth::user()->class_three)
										<div class="tab-pane fade" id="classthree" role="tabpanel">
													<div class="pd-20">
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{Auth::user()->class_three}} Attendance</h4>

						</div>
						<div class="pb-20">
							<div class="table-responsive">
												   <form method="POST" action="{{ route('attendance3') }}">
	        @csrf
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Passport</th>
											<th>Registration Number</th>
											<th>Name</th>
											<th>Class</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($student_three as $student)
										<tr>
											<td>{{$loop->iteration}}</td>
											
												<td>@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif</td>
											<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
											<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}}

											 </td>
											 <td style="text-transform: capitalize;">{{$student->class}}</td>
							


											  	 <td>

	                        <select name="attendance[{{ $student->id }}]" class="custom-select col-4">
	                            <option value="present">Present</option>
	                            <option value="absent">Absent</option>
	                           
	                        </select>
	                        
	                    </td>
	              
											

										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
							</div>
						</form>
						</div>
					</div>
					</div>
											</div>
										</div>

				@endif


				<!-- classthree -------------------------------------------------->



				<!-- class four ------------------------------------------------------------------------->
   @if(Auth::user()->class_four)
										<div class="tab-pane fade" id="classfour" role="tabpanel">
													<div class="pd-20">
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{Auth::user()->class_four}} Attendance</h4>

						
						</div>
						<div class="pb-20">
							<div class="table-responsive">
											   <form method="POST" action="{{ route('attendance4') }}">
	        @csrf
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Passport</th>
											<th>Registration Number</th>
											<th>Name</th>
											<th>Class</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($student_four as $student)
										<tr>
											<td>{{$loop->iteration}}</td>
											
												<td>@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif</td>
											<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
											<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}}

											 </td>
											 <td style="text-transform: capitalize;">{{$student->class}}</td>
							


											  	 <td>

	                        <select name="attendance[{{ $student->id }}]" class="custom-select col-4">
	                            <option value="present">Present</option>
	                            <option value="absent">Absent</option>
	                           
	                        </select>
	                        
	                    </td>
	              
											

										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
							</div>
						</form>
						</div>
					</div>
					</div>
											</div>
										</div>

				@endif


				<!-- classfour -------------------------------------------------->


				<!-- class five ------------------------------------------------------------------------->
   @if(Auth::user()->class_five)
										<div class="tab-pane fade" id="classfive" role="tabpanel">
													<div class="pd-20">
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{Auth::user()->class_five}} Attendance</h4>

							
						</div>
						<div class="pb-20">
							<div class="table-responsive">
											   <form method="POST" action="{{ route('attendance5') }}">
	        @csrf
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Passport</th>
											<th>Registration Number</th>
											<th>Name</th>
											<th>Class</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($student_five as $student)
										<tr>
											<td>{{$loop->iteration}}</td>
											
												<td>@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif</td>
											<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
											<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}}

											 </td>
											 <td style="text-transform: capitalize;">{{$student->class}}</td>
							


											  	 <td>

	                        <select name="attendance[{{ $student->id }}]" class="custom-select col-4">
	                            <option value="present">Present</option>
	                            <option value="absent">Absent</option>
	                           
	                        </select>
	                        
	                    </td>
	              
											

										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
							</div>
						</form>
						</div>
					</div>
					</div>
											</div>
										</div>

				@endif


				<!-- classfive -------------------------------------------------->




				<!-- class six ------------------------------------------------------------------------->
   @if(Auth::user()->class_six)
										<div class="tab-pane fade" id="classsix" role="tabpanel">
													<div class="pd-20">
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{Auth::user()->class_six}} Attendance</h4>

							
						</div>
						<div class="pb-20">
							<div class="table-responsive">
												   <form method="POST" action="{{ route('attendance6') }}">
	        @csrf
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Passport</th>
											<th>Registration Number</th>
											<th>Name</th>
											<th>Class</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($student_six as $student)
										<tr>
											<td>{{$loop->iteration}}</td>
											
												<td>@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif</td>
											<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
											<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}}

											 </td>
											 <td style="text-transform: capitalize;">{{$student->class}}</td>
							


											  	 <td>

	                        <select name="attendance[{{ $student->id }}]" class="custom-select col-4">
	                            <option value="present">Present</option>
	                            <option value="absent">Absent</option>
	                           
	                        </select>
	                        
	                    </td>
	              
											

										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
							</div>
						</form>
						</div>
					</div>
					</div>
											</div>
										</div>

				@endif


				<!-- classsix -------------------------------------------------->


				<!-- class seven ------------------------------------------------------------------------->
   @if(Auth::user()->class_seven)
										<div class="tab-pane fade" id="classseven" role="tabpanel">
													<div class="pd-20">
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{Auth::user()->class_seven}} Attendance</h4>

							
						</div>
						<div class="pb-20">
							<div class="table-responsive">
												   <form method="POST" action="{{ route('attendance7') }}">
	        @csrf
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap "
								>
									<thead>
										<tr style="text-transform: uppercase;">
											
											<th>#</th>
											<th>Passport</th>
											<th>Registration Number</th>
											<th>Name</th>
											<th>Class</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										@foreach($student_seven as $student)
										<tr>
											<td>{{$loop->iteration}}</td>
											
												<td>@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif</td>
											<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
											<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}}

											 </td>
											 <td style="text-transform: capitalize;">{{$student->class}}</td>
							


											  	 <td>

	                        <select name="attendance[{{ $student->id }}]" class="custom-select col-4">
	                            <option value="present">Present</option>
	                            <option value="absent">Absent</option>
	                           
	                        </select>
	                        
	                    </td>
	              
											

										</tr>

							
										@endforeach

										
									</tbody>
								</table>
								 <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
							</div>
						</form>

						</div>
					</div>
					</div>
					</div>
				    </div>

				@endif


				<!-- classseven -------------------------------------------------->





									</div>
								</div>
							</div>
						</div>
				
									</div>
						</div>
					
					</div>
				</div>




@endsection