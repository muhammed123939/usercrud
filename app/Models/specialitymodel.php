<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialitymodel extends Model
{
    use HasFactory;
    protected $table = 'specialities';
    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];  
 
    // make relation between two tables
    public function user()
    {
        return $this->hasMany('App\Models\usermodel','specs_id','id');
    }
}
