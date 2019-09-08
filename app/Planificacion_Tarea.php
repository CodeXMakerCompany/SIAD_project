<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planificacion_Tarea extends Model
{
    protected $table = "planificacion_tareas";

    //regresar al docente que publico la tarea
    public function docente() {

    	return $this->belongsTo('App\Docente');

    }

    //regresar la asignatura de la tarea
    public function asignatura() {

    	return $this->belongsTo('App\Asignatura');
    }

}
