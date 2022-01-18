<?php

use Illuminate\Support\Facades\Route;


//TOUTES LES ROUTES QUI NECESSITENT ETRE CONNECTÉ SONT PLACEES ICI
Route::group(['middleware' => ['auth']], function () 
{


   Route::get('etudiant/course/list', 'studentController@listCours')->name('student.courses.list');

   Route::get('étudiant/cours-suivi/','studentController@index_cours_suivi')->name('student.course_suivi');

   Route::get('etudiant/cours/{course}/InscriptionEtudiant', 'studentController@InscriptionEtudiant')->name('student.course.inscription');
   
   Route::get('etudiant/quiz/{course}/', 'studentController@Do_quiz')->name('student.quiz.doing');

   Route::get('etudiant/cours/{course}/détail', 'studentController@show_Course')->name('student.course.show');
   
   Route::get('étudiant/cours/{course}/détail','studentController@detailCourse')->name('student.course.view');
   
   
   Route::get('etudiant/lessons/{course}/', 'studentController@Lesson_Course')->name('student.course.lesson');

   Route::get('etudiant/formateur/{teacher}/détail', 'studentController@show_Teacher')->name('student.teacher.show');
   
   
 


   Route::get('étudiant/détail/{user}','StudentController@showStudent')->name('student.student.show');

    //liste lesson
    Route::get('etudiant/leçon', 'studentController@LessonIndex')->name('student.lesson.index');

   

   //  payement du cours 
   Route::post('étudiant/payement par card/{course}','StudentController@payement_cc')->name('student.payement_cc');

   Route::post('étudiant/payement via compte paypal/{course}','StudentController@payement_paypal')->name('student.payement_paypal');

   Route::post('étudiant/payement vérification/{course}','StudentController@payement_verification')->name('student.payement_verification');


   // liste quiz
   Route::get('etudiant/quiz','studentController@indexQuiz')->name('student.quiz.index');

   // detail du quiz
   Route::get("étudiant/{quiz}/détail",'StudentController@detailQuiz')->name("student.quiz.view");
   
   
   // delete quiz
   Route::get('etudiant/quiz/{quiz}/deleting','studentController@destroy_quiz')->name('student.course.quiz.destroy');
   
   // deatil quiz
   Route::get('cours/quiz/{quiz}/détail','studentController@ShowQuizCourse')->name('student.course.quiz.show');
   
   // list quiz of course
   Route::get('etudiant/cours/{course}/quiz','studentController@courseQuiz')->name('student.course.quiz');

   // quiz doing
   Route::post('etudiant/cours/{course}/quiz','studentController@Quiz_Doing')->name('student.course.quiz_doing');


   Route::get('étudiant/forum', 'studentController@indexForum')->name('student.forum');
   
   Route::post('étudiant/forum/new_message', 'studentController@saveForum')->name('student.forum.add');


   Route::post('student/delete_all/forum', 'studentController@deleteAllForum')->name('student.forumMessage.delete');
});