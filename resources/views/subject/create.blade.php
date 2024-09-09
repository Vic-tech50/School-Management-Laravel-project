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
											Add Subject
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="">
									<a
										class="btn btn-danger "
										href="{{route('subject.index')}}"
										
									>
										<i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i> Go Back
									</a>
									
								</div>
							</div>
						</div>
					</div>

					
				
					<div class="row">
						
						<!-- Bootstrap Tags Input Start -->
						<div class="col-md-12 col-sm-12 mb-30">
							<div class="pd-20 card-box height-100-p">
								<div class="clearfix mb-30">
									<div class="pull-left">
										<h4 class="text-blue h4">Subject</h4>
									</div>
								</div>
								<form class="container" action="{{route('subject.store')}}" method="post">
									@csrf
								
									<div class="mb-30">
										<h5 class="h5">Add Subject</h5>
									
										<input
											type="text"
											name="subject"
											class = "form-control"
											style = "height: 60px;"
											value=""
											data-role="tagsinput"
											placeholder="add subject and press enter"
										/>

									</div>

									<button class="btn btn-outline-primary">Add Subject</button>
								</form>
							</div>
						</div>
						<!-- Bootstrap Tags Input End -->
					</div>
				
				</div>

@endsection