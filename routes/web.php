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


