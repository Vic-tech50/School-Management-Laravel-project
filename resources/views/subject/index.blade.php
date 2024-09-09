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
											Subject
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
					
					<!-- Bordered table  start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">School Subject</h4>
								
							</div>
							<div class="pull-right">
								<a
									href="{{route('subject.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-plus"></i> Add Subject</a
								>
							</div>
						</div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Subject</th>
									<th scope="col">Action</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($subjects as $subject)
								<tr>
									<th scope="row">{{$loop->iteration}}</th>
									<td style="text-transform: capitalize;">{{$subject->subject}}</td>
									<td>
										<a href="{{route('subject.destroy', $subject->id)}}" data-confirm-delete = "true" class="btn btn-danger w3-card-4" ><i class = "fa fa-trash" ></i> Trash</a></td>
									
								</tr>
								@endforeach
								
							</tbody>
						</table>
					
					</div>
					<!-- Bordered table End -->
					
					
				</div>

@endsection