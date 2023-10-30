<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseoffer extends Model
{
    use HasFactory;
    protected $table='course_offer';
    protected $fillable=['name','details','trainer','count','sdate','edate','price','center_id','trainer_id'];
    public function trainer(){
        return $this->belongsTo(trainer::class);
    }
}
