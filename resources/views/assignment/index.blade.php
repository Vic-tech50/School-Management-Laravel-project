@extends('layouts.teacher')
@section('content')

<style>
    /* Style for the horizontal rule */
    hr {
        border: none; /* Remove the default border */
        height: 2px; /* Set the height of the line */
        background-color: ; /* Set the background color */
        margin: 20px 0; /* Add some spacing above and below */
    }
</style>


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
											assignment
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Assignment</h4>

							<div class="pull-right">
								<a
									href="{{route('assignment.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-plus"></i> Give Assignment</a>
								
							</div>
						</div>
						<div class="pb-20 ">
							<div class="table-responsive">
								
								@foreach($ass_by_class as $class => $items)
								
								<hr>
    <h2 class="px-4">{{ $class }}</h2><hr>


							<table
								class="table table-striped table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										<th>Assignment ID</th>
										<th>Title</th>
										<th>Subject</th>
										<th>Type</th>
										<th>Description</th>
										<th>Date Of Submission</th>
										<th>Date Created</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

					
    
        @foreach($items as $item)
        <tr>
            <td>{{ $item->ass_id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->subject }}</td>
            <td style="text-transform: capitalize;">{{ $item->type }}</td>
            <td>
            	@if($item->type == 'pdf')
            	<a class="btn btn-success" href="uploads/assignments/{{$item->pdf}}" target="_blank"><i class = "fa fa-eye"></i> View PDF</a>
            	@else
            	<span style="max-width: 200px">{{ $item->description }} </span>
            @endif
          </td>
            <td>
            	@if($date >= $item->end_date)

            	<span class="badge badge-danger">{{ \Carbon\Carbon::parse($item->end_date)->format('D, F jS, Y') }} - {{ \Carbon\Carbon::parse($item->end_time)->format(' h:i:s A') }}</span>
@else
            	<span class="badge badge-success">{{ \Carbon\Carbon::parse($item->end_date)->format('D, F jS, Y') }} - {{ \Carbon\Carbon::parse($item->end_time)->format(' h:i:s A') }}</span>

            	@endif

            </td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('D, F jS, Y h:i:s A') }}</td>
            <td>
            	<a href="{{ route('assignment.edit', $item->id) }}" class="btn btn-info w3-card-4" ><i class = "fa fa-pencil"></i> Edit</a>
											<a class="btn btn-danger w3-card-4" href="{{route('assignment.destroy', $item->id)}}" data-confirm-delete = "true"><i class = "fa fa-trash"></i> Trash</a>
										</td>
          </tr>
        @endforeach
    


								
									
									
									
								</tbody>
							</table>
							@endforeach
						</div>
					</div>
					</div>
					<!-- Export Datatable End -->
				</div>


@endsection