<?php

namespace App;

use App\Models\Course;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'nom', 'email', 'password','prenom','dateNaissance',
        'lieuNaissance','adresse','role','genre','avatar','status'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messageSender(){
        return $this->hasMany(Message::class,'sender_id');
    }
    public function messageReceiver(){
        return $this->hasMany(Message::class,'receiver_id');
    }
    
   
}
