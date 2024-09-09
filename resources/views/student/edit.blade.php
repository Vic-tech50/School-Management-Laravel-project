	@extends('layouts.admin')

@section('content')
	<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Profile</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Profile
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="pd-20 card-box height-100-p">
								<div class="profile-photo">
								
									@if($student->passport != null)
									<img
										src="{{ asset('uploads/students')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle"
										style = "height: 170px; width: 170px; border: 4px solid orange;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 70px;"
									/>
									@endif
								
								</div>
								<h5 class="text-center h5 mb-0">{{$student->name}} {{$student->last_name}}</h5>
								<p class="text-center text-muted font-14 w3-text-black"  style="text-transform: uppercase;">
									{{$student->reg_number}}
								</p>
								<div class="profile-info">
									<h5 class="mb-20 h5 text-blue">Contact Information</h5>

									<table class="w3-table ">
										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Class: </b></td>
											<td><b>{{$student->class}} </b></td>
										</tr>
										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Gender: </b></td>
											<td><b>{{$student->gender}}</b></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Contact Address: </b></td>
											<td><b>{{$student->address}}, {{$student->city}} </b></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>State Of Origin: </b></td>
											<td><b>{{$student->state_of_origin}} </b></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Date Of Birth: </b></td>
											<td><b>{{$student->dob}} </b></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Blood Group: </b></td>
											<td><b>{{$student->blood_group}} </b></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Genotype: </b></td>
											<td><b>{{$student->genotype}} </b></td>
										</tr>

									</table>
									
								</div>
								<div class="profile-social">
									<h5 class="mb-20 h5 text-blue">Sponsor Information</h5>
								<table class="w3-table ">
										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Parent Name: </b></td>
											<td><b>{{$student->parent_name}} </b></td>
										</tr>
										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Relationship: </b></td>
											<td><b>{{$student->relationship}}</b></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Email Address: </b></td>
											<td><a href="mailto: {{$student->email}}"><b>{{$student->email}} </b> </a></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Phone Number: </b></td>
											<td><a href="tel: {{$student->phone}}"><b>{{$student->phone}} </b> </a></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Occupation: </b></td>
											<td><a href="tel: {{$student->phone}}"><b>{{$student->occupation}} </b> </a></td>
										</tr>


									</table>
								</div>
								<div class="profile-skills">
									<h5 class="mb-20 h5 text-blue">Admission Information</h5>
									<table class="w3-table ">
										@if($student->admission_type == 'Admission')
										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Admission Type: </b></td>
											<td><b>{{$student->admission_type}} </b></td>
										</tr>
										@else

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>Admission Type: </b></td>
											<td><b>{{$student->admission_type}}</b></td>
										</tr>

										<tr>
											<td class="w3-text-blue w3-bold" style="text-transform: uppercase;"><b>School Transferred From: </b></td>
											<td><a href="mailto: {{$student->email}}"><b>{{$student->which_school}} </b> </a></td>
										</tr>
										@endif

									


									</table>
									
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
							<div class="card-box height-100-p overflow-hidden">
								<div class="profile-tab height-100-p">
									<div class="tab height-100-p">
										<ul class="nav nav-tabs customtab" role="tablist">

											<li class="nav-item">
												<a
													class="nav-link active"
													data-toggle="tab"
													href="#setting"
													role="tab"
													>Settings</a
												>
											</li>
											
											<li class="nav-item">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#tasks"
													role="tab"
													>Passport</a
												>
											</li>
											<li class="nav-item">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#timeline"
													role="tab"
													>Check Result</a
												>
											</li>
											
										</ul>
										<div class="tab-content">
											<!-- Timeline Tab start -->
											<div
												class="tab-pane fade"
												id="timeline"
												role="tabpanel"
											>
												<div class="pd-20">
													<div class="profile-timeline">
														<div class="timeline-month">
															
						  								</div>

													<form method="post" action="/admin_student_result">
														@csrf
														<input type="hidden" name="reg_number" value="{{$student->reg_number}}">
														<div class="row">
															

														<div class="col-lg-3 col-sm-12">
															<label >Class</label>
																	<select class="custom-select col-12" name = "class" required>
				
			<option value="JSS1">JSS1</option>
			<option value="JSS2">JSS2</option>
			<option value="JSS3">JSS3</option>
			<option value="SSS1">SSS1</option>
			<option value="SSS2">SSS2</option>
			<option value="SSS3">SSS3</option>
				
			</select>													</div>

			<div class="col-lg-3 col-sm-12">
																<label>Year*</label>
								<select class="custom-select col-12" name = "year" required>
									@foreach($years as $year)
									<option value="{{$year->year}}">{{$year->year}}</option>
									@endforeach
			
				
			</select>
													</div>

														<div class="col-lg-3 col-sm-12">
														<div class="form-group">
								<label>Term*</label>

			<select class="custom-select col-12" name="term">
									
									<option value="First Term">First Term</option>
									<option value="Second Term">Second Term</option>
									<option value="Third Term">Third Term</option>
																		</select>
			</div>
													</div>


														<div class="col-lg-3 col-sm-12">
															<br>
														<button class="btn btn-outline-primary">Check Result</button>
													</div>


													</div>
													</form>
														
													
														
														
													</div>
												</div>
											</div>
											<!-- Timeline Tab End -->
											<!-- Tasks Tab start -->
											<div class="tab-pane fade" id="tasks" role="tabpanel">
													<div class="profile-setting">
													<form action="{{route('update.pic')}}" method="POST" enctype="multipart/form-data">
														@csrf
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-12">
																<h4 class="text-blue h5 mb-20">
																	Change Profile Image
																</h4>
																
																							<center>
																

    <img  src = "{{ asset('vendors/images/person.svg') }}" id = "im" class = "w3-circle w3-card-6" style = " width: 100px; height: 100px;" alt = "profile photo"  ><br><br> 
