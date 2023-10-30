<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\courseoffer;
use App\Models\courseorder;
use App\Models\trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class courseoffercontroller extends Controller
{

    public function ff(){
        $data=courseoffer::where('center_id',Session::get('loginid'))->get();
        $triner=trainer::get();

        return view('Center.courseoffer.addcourse',compact('data','triner'));
    }
    public function index(Request $request,$id){
        $data=courseoffer::where('center_id',Session::get('loginid'))->get();
        $triner=trainer::get();
        $order=courseorder::find($id);
        return view('Center.courseoffer.addcourse',compact('data','triner','order'));
    }
    public function create(Request $request){
        $request->validate([
            'name'         =>      'required',
            'details'      =>      'required',
            'price'        =>      'required',
            'count'        =>      'required',
            'sdate'        =>      'required',
            'edate'        =>      'required',
        ]);
        $co=new courseoffer();
        $co->name=$request->name;
        $co->details=$request->details;
        $co->price=$request->price;
        $co->count=$request->count;
        $co->sdate=$request->sdate;
        $co->edate=$request->edate;
        $co->trainer_id=$request->trainer_id;
        $co->center_id=Session::get('loginid');
        $co->save();
        return back();
    }
    public function edit($id)
    {
        $offer=courseoffer::find($id);
        $triner=trainer::get();
        return view('center.courseoffer.edit_course_offer',compact('offer','triner'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'       =>      'required',
            'details'    =>      'required',
            'price'      =>      'required',
            'count'      =>      'required',
            'sdate'      =>      'required',
            'edate'      =>      'required',
        ]);
        courseoffer::find($id)->update($request->all());
        return redirect()->route('show.offer.cour');
    }


    public function show()
    {
        return view('Center.courseoffer.addcourse');
    }

    public function delete($id)
    {
        courseoffer::find($id)->delete();
        return back();
    }
}
