<?php

namespace App\Http\Controllers\center;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\trainer;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class trainercontroller extends Controller
{


    public function index()
    {
        $data=trainer::where('center_id','=',Session::get('loginid'))->get();

        return view('Center.showtrainer',compact('data'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'date_of_birth'=>'required',
            'phone'=>'required|numeric||max:0999999999|min:0111111111',
            'gender'=>'required',
            'email'=> 'required|email'
        ],[
            'email.required'        =>  'يرجى ادخال البريد الالكتروني و المحاولة مرة أخرى',
            'email.email'           =>  'يرجى ادخال بريد الكتروني صالح',
            'phone.required'        =>  'يرجى ادخال رقم الهاتف',
            'phone.max'             =>  'لا يمكن ان تحوي على أكثر من 10 ارقام',
            'phone.min'         =>  'لا يمكن ان تحوي على أقل من 10 ارقام',
            'phone.numeric'         =>  'لا يمكن ان تحوي على محارف',
            'first_name.required'   =>  'يرجى ادخال الاسم الاول',
            'last_name.required'    =>  'يرجى ادخال الاسم الأخير',
            'address.required'      =>  'يرجى ادخال العنوان'
        ]);
        $tra=new trainer();
        $us=user::get();
        $i=0;
        $boo=true;
        foreach($us as $u)
        {
            if($request->email==$u->email&& $request->phone==$u->phone)
            {
            $i=$u->id;
            $boo=false;;
            }
        }
        if($boo==true)
        {
            return back()->with('faild','يرجى التأكد من البريد الالكتروني موجود');
        }
        $tra->first_name=$request->first_name;
        $tra->last_name=$request->last_name;
        $tra->address=$request->address;
        $tra->date_of_birth=$request->date_of_birth;
        $tra->phone=$request->phone;
        $tra->gender=$request->gender;
        $tra->center_id=Session::get('loginid');
        $tra->User_Id=$i;
        $tra->save();
        return back();
    }
    public function delete($id){
        $trainer=trainer::find($id);
        $trainer->delete();
        return back();
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tra=trainer::find($id);
        return view('center.edittrainer',compact('tra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'date_of_birth'=>'required',
            'phone'=>'required|numeric|max:0999999999|min:0111111111',
            'gender'=>'required',
        ],[
            'phone.required'        =>  'يرجى ادخال رقم الهاتف',
            'phone.numeric'         =>  'لا يمكن ان تحوي على محارف',
            'phone.max'             =>  'لا يمكن ان تحوي على أكثر من 10 ارقام',
            'phone.min'         =>  'لا يمكن ان تحوي على أقل من 10 ارقام',
            'first_name.required'   =>  'يرجى ادخال الاسم الاول',
            'last_name.required'    =>  'يرجى ادخال الاسم الأخير',
            'address.required'      =>  'يرجى ادخال العنوان'
        ]);


        $u=trainer::find($id);
        $u->update($request->all());
        return redirect()->route('show.trainer');
    }


    public function destroy($id)
    {
        //
    }
}
