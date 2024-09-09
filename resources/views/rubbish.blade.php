
// public function mark_attendance(Request $request)
// {
//     // Fetch students based on your criteria
//     $students = User::where([['type', 0],['class', Auth::user()->class_one]])->get();

//     // Validate the request data
//     $request->validate([
//         'attendance' => 'required|array', // Ensure attendance data is provided and is an array
//         'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
//     ]);

//     // Loop through each student attendance record submitted
//     foreach ($request->attendance as $studentId => $status) {
//         // Find the student by ID
//         $student = $students->firstWhere('id', $studentId);

//         if($student){
//         // Create a new Attendance record for the student in the class
//         Attendance::create([
//             'class_id' => $students->class, // Assuming 'class' is the column containing the class name in the User model
//             'student_id' => $studentId,
//             'student_name' => $students->name, // Add student's name to the attendance record
//             'status' => $status,
//             'date' => now(), // Assuming you want to record the attendance for the current date
//         ]);
//         return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
//     }else{
//          Attendance::create([
//             'class_id' => $students->class, // Assuming 'class' is the column containing the class name in the User model
//             'student_id' => $studentId,
//             'student_name' => $students->name, // Add student's name to the attendance record
//             'status' => $status,
//             'date' => now(), // Assuming you want to record the attendance for the current date
//         ]);
//     }
//     }

//     // Redirect back to the attendance index page with a success message
    
// }    





// public function uploadImage(Request $request)
// {
//     try {
//         // Validate request to ensure 'image' field is required and is a string (base64 encoded)
//         $request->validate([
//             'image' => 'required|string', // You could also consider custom validation rules for base64 strings
//         ]);

//         // Retrieve and process the base64 image data
//         $imageData = $request->input('image');
//         $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);  // Remove the base64 header if exists
//         $imageData = str_replace(' ', '+', $imageData); // Replace spaces with plus signs to handle encoding issues
//         $imageData = base64_decode($imageData, true); // Decode base64 data

//         if ($imageData === false) {
//             throw new \Exception('Invalid image data');
//         }

//         // Define a unique name for the image
//         $imageName = 'image_' . time() . '.jpg';

//         // Save the image in the 'uploads' directory
//         file_put_contents(public_path('uploads/' . $imageName), $imageData);

//         dd(file_put_contents($uploadPath, $imageData));  // Will return bytes written or false
// dd(Image::create(['path' => $imageName]));      // Will return the created model instance or false


//         // Save the image path to the database
//         Image::create(['path' => 'test_image.jpg']);

//         // Respond with a success message
//         return response()->json(['message' => 'Image uploaded successfully'], 200);

//     } catch (\Exception $e) {
//         // Handle any errors and respond with a message
//         return response()->json(['message' => $e->getMessage()], 500);
//     }
// }


                                    <div id="id01{{$student->id}}" class="w3-modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round-xlarge" style="max-width:600px">
  
<br><br>
    <div class="w3-container">
      <div class="w3-section">
                       <form method="POST" action="/update_result">
                        @csrf
                       
                       <input type="hidden" name="id" value="{{$student->id}}">
                      
                             <div id="items">
                            <div class="form-group">
                                <label>Assignment</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->assignment}}" name = "assignment" oninput="calculateTotal('{{ $student->assignment }}')" min = '0' max = '10' id ="assignment"
                                     
                                />
                            </div>
                            <div class="form-group">
                                <label>First CA</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->first_ca}}" name = "first_ca" oninput="calculateTotal('{{ $student->first_ca }}')" min = "0" max = "10" id ="first_ca"
                                     
                                />
                            </div>

                            <div class="form-group">
                                <label>Second CA</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->second_ca}}" name = "second_ca" oninput="calculateTotal('{{ $student->second_ca }}')" min = "0" max = "10" id = "second_ca"
                                     
                                />
                            </div>



                            <div class="form-group">
                                <label>Examination</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->exam}}" name = "exam" oninput="calculateTotal('{{ $student->exam }}')" min = "0" max = "70" id = "exam"
                                     
                                />
                            </div>


                            <div class="form-group">
                                <label>Total</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->total}}" min = "0" max = "100" name = "total" readonly id="total"
                                     
                                />
                            </div>

                        </div>

                            
                            <button class="btn btn-primary btn-block" id="submit" onclick="submitForm()">Update</button>
                            
                        </form>

      </div>
    </div>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01{{$student->id}}').style.display='none'" type="button" class="w3-btn w3-red w3-round-large">Cancel</button>
    
    </div>

  </div>
