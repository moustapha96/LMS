<?php

namespace App;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
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

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messageSender(){
        return $this->hasMany(Message::class,'sender_id');
    }

    public function messageReceiver(){
        return $this->hasMany(Message::class,'receiver_id');
    }
    
    public function teacher(){
      return $this->hasOne(Teacher::class,'user_id');
    }
    public function student(){
       return $this->hasOne(Student::class,'user_id');
    }

    protected $table = 'users';
}
