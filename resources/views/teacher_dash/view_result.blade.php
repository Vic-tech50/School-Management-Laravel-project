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
                                    View Result 
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
   <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Result For {{$class}} {{$subject}} ({{$term}})</h4>
                </div>
                <div class="pb-20"> 
                 
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
    <span onclick="document.getElementById('id01{{$student->id}}').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
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
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->assignment}}" 
                                name="assignment" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="10" 
                                id="assignment{{$student->id}}"
                                required 
                            />
                             <small class="text-danger">NUMBER RANGE: 0-10</small>
                         
                        </div>
                        <div class="form-group">
                            <label>First CA</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->first_ca}}" 
                                name="first_ca" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="10" 
                                id="first_ca{{$student->id}}"
                                required
                            />
                             <small class="text-danger">NUMBER RANGE: 0-10</small>

                        </div>
                        <div class="form-group">
                            <label>Second CA</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->second_ca}}" 
                                name="second_ca" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="10" 
                                id="second_ca{{$student->id}}"
                                required
                            />
                             <small class="text-danger">NUMBER RANGE: 0-10</small>

                        </div>
                        <div class="form-group">
                            <label>Examination</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->exam}}" 
                                name="exam" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="70" 
                                id="exam{{$student->id}}"
                                required
                            />
                             <small class="text-danger">NUMBER RANGE: 0-70</small>

                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value="{{$student->total}}" 
                                name="total" 
                                id="total{{$student->id}}" 
                                readonly
                            />
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" class="form-control-file form-control height-auto" 
                                name="grade" 
                                id="grade{{$student->id}}" 
                                value="{{$student->grade}}" 
                                readonly
                            />
                        </div>
                        <div class="form-group">
                            <label>Remark</label>
                            <input type="text" class="form-control-file form-control height-auto" 
                                name="remark" 
                                id="remark{{$student->id}}" 
                                value="{{$student->remark}}" 
                                readonly
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
                            	<input type="hidden" name="id" value="{{$subject}}" >

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

        <!-- Retrieve First Term Total -->
        @php
            $firstTerm = $result_first->firstWhere('reg_number', $student->reg_number);
        @endphp
        <td>{{ $firstTerm ? $firstTerm->total : 'N/A' }}</td>

        <!-- Retrieve Second Term Total -->
        @php
            $secondTerm = $result_second->firstWhere('reg_number', $student->reg_number);
        @endphp
        <td>{{ $secondTerm ? $secondTerm->total : 'N/A' }}</td>

        <td>{{ $student->grade }}</td>
        <td>{{ $student->remark }}</td>
        <td>
            <button class="btn btn-info" onclick="document.getElementById('id01{{$student->id}}').style.display='block'">
                <i class="fa fa-pencil"></i> Edit
            </button>
        </td>
    </tr>



<div id="id01{{$student->id}}" class="w3-modal">
    <span onclick="document.getElementById('id01{{$student->id}}').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">×</span>
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
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->assignment}}" 
                                name="assignment" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="10" 
                                id="assignment{{$student->id}}"
                                required
                            />
                             <small class="text-danger">NUMBER RANGE: 0-10</small>
                        </div>
                        <div class="form-group">
                            <label>First CA</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->first_ca}}" 
                                name="first_ca" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="10" 
                                id="first_ca{{$student->id}}"
                                required
                            />
                             <small class="text-danger">NUMBER RANGE: 0-10</small>

                        </div>
                        <div class="form-group">
                            <label>Second CA</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->second_ca}}" 
                                name="second_ca" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="10" 
                                id="second_ca{{$student->id}}"
                                required
                            />
                             <small class="text-danger">NUMBER RANGE: 0-10</small>

                        </div>
                        <div class="form-group">
                            <label>Examination</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value ="{{$student->exam}}" 
                                name="exam" 
                                oninput="calculateTotal('{{$student->id}}')" 
                                min="0" max="70" 
                                id="exam{{$student->id}}"
                                required
                            />
                             <small class="text-danger">NUMBER RANGE: 0-70</small>

                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" class="form-control-file form-control height-auto" 
                                value="{{$student->total}}" 
                                name="total" 
                                id="total{{$student->id}}" 
                                readonly
                            />
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" class="form-control-file form-control height-auto" 
                                name="grade" 
                                id="grade{{$student->id}}" 
                                value="{{$student->grade}}" 
                                readonly
                            />
                        </div>
                        <div class="form-group">
                            <label>Remark</label>
                            <input type="text" class="form-control-file form-control height-auto" 
                                name="remark" 
                                id="remark{{$student->id}}" 
                                value="{{$student->remark}}" 
                                readonly
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
                                <input type="hidden" name="id" value="{{$subject}}" >

                            <button type="submit" class="btn btn-primary w3-right">Submit Result</button>

                        </div>
                        @endif

                 
                    
                    
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>
    </div>  
</div>

<!-- 
<script>
    function calculateTotal(regNumber) {
        var assignment = document.querySelector(`input[name="assignment"`).value;
        var first_ca = document.querySelector(`input[name="first_ca"`).value;
        var second_ca = document.querySelector(`input[name="second_ca"`).value;
        var exam = document.querySelector(`input[name="exam"`).value;

        var total = (parseFloat(assignment) || 0) + (parseFloat(first_ca) || 0) + (parseFloat(second_ca) || 0) + (parseFloat(exam) || 0);

        document.getElementById(`total`).value = total;
    }
</script> -->


<script type="text/javascript">
    
    function calculateTotal(studentId) {
    let assignment = parseFloat(document.getElementById('assignment' + studentId).value) || 0;
    let firstCa = parseFloat(document.getElementById('first_ca' + studentId).value) || 0;
    let secondCa = parseFloat(document.getElementById('second_ca' + studentId).value) || 0;
    let exam = parseFloat(document.getElementById('exam' + studentId).value) || 0;

    // Calculate the total
    let total = assignment + firstCa + secondCa + exam;

    // Update the total input field
    document.getElementById('total' + studentId).value = total;

    // Determine grade and remark based on total score
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
        remark = 'Fair';
    } else if (total >= 40) {
        grade = 'E';
        remark = 'Pass';
    } else {
        grade = 'F';
        remark = 'Fail';
    }

    // Update grade and remark fields
    document.getElementById('grade' + studentId).value = grade;
    document.getElementById('remark' + studentId).value = remark;
}


</script>
@endsection