<div class="form-group">
    <input type="file" name="image" accept="image/*" id="fileid" style="text-align: center;" class=""  onchange="loadImageFileAsURL();"  /> 
   

																</div><br><br>

																<div class="form-group mb-0">
																	<input
																		type="submit"
																		class="btn btn-primary"
																		value="Upload Image"
																	/>
																</div>
</center>
																
																
																
																
																
																
																
															</li>
															
														</ul>
													</form>
												</div>
											</div>
											<!-- Tasks Tab End -->
											<!-- Setting Tab start -->
											<div
												class="tab-pane show active fade height-100-p"
												id="setting"
												role="tabpanel"
											>
												<div class="profile-setting">
													<form>
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-6">
																<h4 class="text-blue h5 mb-20">
																	Edit Your Personal Setting
																</h4>
																<div class="form-group">
																	<label>First Name</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																		name = "name"
																		value="{{$student->name}}"

																	/>
																</div>
																<div class="form-group">
																	<label>Last Name</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																			name = "last_name"
																		value="{{$student->last_name}}"
																	/>
																</div>
																
																<div class="form-group">
																	<label>Date of birth</label>
																	<input
																		class="form-control form-control-lg date-picker"
																		type="text"
																			name = "dob"
																		value="{{$student->dob}}"
																	/>
																</div>
																
																<div class="form-group">
																	<label>Gender</label>
																	<select
																		class="selectpicker form-control form-control-lg"
																		data-style="btn-outline-secondary btn-lg" name = "gender"
																		
																	>
																	@if($student->gender == 'Male')
																		<option value="Female">Female</option>
																		<option value="Others">Others</option>
																		@else
																		<option value="Male">Male</option>
																		<option value="Others">Others</option>
																		@endif
																	</select>
																</div>
																<div class="form-group">
																	<label>State/Province/Region</label>
																							<select id="state" name="state" class="custom-select form-control">
													<option value="{{$student->state_of_origin}}">{{$student->state_of_origin}}</option>
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
															
															</li>
															<li class="weight-500 col-md-6">
																<h4 class="text-blue h5 mb-20">
																	Edit Parent Information
																</h4>
																<div class="form-group">
																	<label>Parent Name</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																			name = "parent_name"
																		value="{{$student->parent_name}}"
																	/>
																</div>
																<div class="form-group">
																	<label>Email:</label>
																	<input
																		class="form-control form-control-lg"
																		type="email"
																			name = "email"
																		value="{{$student->email}}"
																	/>
																</div>
																<div class="form-group">
																	<label>Phone :</label>
																	<input
																		class="form-control form-control-lg"
																		type="tel"
																			name = "phone"
																		value="{{$student->phone}}"
																	/>
																</div>
																<div class="form-group">
																	<label>Relationship</label>
																	<select class="custom-select form-control" name="relationship">
													<option value="{{$student->relationship}}">{{$student->relationship}}</option>
													<option value="Father">Father</option>
													<option value="Mother">Mother</option>
													<option value="Aunty">Aunty</option>
													<option value="Uncle">Uncle</option>
													<option value="Others">Others</option>
												</select>
																</div>
																<div class="form-group">
																	<label>Occupation:</label>
																	<input
																		class="form-control form-control-lg"
																		type="text"
																			name = "occupation"
																		value="{{$student->occupation}}"
																	/>
																</div>
																
																
															</li>
														</ul>
															<div class="form-group mb-0">
																	<input
																		type="submit"
																		class="btn btn-primary btn-block"
																		value="Save & Update"
																		style = "margin: 0px 10px 0 10px;"
																	/>
																</div>

													</form>
												</div>
											</div>
											<!-- Setting Tab End -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				@endsection