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
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Edit Teacher
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
								<h4 class="text-blue h4">Edit Teacher</h4>
								
							</div>
						
						</div>
						 <form class="" action="{{route('teachers.update', $teacher->id)}}" method = "post">
                                                  @csrf
                                                  @method('PUT')
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Full Name*</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										type="text"
										value="{{$teacher->name}}"
										
										name = "name"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										
										type="number"
										name = "phone"
										value="{{$teacher->phone}}"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Email</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										
										type="email"
										name = "email"
										value="{{$teacher->email}}"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Contact Address</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										value="{{$teacher->address}}"
										type="text"
										name = "address"
										
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Date Of Birth</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control date-picker"
										value="{{$teacher->dob}}"
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
					@if($teacher->gender == 'Male')
								<div class="col-4">
				
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio4" checked name="gender" class="custom-control-input" value="Male">
					<label class="custom-control-label" for="customRadio4">Male</label>
				</div>
			</div>

			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" selected id="customRadio5" name="gender" class="custom-control-input" value="Female">
					<label class="custom-control-label" for="customRadio5">Female</label>
				</div>
			</div>

			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio6" selected name="gender" class="custom-control-input" value="Others">
					<label class="custom-control-label" for="customRadio6">Others</label>
				</div>
			</div>

			@elseif($teacher->gender == 'Female')
				<div class="col-4">
				
			<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio4"  name="gender" class="custom-control-input" value="Male">
					<label class="custom-control-label" for="customRadio4">Male</label>
				</div>
			</div>

			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" checked id="customRadio5" name="gender" class="custom-control-input" value="Female">
					<label class="custom-control-label" for="customRadio5">Female</label>
				</div>
			</div>

			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio6" selected name="gender" class="custom-control-input" value="Others">
					<label class="custom-control-label" for="customRadio6">Others</label>
				</div>
			</div>
			@else
				<div class="col-4">
				
			<div class="custom-control custom-radio mb-5">
					<input type="radio" id="customRadio4"  name="gender" class="custom-control-input" value="Male">
					<label class="custom-control-label" for="customRadio4">Male</label>
				</div>
			</div>

			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio"  id="customRadio5" name="gender" class="custom-control-input" value="Female">
					<label class="custom-control-label" for="customRadio5">Female</label>
				</div>
			</div>

			<div class="col-4">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" checked id="customRadio6" selected name="gender" class="custom-control-input" value="Others">
					<label class="custom-control-label" for="customRadio6">Others</label>
				</div>
			</div>
			@endif
			</div>								</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									>Marital Status</label
								>
								<div class="col-sm-12 col-md-10">
								<div class="row">
				@if($teacher->marital == 'Married')
								<div class="col-6">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="married" checked name="marital" class="custom-control-input" value="Married">
					<label class="custom-control-label" for="married">Married</label>
				</div>
			</div>
			<div class="col-6">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="single" name="marital" class="custom-control-input" value="Single">
					<label class="custom-control-label" for="single">Single</label>
				</div>
			</div>

			@else

						<div class="col-6">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="married"  name="marital" class="custom-control-input" value="Married">
					<label class="custom-control-label" for="married">Married</label>
				</div>
			</div>
			<div class="col-6">
				<div class="custom-control custom-radio mb-5">
					<input type="radio" id="single" checked name="marital" class="custom-control-input" value="Single">
					<label class="custom-control-label" for="single">Single</label>
				</div>
			</div>
			@endif
			
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
										value="{{$teacher->course}}"
										type="text"
										name = "course"
										placeholder = "Enter Course"
									/>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="certificate">
										
									<option value="{{$teacher->certificate}}">{{$teacher->certificate}}</option>
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
										<option selected="{{$teacher->subject_one}}">{{$teacher->subject_one}}</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classone">
										<option selected="{{$teacher->class_one}}">{{$teacher->class_one}}</option>
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
											<option selected="{{$teacher->subject_two}}">{{$teacher->subject_two}}</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classtwo">
											<option selected="{{$teacher->class_two}}">{{$teacher->class_two}}</option>
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
											<option selected="{{$teacher->subject_three}}">{{$teacher->subject_three}}</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classthree">
											<option selected="{{$teacher->class_three}}">{{$teacher->class_three}}</option>
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
										<option selected="{{$teacher->subject_four}}">{{$teacher->subject_four}}</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classfour">
											<option selected="{{$teacher->class_four}}">{{$teacher->class_four}}</option>
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
											<option selected="{{$teacher->subject_five}}">{{$teacher->subject_five}}</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classfive">
										<option selected="{{$teacher->class_five}}">{{$teacher->class_five}}</option>
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
											<option selected="{{$teacher->subject_six}}">{{$teacher->subject_six}}</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classsix">
										<option selected="{{$teacher->class_six}}">{{$teacher->class_six}}</option>
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
											<option selected="{{$teacher->subject_seven}}">{{$teacher->subject_seven}}</option>
										@foreach($subjects as $subject)
										<option value="{{$subject->subject}}">{{$subject->subject}}</option>
										
										@endforeach
									</select>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="classseven">
										<option selected="{{$teacher->class_seven}}">{{$teacher->class_seven}}</option>
									@foreach($classes as $class)
									<option value = "{{$class->class_name}}">{{$class->class_name}}</option>
									@endforeach
									</select>
			</div>
			
			</div>	
								</div>
							</div>


							<button class="btn btn-primary btn-block">Update Teacher</button>
						</form>
						
					</div>
					<!-- Default Basic Forms End -->


				



@endsection