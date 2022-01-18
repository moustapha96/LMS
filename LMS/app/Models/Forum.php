<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['user_id','date','message'];
    
     public function user(){
         return $this->belongsTo(User::class,'user_id');
     } 
}
