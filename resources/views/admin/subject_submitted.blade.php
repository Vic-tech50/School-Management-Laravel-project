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
											Subject Submitted
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
								<h4 class="text-blue h4">Subject Submitted</h4>
								
							</div>
						
						</div>
						<div class="table-responsive">
					<table class="table table-bordered hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Subject</th>
									<th scope="col">Class</th>
									<th scope="col">Teacher</th>
									<th scope="col">Action</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($subject as $subject)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$subject->subject}}</td>
									<td>{{$subject->class}}</td>
									<td>{{$subject->teacher}}</td>
						
									
										 <td><a href="{{ route('subject.details', ['subject' => $subject->subject, 'class' => $subject->class]) }}" class="btn btn-info">Check</a></td>
									
								</tr>

								@endforeach
						
								
							</tbody>
						</table>
					</div>
					
					</div>
					<!-- Bordered table End -->



				</div>


@endsection