</div>



  
public function uploadImage(Request $request)
{
    try {
        // Validate request
        $request->validate([
            'image' => 'required|string',
        ]);

        // Decode base64 image data
        $imageData = $request->input('image');
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData, true);

        if ($imageData === false) {
            throw new \Exception('Invalid image data');
        }

        // Save image to storage
        $imageName = 'image_' . time() . '.jpg';
        file_put_contents(public_path('uploads/' . $imageName), $imageData);

        // Save image path to database
        Image::create(['path' => $imageName]);

        return response()->json(['message' => 'Image uploaded successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}


<thead>
                                    <tr style="text-transform: uppercase;">
                                        <th>#</th>
                                        <th>Reg Number</th>
                                        <th>Name</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                        <th>First Total (100)</th>
                                        <th>Second Total (100)</th>
                                        <th>Grade</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result_third as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $student->reg_number }}</td>
                                        <td style="text-transform: capitalize;">{{ $student->name }} {{ $student->last_name }}</td>
                                     

                                      
                                        <td>{{ $student->assignment }}</td>
                                        <td>{{ $student->first_ca }}</td>
                                        <td>{{ $student->second_ca }}</td>
                                        <td>{{ $student->exam }}</td>
                                        <td>{{ $student->total }}</td>



                                        @foreach($result_second as $second)
                                        <td>{{ $second->total }}</td>
                                        @endforeach





                                        
                                        <td>{{ $student->grade }}</td>
                                        <td>
                                            {{ $student->remark }}</td>
                                      <td>
                                            <button class="btn btn-info" onclick="document.getElementById('id01{{$student->id}}').style.display='block'"><i class="fa fa-pencil"></i> Edit</button>

                                        


                                        </td>
                                    </tr>






  <video id="video" width="640" height="480" autoplay></video>
    <button id="capture-btn">Capture</button>
    <canvas id="canvas" style="display: none;"></canvas>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureBtn = document.getElementById('capture-btn');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error('Error accessing camera:', err);
            });

        captureBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            canvas.toBlob((blob) => {
                const formData = new FormData();
                formData.append('image', blob, 'image.jpg');

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
formData.append('_token', csrfToken);


                // Send formData to Laravel backend via AJAX
                fetch('upload-image', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        alert('Image uploaded successfully');
                    } else {
                        throw new Error('Failed to upload image');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to upload image');
                });
            }, 'image/jpeg');
        });
    </script>




  

 @if($term != 'Third Term')
                    
                        <div class="table-responsive">
                            <table
                                class="table table-bordered hover multiple-select-row data-table-export nowrap">
                                <thead>
                                    <tr style="text-transform: uppercase;">
                                        <th>#</th>
                                        <th>Reg Number</th>
                                        <th>Name</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                        <th>Grade</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $student->reg_number }}</td>
                                        <td style="text-transform: capitalize;">{{ $student->name }} {{ $student->last_name }}</td>
                                     

                                      
                                        <td>{{ $student->assignment }}</td>
                                        <td>{{ $student->first_ca }}</td>
                                        <td>{{ $student->second_ca }}</td>
                                        <td>{{ $student->exam }}</td>
                                        <td>{{ $student->total }}</td>
                                        <td>{{ $student->grade }}</td>
                                        <td>
                                            {{ $student->remark }}</td>
                                      <td>
                                            <button class="btn btn-info" onclick="document.getElementById('id01{{$student->id}}').style.display='block'"><i class="fa fa-pencil"></i> Edit</button>

                                        


                                        </td>
                                    </tr>

                                    <div id="id01{{$student->id}}" class="w3-modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round-xlarge" style="max-width:600px">
  
<br><br>
    <div class="w3-container">
      <div class="w3-section">
                       <form method="POST" action="/update_result">
                        @csrf
                       
                       <input type="hidden" name="id" value="{{$student->id}}">
                      
                             <div id="items">
                            <div class="form-group">
                                <label>Assignment</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->assignment}}" name = "assignment" oninput="calculateTotal('{{ $student->assignment }}')" min = '0' max = '10' id ="assignment"
                                     
                                />
                            </div>
                            <div class="form-group">
                                <label>First CA</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->first_ca}}" name = "first_ca" oninput="calculateTotal('{{ $student->first_ca }}')" min = "0" max = "10" id ="first_ca"
                                     
                                />
                            </div>

                            <div class="form-group">
                                <label>Second CA</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->second_ca}}" name = "second_ca" oninput="calculateTotal('{{ $student->second_ca }}')" min = "0" max = "10" id = "second_ca"
                                     
                                />
                            </div>



                            <div class="form-group">
                                <label>Examination</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->exam}}" name = "exam" oninput="calculateTotal('{{ $student->exam }}')" min = "0" max = "70" id = "exam"
                                     
                                />
                            </div>


                            <div class="form-group">
                                <label>Total</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->total}}" min = "0" max = "100" name = "total" readonly id="total"
                                     
                                />
                            </div>

                        </div>

                            
                            <button class="btn btn-primary btn-block" id="submit" onclick="submitForm()">Update</button>
                            
                        </form>

      </div>
    </div>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01{{$student->id}}').style.display='none'" type="button" class="w3-btn w3-red w3-round-large">Cancel</button>
    
    </div>

  </div>
</div>
                                   
                                    </tr>

                                  

                        </form>
                                    @endforeach
                                    
                                </tbody>
                            </table>

                                <form method="POST" action="/submit_result">
                                @csrf
                                <input type="hidden" name="id" value="Home Economic" >

                            <button type="submit" class="btn btn-primary w3-right">Submit Result</button>

                        </div>
                        @else
   <div class="table-responsive">
                            <table
                                class="table table-bordered hover multiple-select-row data-table-export nowrap">
                                <thead>
                                    <tr style="text-transform: uppercase;">
                                        <th>#</th>
                                        <th>Reg Number</th>
                                        <th>Name</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                        <th>Grade</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result_third as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $student->reg_number }}</td>
                                        <td style="text-transform: capitalize;">{{ $student->name }} {{ $student->last_name }}</td>
                                     

                                      
                                        <td>{{ $student->assignment }}</td>
                                        <td>{{ $student->first_ca }}</td>
                                        <td>{{ $student->second_ca }}</td>
                                        <td>{{ $student->exam }}</td>
                                        <td>{{ $student->total }}</td>
                                        <td>{{ $student->grade }}</td>
                                        <td>
                                            {{ $student->remark }}</td>
                                      <td>
                                            <button class="btn btn-info" onclick="document.getElementById('id01{{$student->id}}').style.display='block'"><i class="fa fa-pencil"></i> Edit</button>

                                        


                                        </td>
                                    </tr>

                                    <div id="id01{{$student->id}}" class="w3-modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
  <div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round-xlarge" style="max-width:600px">
  
