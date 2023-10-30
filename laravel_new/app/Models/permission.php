<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    protected $table="permissions";
    protected $fillable=['name'];

    public function roles()
    {
        return $this->belongsToMany(role::class,permission_role::class);
    }
    
}
