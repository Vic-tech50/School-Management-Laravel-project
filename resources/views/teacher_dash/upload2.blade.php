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
                    <h4 class="text-blue h4">Result Upload</h4>
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

                    
                    
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>
    </div>
</div>

<!-- <script>
    function calculateTotal(regNumber) {
        var assignment = document.querySelector(`input[name="students[${regNumber}][assignment]"]`).value;
        var first_ca = document.querySelector(`input[name="students[${regNumber}][first_ca]"]`).value;
        var second_ca = document.querySelector(`input[name="students[${regNumber}][second_ca]"]`).value;
        var exam = document.querySelector(`input[name="students[${regNumber}][exam]"]`).value;

        var total = (parseFloat(assignment) || 0) + (parseFloat(first_ca) || 0) + (parseFloat(second_ca) || 0) + (parseFloat(exam) || 0);

        document.getElementById(`total-${regNumber}`).value = total;
    }
</script> -->



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




@endsection	