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
											General Settings
										</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				

					<!-- horizontal Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Settings</h4>
								
							</div><br><br><br>
						
						</div>
							<form method="POST" class="container" action="{{ route('settings.update', ['setting' => 1]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
							
							<center><img src="{{ asset ('uploads') }}/{{$settings->logo}}" alt="img" style="height:150px ;width: 200px;" class="w3-round-xlarge w3-thumbnail" /> </center> <br><br>
							
										<div class="form-group">
								<label>Logo</label>
								
								<input
									type="file"
									class="form-control-file form-control height-auto" name = "image"
									accept="image/*"
								/>
							</div>
								

							<div class="form-group">
								<label class="text-lg">About Us</label>
								<textarea id="space" class="form-control" name = "about_us"> {{$settings->about_us}}</textarea>
							</div>

							<div class="form-group">
								<label>Objectives</label>
								<textarea id="space" class="form-control" name = "objective">{{$settings->objectives}}</textarea>
							</div>

							<div class="form-group">
								<label>Vision</label>
								<textarea id="space" class="form-control" name = "vision">{{$settings->vision}}</textarea>
							</div>

							<div class="form-group">
								<label>Mission</label>
								<textarea id="space" class="form-control" name = "mission">{{$settings->mission}}</textarea>
							</div>

							<p><b>Last Updated : </b><i>{{ \Carbon\Carbon::parse($settings->updated_at)->format('D, F jS, Y h:i:s A') }}</i></p>

							<button class="btn btn-primary btn-block">Update</button>
							
						</form>
				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>


@endsection