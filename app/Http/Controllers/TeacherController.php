<?php

namespace App\Http\Controllers;
use App\Models\Junior;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Str;
use Hash;
use App\Models\Classroom;

class TeacherController extends Controller
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
                $title = 'Delete Teacher!';
                $text = "Are you sure you want to delete?";
                confirmDelete($title, $text);
        $teacher = User::where('type', 2)->latest()->get();
        return view('teachers.index', ['teacher' => $teacher]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Junior::all();
        $classes = Classroom::all();
        return view('teachers.create', 
            [
                'subjects' => $subjects,
                'classes' => $classes,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
  
     public function store(Request $request)
    {
         $str = Str::random(10);       
         $teacherid = Str::random(6);       

        $request->validate([
            // 'proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10485760',
            'name' => 'required', 
            'phone' => 'required|numeric', 
            'email' => 'required|email|unique:users', 
            'address' => 'required', 
            'dob' => 'required', 
            'gender' => 'required', 
            'marital' => 'required', 
            'course' => 'required', 
            
            ]);

    //   $image = $request->file('proof');
    // $img = $image->getClientOriginalName();
    //   $destinationPath = public_path('/uploads');

    // $image->move($destinationPath, $img);

            $user = new User;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->marital = $request->marital;
            $user->course = $request->course;
            $user->certificate = $request->certificate;
            $user->subject_one = $request->subjectone;
            $user->class_one = $request->classone;
            $user->subject_two = $request->subjecttwo;
            $user->class_two = $request->classtwo;
            $user->subject_three = $request->subjectthree;
            $user->class_three = $request->classthree;
            $user->subject_four = $request->subjectfour;
            $user->class_four = $request->classfour;
            $user->subject_five = $request->subjectfive;
            $user->class_five = $request->classfive;
            $user->subject_six = $request->subjectsix;
            $user->class_six = $request->classsix;
             $user->subject_seven = $request->subjectseven;
            $user->class_seven = $request->classseven;
            $user->password = bcrypt($str);
            $user->word = $str;
            $user->teacher_id = $teacherid;
            $user->type = 2;

           

            $user->save();
           
        
            return redirect('teachers')->with('success','Teacher has been Added Successfully.');
      
       
       
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
     public function edit(User $teacher)
    {
         $subjects = Junior::all();
        $classes = Classroom::all();
        return view('teachers.edit', compact('teacher', 'subjects', 'classes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            // 'proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10485760',
            'name' => 'required', 
            'phone' => 'required|numeric', 
            'email' => 'required|email', 
            'address' => 'required', 
            'dob' => 'required', 
            'gender' => 'required', 
            'marital' => 'required', 
            'course' => 'required', 
            
            ]);

    //   $image = $request->file('proof');
    // $img = $image->getClientOriginalName();
    //   $destinationPath = public_path('/uploads');

    // $image->move($destinationPath, $img);

            $user = User::find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->marital = $request->marital;
            $user->course = $request->course;
            $user->certificate = $request->certificate;
            $user->subject_one = $request->subjectone;
            $user->class_one = $request->classone;
            $user->subject_two = $request->subjecttwo;
            $user->class_two = $request->classtwo;
            $user->subject_three = $request->subjectthree;
            $user->class_three = $request->classthree;
            $user->subject_four = $request->subjectfour;
            $user->class_four = $request->classfour;
            $user->subject_five = $request->subjectfive;
            $user->class_five = $request->classfive;
            $user->subject_six = $request->subjectsix;
            $user->class_six = $request->classsix;
             $user->subject_seven = $request->subjectseven;
            $user->class_seven = $request->classseven;
  

           

            $user->save();
           
        
            return redirect('teachers')->with('success','Teacher has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(User $teacher)
    {
        $teacher->delete();
         return redirect()->route('teachers.index')->with('success','Teacher has been deleted successfully');

    }
}
