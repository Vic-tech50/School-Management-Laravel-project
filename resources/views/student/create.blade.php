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
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Register Student
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
										<a
										class="btn btn-danger "
										href="{{route('student.index')}}"
									
									>
										<i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i> Go Back
									</a>
								</div>
							</div>
						</div>
					</div>


					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<h4 class="text-blue h4">Register Student</h4>
							
						</div>
						<div class="wizard-content">
							<form class="tab-wizard wizard-circle wizard vertical" id="form" action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
								@csrf
								<h5>Personal Info</h5>
								<section>
									<center>

    <img type="file" src = "{{ asset('vendors/images/person.svg') }}" id = "im" class = "w3-circle" style = " width: 100px; height: 100px;" alt = "profile photo" class="w3-card-6" ><br><br> 

    <input type="file" id="fileid" style="text-align: center;" class=""  onchange="loadImageFileAsURL();" name = "image" accept="image/*" /> <br><br>
    <label><b>Add Passport</b></label>
</center>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name :</label>
												<input type="text" class="form-control" name="name" value="{{old('name')}}" />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name :</label>
												<input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of Birth :</label>
												<input
													type="text"
													class="form-control date-picker"
													placeholder="Select Date"
													name = "dob"
													value="{{old('dob')}}"
												/>
										</div>
									</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Select Gender :</label>
												<select class="custom-select form-control" name="gender">
													<option value="{{old('gender')}}">{{old('gender')}}</option>
													
													<option value="Male">Male</option>
													<option value="Female">Female</option>
													<option value="Other">Other</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>State Of Origin :</label>
												
												<select id="state" name="state" class="custom-select form-control">
													<option value="{{old('state')}}">{{old('state')}}</option>
    <option value="">Select State</option>
    <option value="Abia">Abia</option>
    <option value="Adamawa">Adamawa</option>
    <option value="Akwa Ibom">Akwa Ibom</option>
    <option value="Anambra">Anambra</option>
    <option value="Bauchi">Bauchi</option>
    <option value="Bayelsa">Bayelsa</option>
    <option value="Benue">Benue</option>
    <option value="Borno">Borno</option>
    <option value="Cross River">Cross River</option>
    <option value="Delta">Delta</option>
    <option value="Ebonyi">Ebonyi</option>
    <option value="Edo">Edo</option>
    <option value="Ekiti">Ekiti</option>
    <option value="Enugu">Enugu</option>
    <option value="FCT">Federal Capital Territory (FCT)</option>
    <option value="Gombe">Gombe</option>
    <option value="Imo">Imo</option>
    <option value="Jigawa">Jigawa</option>
    <option value="Kaduna">Kaduna</option>
    <option value="Kano">Kano</option>
    <option value="Katsina">Katsina</option>
    <option value="Kebbi">Kebbi</option>
    <option value="Kogi">Kogi</option>
    <option value="Kwara">Kwara</option>
    <option value="Lagos">Lagos</option>
    <option value="Nasarawa">Nasarawa</option>
    <option value="Niger">Niger</option>
    <option value="Ogun">Ogun</option>
    <option value="Ondo">Ondo</option>
    <option value="Osun">Osun</option>
    <option value="Oyo">Oyo</option>
    <option value="Plateau">Plateau</option>
    <option value="Rivers">Rivers</option>
    <option value="Sokoto">Sokoto</option>
    <option value="Taraba">Taraba</option>
    <option value="Yobe">Yobe</option>
    <option value="Zamfara">Zamfara</option>
</select>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>City:</label>
												<input
													type="text"
													class="form-control "
													name = "city"
													value="{{old('city')}}"
												/>
											</div>
										</div>

										
									</div>
								</section>
								<!-- Step 2 -->
								<h5>Parent/Guardian Info</h5>
								<section>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Parent/Guardian Name :</label>
												<input type="text" class="form-control" name="parent_name" value="{{old('parent_name')}}" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Relationship :</label>
												<select class="custom-select form-control" name="relationship">
													<option value="{{old('relationship')}}">{{old('relationship')}}</option>
													<option value="Father">Father</option>
													<option value="Mother">Mother</option>
													<option value="Aunty">Aunty</option>
													<option value="Uncle">Uncle</option>
													<option value="Others">Others</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>Occupation :</label>
												<input type="text" class="form-control" name="occupation" value="{{old('occupation')}}" required />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Phone Number :</label>
												<input type="text" class="form-control" name="phone" value="{{old('phone')}}" />
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>Email Address :</label>
												<input type="text" class="form-control" name = "email" value="{{old('email')}}" />
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label>Home Address :</label>
												<input type="text" class="form-control" name="address" value="{{old('address')}}" />
											</div>
										</div>
										
									</div>
								</section>
								<!-- Step 3 -->
								<h5>Health Info</h5>
								<section>
									<div class="row">
											<div class="col-md-6">
											<div class="form-group">
												<label>Blood Group:</label>
												<select class="form-control" name="blood_group">
													<option value="{{old('blood_group')}}">{{old('blood_group')}}</option>
													<option value="O+">O+</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="AB">AB</option>
												</select>
											</div>
											<div class="form-group">
												<label>Genotype:</label>
												<select class="form-control" name="genotype">
													<option value="{{old('genotype')}}">{{old('genotype')}}</option>
													<option value="AA">AA</option>
													<option value="AS">AS</option>
													<option value="SS">SS</option>
													<option value="AH">AH</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Any Medical Condition? :</label>
											<select class="form-control" name="medical_status">
												<option value="{{old('medical_status')}}">{{old('medical_status')}}</option>
													<option value="Positive">Positive</option>
													<option value="Negative">Negative</option>
													
												</select>
											</div>
											<div class="form-group">
												<label>If Yes, What Is It?:</label>
												<input
													class="form-control"
													name = "medical_report"
													type="text"
													value="{{old('medical_report')}}"
												/>
											</div>
										</div>
									</div>
								</section>
								<!-- Step 4 -->
								<h5>Other Info</h5>
								<section>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Admission Type :</label>
												<select class="form-control" name="admission_type">
													<option value="{{old('admission_type')}}">{{old('admission_type')}}</option>
													<option value="Transfer">Transfer</option>
													<option value="Admission">Admission</option>
													
												</select>
											</div>
											<div class="form-group">
												<label>If Transfer, Which School?: </label>
												<input type="text" class="form-control" name="which_school" value="{{old('which_school')}}" />
											</div>
											<div class="form-group">
												<label>Registration Number: </label>
												<input type="text" class="form-control" name="reg_number" value="{{old('reg_number')}}" />
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Class :</label>
												<select class="form-control" name="class">
													<option value="{{old('class')}}">{{old('class')}}</option>
													@foreach($class as $class)
													<option value="{{$class->class_name}}">{{$class->class_name}}</option>
													@endforeach
													
												</select>
											</div>
										<div class="form-group">
												<label>Password: </label>
												<input type="password" class="form-control" name="password" value="{{old('password')}}" />
											</div>

											<div class="form-group">
												<label>Confirm Password: </label>
												<input type="password" class="form-control" name="password_confirmation" />
											</div>

										</div>
									</div>
								</section>
							</form>
						</div>
					</div>

					

@endsection