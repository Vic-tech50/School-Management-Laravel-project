<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Junior;
use App\Models\Library;
use Illuminate\Http\Request;
use Auth;

class LibraryController extends Controller
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
        $library = Library::all();
           $title = 'Delete Book!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
  $layout = Auth::user()->type == 'admin' ? 'layouts.admin' : 'layouts.librarian';

        return view('library.index', ['library' =>$library, 'layout' => $layout]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classroom = Classroom::all();
        $subject = Junior::all();
        $layout = Auth::user()->type == 'admin' ? 'layouts.admin' : 'layouts.librarian';
        return view('library.create',[
            'classroom' => $classroom,
            'subject' => $subject,
            'layout' => $layout
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'book_name' => 'required|unique:libraries',
            'class' => 'required',
            'subject' => 'required',
            'total' => 'required',
         ]);


    $book_name = $request->input('book_name');
    $class = $request->input('class');
    $subject = $request->input('subject');
    $total = $request->input('total');
   

    // Loop through the submitted data and create a new record in the database for each item
    foreach ($book_name as $key => $name) {
        Library::create([
            'book_name' => $name,
            'class' => $class[$key],
            'subject' => $subject[$key],
            'total' => $total[$key],
           
        ]);
    }

     return redirect('library')->with('success', 'Book(s) added to library successfully.');
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
    public function destroy(Library $library)
    {
        $library->delete();
        return redirect()->route('library.index')->with('success','Book has been deleted');
    }
}
