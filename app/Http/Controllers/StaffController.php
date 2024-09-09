<?php

namespace App\Http\Controllers;
use Str;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
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
         $title = 'Delete Staff!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $staff = User::where([['type','!=', 0], ['type','!=', 2]])->latest()->get();
        return view('staffs.index', ['staff' => $staff]);
    }

    /**,
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
         $str = Str::random(10);       

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10485760',
            'name' => 'required', 
            'phone' => 'required|numeric', 
            'email' => 'required|email|unique:users', 
            'address' => 'required', 
            'dob' => 'required', 
            'gender' => 'required', 
            'marital' => 'required', 
            'course' => 'required', 
            'certificate' => 'required', 
            'role' => 'required', 
            
            ]);

if($request->image != null){
      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads/staffs');

    $image->move($destinationPath, $img);
}

            $user = new User;
            if($request->image != null){
            $user->passport = $request->image;
        }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->marital = $request->marital;
            $user->course = $request->course;
            $user->certificate = $request->certificate;
            $user->password = bcrypt($str);
            $user->word = $str;
            $user->type = $request->role;
 
           

            $user->save();
           
        
            return redirect('staffs')->with('success','Staff has been Added Successfully.');
      
       
       
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
    public function edit(User $staff)
    {
        
        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
             $str = Str::random(10);       

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10485760',
            'name' => 'required', 
            'phone' => 'required|numeric', 
            'email' => 'required|email', 
            'address' => 'required', 
            'dob' => 'required', 
            'gender' => 'required', 
            'marital' => 'required', 
            'course' => 'required', 
            'certificate' => 'required', 
            // 'role' => 'required', 
            
            ]);

if($request->image != null){
      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads/staffs');

    $image->move($destinationPath, $img);
}

            $user = User::find($id);
            if($request->image != null){
            $user->passport = $request->image;
        }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->marital = $request->marital;
            $user->course = $request->course;
            $user->certificate = $request->certificate;
            $user->password = bcrypt($str);
            $user->word = $str;
            // $user->type = $request->role;

           

            $user->save();
           
        
            return redirect('staffs')->with('success','Staff has been Updated Successfully.');
      
       
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(User $staff)
    {
        $staff->delete();
         return redirect()->route('staffs.index')->with('success','Staff has been deleted successfully');

    }
}
