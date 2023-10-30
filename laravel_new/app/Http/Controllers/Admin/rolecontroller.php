<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use Illuminate\Support\Facades\DB;

class rolecontroller extends Controller
{

    public function index(){
        $role=role::get();
        return view('Admin.Role.show_role',compact('role'));
    }

}
