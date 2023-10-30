<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\courseoffer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\student;
use App\Models\trainer;
use App\Models\user;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

class studentcontroller extends Controller
{

           // $std =DB::table('students')
        // ->join('course_offer', 'course_offer.id', '=', 'students.course_id')
        // ->join('centers', 'centers.id', '=', 'course_offer.center_id')
        // ->where('course_offer.center_id',Session::get('loginid'))
        // ->get('students.*');
        // return $std;

    public function show(){
        $cor=courseoffer::where('center_id',Session::get('loginid'))->get();
        $std=student::get();
        return view('Center.student.addstudent',compact('cor','std'));    

    }
    public function std_course($id){

        $std=student::where('course_id',$id)->get();
        $c=courseoffer::where('id',$id)->first();
        $name=courseoffer::where('id',$id)->first()->name;
        $sdate=courseoffer::where('id',$id)->first()->sdate;
        $edate=courseoffer::where('id',$id)->first()->edate;
        $co=student::where('course_id',$id)->count();
        $trainer_name=trainer::where('id',$c->trainer_id)->first()->first_name;
        // $cor=new courseoffer();
        return view('Center.student.showcousestd',compact('std','name','sdate','edate','trainer_name','co'));

    }

    public function create(Request $request){
        $request->validate([
             'first_name'       =>'required',
             'last_name'        =>'required',
             'address'          =>'required', 
             'date_of_birth'    =>'required',
             'email'            =>'required',
             'password'         =>'required',
             'phone'            =>'required|numeric|max:0999999999|min:0111111111',
             'gender'           =>'required',
             'course_name'      =>'required',
         ],[
            'email.required'         =>  'يرجى ادخال البريد الالكتروني و المحاولة مرة أخرى',
            'email.email'            =>  'يرجى ادخال بريد الكتروني صالح',
            'phone.required'         =>  'يرجى ادخال رقم الهاتف',
            'phone.max'              =>  'لا يمكن ان تحوي على أكثر من 10 ارقام',
            'phone.min'              =>  'لا يمكن ان تحوي على أقل من 10 ارقام',
            'phone.numeric'          =>  'لا يمكن ان تحوي على محارف',
            'first_name.required'    =>  'يرجى ادخال الاسم الاول',
            'last_name.required'     =>  'يرجى ادخال الاسم الأخير',
            'address.required'       =>  'يرجى ادخال العنوان',
            'password.required'      =>  'يرجى ادخال كلمة المرور',
            'password.max'           =>  'لا يمكن ان تتجاوز ال 50 محرف',
            'password.min'           =>  'لا يمكن أن تقل عن 8 محارف'
         ]);
        $s=new student();
        $use=user::get();
        $us=new user();
        $st=student::get();
        foreach($st as $ts)
        {
            if($request->email==$ts->email)
            {
                return view('Center.student.msg');
            }
        }


        $s->first_name = $request->first_name;
        $s->last_name = $request->last_name;
        $s->address = $request->address;
        $s->gender = $request->gender;
        $s->date_of_birth = $request->date_of_birth;
        $s->phone = $request->phone;
        $s->course_id = $request->course_name;
        $s->email=$request->email;
        $s->password=$request->password;
        foreach($use as $u){
        if($s->email == $u->email)
            {
                $s->user_id=$u->id;
                $s->save();
                return back();
            }}
                
            
                $us->first_name = $request->first_name;
                $us->last_name = $request->last_name;
                $us->address = $request->address;
                $us->gender = $request->gender;
                $us->date_of_birth = $request->date_of_birth;
                $us->phone = $request->phone;
                $us->email=$request->email;
                $us->password=$request->password;
                $us->save();
                $s->user_id=$us->id;
                $s->save();
                return back();         
    }

}
