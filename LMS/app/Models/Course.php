<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [ 
        'name','description',
        'image','price',
        'teacher_id'
    ];

    public $total_point = 0;
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    
    public function lessons(){
        return $this->hasMany(Lesson::class,'course_id');
    }
    
    public function student_course(){
        return $this->hasMany(students_courses::class,'course_id');
    }
    public function quiz(){
        return $this->hasMany(Quiz::class,'course_id');
    }
    public function question(){
        return $this->hasMany(Question::class,'course_id');
    }
    public function point_question($nbre){
        $point = 0;
        $this->total_point = 0;
        
        foreach ($this->question as $key => $question) {
            $point += $question->point ;
            $this->total_point += $question->point;
        }
        
        if ($point != 0) {
            
            $nbre = ($nbre * 100 ) / $point;
        }

        return $nbre == 0  ? 0 : $nbre; 

    }

}
