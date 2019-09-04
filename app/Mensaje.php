<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = "mensajes";

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
