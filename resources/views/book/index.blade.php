@extends('layouts.librarian')
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
											Book History
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
									href="{{route('book.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-plus"></i> Lend Books</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table table-striped table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										
										<th>Book Details</th>
										<th>Given To</th>
										<th>Total Books</th>
										<th>Borrowed On</th>
										<th>Return Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($book as $library)

									<tr>
										<td  style="text-transform: uppercase;">
											<b>Name:</b> {{$library->book_name}}<br>
											<b>class:</b> {{$library->class}}<br>
											<b>subject:</b> {{$library->subject}}

										</td>
										<td  style="text-transform: uppercase;">{{$library->staff}}</td>
									
										<td>{{$library->total}}</td>
										<td>{{ \Carbon\Carbon::parse($library->created_at)->format('D, F jS, Y ') }}</td>
										<td>
											@if($date >= $library->return_date )
											<span class="badge badge-danger">{{ \Carbon\Carbon::parse($library->return_date)->format('D, F jS, Y ') }}
											</span>
											@else
											<span class="badge badge-success">{{ \Carbon\Carbon::parse($library->return_date)->format('D, F jS, Y ') }}
											</span>

											@endif
											</td>
											<td>
												@if($library->status == 1)
													<span class="badge badge-success">Returned </span>
													@else
													<span class="badge badge-danger	">On Lend... </span>
													@endif

											</td>
										<td>
											@if($library->status == 1)

											<a href="{{route('book.destroy', $library->id)}}" class="btn btn-danger w3-card-4" data-confirm-delete = "true"><i class="fa fa-trash"></i> Trash

										</a>
										@else
										<form action="/clear_book" method="post">
											@csrf
											<input type="hidden" name="id" value="{{$library->id}}">
											<button class="btn btn-primary w3-card-4"><i class="fa fa-check"></i>  Clear</button>
										</form>
										@endif
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