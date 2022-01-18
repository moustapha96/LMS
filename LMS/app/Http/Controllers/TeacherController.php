<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
     // détail étudiant
     public function ShowStudent(Student $student){

        return view('backend.'.Auth::user()->role.'.student.show',compact('student'));
    }



         /*--------------gestion des Quiz ---------------------*/
    
      // liste des quiz
      public function indexQuiz()
      {
          $quizs = Quiz::all();
          return view('backend.'.Auth::user()->role.'.quiz.liste',compact('quizs'));
      }
      // liste des quiz d'un cours
      public function QuizCourse(Course $course){
       
          return view('backend.'.Auth::user()->role.'.quiz.index',compact('course'));
      }
  
      
  
      // detail d'un quiz
      public function ShowQuizCourse(Quiz $quiz ){
  
          return view('backend.'.Auth::user()->role.'.quiz.view',compact('quiz'));
      }
  
  
       // suppression d'un quiz  
      public function destroy_quiz(Quiz $quiz)
      {
          $file = $quiz->file;
  
          unlink($file);
  
          $quiz->delete();
      
          return redirect()->back()->with('success','le quiz a été bien supprimé ');
  
      }
  
    
}
