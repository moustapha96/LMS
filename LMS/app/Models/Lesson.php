<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name','file','course_id','video'];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function student_courses(){
        return $this->hasMany(students_courses::class,'lesson_id');
    }
}
