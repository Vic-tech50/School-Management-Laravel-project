<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
        return view('profile.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function uploadImage(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'image' => 'required|string',
        ]);

        // Process base64 image data
        $imageData = $request->input('image');
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData, true);

        if ($imageData === false) {
            throw new \Exception('Invalid image data');
        }

        // Generate a unique name for the image
        $imageName = 'image_' . time() . '.jpg';
        $uploadPath = public_path('uploads/' . $imageName);

        // Attempt to save the image to the filesystem
        if (file_put_contents($uploadPath, $imageData) === false) {
            throw new \Exception('Failed to save the image to the uploads folder');
        }

        // Attempt to save the image path to the database
        $image = Image::create(['path' => $imageName]);

        if (!$image) {
            throw new \Exception('Failed to save image path to the database');
        }

        return response()->json(['message' => 'Image uploaded successfully'], 200);

    } catch (\Exception $e) {
        // Log any errors and return a 500 status with the error message
        \Log::error('Image upload failed: ' . $e->getMessage());
        return response()->json(['message' => $e->getMessage()], 500);
    }
}


public function teacher_profile()
{
    return view('teacher_dash.profile');
}

public function student_profile()
{
    return view('student_dash.profile');
}

public function medical_profile()
{
    return view('medical.profile');
}

public function librarian_profile()
{
    return view('librarian.profile');
}


 public function update_profile(Request $request)
    {
           $request->validate([
             
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'address' => 'required',
        
            ]);


            $user = User::find(Auth::user()->id);
    
            $user->name =  $request->name;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->address = $request->address;
          
             

            $user->save();
     
            return back()->with('success','User Information Updated');
    }


        public function update_password(Request $request)
    {
               
         $member = Auth::user();

        $request->validate([
        'current_password' => 'required',
        'password' => 'required|string|min:8|confirmed|different:current_password',
       
            ]);

            if(Hash::check($request->current_password, $member->password) ){
            $user = User::find($member->id);
            $user->password = bcrypt($request->password);
            $user->word = $request->password;
            $user->save();

            return back()->with('success','Your Password Has Been Updated');
    }else{
             return back()->with('error','Incorrect Crediential');
        }
    }

    public function update_pic(Request $request)
    {
           $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10485760', 
            
        
            ]);



      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads');
    $image->move($destinationPath, $img);


            $user = User::find(Auth::user()->id);
           
            $user->passport = $img;
    
          
            $user->save();
     
            return back()->with('success','Profile Image Changed');
    }




}