<br><br>
    <div class="w3-container">
      <div class="w3-section">
                       <form method="POST" action="/update_result">
                        @csrf
                       
                       <input type="hidden" name="id" value="{{$student->id}}">
                      
                             <div id="items">
                            <div class="form-group">
                                <label>Assignment</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->assignment}}" name = "assignment" oninput="calculateTotal('{{ $student->assignment }}')" min = '0' max = '10' id ="assignment"
                                     
                                />
                            </div>
                            <div class="form-group">
                                <label>First CA</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->first_ca}}" name = "first_ca" oninput="calculateTotal('{{ $student->first_ca }}')" min = "0" max = "10" id ="first_ca"
                                     
                                />
                            </div>

                            <div class="form-group">
                                <label>Second CA</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->second_ca}}" name = "second_ca" oninput="calculateTotal('{{ $student->second_ca }}')" min = "0" max = "10" id = "second_ca"
                                     
                                />
                            </div>



                            <div class="form-group">
                                <label>Examination</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->exam}}" name = "exam" oninput="calculateTotal('{{ $student->exam }}')" min = "0" max = "70" id = "exam"
                                     
                                />
                            </div>


                            <div class="form-group">
                                <label>Total</label>
                                <input
                                    type="number"
                                    class="form-control-file form-control height-auto" value ="{{$student->total}}" min = "0" max = "100" name = "total" readonly id="total"
                                     
                                />
                            </div>

                        </div>

                            
                            <button class="btn btn-primary btn-block" id="submit" onclick="submitForm()">Update</button>
                            
                        </form>

      </div>
    </div>

    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
      <button onclick="document.getElementById('id01{{$student->id}}').style.display='none'" type="button" class="w3-btn w3-red w3-round-large">Cancel</button>
    
    </div>

  </div>
</div>
                                   
                                    </tr>

                                  

                        </form>
                                    @endforeach





















    @extends('layouts.app')

    @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




<div class="table-responsive">
                            <table
                                class="data-table table stripe hover nowrap"
                            >
                                <thead>
                                    <tr>
                                        
                                        <th>#</th>
                                        <th>Passport</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <!-- <th>Email</th>
                                        <th>Urgency</th>
                                        <th>Medical Condition</th>
                                        <th>Doctor's Advice</th>
                                        <th>Comment</th>
                                        <th>Discharged Date</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($patient as $patient)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($patient->passport != null)
    <img type="file" src = "{{ asset('uploads/students')}}/{{$patient->passport}}" id = "im" class = "w3-circle w3-card-4" style = " width: 80px; height: 80px;" alt = "profile photo" >
    @else
        <img src="{{ asset('vendors/images/person.svg') }}" alt="" class="avatar-photo w3-circle w3-card-4" style = "width: 80px; height: 80px;"/>
        @endif
                                        </td>
                                        <td>{{$patient->name}}</td>
                                        <td>{{$patient->phone}}</td>
                                    <!--    <td>{{$patient->email}}</td>
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
                                        <td>{{($patient->updated_at)->format('D, F jS, Y ')}}</td>
                                        <td> -->
                                        <!--    <td>
                                        <a class="btn btn-outline-danger w3-card-4" href="{{route('patient.destroy', $patient->id)}}" data-confirm-delete = "true"><i class = "fa fa-times" ></i> Delete </a>
                                        </td> -->

                                            <td style="text-align: right;">
                                            <div class="dropdown">
                                                <a
                                                    class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#"
                                                    role="button"
                                                    data-toggle="dropdown"
                                                >
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div
                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                                >
                                                    <a class="dropdown-item" href="#"
                                                        ><i class="dw dw-eye"></i> View</a
                                                    >
                                                    <a class="dropdown-item" href="#"
                                                        ><i class="dw dw-edit2"></i> Edit</a
                                                    >
                                                    <a class="dropdown-item" href="#"
                                                        ><i class="dw dw-delete-3"></i> Delete</a
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                
                                
                                    
                                    
                                </tbody>
                            </table>
                        </div>









@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    You are a Admin User.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    You are a Manager User.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@extends('layouts.teacher')
@section('content')


        <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title"></div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    faq
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
                </div>
                <div class="pb-20">
                    <form method="POST" action="{{ route('attendance.store') }}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered hover">
                                <thead>
                                    <tr style="text-transform: uppercase;">
                                        <th>#</th>
                                        <th>Registration Number</th>
                                        <th>Name</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $student->reg_number }}</td>
                                        <td style="text-transform: capitalize;">{{ $student->name }} {{ $student->last_name }}</td>
                                        <td>
                                            <input type="number" name="students[{{ $student->reg_number }}][assignment]" placeholder="Input Score Here" class="form-control-plaintext" required>
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][first_ca]" class="form-control-plaintext" required>
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][second_ca]" class="form-control-plaintext" required>
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][exam]" class="form-control-plaintext" required>
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Total" name="students[{{ $student->reg_number }}][total]" class="form-control-plaintext" readonly>
                                        </td>
                                      <!--   <td>
                                            <select name="students[{{ $student->reg_number }}][attendance]" class="custom-select col-4" required>
                                                <option value="present">Present</option>
                                                <option value="absent">Absent</option>
                                            </select>
                                        </td> -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>
    </div>
</div>



@endsection 

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @else
                    <div class=”panel-heading”>Normal User</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.admin')
@section('content')



