<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planificacion_Tarea extends Model
{
    protected $table = "planificacion_tareas";

    //regresar al docente que publico la tarea
    public function docente() {

    	return $this->hasOne('App\Docente');

    }

    //regresar la asignatura de la tarea
    public function asignatura() {

    	return $this->hasOne('App\Asignatura');
    }
}
