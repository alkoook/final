<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\user_order;
use App\Models\user_order2;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\student;


class ordercontroller extends Controller
{
    public function index(){
        $order =DB::table('user')
        ->join('user_orders', 'user_orders.user_id', '=', 'user.id')
        ->join('course_offer', 'user_orders.course_offer_id', '=', 'course_offer.id')
        ->join('centers', 'course_offer.center_id', '=', 'centers.id')
        ->where('course_offer.center_id',Session::get('loginid'))
        ->get(['course_offer.*','course_offer.id as id_course','user.*','user.id as id_user']);
        return  view('Center.userorder.showorderuser',compact('order'));
    }
    public function delete($id_user,$id_course){
         user_order::where('user_id',$id_user)->where('course_offer_id',$id_course)->delete();
        return back();
        }

        public function add($id_user,$id_course)
        {
            $user=user::where('id',$id_user)->first();
            $std=new student();
            $std->first_name=$user->first_name;
            $std->last_name=$user->last_name;
            $std->phone=$user->phone;
            $std->course_id=$id_course;
            $std->address=$user->address;
            $std->date_of_birth=$user->date_of_birth;
            $std->gender=$user->gender;
            $std->save();
            $this->delete($id_user,$id_course);
            return back();

        }
}
