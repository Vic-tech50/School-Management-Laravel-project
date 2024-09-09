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
                    <h4 class="text-blue h4">Result Upload {{$sub}} for {{$class}}</h4>
                </div>
                <div class="pb-20">
                 
        <form method="POST" action="{{ route('store.score') }}">
    @csrf
    <div class="table-responsive">
        <table class="table table-bordered hover  data-table-export nowrap">
            <thead>
                <tr style="text-transform: uppercase;">
                    <th>#</th>
                    <th style="width: 200px">Name</th>
                    <th>Reg Number</th>
                    <th>Assignment (10)</th>
                    <th>First CA (10)</th>
                    <th>Second CA (10)</th>
                    <th>Examination (70)</th>
                    <th>Total (100)</th>
                    <th>Grade</th>
                    <th>Remark</th>
                    <th>Other Details</th>
                    
                 
                </tr>
            </thead>
            <tbody> 
    @foreach($students as $student)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td><input type="text" style="text-transform: capitalize;" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][name]" value="{{ $student->name }} {{ $student->last_name }}" /></td>
        <td><input type="text" style="text-transform: uppercase;" class="form-control-plaintext" readonly name="students[{{ $loop->index }}][reg_number]" value="{{ $student->reg_number }}" /></td>
        <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][assignment]" value="{{ old('students.'.$loop->index.'.assignment') }}" placeholder="Assignment Score" oninput="calculateTotal({{ $loop->index }})" /></td>
        <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][first_ca]" value="{{ old('students.'.$loop->index.'.first_ca') }}" placeholder="First CA Score" oninput="calculateTotal({{ $loop->index }})" /></td>
        <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][second_ca]" value="{{ old('students.'.$loop->index.'.second_ca') }}" placeholder="Second CA Score" oninput="calculateTotal({{ $loop->index }})" /></td>
        <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][exam]" value="{{ old('students.'.$loop->index.'.exam') }}" placeholder="Exam Score" oninput="calculateTotal({{ $loop->index }})" /></td>
        <td><input type="number" class="form-control-plaintext" name="students[{{ $loop->index }}][total]" value="{{ old('students.'.$loop->index.'.total') }}" placeholder="Total Score" readonly /></td>
        <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][grade]" value="{{ old('students.'.$loop->index.'.grade') }}" placeholder="Grade" readonly /></td>
        <td><input type="text" class="form-control-plaintext" name="students[{{ $loop->index }}][remark]" value="{{ old('students.'.$loop->index.'.remark') }}" placeholder="Remark" readonly /></td>


        <td><input type="" class="form-control-plaintext" name="students[{{ $loop->index }}][class]" value="{{ $student->class }}" readonly />

        <input type="" class="form-control-plaintext" name="students[{{ $loop->index }}][subject]" value="{{ $sub }}" readonly/>

        <input type="" class="form-control-plaintext" name="students[{{ $loop->index }}][term]" value="{{$term}}" readonly/></td>
    </tr>
    @endforeach
</tbody>

        </table>
        <br><br>
        <button type="submit" style="margin-right: 20px;" class="btn btn-primary w3-card-4 w3-right">Submit Scores</button>
    </div>
</form>

                    
                    
                </div>
            </div>
            <!-- Export Datatable End -->

<script>
    function calculateTotal(index) {
        const assignment = parseFloat(document.querySelector(`input[name="students[${index}][assignment]"]`).value) || 0;
        const firstCa = parseFloat(document.querySelector(`input[name="students[${index}][first_ca]"]`).value) || 0;
        const secondCa = parseFloat(document.querySelector(`input[name="students[${index}][second_ca]"]`).value) || 0;
        const exam = parseFloat(document.querySelector(`input[name="students[${index}][exam]"]`).value) || 0;

        const total = assignment + firstCa + secondCa + exam;
        document.querySelector(`input[name="students[${index}][total]"]`).value = total;

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

        document.querySelector(`input[name="students[${index}][grade]"]`).value = grade;
        document.querySelector(`input[name="students[${index}][remark]"]`).value = remark;
    }
</script>

@endsection