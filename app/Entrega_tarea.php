<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega_tarea extends Model
{
    protected $table = "entrega_tareas";

    public function alumno(){
    	return $this->belongsTo('App\User');
    }

 	public function asignatura(){
    	return $this->belongsTo('App\Asignatura');
    }

}
