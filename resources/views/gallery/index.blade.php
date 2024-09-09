@extends('layouts.admin')
@section('content')

<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Gallery</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Gallery
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="gallery-wrap">
						<a href = "{{route('gallery.create')}}"> <button class="btn btn-primary pull-right w3-card-16"><i class="fa fa-plus"></i> Add Image</button></a><br><br><br><br>

						
						<!-- <center>
							<h4 class="text-danger">Gallery Empty. Add Image to Gallery</h4>
						</center> -->
						
						<ul class="row">
							@foreach($galleries as $gallery)
							<li class="col-lg-4 col-md-6 col-sm-12">
								<div class="da-card box-shadow">
									<div class="da-card-photo">
										<img src="{{ asset ('uploads') }}/{{$gallery->image}}" alt="img" style="height:515px ;" />
										<div class="da-overlay">
											<div class="da-social">
												<h5 class="mb-10 color-white pd-20">
													{{$gallery->description}}
												</h5>
												<ul class="clearfix">
													<li>
														<a
															href="{{ asset ('uploads') }}/{{$gallery->image}}"
															data-fancybox="images"
															><i class="fa fa-picture-o"></i
														>
													</a>
													</li>
													<li>
														<a href="{{ route('gallery.edit', $gallery->id) }}" title="Edit"><i class="fa fa-pencil"></i></a>
													</li>

													<li>
														<a href="{{ route('gallery.destroy', $gallery->id) }}" data-confirm-delete="true"><i class="fa fa-trash"></i></a>

										<!-- 				  <form action="{{ route('gallery.destroy',$gallery->id) }}" method="Post">
@csrf
@method('DELETE')
														<a data-confirm-delete="true"><button class="btn"><i class="fa fa-trash w3-text-white"></i></button></a>
													</form> -->
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>

							@endforeach
							
						</ul>
						
					</div>
				</div>

@endsection