@endsection







     
                    <form method="POST" action="{{ route('store.score') }}">
                        @csrf
                        <div class="table-responsive">
                            <table
                                class="table table-striped table-bordered hover multiple-select-row data-table-export nowrap"
                            >
                                <thead>
                                    <tr style="text-transform: uppercase;">
                                        <th>#</th>
                                        <th>Registration Number</th>
                                        <th>Name</th>
                                        <th>Assignment (10)</th>
                                        <th>First CA (10)</th>
                                        <th>Second CA (10)</th>
                                        <th>Examination (70)</th>
                                        <th>Total (100)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $student->reg_number }}</td>
                                        <td style="text-transform: capitalize;">{{ $student->name }} {{ $student->last_name }}</td>
                                        @foreach($student->results as $result)

                                      
                                        <td>
                                            <input type="number" name="students[{{ $student->reg_number }}][assignment]" value="{{$result->assignment}}" placeholder="Input Score Here"  class="form-control-plaintext" required oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][first_ca]" value="{{$result->first_ca}}" class="form-control-plaintext"  oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][second_ca]" value="{{$result->second_ca}}" class="form-control-plaintext"  oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][exam]" value="{{$result->exam}}" class="form-control-plaintext"  oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Total" name="students[{{ $student->reg_number }}][total]" value="{{$result->total}}" class="form-control-plaintext" readonly id="total-{{ $student->reg_number }}">
                                        </td>
                                        <td>
                                            <input type="hidden" name="students[{{ $student->reg_number }}][name]" value="{{ $student->name }} {{ $student->last_name }}">
                                            <input type="hidden" name="students[{{ $student->reg_number }}][reg_number]" value="{{ $student->reg_number }}">
                                            <input type="hidden" name="students[{{ $student->reg_number }}][class]" value="{{ $student->class }}">
                                            <input type="" name="students[{{ $student->reg_number }}][subject]" value="{{ $sub}}">
                                        </td>
                                        @endforeach

                                     
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary w3-right">Submit Attendance</button>
                        </div>
                    </form>










                     <form method="POST" action="{{ route('store.score') }}">
    @csrf
    <div class="table-responsive">
        <table class="table table-bordered hover multiple-select-row data-table-export nowrap">
            <thead>
                <tr style="text-transform: uppercase;">
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th>Assignment (10)</th>
                    <th>First CA (10)</th>
                    <th>Second CA (10)</th>
                    <th>Examination (70)</th>
                    <th>Total (100)</th>
               
                    <th>Term</th>
                    <th>Grade</th>
                    <th>Remark</th>
                </tr>
            </thead>
             <tbody>
                                    @foreach($students as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $student->reg_number }}</td>
                                        <td style="text-transform: capitalize;">{{ $student->name }} {{ $student->last_name }}</td>
                                        @foreach($student->results as $result)

                                      
                                        <td>
                                            <input type="number" name="students[{{ $student->reg_number }}][assignment]" value="{{$result->assignment}}" placeholder="Input Score Here"  class="form-control-plaintext" required oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][first_ca]" value="{{$result->first_ca}}" class="form-control-plaintext"  oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][second_ca]" value="{{$result->second_ca}}" class="form-control-plaintext"  oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Input Score Here" name="students[{{ $student->reg_number }}][exam]" value="{{$result->exam}}" class="form-control-plaintext"  oninput="calculateTotal('{{ $student->reg_number }}')">
                                        </td>
                                        <td>
                                            <input type="number" placeholder="Total" name="students[{{ $student->reg_number }}][total]" value="{{$result->total}}" class="form-control-plaintext" readonly id="total-{{ $student->reg_number }}">
                                        </td>

                                         <td>
                        <input type="text" name="students[{{ $student->reg_number }}][term]" value="First Term" class="form-control-plaintext" readonly>
                    </td>
                    <td>
                        <input type="text" name="students[{{ $student->reg_number }}][grade]" value="{{$result->grade}}" class="form-control-plaintext"  id="grade-{{ $student->reg_number }}" readonly>
                    </td>
                    <td>
                        <input type="text" name="students[{{ $student->reg_number }}][remark]" value="{{$result->remark}}" class="form-control-plaintext"  id="remark-{{ $student->reg_number }}" readonly>
                    </td>
                                        <td>
                                            <input type="hidden" name="students[{{ $student->reg_number }}][name]" value="{{ $student->name }} {{ $student->last_name }}" readonly>
                                            <input type="hidden" name="students[{{ $student->reg_number }}][reg_number]" value="{{ $student->reg_number }}">
                                            <input type="hidden" name="students[{{ $student->reg_number }}][class]" value="{{ $student->class }}">
                                            <input type="hidden" name="students[{{ $student->reg_number }}][subject]" value="{{ $sub }}">
                                           
                                        </td>
                                        @endforeach

                                     
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
        </table>
        <button type="submit" class="btn btn-primary w3-right">Submit Scores</button>
    </div>
</form>
















    // public function upload_result(Request $request)
    // {
    //     $students = User::where([['type', 0],['class', $request->old('class')]])->latest()->get();

    //     foreach ($students as $student) {
    //       $score = Result::find($student->id);
    //     }
        
    //     return view('teacher_dash.upload', compact('students', 'score'));
    // }

// public function store_score(Request $request)
// {
//     $validatedData = $request->validate([
//         'students.*.reg_number' => 'required|string',
//         'students.*.name' => 'required|string',
//         'students.*.class' => 'required|string',
//         'students.*.assignment' => 'required|numeric',
//         'students.*.first_ca' => 'required|numeric',
//         'students.*.second_ca' => 'required|numeric',
//         'students.*.exam' => 'required|numeric',
//         'students.*.total' => 'required|numeric',
//         'students.*.term' => 'required|string',
//         'students.*.grade' => 'required|string',
//         'students.*.remark' => 'required|string',
//         'students.*.subject' => 'required|string',
//     ]);

//     foreach ($validatedData['students'] as $studentData) {
//         Result::updateOrCreate(
//             [
//                 'student_id' => User::where('reg_number', $studentData['reg_number'])->first()->id,
//                 'subject' => $studentData['subject'],
//                 'term' => $studentData['term'],
//             ],
//             [
//                 'name' => $studentData['name'],
//                 'class' => $studentData['class'],
//                 'reg_number' => $studentData['reg_number'],
//                 'assignment' => $studentData['assignment'],
//                 'first_ca' => $studentData['first_ca'],
//                 'second_ca' => $studentData['second_ca'],
//                 'exam' => $studentData['exam'],
//                 'total' => $studentData['total'],
//                 'grade' => $studentData['grade'],
//                 'remark' => $studentData['remark'],
//                 'teacher' => Auth::user()->name,
//             ]
//         );
//     }

