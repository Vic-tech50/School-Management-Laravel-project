@extends('layouts.admin')
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
											News
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">News</h4>

							<div class="pull-right">
								<a
									href="{{route('news.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-plus"></i> Add News</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										
										<th>Image</th>
										<th>Title</th>
										<th>Description</th>
										<th>Date</th>
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($news as $news)
									<tr>
										<td><img src="{{ asset ('uploads') }}/{{$news->image}}" alt="img" style="height:100px; width: 100px;"  class="w3-round-large w3-card-4" /></td>
										<td>{{$news->title}}</td>
										<td style="max-width: 200px ">{{$news->description}}</td>
										<td>{{ \Carbon\Carbon::parse($news->created_at)->format('D, F jS, Y h:i:s A') }}</td>
										<td><a class="btn btn-info w3-card-4" href="{{ route('news.edit', $news->id) }}"><i class = "fa fa-pencil"></i> Edit</a>
											<a class="btn btn-danger w3-card-4" href="{{route('news.destroy', $news->id)}}" data-confirm-delete = "true"><i class = "fa fa-trash"></i> Trash</a>
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