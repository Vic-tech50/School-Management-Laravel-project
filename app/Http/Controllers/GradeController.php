<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use App\Models\Result;
use Illuminate\Http\Request;

class GradeController extends Controller
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
        $grade = Grade::all();
        return view('grade.index', ['grade' => $grade]);
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
            
            'from' => 'required|unique:grades|numeric',[
                "unique" => 'The First Score Has been Taken'
            ], 
            'to' => 'required|unique:grades|numeric', 
            'grade' => 'required', 
           
            
            ]);

   

            $grade = new Grade;
            $grade->from = $request->from;
            $grade->to = $request->to;
            $grade->grade = $request->grade;
          
            $grade->save();
           
        
            return back()->with('success','Grade has been Added Successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
          $request->validate([
            
            // 'from' => 'required|unique:grades|numeric',
            // 'to' => 'required|unique:grades|numeric', 
            // 'grade' => 'required', 
           
            
            ]);

   

            $grade = Grade::find($id);
            $grade->from = $request->from;
            $grade->to = $request->to;
            $grade->grade = $request->grade;
          
            $grade->save();
           
        
            return back()->with('success','Grade has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function subject_submitted(){
        $subject = Result::where('status', 1)
                       ->select('subject', 'class', 'teacher')
                      ->groupBy('subject', 'class', 'teacher')
                      ->get();
        return view('admin.subject_submitted', compact('subject'));
    }

public function showSubjectDetails($subject, $class)
{
    $results = Result::where('subject', $subject)->where('class', $class)->get();

    return view('admin.subject_details', compact('results', 'subject', 'class'));
}

    // public function check_subject(Request $request)
    // {
    //     // $dat = $id->user_id;
    //     // $properties = Property::where('user_id', $dat)->latest()->get(); 
    //     return view('admin.subject_details', ['id'=> $id]);
    // }




   public function all_result()
    {
        $result = Result::orderBy('reg_number')->get()->groupBy('reg_number');
        return view('admin.all_result', compact('result') );
       
    }

}