//     return back()->with('toast_success', 'Results uploaded successfully');
// }    










 public function store_score(Request $request)
{
    $validatedData = $request->validate([
        'students' => 'required|array',
        'students.*.name' => 'required|string',
        'students.*.class' => 'required|string',
        // 'students.*.term' => 'required|string',
        // 'students.*.grade' => 'required|string',
        // 'students.*.remark' => 'required|string',
        // 'students.*.subject' => 'required|string',
        
        'students.*.reg_number' => 'required|string',
        'students.*.assignment' => 'required|numeric|min:0|max:10',
        'students.*.first_ca' => 'required|numeric|min:0|max:10',
        'students.*.second_ca' => 'required|numeric|min:0|max:10',
        'students.*.exam' => 'required|numeric|min:0|max:70',
        'students.*.total' => 'required|numeric|min:0|max:100',
       
    ]);
  // foreach ($request->input('results') as $studentId => $resultData) {
  //       Result::updateOrCreate(
  //           [
  //               'student_id' => $studentId,
  //               'subject' => $request->input('subject'),
  //               'term' => $request->input('term'), // You may need to pass 'term' from the form as well
  //           ],
  //           [
  //               'assignment' => $resultData['assignment'],
  //               'first_ca' => $resultData['first_ca'],
  //               'second_ca' => $resultData['second_ca'],
  //               'exam' => $resultData['exam'],
  //               'total' => $resultData['total'],
  //           ]
  //       );
  //   }
    foreach ($validatedData['students'] as $studentData) {
        Result::updateOrCreate(
            [
                'student_id' => User::where('reg_number', $studentData['reg_number'])->first()->id,
                // 'subject' => $studentData['subject'],
                // 'term' => $studentData['term'],
                // 'remark' => $studentData['remark'],
            ],
            [
                'name' => $studentData['name'],
                'class' => $studentData['class'],
                'reg_number' => $studentData['reg_number'],
                'assignment' => $studentData['assignment'],
                'first_ca' => $studentData['first_ca'],
                'second_ca' => $studentData['second_ca'],
                'exam' => $studentData['exam'],
                'total' => $studentData['total'],
                // 'term' => $studentData['term'],
                // 'grade' => $studentData['grade'],
                // 'remark' => $studentData['remark'],
                'teacher' => Auth::user()->name,
                   
                
            ]
        );
    }

    return back()->with('toast_success', 'Results uploaded successfully');
}



 public function store_unscore(Request $request)
{
    $validatedData = $request->validate([
        'students' => 'required|array',
        'students.*.name' => 'required|string',
        'students.*.class' => 'required|string',
        'students.*.subject' => 'required|string',
        'students.*.reg_number' => 'required|string',
        'students.*.assignment' => 'required|numeric|min:0|max:10',
        'students.*.first_ca' => 'required|numeric|min:0|max:10',
        'students.*.second_ca' => 'required|numeric|min:0|max:10',
        'students.*.exam' => 'required|numeric|min:0|max:70',
        'students.*.total' => 'required|numeric|min:0|max:100',
       
    ]);
  // foreach ($request->input('results') as $studentId => $resultData) {
  //       Result::updateOrCreate(
  //           [
  //               'student_id' => $studentId,
  //               'subject' => $request->input('subject'),
  //               'term' => $request->input('term'), // You may need to pass 'term' from the form as well
  //           ],
  //           [
  //               'assignment' => $resultData['assignment'],
  //               'first_ca' => $resultData['first_ca'],
  //               'second_ca' => $resultData['second_ca'],
  //               'exam' => $resultData['exam'],
  //               'total' => $resultData['total'],
  //           ]
  //       );
  //   }
    foreach ($validatedData['students'] as $studentData) {
        Result::create(
            [
                'student_id' => User::where('reg_number', $studentData['reg_number'])->first()->id
            ],
            [
                'name' => $studentData['name'],
                'class' => $studentData['class'],
                'reg_number' => $studentData['reg_number'],
                'assignment' => $studentData['assignment'],
                'first_ca' => $studentData['first_ca'],
                'second_ca' => $studentData['second_ca'],
                'exam' => $studentData['exam'],
                'total' => $studentData['total'],
                'teacher' => Auth::user()->name,
                'subject' => 'Home Economic',
                
            ]
        );
    }

    return back()->with('toast_success', 'Results uploaded successfully');
}


















@extends('layouts.teacher')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title"></div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Result
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


             <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Result Upload {{$class}}</h4>
                </div>
                <div class="pb-20">
                 
        
                     <form method="POST" action="{{ route('store.score') }}">
    @csrf
    <div class="table-responsive">
        <table class="table table-bordered hover multiple-select-row data-table-export nowrap">
            <thead>
                <tr style="text-transform: uppercase;">
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th>Assignment (10)</th>
                    <th>First CA (10)</th>
                    <th>Second CA (10)</th>
                    <th>Examination (70)</th>
                    <th>Total (100)</th>
              
                    <th>Grade</th>
                    <th>Remark</th>
                </tr>
            </thead>
             <tbody>
                                    @foreach($students as $student)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><input type="text" class="form-control-plaintext" readonly name = "reg_number[]" value="{{ $student->reg_number }}" /></td>
                                        <td><input type="text" class="form-control-plaintext"readonly name = "student[]" value="{{ $student->name }} {{ $student->last_name }}" /></td>
                                        <td><input type="number" class="form-control-plaintext" name = "assignment[]" placeholder="Assignment Score"  value="{{ old('assignment.' . $loop->index) }}" /></td>
                                        <td><input type="number" class="form-control-plaintext" name = "first_ca[]" placeholder="First CA Score"  value="{{ old('first_ca.' . $loop->index) }}" /></td>
                                        <td><input type="number" class="form-control-plaintext" name = "second_ca[]" placeholder="Second CA Score"  value="{{ old('second_ca.' . $loop->index) }}" /></td>
                                        <td><input type="number" class="form-control-plaintext" name = "exam[]" placeholder="Exam Score"  value="{{ old('exam.' . $loop->index) }}"/></td>
                                        <td><input type="number" class="form-control-plaintext" name = "total[]" placeholder="Total Score"  value="{{ old('total.' . $loop->index) }}"/></td>
                                        <td><input type="text" class="form-control-plaintext" name = "grade[]" placeholder=""  value="{{ old('grade.' . $loop->index) }}"/></td>
                                        <td><input type="text" class="form-control-plaintext" name = "remark[]" placeholder=""  value="{{ old('remark.' . $loop->index) }}"/></td>
                                        
                                        <td><input type="text" class="form-control-plaintext" name = "subject[]" value="{{$sub}}" /></td>
                                        <td><input type="text" class="form-control-plaintext" name = "class[]" value="ss3" /></td>
                                       

                                        

                                    </tr>
                                    @endforeach
                                    
                                </tbody>
        </table>
        <button type="submit" class="btn btn-primary w3-right">Submit Scores</button>
    </div>
