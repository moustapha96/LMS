<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Validator;
class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('backend.'.Auth::user()->role.'.questions.index', compact('questions'));
    }
    
    public function create()
    {
        $courses = Course::all();
        return view('backend.'.Auth::user()->role.'.questions.create', compact('courses'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'course_id' => ['required'],
            'question' => ['required'],
            'is_correct' => ['required'],
            'point' => ['required'],
            'type' => ['required'],
            'answers' => ['required'],
        ]);

        $reponses = collect([]);
        
        for ($i=0; $i < 5; $i++) { 
            if( $request->answers[$i] && array_key_exists( $i ,$request->is_correct ) ){
                $reponses->put($i,[
                    'answer' => $request->answers[$i],
                    'is_correct' => 'true' 
             ]); 
            }
            else{
                $reponses->put($i,[
                    'answer' => $request->answers[$i],
                    'is_correct' => 'false' 
             ]); 
            }
        }

       
       $question = Question::create([
            'course_id' => $request->course_id,
            'question' => $request->question,
            'point' => $request->point,
            'type' => $request->type,
        ]);

      
        foreach (json_decode($reponses) as $key => $value) {
                Answer::create([
                        "question_id" => $question->id,
                        "answer" => $value->answer,
                        "is_correct" =>   $value->is_correct == 'true' ? true : false ,
                   ]);
        }
       
        return redirect()->action('QuestionController@index')->with('success','question bien enregistrer');
    }

    public function edit(Question $question)
    {
        $courses = Course::all();
        return view('backend.'.Auth::user()->role.'.questions.edit', compact('question','courses'));
    }

    public function update(Request $request, Question $question)
    {

       
        request()->validate([
            'course_id' => ['required'],
            'question' => ['required'],
            'is_correct' => ['required'],
            'point' => ['required'],
            'type' => ['required'],
            'answers' => ['required'],
        ]);
        $reponses = collect([]);
        for ($i=0; $i < 5; $i++) { 
            if( $request->answers[$i] && array_key_exists( $i ,$request->is_correct ) ){
                $reponses->put($i,[
                    'answer' => $request->answers[$i],
                    'is_correct' => 'true' 
             ]); 
            }
            else{
                $reponses->put($i,[
                    'answer' => $request->answers[$i],
                    'is_correct' => 'false' 
             ]); 
            }
        }    

        $question->update([
            'course_id' => $request->course_id,
            'question' => $request->question,
            'point' => $request->point,
            'type' => $request->type,
        ]);
            

        foreach ($question->answers as $key => $value) {
            $value->delete();
        }

        foreach (json_decode($reponses) as $key => $value) {
            Answer::create([
                    "question_id" => $question->id,
                    "answer" => $value->answer,
                    "is_correct" =>   $value->is_correct == 'true' ? true : false ,
               ]);
        }
        return redirect()->action('QuestionController@index')->with('success','questionn bien mise à jour ');
    }

    public function show(Question $question)
    {
        return view('backend.'.Auth::user()->role.'.questions.show',compact('question'));
    }

    public function destroy(Question $question)
    {

        $question->delete();
        return redirect()->action('QuestionController@index')->with('success','questionn supprimé avec Succès');
    }

    public function index_answer()
    {
        $answers = Answer::all();

        return view('backend.'.Auth::user()->role.'.questions.answer',compact('answers'));
    }
    public function destroy_answer(Answer $answer)
    {
        $answer->delete();

        return redirect()->back()->with('success','Option réponse bien supprimé ');
    }
}
