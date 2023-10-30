<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\center;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\permission_role;
use App\Models\permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\courseoffer;
use App\Models\student;

class authcontroller extends Controller
{
    //return in view login
    public function login()
    {
        return view('auth.login2');
    }

    public function loginuser(Request $request)
    {
        $request->validate([
            'email'                  =>      'required|email|max:50',
            'password'               =>      'required|min:8|max:50',
        ],[
            'email.required'         =>      'يرجى ادخال البريد الالكتروني  والمحاولة مرة أخرى',
            'email.email'            =>      'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
            'email.max'              =>      'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'password.max'           =>      'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'password.min'           =>      'يجب ان لا تقل كلمة المور عن 8 محارف',
            'password.required'      =>      'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى'
        ]);
        //check user type center or login
           if($request->user_type=="user")
           {

                //check exists email first
            $user=center::where('email','=',$request->email)->first();
            if($user)
                {
                    //check Equal password
                   //if($request->password==$user->password)
                    if(Hash::check($request->password,$user->password))
                    {
                            if($user->status === 0)
                        {
                            $request->session()->put('loginid',$user->id);
                            return redirect('dash');
                        }else
                            {
                                return back()->with('faild',' انتهت مدة الاشتراك ');
                            }
                    }
                    else{
                      return back()->with('faild','كلمة المرور غير صحيحة🤦‍♂️');
                    }
                }
                else{
                    return back()->with('faild','البريد الالكتروني غير موجود');

                }
           }else{
            if($request->user_type=="admin")
            {
                    //check exists email first
                $admin=admin::where('email','=',$request->email)->first();
                if($admin)
                    {
                        //check Equal password
                        if(Hash::check($request->password,$admin->password))
                        {
                            $request->session()->put('loginidadmin',$admin->id);
                            return redirect('dashbord');
                        }
                        else{
                            return back()->with('faild','كلمة المرور غير صحيحة');
                        }
                    }
                    else{
                        return back()->with('faild','البريد الالكتروني غير موجود');
                    }
            }
            }
    }


    public function dashbord()
    {

        $con_role=role::count();
        $con_admin=admin::count();
        $con_center=center::where('status',0)->count();
        $con_center_of=center::where('status',1)->count();
        if(Session::has('loginidadmin'))
        {
            $data=admin::where('id','=',Session::get('loginidadmin'))->first();
        }
        return view('Admin.dashbord',compact('data','con_role','con_admin','con_center','con_center_of'));
    }
    public function dash()
    {

        if(Session::has('loginid'))
        {
        $cor=courseoffer::where('center_id',Session::get('loginid'))->get();
            $data=center::where('id','=',Session::get('loginid'))->first();
            $std=new student();
            return view('Center.dash',compact('data','cor','std'));
        }
    }
    public function logout()
    {
        if(Session::has('loginid'))
        {
            Session::pull('loginid');
        }
        return redirect('/');
    }
    public function logout_admin()
    {
        if(Session::has('loginidadmin'))
        {
            Session::pull('loginidadmin');
        }
        return redirect('/');
    }
    // public function haspermissions($per)
    // {
    //     //get role id in user login
    //     $us=center::where('id','=',Session::get('loginid'))->first()->role_id;
    //     //get all permissions in role grant user
    //     $rol=permission_role::where('role_id','=',$us)->get();
    //     foreach($rol as $d)
    //         {
    //             //get all name role
    //             $permision=permission::where('id','=',$d->permission_id)->get();
    //             foreach($permision as $permision)
    //                 {
    //                     $permision->name;
    //                     if($permision->name==$per)
    //                     {
    //                         return true;
    //                     }
    //             }
    //         }
    //         return false;
    // }
    public function showforgotfrom(){
        return view('auth.password.forgotpassword2');
    }
    public function sendresetpassword(Request $request){
        if($request->user_type=='center')
        {
            $request->validate([
                'email'                 =>     'required|email|max:50|exists:centers,email'
            ],[
                'email.required'        =>     'يرجى ادخال البريد الالكتروني  والمحاولة مرة أخرى',
                'email.email'           =>     'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
                'email.max'             =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
                'email.exists'          =>     'البريد الالكتروني غير موجود حاول مرة اخرى ',
            ]);
            $token=Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            $action_link=route('reset.password.from',['token'=>$token,'email'=>$request->email,'user_type' => $request->user_type]);
            $body="لاعادة تععين كلمة المرور اضفط على الرابط التالي";
            Mail::send('auth.password.email-forgot',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
                $message->from('tcc.fade.test@gmail.com','TCC');
                $message->to($request->email,'yor email')
                        ->subject('اعادة تعيين كلمة ');
            });
            return back()->with('successfilly',' تم ارسال رابط  على حسابك لاعادة تعيين كلمة المرور  ');

        }
        if($request->user_type=='admin')
        {
            $request->validate([
                'email' => 'required|exists:admins,email',
            ],[
                'email.exists'          =>     'البريد الالكتروني غير موجود حاول مرة اخرى وشكرا',
                'email.email'           =>     'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
                'email.max'             =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            ]);
            $token=Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            $action_link=route('reset.password.from',['token'=>$token,'email'=>$request->email,'user_type' => $request->user_type]);
            $body="لاعادة تععين كلمة المرور اضفط على الرابط التالي";
            Mail::send('auth.password.email-forgot',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
                $message->from('tcc.fade.test@gmail.com','TCC');
                $message->to($request->email,'yor email')
                        ->subject('اعادة تعيين كلمة ');
            });
            return back()->with('successfilly',' تم ارسال رابط  على حسابك لاعادة تعيين كلمة المرور  ');
        }
   }
   public function showresetform(Request $request,$user_type,$token =null){
        return view('auth.password.reset_password2
        ')->with(['token'=>$token,'email'=>$request->email,'user_type'=>$user_type]);
   }
   public function resetpasseprd(Request $request){
        $request->validate([
            'password'           =>      'required|max:50',
            'confirm_password'   =>      'required|max:50'
        ],[
            'password.max'                   =>      'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'password.required'              =>      'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى',
            'confirm_password.max'           =>      'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'confirm_password.required'      =>      'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى'
        ]);
       $check_token=DB::table('password_resets')->where([
           'email' => $request->email,
           'token' => $request->token,
       ])->first();
       if(!$check_token)
       {
           return back()->with('faild','الرابط لم يعد صالحا للاستخدام يرجى اعادة طلب الاسترداد');
       }else{
           if($request->password==$request->confirm_password)
           {
                if($request->user_type=="center"){
                    center::where('email','=',$request->email)->update([
                        'password' => Hash::make($request->password)
                    ]);
                    DB::table('password_resets')->where([
                        'email' => $request->email
                    ])->delete();
                    return redirect()->route('show-login');
                }else{
                    if($request->user_type=="admin"){
                        admin::where('email','=',$request->email)->update([
                            'password' => Hash::make($request->password)
                        ]);
                        DB::table('password_resets')->where([
                            'email' => $request->email
                        ])->delete();
                        return redirect()->route('show-login');
                    }
               }
            }else{
                return back()->with('faild','كلمة المرور غير متطابقة');
            }

       }
   }
}
