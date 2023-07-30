<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterTeacherController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TeacherProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\TeacherDahboardController;
use App\Http\Controllers\SingleTeacherController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::view('/about', 'home.about')->name('about');

// Route for the 'teacher' page
Route::get('/teacher/{id}', [SingleTeacherController::class, 'index'])->name('teacher.show');
Route::post('/appointments/select/{id}', [SingleTeacherController::class, 'select'])->name('appointments.select');
Route::post('/process-payment', [SingleTeacherController::class, 'processPayment'])->name('process.payment');
Route::match(['get', 'post'], '/payment', function () {
    return view('home.payment');
})->name('payment');
Route::post('/review.store', [SingleTeacherController::class, 'reviewstore'])->name('review.store');


// Route for the 'contact' page
Route::view('/contact', 'home.contact')->name('contact');


// route for registeration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// route for registeration
Route::get('/register-teacher', [RegisterTeacherController::class, 'showRegistrationTeacherForm'])->name('register-teacher');
Route::post('/register-teacher', [RegisterTeacherController::class, 'register']);


// route for login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// route for logout
Route::any('/logout', [LogoutController::class, 'logout'])->name('logout');

// route for admin dashboard
Route::get('/admins', function () {
    return view('admin.index');
})->name('admin');


// route to user controller and dashboard
Route::resource('/user-dashboard', UserController::class);
Route::get('/user-search', [UserController::class, 'search']);


// route to teacher controller and dashboard
Route::resource('/teacher-dashboard', TeacherController::class);
Route::get('/teacher-search', [TeacherController::class, 'search']);


// route to subject controller and dashboard
Route::resource('/subject-dashboard', SubjectController::class);
Route::get('/subject-search', [SubjectController::class, 'search']);

// route to admin profile
Route::get('/admin-profile', [AdminProfileController::class, 'index'])->name('admin-profile');
Route::get('/edit-admin', [AdminProfileController::class, 'editdata'])->name('edit-admin');
Route::get('/edit-admin-profile', [AdminProfileController::class, 'editdata'])->name('edit-admin-profile');
Route::put('/edit-admin-profile/{id}', [AdminProfileController::class, 'updatedata'])->name('edit-admin-profile');
Route::get('/edit-admin-password', [AdminProfileController::class, 'editpassword'])->name('edit-admin-password');
Route::put('/edit-admin-password/{id}', [AdminProfileController::class, 'updatepassword'])->name('update-admin-password');
Route::get('/admin-profile/editimg/{id}', [AdminProfileController::class, 'editimg'])->name('edit-admin-img');
Route::put('/admin-profile/updateimg/{id}', [AdminProfileController::class, 'updateimg'])->name('update-admin-img');


// route to user profile
Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user-profile');
Route::get('/edit-profile', [UserProfileController::class, 'editdata'])->name('edit-profile');
Route::get('/edit-user-profile', [UserProfileController::class, 'editdata'])->name('edit-user-profile');
Route::put('/edit-user-profile/{id}', [UserProfileController::class, 'updatedata'])->name('edit-user-profile');
Route::get('/edit-user-password', [UserProfileController::class, 'editpassword'])->name('edit-user-password');
Route::put('/edit-user-password/{id}', [UserProfileController::class, 'updatepassword'])->name('update-user-password');
Route::get('/user-profile/editimg/{id}', [UserProfileController::class, 'editimg'])->name('edit-user-img');
Route::put('/user-profile/updateimg/{id}', [UserProfileController::class, 'updateimg'])->name('update-user-img');



// route to teacher profile
Route::get('/teacher-user-profile', [TeacherProfileController::class, 'index'])->name('teacher-user-profile');
Route::get('/edit-user-tprofile', [TeacherProfileController::class, 'editdata'])->name('edit-user-tprofile');
Route::get('/edit-user-teacher-profile', [TeacherProfileController::class, 'editdata'])->name('edit-teacher-profile');
Route::put('/edit-user-teacher-profile/{id}', [TeacherProfileController::class, 'updatedata'])->name('edit-teacher-user-profile');
Route::get('/edit-user-teacher-password', [TeacherProfileController::class, 'editpassword'])->name('edit-teacher-user-password');
Route::put('/edit-user-teacher-password/{id}', [TeacherProfileController::class, 'updatepassword'])->name('update-teacher-user-password');
Route::get('/teacher-user-profile/editimg/{id}', [TeacherProfileController::class, 'editimg'])->name('edit-teacher-user-img');
Route::put('/teacher-user-profile/updateimg/{id}', [TeacherProfileController::class, 'updateimg'])->name('update-teacher-user-img');



//route for teacher dashboard
Route::get('/teacher-user-dashboard', [TeacherDahboardController::class, 'index'])->name('teacher-user-Dashboard');
Route::get('/teacher-student-dashboard', [TeacherDahboardController::class, 'showstudent'])->name('teacher-student-dashboard');
Route::get('/teacher-studentdata-dashboard', [TeacherDahboardController::class, 'showstudentdata'])->name('teacher-studentdata-dashboard');
Route::get('/teacher-assignment-dashboard', [TeacherDahboardController::class, 'assignments'])->name('teacher-assignment-dashboard');
Route::get('/teacher-notes-dashboard', [TeacherDahboardController::class, 'notes'])->name('teacher-notes-dashboard');
Route::put('/teacher-appointment-dashboard', [TeacherDahboardController::class, 'appointment'])->name('teacher-appointment-dashboard');
Route::get('/teacher-showappointment-dashboard', [TeacherDahboardController::class, 'showappointment'])->name('teacher-showappointment-dashboard');
Route::get('/teacher-createappointment-dashboard', [TeacherDahboardController::class, 'createappointment'])->name('teacher-createappointment-dashboard');
Route::get('/teacher-showreviews-dashboard', [TeacherDahboardController::class, 'showreviews'])->name('teacher-showreviews-dashboard');
Route::put('/teacher-editappointment-dashboard/{id}', [TeacherDahboardController::class, 'editappointment'])->name('teacher-editappointment-dashboard');
Route::get('/teacher-updateappointment-dashboard/{id}', [TeacherDahboardController::class, 'updateappointment'])->name('teacher-updateappointment-dashboard');
Route::delete('/teacher-deleteappointment-dashboard/{id}', [TeacherDahboardController::class, 'deleteappointment'])->name('teacher-deleteappointment-dashboard');
Route::get('/teacher-showuserappointment-dashboard/{id}', [TeacherDahboardController::class, 'showuserappointment'])->name('teacher-showuserappointment-dashboard');
