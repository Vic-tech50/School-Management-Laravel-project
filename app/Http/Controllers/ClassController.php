<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Str;
use Auth;
use Carbon\Carbon;

class ClassController extends Controller
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
        $classes  = Classroom::all();
         $title = 'Delete Class!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('classes.index', ['classes' => $classes]);
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
        
        $request->validate([
            
            'class_name' => 'required|unique:classrooms', 
            'numbers_of_student' => 'required|numeric', 
           
            
            ]);

   

            $classroom = new Classroom;
            $classroom->class_name = Str::upper($request->class_name);
            $classroom->numbers_of_student = $request->numbers_of_student;
          
            $classroom->save();
           
        
            return back()->with('success','Classroom has been Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
      public function edit(Classroom $classes)
    {
        // return view('classes.index',compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            
            // 'class_name' => 'required|unique:classrooms', 
            // 'numbers_of_student' => 'required|numeric', 
           
            
            ]);

   
   
            $classroom = Classroom::find($id);
            $classroom->class_name = Str::upper($request->class_name);
            $classroom->numbers_of_student = $request->numbers_of_student;
          
            $classroom->save();
           
        
            return back()->with('success','Classroom has been Updated Successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $class)
    {
    $class->delete();
    return redirect()->route('classes.index')->with('success','class has been deleted');
    }

    public function teacher_students()
    {
        $students = User::where([['type', 0],['class', Auth::user()->class_one]])->latest()->get();
         $student_two = User::where([['type', 0],['class', Auth::user()->class_two]])->latest()->get();

           $student_three = User::where([['type', 0],['class', Auth::user()->class_three]])->latest()->get();

           $student_four = User::where([['type', 0],['class', Auth::user()->class_four]])->latest()->get();

            $student_five = User::where([['type', 0],['class', Auth::user()->class_five]])->latest()->get();

             $student_six = User::where([['type', 0],['class', Auth::user()->class_six]])->latest()->get();

              $student_seven = User::where([['type', 0],['class', Auth::user()->class_seven]])->latest()->get();


        return view('teacher_dash.all_student', compact('students', 'student_two', 'student_three', 'student_four' , 'student_five' , 'student_six' , 'student_seven'));
    }

     public function student_attendance()
    {
        $students = User::where([['type', 0],['class', Auth::user()->class_one]])->latest()->get();

         $student_two = User::where([['type', 0],['class', Auth::user()->class_two]])->latest()->get();

           $student_three = User::where([['type', 0],['class', Auth::user()->class_three]])->latest()->get();

           $student_four = User::where([['type', 0],['class', Auth::user()->class_four]])->latest()->get();

            $student_five = User::where([['type', 0],['class', Auth::user()->class_five]])->latest()->get();

             $student_six = User::where([['type', 0],['class', Auth::user()->class_six]])->latest()->get();

              $student_seven = User::where([['type', 0],['class', Auth::user()->class_seven]])->latest()->get();
        return view('teacher_dash.attendance', compact('students', 'student_two', 'student_three', 'student_four' , 'student_five' , 'student_six' , 'student_seven'));
    }


   public function check_attendance()
    {
        $students = Attendance::where([['student_regnum', Auth::user()->reg_number]])->latest()->get();
        return view('student_dash.attendance', ['students' => $students]);
    }

    public function view_attendance()
    {
        $students = Attendance::where('teacher_id', Auth::user()->teacher_id)->orderBy('created_at')
        ->get()
        ->groupBy(['class_id', function($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('Y M d');
        }]);
       return view('teacher_dash.view_attendance', compact('students'));
    }







public function mark_attendance(Request $request)
{
    // Fetch students based on your criteria
    $students = User::where([['type', 0],['class', Auth::user()->class_one]])->get();

    // Validate the request data
    $request->validate([
        'attendance' => 'required|array', // Ensure attendance data is provided and is an array
        'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
    ]);

    // Loop through each student attendance record submitted
    foreach ($request->attendance as $studentId => $status) {
        // Find the student by ID
        $student = $students->firstWhere('id', $studentId);

        if($student) {
            // Create a new Attendance record for the student in the class
            Attendance::create([
                'class_id' => $student->class, // Assuming 'class' is the column containing the class name in the User model
                'student_id' => $studentId,
                'student_name' => $student->name, 
                'student_lastname' => $student->last_name, 
                'student_regnum' => $student->reg_number, 
                'status' => $status,
              'teacher_id' => Auth::user()->teacher_id,
                'date' => now(), // Assuming you want to record the attendance for the current date
            ]);
        }
    }

    // Redirect back to the attendance index page with a success message
    return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
}



public function mark_attendance2(Request $request)
{
    // Fetch students based on your criteria
    $students = User::where([['type', 0],['class', Auth::user()->class_two]])->get();

    // Validate the request data
    $request->validate([
        'attendance' => 'required|array', // Ensure attendance data is provided and is an array
        'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
    ]);

    // Loop through each student attendance record submitted
    foreach ($request->attendance as $studentId => $status) {
        // Find the student by ID
        $student = $students->firstWhere('id', $studentId);

        if($student) {
            // Create a new Attendance record for the student in the class
            Attendance::create([
                'class_id' => $student->class, // Assuming 'class' is the column containing the class name in the User model
                'student_id' => $studentId,
                'student_name' => $student->name, 
                'student_lastname' => $student->last_name, 
                'student_regnum' => $student->reg_number, 
                'status' => $status,
                'teacher_id' => Auth::user()->teacher_id,
                'date' => now(), // Assuming you want to record the attendance for the current date
            ]);
        }
    }

    // Redirect back to the attendance index page with a success message
    return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
}


public function mark_attendance3(Request $request)
{
    // Fetch students based on your criteria
    $students = User::where([['type', 0],['class', Auth::user()->class_three]])->get();

    // Validate the request data
    $request->validate([
        'attendance' => 'required|array', // Ensure attendance data is provided and is an array
        'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
    ]);

    // Loop through each student attendance record submitted
    foreach ($request->attendance as $studentId => $status) {
        // Find the student by ID
        $student = $students->firstWhere('id', $studentId);

        if($student) {
            // Create a new Attendance record for the student in the class
            Attendance::create([
                'class_id' => $student->class, // Assuming 'class' is the column containing the class name in the User model
                'student_id' => $studentId,
                'student_name' => $student->name, 
                'student_lastname' => $student->last_name, 
                'student_regnum' => $student->reg_number, 
                'status' => $status,
                'teacher_id' => Auth::user()->teacher_id,
                'date' => now(), // Assuming you want to record the attendance for the current date
            ]);
        }
    }

    // Redirect back to the attendance index page with a success message
    return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
}




public function mark_attendance4(Request $request)
{
    // Fetch students based on your criteria
    $students = User::where([['type', 0],['class', Auth::user()->class_four]])->get();

    // Validate the request data
    $request->validate([
        'attendance' => 'required|array', // Ensure attendance data is provided and is an array
        'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
    ]);

    // Loop through each student attendance record submitted
    foreach ($request->attendance as $studentId => $status) {
        // Find the student by ID
        $student = $students->firstWhere('id', $studentId);

        if($student) {
            // Create a new Attendance record for the student in the class
            Attendance::create([
                'class_id' => $student->class, // Assuming 'class' is the column containing the class name in the User model
                'student_id' => $studentId,
                'student_name' => $student->name, 
                'student_lastname' => $student->last_name, 
                'student_regnum' => $student->reg_number, 
                'status' => $status,
                'teacher_id' => Auth::user()->teacher_id,
                'date' => now(), // Assuming you want to record the attendance for the current date
            ]);
        }
    }

    // Redirect back to the attendance index page with a success message
    return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
}

public function mark_attendance5(Request $request)
{
    // Fetch students based on your criteria
    $students = User::where([['type', 0],['class', Auth::user()->class_five]])->get();

    // Validate the request data
    $request->validate([
        'attendance' => 'required|array', // Ensure attendance data is provided and is an array
        'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
    ]);

    // Loop through each student attendance record submitted
    foreach ($request->attendance as $studentId => $status) {
        // Find the student by ID
        $student = $students->firstWhere('id', $studentId);

        if($student) {
            // Create a new Attendance record for the student in the class
            Attendance::create([
                'class_id' => $student->class, // Assuming 'class' is the column containing the class name in the User model
                'student_id' => $studentId,
                'student_name' => $student->name, 
                'student_lastname' => $student->last_name, 
                'student_regnum' => $student->reg_number, 
                'status' => $status,
                'teacher_id' => Auth::user()->teacher_id,
                'date' => now(), // Assuming you want to record the attendance for the current date
            ]);
        }
    }

    // Redirect back to the attendance index page with a success message
    return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
}

public function mark_attendance6(Request $request)
{
    // Fetch students based on your criteria
    $students = User::where([['type', 0],['class', Auth::user()->class_six]])->get();

    // Validate the request data
    $request->validate([
        'attendance' => 'required|array', // Ensure attendance data is provided and is an array
        'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
    ]);

    // Loop through each student attendance record submitted
    foreach ($request->attendance as $studentId => $status) {
        // Find the student by ID
        $student = $students->firstWhere('id', $studentId);

        if($student) {
            // Create a new Attendance record for the student in the class
            Attendance::create([
                'class_id' => $student->class, // Assuming 'class' is the column containing the class name in the User model
                'student_id' => $studentId,
                'student_name' => $student->name, 
                'student_lastname' => $student->last_name, 
                'student_regnum' => $student->reg_number, 
                'status' => $status,
                'teacher_id' => Auth::user()->teacher_id,
                'date' => now(), // Assuming you want to record the attendance for the current date
            ]);
        }
    }

    // Redirect back to the attendance index page with a success message
    return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
}

public function mark_attendance7(Request $request)
{
    // Fetch students based on your criteria
    $students = User::where([['type', 0],['class', Auth::user()->class_seven]])->get();

    // Validate the request data
    $request->validate([
        'attendance' => 'required|array', // Ensure attendance data is provided and is an array
        'attendance.*' => 'in:present,absent', // Ensure each attendance status is one of the allowed values
    ]);

    // Loop through each student attendance record submitted
    foreach ($request->attendance as $studentId => $status) {
        // Find the student by ID
        $student = $students->firstWhere('id', $studentId);

        if($student) {
            // Create a new Attendance record for the student in the class
            Attendance::create([
                'class_id' => $student->class, // Assuming 'class' is the column containing the class name in the User model
                'student_id' => $studentId,
                'student_name' => $student->name, 
                'student_lastname' => $student->last_name, 
                'student_regnum' => $student->reg_number, 
                'status' => $status,
                'teacher_id' => Auth::user()->teacher_id,
                'date' => now(), // Assuming you want to record the attendance for the current date
            ]);
        }
    }

    // Redirect back to the attendance index page with a success message
    return redirect()->route('teacher.attendance')->with('success', 'Attendance submitted successfully');
}


}
