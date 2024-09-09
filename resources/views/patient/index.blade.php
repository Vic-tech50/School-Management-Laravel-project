	
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
												Patients
											</li>
										</ol>
									</nav>
								</div>
							
							</div>
						</div>
					
					
						
						<!-- Export Datatable start -->
						<div class="card-box mb-30">
							<div class="pd-20">
								<h4 class="text-blue h4">Patient Details</h4>

							
							</div>
							<div class="pb-20">
								<div class="table-responsive">
								<table
									class="table table-bordered hover multiple-select-row data-table-export nowrap"
								>
									<thead>
										<tr>
											
										
											<th>Passport</th>
											<th>Student Details</th>
										
											<th>Urgency</th>
											<th>Medical Condition</th>
											<th>Doctor's Advice</th>
											<th>Comment</th>
											<th>Status</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										@foreach($patient as $patient)
										<tr>
											
											<td>
												@if($patient->passport != null)
	    <img type="file" src = "{{ asset('uploads/students')}}/{{$patient->passport}}" id = "im" class = "w3-circle w3-card-4" style = " width: 80px; height: 80px;" alt = "profile photo" >
	    @else
	        <img src="{{ asset('vendors/images/person.svg') }}" alt="" class="avatar-photo w3-circle w3-card-4" style = "width: 80px; height: 80px;"/>
	        @endif
											</td>
											<td>
												<b>Name: </b>{{$patient->name}}<br>
												<b>Reg Number: </b> <span style="text-transform: uppercase;">{{$patient->reg_number}}</span>
											</td>
											
											<td>
											@if($patient->urgency == 'Low')
											<span class="badge badge-primary">{{$patient->urgency}} </span>
											@elseif($patient->urgency == 'Medium')
											<span class="badge badge-secondary">{{$patient->urgency}} </span>
											@elseif($patient->urgency == 'High')
											<span class="badge badge-warning">{{$patient->urgency}} </span>
											@else
											<span class="badge badge-danger">{{$patient->urgency}} </span>

											@endif
										</td>
											<td style="text-transform: capitalize;">{{$patient->sickness}}</td>
											<td class="expandable" onclick="expandCell(this)">{{$patient->advice}}</td>
											<td class="expandable" onclick="expandCell(this)">{{$patient->comment}}</td>
											<td>
											@if($patient->status == 0)	
											<span class="badge badge-danger">On Medication </span>
											@else
											<span class="badge badge-success">Discharged </span>
											@endif
										</td>
											<td>{{($patient->created_at)->format('D, F jS, Y ')}}</td>
										
											<td>
												@if($patient->status == 0)
												<div class="w3-row">
													<div class="w3-half">
												<form action="/discharge_patient" method="post">
													@csrf
													<input type="hidden" name="id" value="{{$patient->id}}">
												<button class="btn btn-outline-success w3-card-4">Discharge</button>
											</form>
										</div>
										<div class="w3-half">
												<form action="/discharge_patient" method="post">
													@csrf
													<input type="hidden" name="id" value="{{$patient->id}}">
												<button class="btn btn-outline-warning w3-card-4"><i class="fa fa-edit"></i> Edit</button>
											</form>
										</div>
									</div>
									@else
									<a class="btn btn-danger w3-card-4" href="{{route('patient.destroy', $patient->id)}}" data-confirm-delete = "true"><i class = "fa fa-times" ></i> Delete </a>

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