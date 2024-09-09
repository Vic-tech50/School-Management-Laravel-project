@extends('layouts.admin')
@section('content')

	<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="">
						<div class="page-header">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									
									<nav aria-label="breadcrumb" role="navigation">
										<ol class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="index.html">Home</a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">
												Students Details
											</li>
										</ol>
									</nav>
								</div>
							</div>
						</div>
						<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Student Details</h4>

							<div class="pull-right">
								<button id="promote-selected" class="btn btn-success w3-round-large w3-card-4">Promote Student</button>

								<button id="demote-selected" class="btn btn-danger w3-round-large w3-card-4">Demote Student</button>
								<a
									href="{{route('student.create')}}"
									class="btn btn-primary btn-sm w3-card-16 w3-padding"
									
									><i class="fa fa-check"></i> Register Student</a>
								
							</div><br><br>
						</div>
						<div class="pb-20">
							<div class="table-responsive">
							<table class="checkbox-datatable table-bordered table nowrap">
								<thead>
									<tr style="text-transform: uppercase;">
										  
										<th>#</th>
										<th>
											<div class="dt-checkbox">
												<input
													type="checkbox"
													name="select_all"
													value="1"
													id="example-select-all"
												/>
												<span class="dt-checkbox-label"></span>
											</div>
										</th>
										<th>Passport</th>
										<th>Reg Number</th>
										<th>Name</th>
										<th>Class</th>
										<th>Gender</th>
										<th>Date Of Birth</th>
										<th>Parent Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@foreach($students as $student)
									<tr>
										<td>{{$loop->iteration}}</td>
									<td>
										
										<input type="checkbox" class="select" value="{{ $student->id }}">
									

									</td>
									<!-- <td class="select-row"></td> -->

										<td>
											@if($student->passport != null)
										
									<img
										src="{{ asset('uploads')}}/{{$student->passport}}" 
										alt=""
										class="avatar-photo w3-circle w3-card-4"
										style = "height: 70px; width: 70px; border: 4px solid orange;"
									/>

							<!-- <button onclick="document.getElementById('id02{{$student->id}}').style.display=''" type="submit" class="btn btn-info w3-card-4" ><i class="fa fa-plus"></i> Add</button> -->
									@else

									<button onclick="document.getElementById('id01{{$student->id}}').style.display='block'" class="btn btn-info w3-card-4" ><i class="fa fa-plus"></i> Add</button>



<div id="id01{{$student->id}}" class="w3-modal">
 
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
  
  

    <div class="w3-container">
      <div class="w3-section">
        <h4 class="w3-text-black w3-center"><b>Take Capture of the student and Submit</b></h4>
         <span onclick="document.getElementById('id01{{$student->id}}').style.display='none'" class="w3-closebtn w3-text-red w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span><br>
    <form method="POST" action="{{ route('save.image') }}">
        @csrf

          <input type="hidden" name="id" value="{{$student->id}}">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>




            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-block btn-outline-success w3-large">Submit</button>
            </div>
        </div>
    </form>
      </div>
    </div>

    
    </div>

  </div>


</div>

									@endif</td>
										<td style="text-transform: uppercase;">{{$student->reg_number}} </td>
										<td style="text-transform: capitalize;">{{$student->name}} {{$student->last_name}} </td>
										<td style="text-transform: uppercase;">{{$student->class}} </td>
										<td style="text-transform: capitalize;">{{$student->gender}} </td>
										<td style="text-transform: capitalize;">{{$student->dob}} </td>
										<td style="text-transform: capitalize;">{{$student->parent_name}} </td>
										<td>
											<div class="row">
												<div class="col-4">
												<a href="{{ route('student.edit', $student->id) }}" title="Edit"><button class="btn btn-info w3-card-4"><i class="fa fa-pencil"></i> View </button></a>
											</div>
											<div class="col-4">
											 <form method="post" action="/check_result">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$student->id}}">
                                                    <input type="hidden" name="reg_number" value="{{$student->reg_number}}">
                                                <button class="btn btn-success w3-card-4"><i class="fa fa-eye"></i> Check</button>
                                            </form>
                                        </div>
                                    </div>
										</td>

									</tr>

						
									@endforeach
									
								</tbody>
							</table>
							
						</div>
					</div>
					</div>
					</div>
				</div>




