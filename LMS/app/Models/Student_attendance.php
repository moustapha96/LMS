<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_attendance extends Model
{
    protected $table = 'students_attendances';
    public $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'dateNaissance',
        'lieuNaissance',
        'login',
        'modePaiement'
    ];
}
