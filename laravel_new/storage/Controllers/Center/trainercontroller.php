<?php

namespace App\Http\Controllers\center;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\trainer;
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
            'email'=>'required|unique:trainer,email',
            'password'=>'required',
            'address'=>'required',
            'age'=>'required',
            'phone'=>'required',
            'gender'=>'required',
        ]);
        $tra=new trainer();
        $tra->first_name=$request->first_name;
        $tra->last_name=$request->last_name;
        $tra->email=$request->email;
        $tra->password=Hash::make($request->password);
        $tra->address=$request->address;
        $tra->date_of_birth=$request->age;
        $tra->phone=$request->phone;
        $tra->gender=$request->gender;
        $tra->center_id=Session::get('loginid');
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
            'age'=>'required',
            'phone'=>'required',
            'gender'=>'required',
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
