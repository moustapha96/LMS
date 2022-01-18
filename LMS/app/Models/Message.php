<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // protected $fillable = ['message','sujet','date','sender_id','receiver_id'];

    protected $fillable = ['subject','body','date','attachment'];


    // public function sender(){
    //     return $this->belongsTo( User::class,'sender_id');
    // }
    // public function receiver(){
    //     return $this->belongsTo( User::class,'receiver_id');
    // }
}
