<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Registro
Route::get('/completar', 'UserController@completarDatos')->name('completar');
Route::post('/completar/update', 'UserController@updateDatos')->name('update.alumno');

//Perfil
Route::get('/profile', 'UserController@miPerfil')->name('user.profile');
Route::post('/profile/update', 'UserController@updateFoto')->name('update.foto');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');

Route::get('/enviar_tarea', 'UserController@enviarTarea')->name('user.tarea');
Route::post('/guardar_tarea', 'UserController@guardarTarea')->name('user.guardarTarea');

//Mensajes-usuario/docente
Route::get('/contactos', 'MensajeController@verContactos')->name('mensaje.contactos');
Route::get('/chat/{id}', 'MensajeController@chatUser')->name('mensaje.user');
Route::post('/enviar', 'MensajeController@storeMessage')->name('mensaje.save');


//Administradores
Route::get('/admin/login', 'AdminController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/area', 'AdminController@secret');