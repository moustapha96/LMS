<?php

use App\Models\Contact;
use App\Models\Course;
use App\Models\Message;
use App\Models\Student;
use App\Models\Teacher;
use App\User;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () 
{

   
   
    	// liste parametres
	Route::get('parametres','SettingController@index')->name('admin.settings.index');

	Route::post('/parametres', 'SettingController@update')->name('admin.settings.update');
	Route::post('/parametres-logo', 'SettingController@update_logo')->name('settings.update_logo');

    Route::get('/étudiants', 'AdminController@student')->name('student');
    
    Route::get('/gestion des cours', 'AdminController@cours')->name('gestion_cours');


    // liste des cours d'une classe
    Route::get('admin/cours','AdminController@ListeCourses')->name('course.index');

    // detail d'un cours
    Route::get('admin/cours/{course}/détail','AdminController@viewCourse')->name('course.view');

    // ajouter un cours
    Route::get('admin/nouveau_cours','AdminController@addCourse')->name('admin.course.add');

    // enregistrer un nouveau cours
    Route::post('admin/enregistrement_cours/','AdminController@saveCourse')->name('course.create');

    // mettre a jour
    Route::get('admin/cours/mise_a_jour/{course}','AdminController@updateCourse')->name('course.update');

    Route::post('admin/cours/mise_a_jour/{course}','AdminController@updatedCourse')->name('course.updated');


    // liste des formateurs 
    Route::get('admin/formateurs', 'AdminController@formateurs')->name('teacher');

    // afficher un formateur
    Route::get('admin/formateur/{teacher}','AdminController@formateurView')->name('formateur.view');

    

    // liste des lecons 
    Route::get('admin/leçons','AdminController@indexLesson')->name('admin.lesson.index');

    // lesson de chaque cours 
    Route::get('admin/cours/lessons/{course}','AdminController@Lessons_cours')->name('admin.course.liste_lessons');

    Route::get('admin/cours/étudiants/{course}','AdminController@students_cours')->name('admin.course.liste_students');
    
    // detail etudiant
    Route::get('admin/étudiant/{student}','AdminController@ShowStudent')->name('student.show');

    
    // detail lesson
    Route::get('admin/lesson/{lesson}','AdminController@ShowLesson')->name('lesson.show');

   //ajouter une loçon    
    Route::get('admin/lesson/ajout/{course}','AdminController@AddLesson')->name('lesson.add');
    // eenregistrer leçon
    Route::post('admin/lesson/ajout/{course}','AdminController@CreateLesson')->name('lesson.create');
    
    Route::post('admin/lesson/modifier/{lesson}','AdminController@UpdatedLesson')->name('admin.lesson.updated');
    
    //modifier une leçon

    Route::get('admin/lesson/modification/{lesson}','AdminController@updateLesson')->name('admin.lesson.update');

    // liste ds cours d'un etudiant
    Route::get('admin/étudiant/{student}/cours','AdminController@student_list_courses')->name('student.course.lesson');



    // user
    Route::get('utilisateurs', function(){
        $users = User::all();
       
        return view('backend.user.liste_user',compact('users'));
    })->name('user.liste');

    Route::get('ajouter/étudiant', function(){
        $courses = Course::all();
        return view('backend.user.create_student',compact('courses'));
    })->name('user.add.student');

    Route::get('ajouter/formateur', function(){
        $courses = Course::all();
       
        return view('backend.user.create_teacher',compact('courses'));
    })->name('user.add.teacher');

    Route::get('profil/utilisateur/{user}', function(){
        return view('backend.user.profil',compact('user'));
    })->name('user.profil');

    // update formateur 

    Route::get('admin/formateur/{teacher}/mise_en_jour',function(Teacher $teacher){
        return view('backend.admin.teacher.edit',compact('teacher'));
    })->name('formateur.update');

    // updated formateur 
    Route::post('admin/formateur/{teacher}/updated','AdminController@updatedTeacher')->name('formateur.updated');
    
    

    // update student
    Route::get('admin/étudiant/{student}/mise_en_jour',function(Student $student){
        return view('backend.admin.student.edit',compact('student'));
    })->name('student.update');
    
    // updated student
    Route::post('admin/étudiant/{student}/updated','AdminController@updatedStudent')->name('student.updated');



    Route::post('utilisateur/formateurs', 'AdminController@saveTeacher')->name('register_teacher');
    
    Route::post('utilisateur/étudiants', 'AdminController@saveStudent')->name('register_student');


    // liste quiz
    Route::get('admin/quiz','AdminController@indexQuiz')->name('admin.quiz.index');
   
    // liste des quiz d'un cours 
    Route::get('cours/quiz/{course}','AdminController@QuizCourse')->name('admin.course.quiz');

    
    // delete quiz
    Route::get('admin/quiz/{quiz}/deleting','AdminController@destroy_quiz')->name('admin.course.quiz.destroy');
    
    // deatil quiz
    Route::get('admin/cours/quiz/{quiz}/détail','AdminController@ShowQuizCourse')->name('admin.course.quiz.show');
    
    // list quiz of course
    Route::get('admin/cours/{course}/quiz','AdminController@courseQuiz')->name('admin.course.quiz');

   
   
    // quiz doing
    Route::post('admin/cours/{course}/quiz','AdminController@Quiz_Doing')->name('admin.course.quiz_doing');

    


   //liste des contacts
   Route::get('admin/contacts','AdminController@indexContact')->name('contact.liste'); 

   //delete contact
   Route::get('admin/contacts/{contact}/suppression',function(Contact $contact){
            $contact->delete();
            return redirect()->back()->with('success','contact supprimé avec succes');
   })->name('contact.delete');    

   Route::post('admin/contact/{contact}/réponse/','AdminController@responseContact')->name('contact.response');
   




//    les routes pour notification 

    Route::get('/notifications','MessageController@index')->name('messagesAdmin.index');
	
	Route::post('/messages/réponse/{notification}','MessageController@ResponseMessage')->name('messages.repondre');
	
	Route::post('/admin/notifications-created','MessageController@store')->name('messagesAdmin.store');
	
	Route::get('/admin/notifications/supprimer/{notification}','MessageController@destroy')->name('notificationsAdmin.destroy');
	
	Route::get('/admin/messages-show','MessageController@show')->name('notificationsAdmin.show');

	Route::get('admin/update/{notification}', 'MessageController@updateNotification')->name('notificationAdmin.update');
    
	Route::post('admin/delete_all/notifi', 'MessageController@deleteAllNotification')->name('notificationAdmin.deleteAll');
    
    
    Route::get('admin/détail/{user}', function(User $user){
            return view('backend.user.admin_show',compact('user'));
    })->name('admin.show');


    // liste des dicussions du forum
    Route::get('admin/forum','AdminController@indexForum')->name('admin.forum.index');

    // supprimer un message du forum
    Route::get('admin/forum/{forum}/supprimer/','AdminController@deleteForum')->name('admin.forum.delete');


    // liste des cours suivi
    Route::get('admin/cours_suivi','AdminController@indexCoursSuivi')->name('course.suivi');
    
    // supprimer un cours suivi
    Route::get('admin/cours_suivi/{student_course}/delete','AdminController@deleteCoursSuivi')->name('course.suivi.delete');

    // list of all files in systemes
    Route::get('files/','AdminController@all_files')->name('files');

    // destroy file
    Route::get('files/destroying/{file}', 'AdminController@destroy_files')->name('files.destroy');
});