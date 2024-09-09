<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Csv;
use App\Models\Classroom;
use App\Models\Result;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use Carbon\Carbon;
use Hash;
use Auth;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
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
        $students = User::where('type', 0)->latest()->paginate(10);
        return view('student.index', ['students' => $students]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = Classroom::all();
        return view('student.create', ['class' => $class]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
         
        $request->validate([
            'name' => 'required', 
            'last_name' => 'required', 
            'dob' => 'required', 
            'gender' => 'required', 
            'state' => 'required', 
            'city' => 'required', 
            'parent_name' => 'required', 
            'relationship' => 'required', 
            'occupation' => 'required', 
            'phone' => 'required|numeric', 
            'email' => 'required|email|unique:users', 
            'address' => 'required', 
            'blood_group' => 'required',
            'genotype' => 'required',
            'medical_status' => 'required',
            'admission_type' => 'required',
            'class' => 'required',
            'reg_number' => 'required|unique:users', 
            'password' => 'required|min:8|confirmed', 
            
            ]);

      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads');

    $image->move($destinationPath, $img);

            $user = new User;
            $user->name = $request->name;
            $user->passport = $img;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->last_name = $request->last_name;
            $user->state_of_origin = $request->state;
            $user->city = $request->city;
            $user->parent_name = $request->parent_name;
            $user->relationship = $request->relationship;
            $user->occupation = $request->occupation;
            $user->blood_group = $request->blood_group;
            $user->genotype = $request->genotype;
            $user->medical_status = $request->medical_status;
            $user->which_school = $request->which_school;
            $user->medical_report = $request->medical_report;
            $user->admission_type = $request->admission_type;
            $user->class = $request->class;
            $user->reg_number = $request->reg_number;
            $user->password =  $request->password;
            $user->type = 0;
            $user->parent_presence = 'yes';

           
            $user->save();
           
        
            return redirect('teachers')->with('success','Student has been Registered Successfully.');
      
       
       
    }

public function store_image(Request $request)
{
    // Get the base64 image data from the request
    $img = $request->image;
    $folderPath = public_path('uploads/'); // Store the image directly in public/uploads

    // Separate the base64 data
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1] ?? 'png'; // Default to 'png' if type is not found

    // Decode the base64 string to binary data
    $image_base64 = base64_decode($image_parts[1]);

    // Generate a unique filename
    $fileName = uniqid() . '.' . $image_type;

    // Define the full file path
    $file = $folderPath . $fileName;

    // Ensure the directory exists, if not, create it
    if (!File::exists($folderPath)) {
        File::makeDirectory($folderPath, 0755, true);
    }

    // Save the image to the public/uploads directory
    file_put_contents($file, $image_base64);

    // Save the image path in the database for the user
    $user = User::find($request->id);
    $user->passport = $fileName;
    $user->save();

    // Return a success response
    return back()->with('success', 'Image uploaded successfully');
}


    //  public function store_image(Request $request)
    // {
    //     $img = $request->image;
    //     $folderPath = "uploads/";
        
    //     $image_parts = explode(";base64,", $img);
    //     $image_type_aux = explode("image/", $image_parts[0]);
    //     $image_type = $image_type_aux[1];
        
    //     $image_base64 = base64_decode($image_parts[1]);
    //     $fileName = uniqid() . '.png';

        
    //     $file = $folderPath . $fileName;
    //     Storage::put($file, $image_base64);
        
    //       // Save the image path in the database
    //     // $image = Image::create([
    //     //     'path' => $file
    //     // ]);
    //     $image = User::find($request->id);
    //     $image->passport = $file;
    //     $image->save();

    //     return back()->with('success', 'done');
    // }

    /**
     * Display the specified resource.
     */
    public function show(User $student)
    {
        // return view('student.edit',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student)
    {
        $years = Result::select(DB::raw('YEAR(created_at) as year'))
                   ->groupBy('year')
                   ->get();
         return view('student.edit',compact('student', 'years'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


     public function import_student()
    {
       
        return view('admin.import_student');
    }

    public function uploadCSV(Request $request)
{
    // Validate the uploaded file
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt|max:2048', // Adjust file size limit as needed
    ]);

    // Get the uploaded file
    $file = $request->file('csv_file');

    // Read the CSV file and extract data
    $csvData = array_map('str_getcsv', file($file));

    // Process the data and prepare for insertion
    $dataToInsert = [];
    foreach ($csvData as $row) {
        // Assuming CSV structure: [column1, column2, column3, ...]
        $dataToInsert[] = [
            'name' => $row[0],
            'age' => $row[1],
              'created_at' => Carbon::now(), // Add current timestamp
            'updated_at' => Carbon::now(), // Add current timestamp
           
            // Add more columns as needed
        ];
    }

    // Insert data into the database
    Csv::insert($dataToInsert);

    return redirect()->back()->with('success', 'Data imported successfully.');
}


public function studentscsv(Request $request)
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
            'email' => $row[1],
            'password' => bcrypt($row[2]),
            'phone' => $row[3],
            'address' => $row[4],
            'dob' => $row[5],
            'gender' => $row[6],
            'last_name' => $row[7],
            'state_of_origin' => $row[8],
            'city' => $row[9],
            'parent_name' => $row[10],
            'relationship' => $row[11],
            'occupation' => $row[12],
            'blood_group' => $row[13],
            'genotype' => $row[14],
            'medical_status' => $row[15],
            'medical_report' => $row[16],
            'admission_type' => $row[17],
            'which_school' => $row[18],
            'reg_number' => $row[19],
            'parent_presence' => $row[20],
            'class' => $row[21],
            'type' => 0,

              'created_at' => Carbon::now(), // Add current timestamp
            'updated_at' => Carbon::now(), // Add current timestamp
           
            // Add more columns as needed
        ];
    }

    // Insert data into the database
    User::insert($dataToInsert);

    return redirect()->back()->with('success', 'Data imported successfully.');
}

