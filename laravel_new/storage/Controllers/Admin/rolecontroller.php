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
    public function edit($id){
        $role=role::get();
        $per =DB::table('permissions')
        ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
        ->join('roles', 'permission_role.role_id', '=', 'roles.id')
        ->where('roles.id', $id)
        ->get('permissions.*');
        return view('Admin.Role.edit_role',compact('per','role'));
    }
    public function update(){

    }

}
