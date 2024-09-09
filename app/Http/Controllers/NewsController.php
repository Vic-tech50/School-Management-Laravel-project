<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
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
        $news = News::latest()->get();
        $title = 'Delete News!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
   
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10485760', 
            'title' => 'required',
            'description' => 'required',
        
            ]);



      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads');
    $image->move($destinationPath, $img);

            $news = new News;
            $news->image = $img;
            $news->title =  $request->title;
            $news->description = $request->description;
          
            

            $news->save();
     
            return redirect('news')->with('success','News Added');
      
       
       
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
    public function edit(news $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10485760', 
            'title' => 'required',
            'description' => 'required',
        
            ]);


if($request->image != null){
      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads');
    $image->move($destinationPath, $img);
}
            $news = News::find($id);
            if($request->image != null){
            $news->image = $img;
        }
            $news->title =  $request->title;
            $news->description = $request->description;
          
            

            $news->save();
     
            return redirect('news')->with('success','News Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(news $news)
    {
        $news->delete();
         return redirect()->route('news.index')->with('success','News has been deleted successfully');

    }
}
