<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseorder extends Model
{
    use HasFactory;
    protected $table='course_order';
    protected $fillable=['name','details','center_id'];
}
