<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    use HasFactory;
    protected $table="trainer";
    protected $fillable=['first_name','last_name','email','password','age','gender','address','phone','center_id','created_at','updated_at'];


}
