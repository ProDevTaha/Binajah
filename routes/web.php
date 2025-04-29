<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CoursesAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EtudientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/primaire', function () {
    return view('primaire');
});

Route::get('/college', function () {
    return view('college');
});

Route::get('/coursesVideos', function () {
    return view('coursesVideos');
});

Route::get('/admin/Courses/Create',[CoursesAdminController::class , 'create']);

Route::post('/primaire/Courses',[CoursesController::class , 'preparePagePrimareCoures'])->name('preparePagePrimareCoures'); 
Route::post('/college/Courses',[CoursesController::class , 'preparePageCollegeCoures'])->name('preparePageCollegeCoures'); 

Route::get('/primaire/Courses/{id}/{matier}',[CoursesController::class , 'pagePrimaireCourse']); 
Route::get('/college/Courses/{id}/{matier}',[CoursesController::class , 'pageCollegeCourse']); 

//routes Admin

Route::get('/admin/courses',[CoursesAdminController::class , 'index'])->name('courses.index'); 

Route::post('/admin/Courses/Create',[CoursesAdminController::class , 'createCourse'])->name('create.course');

Route::post('/admin/Courses/UploadVideos',[CoursesAdminController::class , 'uploadvideos']);

Route::delete('/admin/Courses/DeleteVideos',[CoursesAdminController::class , 'deletevideos']);

Route::delete('/admin/Courses/Delete/{id}',[CoursesAdminController::class , 'deletevideos'])->name('cours.delete');
Route::get('/admin/Courses/update/{id}',[CoursesAdminController::class , 'updateCours']);
Route::post('/admin/Courses/update',[CoursesAdminController::class , 'update'])->name('cours.edit');


Route::get('/admin/users',[UsersController::class , 'index'])->name('users.index');
Route::delete('/admin/users/delete/{id}',[UsersController::class , 'delete'])->name('user.delete');
Route::get('/admin/users/update/{id}',[UsersController::class , 'updateView']);
Route::post('/admin/users/update',[UsersController::class , 'update'])->name('user.update');
Route::post('/admin/users/search',[UsersController::class , 'search'])->name('user.search');


Route::post('/admin/students/search',[EtudientController::class , 'search'])->name('student.search');
Route::get('/admin/students/update/{id}',[EtudientController::class , 'updateView']);
Route::post('/admin/students/update',[EtudientController::class , 'update'])->name('student.update');
Route::get('/admin/students',[EtudientController::class , 'index'])->name('students.index');
Route::get('/admin/newStudent',[EtudientController::class , 'createView'])->name('students.createView');
Route::post('/admin/newStudent',[EtudientController::class , 'create'])->name('students.create');
Route::delete('/admin/newStudent/{id}',[EtudientController::class , 'delete'])->name('student.delete');

// ************************* Auth *****************************

Route::get('/admin/register',[AuthController::class , 'createUserView'])->name('auth.index');
Route::post('/admin/register',[AuthController::class , 'register'])->name('auth.register');
Route::post('/login',[AuthController::class , 'login'])->name('auth.login');
Route::get('/login',[AuthController::class , 'loginview'])->name('auth.login.view');
Route::post('/admin/logout',[AuthController::class , 'logout'])->name('auth.logout');


Route::get('/',function(){return view('home');})->name('home');
Route::get('/admin/dashboard',[DashboardController::class , 'index'])->name('admin.dashboard')->middleware('auth'); 