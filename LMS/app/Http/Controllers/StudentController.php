<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Forum;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Student;
use App\Models\Student_attendance;
use App\Models\students_courses;
use App\Models\Teacher;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class StudentController extends Controller
{
         /*--------------gestion des courses ---------------------*/


        //  liste ds cours
        public function listCours(){
    
            $courses= Course::all();
           
            return view('backend.'.Auth()->user()->role.'.cours.list',compact('courses'));
        }


        // detail d'un cours
        public function show_Course(Course $course)
        {
            return view('backend.student.cours.show',compact('course'));
        }

        // detail d'un formateur
        public function show_Teacher(Teacher $teacher)
        {
            return view('backend.student.teacher.show',compact('teacher'));
        }

        // afficher le formulaire de payement 
        public function InscriptionEtudiant(Course $course){ 
           
            if( $course->price == 0 ){

                students_courses::create([
                    'course_id' => $course->id,
                    'student_id' => Auth::user()->student->id,
                    'note' => 0,
                    'date' => date('now')
                ]);
               return redirect()->back()->with('success','Félicitation , Votre inscription au cours '.$course->name.' a réussi');

            }else{

                return view('backend.'.Auth()->user()->role.'.cours.payement',compact('course'));
            }
        } 


        // payement du cours carte crédit 
        public function payement_cc( Request $request, Course $course)  
        {
            dd($request->all());
        }

         // payement du cours via paypal
         public function payement_paypal( Request $request, Course $course)  
         {
             dd($request->all());
         }
          // payement du cours vérification
        public function payement_verification( Request $request, Course $course)  
        {
            dd($request->all());
        }
        // inscrire à un cours 
        public function inscriptionCours(Request $request){
            request()->validate([
               
                'nom' => ['required'],
                'prenom' => ['required'],
                'telephone' => ['required'],
                'adresse' => ['required'],
                'dateNaissance' => ['required'],
                'lieuNaissance' => ['required'],
                'login' => ['required'],
                'modePaiement' => ['required'],
              ]);
    
              $students_attendances = new Student_attendance();
               
              $students_attendances->nom = $request->nom;
              $students_attendances->prenom = $request->prenom;
              $students_attendances->telephone= $request->telephone;
              $students_attendances->adresse= $request->adresse;
              $students_attendances->dateNaissance= $request->dateNaissance;
              $students_attendances->lieuNassance= $request->lieuNaissance;
              $students_attendances->login  = $request->login;
              $students_attendances->modePaiement = $request->modePaiement; 
    
              Student_attendance::create($request->all());
          
            
            return redirect()->action('studentController@index');
        }
    
     /*--------------gestion des lessons ---------------------*/
    
    
        // liste des leçons d'un cours
        public function Lesson_Course(Course $course)
        {
           return view('backend.'.Auth::user()->role.'.lesson.index_lesson',compact('course'));
        }
    

         /*--------------gestion des Quiz ---------------------*/
        
    
    
        // liste des quiz d'un cours
        public function indexQuiz()
        {
            $student = Auth::user()->student;
            
            return view('backend.'.Auth::user()->role.'.quiz.index',compact('student'));
        }

        public function detailCourse(Course $course)
        {
            return view('backend.'.Auth::user()->role.'.cours.show',compact('course'));
        }
        // detail d'un quiz

        public function detailQuiz(Quiz $quiz)
        {
            return view('backend.'.Auth::user()->role.'.quiz.view',compact('quiz'));
        }

        // liste des quiz d'un cours
        public function QuizCourse(Course $course){
         
            // cette fonction permettra d'afficher la liste des quiz d'un cours donné en parametre 
               return view('backend.'.Auth::user()->role.'.quiz.do_quiz',compact('course'));
        }
       
           // faire un quiz
           public function courseQuiz(Course $course)
           {
               // pour cette fonction , c'st dans la partie student 
               // c'est quand l'etudiant veux faire un quiz pour un cours donné en parametre 
               // le nombre de point est de 0 à l'appel de cette fonction de même que résultat aussi
               $point = 0;
               $resultat = 0;
               return view('backend.'.Auth::user()->role.'.quiz.do_quiz',compact('course','point','resultat'));
           }

            // faire un quiz
            public function Do_quiz(Course $course)
            {
                // pour cette fonction , c'st dans la partie student 
                // c'est quand l'etudiant veux faire un quiz pour un cours donné en parametre 
                // le nombre de point est de 0 à l'appel de cette fonction de même que résultat aussi
                $point = 0;
                $resultat = 0;
                return view('backend.'.Auth::user()->role.'.quiz.do_quiz',compact('course','point','resultat'));
            }
       
           // detail d'un quiz
           public function ShowQuizCourse(Quiz $quiz ){
       
               // si vous etes dans la partie teacher 
               // cette function vous permettra de voir les détail d'un quiz  
               return view('backend.'.Auth::user()->role.'.quiz.view',compact('quiz'));
           }
       
           // cette fonction est celle appelé lors de la validation du quiz 
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
             
               // je recuppere le student connecté  
               $student = Auth::user()->student;
               
               $student->point_quiz = $point;
               $student->course_quiz = $course;
               $student->resultat_quiz = $resultat;
       
               $student->do_quiz($course,$point,$resultat);
       
               return view('backend.'.Auth::user()->role.'.quiz.do_quiz',compact('point','course','resultat','student'));
           }
       
            // suppression d'un quiz  
           public function destroy_quiz(Quiz $quiz)
           {
            //    coté étudiant , on supprime seulement les données dans la table quizzes mais pas le fichier pdf 
               $quiz->delete();
           
               return redirect()->back()->with('success','le quiz a été bien supprimé ');
           }


        /************************ gestion du forum **************************/

        // liste des message du forum
        public function indexForum()
        {
            $forums = Forum::limit(5)->get();

            return view('backend.student.forum.index',compact('forums'));
        }

        // envoyer un message sur le forum
        public function saveForum(Request $request)
        {
            request()->validate([
                'message' => ['required'],
            ]);

            $forum = new Forum();
            $forum->user_id = Auth::user()->id;
            $forum->date = new DateTime();
            $forum->message = $request->message;
            $forum->save();

            return redirect()->back()->with('success','envoie message réussi !');   
            
        }
       
        // supprimer les message forum selectionné
        public function deleteAllForum(Request $request)
        {
           
            $ids = $request->ids;
            $data = [];
            
            if( $ids == null ){
                return redirect()->back()->with('error','auncun message n\'a été sélectionné');
            }
            foreach ($ids as $id) {
                 
                $data[] = DB::Table('forums')->where('id',$id)->get()->first();
            }
    
            foreach ($data as $d) {
                Forum::find($d->id)->get()->first()->delete();
            }
           
            return redirect()->back()->with('success','messgaes bien supprimés');
    
        }



        // liste des cours que vous suivé
        public function index_cours_suivi()
        {
            $student = Auth::user()->student;
            $cours_suivis = $student->student_course;

            return view('backend.'.Auth::user()->role.'.cours.cours_suivi',compact('student','cours_suivis'));
        }


        // Show Student
        public function showStudent(User $user)
        {
            
            $student = $user->student;
            return view('backend.'.Auth::user()->role.'.student.show',compact('student'));
        }
}
