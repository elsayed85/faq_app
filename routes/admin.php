<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/home', 301);

Route::get('/home', "HomeController@index")->name('home');
Route::get('/settings', "HomeController@settings")->name('settings');
Route::put("/change-password", "HomeController@ChangePassword")->name("change_password");
Route::patch("/update-info", "HomeController@updateInfo")->name("update_info");

Route::group(['prefix' => 'stu', 'as' => "stu.", 'namespace' => "Student"], function () {
    Route::redirect('/', '/admin/stu/p/', 301);
    Route::resource('/p/', "StudentController")->parameter("", "student:username");
    Route::put("/p/{student:username}/changepassword", "StudentController@changePassword")->name('changePassword');
    Route::delete('comment/{comment}', "CommentController@delete")->name('comment.delete');
    Route::resource('task', "TaskController")->names("task");
});
