<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Junior;
class JuniorSubjectController extends Controller
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
        $subjects = Junior::all();
        $title = 'Delete Subject!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('subject.index', ['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'subject' => 'required|unique:juniors', 
            ]);
 
        $subject = $request->input('subject');

        $subjects = explode(',', $subject);

        foreach ($subjects as $subjectName) {
            $trimmedSubjectName = trim($subjectName);
            if (!empty($trimmedSubjectName)) {
                Junior::create(['subject' => $trimmedSubjectName]);
            }
        }

        return redirect('subject')->with('success', 'Subjects added successfully!');
    
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
    public function destroy(Junior $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('success','Subject has been deleted');
    }
}
