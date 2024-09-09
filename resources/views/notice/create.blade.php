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
											Send Notice
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-danger "
										href="{{route('notice.index')}}"
									
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
								<h4 class="text-blue h4">Send Notification</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container" action="{{ route('notice.store') }}" method = "post">
                                                  @csrf
							
							
							<div class="form-group">
								<label>Title*</label>
							<input
									type="text"
									class="form-control-file form-control height-auto" name = "title" required
								/>
							</div>

							<div class="form-group">
								<label>Notice For*</label>
								<select class="custom-select col-12" name="reciepient" required>
										<option selected="">Choose Reciepient</option>
									<option value="Teacher">Teacher</option>
									<option value="Student">Student</option>
									<option value="Parent">Parent</option>
									
									</select>
								</div>

							<div class="form-group">
								<label>Description*</label>
								<textarea class="form-control" name = "description" required></textarea>
							</div>

							<button class="btn btn-primary btn-block">Send</button>
							
						</form>
				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>


@endsection