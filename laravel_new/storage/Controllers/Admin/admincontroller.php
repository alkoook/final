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

class admincontroller extends Controller
{
    use allTraits;

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
    public function store(Request $request){

        $request->validate([
        'name'              =>     'required|max:50',
        'email'             =>     'required|unique:admins,email|max:50',
        'role_id'           =>     'required',
        'password'          =>     'required|max:50',
        'phone'             =>     'required|numeric',
        ],[

        ]);
        $admin=new admin();
        $admin->name        =      $request->name;
        $admin->email       =      $request->email;
        $admin->password    =      hash::make($request->password);
        $admin->role_id     =      $request->role_id;
        $admin->phone       =      $request->phone;
        $admin->save();
        return redirect()->route('create_admin');

    }
     public function show_profile()
     {
        $users = admin::join('roles', 'admins.role_id', '=', 'roles.id')
        ->where('admins.id','=',Session::get('loginidadmin'))
        ->get('roles.name')->first()->name;
         $my=admin::where('id',Session::get('loginidadmin'))->first();
         $per=$this->haspermissions('اضافة مشرف');
         return view('Admin.profile.show_profile',compact('my','users','per'));


    }
    public function edit_profile(Request $request,$id){
        $admin=admin::where('id','=',$id)->first();
        if($request->email==$admin->email)
        {
            $request->validate([
                'phone'   => 'required',
                'name'    => 'required'
            ]);
            $admin->phone=$request->phone;
            $admin->name=$request->name;
            $admin->update();
            return redirect()->route('admin.profile');
        }else{
        $request->validate([
            'email'   => 'required|email|unique:admins,email',
            'phone'   => 'required',
            'name'    => 'required'
        ]);
        $admin->email=$request->email;
        $admin->phone=$request->phone;
        $admin->name=$request->name;
        $admin->update();
        return redirect()->route('admin.profile');
        }
    }
    //show page reset password
    public function show_reset_pas(){
        $my=admin::where('id',Session::get('loginidadmin'))->first();
        return view('Admin.profile.resetPasswordProfile',compact('my'));
    }
    //edit password
    public function reset_pass_profile(Request $request,$id){
        $admin=admin::where('id',$id)->first();
        if(Hash::check($request->password,$admin->password)){
            if($request->new_password==$request->conf_password){
                $admin->update([
                    'password'  => Hash::make($request->new_password)
                ]);
                return redirect()->route('admin.profile');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function admin_ditails()
    {
        $perr=$this->haspermissions('اضافة مشرف');
        if($perr==true)
        {
        $data=admin::where('id','<>',Session::get('loginidadmin'))->get();
        return view('Admin.show_admin',compact('data'));
        }else{
            return back();
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
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required',
            'phone'        =>   'required',
            'role_id'      =>   'required'
        ]);
        $admin=admin::find($id);
        $admin->update($request->all());
        return redirect()->route('admin.ditails');
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
