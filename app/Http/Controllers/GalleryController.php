<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;


class GalleryController extends Controller
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
        $galleries = Gallery::paginate(10);
        $gal = Gallery::latest()->first();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('gallery.index', ['galleries' => $galleries, 'gal' => $gal, ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {
   
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10485760', 
            'type' => 'required',
        
            ]);



      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads');
    $image->move($destinationPath, $img);

            $gallery = new Gallery;
            $gallery->image = $img;
            $gallery->type =  $request->type;
            $gallery->description = $request->description;
          
            

            $gallery->save();
     
            return redirect('gallery')->with('success','Gallery Saved');
      
       
       
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
     public function edit(gallery $gallery)
    {
      
    return view('gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10485760', 
            'type' => 'required',
        
            ]);


if($request->image != null){
      $image = $request->file('image');
    $img = $image->getClientOriginalName();
      $destinationPath = public_path('/uploads');
    $image->move($destinationPath, $img);
}

            $gallery = Gallery::find($id);
            if($request->image != null){
            $gallery->image = $img;
    }
            $gallery->type =  $request->type;
            $gallery->description = $request->description;
          
            

            $gallery->save();
     
            return redirect('gallery')->with('success','Gallery Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
    $gallery->delete();
    return redirect()->route('gallery.index')->with('success','gallery has been deleted successfully');
    }
}
