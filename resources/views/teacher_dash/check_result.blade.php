
@extends('layouts.teacher')
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
						<form class="" action = "/show_result" method="get">
							@csrf
							


							<div>
							
								<div>
											<div class="row p-10">
								<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="form-group">
								<label>Class*</label>
								<select class="custom-select col-12" name = "class" required>
				
				<option value="{{Auth::user()->class_one}}">{{Auth::user()->class_one}}</option>
				@if(Auth::user()->class_two)
				<option value="{{Auth::user()->class_two}}">{{Auth::user()->class_two}}</option>
				@endif
				@if(isset(Auth::user()->class_three))
				<option value="{{Auth::user()->class_three}}">{{Auth::user()->class_three}}</option>
				@endif
				@if(Auth::user()->class_four)
				<option value="{{Auth::user()->class_four}}">{{Auth::user()->class_four}}</option>
				@endif
				@if(Auth::user()->class_five)
				<option value="{{Auth::user()->class_five}}">{{Auth::user()->class_five}}</option>
				@endif
				@if(Auth::user()->class_six)
				<option value="{{Auth::user()->class_six}}">{{Auth::user()->class_six}}</option>
				@endif
				@if(Auth::user()->class_seven)
				<option value="{{Auth::user()->class_seven}}">{{Auth::user()->class_seven}}</option>
				@endif
			
				

				
				
			</select>
							</div>
					
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12">
								<div class="form-group">
								<label>Subject*</label>
								<select class="custom-select col-12" name = "subject" required>
				
				<option value="{{Auth::user()->subject_one}}">{{Auth::user()->subject_one}}</option>
				@if(Auth::user()->subject_two)
				<option value="{{Auth::user()->subject_two}}">{{Auth::user()->subject_two}}</option>
				@endif
				@if(isset(Auth::user()->subject_three))
				<option value="{{Auth::user()->subject_three}}">{{Auth::user()->subject_three}}</option>
				@endif
				@if(Auth::user()->class_four)
				<option value="{{Auth::user()->subject_four}}">{{Auth::user()->subject_four}}</option>
				@endif
				@if(Auth::user()->subject_five)
				<option value="{{Auth::user()->subject_five}}">{{Auth::user()->subject_five}}</option>
				@endif
				@if(Auth::user()->subject_six)
				<option value="{{Auth::user()->subject_six}}">{{Auth::user()->subject_six}}</option>
				@endif
				@if(Auth::user()->subject_seven)
				<option value="{{Auth::user()->subject_seven}}">{{Auth::user()->subject_seven}}</option>
				@endif
			
				

				
				
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
				</div>
					<!-- Default Basic Forms End -->


				


@endsection