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
											Add Event
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-danger "
										href="{{route('event.index')}}"
									
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
								<h4 class="text-blue h4">Add Event</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container" action="{{route('event.store')}}" method = "post">
                                                  @csrf
							
                            <div class="form-group">
								<label>What Is The Event? *</label>
							<input
									type="text"
									class="form-control-file form-control height-auto" name = "title" 
								/>
							</div>

							<div class="row">
								<div class="col-6">
							<div class="form-group">
								<label> Start Date*</label>
								<input
									type="date"
									class="form-control-file form-control height-auto" name = "start_date"
								 required
								/>
							</div>
						</div>

							<div class="col-6">
							<div class="form-group">
								<label> Start Time*</label>
								<input
									type="time"
									class="form-control-file form-control height-auto" name = "start_time"
								 required
								/>
							</div>
						</div>
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
								<label>Description</label>
								<textarea class="form-control" name = "description"></textarea>
							</div>

							<button class="btn btn-primary btn-block" >Add Event</button>
							<!-- <button type="submit" @disabled($errors->isEmpty())>Submit</button> -->
							
						</form>
				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>


@endsection