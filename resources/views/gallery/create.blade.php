@extends('layouts.admin')
@section('content')

<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Gallery</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Add Image
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-danger "
										href="{{route('gallery.index')}}"
									
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
								<h4 class="text-blue h4">Add Image</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container" action="{{ route('gallery.store') }}" method = "post" enctype="multipart/form-data">
                                                  @csrf
							
							<div class="form-group">
								<label>Image*</label>
								<input
									type="file"
									class="form-control-file form-control height-auto" name = "image"
									accept="image/*" required
								/>
							</div>

							<div class="form-group">
								<label>Gallery/Slideshow*</label>
								<select class="custom-select col-12" name = "type">
				<option selected="">Choose...</option>
				<option value="Slideshow">Slideshow</option>
				<option value="Gallery">Gallery</option>
				
			</select>
							</div>

							<div class="form-group">
								<label>Caption</label>
								<textarea class="form-control" name = "description"></textarea>
							</div>

							<button class="btn btn-primary btn-block">Save Image</button>
							
						</form>
				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>


@endsection