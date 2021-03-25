<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class,'search'])->name('search');

Auth::routes();

Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'showAdminLoginForm']);
Route::get('/login/writer', [App\Http\Controllers\Auth\LoginController::class,'showWriterLoginForm']);
Route::get('/register/admin',[App\Http\Controllers\Auth\RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/writer', [App\Http\Controllers\Auth\RegisterController::class,'showWriterRegisterForm']);

Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'adminLogin']);
Route::post('/login/writer', [App\Http\Controllers\Auth\LoginController::class,'writerLogin']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class,'createAdmin']);
Route::post('/register/writer', [App\Http\Controllers\Auth\RegisterController::class,'createWriter']);


Route::get('/post/{id}', [App\Http\Controllers\HomeController::class,'post'])->name('post');


Route::group(['prefix'=>'admin','middleware'=>['auth:admin']],function (){
    Route::get('/', [App\Http\Controllers\AdminController::class,'index'])->name('admin.home');

    Route::get('/delete-writer/{id}', [App\Http\Controllers\AdminController::class,'delete_writer'])->name('delete.writer');

    Route::get('/add-writer-form', [App\Http\Controllers\AdminController::class,'add_writer_form'])->name('add.writer');
    Route::post('/add-writer-form', [App\Http\Controllers\AdminController::class,'add_writer']);

    Route::get('/add-writer-to-admin/{id}', [App\Http\Controllers\AdminController::class,'add_writer_to_admin'])->name('add.writer.to.admin');

    Route::get('/admins-list', [App\Http\Controllers\AdminController::class,'admins_list'])->name('admins.list');

    Route::get('/delete-admin/{id}', [App\Http\Controllers\AdminController::class,'delete_admin'])->name('delete.admin');
    Route::get('/posts/', [App\Http\Controllers\AdminController::class,'content_admin'])->name('post.admin');

    Route::get('/setting-admin',[App\Http\Controllers\AdminController::class,'setting_amdin'])->name('setting.admin');
    Route::post('/setting-admin',[App\Http\Controllers\AdminController::class,'setting_amdin_update']);

    Route::get('/delete.content.writer/{id}',[App\Http\Controllers\AdminController::class,'delete_content_writer'])->name('delete.content.writer');
});
Route::group(['prefix'=>'writer','middleware'=>['auth:writer']],function (){
    Route::get('/',[App\Http\Controllers\WriterController::class,'index'])->name('writer.home');

    Route::get('/add-post',[App\Http\Controllers\WriterController::class,'add_post_form'])->name('add.post');
    Route::post('/add-post',[App\Http\Controllers\WriterController::class,'add_post']);

    Route::get('/setting-writer/{id}',[App\Http\Controllers\WriterController::class,'setting_writer_form'])->name('setting.writer');
    Route::post('/setting-writer/{id}',[App\Http\Controllers\WriterController::class,'setting_writer']);

    Route::get('/content-writer/{id}',[App\Http\Controllers\WriterController::class,'content_writer'])->name('content.writer');

    Route::get('/social-writer',[App\Http\Controllers\WriterController::class,'social_writer'])->name('social.writer');
    Route::post('/social-writer',[App\Http\Controllers\WriterController::class,'social_writer_update']);

    Route::get('/delete-post-writer/{id}',[App\Http\Controllers\WriterController::class,'delete_post_writer'])->name('delete.post.writer');


});

/*Route::get('logout',[App\Http\Controllers\HomeController::class,'logout'])->name('logout');*/
