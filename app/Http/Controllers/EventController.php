<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
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
         $title = 'Delete Event!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $event = Event::latest()->get();
        return view('event.index', ['event' => $event]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'title' => 'required',
            'start_time' => 'required', 
            'start_date' => 'required', 
            ]);


            $event = new Event;
            $event->title =  $request->title;
            $event->start_date =  $request->start_date;
            $event->start_time =  $request->start_time;
            $event->end_date =  $request->end_date;
            $event->end_time =  $request->end_time;
            $event->description = $request->description;
          
            

            $event->save();
     
            return redirect('event')->with('success','Event Added');
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
     public function edit(event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'start_time' => 'required', 
            'start_date' => 'required', 
            ]);


            $event = Event::find($id);
            $event->title =  $request->title;
            $event->start_date =  $request->start_date;
            $event->start_time =  $request->start_time;
            $event->end_date =  $request->end_date;
            $event->end_time =  $request->end_time;
            $event->description = $request->description;
          
            

            $event->save();
     
            return redirect('event')->with('success','Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        $event->delete();
         return redirect()->route('event.index')->with('success','Event has been deleted successfully');

    }
}
