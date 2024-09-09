@extends('layouts.medical')
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
											<a href="/medical/home">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Patient Report
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
								<h4 class="text-blue h4">Add Patient Report</h4>
								
							</div>
						
						</div><br>
						<form class="container" action = "{{route('patient.store')}}" method="post" enctype="multipart/form-data">
							@csrf

												<center>
@if($user->passport != null)
    <img type="file" src = "{{ asset('uploads/students')}}/{{$user->passport}}" id = "im" class = "w3-circle w3-card-4" style = " width: 100px; height: 100px;" alt = "profile photo"  >
    @else
	    <img
											src="{{ asset('vendors/images/person.svg') }}"
											alt=""
											class="avatar-photo w3-circle w3-card-4"
											style = "width: 100px; height: 100px;"
										/>
		@endif
    <br><br> 
    <input type="hidden" name="passport" value="{{$user->passport}}">
    <br><br>

</center>
			<div class="form-group row">


								<label class="col-sm-12 col-md-2 col-form-label"><b>Student Details</b></label>
								<div class="col-sm-12 col-md-10">
									<div class="row">
										<div class="col-lg-3 mb-3">
											<input
										class="form-control"
										type="text"
										readonly
										style = "text-transform: uppercase;"
										value="{{$user->reg_number}}"
										placeholder="Enter Full Name"
										name = "reg_number"
									/>
										</div>

										<div class="col-lg-3 mb-3">
											<input
										class="form-control"
										type="text"
										value="{{$user->name}} {{$user->last_name}}"
										placeholder="Enter Full Name"
										name = "name"
										readonly
									/>
										</div>

										<div class="col-lg-3 mb-3">
										<input
										class="form-control"
										placeholder="Enter Phone Number"
										type="number"
										name = "phone"
										value="{{$user->phone}}"
										readonly
									/>
										</div>

											<div class="col-lg-3 mb-3">
										<input
										class="form-control"
										value="{{$user->email}}"
										type="email"
										name = "email"
										placeholder = "Enter Email"
										readonly
									/>
										</div>





									</div>
									
								</div>
							</div>


								<div class="form-group row">


								<label class="col-sm-12 col-md-2 col-form-label"></label>
								<div class="col-sm-12 col-md-10">
									<div class="row">
										<div class="col-lg-3 mb-3">
									<!-- 		<input
										class="form-control"
										type="text"
										readonly
										style = "text-transform: uppercase;"
										value="{{$user->reg_number}}"
										placeholder="Enter Full Name"
										name = "reg_number"
									/> -->
										</div>

										<div class="col-lg-3 mb-3">
											<input
										class="form-control"
										type="text"
										value="{{$user->blood_group}}"
									
										name = "blood"
										readonly
									/>
										</div>

										<div class="col-lg-3 mb-3">
										<input
										class="form-control"
										
										type="text"
										name = "genotype"
										value="{{$user->genotype}}"
										readonly
									/>
										</div>

											<div class="col-lg-3 mb-3">
									<!-- 	<input
										class="form-control"
										value="{{$user->email}}"
										type="email"
										name = "email"
										placeholder = "Enter Email"
										readonly
									/> -->
										</div>



										

									</div>
									
								</div>
							</div>

							
							
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"><b>Urgency</b></label>
								<div class="col-sm-12 col-md-10">
										<select class="custom-select col-12" name="urgency">
										<option selected="Low">Low</option>
									<option value="Medium">Medium</option>
									<option value="High">High</option>
									<option value="Critical">Critical</option>
								
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"><b>Health Challenge</b></label>
								<div class="col-sm-12 col-md-10">
								 <select id="sickness" class="custom-select col-12" name="sickness">
        <option value="cold">Common Cold</option>
        <option value="flu">Flu</option>
        <option value="stomach_ache">Stomach Ache</option>
        <option value="headache">Headache</option>
        <option value="headache">Malaria</option>
        <option value="headache">Apendice</option>
        <option value="allergies">Allergies</option>
        <option value="fever">Fever</option>
        <option value="asthma">Asthma Attack</option>
        <option value="skin_rash">Skin Rash</option>
        <option value="sore_throat">Sore Throat</option>
        <option value="ear_infection">Ear Infection</option>
        <option value="pink_eye">Pink Eye (Conjunctivitis)</option>
        <option value="bronchitis">Bronchitis</option>
        <option value="pneumonia">Pneumonia</option>
        <option value="mono">Mononucleosis</option>
        <option value="chickenpox">Chickenpox</option>
        <option value="measles">Measles</option>
        <option value="mumps">Mumps</option>
        <option value="diarrhea">Diarrhea</option>
        <option value="constipation">Constipation</option>
        <option value="food_poisoning">Food Poisoning</option>
        <option value="migraine">Migraine</option>
        <option value="fainting">Fainting</option>
        <option value="nosebleed">Nosebleed</option>
        <option value="sunburn">Sunburn</option>
        <option value="dehydration">Dehydration</option>
        <option value="anxiety">Anxiety</option>
        <option value="depression">Depression</option>
        <option value="panic_attack">Panic Attack</option>
        <option value="diabetes_related_issue">Diabetes-Related Issue</option>
        <option value="seizure">Seizure</option>
        <option value="fracture">Fracture</option>
        <option value="sprain">Sprain</option>
        <option value="cut_bruise">Cut/Bruise</option>
        <option value="other">Other</option>
    </select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									><b>Doctor's Advice</b></label
								>
								<div class="col-sm-12 col-md-10">
									<textarea class="form-control" name="advice"></textarea>
								</div>
							</div>

	<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label"
									><b>Other Comment</b></label
								>
								<div class="col-sm-12 col-md-10">
									<textarea class="form-control" name="comment"></textarea>
								</div>
							</div>






							<button class="btn btn-primary btn-block">Add Report</button>
						</form>
						
					</div>
					<!-- Default Basic Forms End -->


				



@endsection