</form>

                    
                    
                </div>
            </div>
            <!-- Export Datatable End -->


@endsection










  public function store_score(Request $request)
    {
        $validated = $request->validate([
            'reg_number.*' => 'required|string',
            'student.*' => 'required|string',
            'assignment.*' => 'required|numeric',
            'first_ca.*' => 'required|numeric',
            'second_ca.*' => 'required|numeric',
            'exam.*' => 'required|numeric',
            'total.*' => 'required|numeric',
            'grade.*' => 'required|string',
            'remark.*' => 'required|string',
          
            'subject.*' => 'required|string',
        ]);

        foreach ($request->reg_number as $key => $reg_number) {
            Result::create([
                'reg_number' => $reg_number,
                'name' => $request->student[$key],
                'assignment' => $request->assignment[$key] ?? null,
                'first_ca' => $request->first_ca[$key] ?? null,
                'second_ca' => $request->second_ca[$key] ?? null,
                'exam' => $request->exam[$key] ?? null,
                'total' => $request->total[$key] ?? null,
                'grade' => $request->grade[$key] ?? null,
                'remark' => $request->remark[$key] ?? null,
                'class' => $request->class[$key] ?? null,
                 'teacher' => Auth::user()->name,
                'subject' => $request->subject[$key],
            ]);
        }

        return redirect()->back()->with('success', 'Scores saved successfully!');
    }



    @extends('layouts.teacher')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title"></div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Result
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


             <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Result Upload {{$class}}</h4>
                </div>
                <div class="pb-20">
                 
        <form method="POST" action="{{ route('store.score') }}">
    @csrf
    <div class="table-responsive">
        <table class="table table-striped table-bordered hover multiple-select-row data-table-export nowrap">
            <thead>
                <tr style="text-transform: uppercase;">
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th>Assignment (10)</th>
                    <th>First CA (10)</th>
                    <th>Second CA (10)</th>
                    <th>Examination (70)</th>
                    <th>Total (100)</th>
                    <th>Grade</th>
                    <th>Remark</th>
                    <th>Class</th>
                    <!-- <th>Term</th> -->
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><input type="text" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][reg_number]" value="{{ $student->reg_number }}" /></td>
                    <td><input type="text" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][name]" value="{{ $student->name }} {{ $student->last_name }}" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][assignment]" placeholder="Assignment Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][first_ca]" placeholder="First CA Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][second_ca]" placeholder="Second CA Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][exam]" placeholder="Exam Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][total]" placeholder="Total Score" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][grade]" placeholder="Grade" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][remark]" placeholder="Remark" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][class]" value="{{ $student->class }}" /></td>
                   
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][subject]" value="Home Economic" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary w3-right">Submit Scores</button>
    </div>
</form>

                    
                    
                </div>
            </div>
            <!-- Export Datatable End -->


@endsection











    @extends('layouts.teacher')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title"></div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Result
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


             <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Result Upload {{$class}}</h4>
                </div>
                <div class="pb-20">
                 
        <form method="POST" action="{{ route('store.score') }}">
    @csrf
    <div class="table-responsive">
        <table class="table table-striped table-bordered hover multiple-select-row data-table-export nowrap">
            <thead>
                <tr style="text-transform: uppercase;">
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th>Assignment (10)</th>
                    <th>First CA (10)</th>
                    <th>Second CA (10)</th>
                    <th>Examination (70)</th>
                    <th>Total (100)</th>
                    <th>Grade</th>
                    <th>Remark</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Term</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><input type="text" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][reg_number]" value="{{ $student->reg_number }}" /></td>
                    <td><input type="text" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][name]" value="{{ $student->name }} {{ $student->last_name }}" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][assignment]" placeholder="Assignment Score"  value="{{ old('assignment' )  }}" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][first_ca]" placeholder="First CA Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][second_ca]" placeholder="Second CA Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][exam]" placeholder="Exam Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][total]" placeholder="Total Score" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][grade]" placeholder="Grade" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][remark]" placeholder="Remark" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][class]" value="{{ $student->class }}" /></td>
                   
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][subject]" value="{{$sub}}" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][term]" value="First Term" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary w3-right">Submit Scores</button>
    </div>
</form>

                    
                    
                </div>s
            </div>
            <!-- Export Datatable End -->


<script>
    function calculateTotal(regNumber) {
        const assignment = parseFloat(document.querySelector(`[name="students[${regNumber}][assignment]"]`).value) || 0;
        const firstCA = parseFloat(document.querySelector(`[name="students[${regNumber}][first_ca]"]`).value) || 0;
        const secondCA = parseFloat(document.querySelector(`[name="students[${regNumber}][second_ca]"]`).value) || 0;
        const exam = parseFloat(document.querySelector(`[name="students[${regNumber}][exam]"]`).value) || 0;
        
        const total = assignment + firstCA + secondCA + exam;
        document.getElementById(`total-${regNumber}`).value = total;

        let grade = '';
        let remark = '';

        if (total >= 70) {
            grade = 'A';
            remark = 'Excellent';
        } else if (total >= 60) {
            grade = 'B';
            remark = 'Very Good';
        } else if (total >= 50) {
            grade = 'C';
            remark = 'Good';
        } else if (total >= 45) {
            grade = 'D';
            remark = 'Pass';
        } else {
            grade = 'F';
            remark = 'Fail';
        }

        document.getElementById(`grade-${regNumber}`).value = grade;
        document.getElementById(`remark-${regNumber}`).value = remark;
    }
</script>

