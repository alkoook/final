<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\subscription;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Traits\allTraits;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use App\Http\Requests\ValidationRequest;

class admincontroller extends Controller
{
    use allTraits;
    use ValidatesRequests;

    public function __construct()
    {
       // $this->middleware('checklogin')->except('gg');
    }
    //show page add admin and access in user permission
    public function create(){
        $check=$this->haspermissions('اضافة مشرف');
            if($check==true){
                $role=role::get()->where('id','<',3);
                return view('Admin.create_admin',compact('role'));
                }else{
                    return view('error.error');
                     }
    }
    //add admin
    public function store(ValidationRequest $request){
        if(Str::length($request->phone)!=10)
            {
                return back()->with('faild','رقم الهاتف غير صالح');
            }
        $admin=new admin();
        $admin->name             =      $request->name;
        $admin->email            =      $request->email;
        $admin->password         =      hash::make($request->password);
        $admin->role_id          =      $request->role_id;
        $admin->phone            =      $request->phone;
        $admin->save();
        return redirect()->route('create_admin');

    }
     public function show_profile()
     {
        $role_id = admin::join('roles', 'admins.role_id', '=', 'roles.id')
        ->where('admins.id','=',Session::get('loginidadmin'))
        ->get('roles.name')->first()->name;
         $my=admin::where('id',Session::get('loginidadmin'))->first();
         $per=$this->haspermissions('اضافة مشرف');
         return view('Admin.profile.show_profile',compact('my','role_id','per'));


    }
    public function edit_profile(Request $request,$id){
        $admin=admin::where('id','=',$id)->first();
        if($request->email==$admin->email)
        {
            $request->validate([
                'phone'               =>     'required|numeric',
                'name'                =>     'required|max:50',
            ],[
                'phone.required'      =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
                'phone.numeric'       =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
                'name.required'       =>     'لا يمكن ان يكون الحقل فارغا اعد المحاولة مرة أخرى',
                'name.max'            =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            ]);
            if(Str::length($request->phone)!=10)
            {
                return back()->with('faild','رقم الهاتف غير صالح');
            }
            $admin->phone=$request->phone;
            $admin->name=$request->name;
            $admin->update();
            return redirect()->route('admin.profile')->with('success','تم الامر بنجاح');
        }else{
        $request->validate([
            'email'                => 'required|email|unique:admins,email|max:50',
            'phone'                => 'required',
            'name'                 => 'required'
        ],[
            'phone.required'      =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
            'phone.numeric'       =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
            'phone.min'           =>     'لايمكن ان يكون اقل من 10 محرفا حاول مرة اخرى ',
            'phone.max'           =>     'لايمكن ان تتجاوز 10 محرفا حاول مرة اخرى ',
            'name.required'       =>     'لا يمكن ان يكون الحقل فارغا اعد المحاولة مرة أخرى',
            'name.max'            =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'email.required'      =>     'يرجى ادخال البريد الالكتروني  والمحاولة مرة أخرى',
            'email.email'         =>     'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
            'email.max'           =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'email.unique'        =>     'البريد الالكتروني  موجود مسبقا حاول مرة اخرى ',
        ]);
        $admin->email=$request->email;
        $admin->phone=$request->phone;
        $admin->name=$request->name;
        $admin->update();
        return redirect()->route('admin.profile')->with('success','تم الامر بنجاح');
    }
    }
    //show page reset password
    public function show_reset_pas(){
        $my=admin::where('id',Session::get('loginidadmin'))->first();
        return view('Admin.profile.resetPasswordProfile',compact('my'));
    }
    //edit password
    public function reset_pass_profile(Request $request,$id){
        $request->validate([
            'password'                            =>      'required|min:8|max:50',
            'new_password'                        =>      'required|min:8|max:50',
            'conf_password'                       =>      'required|min:8|max:50'
        ],[
            'password.max'                        =>      'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'password.min'                        =>      'يجب ان لا تقل كلمة المور عن 8 محارف',
            'password.required'                   =>      'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى',
            'new_password.max'                    =>      'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'new_password.min'                    =>      'يجب ان لا تقل كلمة المور عن 8 محارف',
            'new_password.required'               =>      'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى',
            'conf_password.max'                   =>      'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'conf_password.min'                   =>      'يجب ان لا تقل كلمة المور عن 8 محارف',
            'conf_password.required'              =>      'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى',

        ]);
        $admin=admin::where('id',$id)->first();
        if(Hash::check($request->password,$admin->password)){
            if($request->new_password==$request->conf_password){
                $admin->update([
                    'password'  => Hash::make($request->new_password)
                ]);
                return back()->with('success','تم تعديل كلمة المرور');
            }
            return back()->with('faild','كلمة المرور غير متطايقة');
        }
        return back()->with('faild','كلمة المرور غير صحيحة');
    }
    public function admin_ditails()
    {
        $perr=$this->haspermissions('اضافة مشرف');
        if($perr==true)
        {
        $data=admin::where('id','<>',Session::get('loginidadmin'))->get();
        return view('Admin.show_admin',compact('data'));
        }else{
            return back()->with('faild','ليس لديك صلاحية للوصول لهذه الصفحة');
        }
    }
    public function edit($id)
    {   $role=role::get();
        $admin=admin::find($id);
        $per=$this->haspermissions('اضافة مشرف');
        return view('Admin.edit_record',compact('admin','role','per'));
    }
    public function update(Request $request,$id)
    {
        $admin=admin::where('id',$id)->first();
        if($admin->email==$request->email)
        {
            $request->validate([
                'name'                   =>     'required|max:50',
                'phone'                  =>     'required|numeric',
                'role_id'                =>     'required'
            ],[
                'phone.required'         =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
                'phone.numeric'          =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
                'phone.min'              =>     'لايمكن ان يكون اقل من 10 محرفا حاول مرة اخرى ',
                'phone.max'              =>     'لايمكن ان تتجاوز 10 محرفا حاول مرة اخرى ',
                'name.required'          =>     'لا يمكن ان يكون الحقل فارغا اعد المحاولة مرة أخرى',
                'name.max'               =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            ]);
            if(Str::length($request->phone)!=10)
            {
                return back()->with('faild','رقم الهاتف غير صالح');
            }
            $admin->update($request->all());
            return redirect()->route('admin.ditails');
        }else{
            $request->validate([
                'name'                   =>     'required|max:50',
                'email'                  =>     'required|email|unique:admins,email',
                'phone'                  =>     'required|numeric',
                'role_id'                =>     'required'
            ],[
                'email.required'         =>     'يرجى ادخال البريد الالكتروني  والمحاولة مرة أخرى',
                'email.unique'        =>     'البريد الالكتروني  موجود مسبقا حاول مرة اخرى ',
                'email.email'            =>     'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
                'email.max'              =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
                'phone.required'         =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
                'phone.numeric'          =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
                'phone.min'              =>     'لايمكن ان يكون اقل من 10 محرفا حاول مرة اخرى ',
                'phone.max'              =>     'لايمكن ان تتجاوز 10 محرفا حاول مرة اخرى ',
                'name.required'          =>     'لا يمكن ان يكون الحقل فارغا اعد المحاولة مرة أخرى',
                'name.max'               =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            ]);
            if(Str::length($request->phone)!=10)
            {
                return back()->with('faild','رقم الهاتف غير صالح');
            }
            $admin->update($request->all());
            return redirect()->route('admin.ditails');
        }


    }
    public function delete_admin($id)
    {
        admin::find($id)->delete();
        return redirect()->route('admin.ditails');
    }
    public function subscription(){
        $sub=subscription::get();
        $subb=subscription::get();
        return view('Admin.subscription.show_subscription',compact('sub','subb'));
    }
    public function edit_subscription(Request $request){
        $sub=subscription::where('id',$request->id)->first();
        $sub->price=$request->price;
        $sub->update();
        return back();
    }


}
