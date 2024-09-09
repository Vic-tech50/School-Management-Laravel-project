<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Auth;
class PatientController extends Controller
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
         $title = 'Delete Patient!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);
        $patient = Patient::latest()->get();
        $layout = Auth::user()->type == 'admin' ? 'layouts.admin' : 'layouts.medical';
        return view('patient.index', compact('patient', 'layout'));
    }

    public function discharged()
    {
        $patient = Patient::where('status', 1)->latest()->get();
        return view('medical.discharged', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $layout = Auth::user()->type == 'admin' ? 'layouts.admin' : 'layouts.medical';
        return view('patient.create', compact('layout'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'urgency' => 'required',
            'sickness' => 'required', 
            'advice' => 'required', 
            'comment' => 'required', 
            ]);


            $patient = new Patient;
            $patient->name =  $request->name;
            $patient->email =  $request->email;
            $patient->reg_number =  $request->reg_number;
            $patient->phone =  $request->phone;
            $patient->urgency =  $request->urgency;
            $patient->sickness =  $request->sickness;
            $patient->advice = $request->advice;
            $patient->comment = $request->comment;
            $patient->passport = $request->passport;

            $patient->save();
     
            return redirect()->route('patient.index')->with('success','Patient Added');
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
 
      public function destroy(Patient $patient)
    {
        $patient->delete();
         return back()->with('success','patient has been deleted successfully');

    }

    public function add_patient(){
          $layout = Auth::user()->type == 'admin' ? 'layouts.admin' : 'layouts.medical';
        return view('medical.add_patient', compact('layout'));
    }

     public function check_patient(Request $request)
    {
         $query = $request->input('number');

         if($user = User::where('reg_number',$query)->first()){
        
        return view('patient.create', [
                 'user'=>$user
        ]);
    }else{
        return back()->with('error', 'Not Found');
    
    }
    }


public function discharge_patient(Request $request)
{
    $patient = Patient::find($request->id);
    $patient->status = 1;

    $patient->save();
    return back()->with('success', 'Patient Discharged');
}


}
