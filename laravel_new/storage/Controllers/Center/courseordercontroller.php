<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\center;
use App\Models\courseorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class courseordercontroller extends Controller
{
    public function index()
    {
        $d=courseorder::where('center_id',Session::get('loginid'))->get();
        return view('Center.courseorder.index',compact('d'));
    }

    public function create(Request $r)
    {
        $c=new courseorder();
        $c->name=$r->name;
        $c->details=$r->details;
        $c->center_id=Session::get('loginid');
        $c->save();

        return back();
    }
    public function delete($id){
        courseorder::find($id)->delete();
        return back();
    }

}
