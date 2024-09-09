
@extends('layouts.teacher')
@section('content')


		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">Welcome <span class="w3-text-red">Instructor</span> <span class="w3-text-blue" style="text-transform: capitalize;">{{Auth::user()->name}}</span></h2>
				</div>

				<div class="row pb-10">
					<div class="col-xl-6 col-lg-6 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{$classCount}}</div>
									<div class="font-14 text-secondary weight-500">
										Class
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf">
										<i class="icon-copy dw dw-school"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{$subjectCount}}</div>
									<div class="font-14 text-secondary weight-500">
										Subject
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#ff5b5b">
										<span class="icon-copy ti-book"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>

<style type="text/css">
	.post:hover {
		background-color: black;
	}
</style>

<div class="h5 mb-10">Quick Links</div>
		<div class="row pb-30">
    <div class="col-md-3 col-sm-6 mb-3 mb-sm-0">
        <a href="{{route('teacher.students')}}">	
        	<div class="card-box" style=" padding: 20px; height: 70px; ">
								<div class="w3-left h5 mb-0">Student Details</div>
								<div class="w3-right badge badge-success w3-text-white"><i class="fa fa-users"></i></div>
						</div></a>
    </div>
    <div class="col-md-3 col-sm-6 mb-3 mb-sm-0">
       <a href="{{route('teacher.attendance')}}" class="post">	
        	<div class="card-box" style=" padding: 20px; height: 70px; ">
								<div class="w3-left h5 mb-0">Mark Attendance</div>
								<div class="w3-right badge badge-success w3-text-white"><i class="fa fa-check-square"></i></div>
						</div></a>
    </div>
    <div class="col-md-3 col-sm-6 mb-3 mb-sm-0">
      <a href="{{route('teacher.students')}}">	
        	<div class="card-box" style=" padding: 20px; height: 70px; ">
								<div class="w3-left h5 mb-0">Upload Result</div>
								<div class="w3-right badge badge-success w3-text-white"><i class="fa fa-users"></i></div>
						</div></a>
    </div>
    <div class="col-md-3 col-sm-6 mb-3 mb-sm-0">
       <a href="{{route('assignment.index')}}">	
        	<div class="card-box" style=" padding: 20px; height: 70px; ">
								<div class="w3-left h5 mb-0">Give Assignment</div>
								<div class="w3-right badge badge-success w3-text-white"><i class="fa fa-book"></i></div>
						</div></a>
    </div>
</div>


				<div class="row">
					<div class="col-lg-6 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between pb-10">
								<div class="h5 mb-0">Class/Subject</div>
								
							</div>
							<div class="user-list">
								<ul class="container">

									<li class="d-flex align-items-center justify-content-between mx-10 ">
										<div class="name-avatar d-flex align-items-center pr-2">
											
											<div class="txt">
											
												<div class="font-14 weight-600">{{Auth::user()->class_one}}</div>
												
											</div>
										</div>
										<div class="cta flex-shrink-0">
										<p>{{Auth::user()->subject_one}}</p>
										</div>
									</li>
									<hr>
									@if(Auth::user()->class_two)
									<li class="d-flex align-items-center justify-content-between mx-10 ">
										<div class="name-avatar d-flex align-items-center pr-2">
											
											<div class="txt">
											
												<div class="font-14 weight-600">{{Auth::user()->class_two}}</div>
												
											</div>
										</div>
										<div class="cta flex-shrink-0">
										<p>{{Auth::user()->subject_two}}</p>
										</div>
									</li>
									<hr>
									@endif

										@if(Auth::user()->class_three)
									<li class="d-flex align-items-center justify-content-between mx-10 ">
										<div class="name-avatar d-flex align-items-center pr-2">
											
											<div class="txt">
											
												<div class="font-14 weight-600">{{Auth::user()->class_three}}</div>
												
											</div>
										</div>
										<div class="cta flex-shrink-0">
										<p>{{Auth::user()->subject_three}}</p>
										</div>
									</li>
									<hr>
									@endif

										@if(Auth::user()->class_four)
									<li class="d-flex align-items-center justify-content-between mx-10 ">
										<div class="name-avatar d-flex align-items-center pr-2">
											
											<div class="txt">
											
												<div class="font-14 weight-600">{{Auth::user()->class_four}}</div>
												
											</div>
										</div>
										<div class="cta flex-shrink-0">
										<p>{{Auth::user()->subject_four}}</p>
										</div>
									</li>
									<hr>
									@endif


										@if(Auth::user()->class_five)
									<li class="d-flex align-items-center justify-content-between mx-10 ">
										<div class="name-avatar d-flex align-items-center pr-2">
											
											<div class="txt">
											
												<div class="font-14 weight-600">{{Auth::user()->class_five}}</div>
												
											</div>
										</div>
										<div class="cta flex-shrink-0">
										<p>{{Auth::user()->subject_five}}</p>
										</div>
									</li>
									<hr>
									@endif

										@if(Auth::user()->class_six)
									<li class="d-flex align-items-center justify-content-between mx-10 ">
										<div class="name-avatar d-flex align-items-center pr-2">
											
											<div class="txt">
											
												<div class="font-14 weight-600">{{Auth::user()->class_six}}</div>
												
											</div>
										</div>
										<div class="cta flex-shrink-0">
										<p>{{Auth::user()->subject_six}}</p>
										</div>
									</li>
									<hr>
									@endif

										@if(Auth::user()->class_seven)
									<li class="d-flex align-items-center justify-content-between mx-10 ">
										<div class="name-avatar d-flex align-items-center pr-2">
											
											<div class="txt">
											
												<div class="font-14 weight-600">{{Auth::user()->class_seven}}</div>
												
											</div>
										</div>
										<div class="cta flex-shrink-0">
										<p>{{Auth::user()->subject_seven}}</p>
										</div>
									</li>
									<hr>
									@endif
								
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 mb-20">
						<div class="card-box" style=" padding: 20px; height: 70px; margin-bottom: 20px;">

								<div class="w3-left h5 mb-0">Status</div>
								<div class="w3-right badge badge-success w3-text-white">Active</div>

						
						</div>

					<div class="card-box" style=" padding: 20px; height: 70px; margin-bottom: 20px;">

								<div class="w3-left h5 mb-0">Member Since: </div>
								<div class="w3-right badge badge-info w3-text-white">{{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('D, F jS, Y') }}</div>

						
						</div>

						<div class="card-box" style=" padding: 20px; height: 70px; margin-bottom: 20px;">

								<div class="w3-left h5 mb-0">Gender: </div>
								<div class="w3-right badge badge-secondary w3-text-white">{{ Auth::user()->gender}}</div>

						
						</div>

							<div class="card-box" style=" padding: 20px; height: 70px; margin-bottom: 20px;">

								<div class="w3-left h5 mb-0">Qualification: </div>
								<div class="w3-right badge badge-primary w3-text-white">{{ Auth::user()->course}} / {{ Auth::user()->certificate}}</div>

						
						</div>
					</div>

				
				
				</div>

		


@endsection