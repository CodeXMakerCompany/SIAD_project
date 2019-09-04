<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega_tarea extends Model
{
    protected $table = "entrega_tareas";

    public function alumno(){
    	return $this->hasOne('App\User');
    }

 	public function asignatura(){
    	return $this->hasOne('App\Asignatura');
    }
}
