<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students_courses extends Model
{
    protected $table = 'students-courses';

    protected $fillable = ['course_id','student_id','commentaire','note','appreciation'
                            ,'lesson_id','date'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function course(){
        
        return $this->belongsTo(Course::class,'course_id');
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id');
    }

}
