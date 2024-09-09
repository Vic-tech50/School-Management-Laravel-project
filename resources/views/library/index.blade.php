@extends($layout)
@section('content')


		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="/home">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											library
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Library</h4>

							<div class="pull-right">
								<a
									href="{{route('library.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-plus"></i> Add Books</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table table-striped table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										
										<th>Book Name</th>
										<th>Subject</th>
										<th>Class</th>
										<th>Total Books</th>
										<th>Bought On</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($library as $library)

									<tr>
										<td style="text-transform: uppercase;">{{$library->book_name}}</td>
										<td>{{$library->subject}}</td>
										<td>{{$library->class}}</td>
										<td>{{$library->total}}</td>
										<td>{{ \Carbon\Carbon::parse($library->created_at)->format('D, F jS, Y ') }}</td>
										<td><a href="{{route('library.destroy', $library->id)}}" class="btn btn-danger w3-card-4" data-confirm-delete = "true"><i class="fa fa-trash"></i> Trash

										</a>
										</td>
									</tr>

									@endforeach

						
									
									
								</tbody>
							</table>
						</div>
					</div>
					</div>
					<!-- Export Datatable End -->
				</div>


@endsection