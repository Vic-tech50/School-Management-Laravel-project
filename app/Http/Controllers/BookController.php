<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
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
        $book = Book::latest()->get();
        $date = now();

          $title = 'Delete Book Details!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view  ('book.index', compact('book','date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = Library::all();
        $student = User::where('type', 0)->get();
        $staff = User::where('type', 2)->orWhere('type', 4)->orWhere('type', 5)->get();
        return view('book.create', compact('book', 'student', 'staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $string = $request->book_name;
        $parts = explode(' ', $string);
        $number = end($parts);

        $partOne = explode(' ', $string);
        $book_name = $partOne[0];

      
        $partOne = explode(' ', $string);
        $class = $partOne[1];

        
        $partOne = explode(' ', $string);
        $subject = $partOne[2];

            $book = new Book;
           $book->book_name = $book_name;
           $book->class = $class;
           $book->number = $number;
           $book->subject = $subject;
            $book->reg_number = $request->reg_number;
            $book->staff = $request->staff_name;
            $book->total = $request->total;
            $book->return_date = $request->return_date;
           
          
            $book->save();
            return back()->with('success','Personnel successfully Advanced');
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
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success','Book has been deleted');
    }

    public function clear_book(Request $request)
    {
        $book = Book::find($request->id);
        $book->status = 1;
        $book->save();

        return back()->with('success', 'Book Cleared and Return ');
    }
}