@endsections






  <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><input type="text" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][reg_number]" value="{{ $student->reg_number }}" /></td>
                    <td><input type="text" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][name]" value="{{ $student->name }} {{ $student->last_name }}" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][assignment]" placeholder="Assignment Score"  value="{{ old('assignment' )  }}" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][first_ca]" placeholder="First CA Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][second_ca]" placeholder="Second CA Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][exam]" placeholder="Exam Score" /></td>
                    <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][total]" placeholder="Total Score" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][grade]" placeholder="Grade" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][remark]" placeholder="Remark" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][class]" value="{{ $student->class }}" /></td>
                   
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][subject]" value="{{$sub}}" /></td>
                    <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][term]" value="First Term" /></td>
                </tr>
                @endforeach
            </tbody>






  // public function view_result(Request $request)
  //   {
  //       $result = Result::where([['subject',  $subject],['class', $class]])->get();
  //        $class = $request->old('class');
  //        $subject = $request->old('subject');

  //       // foreach ($result as $result) {
  //       //   $score = Result::find($result->id);
  //       // }
        
  //       return view('teacher_dash.view_result', compact('result', 'class', 'subject'));
  //   }

//         public function view_result(Request $request)
// {
//     // Validate the input class
//     $request->validate([
//         'class' => 'required|string',
//     ]);

//     // Retrieve students and their associated results based on the class
//     $students = Result::where([
//         // ['type', 0],
//         ['class', $request->input('class')]
//     ])->latest()->get();
//     $sub = $request->subject;
//     $result = Result::all();
//     $res = Result::where('subject', $sub)->first();

//     // Pass the students to the view
//     return view('teacher_dash.view_result', compact('students', 'sub', 'res', 'result'))->with('subject', $request->input('subject'));
// }


// public function view_result(Request $request)
// {
//     $result = Result::all();
//     $class = $request->old('class');
//     return view('teacher_dash.view_result', compact('result', 'class'));
// }



//     public function upload_result(Request $request)
// {
//     // Validate the input class, subject, and term
//     $request->validate([
//         'class' => 'required|string',
//         'subject' => 'required|string',
//         'term' => 'required|string',
//     ]);

//     // Retrieve students and their associated results based on the class, subject, and term
//     $students = User::where([
//         ['type', 0],
//         ['class', $request->input('class')]
//     ])->with(['results' => function ($query) use ($request) {
//         $query->where('subject', $request->input('subject'))
//               ->where('term', $request->input('term'));
//     }])->latest()->get();

//     // Pass the students, subject, and term to the view
//     return view('teacher_dash.upload', compact('students'))
//             ->with('subject', $request->input('subject'))
//             ->with('term', $request->input('term'));
// }





 // public function store_score(Request $request)
 //    {
 //         $request->validate([
 //            'question' => 'required',
 //            'answer' => 'required',
 //         ]);


 //    $questions = $request->input('question');
 //    $answer = $request->input('answer');
   

 //    // Loop through the submitted data and create a new record in the database for each item
 //    foreach ($questions as $key => $name) {
 //        Faq::create([
 //            'question' => $name,
 //            'answer' => $answer[$key],
           
 //        ]);
 //    }


//  public function store_score(Request $request)
// {
//     $validatedData = $request->validate([
//         'students' => 'required|array',
//         'students.*.name' => 'required|string',
//         'students.*.class' => 'required|string',
//         'students.*.term' => 'required|string',
//         'students.*.grade' => 'required|string',
//         'students.*.remark' => 'required|string',
//         'students.*.subject' => 'required|string',
//         'students.*.reg_number' => 'required|string',
//         'students.*.assignment' => 'required|numeric|min:0|max:10',
//         'students.*.first_ca' => 'required|numeric|min:0|max:10',
//         'students.*.second_ca' => 'required|numeric|min:0|max:10',
//         'students.*.exam' => 'required|numeric|min:0|max:70',
//         'students.*.total' => 'required|numeric|min:0|max:100',
       
//     ]);
 
//     foreach ($validatedData['students'] as $studentData) {
//         Result::updateOrCreate(
//             [
//                 'student_id' => User::where('reg_number', $studentData['reg_number'])->first()->id,
//                 'subject' => $studentData['subject'],
//                 'term' => $studentData['term'],
//                 'remark' => $studentData['remark'],
//             ],
//             [
//                 'name' => $studentData['name'],
//                 'class' => $studentData['class'],
//                 'reg_number' => $studentData['reg_number'],
//                 'assignment' => $studentData['assignment'],
//                 'first_ca' => $studentData['first_ca'],
//                 'second_ca' => $studentData['second_ca'],
//                 'exam' => $studentData['exam'],
//                 'total' => $studentData['total'],
//                 'term' => $studentData['term'],
//                 'grade' => $studentData['grade'],
//                 'remark' => $studentData['remark'],
//                 'subject' => $studentData['subject'],
//                 'teacher' => Auth::user()->name,
                   
                
//             ]
//         );
//     }