<script language="JavaScript">
    // Set webcam properties
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    // Attach the webcam to the specified HTML element when the page loads
    // window.onload = function() {
        // Make sure the DOM is fully loaded before attaching the webcam
        Webcam.attach('#my_camera');
    // };

    // Function to take a snapshot
    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            // Set the value of the hidden image input
            document.querySelector(".image-tag").value = data_uri;

            // Display the captured image
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        });
    }

    // Error handling for Webcam.js
    Webcam.on('error', function(err) {
        console.log("Webcam Error: ", err);
    });
</script>


<!-- <script language="JavaScript">
    // Set webcam properties
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    // Ensure that Webcam.js is ready before attaching the camera
    Webcam.on('load', function() {
        Webcam.attach('#my_camera');
    });

    Webcam.on('error', function(err) {
        console.log("Webcam Error: ", err);
    });

    // Triggered after the page and scripts are fully loaded
    window.onload = function() {
        // Check if Webcam is loaded and attach it
        Webcam.attach('#my_camera');
    };

    // Function to take a snapshot
    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            // Set the value of the hidden image input
            $(".image-tag").val(data_uri);

            // Display the captured image
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        });
    }
</script> -->


<!-- <script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
//     window.onload = function() {
//     Webcam.attach('#my_camera');
// };
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script> -->

<script type="text/javascript">
	// 
	$(document).ready(function() {
    // Initialize DataTable
    var table = $('.checkbox-datatable').DataTable({
        select: {
            style: 'multi'
        }
    });

    // Handle "Select All" functionality
    $('#select-all').on('click', function() {
        var rows = table.rows({ 'search': 'applied' }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });

    // Handle promotion action
    $('#promote-selected').click(function() {
        var selectedIds = [];
        
        // Loop through all selected checkboxes
        $('.select:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            // Send the selected IDs to the backend for promotion
            $.ajax({
                url: '{{ route("users.promote") }}',
                method: 'POST',
                data: {
                    ids: selectedIds,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // alert(response.message);
                    	Swal.fire({
  title: 'Success!',
  text: response.message,
  icon: 'success',
  confirmButtonText: 'OK'
})
           
                    // Optionally reload the page or DataTable
                    location.reload();
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                }
            });
        } else {
            alert('Please select at least one row.');
        }
    });




    // Handle promotion action
    $('#demote-selected').click(function() {
        var selectedIds = [];
        
        // Loop through all selected checkboxes
        $('.select:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            // Send the selected IDs to the backend for promotion
            $.ajax({
                url: '{{ route("users.demote") }}',
                method: 'POST',
                data: {
                    ids: selectedIds,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // alert(response.message);
                    	Swal.fire({
  title: 'Success!',
  text: response.message,
  icon: 'success',
  confirmButtonText: 'OK'
})
           
                    // Optionally reload the page or DataTable
                    location.reload();
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                }
            });
        } else {
            alert('Please select at least one row.');
        }
    });
});


</script>
<script>

</script>


<!-- <script type="text/javascript">
	$(document).ready(function() {
    $('#edit-selected').click(function() {
        var selectedIds = [];
        $('.select-row:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            // Send the selected IDs to the backend for processing
            $.ajax({
                url: '',
                method: 'POST',
                data: {
                    ids: selectedIds,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success (e.g., redirect to an edit page or show a modal)
                    window.location.href = '/edit-multiple-users/' + selectedIds.join(',');
                },
                error: function(xhr) {
                    // Handle error
                    alert('Something went wrong!');
                }
            });
        } else {
            alert('Please select at least one row.');
        }
    });
});

</script> -->


@endsection