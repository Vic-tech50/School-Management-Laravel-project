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
											Event
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Events</h4>

							<div class="pull-right">
								<a
									href="{{route('event.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-plus"></i> Add Event</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										
										<th>Title</th>
										<th>Start Date/Time</th>
										<th>End Date/Time</th>
										<th>Description</th>
										<th>Created At</th>
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@foreach($event as $event)

									<tr>
										<td>{{$event->title}}</td>
										<td>{{$event->start_date}} &#9585; {{$event->start_time}}</td>
										<td>
											@if($event->end_date == null || $event->end_time == null )
											<span class="text-danger"><b> No Date Set </b></span>

											@else

											{{$event->end_date}} &#9585; {{$event->end_time}}
											@endif
										</td>
										<td class="expandable" onclick = 'expandCell(this)'>{{$event->description}}</td>
										<td>{{$event->created_at}}</td>
										<td><a class="btn btn-info w3-card-4" href="{{ route('event.edit', $event->id) }}"><i class = "fa fa-pencil"></i> Edit</a>
										<a class="btn btn-danger w3-card-4" href="{{route('event.destroy', $event->id)}}" data-confirm-delete = "true"><i class = "fa fa-trash"></i> Trash</a>

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