//     return back()->with('toast_success', 'Results uploaded successfully');
// }



    <div class="contact-directory-list">
                            <ul class="row">
                                @forelse($students as $student)
        
                                <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                    <div class="contact-directory-box">
                                        <div class="contact-dire-info text-center">
                                            <div class="contact-avatar">
                                                <span>
                                                    <img src="vendors/images/photo2.jpg" alt="" />
                                                </span>
                                            </div>
                                            <div class="contact-name">
                                                <h4>{{$student->name}} {{$student->last_name}}</h4>
                                                <p>{{$student->class}}</p>
                                                <div class="work text-success" style="text-transform: uppercase;">
                                                    <i class="ion-android-person"></i> {{$student->reg_number}} 
                                                </div>
                                            </div>
                                            <div class="contact-skill">
                                                <a href=""><button class="btn btn-outline-primary"><i class="fa fa-pencil"></i> Edit</button></a>

                                                <a href=""><button class="btn btn-outline-danger"><i class="fa fa-ban"></i> Ban</button></a><br><br>
                                                <form method="post" action="/check_result">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$student->id}}">
                                                    <input type="hidden" name="reg_number" value="{{$student->reg_number}}">
                                                <button class="btn btn-outline-success"><i class="fa fa-eye"></i> Check Result</button>
                                            </form>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="view-contact">
                                            <a href="#">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <p>No student</p>

                                @endforelse
                            
                            </ul>
                        </div>












                        
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&amp;family=Muli:wght@400;700&amp;display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&amp;display=swap" rel="stylesheet">

  <link rel="stylesheet" href="homefiles/css/bootstrap.min.css">
  <link rel="stylesheet" href="homefiles/css/animate.css">
  <link rel="stylesheet" href="homefiles/css/owl.carousel.min.css">
  <link rel="stylesheet" href="homefiles/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="homefiles/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="homefiles/fonts/icomoon/style.css">
  <link rel="stylesheet" href="homefiles/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="homefiles/css/style2.css">
  <link rel="stylesheet" href="homefiles/css/style1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
        <link rel="stylesheet" href="homefiles/css/animate.css">
  <link rel="stylesheet" href="homefiles/css/aos.css">
  <link rel="stylesheet" href="homefiles/css/style.css">
      <link href="dashboard/assets/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="dashboard/assets/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <script src="homefiles/js/jquery-3.4.1.min.js"></script>
  <title>NIGERIAN NAVY MILITARY SCHOOL IKOT NTUEN-Login</title>
</head>

<body>
 
              <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


  
  <nav class="site-nav mb-5">
    <div class="pb-2 top-bar mb-3">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-lg-9">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> <span class="d-none d-lg-inline-block">Have a questions?</span></a> 
            <a href="#" class="small mr-3"><span class="icon-phone mr-2"></span> <span class="d-none d-lg-inline-block">08037948001</span></a> 
            <a href="#" class="small mr-3"><span class="icon-envelope mr-2"></span> <span class="d-none d-lg-inline-block">info@nnmsikotntuen.com.ng</span></a> 
          </div>

          <div class="col-6 col-lg-3 text-right">
            <a href="/login" class="btn btn-primary mr-3">
              <span class="icon-lock"></span>
              Log In
            </a>
           
          </div>

        </div>
      </div>
    </div>
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center">
          <a href="index.html" class="logo menu-absolute m-0"><img src="gallery/navylogo4.png" width="100px" height="90px" alt="Logo"></a>

          <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
            <li class="active"><a href="index.html">Home</a></li>
               
   
<li class="has-children">
              <a href="#">About</a>
                  <ul class="dropdown">
<li><a href="welcome/page/aboutnnms.html">About NNMS IKOT NTUEN</a></li>
<li><a href="welcome/page/objective.html">Objective and mission of the NN Military school</a></li>

               
              </ul>
                          </li>
            <li><a href="#news">News</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="welcome/gallery.html">Gallery</a></li>
                     <li><a href="admission/apply.html">Admission Form</a></li>
              
            <li><a href="welcome/contactus.html">Contact</a></li>

          </ul>


          <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>

        </div>
      </div>
    </div>
  </nav>
  
     <div class="untree_co-hero overlay" style="background-image: url('https://static.vecteezy.com/system/resources/previews/002/479/620/non_2x/physics-and-science-seamless-pattern-with-sketch-elements-hand-drawn-doodles-background-illustration-vector.jpg');height:50px;">


    
  </div> <!-- /.untree_co-hero --> 

        <link rel="stylesheet" href="dashboard/assets/css/style.css">
        <div class="main-wrapper login-body bg-gradient-primary" style="background:url('gallery/IMG-20230813-WA0061.jpg');background-position: center;
    background-size: cover; ">
            <div class="login-wrapper">
                <div class="container">
                    <div class="loginbox">
                        <div class="login-left" style="background-image: url(gallery/navylogo4.png);">
                            <img class="img-fluid" src="images/login.png" alt="NIGERIAN NAVY MILITARY SCHOOL IKOT NTUEN logo">

                        </div>
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <h1>Login</h1>
                                <p class="account-subtitle">Access portal</p>
                                
                                <!-- Form -->
 <!-- <form method="post" action="https://nnmsikotntuen.com.ng/login/verifylogin"> -->
      <form method="POST" action="{{ route('login') }}">
                        @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                               


                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>


                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                               


                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    </div>
                                </form>
                                <!-- /Form -->
                                
                                <div class="text-center forgotpass">
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        
  <div class="site-footer" style="margin-bottom:-91px;">


    <div class="container">

    

      <div class="row mt-5">
        <div class="col-12 text-center">
          <p class="text-white h5 mb-4 aos-init aos-animate">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | NIGERIAN NAVY MILITARY SCHOOL IKOT NTUEN Powerered by AMA-INFOSEC LTD&nbsp;<a href="https://ama-infosec.com/" target="_blank" ><img src="images/amalogo.png" width="100px" alt="Logo"></a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>


    <script src="homefiles/js/popper.min.js"></script>

         <script src="dashboard/assets/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="dashboard/assets/plugins/sweetalerts/custom-sweetalert.js"></script>
    <script src="homefiles/js/bootstrap.min.js"></script>
    <script src="homefiles/js/owl.carousel.min.js"></script>
    <script src="homefiles/js/main.js"></script>
    <script src="homefiles/js/jquery.animateNumber.min.js"></script>
    <script src="homefiles/js/jquery.waypoints.min.js"></script>
    <script src="homefiles/js/jquery.fancybox.min.js"></script>
    <script src="homefiles/js/jquery.sticky.js"></script>
        <script src="homefiles/js/aos.js"></script>
    <script src="homefiles/js/custom.js"></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    
    <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65df84be8d261e1b5f66adf9/1hnoht2am';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

  </body>



<!-- Mirrored from nnmsikotntuen.com.ng/login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Mar 2024 21:24:38 GMT -->
</html>











<input type="" name="attendance[{{ $student->name }}]" value="{{$student->name}}" >
                            <input type="" name="attendance[{{ $student->reg_number }}]" value="{{$student->reg_number}}" >
                            <input type="" name="attendance[{{ $student->last_name }}]" value="{{$student->last_name}}">    













