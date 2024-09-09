<?php

namespace App\Http\Controllers;
use App\Models\Faq;

use Illuminate\Http\Request;

class FaqController extends Controller
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
          $title = 'Delete FAQ!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $faq = Faq::latest()->get();
        return view('faq.index', ['faq' => $faq]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'question' => 'required',
            'answer' => 'required',
         ]);


    $questions = $request->input('question');
    $answer = $request->input('answer');
   

    // Loop through the submitted data and create a new record in the database for each item
    foreach ($questions as $key => $name) {
        Faq::create([
            'question' => $name,
            'answer' => $answer[$key],
           
        ]);
    }

    return redirect('faq')->with('success', 'FAQ(s) added successfully.');
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
            'question' => 'required',
            'answer' => 'required',
         ]);

   

            $faq = Faq::find($id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();
           
        
            return back()->with('success','FAQ has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(faq $faq)
    {
        $faq->delete();
         return redirect()->route('faq.index')->with('success','FAQ has been deleted successfully');

    }
}
