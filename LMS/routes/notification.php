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

    // messages admin
    Route::get('/notifications','MessageController@index')->name('messagesAdmin.index');
	
	Route::post('/messages/réponse/{notification}','MessageController@ResponseMessage')->name('messages.repondre');
	
	Route::post('/admin/notifications-created','MessageController@store')->name('messagesAdmin.store');
	
	Route::get('/admin/notifications/supprimer/{notification}','MessageController@destroy')->name('notificationsAdmin.destroy');
	
	Route::get('/admin/messages-show','MessageController@show')->name('notificationsAdmin.show');

	Route::get('admin/update/{notification}', 'MessageController@updateNotification')->name('notificationAdmin.update');
    
	Route::post('admin/delete_all/notifi', 'MessageController@deleteAllNotification')->name('notificationAdmin.deleteAll');
    


    // messages student

    Route::get('étudiant/notifications','MessageController@s_index')->name('messageStudent.index');
		
	Route::post('/étudiant/notifications-created','MessageController@s_store')->name('messageStudent.store');


	// messages formateur

	 Route::get('formateur/notifications','MessageController@f_index')->name('messageTeacher.index');
	
	 Route::post('formateur/messages/réponse/{notification}','MessageController@f_ResponseMessage')->name('messageTeacher.repondre');

	 

	 Route::post('/notifications-created','MessageController@other_store')->name('messageOther.store');
	
	 Route::get('/notifications/supprimer/{notification}','MessageController@other_destroy')->name('notificationOther.destroy');
	 
	 Route::get('/messages-show','MessageController@other_show')->name('notificationsOther.show');
 
	 Route::get('update/{notification}', 'MessageController@other_updateNotification')->name('notificationOther.update');
	 
	 Route::post('delete_all/notifi', 'MessageController@other_deleteAllNotification')->name('notificationOther.deleteAll');
 
	 
});