<?php

namespace App\Http\Controllers;
use App\Models\Assignment;
use App\Models\User;
use Auth;
use Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignmentController extends Controller
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
        $ass_by_class = Assignment::where('teacher_id', Auth::user()->teacher_id)->orderBy('class')->get()->groupBy('class');
        $date = now();

         $title = 'Delete Assignment!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('assignment.index', compact('ass_by_class', 'date') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::where([['class', Auth::user()->class_one]])->latest()->get();
        return view('assignment.create', ['students' => $students]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $date = Carbon::parse(now());
            $year = $date->format('Y');

         $str  = Str::random(10);
        $ass_id = 'ASS'.rand(00000, 99999).$year;

        $string = $request->student;
        $parts = explode(' ', $string);
        $subject = end($parts);

        $string2 = "$request->student";
        $partOne = explode(' ', $string2);
        $class = $partOne[0];
   
        $request->validate([
            'pdf' => 'mimes:pdf|max:10485760', 
            'end_date'=> 'required',
            'end_time'=> 'required',
            'student'=> 'required',
            'type' => 'required',
            'title' => 'required',
            
            ]);


if($request->pdf != null){
      $pdf = $request->file('pdf');
    $doc = $pdf->getClientOriginalName();
      $destinationPath = public_path('/uploads/assignments');
    $pdf->move($destinationPath, $doc);
}

            $assignment = new Assignment;
            if($request->pdf != null){
            $assignment->pdf = $doc;
        }
            $assignment->title =  $request->title;
            $assignment->end_date =  $request->end_date;
            $assignment->end_time =  $request->end_time;
            $assignment->type =  $request->type;
            $assignment->class =  $class;
            $assignment->subject =  $subject;
            $assignment->ass_id =  $ass_id;
            $assignment->teacher_id =  Auth::user()->teacher_id;
            $assignment->description =  $request->description;
          
            $assignment->save();
     
            return redirect('assignment')->with('success','Assignment Given To Students');
      
       
       
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
    public function edit(assignment $assignment)
    {
       return view('assignment.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $date = Carbon::parse(now());
            $year = $date->format('Y');

        $string = $request->student;
        $parts = explode(' ', $string);
        $subject = end($parts);

        $string2 = "$request->student";
        $partOne = explode(' ', $string2);
        $class = $partOne[0];
   
        $request->validate([
            'pdf' => 'mimes:pdf|max:10485760', 
            'end_date'=> 'required',
            'end_time'=> 'required',
            'student'=> 'required',
            'type' => 'required',
            'title' => 'required',
            
            ]);


if($request->pdf != null){
      $pdf = $request->file('pdf');
    $doc = $pdf->getClientOriginalName();
      $destinationPath = public_path('/uploads/assignments');
    $pdf->move($destinationPath, $doc);
}

            $assignment = Assignment::find($id);
            if($request->pdf != null){
            $assignment->pdf = $doc;
        }
            $assignment->title =  $request->title;
            $assignment->end_date =  $request->end_date;
            $assignment->end_time =  $request->end_time;
            $assignment->type =  $request->type;
            $assignment->class =  $class;
            $assignment->subject =  $subject;
            $assignment->description =  $request->description;
          
            $assignment->save();
     
            return redirect('assignment')->with('success','Assignment Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(assignment $assignment)
    {
        $assignment->delete();
         return redirect()->route('assignment.index')->with('success','assignment has been deleted successfully');
    }

    public function student_assignment(Request $request)
    {
         $assignment = Assignment::where('class', Auth::user()->class)->latest()->get();
        return view('student_dash.assignment', ['assignment' => $assignment]);
    }
}
