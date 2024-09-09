<?php

namespace App\Http\Controllers;
use App\Models\Settings;

use Illuminate\Http\Request;

class SettingsController extends Controller
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
        $settings = Settings::latest()->first();
        return view('settings.index', ['settings' => $settings]);
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
        if($request->image != null){
          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10485760', 
            
        
            ]);



      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads');
    $image->move($destinationPath, $img);
}
        
            $settings = Settings::find(1);
            if($request->image != null){
            $settings->logo = $img;
        }
            $settings->about_us = $request->about_us;
            $settings->objectives = $request->objective;
            $settings->vision = $request->vision;
            $settings->mission = $request->mission;
          
            $settings->save();
           
        
            return back()->with('success','Changes Has Been Saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
