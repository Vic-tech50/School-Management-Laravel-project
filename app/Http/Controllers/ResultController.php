<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Result;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResultController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('result.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->flash();

        return redirect('upload_result')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $students = User::where([['type', 0],['class', $request->old('class')]])->latest()->get();
        // return view('result.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function upload_result(Request $request)
{
    // Validate the input class
    $request->validate([
        'class' => 'required|string',
    ]);

    // Retrieve students and their associated results based on the class
    $students = User::where([
        ['type', 0],
        ['class', $request->input('class')],
       
    ])->with('results')->latest()->get();
    $sub = $request->subject;
    $class = $request->class;
    $term = $request->term;
    $res = Result::where('subject', $sub)->first();

    // Pass the students to the view
    return view('teacher_dash.upload', compact('students', 'sub', 'res', 'class', 'term'))->with([['subject', $request->old('subject')], ['class', $request->old('class')] ]);
}



  public function store_score(Request $request)
    {
        $validatedData = $request->validate([
            'students.*.reg_number' => 'required|string',
            'students.*.name' => 'required|string',
            'students.*.class' => 'required|string',
            'students.*.assignment' => 'nullable|numeric',
            'students.*.first_ca' => 'nullable|numeric',
            'students.*.second_ca' => 'nullable|numeric',
            'students.*.exam' => 'nullable|numeric',
            'students.*.total' => 'nullable|numeric',
            'students.*.term' => 'nullable|string',
            'students.*.grade' => 'nullable|string',
            'students.*.remark' => 'nullable|string',
            'students.*.subject' => 'required|string',
        ]); 

        foreach ($validatedData['students'] as $studentData) {
            Result::updateOrCreate(
                [
                    'student_id' => User::where('reg_number', $studentData['reg_number'])->first()->id,
                    'subject' => $studentData['subject'],
                    'term' => $studentData['term'],
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
                    'grade' => $studentData['grade'],
                    'remark' => $studentData['remark'],
                    'teacher' => Auth::user()->name,
                ]
            );
        }

        return back()->with('toast_success', 'Results uploaded successfully');
    }



  public function check_result()
    {
       
        return view('teacher_dash.check_result');
    }

        public function show_result(Request $request)
{
    // Validate the input class
    $request->validate([
        'class' => 'required|string',
    ]);

    // Retrieve students and their associated results based on the class
    $students = User::where([
        ['type', 0],
        ['class', $request->input('class')],
       
    ])->with('results')->latest()->get();
    $subject = $request->subject;
    $class = $request->class;
    $term = $request->term;
    $res = Result::where('subject', $subject)->first();

    $result = Result::where([['subject',  $subject],['class', $class],['term', $term]])->get();
           $result_third = Result::where([['subject',  $subject],['class', $class], ['term', 'Third Term']])->get();



        $result_second = Result::where([['subject',  $subject],['class', $class], ['term', 'Second Term']])->get();

          $result_first = Result::where([['subject',  $subject],['class', $class], ['term', 'First Term']])->get();

    // Pass the students to the view
    return view('teacher_dash.view_result', compact('students', 'subject', 'res', 'class', 'term','result', 'result_third', 'result_second', 'result_first'))->with([['subject', $request->old('subject')], ['class', $request->old('class')] ]);
}

 // public function show_result(Request $request)
 //    {
 //        // $request->fl ash();
 //        $subject = $request->subject;
 //        $class = $request->class;
 //        $term = $request->term;
 //        $result = Result::where([['subject',  $subject],['class', $class],['term', $term]])->get();

 //        $result_third = Result::where([['subject',  $subject],['class', $class], ['term', 'Third Term']])->get();



 //        $result_second = Result::where([['subject',  $subject],['class', $class], ['term', 'Second Term']])->get();

 //          $result_first = Result::where([['subject',  $subject],['class', $class], ['term', 'First Term']])->get();

 //        return view('teacher_dash.view_result', compact('result', 'class', 'subject', 'term','result_third', 'result_second', 'result_first'));

 //    }


// public function update_result(Request $request)
// {
//             $result = Result::find($request->id);
//             $result->assignment =  $request->assignment;
//             $result->first_ca =  $request->first_ca;
//             $result->second_ca = $request->second_ca;
//             $result->exam = $request->exam;
//             $result->total = $request->total;

//             $result->save();
     
//             return back()->with('success','Result Updated');
// }


 public function update_result(Request $request)
    {
      
      $request->validate([
            'assignment' => 'nullable|numeric|',
            'first_ca' => 'nullable|numeric|',
            'second_ca' => 'nullable|numeric|',
            'exam' => 'nullable|numeric|',
            'total' => 'nullable|numeric|',
            
            
        ]);
 $result = Result::find($request->id);
            $result->assignment =  $request->assignment;
            $result->first_ca =  $request->first_ca;
            $result->second_ca = $request->second_ca;
            $result->exam = $request->exam;
            $result->total = $request->total;
            $result->grade = $request->grade;
            $result->remark = $request->remark;

            $result->save();
    
return back()->with('success','Result Updated');
      

   
    }

public function submit_result(Request $request)
{
            $result = Result::where([['teacher', Auth::user()->name], ['subject', $request->id]])->get();
            foreach($result as $result){
            $result->status =  1;

            $result->save();
        }
     
            return back()->with('success','Result Submitted');
}



     public function import_result()
    {
       
        return view('admin.import_result');
    }



    public function resultcsv(Request $request)
{
    // Validate the uploaded file
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt|max:2048', // Adjust file size limit as needed
    ]);

      // Check if validation fails
    // if ($validator->fails()) {
    //     return redirect()->back()->withErrors($validator)->withInput();
    // }

    // Get the uploaded file
    $file = $request->file('csv_file');

    // Read the CSV file and extract data
    $csvData = array_map('str_getcsv', file($file));

  // Check if CSV data is valid
    // Example: Ensure that the CSV file has at least one row of data
    if (count($csvData) < 1) {
        return redirect()->back()->withErrors(['csv_file' => 'The CSV file is empty.'])->withInput();
    }

    // Process the data and prepare for insertion
    $dataToInsert = [];
    foreach ($csvData as $row) {
        // Assuming CSV structure: [column1, column2, column3, ...]
        $dataToInsert[] = [
            'name' => $row[0],
            'reg_number' => $row[1],
            'class' => $row[2],
            'assignment' => $row[3],
            'first_ca' => $row[4],
            'second_ca' => $row[5],
            'exam' => $row[6],
            'total' => $row[7],
            'remark' => $row[8],
            'grade' => $row[9],
            'status' => $row[10],
            'teacher' => $row[11],
            'subject' => $row[12],
            'term' => $row[13],
            'created_at' => Carbon::now(), // Add current timestamp
            'updated_at' => Carbon::now(), // Add current timestamp
           
            // Add more columns as needed
        ];
    }

    // Insert data into the database
    Result::insert($dataToInsert);

    return redirect()->back()->with('success', 'Data imported successfully.');
}



}
