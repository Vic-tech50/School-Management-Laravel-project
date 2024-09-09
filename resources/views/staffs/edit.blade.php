@extends('layouts.admin')
@section('content')

<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="/admin/home">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Form Basic
										</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
					<!-- Default Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Add New Staff</h4>
								
							</div>
						
						</div><br>
						<form class="" action = "{{route('staffs.update', $staff->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PUT')

												<center>

    <img type="file" src = "{{ asset('vendors/images/person.svg') }}" id = "im" class = "w3-circle" style = " width: 100px; height: 100px;" alt = "profile photo" class="w3-card-6" ><br><br> 

    <input type="file" id="fileid" style="text-align: center;" class=""  onchange="loadImageFileAsURL();" name = "image" accept="image/*" /> <br><br>
    <label><b>Add Passport</b></label>
</center>

							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Full Name*</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
										type="text"
										value="{{$staff->name}}"
										
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
										value="{{$staff->phone}}"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Email</label>
								<div class="col-sm-12 col-md-10">
									<input
										class="form-control"
									value="{{$staff->email}}"
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
										value="{{$staff->address}}"
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
										value="{{$staff->dob}}"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									>Gender</label
								>
								<div class="col-sm-12 col-md-10">
								<div class="row">


							@if($staff->gender == 'Male')
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

			@elseif($staff->gender == 'Female')
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


					@if($staff->marital == 'Married')
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
										value="{{$staff->course}}"
										type="text"
										name = "course"
										placeholder = "Enter Course"
									/>
			</div>
			<div class="col-6">
			<select class="custom-select col-12" name="certificate">
										<option selected="" value="{{$staff->certificate}}">{{$staff->certificate}}</option>
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

						{{-- 	<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Role</label>
								<div class="col-sm-12 col-md-10">
									<select class="custom-select col-12" name="role">
										<option selected="" value="{{$staff->type}}">{{$staff->type}}</option>
									<option value="1">Admin</option>
									<option value="4">Librarian</option>
									<option value="5">Medical</option>
									<option value="6">Security</option>
									<option value="7">Cleaner</option>
									
									</select>
								</div>
							</div> --}}




							<button class="btn btn-primary btn-block">Update Staff</button>
						</form>
						
					</div>
					<!-- Default Basic Forms End -->


				



@endsection