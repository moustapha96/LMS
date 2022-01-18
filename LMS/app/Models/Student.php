<?php

namespace App\Models;

use App\User;
use PDF;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    protected $fillable = ['ine'];

    public $resultat_quiz ;
    public $course_quiz ;
    public $point_quiz ;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function evaluation(){
        return $this->hasMany(Evaluation::class,'student_id');
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class,'student_id');
    }
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function deja_Inscrit(Course $course)
    {             
        $true = false;  
        $sc = students_courses::all();
            foreach ($sc as $st_cou) {

                if( $st_cou->course_id == $course->id ){
                    $true = true;
                }
            }
            return $true;
    }
    public function student_course(){
        return $this->hasMany(students_courses::class,'student_id');
    }

    public function do_quiz( Course $course,$point,$resultat ){

        $this->point_quiz = $point;
        $this->course_quiz = $course;
        $this->resultat_quiz = $resultat;
   
       
        $filename = Auth()->user()->id .'_'.time();

        $pdf = PDF::loadview('backend.admin.quiz.quiz_pdf', [
            'point' => $this->point_quiz,
            'course' =>$this->course_quiz,
            'resultat' => $this->resultat_quiz
        ]);        

        $pdf->save('uploads/quiz/'.$filename.'.pdf');

        Quiz::create([
            'course_id' =>  $this->course_quiz->id,
            'student_id' => $this->id,
            'note' =>  $this->point_quiz,
            'file' => 'uploads/quiz/'.$filename.'.pdf',
            'date' => date('Y-m-d H:i:s')
        ]);


        return $pdf->download(Auth::user()->email.'.pdf');
    }


}
