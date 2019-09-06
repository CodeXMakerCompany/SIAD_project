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


//Administradores-Ingreso
Route::get('/admin/login', 'AdminController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/area', 'AdminController@secret');
	//Administradores CRUD
	 /*Alumnos*/
	Route::get('/admin/añadir-alumno', 'AdminController@addAlumno')->name('admin.añadirAlumno');
	Route::post('/save/alumno', 'AdminController@saveAlumno')->name('save.alumno');
	Route::get('/ver/alumnos', 'AdminController@verAlumnos')->name('ver.alumnos');
	Route::get('/editar/alumno/{id}', 'AdminController@editarAlumno')->name('editar.alumno');
	Route::post('/actualizar/alumno/{id}', 'AdminController@actualizarAlumno')->name('actualizar.alumno');
	Route::get('/eliminar/alumno/{id}', 'AdminController@eliminarAlumno')->name('eliminar.alumno');

	/*Docentes*/
	Route::get('/admin/añadir-docente', 'AdminController@addDocente')->name('admin.añadirDocente');
	Route::post('/save/docente', 'AdminController@saveDocente')->name('save.docente');
	/*Administrativos*/
	Route::get('/admin/añadir-administrativo', 'AdminController@addAdministrativo')->name('admin.añadirAdministrativo');
	Route::post('/save/administrativo', 'AdminController@saveAdministrativo')->name('save.administrativo');
	/*Coordinadores*/
	Route::get('/admin/añadir-coordinador', 'AdminController@addCoordinador')->name('admin.añadirCoordinador');
	Route::post('/save/coordinador', 'AdminController@saveCoordinador')->name('save.coordinador');

//Docentes-Ingreso
Route::get('/docente/login', 'DocenteController@showLoginForm')->name('docente.login');
Route::post('/docente/login', 'DocenteController@login');
Route::get('/docente/area', 'DocenteController@secret');

//Administrativos-Ingreso
Route::get('/administrativo/login', 'AdministrativoController@showLoginForm')->name('administrativo.login');
Route::post('/administrativo/login', 'AdministrativoController@login');
Route::get('/administrativo/area', 'AdministrativoController@secret');
