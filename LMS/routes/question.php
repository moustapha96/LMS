<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    
    Route::get('questions','QuestionController@index')->name('question.index');
    
    Route::get('question/{question}/show','QuestionController@show')->name('question.show');
    
    Route::get('question/create','QuestionController@create')->name('question.create');
    
    Route::post('question/store','QuestionController@store')->name('question.store');
    
    Route::post('question/{question}/update','QuestionController@update')->name('question.update');
    
    Route::get('question/{question}/destroy','QuestionController@destroy')->name('question.destroy');
    
    Route::get('question/{question}/adit','QuestionController@edit')->name('question.edit');

    Route::get('options/réponses','QuestionController@index_answer')->name('answer.index');

    Route::get('options/réponses/{answer}','QuestionController@destroy_answer')->name('answer.destroy');

});
    

