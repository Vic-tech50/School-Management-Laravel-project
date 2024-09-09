@extends('layouts.admin')
@section('content')

<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Form</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Add Teacher
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-primary"
										href="{{route('teachers.index')}}"
										
									>
										Go Back
									</a>
									
								</div>
							</div>
						</div>
					</div>
					<!-- Default Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Add Teacher</h4>
								
							</div>
						
						</div>
						<form class="" action = "{{route('teachers.store')}}" method="post">
							@csrf
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Full Name*</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										type="text"
										value="{{old('name')}}"
										placeholder="Enter Full Name"
										name = "name"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										placeholder="Enter Phone Number"
										type="number"
										name = "phone"
										value="{{old('phone')}}"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Email</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{old('email')}}"
										type="email"
										name = "email"
										placeholder = "Enter Email"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Contact Address</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
											value="{{old('address')}}"
										type="text"
										name = "address"
										placeholder = "Enter Address"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Date Of Birth</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control date-picker"
										placeholder="Select Date Of Birth"
										type="text"
										name = "dob"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									>Gender</label
								>
								<div class="col-sm-12 col-md-10">
								<div class="row">
								<div class="col-4">
				
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio4" name="gender" class="custom-control-input" value="Male">
					<label class="custom-control-label" for="customRadio4">Male</label>
				</div>
			</div>
			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio5" name="gender" class="custom-control-input" value="Female">
					<label class="custom-control-label" for="customRadio5">Female</label>
				</div>
			</div>
			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio6" name="gender" class="custom-control-input" value="Others">
					<label class="custom-control-label" for="customRadio6">Others</label>
				</div>
			</div>
			</div>								</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									>Marital Status</label
								>
								<div class="col-sm-12 col-md-10">
								<div class="row">
								<div class="col-6">
				
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="married" name="marital" class="custom-control-input" value="Married">
					<label class="custom-control-label" for="married">Married</label>
				</div>
			</div>
			<div class="col-6">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="single" name="marital" class="custom-control-input" value="Single">
					<label class="custom-control-label" for="single">Single</label>
				</div>
			</div>
			
			</div>								</div>
							</div>


							<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Educational Qualification</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
					<input
										class="form-control"
										value="{{old('course')}}"
										type="text"
										name = "course"
										placeholder = "Enter Course"
									/>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="certificate">
										<option >Choose Certification</option>
									<option value="SSCE">SSCE</option>
									<option value="OND">OND</option>
									<option value="HND">HND</option>
									<option value="BSC">BSC</option>
									<option value="MSC">MSC</option>
									<option value="PHD">PHD</option>
									</select>
			</div>
			
			</div>	
								</div>
							</div><br>


							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"></label>
								<div class="col-sm-12 col-md-10">
									<h4>Subject Role</h4>
								</div>
							</div>


								<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Subject One</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
				<select class="custom-select col-12" name="subjectone">
										<option >Choose Subject</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classone">
										<option >Choose Class</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>




							<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Subject Two</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
				<select class="custom-select col-12" name="subjecttwo">
										<option >Choose Subject</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classtwo">
										<option >Choose Class</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>



						<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Subject Three</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
				<select class="custom-select col-12" name="subjectthree">
										<option >Choose Subject</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classthree">
										<option >Choose Class</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>


							<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Subject Four</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
				<select class="custom-select col-12" name="subjectfour">
										<option >Choose Subject</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classfour">
										<option >Choose Class</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>

							<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Subject Five</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
				<select class="custom-select col-12" name="subjectfive">
										<option >Choose Subject</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classfive">
										<option >Choose Class</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>


							<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Subject Six</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
				<select class="custom-select col-12" name="subjectsix">
										<option >Choose Subject</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classsix">
										<option >Choose Class</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>

							<div class="form-group row">
								<label
									for="example-datetime-local-input"
									class="col-sm-12 col-md-2 col-form-label"
									>Subject Seven</label
								>
								<div class="col-sm-12 col-md-10">
											<div class="row">
								<div class="col-6">
				<select class="custom-select col-12" name="subjectseven">
										<option >Choose Subject</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classseven">
										<option >Choose Class</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>


							<button class="btn btn-primary btn-block">Add Teacher</button>
						</form>
						
					</div>
					<!-- Default Basic Forms End -->


				



@endsection