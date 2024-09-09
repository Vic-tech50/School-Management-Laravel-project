<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Attendance;
use App\Models\Patient;
use App\Models\Library;
use App\Models\Book;
use Auth;

class HomeController extends Controller
{
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $present = Attendance::where([['student_regnum', Auth::user()->reg_number],['status', 'present']])->count();
        $absent = Attendance::where([['student_regnum', Auth::user()->reg_number],['status', 'absent']])->count();
        return view('home', compact("present", "absent"));
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $students = User::where('type', 0)->count();
        $teachers = User::where('type', 2)->count();
        $recent_teachers = User::where('type', 2)->latest()->limit(5)->get();
        $non_teachers = User::where('type', 4)->orWhere('type', 5)->count();
        $event = Event::latest()->limit(5)->get();
        $ss1 = User::where('class', 'SSS1')->count();

        //state
        $abia = User::where([['state_of_origin', 'Abia'], ['type', 0] ])->count();
        $adamawa = User::where([['state_of_origin', 'adamawa'], ['type', 0]])->count();
        $akwa = User::where([['state_of_origin', 'akwa ibom'],['type', 0]])->count();
        $anambra = User::where([['state_of_origin', 'anambra'], ['type', 0]])->count();
        $bauchi = User::where([['state_of_origin', 'bauchi'], ['type', 0] ])->count();
        $bayelsa = User::where([['state_of_origin', 'bayelsa'], ['type', 0] ])->count();
        $benue = User::where([['state_of_origin', 'benue'], ['type', 0] ])->count();
        $borno = User::where([['state_of_origin', 'borno'], ['type', 0] ])->count();
        $cross = User::where([['state_of_origin', 'cross river'], ['type', 0] ])->count();
        $delta = User::where([['state_of_origin', 'delta'], ['type', 0] ])->count();
        $ebonyi = User::where([['state_of_origin', 'ebonyi'], ['type', 0] ])->count();
        $edo = User::where([['state_of_origin', 'edo'], ['type', 0] ])->count();
        $ekiti = User::where([['state_of_origin', 'ekiti'], ['type', 0] ])->count();
        $enugu = User::where([['state_of_origin', 'enugu'], ['type', 0] ])->count();
        $fct = User::where([['state_of_origin', 'fct'], ['type', 0] ])->count();
        $gombe = User::where([['state_of_origin', 'gombe'], ['type', 0] ])->count();
        $imo = User::where([['state_of_origin', 'imo'], ['type', 0] ])->count();
        $jigawa = User::where([['state_of_origin', 'jigawa'], ['type', 0] ])->count();
        $kaduna = User::where([['state_of_origin', 'kaduna'], ['type', 0] ])->count();
        $kano = User::where([['state_of_origin', 'kano'], ['type', 0] ])->count();
        $katsina = User::where([['state_of_origin', 'katsina'], ['type', 0] ])->count();
        $kebbi = User::where([['state_of_origin', 'kebbi'], ['type', 0] ])->count();
        $kogi = User::where([['state_of_origin', 'kogi'], ['type', 0] ])->count();
        $kwara = User::where([['state_of_origin', 'kwara'], ['type', 0] ])->count();
        $lagos = User::where([['state_of_origin', 'lagos'], ['type', 0] ])->count();
        $nasarawa = User::where([['state_of_origin', 'nasarawa'], ['type', 0] ])->count();
        $niger = User::where([['state_of_origin', 'niger'], ['type', 0] ])->count();
        $ogun = User::where([['state_of_origin', 'ogun'], ['type', 0] ])->count();
        $ondo = User::where([['state_of_origin', 'ondo'], ['type', 0] ])->count();
        $osun = User::where([['state_of_origin', 'osun'], ['type', 0] ])->count();
        $oyo = User::where([['state_of_origin', 'oyo'], ['type', 0] ])->count();
        $plateau = User::where([['state_of_origin', 'plateau'], ['type', 0] ])->count();
        $rivers = User::where([['state_of_origin', 'rivers'], ['type', 0] ])->count();
        $sokoto = User::where([['state_of_origin', 'sokoto'], ['type', 0] ])->count();
        $taraba = User::where([['state_of_origin', 'taraba'], ['type', 0] ])->count();
        $yobe = User::where([['state_of_origin', 'yobe'], ['type', 0] ])->count();
        $zamfara = User::where([['state_of_origin', 'zamfara'], ['type', 0] ])->count();



        return view('adminHome', compact('students', 
            'ss1', 
            'teachers', 
            'non_teachers',
            'abia',
            'adamawa',
            'akwa',
            'anambra',
            'bauchi',
            'benue',
            'borno',
            'cross',
            'delta',
            'ebonyi',
            'edo',
            'ekiti',
            'enugu',
            'fct',
            'gombe',
            'imo',
            'jigawa',
            'kaduna',
            'kano',
            'bayelsa',
            'katsina',
            'kebbi',
            'kogi',
            'kwara',
            'lagos',
            'nasarawa',
            'niger',
            'ogun',
            'ondo',
            'osun',
            'oyo',
            'plateau',
            'rivers',
            'sokoto',
            'taraba',
            'yobe',
            'zamfara',
            'recent_teachers',
            'event',
        ));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
  
        $teacherId = Auth::user()->teacher_id;
$users = User::where('teacher_id', $teacherId)->get();
$classCount = 0;

foreach ($users as $user) {
    if ($user->class_one !== null) {
        $classCount++;
    }
    if ($user->class_two !== null) {
        $classCount++;
    }
    if ($user->class_three !== null) {
        $classCount++;
    }
    if ($user->class_four !== null) {
        $classCount++;
    }
    if ($user->class_five !== null) {
        $classCount++;
    }
    if ($user->class_six !== null) {
        $classCount++;
    }
    if ($user->class_seven !== null) {
        $classCount++;
    }
}


$subjectCount = 0;

foreach ($users as $user) {
    if ($user->subject_one !== null) {
        $subjectCount++;
    }
    if ($user->subject_two !== null) {
        $subjectCount++;
    }
    if ($user->subject_three !== null) {
        $subjectCount++;
    }
    if ($user->subject_four !== null) {
        $subjectCount++;
    }
    if ($user->subject_five !== null) {
        $subjectCount++;
    }
    if ($user->subject_six !== null) {
        $subjectCount++;
    }
    if ($user->subject_seven !== null) {
        $subjectCount++;
    }
}

        return view('managerHome', compact('classCount', 'subjectCount'));
    }

      public function parentHome()
    {
        return view('parentHome');
    }

       public function medicalHome()
    {
        $on_medication = Patient::where('status', 0)->count();
        $discharged = Patient::where('status', 1)->count();
        return view('medicalHome', compact('on_medication','discharged'));
    }

        public function librarianHome()
    {
        $book = Library::sum('total');
        $book_lend = Book::where('status', 0)->sum('total');
        return view('librarianHome', compact('book', 'book_lend'));
    }
}
