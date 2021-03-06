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
Route::get('/admin/area', 'AdminController@secret')->name('admin.area');
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
	Route::get('/ver/docentes', 'AdminController@verDocentes')->name('ver.docentes');
	Route::get('/editar/docente/{id}', 'AdminController@editarDocente')->name('editar.docente');
	Route::post('/actualizar/docente/{id}', 'AdminController@actualizarDocente')->name('actualizar.docente');
	Route::get('/eliminar/docente/{id}', 'AdminController@eliminarDocente')->name('eliminar.docente');

	/*Administrativos*/
	Route::get('/admin/añadir-administrativo', 'AdminController@addAdministrativo')->name('admin.añadirAdministrativo');
	Route::post('/save/administrativo', 'AdminController@saveAdministrativo')->name('save.administrativo');
	Route::get('/ver/administrativos', 'AdminController@verAdministrativos')->name('ver.administrativos');
	Route::get('/editar/administrativo/{id}', 'AdminController@editarAdministrativo')->name('editar.administrativo');
	Route::post('/actualizar/administrativo/{id}', 'AdminController@actualizarAdministrativo')->name('actualizar.administrativo');
	Route::get('/eliminar/administrativo/{id}', 'AdminController@eliminarAdministrativo')->name('eliminar.administrativo');

	/*Coordinadores*/
	Route::get('/admin/añadir-coordinador', 'AdminController@addCoordinador')->name('admin.añadirCoordinador');
	Route::post('/save/coordinador', 'AdminController@saveCoordinador')->name('save.coordinador');
	Route::get('/ver/coordinadores', 'AdminController@verCoordinador')->name('ver.coordinador');
	Route::get('/editar/coordinador/{id}', 'AdminController@editarCoordinador')->name('editar.coordinador');
	Route::post('/actualizar/coordinador/{id}', 'AdminController@actualizarCoordinador')->name('actualizar.coordinador');
	Route::get('/eliminar/coordinador/{id}', 'AdminController@eliminarCoordinador')->name('eliminar.coordinador');
	//Finaliza Rutas CRUD

//Backups y publicaciones administradores
Route::get('/admin/backups', 'BackupController@showBackups')->name('show.backups');
Route::post('/admin/subir/backup', 'BackupController@storeBackup')->name('store.backup');
Route::get('/backup/{filename}', 'BackupController@getBackup');
Route::get('/backup/eliminar/{id}', 'BackupController@deleteBackup');

Route::get('/admin/mensaje', 'PublicacionAdmController@nuevoMensaje')->name('crear.mensaje');
Route::post('/admin/guardar/mensaje', 'PublicacionAdmController@storeMensaje')->name('store.mensaje');
Route::get('/admin/postImage/{filename}', 'PublicacionAdmController@getImage')->name('message.image');
Route::get('/admin/mensaje/delete/{id}', 'PublicacionAdmController@deleteMensaje')->name('message.delete');

//Administrativos-Ingreso
Route::get('/administrativo/login', 'AdministrativoController@showLoginForm')->name('administrativo.login');
Route::post('/administrativo/login', 'AdministrativoController@login');
Route::get('/administrativo/area', 'AdministrativoController@secret')->name('administrativos.area');

//Events
Route::get('/evento/get', 'EventsController@get_events');
Route::post('/evento/crear', 'EventsController@create_event')->name('evento.create');
Route::get('/eventos/ver', 'EventsController@show_events')->name('show.events');
Route::get('/evento/eliminar/{id}', 'EventsController@delete_event')->name('delete.event');
Route::get('/evento/editar/{id}', 'EventsController@edit_event')->name('edit.event');
Route::post('/evento/actualizar/{id}', 'EventsController@update_event')->name('update.event');
//Post_mensaje
Route::get('/administrativo/mensaje', 'AdministrativoController@getPosts')->name('administrativos.posts');
Route::post('/administrativo/guardar/mensaje', 'AdministrativoController@storeMensaje')->name('store.mensajeAdministrativo');
Route::get('/administrativo/delete/mensaje/{id}', 'AdministrativoController@deleteMessage');


//Docentes-Ingreso
Route::get('/docente/login', 'DocenteController@showLoginForm')->name('docente.login');
Route::post('/docente/login', 'DocenteController@login');
Route::get('/docente/area', 'DocenteController@secret')->name('docente.area');
Route::get('/docente/material', 'DocenteController@getMaterial')->name('docente.material');
Route::post('/docente/agregar/material','DocenteController@storeMaterial')->name('store.material');
Route::get('/material/eliminar/{id}','DocenteController@deleteMaterial')->name('eliminar.material');
Route::get('/material/descargar/{filename}','DocenteController@downloadMaterial')->name('descargar.material');
	//El chat
	Route::get('/docente/chat/{search?}', 'DocenteController@getAlumnos')->name('mostrar.alumnos');
	Route::get('/docente/iniciar/chat/{id}', 'DocenteController@chatDocente')->name('mensaje.docente');
	Route::post('/mensaje/enviar', 'MensajeDocController@storeMessage')->name('mensajeDoc.save');
//Tareas
Route::get('/docente/enviar/tarea', 'PlanificacionTareaController@showTareas')->name('show.tareas');
Route::post('/docente/guardar/tarea', 'PlanificacionTareaController@storeTarea')->name('store.newTarea');

Route::get('/docente/tarea/alumno/{id}', 'PlanificacionTareaController@getTareasAlumno')->name('ver.todaslastareas');
Route::get('/docente/evaluacion/alumno/{id}/{id_tarea}', 'PlanificacionTareaController@setEvaluacion')->name('evaluacion.alumno');
Route::get('/tarea/{filename}', 'PlanificacionTareaController@getHomework');
Route::post('/docente/evaluacion', 'PlanificacionTareaController@storeEvaluacion')->name('store.evaluacion');
