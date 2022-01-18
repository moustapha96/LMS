<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('classes', 'ClasseController');
   
    
    Route::post('questions/{question}/update','QuestionController@update')->name('questions.update');
    
    Route::get('questions/{question}/edit','QuestionController@edit')->name('questions.edit');
    
    Route::resource('questions_options', 'QuestionsOptionController');
    
    Route::get('/create', 'QuestionsOptionController@store')->name('Questions_options.store');
    
    Route::resource('results', 'ResultController');
  

    /*   gestion des cours */

      // mettre a jour
      Route::get('formateur/cours/mise_a_jour/{course}','CourseController@updateCourse')->name('teacher.course.update');

      Route::post('formateur/cours/mise_a_jour/{course}','CourseController@updatedCourse')->name('teacher.course.updated');
  
        // detail d'un cours
    Route::get('formateur/cours/{course}/détail','CourseController@viewCourse')->name('teacher.course.view');

    // ajouter un cours
    Route::get('formateur/nouveau_cours','CourseController@addCourse')->name('teacher.course.add');

    // liste des cours d'une classe
    Route::get('formateur/cours','CourseController@ListeCourses')->name('teacher.course.index');

    // enregistrer un nouveau cours
    Route::post('formateur/enregistrement_cours/','CourseController@saveCourse')->name('teacher.course.create');


       // lesson de chaque cours 
    Route::get('formateur/cours/lessons/{course}','CourseController@Lessons_cours')->name('teacher.course.liste_lessons');

    Route::get('formateur/cours/étudiants/{course}','CourseController@students_cours')->name('teacher.course.liste_students');
    
    
    // liste des etudiants suivant tous vos cours 
     Route::get('formateur/étudiants','CourseController@Listening_Course')->name('teacher.student_listening_course');

    // liste des quiz d'un cours 
    Route::get('formateur/cours/quiz/{course}','CourseController@Quiz Course')->name('teacher.course.quiz');


  /**
   * gestion des quiz 
   * 
   */
   // liste quiz
   Route::get('formateur/quiz','TeacherController@indexQuiz')->name('teacher.quiz.index');
   
   // liste des quiz d'un cours 
   Route::get('formateurs/cours/quiz/{course}','TeacherController@QuizCourse')->name('teacher.course.quiz');

   
   // delete quiz
   Route::get('formateur/quiz/{quiz}/deleting','TeacherController@destroy_quiz')->name('teacher.course.quiz.destroy');
   
   // deatil quiz
   Route::get('formateur/quiz/{quiz}/détail','TeacherController@ShowQuizCourse')->name('teacher.course.quiz.show');

   /**fin  */





    /* gestion  */

    // liste des lecons 
    Route::get('formateur/leçons','LessonController@indexLesson')->name('teacher.lesson.index');

    // lesson de chaque cours 
    Route::get('formateur/cours/lessons/{course}','LessonController@Lessons_cours')->name('teacher.course.liste_lessons');

    Route::get('formateur/cours/étudiants/{course}','CourseController@students_cours')->name('teacher.course.liste_students');
    
    // detail etudiant
    Route::get('formateur/étudiant/{student}','TeacherController@ShowStudent')->name('teacher.student.show');

    
    // detail lesson
    Route::get('formateur/lesson/{lesson}','LessonController@ShowLesson')->name('teacher.lesson.show');
    
    // supprimer une leçon
    Route::get('formateur/delete/lesson/{lesson}','LessonController@deleteLesson')->name('teacher.lesson.delete');


   //ajouter une loçon    
    Route::get('formateur/lesson/ajout/{course}','LessonController@AddLesson')->name('teacher.lesson.add');
    // eenregistrer leçon
    Route::post('formateur/lesson/ajout/{course}','LessonController@CreateLesson')->name('teacher.lesson.create');
    
    Route::post('formateur/lesson/modifier/{lesson}','LessonController@UpdatedLesson')->name('teacher.lesson.updated');
    
    //modifier une leçon

    Route::get('formateur/lesson/modification/{lesson}','LessonController@updateLesson')->name('teacher.lesson.update');

    // liste ds cours d'un etudiant
    Route::get('admin/étudiant/{student}/cours','CourseController@student_list_courses')->name('teacher.student.course.lesson');


    /**
     * gestion des leçons
     */
      // detail lesson
      Route::get('formateur/lesson/{lesson}','LessonController@ShowLesson')->name('teacher.lesson.show');

      //ajouter une loçon    
       Route::get('formateur/lesson/ajout/{course}','LessonController@AddLesson')->name('teacher.lesson.add');
       // eenregistrer leçon
       Route::post('formateur/lesson/ajout/{course}','LessonController@CreateLesson')->name('teacher.lesson.create');
       
       Route::post('formateur/lesson/modifier/{lesson}','LessonController@UpdatedLesson')->name('teacher.lesson.updated');
       
       //modifier une leçon
       Route::get('formateur/lesson/modification/{lesson}','LessonController@updateLesson')->name('teacher.lesson.update');


});
    