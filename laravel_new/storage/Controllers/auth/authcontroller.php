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
            'email'=>'required|email',
            'password'=>'required',
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
                                return back()->with('faild','انتهت مدة الاشتراك');
                            }
                    }
                    else{
                      return back()->with('faild',' faild password please try again');
                    }
                }
                else{
                  return  "email not exists";
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
                        return  "password admin faild";
                        }
                    }
                    else{
                    return  "email admin not exists";
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
        $co=admin::where('role_id',1)->get();
        if(Session::has('loginidadmin'))
        {
            $data=admin::where('id','=',Session::get('loginidadmin'))->first();
        }
        return view('Admin.dashbord',compact('data','co','con_role','con_admin','con_center','con_center_of'));
    }
    public function dash()
    {

        if(Session::has('loginid'))
        {
        $cor=courseoffer::where('center_id',Session::get('loginid'))->get();
            $data=center::where('id','=',Session::get('loginid'))->first();
            return view('Center.dash',compact('data','cor'));
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
    public function haspermissions($per)
    {
        //get role id in user login
        $us=center::where('id','=',Session::get('loginid'))->first()->role_id;
        //get all permissions in role grant user
        $rol=permission_role::where('role_id','=',$us)->get();
        foreach($rol as $d)
            {
                //get all name role
                $permision=permission::where('id','=',$d->permission_id)->get();
                foreach($permision as $permision)
                    {
                        $permision->name;
                        if($permision->name==$per)
                        {
                            return true;
                        }
                }
            }
            return false;
    }
    public function showforgotfrom(){
        return view('auth.password.forgotpassword2');
    }
    public function sendresetpassword(Request $request){
        if($request->user_type=='center')
        {
            $request->validate([
                'email' => 'required|exists:centers,email'
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
            return "success";

        }
        if($request->user_type=='admin')
        {
            $request->validate([
                'email' => 'required|exists:admins,email'
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
            return "success";
        }
   }
   public function showresetform(Request $request,$token =null,$user_type){
        return view('auth.password.reset_password2
        ')->with(['token'=>$token,'email'=>$request->email,'user_type'=>$user_type]);
   }
   public function resetpasseprd(Request $request){
       if($request->user_type=="center"){
        $request->validate([
            'email' => 'required|email|exists:centers,email',
            'password' =>'required',
             'confirm_password' => 'required'
        ]);
       }else{
           if($request->user_type=="admin"){
            $request->validate([
                'email' => 'required|email|exists:admins,email',
                'password' =>'required',
                 'confirm_password' => 'required'
            ]);
           }
       }
       $check_token=DB::table('password_resets')->where([
           'email' => $request->email,
           'token' => $request->token,
       ])->first();
       if(!$check_token)
       {
           return 'false';
       }else{
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

       }
   }
}
