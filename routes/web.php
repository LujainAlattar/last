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
Route::view('/teacher', 'home.teacher')->name('teacher');

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
Route::get('/user-search',[UserController::class,'search']);


// route to teacher controller and dashboard
Route::resource('/teacher-dashboard', TeacherController::class);
Route::get('/teacher-search',[TeacherController::class,'search']);


// route to subject controller and dashboard
Route::resource('/subject-dashboard', SubjectController::class);
Route::get('/subject-search',[SubjectController::class,'search']);


// route to user profile
Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user-profile');
Route::get('/edit-profile', [UserProfileController::class, 'editdata'])->name('edit-profile');
Route::get('/edit-user-profile', [UserProfileController::class, 'editdata'])->name('edit-user-profile');
Route::put('/edit-user-profile/{id}', [UserProfileController::class, 'updatedata'])->name('edit-user-profile');
Route::get('/edit-user-password', [UserProfileController::class, 'editpassword'])->name('edit-user-password');
Route::put('/edit-user-password/{id}', [UserProfileController::class, 'updatepassword'])->name('update-user-password');
Route::get('/user-profile/editimg/{id}', [UserProfileController::class, 'editimg'])->name('edit-user-img');
Route::put('/user-profile/updateimg/{id}', [UserProfileController::class, 'updateimg'])->name('update-user-img');