public function check_result(Request $request)
{
    $result = Result::where([['reg_number', $request->reg_number], ['status', 1]])->get();
    return view('admin.all_result', compact('result'));
}


public function show_result(Request $request)
{
      $years = Result::select(DB::raw('YEAR(created_at) as year'))
                   ->groupBy('year')
                   ->get();
    return view('student_dash.student_result', compact('years'));
}

public function student_result(Request $request)
{
    // Get the year, class, and term from the request
    $year = $request->input('year');
    $class = $request->input('class');
    $term = $request->input('term');

    // Check if the necessary parameters are provided
    if (!$year || !$class || !$term) {
        return back()->with('error', 'Missing parameters');
    }

    // Fetch the results for the logged-in user
    $result = Result::where([
        ['reg_number', Auth::user()->reg_number],
        ['class', $class],
        ['term', $term],
        // ['year', $year],
        ['status', 1]
    ])->get();

    // Check if any result is found
    if ($result->isEmpty()) {
        return back()->with('error', 'No Result Found');
    }

    // Pass the results and other parameters to the view
    return view('student_dash.result_check', [
        'result' => $result,
        'class' => $class,
        'year' => $year,
        'term' => $term
    ]);
}


// public function student_result(Request $request)
//     {
        
//         $year = $request->year;
//         $class = $request->class;
//         $term = $request->term;
//         $result = Result::where([['reg_number',  Auth::user()->reg_number],['class', $class], ['status', 1]])->get();
//         $result_check = Result::where([['reg_number',  Auth::user()->reg_number],['class', $class]])->first();

//         if($result_check == null){
//             return back()->with('error', 'No Result Found');
//         }

//         return view('student_dash.result_check', compact('result', 'class', 'year'));
//     }

    public function admin_student_result(Request $request)
    {
       // $user = User::where('reg_number', $request->re); 
        $year = $request->year; 
        $class = $request->class;
        $term = $request->term;
        $result = Result::where([['reg_number',  $request->reg_number],['class', $class], ['status', 1], ['term', $term]])->get();
        $result_check = Result::where([['reg_number',$request->reg_number],['class', $class], ['status', 1]])->first();

        if($result_check == null){
            return back()->with('error', 'Not Result Found');
        }

        return view('admin.all_result', compact('result', 'class', 'year', 'result_check', 'term'));
    }


public function promote(Request $request)
{
    // Get the selected user IDs from the request
    $userIds = $request->ids;

    // Check if userIds are empty
    if (empty($userIds)) {
        return response()->json(['message' => 'No users selected'], 400);
    }

    // Class promotion mapping
    $classPromotionMap = [
        'JSS1' => 'JSS2',
        'JSS2' => 'JSS3',
        'JSS3' => 'SSS1',
        'SSS1' => 'SSS2',
        'SSS2' => 'SSS3',
        'SSS3' => null, // No promotion after SS3
    ];

    // Get users and promote them
    $users = User::whereIn('id', $userIds)->get();
    
    foreach ($users as $user) {
        // Check current class and promote to the next class
        $currentClass = $user->class;

        if (isset($classPromotionMap[$currentClass])) {
            // Update the user's class if there is a valid promotion
            $nextClass = $classPromotionMap[$currentClass];
            if ($nextClass !== null) {
                $user->class = $nextClass;
                $user->save();
            }
        }
    }

    return response()->json(['message' => 'Student promoted successfully']);
}



public function demote(Request $request)
{
    // Get the selected user IDs from the request
    $userIds = $request->ids;

    // Check if userIds are empty
    if (empty($userIds)) {
        return response()->json(['message' => 'No users selected'], 400);
    }

    // Class promotion mapping
    $classPromotionMap = [
        'JSS1' => null,
        'JSS2' => 'JSS1',
        'JSS3' => 'JSS2',
        'SSS1' => 'JSS3',
        'SSS2' => 'SSS1',
        'SSS3' => 'SSS2', // No promotion after SS3
    ];

    // Get users and promote them
    $users = User::whereIn('id', $userIds)->get();
    
    foreach ($users as $user) {
        // Check current class and promote to the next class
        $currentClass = $user->class;

        if (isset($classPromotionMap[$currentClass])) {
            // Update the user's class if there is a valid promotion
            $nextClass = $classPromotionMap[$currentClass];
            if ($nextClass !== null) {
                $user->class = $nextClass;
                $user->save();
            }
        }
    }

    return response()->json(['message' => 'Student Demoted successfully']);
}


//     public function promote(Request $request)
// {
//     $userIds = $request->ids;

//     if (empty($userIds)) {
//         return response()->json(['message' => 'No users selected'], 400);
//     }

//     if($reques)



//     // Promote users to a higher class, such as SS3
//     User::whereIn('id', $userIds)->update(['class' => 'SS3']);

//     return response()->json(['message' => 'Users promoted successfully']);
// }





// public function student_result(Request $request)
// {
//     $year = $request->year;
//     $class = $request->class;
//     $term = $request->term;

//     // Query the results based on year, class, term, and status
//     $result = Result::whereYear('created_at', $year)
//                     ->where('class', $class)
//                     ->where('reg_number', Auth::user()->reg_number)
//                     ->where('term', $term)
//                     ->where('status', 1)
//                     ->get();

//     return view('student_dash.result_check', compact('result'   ));
// }
    
}
