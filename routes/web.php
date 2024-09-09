 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\JuniorSubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WebcamController;
// use Hash;
use App\Models\Event;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Faq;
// use App\Models\Event;

/*
|------------------------------------ --------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $event = Event::latest()->limit(3)->get();
    $news = News::latest()->limit(3)->get();
    $new = News::latest()->first();
    $gallery = Gallery::all();
    return view('home/index', compact('event', 'news', 'new','gallery'));
});

Route::get('/camera', function () {
    return view('admin.camera');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/objective', function () {
    return view('home.objective');
});

Route::get('/events', function () {
$event = Event::latest()->paginate(8);
    return view('home.event', compact('event'));
});

Route::get('/blog', function () {
    $news = News::latest()->paginate(4);

    return view('home.blog', compact('news'));
});


Route::get('/gallerys', function () {
    $galleries = Gallery::paginate(6);
    return view('home.gallery', compact('galleries'));
});

Route::get('/faqs', function () {
    $faq = Faq::all();
    return view('home.faq', compact('faq'));
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/cam', function () {
    return view('cam');
});

Route::get('/hash', function () {
    return bcrypt('welcome');
});

Route::get('webcam', [WebcamController::class, 'index']);
Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');
  


 Route::resource('subject', JuniorSubjectController::class);
 Route::resource('teachers', TeacherController::class);
 Route::resource('classes', ClassController::class);
 Route::resource('grade', GradeController::class);
 Route::resource('gallery', GalleryController::class);
 Route::resource('news', NewsController::class);
 Route::resource('event', EventController::class);
 Route::resource('notice', NoticeController::class);
 Route::resource('settings', SettingsController::class);
 Route::resource('profile', ProfileController::class);
 Route::resource('faq', FaqController::class);
 Route::resource('library', LibraryController::class);
 Route::resource('student', StudentController::class);
 Route::resource('staffs', StaffController::class);
 Route::resource('assignment', AssignmentController::class);
 Route::resource('result', ResultController::class);
 Route::resource('patient', PatientController::class); 
 Route::resource('book', BookController::class);

Route::post('/users/promote', [StudentController::class, 'promote'])->name('users.promote');
Route::post('/users/demote', [StudentController::class, 'demote'])->name('users.demote');


 Route::post('/upload_image', [ProfileController::class, 'uploadImage']);
 Route::post('/save_image', [StudentController::class, 'store_image'])->name('save.image');


 Route::get('students/import', [StudentController::class, 'import_student']);
 Route::get('import_result', [ResultController::class, 'import_result'])->name('import');
 Route::post('resultcsv', [ResultController::class, 'resultcsv']);
 Route::post('check_result', [StudentController::class, 'check_result']);
 Route::post('admin_student_result', [StudentController::class, 'admin_student_result']);
 Route::post('uploadCSV', [StudentController::class, 'uploadCSV']);
 Route::post('studentscsv', [StudentController::class, 'studentscsv']);
 Route::get('profiles', [ProfileController::class, 'student_profile'])->name('student.profile');
 Route::get('subject_submitted', [GradeController::class, 'subject_submitted'])->name('subject.submit');
 Route::get('student_result', [StudentController::class, 'show_result']);
 Route::post('student_result', [StudentController::class, 'student_result']);
 Route::get('all_result', [GradeController::class, 'all_result'])->name('all.result');
 Route::get('/subject-details/{subject}/{class}', [GradeController::class, 'showSubjectDetails'])->name('subject.details');
 


 Route::get('teacher/students', [ClassController::class, 'teacher_students'])->name('teacher.students');
 Route::get('teacher/attendance', [ClassController::class, 'student_attendance'])->name('teacher.attendance');
 Route::get('teacher/view_attendance', [ClassController::class, 'view_attendance'])->name('teacher.view');


 Route::post('teacher/attendance', [ClassController::class, 'mark_attendance'])->name('attendance');
 Route::post('teacher/attendance2', [ClassController::class, 'mark_attendance2'])->name('attendance2');
 Route::post('teacher/attendance3', [ClassController::class, 'mark_attendance3'])->name('attendance3');
 Route::post('teacher/attendance4', [ClassController::class, 'mark_attendance4'])->name('attendance4');
 Route::post('teacher/attendance5', [ClassController::class, 'mark_attendance5'])->name('attendance5');
 Route::post('teacher/attendance6', [ClassController::class, 'mark_attendance6'])->name('attendance6');
 Route::post('teacher/attendance7', [ClassController::class, 'mark_attendance7'])->name('attendance7');


 Route::get('upload_result', [ResultController::class, 'upload_result']);
 Route::post('store_score', [ResultController::class, 'store_score'])->name('store.score');
 Route::post('store_unscore', [ResultController::class, 'store_unscore'])->name('store.unscore');


 Route::get('teacher/profile', [ProfileController::class, 'teacher_profile'])->name('teacher.profile');
 Route::post('update_profile', [ProfileController::class, 'update_profile'])->name('update.profile');
 Route::post('update_password', [ProfileController::class, 'update_password'])->name('update.password');
 Route::post('update_pic', [ProfileController::class, 'update_pic'])->name('update.pic');

 Route::get('teacher/notice/board', [NoticeController::class, 'teacher_board'])->name('teacher.notice');
  Route::get('show_result', [ResultController::class, 'show_result']);

 Route::get('teacher/view_result', [ResultController::class, 'show_result'])->name('teacher.result');

  Route::get('teacher/check_result', [ResultController::class, 'check_result'])->name('teacher.check');

  Route::get('add_patient', [PatientController::class, 'add_patient']);
  Route::get('discharged_patient', [PatientController::class, 'discharged'])->name('patient.discharged');
  Route::post('discharge_patient', [PatientController::class, 'discharge_patient']);
  Route::post('create', [PatientController::class, 'check_patient']);
 Route::get('medical_profile', [ProfileController::class, 'medical_profile'])->name('medical.profile');
 Route::get('librarian_profile', [ProfileController::class, 'librarian_profile'])->name('librarian.profile');





 Route::post('update_result', [ResultController::class, 'update_result']);
 Route::post('submit_result', [ResultController::class, 'submit_result']);

 Route::post('clear_book', [BookController::class, 'clear_book']);




 Route::get('student/notice/board', [NoticeController::class, 'student_board'])->name('student.notice');

  Route::get('student_attendance', [ClassController::class, 'check_attendance'])->name('student.attendance');

  Route::get('student_assignment', [AssignmentController::class, 'student_assignment'])->name('student.assignments');







  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/teacher/home', [HomeController::class, 'managerHome'])->name('teacher.home');
});

Route::middleware(['auth', 'user-access:parent'])->group(function () {
  
    Route::get('/parent/home', [HomeController::class, 'parentHome'])->name('parent.home');
});

Route::middleware(['auth', 'user-access:medical'])->group(function () {
  
    Route::get('/medical/home', [HomeController::class, 'medicalHome'])->name('medical.home');
});

Route::middleware(['auth', 'user-access:librarian'])->group(function () {
  
    Route::get('/librarian/home', [HomeController::class, 'librarianHome'])->name('librarian.home');
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
