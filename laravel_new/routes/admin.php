<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\admincontroller;
use App\Http\Controllers\Admin\centercontroller;
use App\Http\Controllers\Admin\rolecontroller;


/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('login2',function(){
    return view('auth.login2');
});
route::get('pass',function(){
    return view('auth.password.forgotpassword2');
});
route::get('res',function(){
    return view('auth.password.reset_password2');
});

//show page subscription

Route::group(['namespace'=>'Admin','middleware' => 'checkloginadmin'],function(){
Route::get('create_admin',[admincontroller::class,'create'])->name('create_admin'); //show page create admin
Route::post('create_admin',[admincontroller::class,'store'])->name('store');//add new admin
Route::get('show_center',[centercontroller::class,'show_center'])->name('show_center');// view center
Route::post('create_center',[centercontroller::class,'store'])->name('create_center');// add new center
Route::get('admin/profile',[admincontroller::class,'show_profile'])->name('admin.profile');// page admin proile
Route::post('admin/edit/profile/{id}',[admincontroller::class,'edit_profile'])->name('edit.admin.profile');//edit profile
Route::get('reste/password/profile',[admincontroller::class,'show_reset_pas'])->name('profile.reset.password');//show page profile reset password
Route::post('edit/password/profile{id}',[admincontroller::class,'reset_pass_profile'])->name('profile.edit.password');//edit pass profile
route::get('subscription',[admincontroller::class,'subscription'])->name('subscription');//show page subscription
route::post('edit/subscription',[admincontroller::class,'edit_subscription'])->name('edit_subscription');//edit price subscription

// route ditails dashbord
Route::get('admin/ditails',[admincontroller::class,'admin_ditails'])->name('admin.ditails');//admin
Route::get('role/ditails',[rolecontroller::class,'index'])->name('role.ditails');//role
Route::get('center/ditails',[centercontroller::class,'center_ditails'])->name('center.ditails');//center
Route::get('center/off/ditails',[centercontroller::class,'center_off_ditails'])->name('center.off.ditails');//ecnter off

//route record admin
Route::get('edit/record/admin/{id}',[admincontroller::class,'edit'])->name('edit.record');//show page edit admin
Route::post('edit/record/admin/{id}',[admincontroller::class,'update'])->name('save.edit.record');//save edit admin
Route::get('delete/admin/{id}',[admincontroller::class,'delete_admin'])->name('delete,admin');//delete admin


//route center
Route::get('delete/center/{id}',[centercontroller::class,'delete'])->name('delete.center');//delete center
Route::get('refresh/center/{id}',[centercontroller::class,'show_refresh'])->name('show,refresh.center');//show page refresh sup
Route::post('edit/center/off/{id}',[centercontroller::class,'refresh'])->name('refresh.center');//save refresh
Route::get('lock/center/{id}',[centercontroller::class,'lock_center'])->name('lock.center');
});
