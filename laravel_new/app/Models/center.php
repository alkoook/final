<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class center extends Model
{
    use HasFactory;
    protected $fillable=['name','email','password','address','role_id','phone','sdate','edate','price_period','status','phote'];
    protected $table='centers';
    public $timestemps=false;
    public function setUpdatedAt($value)
    {
      return NULL;
    }
    public function setCreatedAt($value)
    {
      return NULL;
    }
}
