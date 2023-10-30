<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authcontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| route login and register
|--------------------------------------------------------------------------
*/
Route::namespace('auth')->group(function(){
    Route::get('/',[authcontroller::class,'login'])->name('show-login')->middleware('alreadyloggedin');//url page login
    Route::post('loginuser',[authcontroller::class,'loginuser'])->name('login');
    Route::get('/logout',[authcontroller::class,'logout'])->name('logout');
    Route::get('/logout_admin',[authcontroller::class,'logout_admin'])->name('logout_admin');
    Route::get('dashbord',[authcontroller::class,'dashbord'])->name('dashbord')->middleware('checkloginadmin');
    Route::get('dash',[authcontroller::class,'dash'])->middleware('checklogin')->name('dash');
/*
|--------------------------------------------------------------------------
| forgot password and reset password
|--------------------------------------------------------------------------
*/
   Route::get('password/forgot',[authcontroller::class,'showforgotfrom'])->name('forgot.password.from');
   Route::post('password/forgot',[authcontroller::class,'sendresetpassword'])->name('forgot.password.link');
   Route::get('password/reset/{token}/{user_type}',[authcontroller::class,'showresetform'])->name('reset.password.from');
   Route::post('reset/password',[authcontroller::class,'resetpasseprd'])->name('reset.password');
   Route::get('hh',[authcontroller::class,'hh']);
});



