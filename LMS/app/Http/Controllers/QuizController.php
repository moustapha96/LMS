<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuestionsOption;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
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
  
      // afire un quiz
      public function courseQuiz(Course $course)
      {
          $point = 0;
          $resultat = 0;
          return view('backend.'.Auth::user()->role.'.quiz.do_quiz',compact('course','point','resultat'));
      }
  
      // detail d'un quiz
      public function ShowQuizCourse(Quiz $quiz ){
  
          return view('backend.'.Auth::user()->role.'.quiz.view',compact('quiz'));
      }
  
      // quiz fait
      public function Quiz_Doing(Request $request, Course $course)
      {
          $point = 0;
          $resultat = [];
          foreach ($request->reponse as $key => $reponse) { 
                  $question = Question::find($key);
                
                  $answer_question = [];
                  foreach ($reponse as $key => $ans) {
                      
                      $data = json_decode( $ans,true);
                      $answer = new Answer();
                      $answer->fill($data);
                
                      if( $question->id == $answer->question_id ){
                          $answer_question [] = $answer;    
                      }
                      
                  }
                  $point += $question->iscorrect($answer_question);
                  $resultat [$question->question] = $question->resultats();
          }
          
          $student = Student::find(1);
          
          $student->point_quiz = $point;
          $student->course_quiz = $course;
          $student->resultat_quiz = $resultat;
  
          $student->do_quiz($course,$point,$resultat);
  
          return view('backend.'.Auth::user()->role.'.quiz.do_quiz',compact('point','course','resultat','student'));
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
