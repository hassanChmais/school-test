<?php

use Illuminate\Support\Facades\Route;

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
Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
], function(){

    Route::get('/', function () {
    return view('dashboard');
});
    //Route::resource('Grades', 'GradeController');
    //Grades
    Route::get('/grades' , [App\Http\Controllers\GradeController::class , 'index'])->name('grades');
    Route::post('/add_grade' , [App\Http\Controllers\GradeController::class , 'add_grade'])->name('add_grade');
    Route::post('/update_grade' , [App\Http\Controllers\GradeController::class , 'update_grade'])->name('update_grade');
    Route::post('/delete_grade' , [App\Http\Controllers\GradeController::class , 'delete_grade'])->name('delete_grade');
    //Classes
    Route::get('/classes' , [App\Http\Controllers\ClassroomController::class , 'index'])->name('classes');
    Route::post('/add_class' , [App\Http\Controllers\ClassroomController::class , 'add_class'])->name('add_class');
     Route::post('/delete_class' , [App\Http\Controllers\ClassroomController::class , 'delete_class'])->name('delete_class');
    Route::post('/update_class' , [App\Http\Controllers\ClassroomController::class , 'update_class'])->name('update_class');
         Route::post('/delete_all' , [App\Http\Controllers\ClassroomController::class , 'delete_all'])->name('delete_all');
    //Sections
      Route::get('/sections' ,[App\Http\Controllers\SectionController::class , 'index'])->name('sections');
      Route::post('/add_section',[App\Http\Controllers\SectionController::class,'add_section'])->name('add_section');   
    Route::post('/ajax',[App\Http\Controllers\SectionController::class,'ajax'])->name('ajax'); 
    Route::post('/delete_section',[App\Http\Controllers\SectionController::class,'delete_section'])->name('delete_section');
    Route::get('/get_section/{id}',[App\Http\Controllers\SectionController::class,'get_section'])->name('get_section');
    Route::post('/update_section/{id}',[App\Http\Controllers\SectionController::class,'update_section'])->name('update_section');
    Route::view('/add_parent','livewire.show_form')->name('parents');
    Route::get('/teachers' ,[App\Http\Controllers\TeacherController::class,'index'])->name('teachers');
    Route::get('/add_teacher',[App\Http\Controllers\TeacherController::class ,'add_teacher'])->name('add_teacher');
    Route::post('/insertTeacher',[App\Http\Controllers\TeacherController::class,'insert_teacher'])->name('insertTeacher');
    Route::get('/editTeacher/{id}',[App\Http\Controllers\TeacherController::class,'edit_teacher'])->name('editTeacher');
    Route::post('/updateTeacher/{id}',[App\Http\Controllers\TeacherController::class,'update_teacher'])->name('updateTeacher');
    Route::get('/deleteTeacher/{id}',[App\Http\Controllers\TeacherController::class,'delete_teacher'])->name('deleteTeacher');
    Route::get('/teacherSection',[App\Http\Controllers\TeacherSectionController::class,'index'])->name('teacherSection');
    Route::post('/AddTeacherSection',[App\Http\Controllers\TeacherSectionController::class,'add_teacher_section'])->name('AddTeacherSection');
    Route::get('/student',[App\Http\Controllers\StudentController::class,'index'])->name('student');
    Route::post('/student_ajax',[App\Http\Controllers\StudentController::class,'student_ajax'])->name('student_ajax');
Route::post('/addStudent',[App\Http\Controllers\StudentController::class,'add_student'])->name('addStudent');
Route::get('/getImages',[App\Http\Controllers\StudentController::class,'get_images'])->name('getImages');

});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');*/
