<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table='admins';
    protected $fillable=['name','email','password','role_id','phone'];
    public $timestemps=false;
    public function setUpdatedAt($value)
    {
      return NULL;
    }
    public function setCreatedAt($value)
    {
      return NULL;
    }
    public function role()
    {
        return $this->belongsTo(role::class);
    }

}
