<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
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

    // supprimer une leçon
    public function deleteLesson(Lesson $lesson)   
    {
        $file = $lesson->file;
        $video = $lesson->video;
        
        unlink($file);

        unlink($video);

        $lesson->delete();

        return redirect()->back()->with('success','Leçon supprimée avec succés');
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

        return redirect()->back()->with('success','modifications leçon bien enregistrer');
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

        return redirect()->back()->with('success','leçon bien enregistrer');
    }

   //  liste des leçons d'un cours
   public function Lessons_cours(Course $course){
      
       return view('backend.'.Auth::user()->role.'.lesson.liste_lessons',compact('course'));
   }
}
