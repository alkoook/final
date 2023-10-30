<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Http\Request;
use App\Models\center;
use App\Models\subscription;
use App\Traits\allTraits;
use Illuminate\Support\Facades\Hash;

class centercontroller extends Controller
{
    use allTraits;
    public function index()
    {
        //
    }

    public function create()
    {
       //
    }
    public function show_center(){
        $role=role::get();
        $sup=subscription::get();
        return view('Admin.cen.center',compact('role','sup'));
    }

    //date('Y-m-d',strtotime('3 year')) ----  |unique:centers,email,
    public function store(Request $request)
    {
        $s=subscription::get();
        $f=0;
        if($request->sup== date('Y-m-d',strtotime('1 month'))){
            $f= subscription::where('id',1)->first()->price;
            }elseif($request->sup== date('Y-m-d',strtotime('3 month'))){
            $f= subscription::where('id',2)->first()->price;
            }elseif($request->sup== date('Y-m-d',strtotime('6 month'))){
            $f= subscription::where('id',3)->first()->price;
            }else{
                $f= subscription::where('id',4)->first()->price;
            }
        $request->validate([
            'name'                  =>    'required|max:50',
            'email'                 =>    'required|unique:centers,email|email|max:50',
            'password'              =>    'required|max:50|min:8',
            'sup'                   =>    'required',
            'phone'                 =>    'required|numeric',
            'address'               =>    'required|max:50',
        ],[
            'email.required'        =>     'يرجى ادخال البريد الالكتروني  والمحاولة مرة أخرى',
            'email.email'           =>     'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
            'email.max'             =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'email.unique'          =>     'البريد الالكتروني موجود مسبقا حاول مرة اخرى ',
            'name.required'         =>     'يرجى ادخال الاسم المحاولة مرة أخرى',
            'name.max'              =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'phone.required'        =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
            'phone.numeric'         =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
            'phone.min'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
            'phone.max'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
            'password.max'          =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'password.min'          =>     'يجب ان لا تقل كلمة المرور عن 8 محارف',
            'password.required'     =>     'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى',
            'address.required'      =>     'يرجى ادخال  العنوان  والمحاولة مرة أخرى',
            'address.max'           =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى',
            'sup.required'          =>     'لايمكن ترك الحقل فارغ الرجاء اختيار مدة الاشتراك',


        ]);

        $center=new center();
        $center->name              =     $request->name;
        $center->email             =     $request->email;
        $center->password          =     hash::make($request->password);
        $center->role_id           =     3;
        $center->address           =     $request->address;
        $center->phone             =     $request->phone;
        $center->price_period      =     $f;
        $center->sdate             =     date('Y-m-d');
        $center->edate             =     $request->sup;
        $center->photo             =    $p='Author.png';
        $center->save();

        return redirect()->route('center.ditails');
    }
    public function center_ditails(){
        $center=center::where('status',0)->get();
        return view('Admin.cen.show_center',compact('center'));
    }
    public function center_off_ditails(){
        $center=center::where('status',1)->get();
        return view('Admin.cen.center_off',compact('center'));
    }
    public function delete($id){
        $center=center::find($id);
        $center->delete();
        return back();
    }
    public function show_refresh($id){
        $center=center::where('id',$id)->first();
        return view('Admin.cen.edit_center',compact('center'));
    }
    public function refresh(Request $request,$id){
        $off=center::where('id',$id)->first();
        $f=0;
            if($request->sup== date('Y-m-d',strtotime('1 month'))){
                $f= subscription::where('id',1)->first()->price;
                }elseif($request->sup== date('Y-m-d',strtotime('3 month'))){
                $f= subscription::where('id',2)->first()->price;
                }elseif($request->sup== date('Y-m-d',strtotime('6 month'))){
                $f= subscription::where('id',3)->first()->price;
                }else{
                    $f= subscription::where('id',4)->first()->price;
                }

             $off->price_period=$f;
             $off->sdate=date('Y-m-d');
             $off->edate=$request->sup;
             $off->status=0;
             $off->update();

              return redirect()->route('center.ditails');
    //     if($request->email!=$off->email){
    //     $request->validate([
    //         'name'                  =>    'required|max:50',
    //         'email'                 =>    'required|unique:centers,email|email|max:50',
    //         'phone'                 =>    'required|numeric',
    //         'address'               =>    'required|max:50',
    //     ],[
    //         'email.required'        =>     'يرجى ادخال البريد الالكتروني  والمحاولة مرة أخرى',
    //         'email.email'           =>     'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
    //         'email.max'             =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
    //         'name.required'         =>     'يرجى ادخال الاسم المحاولة مرة أخرى',
    //         'name.max'              =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
    //         'phone.required'        =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
    //         'phone.numeric'         =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
    //         'phone.min'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
    //         'phone.max'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
    //         'address.required'      =>     'يرجى ادخال  العنوان  والمحاولة مرة أخرى',
    //         'address.max'           =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى',
    //     ]);
    //     $f=0;
    //     if($request->sup== date('Y-m-d',strtotime('1 month'))){
    //         $f= subscription::where('id',1)->first()->price;
    //         }elseif($request->sup== date('Y-m-d',strtotime('3 month'))){
    //         $f= subscription::where('id',2)->first()->price;
    //         }elseif($request->sup== date('Y-m-d',strtotime('6 month'))){
    //         $f= subscription::where('id',3)->first()->price;
    //         }else{
    //             $f= subscription::where('id',4)->first()->price;
    //         }
    //     $off->name=$request->name;
    //     $off->email=$request->email;
    //     $off->phone=$request->phone;
    //     $off->address=$request->address;
    //      $off->price_period=$f;
    //      $off->sdate=date('Y-m-d');
    //      $off->edate=$request->sup;
    //      $off->status=0;
    //      $off->update();

    //       return redirect()->route('center.ditails');
    // }else{
    //         $request->validate([
    //         'name'                  =>    'required|max:50',
    //         'password'              =>    'required|max:50|min:8',
    //         'sup'                   =>    'required',
    //         'phone'                 =>    'required|numeric',
    //         'address'               =>    'required|max:50',
    //         ],[
    //         'name.required'         =>     'يرجى ادخال الاسم المحاولة مرة أخرى',
    //         'name.max'              =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
    //         'phone.required'        =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
    //         'phone.numeric'         =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
    //         'phone.min'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
    //         'phone.max'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
    //         'address.required'      =>     'يرجى ادخال  العنوان  والمحاولة مرة أخرى',
    //         'address.max'           =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى',
    //         'sup.required'          =>     'لايمكن ترك الحقل فارغ الرجاء اختيار مدة الاشتراك',
    //         ]);
    //         $f=0;
    //         if($request->sup== date('Y-m-d',strtotime('1 month'))){
    //             $f= subscription::where('id',1)->first()->price;
    //             }elseif($request->sup== date('Y-m-d',strtotime('3 month'))){
    //             $f= subscription::where('id',2)->first()->price;
    //             }elseif($request->sup== date('Y-m-d',strtotime('6 month'))){
    //             $f= subscription::where('id',3)->first()->price;
    //             }else{
    //                 $f= subscription::where('id',4)->first()->price;
    //             }
    //             $off->name=$request->name;
    //             $off->phone=$request->phone;
    //             $off->address=$request->address;
    //          $off->price_period=$f;
    //          $off->sdate=date('Y-m-d');
    //          $off->edate=$request->sup;
    //          $off->status=0;
    //          $off->update();

    //           return redirect()->route('center.ditails');
        


    }
    public function lock_center($id){
        $center=center::where('id',$id)->first();
        $center->status=1;
        $center->update();
        return back();
    }
}
