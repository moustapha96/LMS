<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Classe;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Forum;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Setting;
use App\Models\Student;
use App\Models\students_courses;
use App\Models\Teacher;
use App\Notifications\Contact_notification;
use App\Notifications\Notifications;
use App\User;
use DateTime;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification as noti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Util\ArrayCollection;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\File; 
use PDF;
class AdminController extends Controller
{
    

    // list settings
    public function setting(){

        $settings = Setting::all();
        return view('backend.'.Auth::user()->role.'.settings.index',compact('settings'));

    }
    public function updateSetting(Request $request,Setting $setting){
        
        request()->validate([
            'value' => ['required', 'string', 'max:255'],
            'desciption' => []
            ]);
            $setting->value = $request->value;
            $setting->description =$request->description;
            $setting->save();
            return redirect()->action('AdminController@setting')->with('success','paramétre enregistré');
    }
        
        
        
    /*--------------gestion des Cours ---------------------*/
        
    public function cours(){
        return view('backend.'.Auth::user()->role.'.course.index');
    }

    // liste des cours
    public function ListeCourses(){
        $courses = Course::all();

        return view('backend.'.Auth::user()->role.'.course.index',compact('courses'));
    }

    // detail cours
    public function viewCourse(Course $course){
      
        return view('backend.'.Auth::user()->role.'.course.view',compact('course'));
    }

    // cours suivi par les étudiants
    public function student_list_courses(Student $student){

        return view('backend.'.Auth::user()->role.'.student.liste_course',compact('student'));
    }

    // ajouter course
    public function addCourse(){
        $teachers = Teacher::all();
        
        return view('backend.'.Auth::user()->role.'.course.create',compact('teachers'));
    }

