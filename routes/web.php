<?php

use App\Models\Task\Task;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login', 301);

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => false,
    'reset'    => false,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::group(['prefix' => 'admin', 'as' => "admin."], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('login.post');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout')->middleware(['auth:admin']);

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('password.reset.post');
});

Route::group(['prefix' => 'stu', 'as' => "stu.", 'namespace' => "Student", 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', "HomeController@settings")->name('settings');
    Route::put("/change-password", "HomeController@ChangePassword")->name("change_password");
    Route::resource('task', "TaskController")->names("task");
});
