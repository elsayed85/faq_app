<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/home', 301);

Route::get('/home', "HomeController@index")->name('home');

Route::group(['prefix' => 'stu', 'as' => "stu.", 'namespace' => "Student"], function () {
    Route::redirect('/', '/admin/stu/p/', 301);
    Route::resource('/p/', "StudentController")->parameter("" , "student");
    Route::resource('task', "TaskController")->names("task");
});
