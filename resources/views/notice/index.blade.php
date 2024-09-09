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
											Notification
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				
				
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Notifications</h4>

							<div class="pull-right">
								<a
									href="{{route('notice.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-plus"></i> Send Notification</a>
								
							</div>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table
								class="table  table-bordered hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>Reciepient</th>
										<th>Description</th>
										<th>Date</th>
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($notice as $notice)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$notice->title}}</td>
										<td>{{$notice->reciepient}}</td>
										<td>{{$notice->description}}</td>
										<td>{{ \Carbon\Carbon::parse($notice->created_at)->format('D, F jS, Y h:i:s A') }}</td>
										<td>
											<button class="btn btn-info w3-card-4" onclick="document.getElementById('id01{{$notice->id}}').style.display='block'"><i class="fa fa-pencil"></i> Edit</button>

										<a class="btn btn-danger w3-card-4" href="{{route('notice.destroy', $notice->id)}}" data-confirm-delete = "true"><i class = "fa fa-trash"></i> Trash</a>


										</td>
									</tr>

									<div id="id01{{$notice->id}}" class="w3-modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round-xlarge" style="max-width:600px">
  
<br><br>
    <div class="w3-container">
      <div class="w3-section">
       				   <form method="POST" action="{{ route('notice.update', ['notice' => $notice->id]) }}">
                        @csrf
                        @method('PUT')
							 <div id="items">
							<div class="form-group">
								<label>Title</label>
								<input
									type="text"
									class="form-control-file form-control height-auto" value ="{{$notice->title}}" name = "title"
									 required
								/>
							</div>

							<div class="form-group">
								<label>Notice For*</label>
								<select class="custom-select col-12" name="reciepient" required>
										<option selected="" value ="{{$notice->reciepient}}">{{$notice->reciepient}}</option>
									<option value="Teacher">Teacher</option>
									<option value="Student">Student</option>
									<option value="Parent">Parent</option>
									
									</select>
								</div>

							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control"   name = "description" required>{{$notice->description}}</textarea>
							</div>

						</div>

							
							<button class="btn btn-primary btn-block">Update</button>
							
						</form>

      </div>
    </div>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01{{$notice->id}}').style.display='none'" type="button" class="w3-btn w3-red w3-round-large">Cancel</button>
    
    </div>

  </div>
</div>
									@endforeach
								
									
									
								</tbody>
							</table>
						</div>
					</div>
					</div>
					<!-- Export Datatable End -->
				</div>


@endsection