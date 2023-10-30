<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $fillable=['first_name', 'last_name', 'address', 'date_of_birth', 'phone', 'gender', 'course_id', 'created_at', 'updated_at'];
}
