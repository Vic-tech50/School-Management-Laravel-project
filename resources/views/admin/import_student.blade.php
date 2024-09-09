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
											Import Student Data
										</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				

					<!-- horizontal Basic Forms Start -->
					<div class="pd-20 card-box mb-30 ">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Upload CSV</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container" action="/studentscsv" method = "post" enctype="multipart/form-data">
                                                  @csrf
							
							<div class="form-group">
								<label>CSV*</label>
								<center>
									<i class="icon-copy bi bi-filetype-csv w3-jumbo" ></i>
								

								<input
									type="file"
									class="form-control-file height-auto" name = "csv_file"
									accept=".csv" required
								/>
								</center>
							</div>



							<button class="btn btn-primary btn-block">Start Import</button>
							
						</form>
				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>


@endsection