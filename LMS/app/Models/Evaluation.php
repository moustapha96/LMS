<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = "evaluations";
    protected $fillable = ['course_id','student_id','note','evaluation','date'];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
