<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
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
          $title = 'Delete Notification!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $notice = Notice::latest()->get();
        return view('notice.index', ['notice' => $notice]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $request->validate([
            'title' => 'required',
            'reciepient' => 'required', 
            'description' => 'required', 
            ]);


            $notice = new Notice;
            $notice->title =  $request->title;
            $notice->reciepient =  $request->reciepient;
            $notice->description = $request->description;

            $notice->save();
     
            return redirect('notice')->with('success','Notification Sent');
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
            'title' => 'required',
            'reciepient' => 'required', 
            'description' => 'required', 
            ]);


            $notice = Notice::find($id);
            $notice->title =  $request->title;
            $notice->reciepient =  $request->reciepient;
            $notice->description = $request->description;

            $notice->save();
     
            return redirect('notice')->with('success','Notification Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(notice $notice)
    {
        $notice->delete();
         return redirect()->route('notice.index')->with('success','Notice has been deleted successfully');

    }

    public function teacher_board()
    {
        $notices = Notice::where('reciepient', 'teacher')->latest()->paginate(10);
        return view('teacher_dash.notice_board', compact('notices'));
    }

      public function student_board()
    {
        $notices = Notice::where('reciepient', 'student')->latest()->paginate(10);
        return view('student_dash.annoucement', compact('notices'));
    }
}
