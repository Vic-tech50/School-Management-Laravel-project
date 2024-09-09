@extends('layouts.student')
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
											Check Result
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
								
								</div>
							</div>
						</div>
					</div>
					<!-- Default Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Check Result</h4>
								 
							
							</div>
						
						</div> 
						<form class="" action = "/student_result" method="post">
							@csrf
							


							<div>
							
								<div>
											<div class="row p-10">
								<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="form-group">
								<label>Class*</label>
								<select class="custom-select col-12" name = "class" required>
				
			<option value="JSS1">JSS1</option>
			<option value="JSS2">JSS2</option>
			<option value="JSS3">JSS3</option>
			<option value="SSS1">SSS1</option>
			<option value="SSS2">SSS2</option>
			<option value="SSS3">SSS3</option>
				
			</select>
							</div>
					
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12">
								<div class="form-group">
								<label>Year*</label>
								<select class="custom-select col-12" name = "year" required>
									@foreach($years as $year)
									<option value="{{$year->year}}">{{$year->year}}</option>
									@endforeach
			
				
			</select>
							</div>
					
			</div>


			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="form-group">
								<label>Term*</label>

			<select class="custom-select col-12" name="term">
									
									<option value="First Term">First Term</option>
									<option value="Second Term">Second Term</option>
									<option value="Third Term">Third Term</option>
																		</select>
			</div>
		</div>

				<div class="col-lg-3 col-md-6 col-sm-12">
								<br>
							<button class="btn btn-primary btn-block">Check Result</button>
			
			</div>	
								</div>
							</div>

						</form>
						
					</div>
					<!-- Default Basic Forms End -->



@endsection