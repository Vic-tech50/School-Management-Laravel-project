@extends('layouts.teacher')
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
									
									@if(Auth::user()->passport != null)
									<img
										src="{{ asset('uploads')}}/{{Auth::user()->passport}}"
										alt=""
										class="avatar-photo"
										style = "height: 150px;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style = "height: 150px;"
									/>
									@endif

									
								</div>
								<h5 class="text-center h5 mb-0">{{Auth::user()->name}}</h5>
								<p class="text-center text-muted font-14">
								
								</p>
								<div class="profile-info">
									<h5 class="mb-20 h5 text-blue">Contact Information</h5>
									<ul>
										<li>
											<span>Email Address:</span>
											{{Auth::user()->email}}
										</li>
										<li>
											<span>Phone Number:</span>
											{{Auth::user()->phone}}
										</li>

										<li>
											<span>Gender:</span>
											{{Auth::user()->gender}}
										</li>

										<li>
											<span>Date Of Birth:</span>
											{{Auth::user()->dob}}
										</li>
										<li>
											<span>Address:</span>
											{{Auth::user()->address}}
										</li>
									</ul>
								</div>


								<div class="profile-info">
									<h5 class="mb-20 h5 text-blue">Qualification</h5>
									<ul>
										<li>
											<span>Area of Study:</span>
											{{Auth::user()->course}}
										</li>
										<li>
											<span>Certificate:</span>
											{{Auth::user()->certificate}}
										</li>

									</ul>
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
													href="#timeline"
													role="tab"
													>Profile</a
												>
											</li>
										
											<li class="nav-item">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#setting"
													role="tab"
													>Security</a
												>
											</li>

											<li class="nav-item">
												<a
													class="nav-link"
													data-toggle="tab"
													href="#passport"
													role="tab"
													>Passport</a
												>
											</li>

										</ul>
										<div class="tab-content">
											<!-- Timeline Tab start -->
											<div
												class="tab-pane fade show active"
												id="timeline"
												role="tabpanel"
											>
												<div class="profile-setting">
													<form action="{{route('update.profile')}}" method="POST">
														@csrf
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-12">
																<h4 class="text-blue h5 mb-20">
																	Edit Your Personal Setting
																</h4>
																<div class="form-group">
																	<label>Full Name</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" name = "name" value = "{{Auth::user()->name}}"
																	/>
																</div>
																<div class="form-group">
																	<label>Email</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" name = "email" value = "{{Auth::user()->email}}"
																	/>
																</div>
																
																<div class="form-group">
																	<label>Date of birth</label>
																	<input
																		class="form-control form-control-lg date-picker"
																		type="text" name = "dob" value = "{{Auth::user()->dob}}"
																	/>
																</div>
																
																
																<div class="form-group">
																	<label>Address</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" name = "address" value = "{{Auth::user()->address}}"
																	/>
																</div>
																
																<div class="form-group mb-0">
																	<input
																		type="submit"
																		class="btn btn-primary"
																		value="Update Information"
																	/>
																</div>
															</li>
															
														</ul>
													</form>
												</div>
											</div>
											<!-- Timeline Tab End -->
										
											<!-- Setting Tab start -->
											<div
												class="tab-pane fade height-100-p"
												id="setting"
												role="tabpanel"
											>
													<div class="profile-setting">
													<form action="{{route('update.password')}}" method="POST">
														@csrf
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-12">
																<h4 class="text-blue h5 mb-20">
																	Edit Your Security Setting
																</h4>
																<div class="form-group">
																	<label>Old Password</label>
																	<input
																		class="form-control form-control-lg"
																		type="password" name = "current_password" placeholder = "********"
																	/>
																</div>
																<div class="form-group">
																	<label>New Password</label>
																	<input
																		class="form-control form-control-lg"
																		type="password" name = "password"  placeholder = "**********"
																	/>
																</div>
																
																<div class="form-group">
																	<label>Confirm Password</label>
																	<input
																		class="form-control form-control-lg"
																		type="password" name = "password_confirmation" placeholder = "**********"
																	/>
																</div>
																
																
																
																
																<div class="form-group mb-0">
																	<input
																		type="submit"
																		class="btn btn-primary"
																		value="Update Security"
																	/>
																</div>
															</li>
															
														</ul>
													</form>
												</div>
											</div>
											<!-- Setting Tab End -->

												<!-- Setting Tab start -->
											<div
												class="tab-pane fade height-100-p"
												id="passport"
												role="tabpanel"
											>
													<div class="profile-setting">
													<form action="{{route('update.pic')}}" method="POST" enctype="multipart/form-data">
														@csrf
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-12">
																<h4 class="text-blue h5 mb-20">
																	Change Your Profile Image
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
											<!-- Setting Tab End -->



										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


@endsection