<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\students_courses;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        return view('backend.'.Auth::user()->role.'.course.index', compact('course'));

    }
    public function listcours()
    {
        $courses = Course::all();
        return view('backend.'.Auth::user()->role.'.course.listcours', compact('courses'));
    }

    public function coursesFrontend()
    {
        $courses = Course::all();
        return view('frontend.cours.coursesFrontend', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.'.Auth::user()->role.'.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate ([
            'name' => 'required',
            'code' => 'required',
            'image' => 'required',
            'payant' => 'required',
            'montant' => 'required',
            'description' => 'required',
            'teacher_id' => 'required',
        ]);

        if($request->file('image')) {
            //$filePath = $request->file('image')->move(public_path('uploads/images', $fileName));
            $filePath = 'public/uploads/images';
            $fileName = time().'.'.$request->image->getClientOriginalName();


            $request->file('image')->move($fileName, $filePath);
        }
        $course = new Course([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'image' =>$request->get('image'),
            'payant' => $request->get('payant'),
            'montant' => $request->get('montant'),
            'description' => $request->get('description'),
            'teacher_id' => $request->get('teacher_id')

        ]);

       /* $course = new Course;

        $course->name = $request->name;
        $course->code = $request->code;
        $course->image = $fileName;
        $course->payant = $request->payant;
        $course->montant = $request->montant;
        $course->description = $request->description;
        $course->teacher_id = $request->teacher_id;*/

        $course->save();
        return redirect('/courses')->with('success', 'Course saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course  $course)
    {
        //
        //$lessons = Lesson::orderBy('id', 'ASC')->get();
        $courses = Course::all();
        $lessons = Lesson::whereIn('course_id', $courses)->get();
        return view('backend.'.Auth::user()->role.'.course.show', [
            'course' => $course,
            'lessons' => $lessons,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Course::where('id',$id)->delete();
        return redirect('/courses')->with('success', 'Course deleted!');
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
            'description' => ['required'],
            'price' => ['required'],
        ]);

        if(  $request->image != null  ){

            $filename = 'uploads/avatars/'.Auth::id().'_'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/avatars'), $filename);
            
            $course->image = $filename;
        }

        $course->description = $request->description;
        $course->name = $request->name;
        $course->price = $request->price;
        
        $course->save();
        return redirect()->back()->with('success','cours mise en jour');
    }

      // ajouter course
      public function addCourse(){

        return view('backend.'.Auth::user()->role.'.course.create');
    }

    // enregistrer un nouveau cours
    public function saveCourse(Request $request){

       //dd($request->all());
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required'],
        ]);
      
        $filename = 'uploads/avatars/'.Auth::id().'_'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/avatars'), $filename);
        
        $course = new Course();

        $course->name = $request->name;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->teacher_id = Auth::user()->teacher->id;
        $course->image = $filename;

        $course->save();
        return redirect()->action('CourseController@ListeCourses')->with('success','un nouveau cours est ajouté ');
    }

     // liste des cours
     public function ListeCourses(){
        $teacher = Auth::user()->teacher;
       
        return view('backend.'.Auth::user()->role.'.course.index',compact('teacher'));
    }

    // detail cours
    public function viewCourse(Course $course){
      
        return view('backend.'.Auth::user()->role.'.course.view',compact('course'));
    }

    // cours suivi par les étudiants
    public function student_list_courses(Student $student){

        return view('backend.'.Auth::user()->role.'.student.liste_course',compact('student'));
    }
    
    public function QuizCourse(Course $course){
     
        dd($course->quiz);
        return view('backend.'.Auth::user()->role.'.quiz.index',compact('course'));
    }

    // liste des étudiants suivants vos cours 

    public function Listening_Course()
    {
       $student_courses = students_courses::all();
       $teacher = Auth::user()->teacher;
      
       return view('backend.teacher.participant.index',compact('student_courses'));
    }
     //  liste des leçons d'un cours
     public function Lessons_cours(Course $course){
       
        return view('backend.'.Auth::user()->role.'.lesson.liste_lessons',compact('course'));
    }

    // liste des etudiants suivant un cours
    public function students_cours(Course $course){
      
        return view('backend.'.Auth::user()->role.'.student.liste_students',compact('course'));
    }
}
