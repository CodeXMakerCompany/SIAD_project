<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = "asignaturas";

    public function carrera(){
    	//se le asigna con que parametro quiero que se relacione
    	return $this->hasOne('App\Carrera');
    }

    public function cuatrimestre(){
    	return $this->hasOne('App\Cuatrimestre');
    }
}
