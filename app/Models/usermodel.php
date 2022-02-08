<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name','email','title','specs_id','phonenumber','image','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];  
  
    // make relation between two tables
    public function specialitytype()
    {
        return $this->belongsTo('App\Models\specialitymodel','specs_id','id');
    }
}
