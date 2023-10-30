<?php

use App\Http\Controllers\Center\courseoffercontroller;
use App\Http\Controllers\Center\courseordercontroller;
use App\Http\Controllers\Center\ordercontroller;
use App\Http\Controllers\Center\studentcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\center\trainercontroller;
use App\Models\courseoffer;

Route::group(['namespace'=>'Center','middleware' => 'checklogin'],function(){

Route::get('showtrainer',[trainercontroller::class,'index'])->name('show.trainer');
Route::post('showtrainer',[trainercontroller::class,'create'])->name('create.trainer');
Route::get('delete/triner/{id}',[trainercontroller::class,'delete'])->name('delete.trainer');
Route::get('edithtrainer/{id}',[trainercontroller::class,'edit'])->name('edit.trainer');
Route::post('edittrainer/{id}',[trainercontroller::class,'update'])->name('update.trainer');
//---------course order
Route::get('index',[courseordercontroller::class,'index'])->name('show.order');
Route::POST('create',[courseordercontroller::class,'create'])->name('create.order');
Route::get('delete/course/{id}',[courseordercontroller::class,'delete'])->name('delete.course');
Route::get('offer/course/{id}',[courseoffercontroller::class,'index'])->name('offer.course');
Route::post('offer/cousrse',[courseoffercontroller::class,'create'])->name('create.course');
Route::get('offer/editecousrse/{id}',[courseoffercontroller::class,'edit'])->name('edit.courseoffer');
Route::post('offer/updatecousrse/{id}',[courseoffercontroller::class,'update'])->name('update.courseoffer');
Route::get('show/course',[courseoffercontroller::class,'show_course'])->name('');
Route::get('addcoffurseoffer',[courseoffercontroller::class,'ff'])->name('show.offer.cour');
Route::get('delete/of/course/offer/{id}',[courseoffercontroller::class,'delete'])->name('delete.course.offer');
///------------order user in student
Route::get('show/order',[ordercontroller::class,'index'])->name('show.user.order');//show page order user
Route::get('delete/order/{id_user}/{id_course}',[ordercontroller::class,'delete'])->name('delete.user.order');//show page order user
Route::get('add/student/{id_user}/{id_course}',[ordercontroller::class,'add'])->name('add.student.order');




//--------------student
Route::get('add.and.show.student',[studentcontroller::class,'show'])->name('student.addandshowstudent');
Route::get('sho/std/sourse/{id}',[studentcontroller::class,'std_course']);
Route::post('add/student',[studentcontroller::class,'create'])->name('create.student');
});


Route::get('asd',[])->name('ddddddd');
