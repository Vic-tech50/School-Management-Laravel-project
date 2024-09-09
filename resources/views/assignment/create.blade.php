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
											Assignment
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-danger "
										href="{{route('assignment.index')}}"
									
									>
										<i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i> Go Back
									</a>
								</div>
							</div>
						</div>
					</div>
				

					<!-- horizontal Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Give Assignment</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container"  action="{{route('assignment.store')}}" method="post" enctype="multipart/form-data">
                                                  @csrf
							
							<div class="form-group">
								<label>Title*</label>
								<input
									type="text"
									class="form-control-file form-control height-auto" value = "{{old('title')}}"  name = "title"
									 required
								/>
							</div>

								<div class="row">
								<div class="col-6">
							<div class="form-group">
								<label> End Date</label>
								<input
									type="date"
									class="form-control-file form-control height-auto" name = "end_date"
								
								/>
							</div>
						</div>

							<div class="col-6">
							<div class="form-group">
								<label> End Time</label>
								<input
									type="time"
									class="form-control-file form-control height-auto" name = "end_time"
								
								/>
							</div>
						</div>
					</div>

						<div class="form-group">
								<label>Class*</label>
								<select class="custom-select col-12" name = "student" required>
				
				<option value="{{Auth::user()->class_one}} {{Auth::user()->subject_one}}">{{Auth::user()->class_one}} -  {{Auth::user()->subject_one}}</option>
				@if(Auth::user()->class_two &&  Auth::user()->subject_two)
				<option value="{{Auth::user()->class_two}} {{Auth::user()->subject_two}}">{{Auth::user()->class_two}} - {{Auth::user()->subject_two}}</option>
				@endif
				@if(isset(Auth::user()->class_three) &&  isset(Auth::user()->subject_three))
				<option value="{{Auth::user()->class_three}} {{Auth::user()->subject_three}}">{{Auth::user()->class_three}} - {{Auth::user()->subject_three}}</option>
				@endif
				@if(Auth::user()->class_four &&  Auth::user()->subject_four)
				<option value="{{Auth::user()->class_four}} {{Auth::user()->subject_four}}">{{Auth::user()->class_four}} - {{Auth::user()->subject_four}}</option>
				@endif
				@if(Auth::user()->class_five &&  Auth::user()->subject_five)
				<option value="{{Auth::user()->class_five}} {{Auth::user()->subject_five}}">{{Auth::user()->class_five}} - {{Auth::user()->subject_five}}</option>
				@endif
				@if(Auth::user()->class_six &&  Auth::user()->subject_six)
				<option value="{{Auth::user()->class_six}} {{Auth::user()->subject_six}}">{{Auth::user()->class_six}} - {{Auth::user()->subject_six}}</option>
				@endif
				@if(Auth::user()->class_seven &&  Auth::user()->subject_seven)
				<option value="{{Auth::user()->class_seven}} {{Auth::user()->subject_seven}}">{{Auth::user()->class_seven}} - {{Auth::user()->subject_seven}}</option>
				@endif
			
				

				
				
			</select>
							</div>

							<div class="form-group">
								<label>Assignment Type*</label>
								<select class="custom-select col-12" name = "type" ng-model = "myVar" required>
				
				<option value="pdf">PDF</option>
				<option value="form">Form</option>
				
			</select>
							</div>

	<div ng-switch="myVar">
  <div ng-switch-when="pdf">
    <div class="">
								<label>PDF*</label>
								<input
									type="file"
									class="form-control-file form-control height-auto" name = "pdf" accept=".pdf"
									 required
								/>
							</div>
  </div><br>
  <div ng-switch-when="form">
   <div class="form-group">
								<label>Description*</label>
								<textarea id="space" class="form-control" name = "description" required></textarea>
							</div>
  </div>
 
</div>

							

							<button class="btn btn-primary btn-block">Send Assignment</button>
							
						</form>
				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>

</div>


@endsection