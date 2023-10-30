<?php
namespace App\Traits;
use App\Models\admin;
use App\Models\permission;
use App\Models\permission_role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

trait allTraits
{
    public function haspermissions($per)
    {
        //get role id in user login
        $us=admin::where('id','=',Session::get('loginidadmin'))->first()->role_id;
        //get all permissions in role grant user
        $rol=permission_role::where('role_id','=',$us)->get();
        foreach($rol as $d)
            {
                //get all name role
                $permision=permission::where('id','=',$d->permission_id)->get();
                foreach($permision as $permision)
                    {
                        if($permision->name==$per)
                        {
                            return true;
                        }
                }
            }
            return false;
    }
    // public function haspermissions($per)
    // {
    //     $role_id=admin::find(Session::get('loginid'))->first()->role_id;
    //     $per =DB::table('permissions')
    //     ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
    //     ->join('roles', 'permission_role.role_id', '=', 'roles.id')
    //     ->where('roles.id', $role_id)
    //     ->get('permissions.name');
    //     foreach($per as $p)
    //     {
    //                     if($p->name==$per)
    //                     {
    //                         return true;
    //                     }
    //     }
    //         return false;
    // }

    function saveimage($photo,$folder){
        $file_extension=$photo->getClientOriginalExtension();
        $file_name=time().'.'.$file_extension;
        $path=$folder;
        $photo->move($path,$file_name);
        return $file_name;
    }
    //use allTraits
    //$this->saveimage($Request->photo,'img/center');
    //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
}
