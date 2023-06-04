<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;


use App\Http\Controllers\StudentsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/students',StudentsController::class);
Route::resource('/courses', CourseController::class);
Route::resource('/groups', GroupController::class);
// عرض الطلاب
Route::get('/students', [StudentsController::class,'index'])->name('students.index');

// عرض النموذج لإنشاء طالب جديد
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');

// حفظ الطالب المنشأ
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');

// عرض تفاصيل طالب محدد
Route::get('/students/{id}', [StudentsController::class, 'show'])->name('students.show');

// عرض النموذج لتعديل بيانات الطالب
Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');

// تحديث بيانات الطالب
Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update');

// عرض نتائج البحث
Route::post('/students/search', [StudentsController::class, 'search'])->name('students.search');

// حذف طالب
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');




Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