    // enregistrer un nouveau cours
    public function saveCourse(Request $request){

       
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'teacher' => ['required'],
            'image' => ['required'],
        ]);
        
        $filename = 'uploads/avatars/'.Auth::id().'_'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/avatars'), $filename);
        
        $course = new Course();

        $course->name = $request->name;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->teacher_id = $request->teacher;
        $course->image = $filename;

        $course->save();
        return redirect()->action('AdminController@ListeCourses')->with('success','un nouveau cours est ajouté ');
    }

    // page de mise en jour
    public function updateCourse(Course $course){

        $teachers = Teacher::all();
       
        return view('backend.'.Auth::user()->role.'.course.update',compact('course','teachers'));
    }

    // enregistrer les mise à jours
    public function updatedCourse(Request $request,Course $course){

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'teacher' => ['required'],
            
        ]);

        if(  $request->image != null  ){

            $filename = 'uploads/avatars/'.Auth::id().'_'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/avatars'), $filename);
            
            $course->image = $filename;
        }

        $course->name = $request->name;
        $course->price = $request->price;
        $course->teacher_id = $request->teacher;
        
        $course->save();
        return redirect()->action('AdminController@ListeCourses')->with('success','cours mise en jour');
    }

    // liste des etudiants suivant un cours
    public function students_cours(Course $course){
      
        return view('backend.'.Auth::user()->role.'.student.liste_students',compact('course'));
    }

     /*--------------gestion des contact ---------------------*/


    // liste des contacts
    public function indexContact()
    {
        $contacts = Contact::all();

        return view('backend.'.Auth::user()->role.'.contacts.index',compact('contacts'));
    }

    // repondre au contact
    public function responseContact(Request $request,Contact $contact)
    {
      
        request()->validate([
            'response' => ['required'],
            'sujet' => ['required']
        ]); 

        $adresse = Setting::where('code','address')->get()->first();
        

        $reponse = new Contact();

        $reponse->sujet = $request->sujet;
        $reponse->message = $request->response;
        $reponse->adresse = $adresse->value;
        $reponse->name = Auth::user()->prenom.' '.Auth::user()->nom;
        $reponse->date = new DateTime('now');
        $reponse->destinataire = $contact->email;
        $reponse->email = Auth::user()->email;

        $reponse->save();
        


        noti::route('mail', $contact->email)->notify(new Contact_notification($contact, $request->sujet ,$request->response));

        return redirect()->back()->with('success','réponse envoyée avec succés au '.$contact->email );
        
    }

     /*--------------gestion du Forum ---------------------*/


    // discussion forum
    public function indexForum()
    {
        $forums = Forum::all();

        return view('backend.'.Auth::user()->role.'.forum.index',compact('forums'));
    }

    // delete discussion
    public function deleteForum(Forum $forum)
    {
        $forum->delete();
        return redirect()->back()->with('success','message bien supprimé');
    }

    /*--------------gestion des Cours suivis ---------------------*/


    // liste de cours suivi 
    public function indexCoursSuivi()
    {
        $student_courses = students_courses::all();
      
        return view('backend.'.Auth::user()->role.'.student_cours.index',compact('student_courses'));
    }

    // supprimer un cours suivi 
    public function deleteCoursSuivi(students_courses $student_course)
    {
        $student_course->delete();

        return redirect()->back()->with('success','le cours suivi par '.$student_course->student->user->prenom.' '.$student_course->student->user->nom.'a été supprimé');
    }


    /*--------------gestion des leçons ---------------------*/
     
    
    // liste leçons
     public function indexLesson()
     {
         $lessons = Lesson::all();
         return view('backend.'.Auth::user()->role.'.lesson.index',compact('lessons'));
     }
     // detail lesson
     public function ShowLesson(Lesson $lesson){
 
         return view('backend.'.Auth::user()->role.'.lesson.show',compact('lesson'));
     }
 
 
     // ajouter une lecon
     public function AddLesson(Course $course){
 
         return view('backend.'.Auth::user()->role.'.lesson.add',compact('course'));
     }
 
 
    //  mettre à jour une leçon
     public function UpdatedLesson(Request $request, Lesson $lesson )
     {
         request()->validate([
             'name' => ['required', 'string', 'max:255'],
         ]);
         
         
         $lesson->name = $request->name;
        
         if( $request->hasFile('video') ){
 
             $videoname = 'uploads/videos/'. time() . '.' . $request->video->getClientOriginalExtension();
             $request->video->move(public_path('uploads/videos'), $videoname);
             $lesson->video = $videoname;
         }
         if(  $request->hasFile('file') ){            
             $filename = 'uploads/files/'.time() . '.' . $request->file->getClientOriginalExtension();
             $request->file->move(public_path('uploads/files'), $filename);
             $lesson->file = $filename;
         }
 
         $lesson->save();
 
         return redirect()->action('AdminController@indexLesson')->with('success','modifications leçon bien enregistrer');
     }
     // modifier une leçon 
     public function updateLesson(Lesson $lesson)
     {
        return view('backend.'.Auth::user()->role.'.lesson.update',compact('lesson'));
     }
    //  enregistrer une leçon
     public function CreateLesson(Request $request , Course $course){
        
         request()->validate([
             'name' => ['required', 'string', 'max:255'],
             'file' => ['required'],
             'video' => ['required']
         ]);
 
         
         $filename =  'uploads/files/'.time() . '.' . $request->file->getClientOriginalExtension();
         $videoname =  'uploads/videos/'.time() . '.' . $request->video->getClientOriginalExtension();
 
         $request->file->move(public_path('uploads/files'), $filename);
         $request->video->move(public_path('uploads/videos'), $videoname);
         
 
         $lesson = new Lesson();
         $lesson->course_id = $course->id;
         $lesson->name = $request->name;
         $lesson->file = $filename;
         $lesson->video = $videoname;
 
         $lesson->save();
 
         return redirect()->action('AdminController@indexLesson')->with('success','leçon bien enregistrer');
     }
 
    //  liste des leçons d'un cours
    public function Lessons_cours(Course $course){
       
        return view('backend.'.Auth::user()->role.'.lesson.liste_lessons',compact('course'));
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

    // afire un quiz
    public function courseQuiz(Course $course)
    {
        $point = 0;
        $resultat = 0;
        return view('backend.admin.quiz.do_quiz',compact('course','point','resultat'));
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

        return view('backend.admin.quiz.do_quiz',compact('point','course','resultat','student'));
    }

     // suppression d'un quiz  
    public function destroy_quiz(Quiz $quiz)
    {
        $file = $quiz->file;

        unlink($file);

        $quiz->delete();
    
        return redirect()->back()->with('success','le quiz a été bien supprimé ');

    }
    /*--------------gestion des utilisateurs ---------------------*/


    // liste des etudiants
    public function student(){

        $students = Student::all();
      
        return view('backend.'.Auth::user()->role.'.student.index',compact('students'));
    }
    // liste des formateurs
    public function teacher(){
       return view('backend.'.Auth::user()->role.'.teacher.index');
    }

    //liste des formateurs 
    public function formateurs(){
        $teachers = Teacher::all();

        return view('backend.'.Auth::user()->role.'.teacher.index',compact('teachers'));
    }


    // détail formateur
    public function formateurView(Teacher $teacher){
    
        return view('backend.'.Auth::user()->role.'.teacher.show',compact('teacher'));
    }

    // détail étudiant
    public function ShowStudent(Student $student){

        return view('backend.'.Auth::user()->role.'.student.show',compact('student'));
    }


    // enregistrer un formateur
    public function saveTeacher(Request $request){
       request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'dateNaissance' => ['required', 'date'],
            'sexe' => ['required'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'tel' => ['required','string', 'min:9','max:9'],
            'career' => ['required'],
            'description' => ['required'],
        ]);

                $user = new User();
                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->tel =   $request->tel;
                $user->adresse =  $request->adresse;
                $user->email =  $request->email;
                $user->sexe= $request->sexe;
                $user->dateNaissance =  $request->dateNaissance;
                $user->lieuNaissance =  $request->lieuNaissance;
                $user->password = Hash::make( $request->password);
                $user->save();

                $id = $user->id;
                $date =  date('Y');
                $caractere = 'T';
                $matricule = $caractere.''.$id.''.$date;

                $teacher = new Teacher();
                $teacher->career = $request->career;
                $teacher->description = $request->description;
                $teacher->matricule = $matricule;
                $teacher->user_id = $user->id;

                $teacher->save();

                return redirect()->action('AdminController@formateurs')->with('success','formateur ajouter avec succés');
    }


    // mettre à jour formateur
    public function updatedTeacher( Request $request ,Teacher $teacher){
        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'dateNaissance' => ['required', 'date'],
            'sexe' => ['required'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$teacher->user->id],
            'tel' => ['required','string', 'min:9','max:9'],
            'career' => ['required'],
            'description' => ['required'],
        ]);

                $user = $teacher->user;
                $teacher->career =$request->career;
                $teacher->description = $request->description;
                $teacher->save();

                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->tel =   $request->tel;
                $user->adresse =  $request->adresse;
                $user->email =  $request->email;
                $user->sexe= $request->sexe;
                $user->dateNaissance =  $request->dateNaissance;
                $user->lieuNaissance =  $request->lieuNaissance;
                $user->save();

                return redirect()->action('AdminController@formateurs')->with('success','mise en jour formateur réussi');
    }

    // mettre à jiur un etudiant
    public function updatedStudent(  Request $request ,Student $student){

        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'dateNaissance' => ['required', 'date'],
            'sexe' => ['required'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$student->user->id],
            'tel' => ['required','string', 'min:9','max:9'],
            'ine' => ['required'],
        ]);

                $user = $student->user;
                $student->ine =$request->ine;
                $student->save();

                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->tel =   $request->tel;
                $user->adresse =  $request->adresse;
                $user->email =  $request->email;
                $user->sexe= $request->sexe;
                $user->dateNaissance =  $request->dateNaissance;
                $user->lieuNaissance =  $request->lieuNaissance;
                $user->save();

                return redirect()->action('AdminController@student')->with('success','étudiant ajouter avec succés');
    }

    // enregistrer un etudiant
    public function saveStudent(Request $request){
        request()->validate([
             'prenom' => ['required', 'string', 'max:255'],
             'nom' => ['required', 'string', 'max:255'],
             'adresse' => ['required', 'string', 'max:255'],
             'dateNaissance' => ['required', 'date'],
             'sexe' => ['required'],
             'lieuNaissance' => ['required', 'string','min:3','max:100'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:6', 'confirmed'],
             'tel' => ['required','string', 'min:9','max:9'],
             'ine' => ['required'],
         ]);
 
                 $user = new User();
                 $user->nom = $request->nom;
                 $user->prenom = $request->prenom;
                 $user->tel =   $request->tel;
                 $user->adresse =  $request->adresse;
                 $user->email =  $request->email;
                 $user->sexe= $request->sexe;
                 $user->dateNaissance =  $request->dateNaissance;
                 $user->lieuNaissance =  $request->lieuNaissance;
                 $user->password = Hash::make( $request->password);
                 $user->save();

 
                 $student = new Student();
                 
                 $student->user_id = $user->id;
                 $student->ine = $request->ine;
                
 
                 $student->save();
 
                 return redirect()->action('AdminController@student')->with('success','étudiant ajouter avec succés');
    }
    


    /*---------------gestion des fichier du systems -------------*/

    // liste of all files in systems
    public function all_files()
    {
        $files = File::allFiles('uploads');
       
        return view('backend.admin.settings.files',compact('files'));
    }

    // destroy file
    public function destroy_files($file)
    {
         unlink($file);

         return redirect()->back()->with('success','suppréssion fichier réussie');
    }

}

