<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = "evaluaciones";

    public function alumno(){
    	return $this->hasOne('App\User');
    }

 	public function destinatario(){
    	return $this->hasOne('App\User');
    }

   	public function docente(){
    	return $this->hasOne('App\Docente');
    }
}
