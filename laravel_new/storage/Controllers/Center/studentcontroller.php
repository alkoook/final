<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\courseoffer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\student;
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

    }
    public function std_course($id){
        $std=student::where('course_id',$id)->get();
        $name=courseoffer::where('id',$id)->first()->name;
        return view('Center.student.showcousestd',compact('std','name'));

    }
}
