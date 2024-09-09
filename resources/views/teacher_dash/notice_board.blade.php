@extends('layouts.teacher')
@section('content')

<div class="main-container">
			<div class="pd-ltr-20 height-100-p xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Notification
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="blog-wrap">
						<div class="container pd-0">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="blog-list">
										<ul>
												@forelse($notices as $notice)
											<li>
												<div class="" style="padding: 10px;" >
													
													<div class="">
														<div class="blog-caption">
															
																<h4><b>{{$notice->title}}</b></h4> 
																<hr>
																	
															
															<div class="blog-by">
																<p class="expandable" onclick="expandCell(this)" >
																	{{$notice->description}}
																</p>
																
															</div>
															<small class="text-success w3-right" style="padding-top: 0;"><i>{{ \Carbon\Carbon::parse($notice->created_at)->format('D, F jS, Y h:i:s A') }}</i></small>
														</div>
													</div>
												</div>

											
											</li>
											@empty

													<div class="" style="padding: 30px;">
													
													<div class="p-20">
														<div class="blog-caption">
														
															<div class="blog-by">
																<p class="text-danger">
																	No Notice Yet
																</p>
																
															</div>
														</div>
													</div>
												</div>

												@endforelse
											
										</ul>

										{{ $notices->links() }}
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
				</div>


@endsection